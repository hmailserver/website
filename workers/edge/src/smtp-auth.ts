// Chooses the SMTP login commands from the server's EHLO reply. No Worker APIs, so it can be tested in Node.
import { base64 } from "./contact.ts";

export interface SmtpStep {
    line: string;
    expectedCode: number;
    // Shown in error messages instead of the line, so the password never ends up in logs.
    logAs: string;
}

// PLAIN if the server offers it, otherwise LOGIN (hMailServer only offers LOGIN).
export function authSteps(ehloReply: string, user: string, password: string): SmtpStep[] {
    const mechanisms = ehloReply
        .split("\n")
        .map((line) => line.slice(4).trim().toUpperCase())
        .filter((line) => line.startsWith("AUTH ") || line.startsWith("AUTH="))
        .flatMap((line) => line.slice(5).split(/\s+/));

    if (mechanisms.includes("PLAIN")) {
        return [{ line: `AUTH PLAIN ${base64(`\0${user}\0${password}`)}`, expectedCode: 235, logAs: "AUTH PLAIN ***" }];
    }
    if (mechanisms.includes("LOGIN")) {
        return [
            { line: "AUTH LOGIN", expectedCode: 334, logAs: "AUTH LOGIN" },
            { line: base64(user), expectedCode: 334, logAs: "<user name>" },
            { line: base64(password), expectedCode: 235, logAs: "<password>" },
        ];
    }
    throw new Error(`SMTP: server offers no supported AUTH mechanism (PLAIN or LOGIN). EHLO reply: ${ehloReply.trim()}`);
}
