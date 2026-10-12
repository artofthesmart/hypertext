# Hypertext demo sites

Each directory is a small Grav `user/` overlay with `config/` and `pages/`.
Together they exercise the five collection layouts without requiring JavaScript.
Site-wide style and layout choices live in `config/themes/hypertext.yaml` so
home pages and their child pages resolve the same global theme settings.

Copy one site's `config/` and `pages/` directories into a clean Grav `user/`
directory, then install the Hypertext runtime package. The release builder also
creates one ZIP per site.

| Site | Layout | Purpose |
|---|---|---|
| `journal` | list | Personal publishing and article metadata |
| `catalog` | grid | Compact product browsing with responsive media |
| `resume` | comfy | Professional history and project summaries |
| `docs` | table | Documentation and reference navigation |
| `restaurant` | cards | Small-business menu and service presentation |
