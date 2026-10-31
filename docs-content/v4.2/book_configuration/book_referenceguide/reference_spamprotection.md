---
title: "Spam protection"
slug: reference_spamprotection
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Use SPF

<div class="indented">
Select to enable spam protection using SPF.
</div>

### Check that sender has DNS-MX records

<div class="indented">
If you enable this option, hMailServer will check that the senders domain has valid MX records in the DNS. If not, hMailServer will treat the message as spam.
</div>

### Allow empty sender address

<div class="indented">
Some spammers send email with empty sender address. If you disable this option, hMailServer will treat these messages as spam. However, some legitime email also has empty sender address, so it's recommended that you do not disable this option.
</div>

### Allow plain text authentication

<div class="indented">
This option tells the SMTP server in hMailServer whether or not plain text authentication should be allowed. This option has nothing to do with spam protection. 
</div>

### Tarpitting

<div class="indented">
Tarpitting is an antispam technique that works by slowing down the communication with spammers. 
</div>

### DNS blacklists

<div class="indented">
<a href="?page=reference_dnsblacklist">DNS blacklist reference</a>.
</div>

### User guide

<div class="indented">
More detalied descriptions on how the different anti virus options work can be found in the user guide <a href="?page=feature_antispam">user guide</a>.
</div>
