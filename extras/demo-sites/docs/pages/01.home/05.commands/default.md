---
title: Commands
subtitle: The small set of commands readers actually need
taxonomy:
  category:
  - reference
  - concept
  tag:
  - cli
  - build
  - reference
  - workflow
  - terms
---

The command list is intentionally short so the docs can stay memorable.
Every command either builds, serves, or inspects the content tree.

===

```sh
lantern build ./notes --output ./public
lantern serve ./public --port 8080
lantern validate ./notes
```

| Command | Purpose |
|---|---|
| build | Generate static HTML |
| serve | Preview the published output locally |
| validate | Check frontmatter and file structure |

<kbd>Ctrl</kbd> + <kbd>C</kbd> stops the preview server when you are finished.
