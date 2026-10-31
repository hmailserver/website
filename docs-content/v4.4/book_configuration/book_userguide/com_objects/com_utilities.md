---
title: "Utilities object"
slug: com_utilities
parent: com_objects
index: 0
is_book: false
---

The utilities object contains different utilities that can be used by hMailServer COM API clients.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Methods

<p><span class="api_method_name">Function BlowfishDecrypt(Input As String) As String</span></p>

<div class="indented">
<p><span class="api_description">Decrypts a string that has been encrypted by hMailServer.</span></p>
</div>

<p><span class="api_method_name">Function BlowfishEncrypt(Input As String) As String</span></p>

<div class="indented">
<p><span class="api_description">Encrypts a string.</span></p>
</div>

<p><span class="api_method_name">Function EmailAllAccounts(sRecipientWildcard As String, sFromAddress As String, sFromName As String, sSubject As String, sBody As String) As Boolean</span></p>

<div class="indented">
<p><span class="api_description">
<div class="api_description">Sends an email to a group of accounts. The sRecipientWildcard specifies what addresses to send to. sFromAddress is the sender address. sFromName is the name put in the From header. sSubject is the subject of the message, and sBody is the body.</div>
</span></p>
</div>

<p><span class="api_method_name">Function GenerateGUID() As String</span></p>

<div class="indented">
<p><span class="api_description">Returns a unique ID.</span></p>
</div>

<p><span class="api_method_name">Function GetMailServer(EMailAddress As String) As String</span></p>

<div class="indented">
<p><span class="api_description">Returns a comma separated list of email servers handling email for the given email address.</span></p>
</div>

<p><span class="api_method_name">Function ImportMessageFromFile(sFilename As String, iAccountID As Long) As Boolean</span></p>

<div class="indented">
<p><span class="api_description">Import a message file from the disk and put's it in the account with the given ID. The message will be put in the inbox.</span></p>
</div>

<div class="indented">
<p><span class="api_method_name">Function ImportMessageFromFileToIMAPFolder(sFilename As String, iAccountID As Long, sIMAPFolder As String) As Boolean</span></p>
<div class="indented">
<p><span class="api_method_name"><span class="api_description">
<div class="api_description">Import a message file from the disk and put's it in the account with the given ID. The message will be put in the folder specified in the <em>sIMAPFolder</em> parameter. If the folder does not already exist, it is created. If the folder is automatically created, it will automatically be subscribed to. It is possible to specify sub folders, such as INBOX\SubFolder1\SubFolder2. You can use \, or / or dot as folder separator. </div>
</span></span></p>
</div>
</div>

<p><span class="api_method_name">Function IsValidDomainName(sDomainName As String) As Boolean</span></p>

<div class="indented">
<p><span class="api_description">Returns true if the given string is a valid domain name.</span></p>
</div>

<p><span class="api_method_name">Function IsValidEmailAddress(EMailAddress As String) As Boolean</span></p>

<div class="indented">
<p><span class="api_description">Returns true if the given string is a valid email address.</span></p>
</div>

<p><span class="api_method_name">Sub MakeDependent(OtherService As String)</span></p>

<div class="indented">
<p><span class="api_description">Makes the hMailServer service dependent on another service.</span></p>
</div>

<p><span class="api_method_name">Function MD5(Input As String) As String</span></p>

<div class="indented">
<p><span class="api_description">Returns a MD5 hex string for the given string.</span></p>
</div>

<p><span class="api_method_name">Sub RunTestSuite(sTestPassword As String)</span></p>

<div class="indented">
<p><span class="api_description">
<div class="api_description">Runs the hMailServer test suite. This should only be run by hMailServer developers since it will reset your entire hMailServer installation and create test objects.</div>
</span></p>
</div>
