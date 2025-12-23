<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Jasa Pembuatan Website - Dirtech')]
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
        ]);
    }
}
