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
        try {
            $this->form->authenticate();
            return redirect()->intended(route('admin.dashboard'));
        } catch (ValidationException $e) {
            $this->addError('form.email', $e->getMessage());
            return null;
        }
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
