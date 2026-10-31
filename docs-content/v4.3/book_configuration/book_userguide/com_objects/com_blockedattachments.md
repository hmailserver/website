---
title: "BlockedAttachments collection"
slug: com_blockedattachments
parent: com_objects
index: 0
is_book: false
---

The BlockedAttachments collection contains the blocked attachment wildcards defined in the hMailServer installation.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [BlockedAttachment](?page=com_blockedattachment)

<div class="indented">Returns an object from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [BlockedAttachment](?page=com_blockedattachment)

<div class="indented">Returns an object from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [BlockedAttachment](?page=com_blockedattachment)

<div class="indented">Adds a new object to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the object with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
