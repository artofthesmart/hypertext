<?php

declare(strict_types=1);

namespace Grav\Theme;

use Grav\Common\Theme;
use Symfony\Component\Yaml\Yaml;

/**
 * Hypertext theme integration for Grav 2.
 */
class Hypertext extends Theme
{
    /**
     * @return array<string, array{0: string, 1: int}>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ];
    }

    /**
     * Expose the stylesheet manifest to Twig.
     */
    public function onTwigSiteVariables(): void
    {
        $twig = $this->grav['twig'];
        $twig->twig_vars['hypertext_styles'] = self::stylesheets();
    }

    /**
     * Build stylesheet options for the Admin blueprint.
     *
     * @return array<string, string>
     */
    public static function stylesheetOptions(): array
    {
        $options = [];
        foreach (self::stylesheets() as $name => $style) {
            $options[$name] = $style['label'];
        }

        return $options;
    }

    /**
     * Build page-level stylesheet options for the Admin blueprint.
     *
     * @return array<string, string>
     */
    public static function stylesheetOverrideOptions(): array
    {
        return ['inherit' => 'Use theme default'] + self::stylesheetOptions();
    }

    /**
     * Load core styles and any optional user-installed style pack.
     *
     * Optional styles are installed under:
     * user/data/hypertext/styles/{styles.yaml,css/*.css}
     *
     * @return array<string, array{label: string, path: string|null}>
     */
    public static function stylesheets(): array
    {
        $styles = self::loadStyles(
            __DIR__ . '/styles.yaml',
            'theme://css/'
        );

        $optionalManifest = GRAV_ROOT . '/user/data/hypertext/styles/styles.yaml';
        if (is_file($optionalManifest)) {
            $styles += self::loadStyles(
                $optionalManifest,
                'user://data/hypertext/styles/css/'
            );
        }

        return $styles;
    }

    /**
     * @return array<string, array{label: string, path: string|null}>
     */
    private static function loadStyles(string $manifest, string $basePath): array
    {
        $data = Yaml::parseFile($manifest);
        $entries = is_array($data) ? ($data['styles'] ?? []) : [];
        $styles = [];

        foreach ($entries as $name => $entry) {
            if (
                !is_string($name)
                || $name === 'inherit'
                || !preg_match('/^[a-z0-9][a-z0-9+_-]*$/i', $name)
                || !is_array($entry)
            ) {
                throw new \UnexpectedValueException("Invalid Hypertext style entry in {$manifest}");
            }

            $label = $entry['label'] ?? $name;
            $file = $entry['file'] ?? null;
            if (!is_string($label) || ($file !== null && (!is_string($file) || basename($file) !== $file))) {
                throw new \UnexpectedValueException("Invalid Hypertext style metadata for {$name}");
            }

            $styles[$name] = [
                'label' => $label,
                'path' => $file === null ? null : $basePath . $file,
            ];
        }

        return $styles;
    }
}
