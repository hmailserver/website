// Minimal SMTP client for sending one message through the hMailServer mail server (submission port, AUTH).
import { connect } from "cloudflare:sockets";
import { authSteps } from "./smtp-auth.ts";

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
        let ehloReply = await session.command(`EHLO ${config.heloName}`, 250);

        if (config.security === "starttls") {
            await session.command("STARTTLS", 220);
            session.release();
            socket = socket.startTls();
            session = new SmtpSession(socket);
            // Capabilities can differ after STARTTLS, so ask again.
            ehloReply = await session.command(`EHLO ${config.heloName}`, 250);
        }

        for (const step of authSteps(ehloReply, config.user, config.password)) {
            await session.command(step.line, step.expectedCode, step.logAs);
        }
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

    // Sends a command, checks the reply code and returns the reply.
    // logAs replaces the command in error messages (e.g. to hide the password).
    async command(line: string, expectedCode: number, logAs = line): Promise<string> {
        await this.writer.write(this.encoder.encode(line + "\r\n"));
        return this.expect(expectedCode, logAs);
    }

    // Reads one (possibly multi-line) reply, checks its code and returns it.
    async expect(expectedCode: number, after = "connect"): Promise<string> {
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
        return reply;
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
