<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Contact Us page component.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 2.3 (Strict Type Hinting).
 */
#[Title('Hubungi Kami - Dirtech')]
final class ContactUs extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.contact-us')->layoutData([
            'description' => 'Hubungi Dirtech untuk konsultasi solusi infrastruktur IT, pembuatan website, dan pendaftaran Google Maps. Kami siap membantu mempercepat pertumbuhan bisnis Anda.',
            'ogImage' => 'img/og-contact.png',
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'name' => 'Kontak Dirtech',
                'description' => 'Halaman kontak resmi Dirtech untuk layanan IT dan konsultasi website.',
                'mainEntity' => [
                    '@type' => 'Organization',
                    'name' => 'Dirtech',
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'contactType' => 'customer support',
                        'email' => 'support@dirtech.web.id'
                    ]
                ]
            ]
        ]);
    }
}
