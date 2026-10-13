---
title: Hypertext 2 Reference
---

Hypertext 2 is designed around browser defaults, semantic HTML, and explicit opt-ins.

===

## Runtime defaults

- No JavaScript
- No stylesheet
- Plugin assets disabled
- Native Grav page caching
- Native Grav media derivatives
- One small inline layout-safety block

## Styles

The core theme includes browser defaults, Hypertext++, Water Light, Water Dark, and Sakura. The extended style library is installed separately under `user/data/hypertext/styles`.

Preview any installed style by name:

```text
?theme=water-dark
```

## Page overrides

```yaml
hypertext:
  content:
    image: 1
    date: modified
  assets:
    css: 1
```

## Collection overrides

```yaml
hypertext:
  collection:
    layout: cards
    display:
      image: 1
      summary: 1
      read-more: 1
```

The Demos section includes list, comfy, table, grid, and cards examples.

## Production

Enable Grav caching and web-server Brotli or gzip. Hypertext does not reparse completed HTML output for minification or image manipulation.
