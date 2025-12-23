<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jasa Install VPS - Dirtech')]
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
            'description' => 'Jasa install dan konfigurasi VPS profesional. Optimalkan performa server Anda dengan setup OS, Web Server, Control Panel, dan keamanan terbaik.',
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => 'Jasa Install VPS',
                'description' => 'Layanan instalasi dan konfigurasi VPS profesional termasuk setup OS, Web Server, dan keamanan.',
                'provider' => [
                    '@type' => 'Organization',
                    'name' => 'Dirtech'
                ]
            ]
        ]);
    }
}
