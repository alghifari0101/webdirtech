<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Ask;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;

/**
 * Admin Dashboard component.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 2.3 (Strict Type Hinting).
 */
final class Dashboard extends Component
{
    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.admin')]
    public function render(): View
    {
        $stats = [
            'total_asks' => Ask::count(),
            'vps_requests' => 12, // Placeholder for future feature
            'website_projects' => 8, // Placeholder for future feature
            'active_clients' => 24, // Placeholder for future feature
        ];

        $recent_asks = Ask::latest()->take(5)->get();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recent_asks' => $recent_asks,
        ])->title('Admin Dashboard');
    }
}
