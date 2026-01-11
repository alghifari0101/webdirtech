<?php

declare(strict_types=1);

namespace Tests\Feature\Member;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

final class PaymentTest extends TestCase
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
    public function payment_page_can_be_accessed_by_member(): void
    {
        $this->actingAs($this->user)
            ->get(route('member.payment'))
            ->assertSuccessful()
            ->assertSeeLivewire('member.payment');
    }

    /** @test */
    public function can_upload_payment_proof(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('proof.jpg');

        Livewire::actingAs($this->user)
            ->test('member.payment')
            ->set('proof', $file)
            ->call('saveProof')
            ->assertHasNoErrors()
            ->assertSee('Bukti pembayaran berhasil diunggah');

        $this->assertDatabaseHas('payments', [
            'user_id' => $this->user->id,
            'status' => 'pending',
            'amount' => 19000,
        ]);

        $payment = Payment::where('user_id', $this->user->id)->first();
        Storage::disk('public')->assertExists($payment->proof_path);
    }

    /** @test */
    public function admin_can_approve_payment(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payment = Payment::create([
            'user_id' => $this->user->id,
            'amount' => 19000,
            'proof_path' => 'test/proof.jpg',
            'status' => 'pending',
        ]);

        Livewire::actingAs($admin)
            ->test('admin.payment-verification')
            ->call('approve', $payment->id)
            ->assertHasNoErrors();

        $this->assertEquals('approved', $payment->fresh()->status);
        $this->assertTrue($this->user->fresh()->is_premium);
        $this->assertNotNull($this->user->fresh()->premium_until);
    }

    /** @test */
    public function admin_can_reject_payment(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payment = Payment::create([
            'user_id' => $this->user->id,
            'amount' => 19000,
            'proof_path' => 'test/proof.jpg',
            'status' => 'pending',
        ]);

        Livewire::actingAs($admin)
            ->test('admin.payment-verification')
            ->call('reject', $payment->id, 'Bukti tidak jelas')
            ->assertHasNoErrors();

        $this->assertEquals('rejected', $payment->fresh()->status);
        $this->assertEquals('Bukti tidak jelas', $payment->fresh()->admin_note);
        $this->assertFalse($this->user->fresh()->is_premium);
    }
}
