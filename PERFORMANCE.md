# Performance model

Hypertext optimizes three independent surfaces.

## Installation

The runtime release excludes demo content and the extended stylesheet library. `scripts/build-release.sh` produces separate archives and reports their sizes.

## Server rendering

Hypertext does not process the completed HTML response. PHP resolves the global-plus-local rendering configuration before Twig builds the page. Images owned by the theme are transformed once through Grav media while Twig renders them. Grav caching should be enabled in production.

## Browser delivery

The default theme loads no JavaScript and no stylesheet. A selected style is linked as a cacheable file. The only inline CSS contains responsive-image and page-width safety rules plus user-authored custom CSS.

Atkinson Hyperlegible is loaded only when enabled and uses WOFF2 files with `font-display: swap`.

The semantic grid layout adds its small CSS rule only on grid collection pages. Responsive `srcset` output is emitted only when Grav media alternatives exist.

## Verification

For each release, measure:

- runtime ZIP size;
- HTML bytes before and after gzip/Brotli;
- request count for default and styled pages;
- uncached and cached time to first byte;
- explicit image dimensions and derivative count;
- HTML validity and basic accessibility;
- all five collection layouts on the supported Grav release.

`scripts/check-release.sh` enforces package boundaries and size limits. `scripts/integration-test.sh` installs the built archives into a clean Grav release and renders all five focused demo sites. GitHub Actions currently covers Grav 2.0.27, 2.1.12, and 2.2.6.
