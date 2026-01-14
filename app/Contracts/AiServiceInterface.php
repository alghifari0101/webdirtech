<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface for AI service providers.
 */
interface AiServiceInterface
{
    /**
     * Polish/rewrite text to be more professional.
     */
    public function polishText(string $text, string $context = 'summary'): array;

    /**
     * Generate a professional cover letter using AI.
     */
    public function generateCoverLetter(array $input): array;

    /**
     * Analyze CV text against a Job Description for ATS compatibility.
     */
    public function analyzeCvAts(string $cvText, string $jobDescription): array;
}
