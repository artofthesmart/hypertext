# Hypertext demo sites

Each directory is a small Grav `user/` overlay with `config/` and `pages/`.
Together they exercise the five collection layouts without requiring JavaScript,
and now each focused demo has a real nested sub-collection plus substantially
more prose, metadata, and Markdown coverage.

| Site | Layout | Subcollection | Breadth |
|---|---|---|---|
| `journal` | list | `field-notes` | 13 pages with recursive nested entries, dates, and footnotes |
| `catalog` | grid | `buying-guide` | 15 pages with six image-backed products, text-only products, and guides |
| `resume` | comfy | `case-studies` | 13 pages covering roles, skills, talks, writing, and project deep dives |
| `docs` | table | `concepts` | 14 pages with layered reference material, code samples, and troubleshooting |
| `restaurant` | cards | `events` | 14 pages with menu pages, service notes, and seasonal event programs |

Copy one site's `config/` and `pages/` directories into a clean Grav `user/`
directory, then install the Hypertext runtime package. The release builder also
creates one ZIP per site.
