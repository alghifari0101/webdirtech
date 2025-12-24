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

    #[Validate('required|integer|exists:categories,id')]
    public ?int $category_id = null;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('nullable|string|max:255')]
    public string $slug = '';

    #[Validate('required|string')]
    public string $content = '';

    #[Validate('nullable|string|max:500')]
    public string $excerpt = '';

    #[Validate('nullable|string')]
    public ?string $featured_image = null;

    #[Validate('boolean')]
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
