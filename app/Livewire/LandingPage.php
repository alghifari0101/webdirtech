<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dirtech - Solusi Digital Terpadu')]
final class LandingPage extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        return view('livewire.landing-page')->layoutData([
            'description' => 'Partner teknologi terpercaya untuk solusi VPS, Website, dan Digital Marketing bisnis Anda. Dirtech menghadirkan performa terbaik untuk kebutuhan digital Anda.',
            'ogImage' => 'img/og-home.png'
        ]);
    }
}
