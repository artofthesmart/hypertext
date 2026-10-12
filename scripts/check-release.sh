#!/usr/bin/env bash

set -euo pipefail

root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
version="$(awk '/^version:/ { print $2; exit }' "$root/blueprints.yaml")"

"$root/scripts/build-release.sh" >/dev/null

archives=(
  "hypertext-${version}.zip"
  "hypertext-styles-${version}.zip"
  "hypertext-demo-${version}.zip"
  "hypertext-demo-journal-${version}.zip"
  "hypertext-demo-catalog-${version}.zip"
  "hypertext-demo-resume-${version}.zip"
  "hypertext-demo-docs-${version}.zip"
  "hypertext-demo-restaurant-${version}.zip"
)

for archive in "${archives[@]}"; do
  path="$root/dist/$archive"
  [[ -f "$path" ]] || {
    echo "Missing release archive: $archive" >&2
    exit 1
  }
  zip -T "$path" >/dev/null
done

core="$root/dist/hypertext-${version}.zip"
core_bytes="$(wc -c < "$core")"
if (( core_bytes >= 500000 )); then
  echo "Core archive is ${core_bytes} bytes; expected less than 500000" >&2
  exit 1
fi

if unzip -Z1 "$core" | grep -Eq '(^|/)(extras|scripts|dist|\.github|\.git|templates/css|classes)(/|$)|\.(ttf|woff)$|assets/screenshot\.png$'; then
  echo "Core archive contains excluded development or legacy files" >&2
  exit 1
fi

while read -r file; do
  [[ -f "$root/css/$file" ]] || {
    echo "Core style manifest references missing file: $file" >&2
    exit 1
  }
done < <(awk '/^[[:space:]]+file:/ { print $2 }' "$root/styles.yaml")

while read -r file; do
  [[ -f "$root/extras/style-pack/css/$file" ]] || {
    echo "Style-pack manifest references missing file: $file" >&2
    exit 1
  }
done < <(awk '/^[[:space:]]+file:/ { print $2 }' "$root/extras/style-pack/styles.yaml")

duplicate_css="$(
  find "$root/css" "$root/extras/style-pack/css" -type f -name '*.css' -print0 |
    sort -z |
    xargs -0 sha256sum |
    awk '{ count[$1]++; files[$1] = files[$1] " " $2 } END { for (hash in count) if (count[hash] > 1) print files[hash] }'
)"
if [[ -n "$duplicate_css" ]]; then
  echo "Duplicate stylesheet content:$duplicate_css" >&2
  exit 1
fi

for site in journal catalog resume docs restaurant; do
  archive="$root/dist/hypertext-demo-${site}-${version}.zip"
  unzip -Z1 "$archive" | grep -q "hypertext-demo-${site}/config/system.yaml"
  unzip -Z1 "$archive" | grep -q "hypertext-demo-${site}/config/site.yaml"
  unzip -Z1 "$archive" | grep -q "hypertext-demo-${site}/config/themes/hypertext.yaml"
  unzip -Z1 "$archive" | grep -q "hypertext-demo-${site}/pages/01.home/collection.md"
done

printf 'Release contract OK: core=%s bytes, archives=%s\n' "$core_bytes" "${#archives[@]}"
