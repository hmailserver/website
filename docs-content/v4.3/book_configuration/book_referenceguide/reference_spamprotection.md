---
title: "Spam protection"
slug: reference_spamprotection
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Use SPF

<div class="indented">Select to enable spam protection using SPF.</div>

<div class="indented">
<h3>Check host in the HELO command<br></h3>
<div class="indented">Turn on this option if you want hMailServer to check the host name that clients has specified in the HELO command. According to the SMTP specification, the host given in the HELO command should match the IP of the client. <br> </div>
</div>

### Check that sender has DNS-MX records

<div class="indented">If you enable this option, hMailServer will check that the senders domain has valid MX records in the DNS. If not, hMailServer will treat the message as spam.</div>

<div class="indented">
<h3>When spam have been detected...<br></h3>
<div class="indented">Use these settings to define what you want hMailServer to do when spam has been detected. The default behaviour is that hMailServer deletes the message, but it's possible to modify message headers instead.</div>
<div class="indented">
<ul>
    <li>Add X-hMailServer-Spam - Adds a X-hMailServer-Spam MIME header to the email message.</li>
    <li>Add X-hMailServer-Reason - When enabled, hMailServer will add a message header which contains information on why hMailServer considered the email to be spam.</li>
    <li>Add to message subject - Using this setting, you can specify a text that hMailServer should prepend to the message subject. In combination with rules, spam messages can be moved to specific IMAP folders.</li>
</ul>
</div>
</div>

### Tarpitting

<div class="indented"> Tarpitting is an antispam technique that works by slowing down the communication with spammers.  </div>

### Other methods

<div class="indented">
<ul>
    <li><a href="?page=reference_dnsblacklist">DNS blacklist reference</a></li>
    <li><a href="?page=reference_surblserver">SURBL reference</a></li>
    <li><a href="?page=reference_greylisting">Grey listing reference</a></li>
</ul>
</div>

### User guide

<div class="indented"> More detalied descriptions on how the different anti virus options work can be found in the user guide <a href="?page=feature_antispam">user guide</a>. </div>
