---
title: "SURBLServers collection"
slug: com_surblservers
parent: com_objects
index: 0
is_book: false
---

The SURBLServers collection contains the SURBL servers defined in the hMailServer installation.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [SURBLServer](?page=com_surblserver)

<div class="indented">Returns an object from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [SURBLServer](?page=com_surblserver)

<div class="indented">Returns an object from the collection based on it's database identifier.</div>

#### Property ItemByDNSHost(sDNSHost As String) As [SURBLServer](?page=com_surblserver)

<div class="indented">Returns an object from the collection based on it's DNS host.</div>

# Methods

#### Function Add() As [SURBLServer](?page=com_surblserver)

<div class="indented">Adds a new SURBL server to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the SURBL server with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
