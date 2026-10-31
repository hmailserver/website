---
title: "Aliases collection"
slug: com_aliases
parent: com_objects
index: 0
is_book: false
---

The *Aliases* collection contains zero or more aliases.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of aliases in this collection.
</div>

#### Property Item(Index As Long) As [Alias](?page=com_alias)

#### Property ItemByDBID(DBID As Long) As [Alias](?page=com_alias)

#### Property ItemByName(Name As String) As [Alias](?page=com_alias)

<div class="indented">
Returns the <a href="?page=com_alias">alias</a> by it's given Index, database identifier or name. If the alias does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [](?page=com_domain)[Alias](?page=com_alias)

<div class="indented">
Creates and returns a new alias. Call Save() on the returned alias to add it to the collection.
</div>

#### Sub Refresh()

<div class="indented">
Refreshes the collection from the database.
</div>

#### Sub Delete(Index As Long)

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">
Deletes an object in the collection by it's index or database identifier. 
</div>
