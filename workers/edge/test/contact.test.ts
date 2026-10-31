import { test } from "node:test";
import assert from "node:assert/strict";
import { buildEmail, encodeHeader, isValidEmail, parseContactForm, type ContactMessage } from "../src/contact.ts";

function form(fields: Record<string, string>): FormData {
    const data = new FormData();
    for (const [key, value] of Object.entries(fields)) data.append(key, value);
    return data;
}

const valid = { contactsubject: "Hello", contactname: "Jane Doe", contactcompany: "Acme", contactemail: "jane@example.com", contactmessage: "Hi\nthere" };

test("valid form", () => {
    const result = parseContactForm(form(valid)) as ContactMessage;
    assert.equal(typeof result, "object");
    assert.equal(result.email, "jane@example.com");
    assert.equal(result.message, "Hi\r\nthere");
});

test("invalid forms return an error text", () => {
    assert.equal(typeof parseContactForm(form({ ...valid, contactemail: "nope" })), "string");
    assert.equal(typeof parseContactForm(form({ ...valid, contactmessage: "  " })), "string");
    assert.equal(typeof parseContactForm(form({ ...valid, contactsubject: "x".repeat(201) })), "string");
});

test("email validation", () => {
    assert.ok(isValidEmail("a.b+c@sub.example.com"));
    for (const bad of ["a@b", "a b@example.com", "a@example.com\r\nBcc: x@example.com", "<a@example.com>", "a@example.com, b@example.com", ""]) {
        assert.ok(!isValidEmail(bad), bad);
    }
});

test("header injection is not possible", () => {
    const result = parseContactForm(form({ ...valid, contactsubject: "Hi\r\nBcc: victim@example.com", contactname: "X\nBcc: y@example.com" })) as ContactMessage;
    const email = buildEmail(result, { from: "website@hmailserver.com", to: "me@example.com", ip: "192.0.2.1", date: new Date(0), messageId: "id@hmailserver.com" });
    const headers = email.split("\r\n\r\n")[0];
    assert.ok(!/^Bcc:/im.test(headers), headers);
    assert.ok(!/\n(?![ ]|[A-Z][A-Za-z-]+: )/.test(headers.replace(/\r\n/g, "\n")), "every header line is a header or a folded continuation");
});

test("email format", () => {
    const result = parseContactForm(form({ ...valid, contactname: "Jörg \"JJ\" <x>", contactsubject: "Grüße" })) as ContactMessage;
    const email = buildEmail(result, { from: "website@hmailserver.com", to: "me@example.com", ip: "192.0.2.1", date: new Date(Date.UTC(2026, 9, 31, 12, 0, 0)), messageId: "id@hmailserver.com" });
    const [headers, body] = email.split("\r\n\r\n");
    assert.match(headers, /^From: hMailServer Website <website@hmailserver.com>$/m);
    assert.match(headers, /^Reply-To: =\?UTF-8\?B\?[A-Za-z0-9+/=]+\?= <jane@example.com>$/m);
    assert.match(headers, /^Subject: =\?UTF-8\?B\?/m);
    assert.match(headers, /^Date: Sat, 31 Oct 2026 12:00:00 \+0000$/m);
    const decoded = new TextDecoder().decode(Uint8Array.from(atob(body.replace(/\r\n/g, "")), (c) => c.charCodeAt(0)));
    assert.match(decoded, /^Company: Acme\r\nIP address: 192\.0\.2\.1\r\nType: contact\r\nMessage: \r\nHi\r\nthere/);
    for (const line of email.split("\r\n")) assert.ok(line.length <= 998);
});

test("long UTF-8 headers are split into valid encoded words", () => {
    const encoded = encodeHeader("ä".repeat(100));
    for (const word of encoded.split("\r\n ")) {
        assert.ok(word.length <= 75, word);
        assert.match(word, /^=\?UTF-8\?B\?[A-Za-z0-9+/=]+\?=$/);
    }
    assert.equal(encodeHeader("plain ascii"), "plain ascii");
});
