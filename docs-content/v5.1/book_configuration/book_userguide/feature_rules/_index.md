---
title: "Rules"
slug: feature_rules
parent: book_userguide
index: 0
is_book: false
---

## Overview

Rules enable you to define actions to take based on the contents of an email. For example, you can use rules to delete mail based on a specific subject-line, or to forward email larger than a specific size.

Rules can be defined at two different levels: Global and Account. Global rules are applied to all messages delivered to the server, regardless of which recipient they are to be delivered to. Account rules apply only to email to a specific account.   

  

Every rule has a set of criteria and actions. When you create a rule, you add criteria that specify which email the rule should be applied to. For example, you may add a criterion that limits the rule to email containing a specific Message-ID-header. After you have added criteria, you add actions. Actions define what hMailServer should do if a message matches the criteria. For example, the action may be to forward the email, delete it or move it to a specific folder.

Rules are applied during the email delivery phase. This means that if you do content modification of an email message in a rule, or move the message to specific IMAP folders, this will only effect how the recipient of the email message see it. For example, if you have set up a global rule to move messages to the IMAP folder Spam, and User 1 sends a message to User 2, only User 2 will see the email message in his Spam mailbox. User 1 will not see the message in his Spam mailbox, since he's not the recipient of the message. The reason for this is that if User 1 sends an email message to User 2, the message should be delivered to User 2 - not to User 1.

### Match testing

In the rule criteria dialog, you can test whether specific values will match the criteria. To run a test, simply enter the value you want to test into the Test value field. If the value matches the criteria, you will see the next "Match" next to the text box. If not, you will see the text "No match". This makes it easier to create more advanced criterias, for example using regular expressions.

## Examples

Here are [some examples](?page=feature_rules_examples) on how to implement rules.

## Different search types

hMailServer supports a number of different search types. They are: Is, Contains, Less than, Larger than and Regular Expression.

- *Is*: Used to specify an exact match.
- *Contains*: Used to specify a partial match. For example, you might want to apply the rule to email where the Body *Contains* a certain word.
- *Less than*: Used for numeric matches. For example, you may want to apply the rule to email where the message size is less than 1 MB.
- *Larger than*: Used for numeric matches. Opposite of Less than
- *Regular expression*: Using regular expression matching, you can specify more complex matchings. For example, you may apply the rule to all messages where the subject line begins with a letter and the rest of it is numeric. For more information about regular expressions, visit [http://www.regular-expressions.info/](http://www.regular-expressions.info/). The used regular expression should match the entire value it's being matched against. It is not possible to use partial matching. hMailServer rely on [Boost](http://www.boost.org)/Regex to do regular expression parsing and use the Perl syntax. More information about available options can be found on the [Boost site](http://www.boost.org/doc/libs/1_38_0/libs/regex/doc/html/boost_regex/syntax/perl_syntax.html).

## Actions

- Delete email - Select this rule to delete the email message. The message will be deleted after rule processing has finished.
- Forward email - Select this if you want to forward email to another recipient. It's possible to specify both local and external recipients.
- Reply - This option can be used if you want to automatically reply to messages.
- Run function - Use this option if you want to run a hMailServer script whenever a message matches the rule.
- Set header value - Using the "Set header value" option, you can add MIME-headers to email message.
- Moving to IMAP folder - It is possible, when moving messages to folder using a rule, to move messages to folders as well as to sub folders. Use this syntax: *Folder.Subfolder1.Subfolder2*.
- Stop rule processing - Select this option if you want to cancel the remaining rule processing. Any action or rule specified after this will not be executed.

## Details

If you want to know details on how rule processing work, please see the [details document](?page=feature_rules_details).

## Troubleshooting

If you are experiencing a problem with rules, please red the [troubleshooting tips](?page=feature_rules_troubleshooting).
