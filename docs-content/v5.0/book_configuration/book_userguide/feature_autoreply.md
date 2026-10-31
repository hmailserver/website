---
title: "Auto-reply"
slug: feature_autoreply
parent: book_userguide
index: 0
is_book: false
---

## Overview

An Auto-reply is also known as a Vacation message or an Out-of-office Notification. An auto-reply is sent automatically when you go on vacation or are away from the office for some time. Before you leave, you enter a subject and a message. When someone sends you an email, hMailServer will automatically send your auto-reply message to the sender.

## Specifying an auto-reply message

1. Open up an account in hMailAdmin
2. Select the auto-reply tab
3. Select *Enable*
4. Enter a subject and a message
5. Click on *Save*

## Notes

- If you leave the subject field empty, the server will automatically set the subject to `Re: [subject-line of sender's original email]`
- To prevent message looping, auto-reply messages are not sent to accounts which have auto-reply enabled. Also, hMailServer only sends one auto-reply per sender.
- We recommend that you unsubscribe from any distribution lists before you turn vacation messages on.
- The macro %SUBJECT% can be used in the Subject and Body of the auto-reply message. The text %SUBJECT% will be replaced with the subject of the original e-mail message.
