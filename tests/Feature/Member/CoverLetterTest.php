<?php

declare(strict_types=1);

namespace Tests\Feature\Member;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

final class CoverLetterTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@test.com',
            'phone' => '081234567890',
            'role' => 'member',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function cover_letter_page_is_accessible_by_member(): void
    {
        $this->actingAs($this->user)
            ->get(route('member.cover-letter'))
            ->assertSuccessful()
            ->assertSeeLivewire('member.cover-letter-editor');
    }

    /** @test */
    public function can_select_template_and_see_auto_filled_data(): void
    {
        Livewire::actingAs($this->user)
            ->test('member.cover-letter-editor')
            ->call('selectTemplate', 'korporat')
            ->assertSet('selectedTemplateId', 'korporat')
            ->assertSee($this->user->name)
            ->assertSee($this->user->email)
            ->assertSee($this->user->phone);
    }

    /** @test */
    public function can_change_language(): void
    {
        Livewire::actingAs($this->user)
            ->test('member.cover-letter-editor')
            ->call('setLanguage', 'en')
            ->assertSet('language', 'en')
            ->call('selectTemplate', 'formal')
            ->assertSee('Dear Hiring Manager'); // Part of english formal template
    }
}
