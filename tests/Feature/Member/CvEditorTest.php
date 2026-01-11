<?php

declare(strict_types=1);

namespace Tests\Feature\Member;

use App\Models\CvData;
use App\Models\User;
use App\Services\GeminiService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

final class CvEditorTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role' => 'member',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function cv_editor_page_is_accessible_by_member(): void
    {
        $this->actingAs($this->user)
            ->get(route('member.cv-editor'))
            ->assertSuccessful()
            ->assertSeeLivewire('member.cv-editor');
    }

    /** @test */
    public function can_save_cv_data(): void
    {
        Livewire::actingAs($this->user)
            ->test('member.cv-editor')
            ->set('data.full_name', 'John Doe')
            ->set('data.email', 'john@example.com')
            ->set('data.summary', 'Professional developer')
            ->call('save')
            ->assertHasNoErrors()
            ->assertSee('Data CV berhasil disimpan');

        $this->assertDatabaseHas('cv_data', [
            'user_id' => $this->user->id,
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'summary' => 'Professional developer',
        ]);
    }

    /** @test */
    public function can_polish_summary_using_ai(): void
    {
        Http::fake([
            'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent*' => Http::response([
                'candidates' => [
                    [
                        'content' => [
                            'parts' => [
                                ['text' => 'Elegant summary']
                            ]
                        ]
                    ]
                ]
            ], 200)
        ]);

        Livewire::actingAs($this->user)
            ->test('member.cv-editor')
            ->set('data.summary', 'Original summary')
            ->call('polishSummary')
            ->assertHasNoErrors()
            ->assertSet('data.summary', 'Elegant summary')
            ->assertSee('Ringkasan profil berhasil diperbaiki');
    }

    /** @test */
    public function can_add_and_remove_experience(): void
    {
        Livewire::actingAs($this->user)
            ->test('member.cv-editor')
            ->call('addExperience')
            ->assertCount('data.experience', 1)
            ->set('data.experience.0.company', 'Google')
            ->set('data.experience.0.position', 'Developer')
            ->call('removeExperience', 0)
            ->assertCount('data.experience', 0);
    }
}
