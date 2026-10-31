---
title: "RuleActions collection"
slug: com_ruleactions
parent: com_objects
index: 0
is_book: false
---

The *RuleActions* collection contains zero or more rule actions connected to a rule.

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of objects in this collection.
</div>

#### Property Item(Index As Long) As [RuleAction](?page=com_ruleaction)

#### Property ItemByDBID(DBID As Long) As [RuleAction](?page=com_ruleaction)

<div class="indented">
Returns the <a href="?page=com_ruleaction">RuleAction</a> by it's given Index or database identifier. If the rule does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [RuleAction](?page=com_ruleaction)

<div class="indented">
Creates and returns a new rule. Call Save() on the returned RuleAction to add it to the collection.
</div>

#### Sub Refresh()

<div class="indented">
Refreshes the collection from the database.
</div>

#### Sub DeleteByDBID(DBID As Long)

#### Sub Delete(Index As Long)

<div class="indented">
Deletes an object in the collection by it's database identifier or index in the collection.
</div>
