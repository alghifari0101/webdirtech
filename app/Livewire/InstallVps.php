<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jasa Install VPS, Setting & Setup Server Profesional - Dirtech')]
final class InstallVps extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.install-vps')->layoutData([
            'description' => 'Jasa install VPS, jasa setting VPS, dan jasa setup VPS profesional. Kami bantu konfigurasi server Anda agar aman, cepat, dan stabil untuk berbagai kebutuhan bisnis.',
                'schema' => [
                    [
                        '@context' => 'https://schema.org',
                        '@type' => 'Service',
                        'name' => 'Jasa Install VPS',
                        'description' => 'Layanan instalasi dan konfigurasi VPS profesional termasuk setup OS, Web Server, dan keamanan.',
                        'provider' => [
                            '@type' => 'Organization',
                            'name' => 'Dirtech'
                        ]
                    ],
                    [
                        '@context' => 'https://schema.org',
                        '@type' => 'FAQPage',
                        'mainEntity' => [
                            [
                                '@type' => 'Question',
                                'name' => 'Berapa lama proses pengerjaan jasa install VPS?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Proses pengerjaan biasanya berkisar antara 1 hingga 3 jam, tergantung pada kompleksitas konfigurasi yang Anda pesan.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Apakah saya akan mendapatkan akses root penuh?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Tentu saja, setelah pengerjaan selesai, kami akan menyerahkan detail akses login root sepenuhnya kepada Anda.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Control panel apa yang direkomendasikan untuk VPS?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Kami merekomendasikan CyberPanel, aaPanel, atau cPanel, disesuaikan dengan anggaran dan kebutuhan teknis website Anda.'
                                ]
                            ]
                        ]
                    ]
                ]
        ]);
    }
}
