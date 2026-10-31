---
title: "Accounts collection"
slug: com_accounts
parent: com_objects
index: 0
is_book: false
---

The *Accounts* collection contains zero or more accounts connected to a specific domain.

# Version

The below documentation is valid for hMailServer 4.2 and later

# Properties

#### Property Count As Long

<div class="indented">
The number of accounts in this collection.
</div>

#### Property Item(Index As Long) As [Account](?page=com_account)

#### Property ItemByDBID(DBID As Long) As [Account](?page=com_account)

#### Property ItemByAddress(Address As String) As [Account](?page=com_account)

<div class="indented">
Returns the <a href="?page=com_account">account</a> by it's given Index, database identifier or address. If the account does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [Account](?page=com_account)

<div class="indented">
Creates and returns a new account. Call Save() on the returned accountto add it to the collection.
</div>

#### Sub Delete(Index As Long)

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">
Deletes an object in the collection by it's index or database identifier. 
</div>

#### Sub Refresh()

<div class="indented">
Refreshes the collection from the database.
</div>
