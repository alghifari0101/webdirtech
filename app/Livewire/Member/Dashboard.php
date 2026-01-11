<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

/**
 * Member Dashboard component.
 */
final class Dashboard extends Component
{
    public function render(): View
    {
        \Illuminate\Support\Facades\Gate::authorize('member');
        return view('livewire.member.dashboard')->title('Dashboard Member');
    }
}
