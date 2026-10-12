<?php

declare(strict_types=1);

namespace Grav\Theme\Hypertext;

class HtmlMinifier
{
    /**
     * Minifies HTML output and inline CSS without altering scripts or
     * whitespace-sensitive content.
     *
     * @param string $output The raw HTML string.
     * @return string The minified HTML string.
     */
    public static function process(string $output): string
    {
        $styledOutput = preg_replace_callback(
            '/<style\b[^>]*>(.*?)<\/style>/si',
            static function (array $matches): string {
                return str_replace($matches[1], self::minifyCss($matches[1]), $matches[0]);
            },
            $output
        );
        if ($styledOutput !== null) {
            $output = $styledOutput;
        }

        $preserved = [];
        $protectedOutput = preg_replace_callback(
            '/<(pre|textarea|script)\b[^>]*>.*?<\/\1>/si',
            static function (array $matches) use (&$preserved): string {
                $placeholder = sprintf("\x1AHYPERTEXT_%d\x1A", count($preserved));
                $preserved[$placeholder] = $matches[0];

                return $placeholder;
            },
            $output
        );
        if ($protectedOutput !== null) {
            $output = $protectedOutput;
        }

        // Strip HTML comments (but preserve IE conditional comments)
        $withoutComments = preg_replace('/<!--(?!\[if\s).*?-->/s', '', $output);
        if ($withoutComments !== null) {
            $output = $withoutComments;
        }

        // Collapse runs of whitespace (newlines, tabs, spaces) to a single space
        $collapsedOutput = preg_replace('/\s{2,}/', ' ', $output);
        if ($collapsedOutput !== null) {
            $output = $collapsedOutput;
        }

        $betweenTagsCollapsed = preg_replace('/>\s+</', '> <', $output);
        if ($betweenTagsCollapsed !== null) {
            $output = $betweenTagsCollapsed;
        }

        return strtr(trim($output), $preserved);
    }

    /**
     * Minify a CSS string.
     *
     * Strips comments, collapses whitespace, and removes unnecessary
     * semicolons/spaces around CSS syntax characters.
     */
    private static function minifyCss(string $css): string
    {
        $withoutComments = preg_replace('/\/\*.*?\*\//s', '', $css);
        if ($withoutComments !== null) {
            $css = $withoutComments;
        }

        $collapsedCss = preg_replace('/\s+/', ' ', $css);
        if ($collapsedCss !== null) {
            $css = $collapsedCss;
        }

        // Remove spaces around structural characters
        $css = str_replace(
            [' { ', ' } ', '{ ', ' {', '} ', ' }', '; ', ' ;', ': ', ' :', ', ', ' ,'],
            ['{',   '}',   '{',  '{',  '}',  '}',  ';',  ';',  ':',  ':',  ',',  ','],
            $css
        );

        // Remove trailing semicolons before closing braces
        $css = str_replace(';}', '}', $css);

        return trim($css);
    }
}
