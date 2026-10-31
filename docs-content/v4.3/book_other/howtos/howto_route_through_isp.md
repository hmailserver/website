---
title: "Route route all email through your ISP"
slug: howto_route_through_isp
parent: howtos
index: 0
is_book: false
---

## Background

Many ISPs (companies providing users a connection to the Internet) block outgoing traffic on port 25.
This makes it impossible for hMailServer to connect directly to other SMTP servers on the Internet. 
A workaround for this is to route all your outgoing email through your ISP's mail server.

## Steps

1. Start up hMailAdmin.
2. Go to the Settings
3. Click on the SMTP settings
4. Select the *delivery of e-mail* tab.
5. Specify the following settings:  

 SMTP relay server - Your ISP's email server hostname or, preferably, IP address.  

 TCP Port - The TCP/IP port your ISP's server is listening on, usually 25.
6. If your ISP's server requires authentication, select the *Server requires authentication*
 and enter username and password.

The above instructions are valid for 3.4 and later.

![](images/howto_route_through_isp.gif)
