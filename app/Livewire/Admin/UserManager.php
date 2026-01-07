<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Actions\Admin\Users\DeleteUserAction;
use App\Actions\Admin\Users\UpsertUserAction;
use App\Livewire\Forms\Admin\UserForm;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;

/**
 * Refactored User Manager component.
 * 
 * Follows Rule 1.3 (Anti-Spaghetti), Rule 2.3 (Strict Type Hinting), 
 * and Rule 6.2 (Action-Based Pattern).
 */
final class UserManager extends Component
{
    use WithPagination;

    public UserForm $form;

    public string $search = '';
    public bool $isOpen = false;
    public bool $isEdit = false;

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        $users = User::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
            )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.user-manager', [
            'users' => $users
        ])->title('Manajemen User');
    }

    /**
     * Show create modal.
     * 
     * @return void
     */
    public function create(): void
    {
        $this->form->clear();
        $this->isEdit = false;
        $this->isOpen = true;
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
     * Store or update user.
     * 
     * @param UpsertUserAction $action
     * @return void
     */
    public function store(UpsertUserAction $action): void
    {
        Gate::authorize('admin');
        $this->form->validate();

        $action->execute($this->form->all(), $this->form->userId);

        session()->flash('message', 
            $this->form->userId ? 'User Berhasil Diupdate.' : 'User Berhasil Dibuat.');

        $this->closeModal();
        $this->form->clear();
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
        $user = User::findOrFail($id);
        $this->form->setFromUser($user);
        
        $this->isEdit = true;
        $this->isOpen = true;
    }

    /**
     * Delete user.
     * 
     * @param int $id
     * @param DeleteUserAction $action
     * @return void
     */
    public function delete(int $id, DeleteUserAction $action): void
    {
        Gate::authorize('admin');
        try {
            $action->execute($id, (int) auth()->id());
            session()->flash('message', 'User Berhasil Dihapus.');
        } catch (ValidationException $e) {
            session()->flash('error', $e->getMessage());
        }
    }
}
