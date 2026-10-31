---
title: "Recipient object"
slug: com_recipient
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.2 and later.

The *Recipient* object contains an recipient connected to an e-mail message.

# Properties

#### Property Address As String

<div class="indented">
The e-mail address of the recipient. The address is in the format user@domain.com.
</div>

#### Property IsLocalUser As Boolean

<div class="indented">
Returns true if the recipient is a local user. If the recipient is external, it returns false.
</div>
