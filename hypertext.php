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
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
            'onOutputGenerated'   => ['onOutputGenerated', 0],
        ];
    }

    /**
     * Set up global Twig variables for the theme.
     */
    public function onTwigSiteVariables(): void
    {
        $config = $this->config();
        $textStyle = $config['structure']['text-style'] ?? 'plain';

        $decLeft = '';
        $decRight = '';
        if ($textStyle === 'braced') {
            $decLeft = '[ ';
            $decRight = ' ]';
        } elseif ($textStyle === 'angled') {
            $decLeft = '< ';
            $decRight = ' >';
        }

        $this->grav['twig']->twig_vars['dec_left'] = $decLeft;
        $this->grav['twig']->twig_vars['dec_right'] = $decRight;
    }

    /**
     * Registers the theme classes directory dynamically with Composer's autoloader.
     * Uses Grav's locator to resolve the 'theme://classes' stream to support child theme inheritance.
     */
    public function autoload(): \Composer\Autoload\ClassLoader
    {
        $locator = $this->grav['locator'];
        $classesDir = $locator->findResource('theme://classes', true);

        /** @var \Composer\Autoload\ClassLoader $loader */
        $loader = $this->grav['loader'];
        
        // Maps the namespace prefix to the resolved theme classes directory.
        // Fallback to local classes directory if theme://classes locator path is not resolved.
        $loader->addPsr4('Grav\\Theme\\Hypertext\\', $classesDir ?: __DIR__ . '/classes');

        return $loader;
    }

    /**
     * Minify final HTML output when enabled in theme config.
     *
     * Strips HTML comments (preserving IE conditionals), collapses whitespace,
     * and minifies any inline <style> blocks by removing CSS comments and
     * collapsing whitespace within them. Also compresses images as needed.
     */
    public function onOutputGenerated(Event $event): void
    {
        $config = $this->config();

        // Only process HTML output formats
        $format = $this->grav['page']?->templateFormat() ?? 'html';
        if ($format !== 'html') {
            return;
        }

        $output = $this->grav->output;
        if (empty($output)) {
            return;
        }

        // 1. Process images (handles both compression and ensuring width/height parameters are set)
        $compressMode = $config['handling']['images']['compress'] ?? 'none';
        $output = \Grav\Theme\Hypertext\ImageCompressor::process($output, $compressMode);

        // 2. Minify HTML and inline assets
        $shouldMinify = (bool) ($config['handling']['minify-output'] ?? true);
        if ($shouldMinify) {
            $output = \Grav\Theme\Hypertext\HtmlMinifier::process($output);
        }

        $this->grav->output = $output;
    }
}