<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * Register component.
 */
final class Register extends Component
{
    public RegisterForm $form;

    /**
     * Handle registration logic.
     * 
     * @return mixed
     */
    public function register(): mixed
    {
        $this->form->store();

        session()->flash('success', 'Registrasi berhasil! Selamat datang di Dirtech CV.');

        return redirect()->route('login');
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.auth.register')->title('Daftar Akun CV ATS');
    }
}
