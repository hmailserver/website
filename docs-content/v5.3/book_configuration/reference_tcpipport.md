---
title: "TCP/IP port"
slug: reference_tcpipport
parent: book_configuration
index: 0
is_book: false
---

## TCP/IP port

### Protocol

Choose which protocol should be used for this specific port. When a client connects to the port, hMailServer will use this protocol to parse the incoming commands from the client.

### TCP/IP address

Specify the TCP/IP address hMailServer should listen on. The default value, 0.0.0.0, means that hMailServer will listen on all available IP addresses.

### TCP/IP port

The port number hMailServer should listen on, on the specified IP address.

### Use SSL

Select this if you want the transmission between the client and hMailServer to be encrypted. If SSL is enabled, all communication with hMailServer made on this port needs to be done using SSL. hMailServer does not support STARTTLS.

### SSL certificate

If you have choosen to use SSL, you must select which SSL certificate you want to use for this specific port.

 
