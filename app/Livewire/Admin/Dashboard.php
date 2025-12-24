<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Post;
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
            'total_posts' => Post::count(),
            'vps_requests' => 12, // Placeholder
            'website_projects' => 8, // Placeholder
            'active_clients' => 24, // Placeholder
        ];

        $recent_posts = Post::latest()->take(5)->get();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recent_posts' => $recent_posts,
        ])->title('Admin Dashboard');
    }
}
