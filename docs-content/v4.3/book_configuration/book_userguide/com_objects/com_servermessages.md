---
title: "ServerMessages collection"
slug: com_servermessages
parent: com_objects
index: 0
is_book: false
---

The ServerMessages collection contains the auto-generated messages that hMailServer sends to clients, for example when a virus has been detected in a message. The list of messages is pre-defined and it's not possible to add or delete messages - just to modify them.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [ServerMessage](?page=com_servermessage)

<div class="indented">Returns an object from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [ServerMessage](?page=com_servermessage)

<div class="indented">Returns an object from the collection based on it's database identifier.</div>

# Methods

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
