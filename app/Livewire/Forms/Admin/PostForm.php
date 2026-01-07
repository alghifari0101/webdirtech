<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Admin;

use App\Models\Post;
use Livewire\Form;
use Livewire\Attributes\Validate;

/**
 * Post Form object.
 */
final class PostForm extends Form
{
    public ?int $id = null;
    public ?int $category_id = null;
    public string $title = '';
    public string $slug = '';

    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . ($this->id ?? 'NULL'),
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|string',
            'is_published' => 'boolean',
        ];
    }

    public string $content = '';
    public string $excerpt = '';
    public ?string $featured_image = null;
    public bool $is_published = false;

    /**
     * Set post data.
     */
    public function setPost(Post $post): void
    {
        $this->id = $post->id;
        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->excerpt = $post->excerpt;
        $this->featured_image = $post->featured_image;
        $this->is_published = $post->is_published;
    }

    /**
     * Store post.
     */
    public function store($action): void
    {
        $this->validate();
        $action->execute($this->all());
    }
}
