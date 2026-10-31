---
title: "Blocked ports"
slug: ts_blocked_ports
parent: troubleshooting
index: 0
is_book: false
---

If you can't receive e-mail from other servers, and you are sure that your MX records are defined correctly, try the following: 

From outside your network, telnet your computer on port 25.

If this fails, then there is some software or hardware blocking connection to your port 25. Windows XP SP2's firewall is turned on by default, and so can block connections. Earlier versions of XP also have a built-in firewall, but it's turned off by default. If you are sure that you have not blocked port 25, but your friend still can't connect to your computer, you should ask your ISP whether they have blocked port 25. Some ISPs block server ports (such as e-mail, FTP and HTTP) because they don't want their users to set up servers. 

If your ISP has blocked port 25, the easiest way is probably to switch to an ISP who doesn't. There are also some companies offering email routing services to get around this problem.
