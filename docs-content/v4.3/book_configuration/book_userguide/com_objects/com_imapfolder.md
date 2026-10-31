---
title: "IMAPFolder object"
slug: com_imapfolder
parent: com_objects
index: 0
is_book: false
---

IMAPFolder represents a IMAP folder.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property ID As Long

<div class="indented">
The database identifier for the IMAP folder.
</div>

#### Property Name As String

<div class="indented">
The name of the IMAP folder
</div>

*Property SubFolders As IMAPFolders*

<div class="indented">Returns a collection of the sub folders to this IMAP folder.</div>

#### Property Subscribed As Boolean

<div class="indented">
True if the folder is subscribed, false otherwise.
</div>

#### Property Messages As Messages

<div class="indented">
A collection containing the messages in this IMAP folder.
</div>
