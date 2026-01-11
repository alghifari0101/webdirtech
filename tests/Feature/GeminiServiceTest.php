<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\GeminiService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

final class GeminiServiceTest extends TestCase
{
    private GeminiService $geminiService;
    private string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent*';

    protected function setUp(): void
    {
        parent::setUp();
        $this->geminiService = new GeminiService();
        
        // Mock API Key if not set in env
        if (!config('services.gemini.api_key')) {
            config(['services.gemini.api_key' => 'test-api-key']);
        }
    }

    /** @test */
    public function it_can_polish_text_successfully(): void
    {
        Http::fake([
            $this->baseUrl => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Polished professional text.']
                            ]
                        ]
                    ]
                ]
            ], 200)
        ]);

        $result = $this->geminiService->polishText('Help me polish this', 'summary');

        $this->assertTrue($result['success']);
        $this->assertEquals('Polished professional text.', $result['text']);
    }

    /** @test */
    public function it_returns_error_when_api_key_is_missing(): void
    {
        config(['services.gemini.api_key' => '']);
        // Need to re-instantiate or bypass constructor logic if it was already cached
        // Re-instantiate to be sure
        $service = new GeminiService();
        
        $result = $service->polishText('Some text');

        $this->assertFalse($result['success']);
        $this->assertEquals('API key tidak dikonfigurasi', $result['error']);
    }

    /** @test */
    public function it_returns_error_when_text_is_empty(): void
    {
        $result = $this->geminiService->polishText('');

        $this->assertFalse($result['success']);
        $this->assertEquals('Teks kosong', $result['error']);
    }

    /** @test */
    public function it_handles_api_failure_for_polishing(): void
    {
        Http::fake([
            $this->baseUrl => Http::response([
                'error' => [
                    'message' => 'Quota exceeded'
                ]
            ], 429)
        ]);

        $result = $this->geminiService->polishText('Valid text');

        $this->assertFalse($result['success']);
        $this->assertEquals('Quota exceeded', $result['error']);
    }

    /** @test */
    public function it_can_generate_cover_letter_successfully(): void
    {
        Http::fake([
            $this->baseUrl => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Dear HR, this is my cover letter.']
                            ]
                        ]
                    ]
                ]
            ], 200)
        ]);

        $input = [
            'name' => 'John Doe',
            'position' => 'Developer',
            'company' => 'Tech Corp',
        ];

        $result = $this->geminiService->generateCoverLetter($input);

        $this->assertTrue($result['success']);
        $this->assertEquals('Dear HR, this is my cover letter.', $result['text']);
    }

    /** @test */
    public function it_handles_api_failure_for_cover_letter(): void
    {
        Http::fake([
            $this->baseUrl => Http::response([
                'error' => [
                    'message' => 'API Error'
                ]
            ], 500)
        ]);

        $result = $this->geminiService->generateCoverLetter(['name' => 'John']);

        $this->assertFalse($result['success']);
        $this->assertEquals('API Error', $result['error']);
    }
}
