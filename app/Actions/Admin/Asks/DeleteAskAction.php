<?php

declare(strict_types=1);

namespace App\Actions\Admin\Asks;

use App\Models\Ask;

/**
 * Action to Delete an Ask.
 * 
 * Follows Rule 6.2 (Action-Based Pattern) and Rule 2.3 (Strict Type Hinting).
 */
final class DeleteAskAction
{
    /**
     * Execute the action.
     * 
     * @param int $id
     * @return void
     */
    public function execute(int $id): void
    {
        $ask = Ask::findOrFail($id);
        $ask->delete();
    }
}
