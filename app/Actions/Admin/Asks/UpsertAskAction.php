<?php

declare(strict_types=1);

namespace App\Actions\Admin\Asks;

use App\Models\Ask;

/**
 * Action to Create or Update an Ask.
 * 
 * Follows Rule 6.2 (Action-Based Pattern) and Rule 2.3 (Strict Type Hinting).
 */
final class UpsertAskAction
{
    /**
     * Execute the action.
     * 
     * @param array{question: string, answer: string} $data
     * @param int|null $id
     * @return Ask
     */
    public function execute(array $data, ?int $id = null): Ask
    {
        return Ask::updateOrCreate(
            ['id' => $id],
            $data
        );
    }
}
