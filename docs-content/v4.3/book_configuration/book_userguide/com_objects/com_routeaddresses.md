---
title: "RouteAddresses object"
slug: com_routeaddresses
parent: com_objects
index: 0
is_book: false
---

The RouteAddresses collection contains the email addresses connected to a hMailServer route.

# Version

The below documentation is valid for hMailServer 4.1 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As RouteAddress

<div class="indented">Returns an RouteAddress from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As RouteAddress

<div class="indented">Returns an RouteAddress from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As RouteAddress

<div class="indented">Adds a new IP address to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the given email address from the collecton.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the email address with the specified database identifier.</div>
