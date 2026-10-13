# Hypertext demo sites

Each directory is a small Grav `user/` overlay with `config/` and `pages/`.
Together they exercise the five collection layouts without requiring JavaScript,
and now each focused demo has a real nested sub-collection plus substantially
more prose, metadata, and Markdown coverage.

Every demo also configures a realistic primary menu, overlapping many-to-many
taxonomies, deliberately dense category/tag combinations, and responsive local
media. Unsplash source URLs are retained in each image metadata sidecar.

| Site | Layout | Subcollection | Breadth |
|---|---|---|---|
| `journal` | list | `field-notes` | 13 pages with recursive entries, dense metadata, and four responsive image sets |
| `catalog` | grid | `buying-guide` | 15 pages with nine image-backed products/guides and overlapping product taxonomies |
| `resume` | comfy | `case-studies` | 13 pages covering roles, skills, talks, writing, taxonomy, and project media |
| `docs` | table | `concepts` | 14 pages with reference material, code samples, taxonomy, and documentation media |
| `restaurant` | cards | `events` | 14 pages with menu/service content, event taxonomies, and four responsive image sets |

Copy one site's `config/` and `pages/` directories into a clean Grav `user/`
directory, then install the Hypertext runtime package. The release builder also
creates one ZIP per site.
