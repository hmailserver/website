---
title: "SURBLServer object"
slug: com_surblserver
parent: com_objects
index: 0
is_book: false
---

The DNSBlackList object represents a DNS blacklist set up in hMailServer.

# Properties

#### Property Active As Boolean

<div class="indented">The SURBL server is active</div>

#### Property DNSHost As String

<div class="indented">The host hMailServer should query.</div>

#### Property ID As Long

<div class="indented">The unique database identifier for the object.</div>

#### Property RejectMessage As String

<div class="indented">The message to send to the client if server rejects message.</div>

# Methods

#### Sub Save()

<div class="indented">
Saves the SURBL server in the database.
</div>
