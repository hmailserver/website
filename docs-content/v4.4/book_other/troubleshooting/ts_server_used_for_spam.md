---
title: "Server used for spam"
slug: ts_server_used_for_spam
parent: troubleshooting
index: 0
is_book: false
---

## How do I know for sure?

Telnet relay-test.mail-abuse.org from the computer running hMailServer. The remote server will automatically connect back to the mail server running on your computer and execute some tests to check whether your computer can be used for spamming. 
Also check your data-folder. If this folder (not the sub folders) contains a lot of .ema files, say, more than 250, even though no one is currently sending email through your server, it's likely that someone is using your server to send spam.

## What should I do if someone uses my server for spamming?

Check your IP range settings and make sure that you require authentication. Never allow delivery from external to external accounts.
