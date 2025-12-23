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
     * @param array{name: string, email: string, role: string, password?: string} $data
     * @param int|null $userId
     * @return User
     */
    public function execute(array $data, ?int $userId = null): User
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return User::updateOrCreate(
            ['id' => $userId],
            $data
        );
    }
}
