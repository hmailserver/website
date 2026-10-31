---
title: "System requirements"
slug: system_requirements
parent: book_installation
index: 10
is_book: false
---

## Operating system

hMailServer can be installed Windows 2000, 2003 and XP. 

hMailServer 4.2 and earlier was possible to run on Windows NT4 as well, but this is no longer supported since Microsoft no longer supports this operating system.

## Other Software

### Database server

hMailServer was designed to provide, in one single download, everything you need to run an email server, with the exception of the NT component mentioned above. hMailServer even has its own database server, a light-weight version of the MySQL database server. Should you not wish to use it, you can select to use your own MySQL or Microsoft SQL database server. You might want to do that, for example, if you already have a Microsoft SQL Server or MySQL server running on your machine. hMailServer supports MySQL 4 and later, and MSSQL 2000 or later.

### SquirrelMail

If you plan to use the hMailServer password changer plugin or auto-reply plug-in with SquirrelMail, you will need SquirrelMail 1.4.7 or later.

### Web administration

If you plan to use PHPWebAdmin to manage your hMailServer installation via a web browser, you need to run a web server where support for PHP is available.

### Incompatible software

hMailServer is incompatible with the following sotware:

- NetLimiter from Locktime Software. NetLimiter has an incorrectly written Windows LSP ("Winsock driver") which causes problems for hMailServer. NetLimiter works incorrectly with other software as well (including software from Microsoft) so it should never be installed on the same computer as hMailServer). The hMailServer Team has tried to get an explanation from Locktime Software about this but has not received any.
- NOD32/IMON from ESET. hMailServer is not compatible with the IMON component in NOD32. During installation of NOD32, a warning is shown that the IMON component should not be installed on servers since it's known to cause issues with server software. (hMailServer has no problems coexisting and using NOD32 as long as the IMON component is note enabled)

### Virus scanners

For hMailServer to work properly, automatic virus scanning of the hMailServer Data directory must be disabled. You should configure your virus scanner to exclude the hMailServer Data directory from scanning. If you do this, it is recommended that you configure hMailServer to launch your virus scanner whenever a new e-mail is received.

## Hardware

### Performance

The hardware requirements are very much dependent on the number of users. They also depend on whether or not you will be using IMAP support, virus scanning, filters, etc. POP3 uses much less CPU resources than IMAP, so, if you have a lot of users, POP3 is recommended. hMailServer normally uses less than 100MB of memory.

### Screen resolution

The administration program for hMailServer, hMailServer Administrator, requires a screen resolution of 800x600 or above.

 
