<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Form;
use Livewire\Attributes\Validate;

/**
 * Form Object for Login.
 * 
 * Follows Rule 6.5 (Modularity) and Rule 1.3 (Anti-Spaghetti).
 */
final class LoginForm extends Form
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle authentication attempt.
     * 
     * @return void
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Informasi login yang diberikan tidak cocok dengan data kami.',
            ]);
        }

        session()->regenerate();
    }
}
