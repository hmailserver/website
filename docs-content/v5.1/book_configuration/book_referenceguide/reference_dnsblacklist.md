---
title: "DNS blacklist"
slug: reference_dnsblacklist
parent: book_referenceguide
index: 0
is_book: false
---

## General

### DNS host

<div class="indented">
The DNS host hMailServer should query when doing a DNS blacklist lookup.
</div>

### Expected result

<div class="indented">
The IP address that the DNS blacklist server will return if the senders IP address is found in the DNS blacklist. It's possible to use wildcards in the IP address. It's not possible to specify several different addresses such as 127.0.0.1 and 127.0.0.4. 127.0.0.* must be used in that case.
</div>

### Rejection message

<div class="indented">
The message that hMailServer will give to the sending client if an email is rejected. 
</div>
