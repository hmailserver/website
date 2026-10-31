---
title: "Account object"
slug: com_account
parent: com_objects
index: 0
is_book: false
---

# Version

The below documentation is valid for hMailServer 4.2 and later

# Properties

*Property Active As Boolean*

<div class="indented">If the account is active, true is returned. Otherwise false.</div>

*Property ADDomain As String*

<div class="indented">The active directory domain this account is connected to. If the account is not connected to a domain, this returns an empty string</div>

*Property Address As String*

<div class="indented">The address of this account. Includes the domain name</div>

*Property AdminLevel As eAdminLevel*

<div class="indented">The administration level for this account.</div>

*Property ADUsername As String*

<div class="indented">The active directory username this account is connected to.</div>

*Property DomainID As Long*

<div class="indented">The ID of the domain this account is connected to.</div>

*Property FetchAccounts As [FetchAccounts](?page=com_fetchaccounts)*

<div class="indented">External fetch accounts connected to this account.</div>

*Property ID As Long*

<div class="indented">The database identifier for the account.</div>

*Property IMAPFolders As IMAPFolders*

<div class="indented">Returns a collection of the IMAP folders owned by this account.</div>

*Property IsAD As Boolean*

<div class="indented">True if the account is connected to active directory. False otherwise.</div>

*Property MaxSize As Long*

<div class="indented">Maximum size of the account (MB).</div>

*Property Messages As Messages*

<div class="indented">A collection of the messages connected to the accounts mailbox.</div>

*Property Password As String*

<div class="indented">The password of this account. Might be encoded using MD5.</div>

*Property QuotaUsed As Long*

<div class="indented">Percentage of quota used. A value between 0 and 100. (4.2 and later)</div>

*Property Rules As [Rules](?page=com_rules)*

<div class="indented">A collection of the rules connected to this account.</div>

*Property Size As Long*

<div class="indented">The current size of this account.</div>

*Property VacationMessage As String*

<div class="indented">The vacation message for this account.</div>

*Property VacationMessageIsOn As Boolean*

<div class="indented">True if the vacation message is activated.</div>

*Property VacationSubject As String*

<div class="indented">The vacation subject for this account.</div>

# Methods

*Sub DeleteMessages()*

<div class="indented">Deletes all messages connected to this account.</div>

*Sub Save()*

<div class="indented">Saves the account in the database.</div>

*Sub ValidatePassword(Password As String) as Boolean*

<div class="indented">Used to validate a users password. Returns true if the given password is correct.</div>
