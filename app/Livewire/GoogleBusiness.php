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
                    [
                        '@context' => 'https://schema.org',
                        '@type' => 'Service',
                        'name' => 'Jasa Pembuatan Google Business Profile',
                        'description' => 'Layanan pendaftaran dan verifikasi profil bisnis Google untuk memunculkan lokasi bisnis di Google Maps.',
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
                                'name' => 'Berapa lama proses verifikasi Google Business Profile berlangsung?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Proses verifikasi oleh Google biasanya membutuhkan waktu 5 hingga 14 hari kerja, tergantung pada metode verifikasi yang tersedia (surat pos, video, atau telepon).'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Apa yang terjadi jika proses verifikasi profil bisnis saya gagal?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Kami akan mendampingi Anda sepenuhnya dalam melakukan proses banding (appeal) atau perbaikan data ke Google hingga profil Anda berhasil terverifikasi dan aktif.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Apakah saya bisa mengatur ulasan atau review pelanggan di Google Maps?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Secara kebijakan, Anda tidak bisa menghapus ulasan negatif secara sepihak. Namun, kami memberikan panduan strategi merespons ulasan untuk menjaga reputasi digital bisnis Anda.'
                                ]
                            ]
                        ]
                    ]
                ]
        ]);
    }
}
