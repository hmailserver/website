---
title: "Connect using client"
slug: ts_connect_using_client
parent: troubleshooting
index: 0
is_book: false
---

The most common connection error occurs when users does not enter their full email address as their user name in their email client. 

If you are sure you have entered your full user name and the correct password, you should do the following

## while sitting at the server computer

Check that you can ping the computer on which hMailServer runs. 
Check that the mail server has really started, by telnetting the server on port 25 and 110. 
In hMailAdmin, locate the IP ranges settings and make sure that you have not defined any IP ranges that make it impossible to send email. 
You can specify the maximum number of simultaneous connections in hMailAdmin. The default value is 0 (unlimited). Make sure that you have set it to 0 or to a high value. 

If these tips don't help, do the following:

1. Stop the server.
2. Turn on Application, Debug, SMTP, POP3 and IMAP logging.
3. Remove any old logs from the log directory (C:\Program Files\hMailServer\Logs)
4. Start the server
5. Try to connect with your email client.
6. Create a new topic in the hMailServer forum and post your log there. Before you do, check the log to make sure that your password isn't in it.

## while sitting at another computer

Make sure that firewalls aren't blocking ports. For example, many ISPs block port 25 to any outgoing traffic, and so might block connection to your server.
