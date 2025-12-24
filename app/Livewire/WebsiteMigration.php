<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * Website Migration service page component.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 2.3 (Strict Type Hinting).
 */
#[Title('Jasa Migrasi Website Profesional - Dirtech')]
final class WebsiteMigration extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.website-migration')->layoutData([
            'description' => 'Jasa pindah hosting dan migrasi website profesional. Aman, cepat, dan tanpa downtime. Kami bantu pindahkan data, database, dan email Anda dengan sempurna.',
            'ogImage' => 'img/og-migration.png',
                'schema' => [
                    [
                        '@context' => 'https://schema.org',
                        '@type' => 'Service',
                        'name' => 'Jasa Migrasi Website',
                        'description' => 'Layanan migrasi website profesional antar hosting atau domain dengan jaminan keamanan data dan tanpa downtime.',
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
                                'name' => 'Apakah ada downtime saat proses migrasi website?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Kami menjamin Zero Downtime. Website Anda tetap akan bisa diakses secara normal oleh pengunjung selama proses pemindahan data berlangsung.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Apakah data email juga ikut dipindahkan?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Ya, kami melayani migrasi akun email beserta seluruh riwayat pesannya, asalkan server tujuan mendukung protokol IMAP.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Berapa lama proses propagasi DNS berlangsung?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Propagasi DNS biasanya berlangsung antara 1 hingga 24 jam. Namun, kami melakukan optimasi pada TTL DNS agar prosesnya bisa berjalan lebih cepat.'
                                ]
                            ]
                        ]
                    ]
                ]
        ]);
    }
}
