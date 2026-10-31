---
title: "GreyListingWhiteAddresses collection"
slug: com_greylistingwhiteaddresses
parent: com_objects
index: 0
is_book: false
---

The GreyListingWhiteAddresses collection contains IP addresses which won't be effected by grey listing.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [GreyListingWhiteAddress](?page=com_com_greylistingwhiteaddress)

<div class="indented">Returns an object from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [GreyListingWhiteAddress](?page=com_greylistingwhiteaddress)

<div class="indented">Returns an object from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [GreyListingWhiteAddress](?page=com_greylistingwhiteaddress)

<div class="indented">Adds a new object to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the object with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
