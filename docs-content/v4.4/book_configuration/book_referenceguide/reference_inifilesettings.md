---
title: "Ini-file settings"
slug: reference_inifilesettings
parent: book_referenceguide
index: 0
is_book: false
---

# Overview

<p>Most settings in an hMailServer installation is stored in the database. However, some settings are stored in the <span class="Code">hMailServer.ini</span> file. Examples of settings stored in the ini-file are paths and database connection information. This document lists all the available settings in hMailServer.ini</p>

## Sections

### Directories

- ProgramFolder - The path to the hMailServer directory. By default, C:\Program Files\hMailServer.
- DataFolder - The path to the hMailServer data directory. By default, C:\Program Files\hMailServer\Data.
- LogFolder - The path where hMailServer logs are stored. By default, C:\Program Files\hMailServer\Logs
- TempFolder - The path where hMailServer stores temporary files, such as attachments during virus scanning. By default C:\Program Files\hMailServer\Temp
- EventFolder - The path where the hMailServer event file is located. By default, C:\Program Files\hMailServer\Events

### GUILanguages

- ValidLanguages - A list of valid hMailServer user interface languages. hMailServer Administrator uses this list to determine which languages to display in the *Language* menu.

### Database

- Internal - 1 if the internal MySQL database is used, 0 otherwise. hMailServer uses this setting to determine whether scripts should be applied to the MySQL database on the first launch. For example, if a new version of MySQL is included with the installation program, hMailServer might run SQL scripts to patch it.
- Type - Type of database. Can be either MySQL or MSSQL. hMailServer uses it to determine what method to use to connect to the database server, and which syntax to use for SQL statements.
- Username - hMailServer will use this username when connecting to the database server. If it's left empty, and MSSQL is used, hMailServer will try to use Windows Authentication.
- Password - The password hMailServer should use when connecting to the database server. If the passwordencryption is set to 1, the password is encrypted using blowfish.
- Passwordencryption - If set to 1, the database password is encrypted using blowfish. In this case, the hMailServer service decodes the password before connecting to the database.
- Port - The port hMailserver should connect to on the database server.
- Server - The database server host name hMailServer should connect to.
- Database - The name of the database hMailServer should try to use.
- NumberOfConnections - The number of connections should open to the database. The default value of this setting is 5, which means that hMailServer will open 5 connections to the database server. hMailServer often wants to execute several database queries at the same time. Since a specific database connection can only be used for one SQL statement at a time, multiple database connections improves performance.
- ConnectionAttempts - The number of times hMailServer should try to connect to the database before giving up on start-up. Default 6 times. (hMailServer 4.4 and later)
- ConnectionAttemptsDelay - The number of seconds hMailServer should pause between each connection attempt during start-up. Default 5 seconds. (hMailServer 4.4 and later)

### Security

- AdministratorPassword - The main hMailServer administration password. The user for example needs to enter this password when starting hMailServer Administrator. This password is encoded using MD5.

### Settings

The settings below should be edited carefully. The exist in the ini file only for database compatibility reasons. They will be moved to the database in an upcoming version. When you install a future version of hMailServer, you may need to change the setting once again, using hMailServer Administrator.

- DNSBLChecksAfterMailFrom - By default, hMailServer runs DNS blacklists checks after SMTP/MAIL FROM. Some users prefer to have it running after the SMTP/RCPT TO command. In this case, set the value of this setting to 0.
- AddXAuthUserHeader - If set to 1, hMailSever will add a X-AuthUser header containing a username to messages received using SMTP, if the user has authenticated.

 
