<?php

declare(strict_types=1);

namespace App\Actions\Member\Cv;

use App\Models\CvData;

/**
 * Action to save or update CV data.
 * 
 * Follows Rule 6.2 (Action-Based Pattern).
 */
final class SaveCvDataAction
{
    /**
     * Execute the action.
     * 
     * @param int $userId
     * @param array $data
     * @return CvData
     */
    public function execute(int $userId, array $data): CvData
    {
        return CvData::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
    }
}
