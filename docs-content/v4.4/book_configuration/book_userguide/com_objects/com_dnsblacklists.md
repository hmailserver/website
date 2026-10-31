---
title: "DNSBlackLists object"
slug: com_dnsblacklists
parent: com_objects
index: 0
is_book: false
---

The DNSBlackLists collection contains the DNS blacklists set up in hMailServer.

# Version

The below documentation is valid for hMailServer 4.0 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [DNSBlackList](?page=com_dnsblacklist)

<div class="indented">Returns an DNSBlackList from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [DNSBlackList](?page=com_dnsblacklist)

<div class="indented">Returns an DNSBlackList from the collection based on it's database identifier.</div>

#### Property ItemByDNSHost(sDNSHost As String) As [DNSBlackList](?page=com_dnsblacklist)

<div class="indented">Returns an DNSBlackList from the collection based on it's DNS host.</div>

# Methods

#### Function Add() As [DNSBlackList](?page=com_dnsblacklist)

<div class="indented">Adds a new DNSBlackList to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the DNSBlackList with the specified database identifier.</div>

#### Sub Refresh()

<div class="indented">Refreshes the collection from the database.</div>
