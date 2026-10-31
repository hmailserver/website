---
title: "Account"
slug: reference_account
parent: book_referenceguide
index: 0
is_book: false
---

## General

### Account address

<div class="indented">    The email address of the account. An account can only have one email address. You can use <a href="?page=feature_alias">aliases</a> to redirect email from many email addresses to one single account.  </div>

### Account password

<div class="indented">    The password of the account. Passwords are encrypted and stored in the hMailServer database.  </div>

### Maximum mailbox size (MB)

<div class="indented"> The maximum disk space that the account may use. If the limit is reached, the account will not be able to receive any more email. In hMailServer 3.0, the account size is measured in KB. From hMailServer 4.0 onwards, it is measured in MB. If an e-mail is sent to this account when the quota has been used, hMailServer will deliver a notification to the sender containing the information that the quota for the recipient had been reached. After that, the email message will be dropped.<br> </div>

### Administration level

<div class="indented">
<div class="indented"> The administration level setting lets you define which parts of the server a user should have access to. This setting is primarily used by PHPWebAdmin. </div>
<div class="indented">
<ul>
    <li>User - The user can change settings which applies to his own account. For example, he can change his password, his out-of-office message and forwarding settings. The user can't increase the maximum size of his own account, and he can't modify the active directory settings<br></li>
    <li>Domain - The user can change settings which applies to his domain and the users in it. The user can change settings for all users in his domain, add new users, add aliases and distribution lists, delete objects, increase account max sizes and so on.<br></li>
    <li>Server - The user can change any setting and modify any object (such as domains and accounts) in the server. <br> </li>
</ul>
</div>
<h3>Last logon time<br></h3>
This shows the date and time of the last logon on this account. If a user has never logged on the account, the date and time when the account was created will be shown.</div>

## Active Directory connection

### Active Directory Account

<div class="indented">    Check this checkbox if you want to connect the account to a Windows NT/2000 Active Directory Account. There are several advantages in using a connection to an Active Directory. For example, none of the account passwords are stored in the hMailServer database. Instead, the user must supply his/her Windows NT/2000 domain password when logging in to the POP3 server. </div>

### Active Directory Domain

<div class="indented">    Active Directory Domain is the name of the Windows NT/2000 domain, in the case where the mail server account is connected to a Windows 2000/NT active directory account. </div>

### Active Directory User name

<div class="indented">    Active Directory User name is the user name of the active directory domain that the mail server account is connected to. </div>

## Auto-reply

Auto-replies are also known as Vacation messages. An auto-reply is used when you go on vacation or are away from the office for some time. Enter a subject and a message. If someone sends you an email, they will automatically receive your Auto-reply. If you leave the subject field empty, the server will automatically set the subject to `Re: [subject line of original email]`. We recommend that you unsubscribe from any distribution lists before you turn vacation messages on.

### Automatically expire

<div class="indented">By selecting Automatically expire, you can configure hMailServer to automatically disable the auto-reply at a given date. This may be good if you know that you will be out of office for 3 days. When you're back, you don't have to remember to manually disable the auto-reply again.</div>

## Rules

Account rules work just like global rules. The difference is that local rules are only applied to messages that are delivered to a specific account. See the documentation on global rules for more information.

## External accounts

*External accounts* are used to download messages from other POP3 servers. Read more [here](?page=reference_external_account).

## Forwarding

The forwarding functionality lets you forward email from this account to another. Select *enable forwarding*to stat forwarding of messages. Enter the email address you want to forward messages to. If you want to forward messages without keeping copies of them, de-select *Keep original message*.

## Signature

If you specify a signature, this will be appended to all outgoing email messages. It's possible to specify both a plain text signature and a HTML signature. If a plain text signature has been specified, but no HTML signature, hMailServer will use the plain text signature as HTML signature. hMailServer will convert the plain text line breaks to HTML line breaks. 

**Note:** There are some known design limitations with the current implementation of the signature functionality. Please read [the upgrade documentation](?page=upgrade_42_to_43) regarding this.
