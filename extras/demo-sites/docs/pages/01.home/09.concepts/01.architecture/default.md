---
title: Architecture
subtitle: Content, templates, and the narrow rendering path
taxonomy:
  category:
  - concept
  - reference
  tag:
  - architecture
  - workflow
  - reference
  - config
  - validation
---

Lantern keeps the rendering path short: discover pages, resolve configuration, and emit HTML with as little ceremony as possible.
That restraint is what keeps the preview quick and the final output easy to reason about.

===

```text
content tree -> page metadata -> template -> html
```

The architecture favors predictable defaults over clever inheritance. That makes it easier to debug a site with many nested pages.
