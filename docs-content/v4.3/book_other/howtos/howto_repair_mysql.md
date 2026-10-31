---
title: "Repair corrupt MySQL table"
slug: howto_repair_mysql
parent: howtos
index: 0
is_book: false
---

MySQL tables can become corrupt for several reasons, such as hardware failure, operating system bugs, viruses and bugs in MySQL. hMailServer itself does not cause corrupt MySQL tables. hMailServer communicates with MySQL over TCP/IP using a standardized language. There's nothing in this language that can cause corrupt tables. 

If a MySQL table becomes corrupt, you need to repair it. Note that repairing a corrupt MySQL table may lead to loss of data. It's therefore important to create a backup of your system.

## How do you know whether a table is corrupt?

Examine the hMailServer error log. If you see a lot of *Error while executing SQL statement*-messages, then it's likely that one or more of your tables are corrupt. Feel free to ask in the forum if you're unsure.

## Step 1: Determine MySQL password

If you are using an external version of MySQL, you should already know your MySQL password. If you are using the built-in MySQL version that comes with hMailServer, you might not know your password. To determine it, follow these steps:

1. Run the script hMailServerAddonsUtilitiesDecryptBlowfish.vbs.
2. Open up hMailserver.ini, located in your Windows directory or hMailServer bin directory.
3. Copy the password from hMailServer.ini to the DecryptBlowfish dialog.
4. Click OK in DecryptBlowfish to view your password

DecryptBlowfish will now show your password. Either keep the dialog open or memorize the password.

## Step 2: Connect to the server

To be able to repair your table, you need to connect to the MySQL server using a MySQL client. You can use [SQLyog](http://webyog.com/en/downloads.php) for this. 

1. Download and install SQLyog
2. Create a new connection.
3. Enter the connection information for your MySQL server. If you are using the built-in server, you should enter hostname: localhost, user:root, password:password from DecryptBlowfish, port:3307
4. Click Connect to connect to the database server

## Step 3: Repair the table

Follow these steps to run the SQL statement to repair the table.

1. In the tree to the left, click on the hmailserver database.  
The hMailServer database will now be active.
2. In the right part of the MySQL-Front window, click on the *Query* tab.
3. Enter *REPAIR TABLE tablename*, for example, *REPAIR TABLE hm_messages*.
4. Click on the *Execute Current Query* button in the toolbar.
5. MySQL should now repair the table. After the table has been repaired, restart the hMailServer service. Depending on what table is corrupt, this may not be required. But we recommend that you always do it.
