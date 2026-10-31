---
title: "External accounts"
slug: feature_external_account
parent: book_userguide
index: 0
is_book: false
---

# External accounts

Using the external account functionality, you can configure hMailServer to download email from other e-mail servers, using the POP3 protocol. After the messages have been downloaded, global rules, virus scanning and etc are applied on the messages. After that, they are delivered to one or several local accounts.

## Scenario 1:

### Background

You have a hMailServer installation where you host email for your domain. You want to download email from another email server and put it in one of the local accounts.

### Steps

1. Open the account settings for the account you want to download email to
2. Select the *External accounts* tab
3. Click *Add* to add a new account.
4. Enter a name for the external account.
5. Enter the login information.
6. De-select "Deliver to recipients in MIME-headers" (if it is selected)
7. Specify how often you want hMailServer to download messages, and how long they should be stoerd on the remote POP3 server.
8. Save the account

After you have performed the steps above, hMailServer will download the messages and put them in the account in which you created the external account.

## Scenario 2:

### Background

Your domain is hosted by your ISP. They have created a "catch all" email account for you. Whenever anyone sends you an email to a recipient on the domain, it ends up in the catch-all account.

### Steps

1. Create the domain in hMailServer  
The domain name should be your public domain name.
2. Create accounts for your users.
3. Open the settings for your own account
4. Select the *External accounts* tab
5. Click *Add* to add a new account.
6. Enter a name for the external account.
7. Enter the login information.
8. Select "Deliver to recipients in MIME-headers"
9. Specify how often you want hMailServer to download messages, and how long they should be stored on the remote POP3 server.
10. Save the account

After you have performed the steps above, hMailServer will download the messages and deliver them to the recipients in the MIME headers of the email message. If hMailServer cannot determine who the message should be delivered to (if no local recipients exists in the MIME headers), it will be delivered to your account (the account in which you added the external account)

- [Reference guide](?page=reference_external_account)
