---
title: "Hello World: Returning to a Simpler Web"
date: 2026-06-20 12:00
author: "Alex Rivera"
subtitle: "A fresh start on a zero-JS, hyper-performance personal web space. "
show_header_image: true
header_image_file: welcome-header.jpg
thumbnail_image_file: welcome-thumbnail.jpg
taxonomy:
    category:
        - 'blog'
        - 'meta'
    tags:
        - 'introduction'
        - 'web-dev'
        - 'performance'
        - 'minimalism'
---

Welcome to my new personal web space. If you are reading this, you are experiencing a page that loaded in milliseconds, consumed virtually zero battery, and transferred less than 15 kilobytes of data. In an era where the average landing page is larger than the original doom shareware distribution, this is my declaration of independence from the modern, bloated web.

===

## Why This Blog Exists

I have spent the last ten years as a frontend developer, building complex Single Page Applications (SPAs) with React, Webpack, Vite, Tailwind, and a mountain of node modules. I've optimized bundles, configured server-side rendering, and set up state management libraries. Yet, despite all this technology, the modern web feels slower, more fragile, and less accessible than it did a decade ago. 

This space is an experiment in extreme minimalism. By using a zero-JavaScript, minimal-CSS framework like Hypertext, I want to prove that we can deliver high-quality, readable, and responsive content without the overhead of modern framework bloat.

### The Ground Rules

For this blog, I am adhering to a strict set of design and development principles:
1. **Zero JavaScript**: No analytics scripts, no tracking pixels, no interactive widgets that can be solved with native HTML.
2. **Minimalist Style**: Leverage browser defaults and clean, structural CSS. We only use inline styles to avoid unnecessary HTTP requests.
3. **Semantic HTML**: Let the markup do the heavy lifting. Headers, blockquotes, tables, and lists are formatted exactly as they were intended.

---

## Measuring Web Bloat

To put things in perspective, let's look at how a simple text page compares across different frameworks:

| Metric | Modern SPA | Standard Blog Theme | Hypertext Theme |
| :--- | :--- | :--- | :--- |
| **HTTP Requests** | 45+ | 12 - 20 | **1 - 3** |
| **JS Bundle Size** | 350 KB+ | 50 KB - 120 KB | **0 KB** |
| **CSS Size** | 80 KB | 20 KB - 40 KB | **~1.5 KB** |
| **First Contentful Paint (FCP)** | 1.8s - 3.2s | 0.8s - 1.5s | **< 0.2s** |

> "The web is not slow because of CPU limitations or networking speeds. The web is slow because we have forgotten how to write HTML."
> — *An anonymous performance advocate*

---

## What I'll Be Writing About

Going forward, this blog will serve as my notebook for both my professional and personal pursuits. You can expect posts covering:

*   **Retro Computing & Low-Spec Dev**: Coding for older hardware, optimizing assets, and exploring vintage operating systems.
*   **Web Performance**: In-depth analysis of browser rendering pipelines, CSS optimization, and clean PHP.
*   **Outdoor Adventures**: Trail reports from my hiking, camping, and amateur astronomy excursions.
*   **Digital Sovereignty**: Self-hosting, decentralized services, and building tools that last.

Here is a quick snippet of the kind of minimal styling I am exploring in my build scripts:

```bash
# A simple script to optimize assets before uploading to the server
echo "Optimizing images..."
for img in *.png; do
  magick "$img" -resize 1024x -strip -quality 82 "dist/${img%.*}.webp"
done
echo "Assets ready for deploy!"
```

Thank you for visiting, and I hope this inspires you to look at your own projects and ask: *how much of this do I actually need?*
