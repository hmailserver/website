// Minimal SMTP client for sending one message through the hMailServer mail server (submission, AUTH PLAIN).
import { connect } from "cloudflare:sockets";
import { base64 } from "./contact.ts";

export interface SmtpConfig {
    host: string;
    port: number;
    // "starttls" upgrades the connection before logging in. "none" sends the password unencrypted.
    security: "starttls" | "none";
    user: string;
    password: string;
    heloName: string;
}

export async function sendMail(config: SmtpConfig, from: string, to: string, message: string): Promise<void> {
    let socket = connect(
        { hostname: config.host, port: config.port },
        { secureTransport: config.security === "starttls" ? "starttls" : "off", allowHalfOpen: false },
    );
    let session = new SmtpSession(socket);

    try {
        await session.expect(220);
        await session.command(`EHLO ${config.heloName}`, 250);

        if (config.security === "starttls") {
            await session.command("STARTTLS", 220);
            session.release();
            socket = socket.startTls();
            session = new SmtpSession(socket);
            await session.command(`EHLO ${config.heloName}`, 250);
        }

        await session.command(`AUTH PLAIN ${base64(`\0${config.user}\0${config.password}`)}`, 235, "AUTH PLAIN ***");
        await session.command(`MAIL FROM:<${from}>`, 250);
        await session.command(`RCPT TO:<${to}>`, 250);
        await session.command("DATA", 354);
        // Lines starting with "." must be doubled (RFC 5321 4.5.2). The base64 body never has them, but headers could.
        await session.command(message.replace(/^\./gm, "..") + "\r\n.", 250, "<message>");
        await session.command("QUIT", 221);
    } finally {
        session.release();
        await socket.close().catch(() => {});
    }
}

class SmtpSession {
    private reader: ReadableStreamDefaultReader<Uint8Array>;
    private writer: WritableStreamDefaultWriter<Uint8Array>;
    private buffer = "";
    private decoder = new TextDecoder();
    private encoder = new TextEncoder();

    constructor(socket: { readable: ReadableStream<Uint8Array>; writable: WritableStream<Uint8Array> }) {
        this.reader = socket.readable.getReader();
        this.writer = socket.writable.getWriter();
    }

    // Sends a command and checks the reply code. logAs replaces the command in error messages (e.g. to hide the password).
    async command(line: string, expectedCode: number, logAs = line): Promise<void> {
        await this.writer.write(this.encoder.encode(line + "\r\n"));
        await this.expect(expectedCode, logAs);
    }

    // Reads one (possibly multi-line) reply and checks its code.
    async expect(expectedCode: number, after = "connect"): Promise<void> {
        let reply = "";
        for (;;) {
            const line = await this.readLine();
            reply += line + "\n";
            if (!/^\d{3}-/.test(line)) break;
        }
        const code = parseInt(reply.slice(0, 3), 10);
        if (code !== expectedCode) {
            throw new Error(`SMTP: expected ${expectedCode} after ${after}, got: ${reply.trim()}`);
        }
    }

    release(): void {
        // Can throw if a read is still pending after an error; the socket is closed anyway.
        try { this.reader.releaseLock(); } catch {}
        try { this.writer.releaseLock(); } catch {}
    }

    private async readLine(): Promise<string> {
        for (;;) {
            const end = this.buffer.indexOf("\r\n");
            if (end >= 0) {
                const line = this.buffer.slice(0, end);
                this.buffer = this.buffer.slice(end + 2);
                return line;
            }
            const { value, done } = await this.reader.read();
            if (done) {
                throw new Error("SMTP: connection closed by server");
            }
            this.buffer += this.decoder.decode(value, { stream: true });
        }
    }
}
