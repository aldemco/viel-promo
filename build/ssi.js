import path from 'node:path'
import { readFile, realpath, stat } from 'node:fs/promises'

const ssiDirective = /<!--\s*#(include|set|echo)\b([\s\S]*?)-->/g
const attributePattern = /([\w-]+)\s*=\s*"([^"]*)"/g

function isWithinRoot(root, filePath) {
	const relativePath = path.relative(root, filePath)
	return relativePath !== '' && !relativePath.startsWith(`..${path.sep}`) && relativePath !== '..' && !path.isAbsolute(relativePath)
}

export async function expandSsiIncludes(content, currentFile, root, parents = new Set(), variables = new Map()) {
	const absoluteRoot = await realpath(root)
	const absoluteFile = await realpath(currentFile)
	if (!isWithinRoot(absoluteRoot, absoluteFile)) {
		throw new Error(`SSI source is outside the app directory: ${currentFile}`)
	}
	if (parents.has(absoluteFile)) {
		throw new Error(`Circular SSI include: ${absoluteFile}`)
	}
	const nextParents = new Set(parents).add(absoluteFile)
	let output = ''
	let cursor = 0

	for (const match of content.matchAll(ssiDirective)) {
		const [directive, directiveName, attributesSource] = match
		const attributes = Object.fromEntries(
			[...attributesSource.matchAll(attributePattern)].map(([, name, value]) => [name, value])
		)
		output += content.slice(cursor, match.index)

		if (directiveName === 'set') {
			if (!attributes.var || attributes.value === undefined) {
				throw new Error(`Invalid SSI set directive in ${absoluteFile}`)
			}
			variables.set(attributes.var, attributes.value)
			cursor = match.index + directive.length
			continue
		}

		if (directiveName === 'echo') {
			if (!attributes.var) {
				throw new Error(`Invalid SSI echo directive in ${absoluteFile}`)
			}
			output += variables.get(attributes.var) ?? ''
			cursor = match.index + directive.length
			continue
		}

		const includeType = attributes.virtual ? 'virtual' : attributes.file ? 'file' : null
		const includePath = attributes[includeType]
		if (!includeType || !includePath) {
			throw new Error(`Invalid SSI include directive in ${absoluteFile}`)
		}
		const includeFile = path.resolve(
			includeType === 'virtual' ? root : path.dirname(absoluteFile),
			includeType === 'virtual' ? includePath.replace(/^[/\\]+/, '') : includePath
		)
		const canonicalInclude = await realpath(includeFile)
		if (!isWithinRoot(absoluteRoot, canonicalInclude)) {
			throw new Error(`SSI include is outside the app directory: ${includePath}`)
		}

		const includedContent = await readFile(canonicalInclude, 'utf8')
		output += await expandSsiIncludes(includedContent, canonicalInclude, absoluteRoot, nextParents, variables)
		cursor = match.index + directive.length
	}

	return output + content.slice(cursor)
}

export function createSsiMiddleware(root, { injectViteClient = false } = {}) {
	const absoluteRoot = path.resolve(root)

	return async function ssiMiddleware(request, response, next) {
		if (!['GET', 'HEAD'].includes(request.method)) {
			next()
			return
		}

		let requestedPath
		try {
			requestedPath = decodeURIComponent(new URL(request.url, 'http://localhost').pathname)
		} catch (error) {
			next(error)
			return
		}
		if (requestedPath === '/') requestedPath = '/index.html'
		if (!/\.html?$/i.test(requestedPath)) {
			next()
			return
		}

		const filePath = path.resolve(absoluteRoot, `.${requestedPath}`)
		if (!isWithinRoot(absoluteRoot, filePath)) {
			response.statusCode = 404
			response.end()
			return
		}

		try {
			const canonicalRoot = await realpath(absoluteRoot)
			const canonicalFile = await realpath(filePath)
			if (!isWithinRoot(canonicalRoot, canonicalFile)) {
				response.statusCode = 404
				response.end()
				return
			}
			if (!(await stat(canonicalFile)).isFile()) {
				next()
				return
			}
			const source = await readFile(canonicalFile, 'utf8')
			let html = await expandSsiIncludes(source, canonicalFile, canonicalRoot)
			if (injectViteClient) {
				html = html.replace(/<\/head\s*>/i, '<script type="module" src="/@vite/client"></script>\n</head>')
			}
			response.statusCode = 200
			response.setHeader('Content-Type', 'text/html; charset=utf-8')
			response.setHeader('Cache-Control', 'no-cache')
			response.end(request.method === 'HEAD' ? undefined : html)
		} catch (error) {
			if (error.code === 'ENOENT') {
				next()
				return
			}
			next(error)
		}
	}
}
