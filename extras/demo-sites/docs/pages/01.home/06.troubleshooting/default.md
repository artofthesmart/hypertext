---
title: Troubleshooting
subtitle: The things that usually go wrong first
taxonomy:
  category:
  - help
  - reference
  tag:
  - errors
  - reference
  - workflow
  - validation
  - setup
---

Most build failures come from path mistakes, missing frontmatter, or an output directory that still contains stale files.
The quickest fix is usually to remove the guesswork and check the exact file names.

===

| Symptom | Likely cause | Fix |
|---|---|---|
| Missing page | Folder name does not match the route | Rename the folder or update links |
| Blank build | Frontmatter is not closed | Re-open the file and check the dashes |
| Wrong layout | Page-level override is stale | Clear the cache and rebuild |

<details>
<summary>When the preview looks old</summary>

Clear the generated output, restart the preview server, and confirm the browser cache is not serving an older copy.

</details>
