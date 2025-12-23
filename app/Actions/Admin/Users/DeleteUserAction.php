<?php

declare(strict_types=1);

namespace App\Actions\Admin\Users;

use App\Models\User;
use Illuminate\Validation\ValidationException;

/**
 * Action to Delete a User.
 * 
 * Follows Rule 6.2 (Action-Based Pattern) and Rule 2.3 (Strict Type Hinting).
 */
final class DeleteUserAction
{
    /**
     * Execute the action.
     * 
     * @param int $id
     * @param int $currentUserId The ID of the user performing the deletion.
     * @return void
     * @throws ValidationException
     */
    public function execute(int $id, int $currentUserId): void
    {
        if ($id === $currentUserId) {
            throw ValidationException::withMessages([
                'user' => 'Anda tidak bisa menghapus akun sendiri!',
            ]);
        }

        $user = User::findOrFail($id);
        $user->delete();
    }
}
