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

<p><span class="api_method_name">Property Active As Boolean</span></p>

<div class="indented">
<p><span class="api_description">If the account is active, true is returned. Otherwise false.</span></p>
</div>

<p><br><em><span class="api_method_name">Property ADDomain As String</span></em></p>

<div class="indented">
<p><span class="api_description">The active directory domain this account is connected to. If the account is not connected to a domain, this returns an empty string</span><br><br><em><span class="api_method_name">Property Address As String</span></em></p>
</div>

<div class="indented">
<p><span class="api_description">The address of this account. Includes the domain name</span><br><br><em><span class="api_method_name">Property AdminLevel As eAdminLevel</span></em></p>
</div>

<div class="indented">
<p><span class="api_description">The administration level for this account.</span></p>
</div>

<p><br><em><span class="api_method_name">Property ADUsername As String</span></em></p>

<div class="indented">
<p><span class="api_description">The active directory username this account is connected to.</span></p>
</div>

<p><br><em><span class="api_method_name">Property DomainID As Long</span></em></p>

<div class="indented">
<p><span class="api_description">The ID of the domain this account is connected to.</span></p>
</div>

<p><br><em><span class="api_method_name">Property FetchAccounts As <a href="?page=com_fetchaccounts">FetchAccounts</a></span></em></p>

<div class="indented">
<p><span class="api_description">External fetch accounts connected to this account.</span></p>
</div>

<p><span class="api_method_name"><br><em>Property ID As Long</em></span><em></em></p>

<div class="indented">
<p><span class="api_description">The database identifier for the account.</span></p>
</div>

<p><span class="api_method_name"><br><em>Property IMAPFolders As IMAPFolders</em></span><em></em></p>

<div class="indented">
<p><span class="api_description">Returns a collection of the IMAP folders owned by this account.</span></p>
</div>

<p><br><em><span class="api_method_name">Property IsAD As Boolean</span></em></p>

<div class="indented">
<p><span class="api_description">True if the account is connected to active directory. False otherwise.</span></p>
</div>

<p><em><span class="api_method_name">Property LastLogonTime As Variant</span></em></p>

<p><span class="api_description">The timestamp for the last usage of this account.</span><br><br><em><span class="api_method_name">Property MaxSize As Long</span></em></p>

<p><span class="api_description"><em></em>Maximum size of the account (MB).</span></p>

<p><em><span class="api_method_name">Property Messages As Messages</span></em></p>

<div class="indented">
<p><span class="api_description">A collection of the messages connected to the accounts mailbox.</span><br><br><em><span class="api_method_name">Property Password As String</span></em></p>
</div>

<div class="indented">
<p><span class="api_description">The password of this account. Might be encoded using MD5.</span></p>
</div>

<p><br><em><span class="api_method_name">Property QuotaUsed As Long</span></em></p>

<div class="indented">
<p><span class="api_description">Percentage of quota used. A value between 0 and 100. (4.2 and later)</span></p>
</div>

<p><br><em><span class="api_method_name">Property Rules As <a href="?page=com_rules">Rules</a></span></em></p>

<div class="indented">
<p><span class="api_description">A collection of the rules connected to this account.</span></p>
</div>

<p><br><em><span class="api_method_name">Property Size As Long</span></em></p>

<div class="indented">
<p><span class="api_description">The current size of this account.</span></p>
</div>

<p><br><em><span class="api_method_name">Property VacationMessage As String</span></em></p>

<div class="indented">
<p><span class="api_description">The vacation message for this account.</span></p>
</div>

<div class="indented">
<p><br><em><span class="api_method_name">Property VacationMessageExpires As Boolean</span></em></p>
<div class="indented">
<p><span class="api_description">Enables automatic expiration of the out-of-office / vacation message.</span></p>
</div>
<div class="indented">
<p> </p>
</div>
<div class="indented">
<p><em><span class="api_method_name">Property VacationMessageExpiresDate As Variant</span></em></p>
<div class="indented">
<p><span class="api_description">The date the vacation message will automatically expire, if this has been enabled.</span><br><br><em>
<h3><span class="api_method_name">Property VacationMessageIsOn As Boolean</span></h3>
</em></p>
</div>
</div>
</div>

<div class="indented">
<p><span class="api_description">True if the vacation message is activated.</span></p>
</div>

<p><br><em><span class="api_method_name">Property VacationSubject As String</span></em></p>

<div class="indented">
<p><span class="api_description">The vacation subject for this account.</span></p>
</div>

# Methods

<p><em><span class="api_method_name">Sub DeleteMessages()</span></em></p>

<div class="indented">
<p><span class="api_description">Deletes all messages connected to this account.</span></p>
</div>

<p><br><em><span class="api_method_name">Sub Save()</span></em></p>

<div class="indented">
<p><span class="api_description">Saves the account in the database.</span></p>
</div>

<p><br><em><span class="api_method_name">Sub ValidatePassword(Password As String) as Boolean</span></em></p>

<div class="indented">
<p><span class="api_description">Used to validate a users password. Returns true if the given password is correct.</span></p>
</div>
