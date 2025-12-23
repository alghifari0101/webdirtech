<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tentang Kami - Dirtech')]
final class AboutUs extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.about-us')->layoutData([
            'description' => 'Pelajari lebih lanjut tentang Dirtech, partner teknologi Anda dalam menghadirkan solusi infrastruktur digital yang handal dan inovatif.',
        ]);
    }
}
