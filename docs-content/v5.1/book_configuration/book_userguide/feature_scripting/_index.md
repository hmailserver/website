---
title: "Scripting"
slug: feature_scripting
parent: book_userguide
index: 0
is_book: false
---

## Overview

hMailServer 4.0 and later enable you to write your own scripts to extend the server's functionality. Support for Microsoft VBScript and Microsoft JScript currently exists in the server. You will find at hMailServer.com useful sample scripts written in VBScript. For general script syntax, you should consult the [Microsoft MSDN](http://msdn.microsoft.com/library/default.asp?url=/library/en-us/script56/html/vtoriMicrosoftWindowsScriptTechnologies.asp) library.   

  

All hMailServer scripts should be placed in a file called EventHandlers.vbs. The file is found in the hMailServer Events directory, normally C:\Program Files\hMailServer\Events.   

  

hMailServer offers the following pre-defined events:

<table cellspacing="10" width="650">
    <tbody>
        <tr>
            <td><strong>Event</strong></td>
            <td><strong>Purpose</strong></td>
            <td><strong>Implemented in</strong></td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_onbackupcompleted">OnBackupCompleted</a></td>
            <td valign="top">Executed when a backup has completed.</td>
            <td valign="top">4.2</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_onbackupcompleted">OnBackupFailed</a></td>
            <td valign="top">Executed when a backup has failed.</td>
            <td valign="top">4.2</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_onclientconnect">OnClientConnect</a></td>
            <td valign="top">Executed when a client is connected.</td>
            <td valign="top">4.0</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_onacceptmessage">OnAcceptMessage</a></td>
            <td valign="top">Executed when an e-mail has been delivered to the server          using the SMTP protocol.</td>
            <td valign="top">4.0</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_ondeliverystart">OnDeliveryStart</a></td>
            <td valign="top">Executed directly when the delivery of an email has started, before any rules are executed.</td>
            <td valign="top">4.4</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_ondelivermessage">OnDeliverMessage</a></td>
            <td valign="top">Executed when an e-mail is beeing delivered. Executed after global rules are executed, but before account-level rules.</td>
            <td valign="top">4.0</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_ondeliveryfailed">OnDeliveryFailed</a></td>
            <td valign="top">Executed if delivery of a a message has failed</td>
            <td valign="top">5.0</td>
        </tr>
        <tr>
            <td valign="top"><a href="?page=feature_scripting_onerror">OnError</a></td>
            <td valign="top">Executed if a error occurs in hMailServer.</td>
            <td valign="top">5.0</td>
        </tr>
    </tbody>
</table>

## Enable scripting

Follow these steps to enable scripting:

- Start hMailServer Administrator
- Navigate to *Settings->Advanced->Scripting*
- Select *Active*
- Click on *Save* to save your changes
