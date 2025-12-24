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

        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if (empty($data['excerpt']) && !empty($data['content'])) {
            $data['excerpt'] = Str::limit(strip_tags($data['content']), 160);
        }

        return Post::updateOrCreate(['id' => $id], $data);
    }
}
