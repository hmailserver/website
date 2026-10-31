---
title: "hMailServer Change log"
slug: changelog
parent: book_before_installation
index: 60
is_book: false
---

### 5.2 Beta Build 353 (2009-07-02)

- If one test resulted in PASS and another one FAIL, an empty X-hMailServer-Reason line was added to the MIME headers.
- If two clients was auto-banned at the exact same time (millisecond), hMailServer could fail to auto-ban one of them if they were connecting from different IP addresses.
- When connecting to a new server using Administrator, the server name in the title was not updated.

### 5.2 Beta Build 352 (2009-06-21)

- The default retry ccount for routes was set to zero.
- If a DNS query fails, the bounce message now says that rather than "No mail servers appear to exists for the recipients address."
- If the max number of recipients in every batch was set to zero, deliveries didn't work. Now "0" means unlimited.

### 5.2 Beta Build 351 (2009-06-21)

- The message "The password is weak. are you sure you want to use it?" was always displayed in english.
- Data directory synchronizer failed to import messages from disk.

### 5.2 Beta Build 350 (2009-06-17)

- Another problem related to showing attachments with åäö in RoundCube. Problem occured if file name was short.

### 5.2 Beta Build 349 (2009-06-12)

- A new option has been added to routes which allows you to specify whether messages arriving from route addresses should be considered local or not.

### 5.2 Beta Build 348 (2009-06-07)

- In hMailServer Administrator, under Utilities, a new basic diagnostic tool is now available. This tool helps you troubleshoot basic set up issues.
- If a client sends a message from a local domain, the sener is now considered local. The same applies if his address matches a route. The previous behavior was that a sender was only considered local if his address matched an local account. This means that if you send from an alias address, you are now considered local. Please note that it's still not possible to authenticate using an alias though.
- In the grey listing options you can now choose to bypass greylisting if SPF passes.
- A new rule action has been added; Create Copy. This can be used for example to deliver copies of the same message to different destination servers.
- A new rule criteria has been added; Delivery attempts. This can be used for example to deliver messages to different routes, depending on the current number of delivery attempts.
- If hMailServer tries to deliver the same message multiple times, global rules will now be executed every time.
- When you delete domains in hMailServer, you now need to confirm the deletion before the domain is removed.
- The database upgrade is now done in a transaction (assuming the underlying database supports it).
- In the database setup wizard, the creation log on the second last page is now cleared when the page is shown. Previously, the log could contain data from previous creation attempts, which could cause confusion.
- Issue 145, IMAP UIDNEXT is now implemented.
- Issue 201, It's now possible to index messages in folders, which increase disk usage but speeds up IMAP sort.
- Issue 207, Incomplete upgrade of WebAdmin may result in bad error message.
- Issue 209, If a Date header contained the timezone "GMT" (with quotes, obsolete syntax) the message was not displayed if Outlook Express was used.
- Issue 213, If MySQL with InnoDB was used, message ID's could sometimes repeat themselves, which could lead to lost messages (client dependant).
- Issue 215, If a message is downloaded from an external account, the message was not delivered to recipients on routes. There is now a new option in the external account settings which allows you to enable this behavior.
- Issue 218, Attachment names containing non-latin characters didn't always show up properly.
- Issue 216: SMTP connection sometimes dropped during DKIM verification

<h2><em><font size="+0"><em><font color="#0000ff">5.1.2 Build 346 Production (2009-05-18) </font></em></font></em></h2>

- Issue 216: SMTP connection sometimes dropped during DKIM verification. This problem occurs if a the DNS server publishing the publi key publishes a CNAME record which points at the TXT record which contains the actual public key.

### 5.1.2 Beta Build 345 (2009-05-09)

- Issue 211: If the network connection was dropped during delivery to another server, hMailServer did not attempt to retry delivery later.
- Issue 212: If a string is not translated, Administrator won't show the corresponding english string.

### 5.1.2 Beta Build 344 (2009-04-30)

- Issue 210: Duplicate UID's may be sent over IMAP if Messages.Add() API function is used.

### 5.1.2 Beta Build 343 (2009-04-24)

- Issue 208, In WebAdmin, it was not always possible to create new accounts (depending on database engine and its configuratio) .
- Issue 206, If an IMAP client timed out while copying messages, sometimes message folders were created directly under the Data directory.
- More checks have been added to the installation program to prevent users from making mistakes.

### 5.1.2 Beta Build 342 (2009-04-19)

- Issue 203, In Administrator, it was possible to enable DKIM signing without specifying settings.
- Issue 204, In the IMAP protocol, ACL was advertised to the client as enabled even if it was not.
- Issue 205, If SpamAssassin hanged or crash, hMailServer would hang as well.

<h2><em><font color="#0000ff">5.1.1 Build 341 Production (2009-04-15) </font></em></h2>

- SMTP: When disk was full, hMailServer gave a permanent error to the client. This has been changed to temporary.
- Core: Auto-ban does not always work, depending on the client IP address.
- Administrator: No error message was displayed when user tried to create two routes with the same name.
- Administrator: When changing TCP/IP port configuration, the user is now asked if he wants to restart the server. (Which is required for the change to take effect).
- Administrator: The window position saved in full screen mode. This had the effect that it was sometimes a bit hard to restore the window size after a restart.
- Administrator: Listing accounts in larger Active Directory domains sometimes timed out.
- WebAdmin: The title on the Greylisting page was "Auto-ban" instead of "Greylisting.

<h2><em><font color="#0000ff">5.1 Build 340 Production (2009-04-06)</font></em></h2>

- Administrator: The tree menu to the left wasn't always rendered properly when using Windows Vista with the "Aero"-theme.

### 5.1 Alpha Build 339 (2009-04-05)

- Administrator: Improvements have been made to the live log performance.
- SMTP: If hMailServer rejects a SMTP client command with a temporary 4xx-error (such as greylisting), this is no longer counted as an invalid command which may get the client disconnected.
- Installation: The performance of the database upgrade scripts for upgrades to v5.1 has been improved.

### 5.1 Alpha Build 338 (2009-03-29)

- Added a limit so that hMailServer never processes more than five DKIM-Signature headers in a single email message (to prevent different types of abuse).
- Administrator: The numbers on the Status page is now refreshed automatically.
- Installation: If the user is using an old version of the internal MySQL database and tries to upgrade to v5 before first installing the latest v4-build, the hMailServer installation program will stop.
- Installation: If a user is using v4 with the internal database, uninstalls hMailServer (and MySQL) and then upgrades to version 5, the hMailServer installation program will stop. A user cannot do this, since he will then not have any MySQL installation.
- POP3: When a user logs on, any message which has been marked by deletion by his IMAP client but not been deleted will have it's \Deleted flag removed. This is to prevent issues for users who are using both POP3 and IMAP to access the same mailbox.
- Other: OpenSSL has been upgraded to 0.9.8k.
- Other: Data Directory Synchronizer has been added to the hMailServer group in the Start menu.

### 5.1 Alpha Build 337 (2009-03-21)

- SMTP: DKIM verification failed when a message contained more than one signature.
- Installation: Some minor usability improvements have been made.

### 5.1 Alpha Build 336 (2009-03-18)

- DKIM verification failed when message body contained more than 2 spaces in a row.
- API: When adding plain text/html/attachment parts to a message, the entire message is now reconstructued to prevent malformed messages.

### 5.1 Alpha Build 335 (2009-03-15)

- SMTP: If the last header in an email message was Message-ID, hMailServer added a duplicate Message-ID header.
- Anti-spam: If the DKIM I tag contained the character "t", the verification would fail.
- Issue 182: Administrator: If you try to create an IP range where the Lower IP is higher than the Upper IP, an error message will now be shown.

### 5.1 Alpha Build 334 (2009-03-10)

- Core: Server is now starts up faster than before (1 second instead of 3-4).
- Core: Added a lock to prevent hMailServer from starting more than 10 simultaneous virus scanners even if the number of delivery threads are higher.
- SMTP: Issue 175: If it takes more than 10 minutes to deliver an email message, hMailServer timeouted before.
- IMAP: Search for message indexes and internal UID's did not work properly. Caused problem with specific email clients. (Issue 168 and 169).
- API: If a charset specification was in upper case in an email, hMailServer didn't decode properly.
- API: Issue 173. If you try to attach a file which is unavailable, hMailServer now gives a more descriptive error message.
- Misc: In Data Directory Synchronizer, it's now possible to delete files in the data directory but not in the database.

### 5.1 Alpha Build 333 (2009-03-01)

- Administrator: It's now possible to sort the lists under Undelivered Messages and Live log again.
- WebAdmin: A robots.txt has been added to prevent search engines from trying to index WebAdmin.
- Core: The stability of the thread pool has been improved.
- Core: The message deliverer performance has been improved slightly.
- Core: The return-path header is now added when the message is put into the user account, rather than when the message is received from the sending SMTP client / server. The reason is that according to the SMTP spec, SMTP servers should add the header when making the final delivery.

### 5.1 Alpha Build 332 (2009-02-26)

- Some options have been rearranged to make WebAdmin look more like Administrator.
- The DKIM-option in the Anti-spam settings have now been added to WebAdmin.
- The width of WebAdmin is no longer fixed, which makes it easier to use on wide screens displays.

### 5.1 Alpha Build 331 (2009-02-10)

<ul>
    <li>Core: The log setting <span style="font-style: italic;">Mask passwords in log</span> has been removed - passwords are now always replaced with *** in the log.</li>
    <li>SMTP: A v= attribute is now added to the DKIM-Signature header.</li>
    <li>SMTP: In some cases the DKIM signing was incorrect.</li>
    <li>WebAdmin: The log setting <span style="font-style: italic;">Keep files open</span> has been added to the web interface (was added to hMailServer Administrator in v5.0)</li>
</ul>

### 5.1 Alpha Build 330 (2009-02-06)

- SMTP: New SMTP authentication options are available.
- WebAdmin: Rule editing didn't work when register_globals were set to off.
- SMTP: More logging is added when DKIM verification is made. If DKIM verification fails, the Debug log now contains information on what caused the failure.

### 5.1 Alpha Build 329 (2009-02-04)

- SMTP: A new SMTP auth setting has been added to the IP range which allows you to disable SMTP auth requirement for inbound deliveries.
- SMTP: In response to EHLO from a client, hMailServer now sends the host name rather than a hard coded text.
- SMTP: If a route was set up in which "Deliver to addresses below" was selected, external delivery to other domains failed.
- Administrator: When using high contrast mode in Windows, the text on the tree to the left is now visible.
- WebAdmin: 5.1 functionality now implemented.
- WebAdmin: It's now possible to edit rules using PHPWebAdmin.
- Core: hMailServer now validates that a compatible database server version is in use. If not, an error is reported and the startup is aborted.
- API: ItemByName on the IMAPFolders collection did not work if the folder name contained non-latin characters.
- API: Add() on the IMAPFolders collection did not work if the folder name contained non-latin characters. (Issue 164)

### 5.1 Alpha Build 327 (2009-02-02)

<ul>
    <li>hMailServer now supports DKIM. Signing options are available in the domain settings and verification options in the anti-spam settings.</li>
    <li>The "Forwarding relay" option is no longer a setting in IP ranges but instead stored separately as "Incoming relays". The settings are found next to the IP ranges in hMailServer Administrator and WebAdmin. This change was made partly because the term "Forwarding relay" was a bit confusing and partly to improve performance.</li>
    <li>In the external account settings, there's now options to enable Anti-spam and Anti-virus. In earlier versions, the IP range configuration was used to determine whether or not Anti-spam or Anti-virus should be run for external accounts.</li>
    <li>In IP ranges, you can now specify an expiration time when the IP range will be automatically removed by hMailServer.</li>
    <li>It's now possible to auto-ban users after a number of failed logon attempts. When a user is auto-banned, an IP range matching his IP address is created which prevents the client from connecting again. By default, a user who fails to log on 3 times within 30 minutes will have his IP address banned for 60 minutes.</li>
    <li>In IP ranges, it's no longer possible to select <span style="font-style: italic;">Require authentication for deliveries to local account</span> or <span style="font-style: italic;">Require authentication for deliveries to external accounts</span>. Instead, there is a single option named <span style="font-style: italic;">Require SMTP authentication</span>. When this option is selected, local users must authenticate prior to sending an email.</li>
    <li>The layout in WebAdmin has been changed to a tab-based system. This makes the user interface less cluttered.</li>
    <li>If you're doing a new installation, the installation program will ask you whether you want to use the built-in database or an external one. If you're upgrading, the installation program will assume you want to keep the current database and not ask you about it.</li>
</ul>

# 5.0 Beta Build 326 (2009-01-28)

- When changes to messages were made in a public folder, other users weren't always informed.

### 5.0 Beta Build 325 (2009-01-21)

- An error was shown when displaying SMTP settings in WebAdmin.

### 5.0 Beta Build 324 (2009-01-19)

- The Database Delivery Log function has been removed and replaced by a script, found in the User contributed scripts section of the online forum.
- In the scripting event OnAcceptMessage, the oClient.Port number returned the port the client was connecting from, rather than the port it was connecting to.

### 5.0 Beta Build 323 (2009-01-08)

- hMailServers response to the IMAP list command did not properly include namespace.

### 5.0 Beta Build 322 (2009-01-07)

- OpenSSL has been upgraded to 0.9.8j which fixes a spoofing issue (http://www.openssl.org/news/secadv_20090107.txt).

### 5.0 Beta Build 321 (2009-01-02)

- It wasn't possible to display messages having an attachment with file names containing specific character.

### 5.0 Beta Build 320 (2008-12-29)

- When selecting "Download now" in an external account, any changes made to the external account configuration after the latest save was not used.
- When configuring hMailServer to connect to another server using SSL, it's now possible to enable verification of peer certificate (via certificate authority).

### 5.0 Beta Build 319 (2008-12-23)

- The server could in some cases crash when resolving invalid DNS records.

### 5.0 Beta Build 318 (2008-12-16)

- If the MySQL client is not available, a better error message is now shown to the user.
- It wasn't possible to give IMAP folder permission to "Anyone".
- A new version of OpenSSL is included (0.9.8i).
- The "Maximum number of invalid commands" in the SMTP settings now applies to logon failures as well, which means that the setting can be used to limit the number of invalid SMTP auth attempts. This is no complete solution though, since the user can simply reconnect and continue trying.
- If an IMAP client did not have permission to modify message flags but tried to do it, no error was reported to the user (the request was silently ignored).

### 5.0 Beta Build 317 (2008-12-14)

- Trying to select a user in the IMAP permissions dialog before adding any domains or users resulted in an error message.
- Forwarding messages using rules sometimes failed.

### 5.0 Beta Build 316 (2008-12-13)

- Performance improvements (slightly reduced memory usage).
- HELO-host spam check gave false positive when using a forwarding relay.
- When deleting an IMAP folder, notifications about new messages weren't always sent.
- If a POP3 mailbox was larger than 2GB, the size wasn't reported properly in the POP3 communication. (It's not known whether this causes any issues).

### 5.0 Beta Build 315 (2008-12-09)

- Improvements have been made to the database scripts to speed up upgrades of large databases.
- If the InnoSetup flag /VERYSILENT is passed to the setup executable, hMailServer Administrator will no longer be started after the installation is done. (Issue 153)
- If the database delivery log was enabled, a warning was shown when opening up the SMTP settings.
- The "Move up" and "Move down" buttons were missing in the rule list.
- In version 4, forwarding was performed after account level rules. In V5, this ordering was changed. It's now changed back to the v4-order to maintain backwards compatibility.
- WebAdmin now contains a version check which confirms that the WebAdmin version matches the hMailServer version.
- SMTP: When hMailServer rejected messges, a non-standard SMTP error code was used. While this shouldn't cause any problems, a standard error code is now used instead (Issue 155).
- IMAP: If a folder was shared, expunge notifications weren't sent properly between clients.

### 5.0 Beta Build 314 (2008-11-27)

hMailServer Administrator:

- The "value"-part of a "Set header field" action wasn't saved.

Server core:

<ul>
    <li>Performance improvements when adding a large number of accounts (&gt; 10000).</li>
    <li>When appending a new message to a public folder, the message wasn't stored properly. (Only affected new message, not message copy)</li>
    <li>Sometimes when copying messages between public folders, other clients weren't notified properly.</li>
    <li>When changing the number of delivery threads, a restart of the server is no longer needed for the change to take effect.</li>
    <li>Enabling the cache did not take effect until server restart.</li>
    <li>When changing the cache TTL, the hit rate information is now reset so that you can correctly see the effect your change has.</li>
    <li>SMTP: Error on QUIT causes duplicate messages (Bug 147).</li>
    <li>The <span style="font-style: italic;">Received</span>-header in email messages no longer contains the <span style="font-style: italic;">With hMailServer</span>-text (change made to improve security)</li>
</ul>

### 5.0 Beta Build 313 (2008-11-13)

- In the Rule criteria dialog, it's now possible to test whether a specific value will match the criteria. This makes it easier to create, for example, regular expressions.
- SURBL tests missed URLs which were split onto more than one line.
- After Anti-Spam has been run, the debug log now contains the score returned by the different spam protection mechanisms.
- Security vulnerability SA32597 has been fixed.

### 5.0 Beta Build 312 (2008-11-08)

- The folder list sometimes included a linefeed, which caused Thunderbird to crash. (Thanks DFitch!)
- Sometimes Outlook gave the error message "The uid of a message changed unexpectedly". A workaround which may solve this issue has been implemented.

### 5.0 Beta Build 310 (2008-11-03)

- If a domain had a MX record with a host name, and that host name didn't have a DNS/A record, the SPF anti spam mechanism reported a false positive.
- The #public folder was not included in the LIST response, making it invisible in some clients. (The sub folders were included in the LIST response)
- The ini file setting DNSBLChecksAfterMailFrom now works. It was removed during the re-design of the spam protection but have been added again.
- When a public IMAP folder was deleted by an IMAP client, the folder cache in hMailServer wasn't immediately updated.
- The error handling in the IMAP component has been rewritten to improve performance.

## 5.0 Beta Build 309 (2008-10-28)

### Major new features:

- **Score based spam protection.** In version 5, every spam protection mechanism generates a spam score for an email message. If the total spam score reaches a certain threshold, the message will be marked as spam. If it reaches an even higher threshold, it may be deleted. This new functionality will improve the overall spam classification of messages.
- **Built in SSL encryption**. Using this new functionality, you can set up a secure connection between hMailServer installation and your users. The SSL functionality is also available when hMailServer communicates with other servers which supports SSL. For example, you no longer need to use external tools to download messages from other SSL POP3 servers.
- hMailServer 5 includes a **SpamAssassin integration** which makes spam detection more efficient. After SpamAssassin has been installed, you can configure hMailServer to use it simply by enabling the integration.
- hMailServer now supports **Public folders.** You can now set up public folders which some or all users on the server can access. It is possible to give users (or groups) separate permissions for these public folders, for example to make sure that only moderators can add or delete messages in the folder. Messages can be put into these public folders either manually, or by using rules.

### Other improvements:

- hMailServer is now officially tested with Windows Vista and Windows Server 2008.
- Support for PostgreSQL have been added. Next to MySQL and Microsoft SQL Server, hMailServer can now use PostgreSQL as backend store.
- Fully integrated database. In earlier versions, MySQL was bundled as the default database option. In version 5, this has been changed to MSSQL CE. The database engine will be hosted by hMailServer which makes hMailServer easier to install. Upgrades will not be affected by this change.
- It's now possible to trigger a manual download of messages from external accuonts.
- In the account settings, you can now create and delete IMAP folders connected to the accounts. You can also manually empty accounts.
- A Delivered-To header can be added to incoming messages. This header will contain the value of the recipient address specified in the SMTP conversation.
- In hMailServer Administrator, it's now possible to see the number of currently active SMTP, POP3 and IMAP sessions.
- You can now define a maximum size of messages which are going to be scanned for spam.
- In hMailServer 5, you can use rules to specify which route should be used when delivering a message. This makes it possible to override the default routing functionality.
- In version 5, the hMailServer COM API has full support for Unicode. This means that scripts which accesses email data will have no problem accessing messages containing for example japanese or arabic characters.
- A lot of new functionality have been added to the hMailServer COM API. See the Com API change log for more information.
- And more...

### Breaking changes:

- The Database Delivery Log function has been removed and replaced by a script, found in the User contributed scripts section of the online forum. The reason is that this functionality has caused problems for users who have enabled it without knowing what it does.
- Many objects in the API has been removed or replaced. Please see the API change log for more information.

### 4.4.4 Beta Build 287 (2008-12-23)

- The server could in some cases crash when resolving invalid DNS records.

### 4.4.4 Beta Build 286 (2008-12-08)

- SMTP: Specific error codes given by the recipients server aren't handled properly. This may cause hMailServer to retry delivery even if a delivery has failed permanently ([Issue 254](http://www.hmailserver.com/issues/?154))

<h2><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font color="#0000ff">4.4.3 Build 285 - Stable (2008-11-09)</font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></h2>

<ul>
    <li>
    <p>This build fixes hMailServer Security Vulnerability (SA32597).<em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><br>
    </em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></p>
    </li>
</ul>

### 4.4.3 Beta Build 284 (2008-11-09)

- A security problem has been found in PHPWebAdmin which may be used by attackers to gain access to the server. The purpose of this build is to distribute a version which is open for review. Since the fix is still preliminary, it is recommended that you disable PHPWebAdmin until a final solution has been made.

<h2><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font color="#0000ff">4.4.2 Build 283 - Stable (2008-09-06)</font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></h2>

 

<ul>
    <li><span class="postbody">SMTP: A user could cause a hMailServer instance to crash by sending a large message which fills up the hard drive on the server. In this build, hMailServer will stop writing to the message file when the Max message size limitation is reached reducing the risks of this.</span></li>
</ul>

### 4.4.2 Beta Build 279 (2008-07-11)

 

<ul>
    <li><span class="postbody">SMTP: In Rules, it is now possible to explicitly define which route should be used for a specific message.</span></li>
    <li><span class="postbody">IMAP: Specific commands sent over IMAP could cause hMailServer to crash. Parameter sanity checks have been added to a lot of commands to prevent this.</span></li>
</ul>

### 4.4.2 Beta Build 278 (2008-03-29)

- POP3: When hMailServer downloaded messages from external POP3 accounts, dates were not always parsed properly.

### 4.4.2 Beta Build 277 (2008-03-09)

 

<ul>
    <li><span class="postbody">IMAP: Rename of root IMAP folders did not work properly and sometimes left orphaned folders until service restart.<br>
    </span></li>
</ul>

### 4.4.2 Beta Build 276 (2008-02-11)

 

<ul>
    <li><span class="postbody">SMTP: In rare cases, hMailServer delivered duplicate messages to external recipients. It happened in some cases if multiple MX hosts were specified for the recipient domain, if the messages contained multiple recipients and some of them failed temporarily on both the first and second MX host. (Also depending on timing during disconnection from the remote server).<br>
    </span></li>
</ul>

### 4.4.2 Beta Build 275 (2007-11-13)

 

<ul>
    <li><span class="postbody">SMTP: A fix has been made to the DNS client in hMailServer. Previously, memory was leaked when DNS queries were made.<br>
    </span></li>
</ul>

<h2><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font color="#0000ff">4.4.1 Build 273 - Stable (2007-07-30)</font></em></font></em></font></em></font></em></font></em></font></em></font></em></font></em></h2>

 

<ul>
    <li><span class="postbody">If a user got access to the hMailServer COM API and authenticated, he could change password for other users on the same domain. (Issue 105)<br>
    </span></li>
</ul>

### 4.4.1 Beta Build 272 (2007-07-29)

 

<ul>
    <li><span class="postbody">Data Directory Synchronizer: When adding messages to the database, the create-time of the message in the database is set to the timestamp found in the first Received header. If no such timestamp exists (or is unparseable), the timetamp in the Date header is used. If this isn't found (or is unparseable), hMailServer uses the current date and time as create-time.</span></li>
    <li>POP3: If you configure hMailServer to delete messages from external accounts after X days, they are never deleted from the remote server.</li>
</ul>

### 4.4.1 Beta Build 271 (2007-05-05)

 

<ul>
    <li><span class="postbody">SMTP: E-mail addresses in white listing records were case sensitive (Issue 97).</span></li>
    <li><span class="postbody">Anti spam: Using <a href="?page=reference_inifilesettings">two new ini file settings</a>, it's now possible to configure how often expired greylisting records should be cleared from the database, and whether or not greylisting should be active during this period. The new settings are named </span>GreylistingEnabledDuringRecordExpiration and GreylistingRecordExpirationInterval.</li>
    <li><span class="postbody">Administration: When restoring a backup, descriptions for white listing records were not restored. (Issue 93)</span></li>
    <li><span class="postbody">POP3: If a large number of external accounts were set up, hMailServer started too many parallel downloads. (Issue 92)</span></li>
</ul>

<h2><em><font size="+0"><em><font size="+0"><em><font size="+0"><em><font color="#0000ff">4.4 Build 270 - Stable (2007-04-09)<br>
</font></em></font></em></font></em></font></em></h2>

 

<ul>
    <li><span class="postbody">Administrator: Minor GUI problem in External accounts dialog.<br>
    </span></li>
    <li>Administrator: When adding a new DNS blacklist or SURBL server, it was possible to two objects with the same name. This had the effect that you got a "Duplicate key" error message and had to restart the service.</li>
</ul>

### 4.4 Beta Build 269 (2007-04-01)

 

<ul>
    <li><span class="postbody">POP3: hMailServer now adds a X-hMailServer-ExternalAccount header to the beginning of messages which have been downloaded from external servers. This header contains the name of the external account the message was downloaded from. </span></li>
    <li><span class="postbody">SMTP: After a rule script has been run, the message data is now re-loaded from disk, since the script may have changed its contents. This makes it possible to take different actions depending on the new content in following rules. </span></li>
</ul>

### 4.4 Beta Build 268 (2007-03-24)

 

<ul>
    <li><span class="postbody">SMTP: A change has been made to the way email addresses are parsed in MIME headers, to allow larger deviation from the RFC's. (Because users who type in their email addresses in their email clients know little about RFC's. This is required when hMailServer downloads messages from other servers and is configured to deliver to the recipients in the MIME header). </span></li>
</ul>

### 4.4 Beta Build 267 (2007-03-20)

 

<ul>
    <li><span class="postbody">API: A new event, OnDeliveryStart, has been added. This event is executed directly when the delivery of a message has started, before the global rules are executed. </span></li>
    <li><span class="postbody">Administration: hMailServer Administrator crashed if user tried to add two aliases or lists with same address. </span></li>
    <li><span class="postbody">Administration: In PHPWebAdmin, i</span><span class="postbody">t was possible to delete your own account if register_globals was enabled. (Issue 90) </span></li>
</ul>

### 4.4 Beta Build 265 (2007-03-16)

 

<ul>
    <li><span class="postbody">IMAP: hMailServer crashed if an incorrectly formatted RENAME was sent. A general fix has been made to prevent this type of error. (Issue 88)<br>
    </span></li>
</ul>

### 4.4 Beta Build 264 (2007-03-15)

 

<ul>
    <li><span class="postbody">POP3: If a client disconnects without QUIT'ing, any message deletion flag is now removed.</span></li>
    <li><span class="postbody">POP3: Sometimes sender address wasn't parsed properly when downloading messages from external servers. This may lead to problems if hMailServer is going to deliver the message to an external recipients. (<a href="http://www.hmailserver.com/devnet/?page=issuetracker_update_issue&amp;issueid=87">Issue 87</a>)<br>
    </span></li>
</ul>

### 4.4 Alpha Build 263 (2007-03-04)

<ul>
    <li><span class="postbody">The built-in MySQL server is now configured to auto-recover if corrupt tables occur (myisam-recover=FORCE,BACKUP). This change only effects new installations. </span></li>
    <li><span class="postbody">PHPWebAdmin: When using PHP5, it was not possible to view account settings. </span></li>
    <li><span class="postbody">PHPWebAdmin: It was not possible to log on using a domain name alias. </span></li>
    <li><span class="postbody">PHPWebAdmin: Changes made to Active Directory settings were not saved. (Issue 85)</span></li>
    <li><span class="postbody">hMailServer Administrator: When renaming domains, accounts were sometimes incorrectly renamed. (Issue 86)<br>
    </span></li>
</ul>

### 4.4 Alpha Build 262 (2007-03-04)

<ul>
    <li><span class="postbody">Misc: A new version of the auto-reply/vacation plugin for SquirrelMail has been included. Makes it easier to select expiration date. (thanks gruenie!)</span></li>
    <li><span class="postbody">FIX: A change has been made to prevent bounce-messages from looping when rules are used.</span></li>
    <li><span class="postbody">SMTP: Expired greylisting triplets are now cleared once every 4 hour instead every minute. (Increases database performance). </span></li>
    <li><span class="postbody">FIX: When using SQL Server or MySQL in strict mode, it was not possible to add new external accounts.</span></li>
    <li><span class="postbody">Performance: PHPWebAdmin now only shows sub-nodes for the currently selected object in the tree to the left, which speeds up the scripts in larger installations. </span></li>
</ul>

### 4.4 Alpha Build 261 (2007-02-24)

<ul>
    <li><span class="postbody">FIX: When an error notification is sent due to a delivery failure, the notification now contains a bit more information regarding the problem. (The IP address of the server hMailServer was trying to deliver to, and the hMailServer command which resulted in the problem)</span></li>
    <li><span class="postbody">FIX: Sometimes error HM4403 was reported when messages were being deleted due to spam/virus protection. (Caused incorrect IP address logged in Awstats log)</span></li>
    <li><span class="postbody">FIX: If messages were deleted using IMAP, but not purged some POP3-clients reported inconsistencies between the STAT and UIDL/LIST responses when accessing the mailbox. </span></li>
</ul>

### 4.4 Alpha Build 260 (2007-02-11)

<ul>
    <li><span class="postbody">API: It's now possible to check the current number of delivery attempts by accessing the DeliveryAttempt property on the hMailServer.Message object.</span></li>
    <li><span class="postbody">API: It's now possible to access headers by name, by calling Headers.ItemByName("Name") on the hMailServer.Message object to retrieve a hMailServer.MessageHeader object.</span></li>
    <li><span class="postbody">Feature (minor): It's now possible to configure how many times hMailServer should try to connect to the database server during start-up.</span></li>
    <li><span class="postbody">See http://www.hmailserver.com/documentation/?page=reference_inifilesettings (ConnectionAttempts, ConnectionAttemptsDelay)</span></li>
    <li><span class="postbody">FIX: If a user added a message to a mailbox (for example Sent items), but disconnected before it had completed, an orphaned message was left in the data directory.</span></li>
    <li><span class="postbody">FIX</span><span class="postbody">: If displaying of notices were enabled in PHP, it was not possible to add domains to PHPWebAdmin.</span></li>
    <li><span class="postbody">FIX</span><span class="postbody">: If a non-existant account had been specified as mirror address, hMailServer now prevents looping.</span></li>
    <li><span class="postbody">FIX</span><span class="postbody">: Issue 80, If no subject had been specified in the auto-reply settings, the subject on the reply email always became "Re:".</span></li>
    <li><span class="postbody">FIX</span><span class="postbody">: Issue 82, Timeouts during DNS queries previously sometimes lead to message marked as spam.</span></li>
    <li><span class="postbody">FIX</span><span class="postbody">: Issue 83, If a password contained a \, it was not possible to log on POP3 (never has been).</span></li>
    <li><span class="postbody">Misc/</span><span class="postbody">FIX</span><span class="postbody">: A change has been made to the garbage collection algorithm to make it a bit more stable.<br>
    </span></li>
</ul>

### 4.4 Alpha Build 259 (2007-02-04)

### 4.4 Alpha Build 258 (2007-01-23)

### 4.4 Alpha Build 257 (2007-01-16)

### 4.4 Alpha Build 256 (2007-01-12)

### 4.4 Alpha Build 255

- PHPWebAdmin now includes the new features.
- ORDB is no longer included in the default list of DNS blacklists.
- API: A hMailServer.MessageHeaders can now be retrieved using the Headers property on the hMailServer.Message object.
- API: The RefreshContent method on the hMailServer.Message object allows you to reload the content of an email message from disk.
- API: hMailServer.Account::VacationMessageExpiresDate is now of type String, instead of VariantDate.
- If checking of senders MX records have been enabled, hMailServer now checks for MX records on the senders domain not including any sub domain. For example, if someone sends from cgi.example.com, hMailServer will check that the domain example.com has MX records. The reason for this is that there's no point in checking cgi.example.com, since this results in to many false positives.
-  _ has now been added to the list of valid plus addressing characters. (Not in PHPWebAdmin yet. Will be included in next build)

### 4.4 Alpha Build 254

- Bugfix C68 - hMailServer now checks the host name in the HELO command, even if the sender address is empty.
- Bugfix C43 - Leading and trailing spaces are removed from domain names, if the user has accidentally added this.

### 4.4 Alpha Build 253

- See What's new for changes in this build.

### 4.3.2 Beta Build 266 (2007-03-16)

 

<ul>
                    <li><span class="postbody">IMAP: hMailServer crashed if an incorrectly formatted RENAME was sent. A general fix has been made to prevent this type of error. (Issue 88)</span></li>
                </ul>

<h2><em><font size="+0"><em><font color="#0000ff">4.3.1 Build 253 - Stable</font></em></font></em></h2>

- Bugfix C79 - If an external software had modified the .eml file in the data directory in an incorrect way, hMailServer could sometimes not send it to POP3 clients.

### 4.3.1 Build 252

- When saving anti spam settings in PHPWebAdmin, the value of '*Allow empty sender address*' was inverted. (PHPWebAdmin updated)

### 4.3.1 Build 251

- The full English translation is now included.

### 4.3.1 Build 250

- Support for Windows Vista has been added. Please note that this is still experimental.
- In earlier versions of hMailServer it was not possible to send a message to a distribution list if one of the recipients did not exist. From now on, hMailServer will accept the message and deliver it to the existing recipients.
- If a SMTP client had added a leading space to the host name in the *HELO* command (which is a violation of the SMTP RFC), hMailServer did not accept email from the client. The implementation has been changed so that hMailServer ignores this client error.

### 4.3.1 Build 249

- Bugfix C69 - IMAP literals did not work in previous builds. This bug had the effect that some IMAP commands in specfic clients failed. For example, logging on Horde/IMP did not always work.
- Bugfix C21 - The fix for an old bug which was fixed in 4.2.2 was not included in hMailServer 4.3. This had the effect that an infinite loop was created when downloading messages formatted in a specific way. The risk of the problem occuring is relativly low and it will only occur with some specific POP3 clients.

<h2><em><font color="#0000ff">4.3 Build 248 - Stable</font><br>
                </em></h2>

- Bugfix: C66 - Upgrades from earlier versions failed when MySQL with InnoDB was used, due to incompatible SQL statements.
- Bugfix C67 - It was not possible to update exiting distribution list recipients in PHPWebAdmin without removing and adding them again them.

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
                    <li>Bugfix: C60 - MIME-decoding could fail for certain messages. This had the effect that they could not be processed by rules and scripting. It could also have the effect that they were not displayed properly in the email client.</li>
                    <li>Functionality: When DataDirectorySynchronizer imports messages from the data root directory, it no longer sends messages to all external recipients of the email messages. This change has been done to prevent duplicate emails from being sent. Earlier versions, running DataDirectorySynchronizer could for example forward email back to mailing lists.</li>
                    <li>Bugfix / Performance: DataDirectorySynchronizer now releases objects from memory when they are no longer needed, which leads to an performance improvement when importing a large number of messages.</li>
                    <li>UI: In hMailServer Administrator, the following changes have been made to the user interface:
                    <ul>
                        <li>The <em>Backup</em> node have been moved to the <em>Utilities</em> node. The reason for this is that the backup functionality is not server settings but more a server utility.</li>
                        <li>The <em>Spam protection</em> and <em>AntiVirus</em> nodes have been moved to the <em>Settings</em> node. The reason for this is that spam protection and AntiVirus are applied on email downloading from other servers using POP3 so it does not only effect SMTP.</li>
                    </ul>
                    </li>
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

 
