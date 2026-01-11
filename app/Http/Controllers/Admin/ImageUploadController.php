<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

final class ImageUploadController extends Controller
{
    /**
     * Handle Quill image upload.
     */
    public function upload(Request $request): JsonResponse
    {
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'No image uploaded'], 400);
        }

        try {
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $cleanName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
            $filename = $cleanName . '-' . time() . '.' . $extension;

            $path = $file->storeAs('blog/content', $filename, 'public');
            
            return response()->json([
                'url' => Storage::url($path)
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
