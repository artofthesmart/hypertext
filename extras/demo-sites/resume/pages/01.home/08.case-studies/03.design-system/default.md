---
title: Design System
subtitle: Building a component language that teams could actually maintain
---

The system started with the patterns that appeared most often in production and then reduced the rest to a set of predictable tokens.
That kept the library small enough to learn and broad enough to matter.

===

<dl>
<dt>Core rule</dt><dd>If a component cannot be explained in one sentence, it is probably two components.</dd>
<dt>Governance</dt><dd>Every addition needed a documented use case and a maintenance owner.</dd>
</dl>

The result was less library churn and fewer one-off exceptions in design reviews.
