---
title: "Server"
slug: reference_server
parent: book_referenceguide
index: 0
is_book: false
---

## Overview

You can control hMailServer's server in hMailAdmin. To do so, open hMailServer and click on *Status* from the tree to the left. On the right-hand menu, select the *Server* tab. This enables you to start and stop the server.

## Notes

- When you start or stop the server from here, you do not actually start or stop the actual server *service*. Even if you click on Stop, the hMailServer service will continue running. That is, the server stops, not the service as a whole. The service is the executable file, hMailServer.exe, whereas the server is the sub-component in the executable, that accepts connections from clients. 
   
  

The hMailServer COM library on which hMailAdmin is built is a part of the executable, hMailServer.exe. If hMailServer.exe could be stopped in the Administrator, the COM library would no longer be available. That would result in hMailAdmin itself losing connection to the service.
