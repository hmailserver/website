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

#### Function BlowfishDecrypt(Input As String) As String

<div class="indented">Decrypts a string that has been encrypted by hMailServer.</div>

#### Function BlowfishEncrypt(Input As String) As String

<div class="indented">Encrypts a string.</div>

#### Function EmailAllAccounts(sRecipientWildcard As String, sFromAddress As String, sFromName As String, sSubject As String, sBody As String) As Boolean

<div class="indented">Sends an email to a group of accounts. The sRecipientWildcard specifies what addresses to send to. sFromAddress is the sender address. sFromName is the name put in the From header. sSubject is the subject of the message, and sBody is the body.</div>

#### Function GenerateGUID() As String

<div class="indented">Returns a unique ID.</div>

#### Function GetMailServer(EMailAddress As String) As String

<div class="indented">Returns the email server handling email for the given address.</div>

#### Function ImportMessageFromFile(sFilename As String, iAccountID As Long) As Boolean

<div class="indented">Import a message file from the disk and put's it in the account with the given ID. The message will be put in the inbox.</div>

#### Function IsValidDomainName(sDomainName As String) As Boolean

<div class="indented">Returns true if the given string is a valid domain name.</div>

#### Function IsValidEmailAddress(EMailAddress As String) As Boolean

<div class="indented">Returns true if the given string is a valid email address.</div>

#### Sub MakeDependent(OtherService As String)

<div class="indented">Makes the hMailServer service dependent on another service.</div>

#### Function MD5(Input As String) As String

<div class="indented">Returns a MD5 hex string for the given string.</div>

#### Sub RunTestSuite(sTestPassword As String)

<div class="indented">Runs the hMailServer test suite. This should only be run by hMailServer developers since it will reset your entire hMailServer installation and create test objects.</div>
