---
title: "COM API ChangeLog"
slug: com_changelog
parent: com_objects
index: 0
is_book: false
---

This document briefly lists the changes made to the COM API.

## hMailServer 4.4

### Changes breaking compatibility

No changes have been made to the hMailServer COM API which breaks compatibility with previous versions.

### New events

- OnDeliveryStart - This event is executed directly after a delivery of an email is started, before the global rules are run.

### New objects

- [WhiteListAddresses](?page=com_whitelistaddresses) - Collection of all addresses to white-list.
- [WhiteListAddress](?page=com_whitelistaddress) - An address to white-list.

### Changes to existing objects

No properties or methods have been removed in hMailServer 4.4. Below is a list of added properties

- [AntiSpam](?page=com_antispam)
- [Account](?page=com_account)
- [Cache](?page=com_cache)

- [Domain](?page=com_domain)
- [IMAPFolders](?page=com_imapfolders)
- [Message](?page=com_message)
- [Utilities](?page=com_utilities)
- [SecurityRange](?page=com_securityrange)
- [FetchAccount](?page=com_fetchaccount)
- [Rule](?page=com_rule)
- [RuleAction](?page=com_ruleaction)

## hMailServer 4.3

### Changes breaking compatibility

In hMailServer 4.3, COM clients must call the Authenticate() function on the hMailServer.Application object prior to accessing any other function in the API. This change was made to increase the security of the hMailServer COM API.

The exception for this is the Message object. COM clients can create and send messages using the hMailServer.Message object without calling the Authenticate method.

If you are in a situation where you need to upgrade to hMailServer 4.3, but am unable to upgrade your COM client, a workaround is to set AdministratorPassword in hMailServer.ini to empty. If you do this, you do not have to call the Authenticate method()

### New objects

- [SURBLServers](?page=com_surblservers) - Collection of all SURBL servers set up in the system
- [SURBLServer](?page=com_surblserver) - Contains properties for a single SURBL server
- [AntiSpam](?page=com_antispam) - AntiSpam related settings
- [BlockedAttachments](?page=com_blockedattachments) - Collection of all objects set up in virus scanning / block attachments.
- [BlockedAttachment](?page=com_blockedattachment) - Properties for a single attachment listed under virus scanning / blocked attachments
- [ServerMessages](?page=com_servermessages) - Collection of text messages used by the server (for example, virus notification)
- [ServerMessage](?page=com_servermessage) - A single text message used by the server
- [GreyListingWhiteAddresses](fckblank.html?page=com_greylistingwhiteaddresses) - A collection of all the white addresses specified in the greylisting options
- [GreyListingWhiteAddress](?page=com_greylistingwhiteaddress) - A single grey listing white address
- [TCPIPPorts](fckblank.html?page=com_tcpippors) - A collection of all the TCP/IP ports which should be used
- [TCPIPPort](?page=com_tcpipport) - Properties for a single TCP/IP port

### New enums

- eRuleActionType, Added value: eRARunScriptFunction, - Run script function
- eAntiSpamAction - Action to take when spam has been detected
- eDistributionListMode - Distribution list mode
- eSessionType - Session type (SMTP/POP3/IMAP)
- eDomainSignatureMethod - Specfies how signatures should be applied (append, overwrite and so on)
- eMessageFlag - Contains message flags (seen, deleted and so on)

### Changes to existing objects

No properties or methods have been removed in hMailServer 4.3. Below is a list of added properties

- Application
- Account
- AntiVirus
- Database
- DeliveryQueue
- DistributionList
- Domain
- FetchAccount
- Logging
- Message
- RuleAction
- Status
- Settings
- Utilities
