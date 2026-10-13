---
title: First Build
subtitle: Run the smallest possible publication pass
taxonomy:
  category:
  - start
  - reference
  tag:
  - build
  - validation
  - workflow
  - setup
  - install
---

The first build should prove three things: the input folder is readable, the templates resolve, and the output folder is writable.
That makes it a validation step as much as a publishing step.

===

```sh
lantern build ./notes --output ./public --clean
```

| Check | Expected result |
|---|---|
| Input path | All content pages are discovered |
| Templates | No missing partials or macros |
| Output | HTML files appear in the publish directory |

If the command exits cleanly, open the homepage and one nested page before you do anything more ambitious.
