---
title: "Account"
slug: reference_account
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Account address

<div class="indented">
   The email address of the account. An account can only have one email address. You can use <a href="?page=feature_alias">aliases</a> to redirect email from many email addresses to one single account. 
</div>

### Account password

<div class="indented">
   The password of the account. Passwords are encrypted and stored in the hMailServer database. 
</div>

### Maximum mailbox size (MB)

<div class="indented">
The maximum disk space that the account may use. If the limit is reached, the account will not be able to receive any more email. In hMailServer 3.0, the account size is measured in KB. From hMailServer 4.0 onwards, it is measured in MB.
</div>

### Administration level

<div class="indented">
The administration level setting lets you define which parts of the server a user should have access to. This setting is used by the
PHPWebAdmin. If set to <i>User</i>, the user will be able to log in and change his password and vacation message. If set to <i>Domain</i>, he will be able to add accounts, aliases and distribution lists for the domain. If it's set to server, he will be
able to add domains and change server settings.
</div>

## Active Directory connection

### Active Directory Account

<div class="indented">
   Check this checkbox if you want to connect the account to a Windows NT/2000 Active Directory Account. There are several advantages in using a connection to an Active Directory. For example, none of the account passwords are stored in the hMailServer database. Instead, the user must supply his/her Windows NT/2000 domain password when logging in to the POP3 server.
</div>

### Active Directory Domain

<div class="indented">
   Active Directory Domain is the name of the Windows NT/2000 domain, in the case where the mail server account is connected to a Windows 2000/NT active directory account.
</div>

### Active Directory User name

<div class="indented">
   Active Directory User name is the user name of the active directory domain that the mail server account is connected to.
</div>

## Auto-reply

Auto-replies are also known as Vacation messages. An auto-reply is used when you go on vacation or are away from the office for some time. Enter a subject and a message. If someone sends you an email, they will automatically receive your Auto-reply. If you leave the subject field empty, the server will automatically set the subject to `Re: [subject line of original email]`. We recommend that you unsubscribe from any distribution lists before you turn vacation messages on.

## Rules

Account rules work just like global rules. The difference is that local rules are only applied to messages that are delivered to a specific account. See the documentation on global rules for more information.

## External accounts

*External accounts* are used to download messages from other POP3 servers. Read more [here](?page=reference_external_account).
