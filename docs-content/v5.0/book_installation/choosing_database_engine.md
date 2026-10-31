---
title: "Choosing database engine"
slug: choosing_database_engine
parent: book_installation
index: 15
is_book: false
---

## Overview

hMailServer supports 5 different database engines

- [Microsoft SQL Server 2000 and later](http://www.microsoft.com/SQL/default.mspx)
- [Microsoft SQL Server Compact Edition (CE)](http://www.microsoft.com/sql/editions/compact/default.mspx)
- [MySQL 4 and later](http://www.mysql.com)
- [PostgreSQL](http://www.postgresql.org/)

## Choosing database

In version 5, Microsoft SQL Server Mobile Edition is used by default. The biggest benefit with this database engine is the small memory and disk footprint and the fact that it does not require any external software to run on the computer. The database engine runs inside of hMailServer which means that hMailServer has no dependencies on external database engines.  Previous versions of hMailServer (4 and older) included MySQL but this was changed to MSSQL CE in version 5. There are downsides with the default database though:

The Microsoft SQL Server Compact Edition installation which comes with hMailServer is limited to 4GB . If you expect that your installation will become large (hundreds of thousands of e-mail messages or many accounts) it's recommended that you choose either Microsoft SQL Server or MySQL. A MSSQL CE database of 4GB can hold references to about 10 million email messages. Performance-wise, MSSQL CE is slower than the other supported database engine. Also, there are few tools available if the SQL CE database becomes corrupt, for example due to hardware failure or a system crash.

## Recommendations

- If sending or receiving of email is critical to you and you cannot risk any loss of data, choose Microsoft SQL Server, MySQL.  

  
- If you plan to do an integration which involves the hMailServer database, it's recommended that you choose either Microsoft SQL Server or MySQL (due to the fact that there are a lot of client tools available).

 
