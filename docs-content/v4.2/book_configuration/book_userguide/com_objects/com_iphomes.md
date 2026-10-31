---
title: "IPHomes object"
slug: com_iphomes
parent: com_objects
index: 0
is_book: false
---

The IPHomes collection contains the IP addresses that hMailServer should use when multihoming is enabled.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [IPHome](?page=com_iphome)

<div class="indented">Returns an IPHome from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [IPHome](?page=com_iphome)

<div class="indented">Returns an IPHome from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [IPHome](?page=com_iphome)

<div class="indented">Adds a new IP home to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the IP home with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
