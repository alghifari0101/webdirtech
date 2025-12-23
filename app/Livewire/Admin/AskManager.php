<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Actions\Admin\Asks\DeleteAskAction;
use App\Actions\Admin\Asks\UpsertAskAction;
use App\Livewire\Forms\Admin\AskForm;
use App\Models\Ask;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;

/**
 * Ask Manager component.
 * 
 * Follows Rule 1.3 (Anti-Spaghetti), Rule 2.3 (Strict Type Hinting), 
 * and Rule 6.2 (Action-Based Pattern).
 */
final class AskManager extends Component
{
    public AskForm $form;
    public bool $isOpen = false;

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.ask-manager', [
            'asks' => Ask::latest()->get()
        ])->title('Manajemen Tanya Jawab');
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
     * Store or update ask.
     * 
     * @param UpsertAskAction $action
     * @return void
     */
    public function store(UpsertAskAction $action): void
    {
        $this->form->store($action);

        session()->flash('message', 
            $this->form->id ? 'Tanya Jawab berhasil diperbarui.' : 'Tanya Jawab berhasil ditambahkan.');

        $this->closeModal();
        $this->form->reset();
    }

    /**
     * Show edit modal.
     * 
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        $ask = Ask::findOrFail($id);
        $this->form->setAsk($ask);

        $this->isOpen = true;
    }

    /**
     * Delete an ask.
     * 
     * @param int $id
     * @param DeleteAskAction $action
     * @return void
     */
    public function delete(int $id, DeleteAskAction $action): void
    {
        $action->execute($id);
        session()->flash('message', 'Tanya Jawab berhasil dihapus.');
    }
}
