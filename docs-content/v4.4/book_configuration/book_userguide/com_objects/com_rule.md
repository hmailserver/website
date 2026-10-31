---
title: "Rule object"
slug: com_rule
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property AccountID As Long

<div class="indented"> The ID of the account this rule is connected to. </div>

#### Property Actions As [RuleActions](?page=com_ruleactions)

<div class="indented"> A collection of rule actions connected to this rule. </div>

#### Property Active As Boolean

<div class="indented"> True if this rule is active. False otherwise. </div>

#### Property Criterias As [RuleCriterias](?page=com_rulecriterias)

<div class="indented"> A collection of rule criterias connected to this rule. </div>

#### Property ID As Long

<div class="indented"> The database identifier for this rule. </div>

#### Property Name As String

<div class="indented"> The name of this rule. </div>

#### Property UseAND As Boolean

<div class="indented"> True if AND should be used between the rule criterias. False if OR should be used instaed. </div>

# Methods

<div class="indented">
<h4>Sub MoveUp()</h4>
<div class="indented">Moves this rule to the previous position in the list of rules.<br></div>
</div>

#### Sub MoveDown()

Moves this rule to the next position in the list of rules.

#### Sub Save()

<div class="indented">Saves rule in the database.</div>

# Sample code

## Creating a forward rule

The following sample creates an account rule that forwards all messages larger than 0 bytes to someone@test.com.

```
Dim obRule As Rule    
    Set obRule = obAccount.Rules.Add        
    obRule.Name = "My forward rule"        

    ' Add a If MessageSize Is Greater Than 0 criteria    
    Dim obCriteria    
    Set obCriteria = obRule.Criterias.Add        
    obCriteria.MatchType = eMTGreaterThan    
    obCriteria.PredefinedField = eFTMessageSize    
    obCriteria.MatchValue = 0    
    obCriteria.Save        

    ' Create a forward action    
    Dim obAction    
    Set obAction = obRule.Actions.Add    
    obAction.Type = eRAForwardEmail    
    obAction.To = "someone@test.com"    
    obAction.Save        

    ' Save the entire rule    
    obRule.Save
```

```
 
```

```
 
```
