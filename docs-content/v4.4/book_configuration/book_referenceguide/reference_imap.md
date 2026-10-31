---
title: "IMAP settings"
slug: reference_imap
parent: book_referenceguide
index: 0
is_book: false
---

<h3><span class="Title">General</span></h3>

### Connections

<div class="indented"> This setting defines the maximum number of simultaneous connections that will be allowed to the POP3 server. If zero is specified, an unlimited number of connections will be allowed. </div>

### Other / Welcome message

<div class="indented"> The welcome message is sent to IMAP clients directly after they connect to the server. One reason to change this message is if you don't want anyone to know what kind of server software you are using.  </div>

<h3><span class="Title">Advanced</span><span class="Title"></span></h3>

### Extensions

Use these settings to enable and disable IMAP extensions on the server.

- [The IMAP SORT extension](?page=feature_imap_sort) allows email messages to be sorted on the server instead of in the email client. This increases the performance in web mail clients.
- IMAP Quota - The IMAP Quota extension makes it possible for IMAP clients to check the quota usage for the account.
- IMAP Idle - Using this extension, IMAP client can receive notifications from the server whenever a new email exist. This way the email client does not have to manually check for new messages every X minute.
