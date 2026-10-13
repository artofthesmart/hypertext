# Migrating to Hypertext 2

Hypertext 2 intentionally removes legacy aliases and parent-page setting inheritance. Move existing settings to the new global or local keys before switching themes.

## Global key changes

| Previous key | Hypertext 2 key |
|---|---|
| `structure.navigation.header.mode` | `navigation.mode` |
| `structure.text-style` | `navigation.decoration` |
| `structure.navigation.pagination.style` | `navigation.pagination` |
| `structure.navigation.header.custom-items` | `navigation.custom-items` |
| `structure.header.subheader` | `header.custom-html` |
| `structure.header.use-subheader` | `header.show-description` |
| `structure.footer.style` | `footer.format` |
| `structure.footer.content` | `footer.content` |
| `style.layout.alignment` | `layout.alignment` |
| `style.layout.content-width` | `layout.width` |
| `style.css.stylesheet` | `style.preset` |
| `style.css.custom-value` | `style.custom-css` |
| `style.visually-impaired` | `style.accessible-font` |
| `style.css.enable` | `assets.css` |
| `style.js.enable` | `assets.js` |
| `page.content.*` | `content.*` |
| `collection.mode` | `collection.layout` |
| `collection.show-nested` | `collection.nested` |
| `collection.display.header-image` | `collection.display.image` |
| `collection.display.click-through` | `collection.display.read-more` |

Published/modified date toggles are replaced by one `date` value: `none`, `published`, `modified`, or `both`.

## Page frontmatter changes

Move theme-specific page settings under `hypertext`:

```yaml
---
hypertext:
  content:
    title: 1
    image: 1
    date: published
  assets:
    css: 0
    js: 0
---
```

Collection display settings use:

```yaml
---
hypertext:
  collection:
    layout: list
    nested: 0
    display:
      title: 1
      image: 0
      date: published
      summary: 0
      read-more: 0
---
```

## Removed behavior

- HTML 3.2 rendering
- Numeric `?theme=` indexes
- Inline copies of every bundled stylesheet
- Response-wide HTML minification
- Response-wide image reparsing/compression
- Parent-page inheritance for theme settings
- Legacy TTF and WOFF font files
- Built-in non-core plugin adapters

The previous setting names are not translated at runtime. This keeps the render path deterministic and small.
