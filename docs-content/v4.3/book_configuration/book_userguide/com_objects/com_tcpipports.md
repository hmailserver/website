---
title: "TCPIPPorts collection"
slug: com_tcpipports
parent: com_objects
index: 0
is_book: false
---

The TCPIPPorts collection contains the TCP/IP ports hMailServer should listen on.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [TCPIPPort](?page=com_tcpipport)

<div class="indented">Returns an object from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [TCPIPPort](?page=com_tcpipport)

<div class="indented">Returns an object from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [TCPIPPort](?page=com_tcpipport)

<div class="indented">Adds a new object to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the object with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
