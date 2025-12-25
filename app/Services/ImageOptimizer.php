<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Service to handle on-the-fly image optimization (WebP conversion).
 */
final class ImageOptimizer
{
    /**
     * Convert a storage path to a WebP optimized version.
     * 
     * @param string|null $path
     * @param int $quality
     * @return string
     */
    public static function webp(?string $path, int $quality = 80): string
    {
        if (!$path || !extension_loaded('gd')) {
            return $path ? Storage::url($path) : '';
        }

        $extension = Str::afterLast($path, '.');
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (!in_array(strtolower($extension), $allowedExtensions)) {
            return Storage::url($path);
        }

        // Generate optimized path
        $optimizedPath = 'optimized/' . Str::beforeLast($path, '.') . '.webp';

        // Check if optimized file exists and is newer than source
        if (Storage::disk('public')->exists($optimizedPath)) {
            return Storage::disk('public')->url($optimizedPath);
        }

        // Check source file
        if (!Storage::disk('public')->exists($path)) {
            return '';
        }

        try {
            $sourcePath = Storage::disk('public')->path($path);
            $destinationPath = Storage::disk('public')->path($optimizedPath);

            // Ensure directory exists
            $optimizedDir = dirname($destinationPath);
            if (!is_dir($optimizedDir)) {
                mkdir($optimizedDir, 0755, true);
            }

            // Create image from source
            $image = match (strtolower($extension)) {
                'jpg', 'jpeg' => imagecreatefromjpeg($sourcePath),
                'png' => imagecreatefrompng($sourcePath),
                default => null,
            };

            if (!$image) {
                return Storage::url($path);
            }

            // Handle transparency for PNG
            if (strtolower($extension) === 'png') {
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }

            // Convert and save as WebP
            imagewebp($image, $destinationPath, $quality);
            imagedestroy($image);

            return Storage::disk('public')->url($optimizedPath);
        } catch (\Throwable $e) {
            // Log error or fallback to original URL
            \Log::error("Image optimization failed for path: {$path}. Error: " . $e->getMessage());
            return Storage::url($path);
        }
    }
}
