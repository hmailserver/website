---
title: "Scripting"
slug: feature_scripting
parent: book_userguide
index: 0
is_book: false
---

## Overview

hMailServer 4.0 and later enable you to write your own scripts to extend the server's functionality. Support 
for Microsoft VBScript and Microsoft JScript currently exists in the server. You will find at hMailServer.com useful sample scripts written in VBScript. For general script syntax, you should consult the [Microsoft MSDN](http://msdn.microsoft.com/library/default.asp?url=/library/en-us/script56/html/vtoriMicrosoftWindowsScriptTechnologies.asp) library.

All hMailServer scripts should be placed in a file called EventHandlers.vbs. The
file is found in the hMailServer Events directory, normally C:Program FileshMailServerEvents.

hMailServer offers the following pre-defined events:

<table width="650" cellspacing="10">
   <tr>
      <td><b>Event</b></td>
      <td><b>Purpose</b></td>
      <td><b>Implemented in</b></td>
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
      <td valign="top">Executed when an e-mail has been delivered to the server
         using the SMTP protocol.</td>
      <td valign="top">4.0</td>
   </tr>
   <tr>
      <td valign="top"><a href="?page=feature_scripting_ondelivermessage">OnDeliverMessage</a></td>
      <td valign="top">Executed when an e-mail is beeing delivered.</td>
      <td valign="top">4.0</td>
   </tr>					   
</table>

## Enable scripting

Follow these steps to enable scripting:

- Start hMailAdmin
- If you're using hMailServer 4.0, navigate to *Settings->Scripting*. If you're using 4.1 or later, navigate to *Settings->Advanced->Scripting*
- Select *Active*
- Click on *Save* to save your changes
