---
title: "About hMailServer 5"
slug: about_hmailserver_5
parent: book_before_installation
index: 31
is_book: false
---

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
