---
title: "News in hMailServer 4.3"
slug: whats_new_43
parent: book_before_installation
index: 30
is_book: false
---

## News in hMailServer 4.3

### Improved spam protection

- It's now possible to prevent spam from reaching your Inbox by using SURBL and grey listing.
- In previous versions of hMailServer, messages which were considered to be spam were deleted. In hMailServer 4.3, you can choose to do header modification instead. For example, you can configure hMailServer to add [SPAM] to the subject of messages it considers to be spam.
- Spammers who tries to figure out valid email addresses on your server by trying a lot of different addresses can now automatically be disconnected
- E-mail which is clearly violating the email format specifications can be rejected
- hMailServer can now check validate the client host name (HELO command)

### Improved virus protection

- You can configure hMailServer to remove attachments in email depending on file extensions.
- It's possible to skip virus scanning of messages larger than a specified size

### IMAP IDLE support

hMailServer now supports the IMAP IDLE extension. When using an email client that supports this, your email client will be automatically notified when there is new email for you. You no longer need to manually check for new email.

### Improved performance and stability

- hMailServer 4.3 is built on a new threading model for improved performance. In earlier versions, one thread was created per connected client. In hMailServer 4.3 threads are shared between the clients, which gives better performance in large installations.
- The built-in MySQL server has been reconfigured to use less memory
- It's possible to specify thread priority for hMailServer threads
- Work has been spent on wrapping low-level code to achieve even higher stability in the long term.

### Improved delivering of email

- You can now specify a local IP address hMailServer should use when delivering email to other servers.
- It's possible to limit the number of recipients per delivery.

### Improved hosting capabilities

- Server administrators can now specify max sizes for domains.
- In previous versions, account owners had no way of setting up email forwarding since rules cannot be accessed using PHPWebAdmin. In hMailServer 4.3, all you need to do is to enter the email address you want email to be forwarded to.
- It's now possible to specify custom error messages in your own language.

### Miscellaneous new features

- When creating a distribution list, you can choose between public, membership-based and announcements. When choosing public, anyone will be able to send to it. When choosing membership-based, only members of the list will be able to send to it, and when choosing announcements, only the list owner will be able to send messages to the list.
- hMailServer can now be configured to listen at multiple TCP/IP ports for the same protocol. For example, you can configure hMailServer to listen for SMTP connections on port 25 and 255.
- Support for signatures and disclaimers have been added. User can now specify plain text / HTML signatures for their accounts and domain owners can specify that a text should be appended to outgoing email.
- Passwords in log files are now automatically masked.
- hMailServer 4.3 supports plus addressing. Plus addressing allows account owners to use on-the-fly aliases for their accounts without any configuration.
- When setting up an external POP3 account you wish to download email from, you can now tell hMailServer that downloaded email should be distributed to recipients in the message headers.
- A *default domain* can now be specified. This will be used if a user tries to log on without specifying his entire email address.
