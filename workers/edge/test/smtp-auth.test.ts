import { test } from "node:test";
import assert from "node:assert/strict";
import { authSteps } from "../src/smtp-auth.ts";

// The EHLO reply hMailServer sent (multi-line reply, joined with "\n" like SmtpSession does).
const HMAILSERVER_EHLO = "250-mail.hmailserver.com\n250-SIZE 209715200\n250-STARTTLS\n250-AUTH LOGIN\n250 HELP\n";

test("hMailServer offers only LOGIN", () => {
    const steps = authSteps(HMAILSERVER_EHLO, "website@hmailserver.com", "secret");
    assert.deepEqual(steps.map((s) => [s.line, s.expectedCode]), [
        ["AUTH LOGIN", 334],
        [btoa("website@hmailserver.com"), 334],
        [btoa("secret"), 235],
    ]);
});

test("PLAIN is preferred when offered", () => {
    const steps = authSteps("250-host\n250-AUTH LOGIN PLAIN\n250 OK\n", "u", "p");
    assert.equal(steps.length, 1);
    assert.equal(steps[0].line, `AUTH PLAIN ${btoa("\0u\0p")}`);
});

test("the password never appears in logAs", () => {
    for (const ehlo of [HMAILSERVER_EHLO, "250-host\n250 AUTH PLAIN\n"]) {
        for (const step of authSteps(ehlo, "user", "hunter2")) {
            assert.ok(!step.logAs.includes("hunter2") && !step.logAs.includes(btoa("hunter2")), step.logAs);
        }
    }
});

test("no supported mechanism", () => {
    assert.throws(() => authSteps("250-host\n250 AUTH CRAM-MD5\n", "u", "p"), /no supported AUTH mechanism/);
    assert.throws(() => authSteps("250-host\n250 HELP\n", "u", "p"), /no supported AUTH mechanism/);
});
