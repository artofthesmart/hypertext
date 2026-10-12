#!/usr/bin/env bash

set -euo pipefail

root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
version="$(awk '/^version:/ { print $2; exit }' "$root/blueprints.yaml")"
dist="$root/dist"
work="$(mktemp -d)"

cleanup() {
  rm -rf "$work"
}
trap cleanup EXIT

rm -rf "$dist"
mkdir -p "$dist" "$work/core/hypertext" "$work/style-pack/hypertext-styles" "$work/demo/hypertext-demo"

tar \
  --exclude='./.git' \
  --exclude='./.github' \
  --exclude='./dist' \
  --exclude='./extras' \
  --exclude='./scripts' \
  -C "$root" -cf - . |
  tar -C "$work/core/hypertext" -xf -

cp -a "$root/extras/style-pack/." "$work/style-pack/hypertext-styles/"
cp -a "$root/extras/demo-skeleton/." "$work/demo/hypertext-demo/"

(
  cd "$work/core"
  zip -qr "$dist/hypertext-${version}.zip" hypertext
)
(
  cd "$work/style-pack"
  zip -qr "$dist/hypertext-styles-${version}.zip" hypertext-styles
)
(
  cd "$work/demo"
  zip -qr "$dist/hypertext-demo-${version}.zip" hypertext-demo
)

du -h "$dist"/*.zip
