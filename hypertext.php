<?php

declare(strict_types=1);

namespace Grav\Theme;

use Grav\Common\Page\Interfaces\PageInterface;
use Grav\Common\Theme;
use Symfony\Component\Yaml\Yaml;
use Twig\TwigFunction;

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
            'onTwigInitialized' => ['onTwigInitialized', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ];
    }

    /**
     * Register the small configuration helpers used by theme templates.
     */
    public function onTwigInitialized(): void
    {
        $twig = $this->grav['twig']->twig();
        $twig->addFunction(new TwigFunction('hypertext_config', [$this, 'resolveConfig']));
        $twig->addFunction(new TwigFunction('hypertext_content_config', [$this, 'resolveContentConfig']));
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
     * Resolve the global theme defaults and explicit overrides for one page.
     *
     * @return array<string, array<string, mixed>>
     */
    public function resolveConfig(PageInterface $page): array
    {
        $theme = $this->config();
        $header = $page->header();
        $local = self::arrayValue($header->hypertext ?? []);

        $resolved = [];
        foreach (['header', 'footer', 'navigation', 'layout', 'assets', 'content'] as $section) {
            $resolved[$section] = array_replace(
                self::arrayValue($theme[$section] ?? []),
                self::inheritedOverrides($local[$section] ?? [])
            );
        }

        $resolved['style'] = array_replace(
            self::arrayValue($theme['style'] ?? []),
            self::styleOverrides($local['style'] ?? [])
        );

        $globalCollection = self::arrayValue($theme['collection'] ?? []);
        $localCollection = self::inheritedOverrides($local['collection'] ?? [], ['display']);
        $resolved['collection'] = array_replace($globalCollection, $localCollection);
        $resolved['collection']['display'] = array_replace(
            self::arrayValue($globalCollection['display'] ?? []),
            self::inheritedOverrides(
                self::arrayValue($local['collection'] ?? [])['display'] ?? []
            )
        );

        return $resolved;
    }

    /**
     * Resolve a collection item's display settings.
     *
     * @param array<string, mixed> $defaults
     * @return array<string, mixed>
     */
    public function resolveContentConfig(PageInterface $page, array $defaults): array
    {
        $header = $page->header();
        $local = self::arrayValue($header->hypertext ?? []);

        return array_replace(
            $defaults,
            self::inheritedOverrides($local['content'] ?? [])
        );
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

    /**
     * @return array<string, mixed>
     */
    private static function arrayValue(mixed $value): array
    {
        return is_array($value) ? $value : (is_object($value) ? get_object_vars($value) : []);
    }

    /**
     * @param list<string> $excludedKeys
     * @return array<string, mixed>
     */
    private static function inheritedOverrides(mixed $value, array $excludedKeys = []): array
    {
        $overrides = self::arrayValue($value);

        return array_filter(
            $overrides,
            static fn(mixed $item, string $key): bool => $item !== 'default' && !in_array($key, $excludedKeys, true),
            ARRAY_FILTER_USE_BOTH
        );
    }

    /**
     * @return array<string, mixed>
     */
    private static function styleOverrides(mixed $value): array
    {
        $overrides = self::arrayValue($value);

        return array_filter(
            $overrides,
            static fn(mixed $item, string $key): bool => $key === 'preset'
                ? $item !== 'inherit'
                : $item !== 'default',
            ARRAY_FILTER_USE_BOTH
        );
    }
}
