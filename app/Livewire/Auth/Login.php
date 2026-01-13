<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * Login component.
 * 
 * Follows Rule 1.3 (Anti-Spaghetti), Rule 6.5 (Modularity),
 * and Rule 2.3 (Strict Type Hinting).
 */
final class Login extends Component
{
    public LoginForm $form;

    /**
     * Handle login logic.
     * 
     * @return mixed
     */
    public function login(): mixed
    {
        $this->form->authenticate();
        
        $user = auth()->user();
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        if ($user->role === 'member') {
            if (!$user->is_active) {
                auth()->logout();
                session()->flash('error', 'Akun Anda sedang menunggu aktivasi oleh Admin.');
                return redirect()->route('login');
            }
            return redirect()->intended(route('member.dashboard'));
        }

        return redirect()->intended(route('home'));
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.app')] 
    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
