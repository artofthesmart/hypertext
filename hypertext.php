<?php

declare(strict_types=1);

namespace Grav\Theme;

use Grav\Common\Theme;
use RocketTheme\Toolbox\Event\Event;

/**
 * Hypertext Theme for Grav CMS 2.0+
 *
 * A zero JS/CSS theme focused on ultra-fast, accessible, semantic HTML5.
 * Implements integrated output minification to avoid external plugin dependencies.
 */
class Hypertext extends Theme
{
    /**
     * Subscribe to Grav lifecycle events.
     *
     * @return array<string, array<array<string|int>>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onOutputGenerated' => ['onOutputGenerated', 0],
        ];
    }

    /**
     * Minify final HTML output when enabled in theme config.
     *
     * Strips HTML comments (preserving IE conditionals), collapses whitespace,
     * and minifies any inline <style> blocks by removing CSS comments and
     * collapsing whitespace within them.
     */
    public function onOutputGenerated(Event $event): void
    {
        $config = $this->config();
        $shouldMinify = (bool) ($config['handling']['minify-output'] ?? true);

        if (!$shouldMinify) {
            return;
        }

        // Only process HTML output formats
        $format = $this->grav['page']?->templateFormat() ?? 'html';
        if ($format !== 'html') {
            return;
        }

        $output = $this->grav->output;
        if (empty($output)) {
            return;
        }

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

        $this->grav->output = trim($output);
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