<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Actions\Admin\Posts\UpsertPostAction;
use App\Livewire\Forms\Admin\PostForm;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;

/**
 * Post Manager component.
 */
final class PostManager extends Component
{
    use WithPagination;
    use WithFileUploads;

    public PostForm $form;
    public bool $isOpen = false;
    public $tempImage;

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.post-manager', [
            'posts' => Post::with('category')->latest()->paginate(10)->onEachSide(1),
            'categories' => Category::all()
        ])->title('Manajemen Blog');
    }

    /**
     * Open create modal.
     * 
     * @return void
     */
    public function create(): void
    {
        $this->form->reset();
        $this->isOpen = true;
        $this->dispatch('content-reset');
    }

    /**
     * Close modal.
     * 
     * @return void
     */
    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    /**
     * Store or update post.
     * 
     * @param UpsertPostAction $action
     * @return void
     */
    public function store(UpsertPostAction $action): void
    {
        Gate::authorize('admin');
        if ($this->tempImage) {
            $path = $this->tempImage->store('blog', 'public');
            $this->form->featured_image = $path;
        }

        $this->form->store($action);

        session()->flash('message', 
            $this->form->id ? 'Artikel berhasil diperbarui.' : 'Artikel berhasil ditambahkan.');

        $this->closeModal();
        $this->form->reset();
        $this->tempImage = null;
        $this->dispatch('content-reset');
    }

    /**
     * Show edit modal.
     * 
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        Gate::authorize('admin');
        $post = Post::findOrFail($id);
        $this->form->setPost($post);

        $this->isOpen = true;
        $this->dispatch('post-edit', content: $post->content);
    }

    /**
     * Delete a post.
     * 
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Gate::authorize('admin');
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Artikel berhasil dihapus.');
    }
}
