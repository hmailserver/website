---
title: "DomainAliases object"
slug: com_domainaliases
parent: com_objects
index: 0
is_book: false
---

The DomainAliases collection contains the aliases of a domain set up in hMailServer.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [DomainAlias](?page=com_domainalias)

<div class="indented">Returns an domain alias from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [DomainAlias](?page=com_domainalias)

<div class="indented">Returns an domain alias from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [DomainAlias](?page=com_domainalias)

<div class="indented">Adds a new domain alias to the collection.</div>

#### Sub Delete(Index As Long)

<div class="indented">Deletes the domain alias with the specified index.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the domain alias with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
