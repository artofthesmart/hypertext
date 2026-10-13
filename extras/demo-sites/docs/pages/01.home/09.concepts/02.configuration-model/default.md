---
title: Configuration Model
subtitle: Defaults first, overrides second, surprises last
taxonomy:
  category: [concept]
  tag: [configuration, model]
---

The configuration model starts with a site-wide default and then applies page-level overrides when a page has a special case.
It is easier to maintain when the defaults are stable and the exceptions are explicit.

===

<details>
<summary>One useful pattern</summary>

Keep the documented default in the site configuration, then override the page only when the content truly differs.

</details>
