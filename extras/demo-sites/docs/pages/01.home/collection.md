---
title: Lantern Documentation
subtitle: A small publishing tool with a small manual
content:
  items: '@self.children'
  order:
    by: folder
    dir: asc
hypertext:
  content:
    subtitle: 1
    date: none
  collection:
    layout: table
    display:
      title: 1
      subtitle: 1
      image: 0
      date: none
      categories: 1
      tags: 0
      summary: 1
      read-more: 1
---

Lantern turns a folder of Markdown files into a static publication.

```sh
lantern build ./notes --output ./public
```
