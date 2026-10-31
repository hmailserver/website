---
title: "Rules collection"
slug: com_rules
parent: com_objects
index: 0
is_book: false
---

The *Rules* collection contains zero or more rules. These rules can either be global rules, or rules connected to a specific account.

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of objects in this collection.
</div>

#### Property Item(Index As Long) As [Rule](?page=com_rule)

#### Property ItemByDBID(DBID As Long) As [Rule](?page=com_rule)

<div class="indented">
Returns the <a href="?page=com_rule">rule</a> by it's given Index or database identifier. If the rule does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [Rule](?page=com_rule)

<div class="indented">
Creates and returns a new rule. Call Save() on the returned rule to add it to the collection.
</div>

#### Sub Refresh()

<div class="indented">
Refreshes the collection from the database.
</div>

#### Sub DeleteByDBID(DBID As Long)

<div class="indented">
Deletes an object in the collection by it's database identifier. 
</div>
