---
title: "System requirements"
slug: system_requirements
parent: book_installation
index: 10
is_book: false
---

## Operating system

hMailServer can be installed in the following operating systems. The latest available Windows service pack must be installed. hMailServer has only been tested on the following operating systems. hMailServer may work on other operating system versions as well, but only the versions below are officially and regulary tested.

### hMailServer 5.0

- Microsoft Windows 2008 (all editions)
- Microsoft Windows Vista
- Microsoft Windows 2003 (all editions)
- Microsoft Windows XP Professional
- Microsoft Windows 2000 (all editions)

### hMailServer 4.3 and 4.4

- Microsoft Windows 2003 (all editions)
- Microsoft Windows XP Professional
- Microsoft Windows 2000 (all editions)

Windows NT support has been removed since Microsoft no longer supports this operating system.

### hMailServer 4.2

- Microsoft Windows 2003 (all editions)
- Microsoft Windows XP Professional
- Microsoft Windows 2000 (all editions)
- Microsoft Windows NT

## Other Software

### Database server

hMailServer was designed to provide, in one single download, everything you need to run an email server. hMailServer has its own integrated database server, a light-weight version of the MSSQL database server. Should you not wish to use it, you can [select one](?page=choosing_database_engine) of the following database engines:

- MySQL 4.1.18 or later
- Microsoft SQL Server 2005 or later (including Express, Standard and Enterprise edition)
- PostgreSQL 8  or later.

### SquirrelMail

If you plan to use the hMailServer password changer plugin or auto-reply plug-in with SquirrelMail, you will need SquirrelMail 1.4.7 or later.

### Web administration

If you plan to use PHPWebAdmin to manage your hMailServer installation via a web browser, you need to run a web server where support for PHP is available.

### Incompatible software

hMailServer is incompatible with the following sotware:

- NetLimiter from Locktime Software. NetLimiter has an incorrectly written Windows LSP ("Winsock driver") which causes problems for hMailServer. NetLimiter works incorrectly with other software as well (including software from Microsoft) so it should never be installed on the same computer as hMailServer). The hMailServer Team has tried to get an explanation from Locktime Software about this but has not received any.
- NOD32/IMON from ESET. hMailServer is not compatible with the IMON component in NOD32. During installation of NOD32, a warning is shown that the IMON component should not be installed on servers since it's known to cause issues with server software. (hMailServer has no problems coexisting and using NOD32 as long as the IMON component is not enabled)

### Virus scanners

For hMailServer to work properly, automatic virus scanning of the hMailServer Data directory must be disabled. You should configure your virus scanner to exclude the hMailServer Data directory from scanning. If you do this, it is recommended that you configure hMailServer to launch your virus scanner whenever a new e-mail is received.

## Hardware

### Performance

The hardware requirements are very much dependent on the number of users. They also depend on whether or not you will be using IMAP support, virus scanning, filters, etc. POP3 uses much less CPU resources than IMAP, so, if you have a lot of users, POP3 is recommended. hMailServer normally uses less than 100MB of memory. The largest hMailServer installations have over 20 000 user accounts hosted on a single server.

### Screen resolution

The administration program for hMailServer, hMailServer Administrator, requires a screen resolution of 800x600 or above.

## Technical knowledge

To be able to successfully set up an email server, you need to know the basics about certain techniques related to Internet and email. While some parts of the hMailServer documentation describes and discusses these things, the hMailServer documentation should not be seen as a reference documentation for these areas. You need to have a basic understanding of the following items to be able to successfully set up an email server on Windows.

- Microsoft Windows
- Domain names and host names
- Firewalls and routers
- DNS, Domain Name System
- TCP/IP ports

 
