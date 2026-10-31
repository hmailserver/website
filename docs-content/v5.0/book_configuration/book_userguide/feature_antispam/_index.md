---
title: "Anti-spam"
slug: feature_antispam
parent: book_userguide
index: 0
is_book: false
---

## Overview

hMailServer has a number of built-in spam protection methods. Theese work by checking the sender of email messages, the content of the message and the way the message is delivered to hMailServer. For example, if the email message contains links to spammer web pages, or is sent from an address which is known to send spam, the message may be classified as spam. A complete list of built-in spam protection methods [can be found here](?page=feature_antispam_methods).

## Spam scoring

Each of the tests performed by hMailServer generates a Spam score. If a specific spam test then tells hMailServer that the message is spam, a configured - or calculated - spam score is added to the message. When all the spam tests are run, hMailServer compares the total spam score of the message to two different thresholds set up in hMailServer.

The first threshold is the Mark threshold. If the total spam score for the message reaches the Mark spam threshold, the subject of the email message is modified to indicate that the message contains spam. Using marking of messages, users can easier find and delete the spam message, or you as a server administrator can set up Rules to move the spam messages to a specific IMAP folder, or forward them to a specific folder.  

  

The second spam threshold is the Delete threshold. If the message reaches this threshold, the message is deleted.

### When is spam protection run?

hMailServer tries to determine whether the message is spam as early as possible in the communication with the email sender. The earlier the detection is made, the less resources from your server will be required to handle the email message. Another benefit with early detection is that hMailServer can more easily tell the sender that the message is rejected due to spam protection and the sender can be notified.

If an email message is delivered to hMailServer using SMTP, hMailServer does spam protection in the following stages:

- After the RCPT TO command. When the recipient of the message has been specified, hMailServer runs spam protection.
- After the DATA command. When the entire message has been transmitted to hMailServer, hMailServer runs spam protection on the message content.

If hMailServer downloads messages from an external account, spam protection is run before the message is saved in the account folder.

### Which messages are scanned?

hMailServer scans all messages which are delivered to use accounts, assuming the following is met:

- The message is delivered to hMailServer by SMTP, or downloaded from an external account using POP3.
- At least one spam protection method is enabled in the Anti-spam setting.
- The sender IP address or domain is not white listed using a white listing record.
- The senders IP address matches an IP range where Anti-spam is enabled.

## Related information

### IP ranges

It is possible to turn off hMailServer's spam protection functionality per IP range. For example, one normally does not have to check for spam on one's local network. Consult the IP range documentation for more information on this.

### White listing

It's possible to use [white listing records](?page=feature_antispam_whitelisting) to disable spam protection for email messages sent from specific email or IP addresses. This is a more flexible solution than to use IP ranges.
