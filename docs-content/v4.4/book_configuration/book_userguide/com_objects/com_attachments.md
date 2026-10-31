---
title: "Attachments collection"
slug: com_attachments
parent: com_objects
index: 0
is_book: false
---

The *Attachments* collection contains zero or more attachments. The attachments collection is normally connected to a specific e-mail message.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of attachments in this collection.
</div>

#### Property Item(Index As Long) As [Attachment](?page=com_attachment)

<div class="indented">Returns the Attachment by an given index.</div>

# Methods

#### Sub Add(sFilename As String)

<div class="indented">Adds an attachment to the collection. sFilename should contain the full path to the file to add.</div>

#### Sub Clear()

<div class="indented">Removes all attachments from the message.</div>
