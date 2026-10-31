---
title: "News in hMailServer 4.2"
slug: whats_new_42
parent: book_quickstartguide
index: 40
is_book: false
---

## News in hMailServer 4.2

### Built-in backup support

hMailServer now has built-in backup support. This means that you don't have to use an external tool or script to do a backup. It also means that backups safely can be made online, without stopping any services. In hMailServer Administrator, you specify what parts of hMailServer should be backup:ed. It's possible to run the backup on scheduled intervals using Windows Scheduler. **Note:** Since backup is a critical part of running a server, and this is the first version to include built-in backup support, you should consider the hMailServer backup feature to be experimental. Do not rely on it for business critical purposes.

### AWStats support

In the logging settings, you can specify that you want to create an AWstats log. This log can be parsed by AWstats to produce delivery statistics for your email server.

### IMAP Sort extension

By enabling the IMAP sort extension in your IMAP client, browsing large folders can now become much faster.

### Improved database connection

If the connection to the database is dropped of any reason, hMailServer will now try to re-open the connection. Also, instead of just opening one connection towards the database, hMailServer now opens 5 parallel connections, which may increase performance dramatically.

### Improved performance

A lot of performance improvements have been made. These includes smarter parsing of MIME messages, better database indexes, reduced number of SQL statements, caching of account objects, less disk writes, caching of threads, and more. Altogether, these more than double the performance of the server.
