---
title: "RuleCriteria object"
slug: com_rulecriteria
parent: com_objects
index: 0
is_book: false
---

# Properties

#### Property HeaderField As String

<div class="indented"> The header field that this criteria applies to. Only used if <em>UsePredefined</em> is false. </div>

#### Property ID As Long

<div class="indented"> The database identifier for the rule criteria. </div>

#### Property MatchType As eRuleMatchType

<div class="indented"> The type of match that should be made. Can be any of the following.
<ul>
    <li>Const eMTContains = 2</li>
    <li>Const eMTEquals = 1</li>
    <li>Const eMTGreaterThan = 4</li>
    <li>Const eMTLessThan = 3</li>
    <li>Const eMTNotContains = 6</li>
    <li>Const eMTNotEquals = 7</li>
    <li>Const eMTRegExMatch = 5</li>
    <li>Const eMTUnknown = 0</li>
</ul>
</div>

#### Property MatchValue As String

<div class="indented"> The value that should be searched for. </div>

#### Property PredefinedField As eRulePredefinedField

<div class="indented"> Rule criterias can be connected to a number of different pre defined fields. If <em>UsePredefined</em> is set to true, the predefined field defined by PredefinedField will be used. It can be any of the following:
<ul>
    <li>Const eFTFrom = 1, the From MIME header field</li>
    <li>Const eFTBody = 5, the text body part of the email message</li>
    <li>Const eFTCC = 3, the CC MIME header field</li>
    <li>Const eFTMessageSize = 6, the size of the message</li>
    <li>Const eFTRecipientList = 7, a list of all recipients. This is taken from the SMTP envelope, and includes BCC recipients</li>
    <li>Const eFTSubject = 4, the Subject MIME header field</li>
    <li>Const eFTTo = 2, the To MIME header field</li>
    <li>Const eFTUnknown = 0, (undefined behaviour, don't use)</li>
</ul>
</div>

#### Property RuleID As Long

<div class="indented"> The database identifier for the rule that this rule criteria is connected to. </div>

#### Property UsePredefined As Boolean

<div class="indented"> If this value is true, the field define by <em>PredefinedField</em> will be used. If the value is false, the field defined by HeaderValue will be used. </div>

# Methods

#### Sub Save()

<div class="indented">Saves rule in the database.</div>
