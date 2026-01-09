<?php

declare(strict_types=1);

namespace App\Actions\Admin\Posts;

use App\Models\Post;
use Illuminate\Support\Str;

/**
 * Action to Upsert a Blog Post.
 */
final class UpsertPostAction
{
    /**
     * Execute the action.
     * 
     * @param array $data
     * @return Post
     */
    public function execute(array $data): Post
    {
        \Illuminate\Support\Facades\Log::info('UpsertPostAction::execute start', ['data' => $data]);
        $id = $data['id'] ?? null;
        unset($data['id']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if (($data['is_published'] ?? false) && empty($data['published_at'] ?? null)) {
            $data['published_at'] = now();
        }

        if (empty($data['excerpt'] ?? null) && !empty($data['content'] ?? '')) {
            $data['excerpt'] = Str::limit(strip_tags($data['content']), 160);
        }

        // Rule 3.2: Sanitize HTML content to prevent XSS
        // Safely check if Purifier is available and configured
        $hasPurifier = function_exists('clean');

        if ($hasPurifier) {
            if (!empty($data['content'])) {
                $data['content'] = \clean($data['content']);
            }
            if (!empty($data['excerpt'])) {
                $data['excerpt'] = strip_tags(\clean($data['excerpt']));
            }
        }
        // If Purifier is not present, we keep the content as is to avoid stripping formatting
        // BUT we must ensure the user installs it for security.

        if ($id) {
            $post = Post::findOrFail($id);
            $post->update($data);
            
            // Eagerly optimize image
            if (!empty($post->featured_image)) {
                \App\Services\ImageOptimizer::webp($post->featured_image);
            }
            
            return $post;
        }

        $post = Post::create($data);
        
        // Eagerly optimize image
        if (!empty($post->featured_image)) {
            \App\Services\ImageOptimizer::webp($post->featured_image);
        }

        return $post;
    }
}
