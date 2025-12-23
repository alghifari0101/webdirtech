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
        $this->ensureIsNotRateLimited();

        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            \Illuminate\Support\Facades\RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Informasi login yang diberikan tidak cocok dengan data kami.',
            ]);
        }

        \Illuminate\Support\Facades\RateLimiter::clear($this->throttleKey());

        session()->regenerate();
    }

    /**
     * Ensure the login request is not rate limited.
     * 
     * @throws ValidationException
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     * 
     * @return string
     */
    protected function throttleKey(): string
    {
        return \Illuminate\Support\Str::transliterate(\Illuminate\Support\Str::lower($this->email).'|'.request()->ip());
    }
}
