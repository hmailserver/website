# CLAUDE.md

Guidance for Claude Code when working in this repository.

## Purpose

Source for www.hmailserver.com, the website of hMailServer (a Windows email server). The site is static: PHP runs only at build time, in GitHub Actions, and the output is published to GitHub Pages. The forum (phpBB) is not part of this repo; it runs on a separate server at https://forum.hmailserver.com/.

## Layout

- `html/` — page sources. Procedural PHP pages (`index.php`, `download.php`, `changelog.php`, ...) that include `part_header.php`/`part_footer.php`. Rendered once at build time; never served as PHP.
- `html/lib/data.php` — loads release and changelog data from `data/`.
- `html/lib/docs.php` — manual helpers (manifests, URLs, reading order).
- `html/documentation/page.php` — template for one manual page. `<version>/images/` holds that version's images; `versions.php` lists the versions.
- `data/downloads.json`, `data/changelog.json` — source of truth for releases and the changelog. Edit these to publish a release.
- `docs-content/<version>/` — manual in Markdown with front matter. `docs-build/<version>/` — HTML fragments and `manifest.json` generated from it by `scripts/build-docs-html.php`. Don't hand-edit `docs-build/`.
- `scripts/build-site.php` — renders everything to `dist/`.
- `.github/workflows/build-site.yml` — builds hourly and on push; deploys `main` to GitHub Pages.
- `workers/edge/` — Cloudflare Worker for what needs code at request time: redirects for old URLs (`?page=`, `.php`, `download_file?downloadid=`), the retired `/statistics/update.php` endpoint, and the contact form (`/api/contact`: Turnstile, then SMTP to the hMailServer mail server). Runs only on the routes in `wrangler.toml`. Reads `dist/data/download-ids.json` and `dist/data/doc-slugs.json` from the published site.

## Worker

Deployed by `.github/workflows/deploy-worker.yml` on pushes to `main` that change `workers/edge/` (tests and typecheck first). The Worker's secrets (see the top of `wrangler.toml`) are set in the Cloudflare dashboard. Tests run in plain Node:

```
cd workers/edge
node --test "test/*.test.ts"
```

Keep redirect logic in `src/redirects.ts` and email building in `src/contact.ts` free of Cloudflare APIs, so the tests can run in plain Node. Only `src/smtp.ts` and `src/index.ts` use Worker APIs.

## Building

```
php scripts/build-docs-html.php latest   # needs docs-content/latest (from hmailserver/hmailserver: hmailserver/documentation)
php scripts/build-site.php               # writes dist/
php -S localhost:8000 -t dist            # preview
```

The build fails on any PHP warning, and on doc HTML outside the allowlist in `scripts/lib/doc-safety.php` (tags, attributes, URL schemes, CSS properties). The `latest` docs come unreviewed from the hmailserver repo, so don't loosen the allowlist to allow scripts, event handlers or non-http(s) links. Download counts come from the GitHub Releases API; without network access (or the openssl extension), the counts kept from the last run or the baselines in `data/downloads.json` are used.

## How pages are rendered

Pages in `html/` are templates. `build-site.php` includes each one with its inputs as plain variables (e.g. `$changelog_version`, `$doc_version`/`$doc_slug`), captures the output, and writes `<path>/index.html`, e.g. `/download/`, `/changelog/<version>/<build>/`, `/documentation/<version>/<slug>/`. Pages set `$title_prepend` and `$nav_active` before including `part_header.php`.

Templates must not declare functions (they're included many times in one process); put helpers in `html/lib/`. There are no requests: don't use `$_GET`, `$_SERVER`, sessions or `header()`.

## Download counts

Shown count = `counter_baseline + (GitHub download_count now - github_baseline)`. The baselines were taken when the data was exported from the old MySQL database, which held years of counts.

## Conventions

- Keep pages working as plain PHP includes; there's no framework or template engine.
- Escape output with `htmlspecialchars()`.
- Anything needing a server at request time (redirects, forms) belongs in the Worker, not in `html/`.
- No inline scripts or event handlers in pages; put JavaScript in `html/js/`. This keeps a strict Content-Security-Policy possible.
