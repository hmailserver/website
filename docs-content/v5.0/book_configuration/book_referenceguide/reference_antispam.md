---
title: "Anti spam"
slug: reference_antispam
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Spam mark threshold

When hMailServer runs spam protection, each spam protection mechanism gives a score. If the total score of the message exceeds this value - but stays below Spam delete threshold, the message will be marked as spam.

<div class="indented">
<ul>
    <li>Add X-hMailServer-Spam - Adds a X-hMailServer-Spam MIME header to the email message.</li>
    <li>Add X-hMailServer-Reason - When enabled, hMailServer will add a message header which contains information on why hMailServer considered the email to be spam.</li>
    <li>Add to message subject - Using this setting, you can specify a text that hMailServer should prepend to the message subject. In combination with rules, spam messages can be moved to specific IMAP folders.</li>
</ul>
</div>

### Spam delete threshold

When hMailServer runs spam protection, each spam protection mechanism gives a score. If the total score of the message exceeds this value the message will be deleted and not delivered to its recipients.

### Maximum message size to scan (KB)

If the size of an email message exceeds this size, hMailServer will not scan it for spam. In most cases, spammers sends small messages to save bandwidth so scanning large messages serves no purpose in most cases. Scanning large  messages for spam may require a lot of CPU processing.

## Spam tests

### Use SPF

<div class="indented">Select to enable spam protection using SPF.</div>

<div class="indented">
<h3>Check host in the HELO command</h3>
<div class="indented">Turn on this option if you want hMailServer to check the host name that clients has specified in the HELO command. According to the SMTP specification, the host given in the HELO command should match the IP of the client.  Enabling this may stop spam, but is also a violation of the SMTP RFC - if you have configured your server to delete spam messages. If you have configured your server to deliver spam messages but modifying the Subject header, it is not a violation of the SMTP RFC. Technically, hMailServer checks the A record for the given host to see if it matches the IP address of the connecting client.</div>
</div>

### Check that sender has DNS-MX records

<div class="indented">If you enable this option, hMailServer will check that the senders domain has valid MX records in the DNS. If not, hMailServer will treat the message as spam.</div>

## SpamAssassin

<div class="indented">Use these options if you want hMailServer to integrate with an existing SpamAssassin installation.</div>

## Advanced

### Tarpitting

<div class="indented">Tarpitting is an antispam technique that works by slowing down the communication with spammers.</div>

### Other methods

<div class="indented">
<ul>
    <li><a href="?page=reference_dnsblacklist">DNS blacklist reference</a></li>
    <li><a href="?page=reference_surblserver">SURBL reference</a></li>
    <li><a href="?page=reference_greylisting">Grey listing reference</a></li>
</ul>
</div>

### Related

<div class="indented">
<ul>
    <li><a href="?page=reference_whitelisting">White listing</a></li>
</ul>
</div>

### User guide

<div class="indented">More detalied descriptions on how the different anti virus options work can be found in the user guide <a href="?page=feature_antispam">user guide</a>.</div>

 
