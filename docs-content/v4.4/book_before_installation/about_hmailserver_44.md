---
title: "About hMailServer 4.4"
slug: about_hmailserver_44
parent: book_before_installation
index: 31
is_book: false
---

## News in hMailServer 4.4

### Anti spam functionality

- Whitelisting - It's now possible to white list senders using email and IP addresses. As an example, you can configure hMailServer to skip spam protection when the email is sent from the domain example.com.
- Forwarding relays - Using a new setting in IP ranges, you can now configure hMailServer to treat secondary MX servers as forwarding relays. When this is done, hMailServer will determine the senders IP address by parsing the MIME headers of the messages, which improves spam protection.

### Hosting functionality

For every domain in hMailServer, you can now specify a maximum size, maximum message size, maximum size of individual accounts and the maximum number of accounts, aliases and distribution lists. This may for example be useful in hosting environments where you want to prevent domain owners from creating too many of accounts.

### Miscellaneous new functionality

- Rules and rule actions can now be re-ordered. This gives you the possibility to define their execution order.
- A new account setting makes it possible to automatically expire out-of-office messages.
- Caching of aliases and distribution lists can now be enabled to improve server performance.
- It's now possible to manually trigger a download of messages from an external account.
- In the account settings, you can now see a time stamp for the users last log on.
- The installation now includes a script which allows you to remove accounts where the user has not logged on in a specified number of days.
- A new setting in the external accounts dialog allows you to configure hMailServer to retrieve the Received-date from MIME headers instead of using the current date.
- When messages are downloaded from external POP3 accounts, hMailServer now adds a new header so that these messages can be sorted into different IMAP folders depending on where they are downloaded from.

### New API methods

<ul>
        <li>New functionality in the hMailServer API makes it easier to migrate from other servers.</li>
        <li>It's now possible to add and remove IMAP folders using the hMailServer API</li>
        <li>Using the InternalDate property of the hMailServer.Message object, you can now see when a specific message was created in hMailServer.</li>
        <li><span class="postbody">A new event, OnDeliveryStart, has been added which is executed immediately when a delivery is started.</span></li>
        <li><span class="postbody">It's possible to iterate over the message headers using the MessageHeaders collection.</span></li>
    </ul>

## Known issues

The following issues are known to exist in hMailServer 4.4. They have existed in previous 4.x-releases as well.

- hMailServer currently does not have full unicode support. While it's possible to send email containing characters with Unicode encoding, it's not possible to specify non-ANSII characters in any of the settings. This means that you cannot specify for example Greek characters in the auto-reply settings. This issue will be resolved in the next version.
- When adding a signature to an email message, the signature is appended to the email body as clear text regarding of body encoding. This means that the signature will not be encoded properly if the original email body is encoded, for example using base64. The reason for this is the lack of Unicode support mentioned above.
- If you have set up an account-level rule, which executes a script, any changes made to the message object will be seen by other recipients as well. This occurs because the rule is executed before the message file has been moved to the users directory.
- hMailServer should limit the number of concurrent connections towards external accounts to 30. This limitation does not work and the limit is instead 100. This may have negative effect on performance if a large number of external accounts are set-up.
- When restoring a backup, any whitelisting records will loose its description. (They will continue to work though)
- The Chinese translation is incomplete. You can download a complete using [the translation page](/devnet/translation_getlanguage.php?language=chinese).
