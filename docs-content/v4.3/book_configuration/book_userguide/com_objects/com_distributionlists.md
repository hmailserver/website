---
title: "DistributionLists object"
slug: com_distributionlists
parent: com_objects
index: 0
is_book: false
---

The DistributionLists collection contains the distribution lists connected to the parent domain.

# Version

The below documentation is valid for hMailServer 4.0 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [DistributionList](?page=com_distributionlist)

<div class="indented">Returns a distribution list from the collection based on it's index in the collection.</div>

#### Property ItemByAddress(sAddress As String) As [DistributionList](?page=com_distributionlist)

<div class="indented">Returns a distribution list from the collection based on it's email address.</div>

#### Property ItemByDBID(DBID As Long) As [DistributionList](?page=com_distributionlist)

<div class="indented">Returns a distribution list from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [DistributionList](?page=com_distributionlist)

<div class="indented">Adds a new distribution list to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the distribution list with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
