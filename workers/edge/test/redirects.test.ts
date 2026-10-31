import { test } from "node:test";
import assert from "node:assert/strict";
import { legacyRedirect, type Lookups } from "../src/redirects.ts";

const lookups: Lookups = {
    downloads: async () => ({
        "278": { url: "https://github.com/hmailserver/hmailserver/releases/download/hMailServer-5.7.1-b3116/hMailServer-5.7.1-B3116-x64.exe", version: "5.7.1", build: "3116" },
        "999": { url: "https://evil.example/x.exe", version: "1.0", build: "1" },
    }),
    docSlugs: async () => ({
        latest: ["account", "backup_restore", "scripting_onSMTPdata"],
        "v5.6": ["account", "backup_restore"],
    }),
};

async function check(path: string, status: number | null, location?: string) {
    const response = await legacyRedirect(new URL("https://www.hmailserver.com" + path), lookups);
    if (status === null) {
        assert.equal(response, null, `${path} should pass through`);
        return;
    }
    assert.ok(response, `${path} should be handled`);
    assert.equal(response.status, status, path);
    if (location !== undefined) {
        assert.equal(response.headers.get("Location"), location, path);
    }
}

const SITE = "https://www.hmailserver.com";
const GITHUB_5_7_1 = "https://github.com/hmailserver/hmailserver/releases/download/hMailServer-5.7.1-b3116/hMailServer-5.7.1-B3116-x64.exe";

test("pages of the new site pass through", async () => {
    await check("/", null);
    await check("/download/", null);
    await check("/changelog/", null);
    await check("/changelog/5.7.1/3116/", null);
    await check("/documentation/latest/", null);
    await check("/documentation/latest/backup_restore/", null);
    await check("/?unrelated=1", null);
    await check("/?page=unknownpage", null);
});

test("old CMS ?page= URLs", async () => {
    await check("/?page=download", 301, `${SITE}/download/`);
    await check("/index.php?page=download_archive", 301, `${SITE}/download_archive/`);
    await check("/?page=welcome", 301, `${SITE}/`);
    await check("/?page=features", 301, `${SITE}/functionality/`);
    await check("/?page=contactform", 301, `${SITE}/contact/`);
    await check("/?page=support", 301, `${SITE}/forum/`);
    await check("/?page=download_source", 301, "https://github.com/hmailserver/hmailserver");
    await check("/?page=changelog", 301, `${SITE}/changelog/`);
    await check("/?page=changelog&version=5.6&build=2145", 301, `${SITE}/changelog/5.6/2145/`);
    await check("/index.php?page=changelog&version=5.6", 301, `${SITE}/changelog/5.6/`);
    await check("/?page=background_download_file&downloadid=278", 302, GITHUB_5_7_1);
    await check("/index.php?page=download_mirrors&downloadid=278", 302, GITHUB_5_7_1);
});

test("old page paths", async () => {
    await check("/welcome", 301, `${SITE}/`);
    await check("/contactform", 301, `${SITE}/contact/`);
    await check("/download.php", 301, `${SITE}/download/`);
    await check("/index.php", 301, `${SITE}/`);
    await check("/sitemap.php", 301, `${SITE}/sitemap.xml`);
});

test("downloads", async () => {
    await check("/download_file?downloadid=278", 302, GITHUB_5_7_1);
    await check("/download_getfile?performdownload=1&downloadid=278", 302, GITHUB_5_7_1);
    await check("/download_file.php?downloadid=278", 302, GITHUB_5_7_1);
    await check("/download_file?downloadid=12345", 404);
    await check("/download_file", 404);
    // Only GitHub release assets are redirected to.
    await check("/download_file?downloadid=999", 404);
});

test("changelog query strings", async () => {
    await check("/changelog?version=5.6", 301, `${SITE}/changelog/5.6/`);
    await check("/changelog/?version=5.6&build=2145", 301, `${SITE}/changelog/5.6/2145/`);
    await check("/changelog/?version=5.6&build=2145&prevversion=5.5", 301, `${SITE}/changelog/5.6/2145/`);
    await check("/changelog?downloadid=278", 301, `${SITE}/changelog/5.7.1/3116/`);
    await check("/changelog?downloadid=12345", 301, `${SITE}/changelog/`);
    await check("/changelog.php", 301, `${SITE}/changelog/`);
    // Unsafe values fall back instead of ending up in the path.
    await check("/changelog/?version=../../x", 301, `${SITE}/changelog/`);
    await check("/changelog/?version=5.6&build=%2F%2Fevil", 301, `${SITE}/changelog/5.6/`);
});

test("documentation ?page= URLs", async () => {
    await check("/documentation/latest/?page=backup_restore", 301, `${SITE}/documentation/latest/backup_restore/`);
    await check("/documentation/v5.6/?page=accounts", 301, `${SITE}/documentation/v5.6/account/`);
    await check("/documentation/latest/?page=scripting_onSMTPdata", 301, `${SITE}/documentation/latest/scripting_onSMTPdata/`);
    await check("/documentation/?page=backup_restore", 301, `${SITE}/documentation/latest/backup_restore/`);
    await check("/documentation/index.php?page=backup_restore", 301, `${SITE}/documentation/latest/backup_restore/`);
    await check("/documentation/latest/?page=overview", 301, `${SITE}/documentation/latest/`);
    await check("/documentation/v5.6/?page=changelog", 301, `${SITE}/changelog/5.6/`);
    await check("/documentation/latest/?page=changelog", 301, `${SITE}/changelog/`);
    // Unknown slugs go to their (missing) page, which returns 404.
    await check("/documentation/latest/?page=nosuchpage", 301, `${SITE}/documentation/latest/nosuchpage/`);
    // Slugs are URL-encoded, so they can't escape the version folder.
    await check("/documentation/latest/?page=..%2F..%2Fx", 301, `${SITE}/documentation/latest/..%2F..%2Fx/`);
    // Unknown versions pass through (404 from Pages).
    await check("/documentation/v9.9/?page=account", null);
});

test("statistics endpoint", async () => {
    const response = await legacyRedirect(new URL("http://www.hmailserver.com/statistics/update.php"), lookups);
    assert.ok(response);
    assert.equal(response.status, 200);
    assert.equal(await response.text(), "Thanks!");
});
