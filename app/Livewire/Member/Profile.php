<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

/**
 * Profile Component.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 2.2 (Authorization).
 */
final class Profile extends Component
{
    public string $name = '';
    public string $email = '';
    public ?string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        Gate::authorize('member');

        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    /**
     * Update user profile.
     */
    public function updateProfile(): void
    {
        Gate::authorize('member');

        $user = auth()->user();

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        session()->flash('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Update user password.
     */
    public function updatePassword(): void
    {
        Gate::authorize('member');

        $this->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['password', 'password_confirmation']);

        session()->flash('success_password', 'Password berhasil diperbarui.');
    }

    /**
     * Render the component view.
     */
    public function render(): View
    {
        return view('livewire.member.profile')
            ->layout('components.layouts.app');
    }
}
