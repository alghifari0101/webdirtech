<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jasa Bikin CV ATS Friendly Profesional & Cepat - Dirtech')]
final class CreateCvAts extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.create-cv-ats')->layoutData([
            'description' => 'Jasa bikin CV ATS Friendly profesional. Tingkatkan peluang panggilan kerja dengan CV yang lolos sistem ATS dan menarik di mata HRD.',
            'schema' => [
                [
                    '@context' => 'https://schema.org',
                    '@type' => 'Service',
                    'name' => 'Jasa Bikin CV ATS Friendly',
                    'description' => 'Layanan pembuatan CV ATS Friendly profesional untuk meningkatkan peluang lolos seleksi kerja.',
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
                            'name' => 'Apa itu CV ATS Friendly?',
                            'acceptedAnswer' => [
                                '@type' => 'Answer',
                                'text' => 'CV ATS Friendly adalah CV yang didesain khusus agar mudah dibaca oleh sistem Applicant Tracking System (ATS), software yang digunakan perusahaan untuk menyeleksi ribuan lamaran secara otomatis.'
                            ]
                        ],
                        [
                            '@type' => 'Question',
                            'name' => 'Berapa lama proses pembuatan CV?',
                            'acceptedAnswer' => [
                                '@type' => 'Answer',
                                'text' => 'Proses pengerjaan standar kami adalah 1x24 jam. Kami juga menyediakan layanan prioritas/kilat dengan pengerjaan 3-6 jam.'
                            ]
                        ],
                        [
                            '@type' => 'Question',
                            'name' => 'Apakah bisa revisi jika ada kesalahan?',
                            'acceptedAnswer' => [
                                '@type' => 'Answer',
                                'text' => 'Tentu saja. Kami memberikan garansi revisi minor sepuasnya sampai data benar, dan revisi desain/layout maksimal 2 kali.'
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
