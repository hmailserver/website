---
title: "External accounts"
slug: reference_external_account
parent: book_referenceguide
index: 0
is_book: false
---

## Overview

hMailServer can download messages from POP3 accounts on other servers. Email downloads are delivered to a specific account, but it is possible to redirect them to an external account, using rules. External accounts are defined in the Account settings under the *External accounts* tab.

### Name

<div class="indented">
   The name of the external account. The name is in free text and can be anything you like.
</div>

### Server type

<div class="indented">
Currently only POP3. Support for other protocols, such as IMAP, may be added in future.
</div>

### Server address & TCP Port

<div class="indented">
   The hostname and TCP/IP port of the server hMailServer should connect to when downloading messages.
</div>

### User name & Password

<div class="indented">
The user name and password hMailServer should use when logging on to the external server. This should be the same login information that you normally enter in your email client when logging on to that account. 
</div>

### Settings

<div class="indented">
<i>Minutes between downloads</i> defines how often hMailServer should download messages from the external server. The default value is 30 minutes. It is recommended that you not decrease this value. If you select <i>Delete messages immediately</i>, hMailServer will delete the messages from the external server right after downloading them. The opposite, <i>Do not delete messages</i>, causes hMailServer not to delete messages on the external server. If you select <i>Delete messages after [x] days</i>, hMailServer will automatically delete messages from the POP3 server when they are [x] days old.
</div>

### Notes

- hMailServer 4.0 and 4.1 will download email from external accounts, even if the parent account/domain is disabled. However, if the message is deleted from the remote server, and the local account/domain had been disabled, the message will be lost. To prevent this in future, from version 4.2 onwards, hMailServer will not download email from external accounts if the parent account or domain is disabled.
- You must have SMTP enabled in hMailServer, for the external accounts feature to work.
