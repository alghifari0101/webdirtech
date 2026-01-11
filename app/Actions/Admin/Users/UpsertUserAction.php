<?php

declare(strict_types=1);

namespace App\Actions\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Action to Create or Update a User.
 * 
 * Follows Rule 6.2 (Action-Based Pattern) and Rule 2.3 (Strict Type Hinting).
 */
final class UpsertUserAction
{
    /**
     * Execute the action.
     * 
     * @param array{name: string, email: string, role: string, is_active?: bool, password?: string} $data
     * @param int|null $userId
     * @return User
     */
    public function execute(array $data, ?int $userId = null): User
    {
        $sanitizedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'role' => $data['role'],
            'is_active' => (bool) ($data['is_active'] ?? false),
        ];

        if (isset($data['password']) && !empty($data['password'])) {
            $sanitizedData['password'] = Hash::make($data['password']);
        }

        return User::updateOrCreate(
            ['id' => $userId],
            $sanitizedData
        );
    }
}
