---
title: "Live status"
slug: feature_live
parent: book_userguide
index: 0
is_book: false
---

## Overview

Live status shows you the current status of hMailServer. For example, it shows you what the server is doing right now, the number of delivered emails since restart and so on. To see the live status, open hMailAdmin and click on *Status* in the left menu.

## Status

**Server up since**  

Shows the time the hMailServer service started.

**Processed messages**  

Shows the number of processed messages since hMailServer started or restarted. The value is reset when you restart the server.

**Messages containing virus**  

The number of messages in which hMailServer has detected viruses. The value is reset when you restart the server.

**Messages containing spam**  

The number of messages rejected as spam since hMailServer last started or restart. The value is reset when you restart the server.

**Logging**  

If you have logging turned on, the *Logging* tab will show the log directly on the screen. It is not recommended to use live-logging when debug-logging is enabled. This is because the debug logging option will produce a large amount of log information. In versions of hMailServer prior to version 4.1, the live log does not work with terminal services. Also, in those versions the server needs to have access to desktop interaction for the live log to work.

**Undelivered messages**  

The undelivered messages list shows a list of messages that hMailServer has not yet delivered. Both incoming and outgoing messages are shown. To troubleshoot delivery failures, turn on the application and SMTP log, and examine the contents of the log files. From hMailServer version 3.0 to version 4.1, the *To* column in the list is empty.
