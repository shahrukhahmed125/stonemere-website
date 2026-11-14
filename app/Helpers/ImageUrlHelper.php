<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageUrlHelper
{
    /**
     * Resolve image URL for both local assets and uploaded files.
     *
     * @param string|null $path
     * @param string $default
     * @return string
     */
    public static function resolve(?string $path, string $default = ''): string
    {
        if (empty($path)) {
            return $default;
        }

        // If it's already a full URL, return as-is
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // If it's a local asset path (assets/images/...), use asset()
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        // If it starts with storage/, it's already a storage URL path
        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        // If it's a storage path (homepage/cards/...), use Storage::url()
        // This assumes files are stored in storage/app/public/
        if (str_starts_with($path, 'homepage/') || str_starts_with($path, 'branding/')) {
            return Storage::disk('public')->url($path);
        }

        // If the file exists on the public disk (uploaded via FileUpload), use Storage::url()
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        // Fallback to asset() for backwards compatibility
        return asset($path);
    }
}
