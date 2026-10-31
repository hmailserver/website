---
title: "Incoming relay"
slug: reference_incomingrelay
parent: book_referenceguide
index: 0
is_book: false
---

## Overview

hMailServer will assume that any message received from an incoming relay IP address is being forwarded.

Normally hMailServer uses the senders TCP/IP address when doing spam protection. When hMailServer receives an email from a MX backup, hMailServer can't use the senders TCP/IP address since this is the IP address of the backup server. If you add the MX backup servers IP address as an incoming relay, hMailServer will know that messages from this server is being forwarded. hMailServer will then try to determine the original senders IP address by parsing the Received headers of the email message.  

 
