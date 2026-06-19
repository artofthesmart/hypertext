<?php

namespace Grav\Theme\Hypertext;

class HtmlMinifier
{
    /**
     * Minifies HTML output, including inline CSS and JS blocks.
     *
     * @param string $output The raw HTML string.
     * @return string The minified HTML string.
     */
    public static function process(string $output): string
    {
        // Minify inline <style> blocks first (preserve the tags, compress the CSS)
        $output = (string) preg_replace_callback(
            '/<style\b[^>]*>(.*?)<\/style>/si',
            static function (array $matches): string {
                $tag = $matches[0];
                $css = $matches[1];
                $minifiedCss = self::minifyCss($css);
                return str_replace($matches[1], $minifiedCss, $tag);
            },
            $output
        );

        // Minify inline <script> blocks (preserve the tags, compress the JS)
        $output = (string) preg_replace_callback(
            '/<script\b[^>]*>(.*?)<\/script>/si',
            static function (array $matches): string {
                $js = trim($matches[1]);
                if ($js === '') {
                    return $matches[0];
                }
                // Light JS minification: strip single-line comments, collapse whitespace
                $minifiedJs = (string) preg_replace('/\/\/.*$/m', '', $js);
                $minifiedJs = (string) preg_replace('/\s+/', ' ', $minifiedJs);
                return str_replace($matches[1], $minifiedJs, $matches[0]);
            },
            $output
        );

        // Strip HTML comments (but preserve IE conditional comments)
        $output = (string) preg_replace('/<!--(?!\[if\s).*?-->/s', '', $output);

        // Collapse runs of whitespace (newlines, tabs, spaces) to a single space
        $output = (string) preg_replace('/\s{2,}/', ' ', $output);

        // Remove spaces between tags
        $output = (string) preg_replace('/>\s+</', '> <', $output);

        return trim($output);
    }

    /**
     * Minify a CSS string.
     *
     * Strips comments, collapses whitespace, and removes unnecessary
     * semicolons/spaces around CSS syntax characters.
     */
    private static function minifyCss(string $css): string
    {
        // Remove CSS comments
        $css = (string) preg_replace('/\/\*.*?\*\//s', '', $css);

        // Collapse whitespace
        $css = (string) preg_replace('/\s+/', ' ', $css);

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
