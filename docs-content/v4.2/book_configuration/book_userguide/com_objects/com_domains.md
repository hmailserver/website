---
title: "Domains collection"
slug: com_domains
parent: com_objects
index: 0
is_book: false
---

The *Domains* collection contains zero or more domains.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of domains in this collection.
</div>

#### Property Item(Index As Long) As [Domain](?page=com_domain)

#### Property ItemByDBID(DBID As Long) As [Domain](?page=com_domain)

#### Function ItemByName(ItemName As String) As [Domain](?page=com_domain)

<div class="indented">
Returns the domain by it's given Index, database identifier or name. If the <a href="?page=com_domain">domain</a>does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [Domain](?page=com_domain)

<div class="indented">
Creates and returns a new <a href="?page=com_domain">domain</a>. Call Save() on the returned domain to add it to the collection.
</div>

#### Sub Refresh()

<div class="indented">
Refreshes the collection from the database.
</div>
