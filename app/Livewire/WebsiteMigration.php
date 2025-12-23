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
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => 'Jasa Migrasi Website',
                'description' => 'Layanan migrasi website profesional antar hosting atau domain dengan jaminan keamanan data dan tanpa downtime.',
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Dirtech'
                ]
            ]
        ]);
    }
}
