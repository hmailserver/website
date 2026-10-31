---
title: "RuleCriterias collection"
slug: com_rulecriterias
parent: com_objects
index: 0
is_book: false
---

The *RuleActions* collection contains zero or more rule criterias connected to a rule.

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property Count As Long

<div class="indented">
The number of objects in this collection.
</div>

#### Property Item(Index As Long) As [RuleCriteria](?page=com_rulecriteria)

#### Property ItemByDBID(DBID As Long) As [RuleCriteria](?page=com_rulecriteria)

<div class="indented">
Returns the <a href="?page=com_rulecriteria">RuleCriteria</a> by it's given Index or database identifier. If the rule does not exist, an exception is thrown.
</div>

# Methods

#### Function Add() As [RuleCriteria](?page=com_rulecriteria)

<div class="indented">
Creates and returns a new rule. Call Save() on the returned RuleCriteria to add it to the collection.
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
