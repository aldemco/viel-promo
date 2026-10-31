import { spawn } from 'node:child_process'
import { Transform } from 'node:stream'
import path from 'node:path'
import { mkdir, readdir, readFile, writeFile } from 'node:fs/promises'
import { createServer } from 'vite'
import { optimize } from 'svgo'
import sharp from 'sharp'
import gulp from 'gulp'
import webpack from 'webpack'
import TerserPlugin from 'terser-webpack-plugin'
import * as dartSass from 'sass'
import postcss from 'postcss'
import cssnano from 'cssnano'
import autoprefixer from 'autoprefixer'
import changed from 'gulp-changed'
import { deleteAsync } from 'del'
import { createSsiMiddleware, expandSsiIncludes } from './build/ssi.js'

const { src, dest, parallel, series, watch } = gulp
const styleDirectory = 'app/styles/sass'
const imageDirectory = 'app/images/src'
const imageOutputDirectory = 'app/images/dist'

function scripts() {
	const compiler = webpack({
		mode: 'production',
		entry: path.resolve('app/js/app.js'),
		output: {
			path: path.resolve('app/js'),
			filename: 'app.min.js'
		},
		performance: { hints: false },
		module: {
			rules: [
				{
					test: /\.m?js$/,
					exclude: /(node_modules)/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: ['@babel/preset-env'],
							plugins: ['babel-plugin-root-import']
						}
					}
				}
			]
		},
		optimization: {
			minimize: true,
			minimizer: [
				new TerserPlugin({
					terserOptions: { format: { comments: false } },
					extractComments: false
				})
			]
		}
	})

	return new Promise((resolve, reject) => {
		compiler.run((error, stats) => {
			const finish = (buildError) => {
				compiler.close((closeError) => {
					if (buildError) {
						reject(buildError)
					} else if (closeError) {
						reject(closeError)
					} else {
						resolve()
					}
				})
			}

			if (error) {
				finish(error)
			} else if (stats.hasErrors()) {
				finish(new Error(stats.toString({ all: false, errors: true, errorDetails: true })))
			} else {
				finish()
			}
		})
	})
}

async function styles() {
	const entries = await readdir(styleDirectory, { withFileTypes: true })
	const styleFiles = entries
		.filter((entry) => entry.isFile() && !entry.name.startsWith('_') && /\.(sass|scss)$/i.test(entry.name))
		.map((entry) => path.join(styleDirectory, entry.name))
		.sort()

	const compiledStyles = await Promise.all(styleFiles.map(async (file) => (
		dartSass.compileAsync(file, {
			loadPaths: [path.resolve('node_modules')],
			style: 'expanded'
		})
	)))
	const swiperStyles = await Promise.all([
		readFile('node_modules/swiper/swiper.css', 'utf8'),
		readFile('node_modules/swiper/modules/pagination.css', 'utf8')
	])
	const css = [...swiperStyles, ...compiledStyles.map((result) => result.css)].join('\n')
	const result = await postcss([
		autoprefixer({ grid: 'autoplace' }),
		cssnano({ preset: ['default', { discardComments: { removeAll: true } }] })
	]).process(css, { from: undefined })

	await mkdir('app/css', { recursive: true })
	await writeFile('app/css/app.min.css', result.css)
}

function images() {
	return src([`${imageDirectory}/**/*`])
		.pipe(changed(imageOutputDirectory))
		.pipe(new Transform({
			objectMode: true,
			transform(file, encoding, callback) {
				if (file.isNull()) {
					callback(null, file)
					return
				}
				if (!file.isBuffer()) {
					callback(new Error(`Expected a buffered image: ${file.path}`))
					return
				}

				const extension = path.extname(file.path).toLowerCase()
				if (extension === '.svg') {
					try {
						file.contents = Buffer.from(optimize(file.contents.toString(), { path: file.path }).data)
						callback(null, file)
					} catch (error) {
						callback(error)
					}
					return
				}

				const formats = {
					'.avif': 'avif',
					'.gif': 'gif',
					'.jpg': 'jpeg',
					'.jpeg': 'jpeg',
					'.png': 'png',
					'.tif': 'tiff',
					'.tiff': 'tiff',
					'.webp': 'webp'
				}
				const format = formats[extension]
				if (!format) {
					callback(null, file)
					return
				}

				sharp(file.contents, { animated: format === 'gif' })
					.toFormat(format)
					.toBuffer()
					.then((contents) => {
						file.contents = contents
						callback(null, file)
					}, callback)
			}
		}))
		.pipe(dest(imageOutputDirectory))
}

function buildcopy() {
	return src([
		'{app/js,app/css}/*.min.*',
		'app/*.pdf',
		'app/images/**/*.*',
		'!app/images/src/**/*',
		'app/fonts/**/*',
		'app/videos/**/*'
	], { base: 'app/' })
	.pipe(dest('dist'))
}

async function buildhtml() {
	async function compileDirectory(directory) {
		const entries = await readdir(directory, { withFileTypes: true })
		for (const entry of entries) {
			const sourcePath = path.join(directory, entry.name)
			if (entry.isDirectory()) {
				await compileDirectory(sourcePath)
			} else if (/\.(html|php)$/i.test(entry.name)) {
				const relativePath = path.relative('app', sourcePath)
				const outputPath = path.join('dist', relativePath)
				const source = await readFile(sourcePath, 'utf8')
				await mkdir(path.dirname(outputPath), { recursive: true })
				await writeFile(outputPath, await expandSsiIncludes(source, sourcePath, path.resolve('app')))
			}
		}
	}

	await compileDirectory(path.resolve('app'))
	await deleteAsync('dist/parts', { force: true })
}

async function cleandist() {
	await deleteAsync('dist/**/*', { force: true })
}

function deploy() {
	return new Promise((resolve, reject) => {
		const rsync = spawn('rsync', [
			'--archive',
			'--compress',
			'--delete',
			'--exclude=**/Thumbs.db',
			'--exclude=**/*.DS_Store',
			'dist/',
			'username@yousite.com:yousite/public_html/'
		], { stdio: 'inherit' })

		rsync.once('error', reject)
		rsync.once('close', (code) => {
			if (code === 0) {
				resolve()
			} else {
				reject(new Error(`rsync exited with code ${code}`))
			}
		})
	})
}

function startwatch() {
	watch(`${styleDirectory}/**/*`, { usePolling: true }, styles)
	watch(['app/js/**/*.js', '!app/js/**/*.min.js'], { usePolling: true }, scripts)
	watch(`${imageDirectory}/**/*`, { usePolling: true }, images)
}

async function devServer() {
	const server = await createServer({
		root: path.resolve('app'),
		server: { port: Number(process.env.PORT ?? 8081), strictPort: true },
		plugins: [{
			name: 'local-ssi-includes',
			configureServer(viteServer) {
				viteServer.middlewares.use(createSsiMiddleware(path.resolve('app'), { injectViteClient: true }))
				viteServer.watcher.on('change', (filePath) => {
					if (/\.(html|php|htm|txt|json|md|woff2)$/i.test(filePath)) {
						viteServer.ws.send({ type: 'full-reload' })
					}
				})
			}
		}]
	})
	await server.listen()
}

export { scripts, styles, images, deploy }
export let assets = series(scripts, styles, images)
export let build = series(cleandist, images, scripts, styles, buildcopy, buildhtml)

export default series(scripts, styles, images, parallel(devServer, startwatch))
