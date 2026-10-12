# Performance model

Hypertext optimizes three independent surfaces.

## Installation

The runtime release excludes demo content and the extended stylesheet library. `scripts/build-release.sh` produces separate archives and reports their sizes.

## Server rendering

Hypertext does not process the completed HTML response. Images owned by the theme are transformed once through Grav media while Twig renders them. Grav caching should be enabled in production.

## Browser delivery

The default theme loads no JavaScript and no stylesheet. A selected style is linked as a cacheable file. The only inline CSS contains responsive-image and page-width safety rules plus user-authored custom CSS.

Atkinson Hyperlegible is loaded only when enabled and uses WOFF2 files with `font-display: swap`.

## Verification

For each release, measure:

- runtime ZIP size;
- HTML bytes before and after gzip/Brotli;
- request count for default and styled pages;
- uncached and cached time to first byte;
- explicit image dimensions and derivative count;
- HTML validity and basic accessibility;
- all five collection layouts on the supported Grav release.
