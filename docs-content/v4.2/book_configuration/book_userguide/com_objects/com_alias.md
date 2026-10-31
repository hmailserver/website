---
title: "Alias object"
slug: com_alias
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.2 and later

# Properties

#### Property Active As Boolean

<div class="indented">
If the alias is active, true is returned. Otherwise false.
</div>

#### Property DomainID As Long

<div class="indented">Returns the unique identifier for the domain which this alias is connected to.</div>

#### Property ID As Long

<div class="indented">Returns the unique identifier for this alias.</div>

#### Property Name As String

<div class="indented">Returns the name of this alias.</div>

#### Property Type As Long

<div class="indented">Returns the type of alias. Currently, this is always zero.</div>

#### Property Value As String

<div class="indented">Returns value of the alias. Emails sent to this alias will be forwarded to this address.</div>

# Methods

#### Sub Delete()

<div class="indented">Deletes the alias from the database.</div>

#### Sub Save()

<div class="indented">Saves the alias to the database..</div>
