# Viel Promo pages

## Requirements

- Node.js 24.15 or newer
- npm
- `rsync` only when using the optional `gulp deploy` task

## Development

```sh
npm ci
npm start
```

The development server runs at `http://localhost:8080` by default; set `PORT` to
use a different port. Gulp watches JavaScript, Sass and images and rebuilds
assets as they change. Vite reloads changed pages, and SSI includes in HTML are
expanded by the local build helper.

## Production build

```sh
npm ci
npm run build
```

The generated site is written to `dist/`. The package lockfile is managed with
npm; use `npm ci` in CI to install exactly the audited dependency tree.