---
title: "About hMailServer 5.3"
slug: about_hmailserver_5
parent: book_before_installation
index: 31
is_book: false
---

## News in hMailServer 5.3

### Major new features:

- [Support for IPv6](?page=details_ipv6)

### Other improvements:

- In the MX query, you can now right click on rows and copy to clipboard.
- It's now possible to bypass grey listing if a connection arrives from a MX or A record for the sending domain.
- A new event has been added, OnExternalAccountDownload

## News in hMailServer 5.2

### Major new features:

- When an email is sent from a local domain, the sender is now considered local. This means that if a message arrives from an alias address, such as alias@example.com, hMailServer will require SMTP authentication by default. The purpose of this is to stop spammers sending messages from local domains. In earlier versions, SMTP authentication was only required when sending messages from local accounts. Note that this [also affects routes.](?page=reference_routes)
- A basic diagnostic tool has been added to hMailServer Administrator and WebAdmin. The diagnostic tool performs basic tests on your set up and checks DNS settings. The purpose of the diagnostic tool is to help you troubleshooting.
- In the performance settings, it's now possible to enable Message indexing. When this is enabled, some additional message meta data is stored in the database. This can greatly improve browsing speed in large folders when using a webmail client. The downside of this feature is that the database size will increase. It's not recommended to enable this feature unless you're experiencing performance problems related to large folders in web mail.

### Other improvements:

- If MySQL with InnoDB was used, message ID's could sometimes repeat themselves, which could lead to lost messages (client dependant). This was reported as issue 213.
- Attachment names containing non-latin characters didn't always show up properly, issue 218.
- If a message is downloaded from an external account, the message was not delivered to recipients on routes. There is now a new option in the external account settings which allows you to enable this behavior. Issue 215.
- In the grey listing options you can now choose to [bypass greylisting if SPF passes](?reference_greylisting).
- The IMAP property UIDNEXT  has now been implemented. This makes it possible to use hMailServer with POPfile.
- A new rule action has been added; Create Copy. This can be used for example to deliver copies of the same message to different destination servers.
- A new rule criteria has been added; Delivery attempts. This can be used for example to deliver messages to different routes, depending on the current number of delivery attempts.
- When you delete items in hMailServer Administrator, you now need to confirm the deletion before it's performed. This should reduce the number of accidental deletes.
- The database upgrade is now done in a transaction (assuming the underlying database supports it). This should reduce problems if something goes wrong during a database upgrade.
- If hMailServer tries to deliver the same message multiple times, global rules will now be executed every time.
- If a Date header contained the timezone "GMT" (with quotes, obsolete syntax) the message was not displayed if Outlook Express was used (Issue 209)
- SMTP connection sometimes dropped during DKIM verification. The problem occured if DKIM records in the DNS contained CNAME records.

## News in hMailServer 5.1

### Major new features:

- hMailServer 5.1 supports **Domain Keys Identified Mail**, DKIM. hMailServer can verify signatures of incoming email and sign outgoing email. Email messages which have been DKIM-signed receives higher trust from sme large Internet email servers, making it less likely that your email is treated as spam.
- Using the **new auto-ban settings**, you can configure hMailServer to automatically disconnect and temporarily ban users after too many failed logon attempts.

### Other improvements:

- A few new settings have been added to IP ranges. IP ranges in 5.1 allows more **fine-grained control over authentication.**
- The user interfaec in WebAdmin has been updated. The interface is now tab-based, which makes it more easy to navigate.

## News in hMailServer 5

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

 
