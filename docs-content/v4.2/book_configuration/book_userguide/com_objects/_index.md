---
title: "COM API"
slug: com_objects
parent: book_userguide
index: 0
is_book: false
---

# Overview

The hMailServer COM API lets you write your own scripts and applications that integrate with hMailServer. Almost all objects in hMailServer are accessible using the COM library. As an example, both hMailServer Administrator and the PHP WebAdmin is entirely based upon the COM library. Besides writing application like theese two, you can write scripts that are automatically run when certain events take place. For example, you can write a script that filters messages before they are delivered to the recipients.

The [Application](?page=com_application) object is the root object in hMailServers COM model. Using this object, you can access all hMailServer objects and settings.

# Reference

- ## Domain objects

 
 
   - [Domains](?page=com_domains)
  - [Domain](?page=com_domain)
     - [Accounts](?page=com_accounts)
    - [Account](?page=com_account)
       - [IMAPFolders](?page=com_imapfolders)
      - [IMAPFolder](?page=com_imapfolder)
         - [Messages](?page=com_messages)
        - [Message](?page=com_message)
           - [Attachments](?page=com_attachments)
          - [Attachment](?page=com_attachment)
          - [Recipients](?page=com_recipients)
          - [Recipient](?page=com_recipient)
      - [FetchAccounts](?page=com_fetchaccounts)
      - [FetchAccount](?page=com_fetchaccount)
    - [Aliases](?page=com_aliases)
    - [Alias](?page=com_alias)
    - [DistributionLists](?page=com_distributionlists)
    - [DistributionList](?page=com_distributionlist)
       - [DistributionListRecipients](?page=com_distributionlistrecipients)
      - [DistributionListRecipient](?page=com_distributionlistrecipient)
    - [DomainAliases](?page=com_domainaliases)
    - [DomainAlias](?page=com_domainalias)
- ## Settings

   - [AntiVirus](?page=com_antivirus)
  - [Cache](?page=com_cache)
  - [BackupSettings](?page=com_backupsettings)
  - [DNSBlackLists](?page=com_dnsblacklists)
  - [DNSBlackList](?page=com_dnsblacklist)
  - [Language](?page=com_language)
  - [Logging](?page=com_logging)
  - [Routes](?page=com_routes)
  - [Route](?page=com_route)
     - [RouteAddresses](?page=com_routeaddresses)
    - [RouteAddress](?page=com_routeaddress)
  - [Scripting](?page=com_scripting)
  - [SecurityRanges](?page=com_securityranges)
  - [SecurityRange](?page=com_securityrange)
  - [Settings](?page=com_settings)
  - [IPHomes](?page=com_iphomes)
  - [IPHome](?page=com_iphome)
  - [Rules](?page=com_rules)
  - [Rule](?page=com_rule)
     - [RuleCriterias](?page=com_rulecriterias)
    - [RuleCriteria](?page=com_rulecriteria)
    - [RuleActions](?page=com_ruleactions)
    - [RuleAction](?page=com_ruleaction)
- ## Server-wide objects

 
   - [Application](?page=com_application)
  - [Backup](?page=com_backup)
  - [BackupManager](?page=com_backupmanager)
  - [Database](?page=com_database)
  - [DeliveryQueue](?page=com_deliveryqueue)
  - [GlobalObjects](?page=com_globalobjects)
  - [Status](?page=com_status)
  - [Utilities](?page=com_utilities)
- ## Scripting-wide objects

 
   - [Client](?page=com_client)
  - [Result](?page=com_result)

# Examples

- [Sending a message](?page=com_example_message_send)
