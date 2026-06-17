# Project Roadmap: Hypertext 2

This document distills the architecture, features, and key design philosophies from the original Hypertext theme (v2.4.x) to serve as a roadmap and technical specification for implementing **Hypertext 2** in a fresh repository.

---

## 1. Core Philosophy & Design Axioms

Hypertext 2 continues the primary mission of the original theme: **providing a zero-compromise, ultra-fast, high-performance web experience that prioritizes accessibility and minimalism.**

### Key Axioms
1. **Zero Client-Side JavaScript**: No JS files are served by default. External/plugin scripts are blocked unless explicitly allowed at the page level.
2. **No External Asset Fetches**: Eliminating additional HTTP requests to speed up Time-to-First-Paint (TTFP). Stylesheets are inlined directly into the `<head>` of the initial document response.
3. **Extreme Weightlessness**: Total HTML payload (including inline styles) should average around **10KB** or less.
4. **One Style, All Devices**: The layout must rely on fluid, clean HTML container scaling. Avoid introducing bloated stylesheets packed with complex `@media` queries and `!important` overrides. Cross-platform compatibility should rely on layout simplicity.
5. **Browser-Default Styling**: The theme should allow the browser's native user-agent stylesheet to dictate presentation, or apply minimal classless styling to organize semantic elements.

---

## 2. Core Decisions & Architectural Shifts (V2 vs V1)

| Aspect / Feature | Hypertext 1 (v2.4.2) | Hypertext 2 (New Specification) | Rationale |
| :--- | :--- | :--- | :--- |
| **CMS Version Target** | Grav CMS 1.6+ / 1.7 | **Grav CMS 2.0+ Exclusively** | Leverage PHP 8+ strict requirements, native Flex-Objects, and modern media rendering improvements. |
| **HTML Standard** | HTML5 & HTML 3.2 compatibility mode | **Semantic HTML5 Only** | Deprecate HTML 3.2 compatibility mode. Streamlines Twig templates and avoids double layout logic (`{{ html5 ? '<header>' : '<div class="header">' }}`). |
| **Stylesheet Library** | 25+ bundled themes (up to 305KB) | **Retained Theme Library** | Keep the existing 25+ stylesheet options for now to maintain variety, but allow users to toggle/load them inline. |
| **User Customization** | CSS files + complex blueprint selectors | **Browser-Driven Minimalism** | Remove user-facing layout customization tools (e.g., color-pickers). Let custom CSS textareas handle page-specific modifications. |
| **Minimum Layout Target** | Fully fluid / No-JS overrides | **Single-Column Fluid Flow** | Focus on a clean, single-column layout resolved entirely through native defaults, scratching multi-column layouts due to mobile usability/complexity. |

---

## 3. Specifications to Carry Forward

To bootstrap the fresh repository for Hypertext 2, we must preserve and refine the following core features from the current implementation:

### 3.1. Progressive Asset Squelching & Inlining
* **Asset Squelching**: The global setting (`style.allowCSS` / `style.allowJS`) blocks all plugin and core assets from injecting stylesheets/scripts, while letting page-level overrides (`header.allowCSS` / `header.allowJS`) selectively enable them where required (e.g., syntax highlight page).
* **Inline Resources**: CSS and custom CSS textarea inputs must be compiled and rendered inline within `<style>` blocks in the document header rather than invoking a separate request, ensuring zero-fetch layout loads.

### 3.2. Single-Column Layout Flow (Scratched Multi-Column Architecture)
* **Single-Column Only (Default)**: Fully fluid single-column/full-width layout.
* **Multi-Column Scratched**: Multi-column responsive layout is officially scratched. Multi-column structures do not look good on mobile viewports and require excessive CSS/media query workarounds and markup clutter, which violates the "Extreme Weightlessness" and "One Style, All Devices" design axioms.

### 3.3. Smart Image & Favicon Handling
* **Image Sizing Rules**: Fallback hierarchy to find thumbnail/header files in page folders or `/user/images` automatically, resizing them to WebP/optimized heights only when explicitly requested.
* **Base64 Encoding**: Retain the capability to embed images inline as Base64 strings directly in HTML output to minimize requests on image-light pages.
* **Favicon Uploader**: Maintain the PNG favicon upload pipeline with simple toggle validation.

### 3.4. Navigation & Pagination Spacers
* **Inline vs Stacked**: Let users choose between lists (`<ul>`/`<li>`) or clean inline structures (anchors separated by customizable decorators like `|`, `[ ]`, or `< >`).
* **Custom Navigation Items**: Additional links defined via lists in blueprints supporting offsite markers and target behaviors.

### 3.5. Modern Performance & Loading Optimizations
* **Font Preloading**: Preload Atkinson Hyperlegible font assets (`AtkinsonHL`) via `<link rel="preload" as="font" type="font/woff2">` in `<head>` when visually impaired mode is enabled to prevent Flash of Unstyled Text (FOUT) and minimize Cumulative Layout Shift (CLS).
* **Image Optimization & Layout Integrity**: Enforce browser-native `loading="lazy"` on all page images (headers and thumbnails) to keep the initial page paint light. Ensure all image elements (`<img>`) output explicit, valid `width` and `height` attributes alongside other layout-critical attributes so the browser's layout engine can reserve layout boxes correctly and eliminate Cumulative Layout Shift (CLS).
* **Integrated Output Minification**: Instead of forcing users to install external, unmaintained HTML minification plugins, incorporate a lightweight HTML/CSS/JS compressor fork directly into the theme's core PHP class (`hypertext.php`) by listening to the `onOutputGenerated` event hook.
* **Inline CSS Safeguard**: Auto-minify inlined CSS to strip comments and whitespaces. Introduce a size threshold safeguard: if an inlined theme stylesheet size exceeds a safe budget (e.g. 10KB, such as `latex.css` which is 305KB), fall back to `<link rel="stylesheet">` delivery automatically to prevent massive HTML payloads.

---

## 4. Plugin Support Specification

To ensure compatibility with the Grav ecosystem while adhering to Hypertext's JS-free, lightweight philosophy, the theme must provide clean, unbloated styling and semantic support for the following plugins:

### 4.1. Standard GravCMS Plugins
* **Breadcrumbs**: Styled inline breadcrumb lists (`breadcrumbs.html.twig`) with custom separator configuration.
* **Pagination**: Standard collection page pagination (`pagination.html.twig`) with customizable page numbers and navigation arrows.
* **SimpleSearch**: Clean form styling for the search input and native rendering of search results without external JS dependency.
* **Taxonomylist**: Semantic tag-cloud lists, taxonomy filters, and category badges with minimal classless styling.
* **Archives**: Semantic monthly/yearly blog archive sidebars/widgets.
* **Feed**: Auto-discovery feed link tag registration in the `<head>` when the Feed plugin is active.
* **Login**: Clean, semantic login and registration form styling to support user authentication screens out-of-the-box.

### 4.2. TrilbyMedia & Third-Party Plugins
* **Page TOC (Table of Contents)**: Support for the Page TOC plugin (e.g., rendering the table of contents container, list styling, and seamless block placement in template layouts).
* **Page Inject**: Ensure injected sub-page fragments render cleanly without breaking outer layout structures.
* **Related Pages**: Stylized block layout for displaying related page summaries at the footer of article pages.

---

## 5. New Theme Structure Target

The fresh repository should conform to the clean Grav 2.0 theme structure:
```
hypertext/
├── blueprints/
│   ├── collection.yaml
│   ├── default-partials/
│   │   ├── extra_content.yaml
│   │   └── overrides.yaml
│   └── default.yaml
├── blueprints.yaml
├── css/
│   ├── air.css
│   ├── hypertext++.css
│   ├── visual-impaired.css
│   ├── water-dark.css
│   ├── water-light.css
│   └── ...
├── fonts/
│   └── (Atkinson Hyperlegible files, optional/loaded via visually impaired mode)
├── languages.yaml
├── LICENSE
├── README.md
├── Project_Roadmap.md
├── hypertext.php
├── hypertext.yaml
├── templates/
│   ├── collection.html.twig
│   ├── default.html.twig
│   ├── error.html.twig
│   ├── modular.html.twig
│   └── partials/
│       ├── breadcrumbs.html.twig
│       ├── content/
|       |   ├── base.html.twig
│       │   ├── comfy.html.twig
│       │   ├── footer.html.twig
│       │   ├── header.html.twig
│       │   ├── list.html.twig
│       │   ├── summary.html.twig
│       │   └── table.html.twig
│       └── page/
│           ├── footer.html.twig
│           ├── header.html.twig
│           ├── js-css.html.twig
│           ├── messages.html.twig
│           ├── navigation.html.twig
│           └── pagination.html.twig
└── thumbnail.jpg
```

---

## 6. Implementation Milestones

### Phase 1: Foundation & Blueprint Realignment
1. Initialize the fresh repository with Grav 2.0 guidelines.
2. Port and clean up the `blueprints.yaml` and separate blueprint partials (`blueprints/default-partials/`).
3. Remove all references to HTML 3.2 options, including the dropdowns and associated conditional Twig blocks.
4. Remove all configurations and logic related to multi-column layouts (blueprints and templates).
5. Implement the integrated output minifier fork in `hypertext.php` and its config blueprints.

### Phase 2: Template Refactoring (Twig & HTML5)
1. Simplify `templates/partials/base.html.twig` to use semantic HTML5 elements (`<header>`, `<nav>`, `<main>`, `<article>`, `<footer>`) exclusively in a single-column layout.
2. Refactor asset delivery in `js-css.html.twig` to handle the retained stylesheet list, including auto-minification and the CSS weight safeguard.
3. Fix syntax errors and variable mismatches in image rendering templates (`header.html.twig`, `summary.html.twig`, and `grid.html.twig`), ensuring strict output of explicit `width`, `height`, and layout attributes.
4. Implement native image lazy loading and font preloading rules.
5. Verify compliance with Grav 2.0 theme engine updates (e.g., standard blocks and asset registration conventions).

### Phase 3: Plugin Integration & Theme Styling
1. Implement clean styling and Twig overrides for Grav standard plugins (Breadcrumbs, Pagination, SimpleSearch, Taxonomylist, Archives, Login).
2. Add explicit support for TrilbyMedia's Page TOC plugin (ensure `<nav>` structure styling works and is positioned correctly).
3. Test layout integration for Page Inject and Related Pages.

### Phase 4: Assets Pruning & Reset Verification
1. Remove deprecated layout files (but keep the CSS themes for now).
2. Ensure default single-column layouts look excellent on all devices (mobile first).

### Phase 5: Final Testing & Demo Migration
1. Redevelop a collection of demo pages to showcase the theme's capabilities.
2. Validate pagination, modular headers, footers, menu item listings, and plugin outputs under Grav 2.0.
