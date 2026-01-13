<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;

/**
 * Category Manager component.
 */
final class CategoryManager extends Component
{
    public string $name = '';
    public ?int $editingId = null;

    /**
     * Render the component view.
     */
    #[Layout('components.layouts.admin-new')]
    public function render(): View
    {
        return view('livewire.admin.category-manager', [
            'categories' => Category::withCount('posts')->get()
        ])->title('Manajemen Kategori');
    }

    /**
     * Save category.
     */
    public function save(): void
    {
        Gate::authorize('admin');
        $this->validate(['name' => 'required|string|max:100|unique:categories,name,' . $this->editingId]);

        Category::updateOrCreate(['id' => $this->editingId], [
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ]);

        $this->reset(['name', 'editingId']);
        session()->flash('message', 'Kategori berhasil disimpan.');
    }

    /**
     * Edit category.
     */
    public function edit(int $id): void
    {
        Gate::authorize('admin');
        $category = Category::findOrFail($id);
        $this->editingId = $id;
        $this->name = $category->name;
    }

    /**
     * Delete category.
     */
    public function delete(int $id): void
    {
        Gate::authorize('admin');
        $category = Category::findOrFail($id);
        if ($category->posts()->count() > 0) {
            session()->flash('error', 'Kategori tidak bisa dihapus karena masih memiliki artikel.');
            return;
        }
        $category->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
    }
}
