// Cloudflare Worker in front of the static site (GitHub Pages). Runs only on the routes in wrangler.toml:
// redirects for URLs of the old PHP site, the retired statistics endpoint, and the contact form.
import { legacyRedirect, type Lookups } from "./redirects.ts";
import { buildEmail, parseContactForm, verifyTurnstile } from "./contact.ts";
import { sendMail } from "./smtp.ts";

export interface Env {
    // Variables (wrangler.toml)
    SMTP_HOST: string;
    SMTP_PORT: string;
    SMTP_SECURITY: "starttls" | "none";
    SMTP_USER: string;
    MAIL_FROM: string;
    ALLOWED_HOSTNAMES: string;
    // Secrets (wrangler secret put)
    SMTP_PASSWORD: string;
    TURNSTILE_SECRET: string;
    MAIL_TO: string;
    BLOCKED_IPS?: string;
}

const SMTP_TIMEOUT_MS = 20000;

export default {
    async fetch(request: Request, env: Env): Promise<Response> {
        const url = new URL(request.url);

        if (url.pathname === "/api/contact") {
            return handleContact(request, env);
        }

        const response = await legacyRedirect(url, siteLookups(url.origin));
        return response ?? fetch(request);
    },
};

// Lookup files published with the site (see scripts/build-site.php), cached at the edge for 5 minutes.
function siteLookups(origin: string): Lookups {
    const load = async (path: string) => {
        const response = await fetch(origin + path, { cf: { cacheTtl: 300, cacheEverything: true } });
        if (!response.ok) {
            throw new Error(`Could not load ${path}: ${response.status}`);
        }
        return response.json();
    };
    return {
        downloads: () => load("/data/download-ids.json") as ReturnType<Lookups["downloads"]>,
        docSlugs: () => load("/data/doc-slugs.json") as ReturnType<Lookups["docSlugs"]>,
    };
}

async function handleContact(request: Request, env: Env): Promise<Response> {
    if (request.method !== "POST") {
        return new Response("Method not allowed.", { status: 405, headers: { Allow: "POST" } });
    }

    const ip = request.headers.get("CF-Connecting-IP") ?? "";
    const blocked = (env.BLOCKED_IPS ?? "").split(",").map((s) => s.trim()).filter(Boolean);
    if (blocked.includes(ip)) {
        return errorPage(403, "Your message could not be sent.");
    }

    const form = await request.formData();
    const token = form.get("cf-turnstile-response");
    const turnstile = typeof token === "string" ? await verifyTurnstile(token, env.TURNSTILE_SECRET, ip) : { success: false };
    const allowedHostnames = env.ALLOWED_HOSTNAMES.split(",").map((s) => s.trim());
    if (!turnstile.success || !allowedHostnames.includes(turnstile.hostname ?? "") || turnstile.action !== "contact") {
        return errorPage(400, "The spam check failed. Please go back, reload the page and try again.");
    }

    const contact = parseContactForm(form);
    if (typeof contact === "string") {
        return errorPage(400, contact);
    }

    const email = buildEmail(contact, {
        from: env.MAIL_FROM,
        to: env.MAIL_TO,
        ip,
        date: new Date(),
        messageId: `${crypto.randomUUID()}@hmailserver.com`,
    });

    const smtpConfig = {
        host: env.SMTP_HOST,
        port: parseInt(env.SMTP_PORT, 10),
        security: env.SMTP_SECURITY,
        user: env.SMTP_USER,
        password: env.SMTP_PASSWORD,
        heloName: "www.hmailserver.com",
    };
    const timeout = new Promise<never>((_, reject) => setTimeout(() => reject(new Error("SMTP: timed out")), SMTP_TIMEOUT_MS));

    try {
        await Promise.race([sendMail(smtpConfig, env.MAIL_FROM, env.MAIL_TO, email), timeout]);
    } catch (error) {
        console.error("Contact form: sending failed:", error);
        return errorPage(502, "Your message could not be sent, please try again later.");
    }

    return Response.redirect(new URL("/contact_received/", request.url).toString(), 303);
}

function errorPage(status: number, text: string): Response {
    const escaped = text.replace(/&/g, "&amp;").replace(/</g, "&lt;");
    const html = `<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><title>Contact - hMailServer</title></head>`
        + `<body><p>${escaped}</p><p><a href="/contact/">Back to the contact form</a></p></body></html>`;
    return new Response(html, { status, headers: { "Content-Type": "text/html; charset=utf-8" } });
}
