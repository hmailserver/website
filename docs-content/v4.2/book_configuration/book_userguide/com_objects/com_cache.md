---
title: "Cache object"
slug: com_cache
parent: com_objects
index: 0
is_book: false
---

The cache object contains settings that relates to the hMailServer caching functionality.

# Version

The below documentation is valid for hMailServer 4.2 and later.

# Properties

#### Property AccountCacheTTL As Long

<div class="indented">The number of seconds hMailServer should keep accounts in the cache</div>

#### Property AccountHitRate As Long

<div class="indented">The account hit rate</div>

#### Property DomainCacheTTL As Long

<div class="indented">The number of seconds hMailServer should keep domains in the cache</div>

#### Property DomainHitRate As Long

<div class="indented">The domain hit rate</div>

#### Property Enabled As Boolean

<div class="indented">Cache is enabled.</div>

# Methods

#### Sub Clear()

<div class="indented">Clears the cache</div>

# Sample code

## Enabling the cache

`Dim obBaseApp
   Set obBaseApp = CreateObject("hMailServer.Application")
   
   Dim obCache
   Set obCache = obBaseApp.Settings.Cache
   
   obCache.Enabled = True`
