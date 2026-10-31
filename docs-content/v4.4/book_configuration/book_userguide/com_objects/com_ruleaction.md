---
title: "RuleAction object"
slug: com_ruleaction
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property Body As String

<div class="indented"> When the action type is eRAReply, the Body property will contain the text to reply with. </div>

#### Property FileName As String

<div class="indented"> Currently not used. </div>

#### Property FromAddress As String

<div class="indented"> When the action type is eRAReply, the FromAddress property will contain the sender address. </div>

#### Property FromName As String

<div class="indented"> When the action type is eRAReply, the FromName property will contain the sender name. </div>

#### Property ID As Long

<div class="indented"> The database identifier for the rule action. </div>

#### Property IMAPFolder As String

<div class="indented"> When the action type is eRAMoveToImapFolder, this property will contain the name of the IMAP folder the message should be moved to. </div>

#### Property RuleID As Long

<div class="indented"> The database identifier for the rule that this rule action is connected to. </div>

#### Property Subject As String

<div class="indented"> When the action type is eRAReply, this property will contain the subject of the reply email message. </div>

#### Property To As String

<div class="indented"> When the action type is eRAForwardEmail, the message will be forwarded to the email address specified by this property. </div>

#### Property Type As eRuleActionType

<div class="indented"> The type of action:
<ul>
    <li>Const eRADeleteEmail = 1, delete the email</li>
    <li>Const eRAForwardEmail = 2, forward the email to another address</li>
    <li>Const eRAReply = 3, reply to the sender of the email</li>
    <li>Const eRAMoveToImapFolder = 4, move the message to an IMAP folder</li>
    <li>Const eRAUnknown = 0, undefined behaviour (don't use)</li>
</ul>
</div>

# Methods

#### Sub MoveDown()

<div class="indented">Moves this rule action to the next position in the list of rule actions.<br></div>

#### Sub MoveUp()

<div class="indented">Moves this rule action to the previous position in the list of rule actions.</div>

#### Sub Save()

<div class="indented">Saves rule in the database.</div>
