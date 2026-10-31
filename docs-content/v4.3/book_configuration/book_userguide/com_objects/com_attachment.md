---
title: "Attachment object"
slug: com_attachment
parent: com_objects
index: 0
is_book: false
---

The *Attachment* object represents an attachment connected to an email [message](?page=com_message).

# Version

The below documentation is valid for hMailServer 4.2 and later

# Properties

#### Property Filename As String

<div class="indented">
The original filename of the attachment.
</div>

#### Property Size As Long

<div class="indented">
Returns the size of the attachment.
</div>

# Methods

#### Sub SaveAs(sName As String)

<div class="indented">
Extracts the content of the attachment from the MIME message and stores it on disk. sName should contain the full path and name of the new file.
</div>

#### Sub Delete()

<div class="indented">Removes this attachment from the message.</div>
