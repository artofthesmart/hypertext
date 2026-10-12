#!/usr/bin/env bash

set -euo pipefail

root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
version="$(awk '/^version:/ { print $2; exit }' "$root/blueprints.yaml")"
grav_version="${GRAV_VERSION:-2.2.6}"
port="${HYPERTEXT_TEST_PORT:-8765}"
work="$(mktemp -d)"
server_pid=''

cleanup() {
  status=$?
  if (( status != 0 )) && [[ -f "$work/server.log" ]]; then
    cat "$work/server.log" >&2
  fi
  if [[ -n "$server_pid" ]]; then
    kill "$server_pid" 2>/dev/null || true
    wait "$server_pid" 2>/dev/null || true
  fi
  rm -rf "$work"
  return "$status"
}
trap cleanup EXIT

curl -fsSL "https://getgrav.org/download/core/grav/${grav_version}" -o "$work/grav.zip"
unzip -q "$work/grav.zip" -d "$work"
grav_root="$(find "$work" -mindepth 1 -maxdepth 1 -type d -name 'grav*' -print -quit)"
[[ -n "$grav_root" ]] || {
  echo "Unable to locate extracted Grav ${grav_version}" >&2
  exit 1
}

unzip -q "$root/dist/hypertext-${version}.zip" -d "$grav_root/user/themes"
mkdir -p "$grav_root/user/data/hypertext/styles"
unzip -q "$root/dist/hypertext-styles-${version}.zip" -d "$work/styles"
cp -a "$work/styles/hypertext-styles/." "$grav_root/user/data/hypertext/styles/"

php -l "$grav_root/user/themes/hypertext/hypertext.php"
GRAV_ROOT="$grav_root" php -r '
define("GRAV_ROOT", getenv("GRAV_ROOT"));
require GRAV_ROOT . "/vendor/autoload.php";
require GRAV_ROOT . "/user/themes/hypertext/hypertext.php";
$global = \Grav\Theme\Hypertext::stylesheetOptions();
$local = \Grav\Theme\Hypertext::stylesheetOverrideOptions();
if (count($global) !== 27 || count($local) !== 28 || array_key_first($local) !== "inherit") {
    throw new RuntimeException("Invalid Admin stylesheet options");
}
'
(
  cd "$grav_root"
  php bin/grav yamllinter --folder=user/themes/hypertext --strict --no-ansi
)

start_server() {
  if [[ -n "$server_pid" ]]; then
    kill "$server_pid" 2>/dev/null || true
    wait "$server_pid" 2>/dev/null || true
  fi

  (
    cd "$grav_root"
    exec php -S "127.0.0.1:${port}" system/router.php
  ) >"$work/server.log" 2>&1 &
  server_pid=$!

  for _ in {1..40}; do
    if curl -fsS "http://127.0.0.1:${port}/" >/dev/null 2>&1; then
      return
    fi
    sleep 0.5
  done

  echo "Grav test server did not become ready" >&2
  exit 1
}

render_site() {
  local site="$1"
  local expected="$2"
  local child_route="$3"
  local expected_style="$4"
  local expected_width="$5"
  local package="$root/dist/hypertext-demo-${site}-${version}.zip"

  rm -rf "$work/site" "$grav_root/user/pages"
  mkdir -p "$work/site" "$grav_root/user/pages"
  unzip -q "$package" -d "$work/site"
  cp -a "$work/site/hypertext-demo-${site}/pages/." "$grav_root/user/pages/"
  cp -a "$work/site/hypertext-demo-${site}/config/." "$grav_root/user/config/"

  (
    cd "$grav_root"
    php bin/grav clearcache --quiet
  )

  start_server
  curl -fsS "http://127.0.0.1:${port}/" -o "$work/${site}.html"
  curl -fsS "http://127.0.0.1:${port}${child_route}" -o "$work/${site}-child.html"
  grep -q "$expected" "$work/${site}.html"
  grep -q '/user/themes/hypertext/images/favicon.png' "$work/${site}.html"
  grep -q "max-width: ${expected_width}px" "$work/${site}.html"
  grep -q "max-width: ${expected_width}px" "$work/${site}-child.html"
  if [[ "$expected_style" == 'none' ]]; then
    ! grep -Eq '/user/(themes|data)/hypertext/[^"]+\.css' "$work/${site}.html"
    ! grep -Eq '/user/(themes|data)/hypertext/[^"]+\.css' "$work/${site}-child.html"
  else
    grep -q "$expected_style" "$work/${site}.html"
    grep -q "$expected_style" "$work/${site}-child.html"
  fi
  if grep -Eiq '<script([[:space:]>])' "$work/${site}.html"; then
    echo "Unexpected script element in ${site} demo" >&2
    exit 1
  fi
}

render_site journal '<ol class="children list">' '/home/river-path' '/user/themes/hypertext/css/hypertext++.css' 960
render_site catalog '<ul class="children grid">' '/home/arc-lamp' '/user/themes/hypertext/css/water-light.css' 1024
grep -q 'srcset=' "$work/catalog.html"
grep -q '<figcaption>' "$work/catalog.html"
render_site resume '<section class="children comfy">' '/home/current-role' '/user/themes/hypertext/css/sakura.css' 768
render_site docs '<table class="children">' '/home/installation' none 960
render_site restaurant '<section class="children cards">' '/home/bakery' '/user/themes/hypertext/css/water-dark.css' 960

curl -fsS "http://127.0.0.1:${port}/?theme=water-dark" | grep -q '/user/themes/hypertext/css/water-dark.css'
curl -fsS "http://127.0.0.1:${port}/?theme=latex" | grep -q '/user/data/hypertext/styles/css/latex.css'

printf 'Grav %s integration OK on port %s\n' "$grav_version" "$port"
