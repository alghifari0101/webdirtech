<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use App\Models\Payment as PaymentModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * Payment component for members.
 */
#[Layout('components.layouts.app')]
#[Title('Pembayaran Premium - Dirtech CV')]
final class Payment extends Component
{
    use WithFileUploads;

    public $proof;
    public ?PaymentModel $existingPayment = null;

    /**
     * Initial component state.
     */
    public function mount(): void
    {
        $this->existingPayment = PaymentModel::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'approved'])
            ->latest()
            ->first();
    }

    /**
     * Save the payment proof.
     */
    public function saveProof(): void
    {
        if (auth()->user()->is_premium) {
            session()->flash('success', 'Akun Anda sudah premium!');
            return;
        }

        $this->validate([
            'proof' => 'required|image|max:2048', // Max 2MB
        ]);

        $path = $this->proof->store('payment-proofs', 'public');

        PaymentModel::create([
            'user_id' => auth()->id(),
            'amount' => 19000,
            'proof_path' => $path,
            'status' => 'pending',
        ]);

        $this->existingPayment = PaymentModel::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->latest()
            ->first();

        session()->flash('success', 'Bukti pembayaran berhasil diunggah. Mohon tunggu verifikasi Admin.');
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.member.payment');
    }
}
