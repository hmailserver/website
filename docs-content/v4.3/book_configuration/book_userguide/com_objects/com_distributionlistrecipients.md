---
title: "DistributionListRecipients object"
slug: com_distributionlistrecipients
parent: com_objects
index: 0
is_book: false
---

The DistributionListRecipients collection contains the email addresses connected to a distribution list.

# Version

The below documentation is valid for hMailServer 4.0 and later.

# Properties

#### Property Count As Long

<div class="indented">The number of objects in the collection.</div>

#### Property Item(Index As Long) As [DistributionListRecipient](?page=com_distributionlistrecipient)

<div class="indented">Returns an address from the collection based on it's index in the collection.</div>

#### Property ItemByDBID(DBID As Long) As [DistributionListRecipient](?page=com_distributionlistrecipient)

<div class="indented">Returns an address from the collection based on it's database identifier.</div>

# Methods

#### Function Add() As [DistributionListRecipient](?page=com_distributionlistrecipient)

<div class="indented">Adds a new recipient to the collection.</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">Deletes the recipients with the specified database identifier.</div>
