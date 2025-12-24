<?php

declare(strict_types=1);

namespace App\Livewire\Blog;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Public Blog Index component.
 */
final class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public ?string $category = null;

    /**
     * Render the component view.
     */
    public function render(): View
    {
        $posts = Post::with('category')
            ->published()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->category);
                });
            })
            ->latest()
            ->paginate(9);

        return view('livewire.blog.index', [
            'posts' => $posts,
            'categories' => Category::all()
        ])->layoutData([
            'title' => 'Blog & Insight Digital | Dirtech Solutions',
            'description' => 'Pelajari tips, panduan, dan tren terbaru seputar VPS, Website, dan Solusi Digital dari para ahli di Dirtech.',
            'ogType' => 'website'
        ]);
    }
}
