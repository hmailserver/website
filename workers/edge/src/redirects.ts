// Redirects for URLs of the old PHP site. Pure logic: returns a Response, or null to pass the request through.

export interface DownloadInfo {
    url: string;
    version: string;
    build: string | null;
}

export interface Lookups {
    downloads(): Promise<Record<string, DownloadInfo>>;
    docSlugs(): Promise<Record<string, string[]>>;
}

const GITHUB_RELEASES = "https://github.com/hmailserver/hmailserver/releases/download/";

// Old CMS pages: /?page=<name> and /index.php?page=<name>.
const LEGACY_PAGES: Record<string, string> = {
    welcome: "/",
    frontpage: "/",
    functionality: "/functionality/",
    features: "/functionality/",
    screenshots: "/functionality/",
    download: "/download/",
    download_latest: "/download/",
    download_archive: "/download_archive/",
    contact: "/contact/",
    contactform: "/contact/",
    support: "/forum/",
    download_source: "https://github.com/hmailserver/hmailserver",
};

// Old page URLs, now served as folders.
const LEGACY_PATHS: Record<string, string> = {
    "/welcome": "/",
    "/welcome/": "/",
    "/contactform": "/contact/",
    "/contactform/": "/contact/",
    "/index.php": "/",
    "/functionality.php": "/functionality/",
    "/download.php": "/download/",
    "/download_archive.php": "/download_archive/",
    "/docs.php": "/docs/",
    "/contact.php": "/contact/",
    "/contact_received.php": "/contact_received/",
    "/sitemap.php": "/sitemap.xml",
};

export async function legacyRedirect(url: URL, lookups: Lookups): Promise<Response | null> {
    const path = url.pathname;
    const query = url.searchParams;

    if (path === "/statistics/update.php") {
        // Called by installed hMailServer versions. Statistics are retired; keep answering as before.
        return new Response("Thanks!", { headers: { "Content-Type": "text/html; charset=utf-8" } });
    }

    if (path === "/download_file" || path === "/download_file.php" || path === "/download_getfile" || path === "/download_getfile.php") {
        return downloadRedirect(url, query.get("downloadid"), lookups);
    }

    if (path === "/" || path === "/index.php") {
        const page = query.get("page");
        if (page === "changelog") {
            return redirect(url, changelogPath(query.get("version"), query.get("build")));
        }
        if (page === "background_download_file" || page === "download_mirrors") {
            return downloadRedirect(url, query.get("downloadid"), lookups);
        }
        if (page !== null && page in LEGACY_PAGES) {
            return redirect(url, LEGACY_PAGES[page]);
        }
    }

    if (path === "/changelog" || path === "/changelog/" || path === "/changelog.php") {
        const downloadId = query.get("downloadid");
        if (downloadId !== null) {
            const download = (await lookups.downloads())[downloadId];
            return redirect(url, download ? changelogPath(download.version, download.build) : "/changelog/");
        }
        if (query.has("version") || path === "/changelog.php") {
            return redirect(url, changelogPath(query.get("version"), query.get("build")));
        }
        return null;
    }

    const docs = path.match(/^\/documentation\/(?:([^/]+)\/)?(?:index\.php)?$/);
    if (docs && query.has("page")) {
        return docRedirect(url, docs[1] ?? "latest", query.get("page") ?? "", lookups);
    }

    if (path in LEGACY_PATHS) {
        return redirect(url, LEGACY_PATHS[path]);
    }

    return null;
}

async function downloadRedirect(url: URL, downloadId: string | null, lookups: Lookups): Promise<Response> {
    const download = downloadId === null ? undefined : (await lookups.downloads())[downloadId];
    if (!download || !download.url.startsWith(GITHUB_RELEASES)) {
        return new Response("Download not found.", { status: 404 });
    }
    return Response.redirect(download.url, 302);
}

async function docRedirect(url: URL, version: string, page: string, lookups: Lookups): Promise<Response | null> {
    const slugs = (await lookups.docSlugs())[version];
    if (!slugs) {
        return null;
    }
    // The old manual linked to the site's changelog this way.
    if (page === "changelog") {
        return redirect(url, version === "latest" ? "/changelog/" : changelogPath(version.replace(/^v/, ""), null));
    }
    if (page === "" || page === "overview" || page === "selectversion") {
        return redirect(url, `/documentation/${version}/`);
    }
    const slug = resolveSlug(slugs, page.trim());
    return redirect(url, `/documentation/${version}/${encodeURIComponent(slug)}/`);
}

// Old links may use a plural form of the slug (e.g. "accounts" for "account"). Same rules as html/lib/docs.php.
export function resolveSlug(slugs: string[], slug: string): string {
    if (slugs.includes(slug)) return slug;
    if (slug.endsWith("s") && slugs.includes(slug.slice(0, -1))) return slug.slice(0, -1);
    if (slug.endsWith("es") && slugs.includes(slug.slice(0, -2))) return slug.slice(0, -2);
    return slug;
}

export function changelogPath(version: string | null, build: string | null): string {
    const safe = (value: string | null) => value !== null && /^[0-9A-Za-z._-]+$/.test(value);
    if (!safe(version)) return "/changelog/";
    if (!safe(build)) return `/changelog/${version}/`;
    return `/changelog/${version}/${build}/`;
}

function redirect(url: URL, target: string): Response {
    return Response.redirect(new URL(target, url.origin).toString(), 301);
}
