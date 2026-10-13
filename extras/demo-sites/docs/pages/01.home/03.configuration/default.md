---
title: Configuration
subtitle: Keep the site-level switches close to the content
taxonomy:
  category: [reference]
  tag: [config, yaml]
---

Lantern reads a single site configuration file and a smaller page-level override when a page needs something different.
The goal is to make defaults obvious without turning every page into a miniature control panel.

===

<dl>
<dt>base_url</dt><dd>The canonical prefix used for generated links</dd>
<dt>theme</dt><dd>The active presentation layer for all pages</dd>
<dt>output_dir</dt><dd>The destination for published HTML</dd>
</dl>

```yaml
site:
  title: Lantern Notes
  base_url: /docs
```

<details>
<summary>Rule of thumb</summary>

Put global behavior in configuration and page-specific exceptions in the page frontmatter.

</details>
