---
title: "OnError"
slug: feature_scripting_onerror
parent: feature_scripting
index: 0
is_book: false
---

## Overview

This event is executed directly when the delivery of a message has started. The event is executed before any global rules are executed

## Signature

OnError(iSeverity, iCode, sSource, sDescription)

## Parameters

- iSeverity - Error severity. 1 - Critical, 2 - High, 3 - Medium, 4 - Low
- iCode - The hMailServer error code.
- sSource - The component which reported the error.
- sDescription - A description of the reported error.

## Result values

- None
