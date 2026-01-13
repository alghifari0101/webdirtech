<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Payment Verification component for admins.
 */
#[Layout('components.layouts.admin')]
#[Title('Verifikasi Pembayaran - Admin Dirtech')]
final class PaymentVerification extends Component
{
    /**
     * Approve a payment.
     * 
     * @param int $paymentId
     */
    public function approve(int $paymentId): void
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update(['status' => 'approved']);

        $user = User::findOrFail($payment->user_id);
        $user->update([
            'is_premium' => true,
            'premium_until' => now()->addMonth(),
        ]);

        session()->flash('success', "Pembayaran dari {$user->name} berhasil disetujui.");
    }

    /**
     * Reject a payment.
     * 
     * @param int $paymentId
     * @param string|null $note
     */
    public function reject(int $paymentId, ?string $note = null): void
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update([
            'status' => 'rejected',
            'admin_note' => $note ?? 'Bukti pembayaran tidak valid.'
        ]);

        session()->flash('error', "Pembayaran telah ditolak.");
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.payment-verification', [
            'payments' => Payment::with('user')->where('status', 'pending')->latest()->get()
        ]);
    }
}
