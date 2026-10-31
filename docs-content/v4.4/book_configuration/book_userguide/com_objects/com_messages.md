---
title: "Messages collection"
slug: com_messages
parent: com_objects
index: 0
is_book: false
---

The Messages collection contains messages.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [Message](?page=com_message)

<div class="indented">Returns a message from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [Message](?page=com_message)

<div class="indented">Returns a message from the collection based on it's database identifier.</div>

# Methods

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes a message from the collection (and database) based on it's database identifier.</div>
