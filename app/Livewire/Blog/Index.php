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
        $selectedCategory = $this->category ? Category::where('slug', $this->category)->first() : null;

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

        $title = $selectedCategory 
            ? "Artikel {$selectedCategory->name} | Dirtech Solutions" 
            : 'Blog & Insight Digital | Dirtech Solutions';
        
        $description = $selectedCategory
            ? "Kumpulan artikel dan panduan seputar {$selectedCategory->name} untuk membantu perkembangan bisnis digital Anda."
            : 'Pelajari tips, panduan, dan tren terbaru seputar VPS, Website, dan Solusi Digital dari para ahli di Dirtech.';

        return view('livewire.blog.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'selectedCategory' => $selectedCategory
        ])->layoutData([
            'title' => $title,
            'description' => $description,
            'ogType' => 'website'
        ]);
    }
}
