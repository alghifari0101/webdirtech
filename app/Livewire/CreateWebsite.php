<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Jasa Pembuatan Website Profesional & Terpercaya - Dirtech')]
final class CreateWebsite extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.create-website')->layoutData([
            'description' => 'Jasa pembuatan website profesional dan responsif untuk bisnis, UMKM, dan profil perusahaan. Cepat, aman, dan dioptimasi untuk SEO.',
                'schema' => [
                    [
                        '@context' => 'https://schema.org',
                        '@type' => 'Service',
                        'name' => 'Jasa Pembuatan Website',
                        'description' => 'Layanan pembuatan website profesional dan responsif untuk bisnis, UMKM, dan profil perusahaan.',
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
                                'name' => 'Apakah website yang dibuat bisa diedit sendiri?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Ya, kami menggunakan CMS yang user-friendly sehingga Anda dapat dengan mudah mengedit teks, gambar, dan konten lainnya tanpa perlu keahlian koding.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Apakah harga sudah termasuk domain dan hosting?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Ya, untuk paket Landing Page dan Company Profile, harga yang tertera sudah termasuk gratis nama domain (.com) dan hosting selama 1 tahun pertama.'
                                ]
                            ],
                            [
                                '@type' => 'Question',
                                'name' => 'Berapa lama waktu yang dibutuhkan untuk pembuatan website?',
                                'acceptedAnswer' => [
                                    '@type' => 'Answer',
                                    'text' => 'Waktu pengerjaan bervariasi tergantung paket. Landing Page biasanya selesai dalam 3-5 hari kerja, sementara paket yang lebih kompleks seperti Toko Online membutuhkan waktu 7-14 hari kerja.'
                                ]
                            ]
                        ]
                    ]
                ]
        ]);
    }
}
