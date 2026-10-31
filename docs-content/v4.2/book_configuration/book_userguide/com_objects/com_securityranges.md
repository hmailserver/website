---
title: "SecurityRanges collection"
slug: com_securityranges
parent: com_objects
index: 0
is_book: false
---

The SecurityRanges collection contains the security ranges / IP ranges that hMailServer use.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [SecurityRange](?page=com_securityrange)

<div class="indented">Returns a security range from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [SecurityRange](?page=com_securityrange)

<div class="indented">Returns a security range from the collection based on it's database identifier.</div>

#### Property ItemByName(sName As String) As [SecurityRange](?page=com_securityrange)

<div class="indented">Returns a security range from the collection based on it's name.</div>

# Methods

#### Function Add() As [SecurityRange](?page=com_securityrange)

<div class="indented">Adds a new security range to the collection.</div>

#### Sub Delete(Index As Long)

<div class="indented">Deletes an object in the database by it's index in the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes an object in the collection based on it's database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection.</div>
