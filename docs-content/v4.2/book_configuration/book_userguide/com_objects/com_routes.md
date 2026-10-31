---
title: "Routes collection"
slug: com_routes
parent: com_objects
index: 0
is_book: false
---

The Routes collection contains the email addresses connected to a hMailServer route.

# Version

The below documentation is valid for hMailServer 4.1 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As Route

<div class="indented">Returns an route from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As Route

<div class="indented">Returns an route from the collection based on it's database identifier.</div>

#### Property ItemByName(ItemName As String) As Route

<div class="indented">Returns an route from the collection based on it's name.</div>

# Methods

#### Function Add() As Route

<div class="indented">Adds a new route to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes an object in the database by it's given database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection.</div>
