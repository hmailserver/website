// Contact form: validation, Turnstile verification and building the email. No I/O except verifyTurnstile().

export interface ContactMessage {
    subject: string;
    name: string;
    company: string;
    email: string;
    message: string;
}

export interface MailOptions {
    from: string;
    to: string;
    ip: string;
    date: Date;
    messageId: string;
}

const LIMITS = { subject: 200, name: 200, company: 200, email: 254, message: 20000 };

// Returns the validated message, or an error text to show the visitor.
export function parseContactForm(form: FormData): ContactMessage | string {
    const field = (name: string) => {
        const value = form.get(name);
        return typeof value === "string" ? value.trim() : "";
    };

    // Header fields must stay on one line, so control characters (CR/LF included) are removed.
    const singleLine = (value: string) => value.replace(/[\u0000-\u001f\u007f]+/g, " ").trim();

    const message: ContactMessage = {
        subject: singleLine(field("contactsubject")),
        name: singleLine(field("contactname")),
        company: singleLine(field("contactcompany")),
        email: field("contactemail"),
        message: field("contactmessage").replace(/\r\n|\r|\n/g, "\r\n"),
    };

    if (!isValidEmail(message.email)) {
        return "Please enter a valid e-mail address.";
    }
    if (message.message === "") {
        return "Please enter a message.";
    }
    for (const [key, limit] of Object.entries(LIMITS)) {
        if (message[key as keyof ContactMessage].length > limit) {
            return `The ${key} is too long.`;
        }
    }
    return message;
}

export function isValidEmail(email: string): boolean {
    return email.length <= LIMITS.email && /^[^\s@<>()",;:\\[\]]+@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)+$/.test(email);
}

export interface TurnstileResult {
    success: boolean;
    hostname?: string;
    action?: string;
}

export async function verifyTurnstile(token: string, secret: string, ip: string, fetchFn: typeof fetch = fetch): Promise<TurnstileResult> {
    const body = new FormData();
    body.append("secret", secret);
    body.append("response", token);
    body.append("remoteip", ip);
    const response = await fetchFn("https://challenges.cloudflare.com/turnstile/v0/siteverify", { method: "POST", body });
    if (!response.ok) {
        return { success: false };
    }
    return (await response.json()) as TurnstileResult;
}

// RFC 5322 message, with UTF-8 headers (RFC 2047) and a base64 body. Same format as the old PHP form.
export function buildEmail(contact: ContactMessage, options: MailOptions): string {
    const body = [
        `Company: ${contact.company}`,
        `IP address: ${options.ip}`,
        "Type: contact",
        "Message: ",
        contact.message,
        "",
    ].join("\r\n");

    // A display name with special characters (quotes, commas, <, ...) must be encoded to keep the header valid.
    const plainName = /^[A-Za-z0-9 !#$%&'*+\-/=?^_`{|}~]*$/.test(contact.name);
    const displayName = plainName ? contact.name : encodeHeader(contact.name, true);
    const replyTo = contact.name === "" ? `<${contact.email}>` : `${displayName} <${contact.email}>`;

    const headers = [
        `From: hMailServer Website <${options.from}>`,
        `To: <${options.to}>`,
        `Reply-To: ${replyTo}`,
        `Subject: ${encodeHeader("hMailServer Question: " + contact.subject)}`,
        `Date: ${options.date.toUTCString().replace("GMT", "+0000")}`,
        `Message-ID: <${options.messageId}>`,
        "MIME-Version: 1.0",
        "Content-Type: text/plain; charset=utf-8",
        "Content-Transfer-Encoding: base64",
    ];

    return headers.join("\r\n") + "\r\n\r\n" + wrap(base64(body), 76).join("\r\n") + "\r\n";
}

// Encoded words of at most 75 characters (RFC 2047), folded onto separate lines.
// Printable ASCII is left as is, unless force is set.
export function encodeHeader(text: string, force = false): string {
    if (!force && /^[\x20-\x7e]*$/.test(text)) {
        return text;
    }
    const words: string[] = [];
    let chunk = "";
    for (const char of text) {
        // 45 bytes of UTF-8 encode to 60 base64 characters, which keeps each word under 75.
        if (new TextEncoder().encode(chunk + char).length > 45) {
            words.push(chunk);
            chunk = "";
        }
        chunk += char;
    }
    words.push(chunk);
    return words.map((word) => `=?UTF-8?B?${base64(word)}?=`).join("\r\n ");
}

export function base64(text: string): string {
    let binary = "";
    for (const byte of new TextEncoder().encode(text)) {
        binary += String.fromCharCode(byte);
    }
    return btoa(binary);
}

function wrap(text: string, width: number): string[] {
    const lines: string[] = [];
    for (let i = 0; i < text.length; i += width) {
        lines.push(text.slice(i, i + width));
    }
    return lines;
}
