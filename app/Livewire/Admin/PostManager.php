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
    public mixed $tempImage = null;

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        Gate::authorize('admin');
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
        Gate::authorize('admin');
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
        Gate::authorize('admin');
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
        \Illuminate\Support\Facades\Log::info('PostManager::store called', ['form' => $this->form->all()]);
        Gate::authorize('admin');
        
        try {
            if ($this->tempImage) {
                \Illuminate\Support\Facades\Log::info('Storing temp image');
                
                // Retain original filename but make it safe and unique
                $originalName = $this->tempImage->getClientOriginalName();
                $extension = $this->tempImage->getClientOriginalExtension();
                $cleanName = \Illuminate\Support\Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
                $filename = $cleanName . '-' . time() . '.' . $extension;

                $path = $this->tempImage->storeAs('blog', $filename, 'public');
                $this->form->featured_image = $path;
            }

            \Illuminate\Support\Facades\Log::info('Triggering form store');
            $this->form->store($action);
            \Illuminate\Support\Facades\Log::info('Form store success');

            session()->flash('message', 
                $this->form->id ? 'Artikel berhasil diperbarui.' : 'Artikel berhasil ditambahkan.');

            $this->closeModal();
            $this->form->reset();
            $this->tempImage = null;
            $this->dispatch('content-reset');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Illuminate\Support\Facades\Log::warning('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Error saving article: ' . $e->getMessage(), [
                'exception' => $e,
                'form_data' => $this->form->all()
            ]);
            
            session()->flash('error', 'Terjadi kesalahan saat menyimpan artikel: ' . $e->getMessage());
        }
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
        Log::info('PostManager::delete called', ['id' => $id]);
        Gate::authorize('admin');
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Artikel berhasil dihapus.');
    }
}
