<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Admin;

use App\Models\User;
use Livewire\Form;
use Livewire\Attributes\Validate;

/**
 * Form Object for User Management.
 * 
 * Follows Rule 6.5 (Modularity) and Rule 3.2 (Validation Separation).
 */
final class UserForm extends Form
{
    public ?int $userId = null;

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $email = '';

    #[Validate]
    public ?string $phone = '';

    #[Validate]
    public string $password = '';

    #[Validate]
    public string $role = 'member';

    #[Validate]
    public bool $is_active = false;

    /**
     * Validation rules for the form.
     * 
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'phone' => 'nullable|min:10|max:15',
            'role' => 'required|in:admin,user,member',
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Reset fields.
     * 
     * @return void
     */
    public function clear(): void
    {
        $this->reset(['userId', 'name', 'email', 'phone', 'password', 'role', 'is_active']);
    }

    /**
     * Filling form from existing user.
     * 
     * @param User $user
     * @return void
     */
    public function setFromUser(User $user): void
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->role;
        $this->is_active = $user->is_active;
        $this->password = '';
    }
}
