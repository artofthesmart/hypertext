<?php

namespace Grav\Theme\Hypertext;

use Grav\Common\Grav;
use Grav\Common\Page\Medium\ImageMedium;
use Grav\Common\Page\Medium\MediumFactory;

class ImageCompressor
{
    /**
     * Parses HTML and compresses images via Grav's native Media framework.
     *
     * @param string $output The raw HTML string.
     * @param string $mode The compression mode ('none', 'medium', 'high', 'extreme').
     * @return string The HTML string with updated image URLs.
     */
    public static function process(string $output, string $mode): string
    {
        return (string) preg_replace_callback(
            '/<img[^>]+>/i',
            function (array $matches) use ($mode): string {
                $tagHtml = $matches[0];

                // Extract src
                if (!preg_match('/src=["\']?([^"\'\s>]+)["\']?/i', $tagHtml, $srcMatch)) {
                    return $tagHtml;
                }
                $src = $srcMatch[1];

                // Ignore external and data URIs
                if (preg_match('/^https?:\/\//i', $src) || str_starts_with($src, '//') || str_starts_with($src, 'data:')) {
                    return $tagHtml;
                }

                return self::processImage($src, $tagHtml, $mode);
            },
            $output
        );
    }

    /**
     * Processes an individual image using Grav's built-in Medium framework,
     * allowing for native caching and image manipulation.
     */
    private static function processImage(string $src, string $tagHtml, string $mode): string
    {
        // 1. Retrieve the base path of the Grav installation.
        // Grav can run in a subdirectory (e.g. http://localhost/my-sub-folder).
        // If it does, the img src will contain that subdirectory prefix (rootUrl).
        $grav = Grav::instance();
        $uri = $grav['uri'];
        $rootUrl = rtrim($uri->rootUrl(false), '/');
        
        // 2. Strip the rootUrl from the src to get the clean relative URL path.
        $relPath = $src;
        if ($rootUrl !== '' && str_starts_with($src, $rootUrl . '/')) {
            $relPath = substr($src, strlen($rootUrl));
        }
        
        // 3. Remove query parameters (e.g., ?timestamp=123) which are not part of the filename.
        $relPath = strtok($relPath, '?');
        
        // 4. Decode URL characters (e.g. %20 back to spaces) and remove leading slashes
        // so that we can check for file existence relative to the Grav root directory.
        $relPath = urldecode(ltrim($relPath, '/'));
        
        // 5. Security & Validity check:
        // Ensure the path is not empty, doesn't attempt directory traversal (..) for security,
        // and physically exists on the disk relative to GRAV_ROOT.
        if (empty($relPath) || str_contains($relPath, '..') || !is_file(GRAV_ROOT . '/' . $relPath)) {
            return $tagHtml;
        }
        
        $physicalPath = GRAV_ROOT . '/' . $relPath;

        // Delegate to Grav's native Medium framework for handling caching and derivatives
        $medium = MediumFactory::fromFile($physicalPath);
        if (!$medium instanceof ImageMedium) {
            return $tagHtml;
        }

        // Extract any existing width/height from the HTML tag
        $htmlWidth = null;
        $htmlHeight = null;
        if (preg_match('/width=["\']?(\d+)["\']?/i', $tagHtml, $wMatch)) {
            $htmlWidth = (int) $wMatch[1];
        }
        if (preg_match('/height=["\']?(\d+)["\']?/i', $tagHtml, $hMatch)) {
            $htmlHeight = (int) $hMatch[1];
        }

        // 6. Retrieve the physical image's natural dimensions to preserve aspect ratio
        $info = @getimagesize($physicalPath);
        if (!$info) {
            return $tagHtml;
        }
        $naturalWidth = (int) $info[0];
        $naturalHeight = (int) $info[1];

        if ($naturalWidth <= 0 || $naturalHeight <= 0) {
            return $tagHtml;
        }

        // 7. Resolve HTML display dimensions keeping aspect ratio
        if ($htmlWidth !== null && $htmlHeight !== null) {
            // Both are set in the source HTML, keep them.
        } elseif ($htmlWidth !== null) {
            // Calculate height keeping aspect ratio.
            $htmlHeight = (int) round($htmlWidth * ($naturalHeight / $naturalWidth));
        } elseif ($htmlHeight !== null) {
            // Calculate width keeping aspect ratio.
            $htmlWidth = (int) round($htmlHeight * ($naturalWidth / $naturalHeight));
        } else {
            // Neither is set, use natural dimensions.
            $htmlWidth = $naturalWidth;
            $htmlHeight = $naturalHeight;
        }

        // Delegate to Grav's native Medium framework for handling caching and derivatives
        $medium = MediumFactory::fromFile($physicalPath);
        if (!$medium instanceof ImageMedium) {
            return $tagHtml;
        }

        try {
            // Only perform image file resizing and optimization if compression is enabled
            if ($mode !== 'none') {
                if ($mode === 'extreme') {
                    $medium = $medium->quality(50);
                    // Under-res by 10% (0.9 scale) to aggressively save bytes.
                    // We rely on the browser to scale it back up to the original $htmlWidth / $htmlHeight.
                    $fileW = (int) round($htmlWidth * 0.9);
                    $fileH = (int) round($htmlHeight * 0.9);
                    $medium = $medium->resize($fileW, $fileH);
                } else {
                    if ($mode === 'high') {
                        $medium = $medium->quality(60);
                    } else {
                        // Medium mode
                        $medium = $medium->quality(80);
                    }

                    // If the display dimensions are smaller than natural dimensions,
                    // resize the physical file to match display dimensions to save bytes.
                    if ($htmlWidth < $naturalWidth || $htmlHeight < $naturalHeight) {
                        $medium = $medium->resize($htmlWidth, $htmlHeight);
                    }
                }

                // In Grav 1.6+, ImageMedium supports format conversion using Gregwar/Image
                try {
                    // Attempt to convert to webp if Grav supports it
                    $webpMedium = $medium->format('webp');
                    $newUrl = $webpMedium->url();
                } catch (\Throwable $e) {
                    // Fallback to natively compressed JPEG/PNG if webp isn't supported
                    $newUrl = $medium->url();
                }

                // Update the img tag's src with the processed image URL
                $tagHtml = str_replace($src, $newUrl, $tagHtml);
            }

            // 8. Clean up any existing inline width/height attributes to prevent duplicates
            $tagHtml = (string) preg_replace('/\s+width=["\']?\d+["\']?/i', '', $tagHtml);
            $tagHtml = (string) preg_replace('/\s+height=["\']?\d+["\']?/i', '', $tagHtml);

            // 9. Always insert the resolved width and height attributes for CLS optimization
            $tagHtml = rtrim($tagHtml);
            $dims = sprintf(' width="%d" height="%d"', $htmlWidth, $htmlHeight);
            if (str_ends_with($tagHtml, '/>')) {
                $tagHtml = substr($tagHtml, 0, -2) . $dims . ' />';
            } else {
                $tagHtml = substr($tagHtml, 0, -1) . $dims . '>';
            }

            return $tagHtml;

        } catch (\Throwable $e) {
            // Fallback to original tag if Grav's image processing fails
            return $tagHtml;
        }
    }
}
