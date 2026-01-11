<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

/**
 * Form Object for Registration.
 * 
 * Follows Rule 3.2 (Validation Separation) and Rule 6.5 (Modularity).
 */
final class RegisterForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:10|max:15')]
    public string $phone = '';

    #[Validate('required|min:8|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Create a new user.
     * 
     * @return User
     */
    public function store(): User
    {
        $this->validate();

        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'role' => 'member',
            'is_active' => true,
            'is_premium' => false,
        ]);
    }
}
