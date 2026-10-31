---
title: "FetchAccounts collection"
slug: com_fetchaccounts
parent: com_objects
index: 0
is_book: false
---

The *FetchAccounts* collection contains zero or more fetch accounts / external accounts.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of objects in this collection.
</div>

#### Property Item(Index As Long) As [FetchAccount](?page=com_fetchaccount)

#### Property ItemByDBID(DBID As Long) As [FetchAccount](?page=com_fetchaccount)

<div class="indented">
Returns the <a href="?page=com_fetchaccount">fetch account</a> by it's given Index or database identifier. If the fetch account does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [FetchAccount](?page=com_fetchaccount)

<div class="indented">
Creates and returns a new fetch account. Call Save() on the returned fetch accountto add it to the collection.
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
