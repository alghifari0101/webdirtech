<?php

if (!function_exists('storage_url')) {
    /**
     * Get the URL for a storage path.
     *
     * @param string|null $path
     * @return string
     */
    function storage_url(?string $path): string
    {
        if (!$path) {
            return '';
        }

        return \Illuminate\Support\Facades\Storage::url($path);
    }
}
