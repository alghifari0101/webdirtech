<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

final class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registration_page_contains_livewire_component(): void
    {
        $this->get(route('register'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.register');
    }

    /** @test */
    public function can_register_successfully(): void
    {
        Livewire::test('auth.register')
            ->set('form.name', 'John Doe')
            ->set('form.email', 'john@example.com')
            ->set('form.phone', '081234567890')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'password123')
            ->call('register')
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '081234567890',
            'role' => 'member',
        ]);
    }

    /** @test */
    public function registration_requires_validation(): void
    {
        Livewire::test('auth.register')
            ->set('form.name', '')
            ->set('form.email', '')
            ->set('form.phone', '')
            ->set('form.password', '')
            ->call('register')
            ->assertHasErrors([
                'form.name' => 'required',
                'form.email' => 'required',
                'form.phone' => 'required',
                'form.password' => 'required',
            ]);
    }

    /** @test */
    public function registration_requires_valid_email(): void
    {
        Livewire::test('auth.register')
            ->set('form.email', 'invalid-email')
            ->call('register')
            ->assertHasErrors(['form.email' => 'email']);
    }

    /** @test */
    public function registration_email_must_be_unique(): void
    {
        User::factory()->create(['email' => 'john@example.com']);

        Livewire::test('auth.register')
            ->set('form.email', 'john@example.com')
            ->call('register')
            ->assertHasErrors(['form.email' => 'unique']);
    }

    /** @test */
    public function registration_password_must_be_confirmed(): void
    {
        Livewire::test('auth.register')
            ->set('form.password', 'password123')
            ->set('form.password_confirmation', 'different')
            ->call('register')
            ->assertHasErrors(['form.password' => 'confirmed']);
    }
}
