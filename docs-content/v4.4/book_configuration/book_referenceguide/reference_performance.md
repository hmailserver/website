---
title: "Performance"
slug: reference_performance
parent: book_referenceguide
index: 0
is_book: false
---

## Cache

Use these settings to configure the hMailServer cache. hMailServer can cache objects located in the database. If an object is cached, hMailServer does not have to contact the database to access it. Enabling the cache may dramatically increase the hMailSever performance. Please see [the user guide](?page=feature_cache) for information regarding these settings.

## Threading

### Max number of command threads

When an SMTP, POP3 or IMAP client sends a command to hMailServer, this is handled by something called a [command thread](?page=internals_commandhandlers). The command threads typically handles simple commands, suh as "log in", "retrieve message" and "add recipient to message". This number specifies how many simultanoeus commands can be run by clients. If you increase this value, more commands can run at the same time, but all of them will run slower. If you decrease this value, less commands can run at the same time, but they will be executed faster.

### Delivery threads

hMailServer can deliver several email messages at the same time. Thissetting lets you define how many messages hMailServer should deliversimultaneously. A higher value will require more CPU usage. A lowervalue may result in slower deliveries. The best setting depends on yourhardware and on the volume of messages you wish your server to deliver.For small installations, 3 simultaneous deliveries should be enough.For larger installations, you may want to raise this value to 15 or 20.

### Worker thread priority

hMailServer is a multi-threaded application. This means that inside the hMailServer service, several different things are done at the exact same time. For example, email is being received, delivered and clients are downloading email at the same moment. These different tasks are performed by something called worker threads. You can change the priority of worker threads, to change the amount of time the operating system should spend on these threads. If you lower this value, hMailServer will run slower and more CPU resources will be available to other tasks in the operating system. If you increase the priority, hMailServer will run faster but other software on your computer may run slower.
