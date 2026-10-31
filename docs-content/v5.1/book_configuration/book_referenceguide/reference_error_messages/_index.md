---
title: "Error messages"
slug: reference_error_messages
parent: book_referenceguide
index: 0
is_book: false
---

## Overview

hMailServer consists of several different components and uses several external services such as DNS servers and database engines. These different components and services may issue error messages. The purpose of this page is to help you understand what such an error message means.

### Error groups

Error messages in hMailServer are divided into the following categories:

- [SMTP error messages](?page=reference_error_messages_smtp)  

   

 These are error messages you may see when you are trying to send email through hMailServer. You may see them in your email client when trying to send email messages, in bounce messages you have received from hMailServer and in hMailServer logs.  

  
- [DNS error messages](?page=reference_error_messages_dns)  

   

 These are error messages which are generated during the communication with the DNS server. hMailServer relies on Windows functionality to query DNS servers, so in most cases DNS error messages indicates incorrectly DNS configuration in Windows or temporary DNS server problems.  

  
- [Database error messages](?page=reference_error_messages_database)  

   

 These are error messages which are generated during the communication with the database server. The errors are typically reported in a hMailServer error log.  

  
- [hMailServer Administrator error messages](?page=reference_error_messages_hmailadmin)  

   

 These are error messages you may see when using hMailServer Administrator.

 

 
