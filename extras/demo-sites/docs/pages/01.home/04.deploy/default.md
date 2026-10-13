---
title: Deploy
subtitle: Copy the generated site where readers can reach it
taxonomy:
  category:
  - reference
  - concept
  tag:
  - deploy
  - release
  - workflow
  - validation
  - reference
---

Deployment is the final copy step: build the site, verify the links, and move the output to the server or bucket that serves it.
The workflow is simple enough to repeat and strict enough to catch mistakes.

===

> "Deploy only after the build passes and the homepage opens cleanly."
> <cite>Publishing note</cite>

1. Build the site with the intended configuration.
2. Inspect a representative page from each section.
3. Copy the static output to the target location.
4. Re-open the published URL and confirm the cache headers.

Lantern does not decide where you host it; it only makes the handoff predictable.
