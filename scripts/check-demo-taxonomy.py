#!/usr/bin/env python3

from __future__ import annotations

import re
import sys
from collections import Counter
from pathlib import Path


SITES = ("journal", "catalog", "resume", "docs", "restaurant")
TAXONOMIES = ("category", "tag")


def parse_terms(value: str) -> list[str]:
    value = value.strip()
    if not value:
        return []
    if value.startswith("[") and value.endswith("]"):
        value = value[1:-1]
    return [
        term.strip().strip("'\"")
        for term in value.split(",")
        if term.strip().strip("'\"")
    ]


def page_taxonomy(path: Path) -> dict[str, list[str]]:
    lines = path.read_text(encoding="utf-8").splitlines()
    if not lines or lines[0] != "---":
        return {name: [] for name in TAXONOMIES}

    taxonomy = {name: [] for name in TAXONOMIES}
    in_taxonomy = False
    current = ""

    for line in lines[1:]:
        if line == "---":
            break
        if line == "taxonomy:":
            in_taxonomy = True
            current = ""
            continue
        if not in_taxonomy:
            continue
        if line and not line[0].isspace():
            break

        key_match = re.match(r"^\s+(category|tag):\s*(.*)$", line)
        if key_match:
            current = key_match.group(1)
            taxonomy[current].extend(parse_terms(key_match.group(2)))
            continue

        item_match = re.match(r"^\s*-\s+(.+)$", line)
        if current and item_match:
            taxonomy[current].extend(parse_terms(item_match.group(1)))

    return taxonomy


def fail(message: str) -> None:
    print(message, file=sys.stderr)
    raise SystemExit(1)


def main() -> None:
    root = Path(__file__).resolve().parent.parent / "extras" / "demo-sites"

    for site in SITES:
        records = [
            page_taxonomy(path)
            for path in sorted((root / site / "pages").rglob("*.md"))
        ]
        counts = {name: Counter() for name in TAXONOMIES}

        for record in records:
            for name in TAXONOMIES:
                counts[name].update(set(record[name]))

        for name in TAXONOMIES:
            singletons = sorted(term for term, count in counts[name].items() if count < 2)
            if singletons:
                fail(f"{site} demo has singleton {name} terms: {', '.join(singletons)}")

        dense_pages = sum(
            len(set(record["category"])) >= 2 and len(set(record["tag"])) >= 5
            for record in records
        )
        if dense_pages < 3:
            fail(
                f"{site} demo has {dense_pages} dense taxonomy pages; expected at least 3"
            )

        if not any(
            len(set(record["category"])) >= 3 and len(set(record["tag"])) >= 8
            for record in records
        ):
            fail(
                f"{site} demo needs a stress page with at least 3 categories and 8 tags"
            )

        category_summary = ", ".join(
            f"{term}={count}" for term, count in sorted(counts["category"].items())
        )
        tag_summary = ", ".join(
            f"{term}={count}" for term, count in sorted(counts["tag"].items())
        )
        print(
            f"{site}: dense={dense_pages}; categories[{category_summary}]; tags[{tag_summary}]"
        )


if __name__ == "__main__":
    main()
