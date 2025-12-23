<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Ask;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Ask Page component for the knowledge base.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 4.2 (Livewire Security).
 */
final class AskPage extends Component
{
    use WithPagination;

    public string $search = '';

    /**
     * Mount the component and handle path-based pagination/search.
     */
    public function mount(?int $page = null, ?string $search = null): void
    {
        if ($search) {
            $this->search = str_replace('-', ' ', $search);
        }

        if ($page) {
            $this->setPage($page);
        }
    }

    /**
     * Redirect to SEO friendly URL on search submit or change.
     * Note: We use a simple method to call from the UI to avoid infinite redirect loops.
     */
    public function performSearch(): void
    {
        $this->resetPage();
        
        if (empty($this->search)) {
            $this->redirect(route('ask'), navigate: true);
            return;
        }

        $slug = Str::slug($this->search);
        $this->redirect(route('ask.search', ['search' => $slug]), navigate: true);
    }

    /**
     * Reset pagination when searching (Livewire internal).
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        $asks = Ask::query()
            ->when($this->search, function ($query) {
                $query->where('question', 'like', '%' . $this->search . '%')
                      ->orWhere('answer', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10)
            ->onEachSide(1);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $asks->map(function ($ask) {
                return [
                    '@type' => 'Question',
                    'name' => $ask->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => strip_tags(Str::limit($ask->answer, 200))
                    ]
                ];
            })->toArray()
        ];

        return view('livewire.ask-page', [
            'asks' => $asks
        ])->layoutData([
            'title' => 'Pusat Bantuan & FAQ | Dirtech Solutions',
            'description' => 'Temukan jawaban dari berbagai pertanyaan seputar layanan VPS, pembuatan website, dan solusi digital lainnya dari tim Dirtech.',
            'ogType' => 'website',
            'ogImage' => 'img/og-ask.png',
            'schema' => $schema,
            'paginator' => $asks
        ]);
    }
}
