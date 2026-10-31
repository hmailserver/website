---
title: "DNSBlackList object"
slug: com_dnsblacklist
parent: com_objects
index: 0
is_book: false
---

The DNSBlackList object represents a DNS blacklist set up in hMailServer.

# Version

The below documentation is valid for hMailServer 4.0 and later.

# Properties

#### Property Active As Boolean

<div class="indented">The DNS blacklist is active and, use by hMailServer.</div>

#### Property DNSHost As String

<div class="indented">The host hMailServer should query.</div>

#### Property ExpectedResult As String

<div class="indented">The IP address the query will resolve to if host is in black list.</div>

#### Property ID As Long

<div class="indented">The unique database identifier for the object.</div>

#### Property RejectMessage As String

<div class="indented">The message to send to the client if server rejects message.</div>

# Methods

#### Sub Save()

<div class="indented">
Saves the DNS blacklist in the database.
</div>
