# Hypertext

Hypertext is a semantic HTML5 theme for Grav CMS 2 that prioritizes the smallest practical runtime:

- no JavaScript by default;
- no stylesheet by default;
- one tiny inline layout-safety block;
- cacheable optional stylesheets;
- native Grav media transforms;
- simple, accessible markup.

## Requirements

- Grav CMS 2.0 or newer
- PHP supported by the installed Grav release

## Installation

Install the runtime package into `user/themes/hypertext`, then set:

```yaml
# user/config/system.yaml
pages:
  theme: hypertext
```

Clear Grav's cache:

```bash
bin/grav clearcache
```

The repository release workflow produces three separate packages:

- `hypertext-VERSION.zip` — production runtime theme;
- `hypertext-styles-VERSION.zip` — optional extended stylesheet library;
- `hypertext-demo-VERSION.zip` — demonstration pages and media.

It also produces five focused demo-site overlays:

- `hypertext-demo-journal-VERSION.zip`;
- `hypertext-demo-catalog-VERSION.zip`;
- `hypertext-demo-resume-VERSION.zip`;
- `hypertext-demo-docs-VERSION.zip`;
- `hypertext-demo-restaurant-VERSION.zip`.

## Core features

- Browser-default styling or four small bundled presets
- Five collection layouts: list, comfy, table, grid, and cards
- Per-page and per-collection display overrides
- Optional Atkinson Hyperlegible typeface
- Headless content rendering with `?headless=1`
- Plugin CSS and JavaScript disabled unless explicitly enabled
- Semantic support for Pagination, Breadcrumbs, SimpleSearch, Login, and Feed
- No response-wide HTML or image post-processing

## Styles

The core presets are:

- `default` — browser defaults;
- `hypertext++`;
- `water-light`;
- `water-dark`;
- `sakura`.

Preview an installed style by name:

```text
https://example.com/?theme=water-dark
```

Unknown style names are ignored. Numeric style indexes are not supported.

To install the optional style pack, copy its `styles.yaml` and `css/` directory to:

```text
user/data/hypertext/styles/
```

Hypertext discovers the manifest automatically and adds its entries to the Admin style selector.

## Configuration

Global settings live in:

```text
user/config/themes/hypertext.yaml
```

The primary configuration shape is:

```yaml
navigation:
  mode: inline
  decoration: braced

layout:
  alignment: left
  width: 960

style:
  preset: default
  custom-css: ''
  accessible-font: false

assets:
  css: false
  js: false

content:
  title: true
  subtitle: false
  image: false
  date: published
  categories: true
  tags: true
  headless: false

collection:
  layout: list
  nested: false
  display:
    title: true
    subtitle: false
    image: false
    date: published
    categories: true
    tags: true
    summary: false
    read-more: false
```

Page overrides use the same keys under `header.hypertext`:

```yaml
---
title: Example
hypertext:
  assets:
    css: 1
  content:
    image: 1
    date: modified
---
```

Collection overrides are equally direct:

```yaml
---
title: Articles
content:
  items: '@self.children'
hypertext:
  collection:
    layout: cards
    display:
      image: 1
      summary: 1
      read-more: 1
---
```

Configuration precedence is deliberately limited to:

1. global theme defaults;
2. explicit page or collection overrides.

Parent-page inheritance and legacy setting aliases are not part of Hypertext 2.

## Images

Set `header_image_file` or `thumbnail_image_file` to choose a page image. Otherwise Hypertext checks conventional `header.*` or `thumbnail.*` names and then the first page image.

Theme-owned images are rendered through Grav media with:

- one resize/crop operation;
- explicit width and height;
- native responsive candidates when Grav media alternatives are present;
- native lazy loading for collection images;
- eager loading for the primary page header image;
- asynchronous decoding.

Use `header_image_alt` or `thumbnail_image_alt` for an explicit text alternative. A Grav media sidecar such as `photo.jpg.meta.yaml` can also provide:

```yaml
alt: Descriptive alternative text
title: Optional advisory title
caption: Optional visible caption
focus_x: center
focus_y: top
```

`focus_x` accepts `left`, `center`, `right`, or an original-image x coordinate. `focus_y` accepts `top`, `center`, `bottom`, or an original-image y coordinate.

Markdown and plugin-generated images are left to Grav and the originating plugin.

## Production performance

Enable Grav page caching and configure Brotli or gzip in the web server. Hypertext intentionally does not regex-minify completed HTML because transport compression handles whitespace efficiently without adding response-wide PHP processing.

Use the included release builder to verify package boundaries:

```bash
./scripts/build-release.sh
```

Run the complete package contract and Grav integration checks with:

```bash
./scripts/check-release.sh
GRAV_VERSION=2.2.6 ./scripts/integration-test.sh
```

## Migration

Hypertext 2 is a clean break from the previous configuration model. See [MIGRATION.md](MIGRATION.md) before upgrading an existing site.

## Development

The general demo package and five focused site packages exercise every collection layout across 69 content pages. Each focused demo includes a nested subcollection and substantial Markdown plus semantic HTML examples. Site-wide presentation stays in `config/themes/hypertext.yaml`; page frontmatter contains only page-specific overrides. Runtime, style-pack, and demo archives are built by `.github/workflows/release-packages.yml`. CI validates every demo route on Grav 2.0.27, 2.1.12, and 2.2.6 using PHP 8.3, the minimum declared by the current Grav 2 release packages.

Hypertext is licensed under the MIT License.
