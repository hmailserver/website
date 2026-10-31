---
title: "hMailServer Change log"
slug: changelog
parent: book_before_installation
index: 60
is_book: false
---

## hMailServer 4.3

### 4.3 Build 248

- Bugfix: C66 - Upgrades from earlier versions failed when MySQL with InnoDB was used, due to incompatible SQL statements.  
Bugfix C67 - It was not possible to update exiting distribution list recipients in PHPWebAdmin without removing and readding them.

### 4.3 Build 247

- Bugfix: C65 - If an hMailServer Event Script tried to access something in the API which it did not have privileges to access, hMailServer sometimes failed to report a descriptive error message.

### 4.3 Build 246

- Bugfix: C64 - When hMailServer detected a message as spam using SURBL, MIME headers was not modified if hMailServer was configured to do this.

### 4.3 Build 245

- Bugfix: C63 - In some cases, hMailServer was unable to determine whether a client had disconnected. In theese cases, hMailServer did not force a client disconnect. But if this happened often, it lead to a high memory usage.

### 4.3 Build 244

- Bugfix: C61 - Validation of hosts in the HELO command were performed for IP addresses as well. This may have the effect that hMailServer falsely classifies an email as spam.
- Bugfix C62 - Plus addressing did not work recursively. For example, it was not possible to set up an alias which forwarded to a "plussed" address. This is now possible.
- Performance: An performance improvement has been made which speeds up the time it takes for hMailSever to MIME-decode email with a lot of message recipients in the headers (>500). In previous version, parsing a list of 2 500 recipients could take as long as 15 seconds. This has been decreased to about 0.05 seconds.
- Performance: An improvement has been made to the IMAP Sort algorithm. Sorting large mailboxes on From, CC and Subject headers is now up to 4 times as fast.
- UI: Error message when a script has failed to call Authenticate() has been improved.
- UI: All the language files have been updated. To prevent incorrect characters in the user interface, all translation is now in Unicode.

### 4.3 Build 243

<ul>
    <li>Bugfix: C59 - If a "Move to IMAP folder" had been set up in an account-level rule, this could under certain circumstances be performed for other local recipients of the email as well.</li>
    <li>Bugfix: C60 - MIME-decoding could fail for certain messages. This had the effect that they could not be processed by rules and scripting. It could also have the effect that they were not displayed properly in the email client.<br></li>
    <li>Functionality: When DataDirectorySynchronizer imports messages from the data root directory, it no longer sends messages to all external recipients of the email messages. This change has been done to prevent duplicate emails from being sent. Earlier versions, running DataDirectorySynchronizer could for example forward email back to mailing lists.</li>
    <li>Bugfix / Performance: DataDirectorySynchronizer now releases objects from memory when they are no longer needed, which leads to an performance improvement when importing a large number of messages.</li>
    <li>UI: In hMailServer Administrator, the following changes have been made to the user interface:</li>
    <ul>
        <li>The <em>Backup</em> node have been moved to the <em>Utilities</em> node. The reason for this is that the backup functionality is not server settings but more a server utility.</li>
        <li>The <em>Spam protection</em> and <em>AntiVirus</em> nodes have been moved to the <em>Settings</em> node. The reason for this is that spam protection and AntiVirus are applied on email downloading from other servers using POP3 so it does not only effect SMTP.</li>
    </ul>
    <li>Functionality: If you add <span class="Code">AddXAuthUserHeader=1</span> to the <span class="Code">Settings</span> <span class="Code">section in <span class="Code">hMailServer.ini</span>, hMailServer will add a X-AuthUser header to email (if SMTP authentication has been used). This functionality should be seen as experimental.</span></li>
    <li>Functionality: If SMTP authentication is used, hMailServer now re-authenticates the user between every email in the same session. This change was made to prevent (authenticated )inactive users from being able to continue to send email by keeping the SMTP connection open.</li>
    <li>Functionality: A change has been made to the IMAP implementation to resolve compatibility problem with misbehaving Nokia E61s.</li>
</ul>

### 4.3 Build 242

- COM API: An exception is now thrown if hMailServer::Application::Database::ExecuteSQL() fails.
- UI: Translations of the user interface have been added.
- UI: In the Live log in hMailServer Administrator, it's now possible to sort the data by clicking on the different columns. Please note that the sort is text-based and not numerical. This means that for example 125 will appear before 90.
- Bugfix: C56 - COM API methods Client.IPAddress and Client.Port always returned an empty value in the OnAcceptMessage event.
- Bugfix: C57 - Delivery of email could sometimes fail, leading to email not being delivered before sevice restart.
- Bugfix: C58 - When adding an email message to an IMAP folder, the client should be able to set the \Answered and \Flagged flags immediately. This was not implemented in hMailServer. (Caused the two flags to be lost when copying email messages between different accounts  / server)

### 4.3 Build 241

- Bugfix: C55 - IMAP: Search command doesn't include for flags  
 When a client uses a IMAP SEARCH command, hMailServer ignored the flags specified in the search command. This had the effect that email clients sometime could show incorrect messages in message listings.
- Improved logging when email can't be parsed.  
If an unhandled error occurs while hMailServer is parsing an email message, the .EML file is now moved to \Logs\Problematic messages\ folder. Feel free to forward such .EML-files to the hMailServer Development Team for further troubleshooting.
- When hMailServer downloads messages from other POP3 servers, and you have configured hMailServer to search for recipients in the MIME headers, hMailServer now searches in all the Received: headers as well.

[Older changes](http://www.hmailserver.com/?page=changelog)
