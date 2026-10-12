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
- native lazy loading for collection images;
- eager loading for the primary page header image;
- asynchronous decoding.

Markdown and plugin-generated images are left to Grav and the originating plugin.

## Production performance

Enable Grav page caching and configure Brotli or gzip in the web server. Hypertext intentionally does not regex-minify completed HTML because transport compression handles whitespace efficiently without adding response-wide PHP processing.

Use the included release builder to verify package boundaries:

```bash
./scripts/build-release.sh
```

## Migration

Hypertext 2 is a clean break from the previous configuration model. See [MIGRATION.md](MIGRATION.md) before upgrading an existing site.

## Development

The separate demo package exercises all five collection layouts. Runtime, style-pack, and demo archives are built by `.github/workflows/release-packages.yml`.

Hypertext is licensed under the MIT License.
