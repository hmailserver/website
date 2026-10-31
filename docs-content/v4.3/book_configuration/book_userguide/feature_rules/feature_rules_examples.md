---
title: "Rule examples"
slug: feature_rules_examples
parent: feature_rules
index: 0
is_book: false
---

## Example 1, Delete email

Automatically delete all email messages whose subject-line contains the word *SPAM*

1. Start hMailAdmin, and select *Rules* in the tree to the left, under *Domains*
2. Click on *Add*. Enter the name `MyRule`
3. Under *Criteria*, click on *Add*.
4. Under *Pre-defined field*, select *Subject*
5. Under *Search type*, select *Contains*.
6. In the *Value* textbox, enter the word `SPAM`
7. Click on *Save* to add the criteria to the rule.
8. Under *Actions*, click on Add.
9. Select *Delete email* from the drop-down list
10. Click on *Save* to save the Action
11. Click again on *Save* to save the rule

## Example 2, forward messages

Forward all messages addressed to an external email address. The original message will still be delivered normally. Don't set up a rule that forwards email to yourself, since that would cause an endless loop.

1. Start hMailAdmin and navigate to the account settings.
2. Select the *Rules* tab.
3. Click on *Add*. Enter the name `ForwardRule`
4. Under *Criteria*, click on *Add*.
5. Under *Pre-defined field*, select *Message size*
6. Under *Search type*, select *Greater than*.
7. In the *Value* textbox, enter the value `0`. This will cause all messages larger than 0 bytes to be affected by the rule.
8. Click on *Save* to add the criteria to the rule.
9. Under *Actions*, click on Add.
10. Select *Forward email* from the drop down. Enter the external address to forward to.
11. Click on *Save* to save the Action
12. Click again on *Save* to save the entire rule

## Example 3, move messages to IMAP folder

Move all messages from a specific sender to a specific IMAP folder

1. Start hMailAdmin and navigate to the account settings.
2. Select the *Rules* tab.
3. Click on *Add*. Enter the name `MoveRule`
4. Under *Criteria*, click on *Add*.
5. Under *Pre-defined field*, select *From*
6. Under *Search type*, select *Contains*.
7. In the *Value* textbox, enter the value `someone@somedomain.com`. This will cause all messages that contain someone@somedomain.com in the From header field to be affected by the rule.
8. Click on *Save* to add the criteria to the rule.
9. Under *Actions*, click on Add.
10. Select *Move to IMAP folder* from the drop down. Enter the name of the IMAP folder to move it to.
11. Click on *Save* to save the Action
12. Click again on *Save* to save the entire rule
