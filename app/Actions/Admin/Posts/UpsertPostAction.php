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
        if (!empty($data['content'])) {
            $data['content'] = clean($data['content']);
        }

        if (!empty($data['excerpt'])) {
            $data['excerpt'] = clean($data['excerpt']);
        }

        if ($id) {
            $post = Post::findOrFail($id);
            $post->update($data);
            return $post;
        }

        return Post::create($data);
    }
}
