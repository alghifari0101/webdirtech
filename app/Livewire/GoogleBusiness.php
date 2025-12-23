<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Google Business service page component.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 2.3 (Strict Type Hinting).
 */
#[Title('Jasa Pembuatan Google Business Profile & Maps - Dirtech')]
final class GoogleBusiness extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.google-business')->layoutData([
            'description' => 'Daftarkan bisnis Anda di Google Maps secara profesional. Jasa pembuatan dan verifikasi Google Business Profile untuk meningkatkan kredibilitas lokal.',
            'ogImage' => 'img/og-gmb.png',
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => 'Jasa Pembuatan Google Business Profile',
                'description' => 'Layanan pendaftaran dan verifikasi profil bisnis Google untuk memunculkan lokasi bisnis di Google Maps.',
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Dirtech'
                ]
            ]
        ]);
    }
}
