---
title: "System requirements"
slug: system_requirements
parent: book_installation
index: 10
is_book: false
---

## Operating system

hMailServer can be installed on Windows NT, 2000, 2003 and XP. All of these, except Windows NT, support hMailServer out-of-the-box, without further requirements. As hMailServer uses Active Directory Client Extensions (which are included in Windows 2000 and later, but not in NT), you need to install those extensions before you install hMailServer on Windows NT. The package providing that functionality, *Active Directory Client Extensions for Windows NT Workstation*, can be downloaded for free from Microsoft's web site.

### Installing the extensions

1. If you installed hMailServer before reading this, the first step is to completely uninstall hMailServer and delete the entire hMailServer directory structure.
2. Download the extensions [at the Microsoft website](http://www.microsoft.com/ntworkstation/downloads/Other/adclient.asp).
3. Run the file DSClient.exe. If instructed to reboot your computer, do so.
4. Install hMailServer.

## Other Software

hMailServer was designed to provide, in one single download, everything you need to run an email server, with the exception of the NT component mentioned above. hMailServer even has its own database server, a light-weight version of the MySQL database server. Should you not wish to use it, you can select to use your own MySQL or Microsoft SQL database server. You might want to do that, for example, if you already have a Microsoft SQL Server or MySQL server running on your machine. If you're MSSQL, you need MSSQL 2000 or later. 

hMailServer is incompatible with the following sotware:

- NetLimiter from Locktime Software. NetLimiter has an incorrectly written Windows LSP ("Winsock driver") which causes problems for hMailServer. NetLimiter works incorrectly with other software as well (including software from Microsoft) so it should never be installed on the same computer as hMailServer). The hMailServer Team has tried to get an explanation from Locktime Software about this but has not received any.
- NOD32/IMON from ESET. hMailServer is not compatible with the IMON component in NOD32. During installation of NOD32, a warning is shown that the IMON component should not be installed on servers since it's known to cause issues with server software. (hMailServer has no problems coexisting and using NOD32 as long as the IMON component is note enabled)

## Hardware

The hardware requirements are very much dependent on the number of users. They also depend on whether or not you will be using IMAP support, virus scanning, filters, etc. POP3 uses much less CPU resources than IMAP, so, if you have a lot of users, POP3 is recommended. hMailServer normally uses less than 100MB of memory.
