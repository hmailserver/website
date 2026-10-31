---
title: "Scripting object"
slug: com_scripting
parent: com_objects
index: 0
is_book: false
---

The scripting object contains properties that relates to hMailServer scripting.

# Version

The below documentation is valid for hMailServer 4.x and later.

# Properties

#### Property Directory As String

<div class="indented">Path to the events directory</div>

#### Property Enabled As Boolean

<div class="indented">Enable script server</div>

#### Property Language As String

<div class="indented">The scripting language</div>

# Methods

#### Sub Reload()

<div class="indented">Reloads the script from the event directory.</div>

#### Function CheckSyntax() As String

<div class="indented">Compiles the script in the event directory and returns the result.</div>
