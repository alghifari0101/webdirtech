<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Ask;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Ask Detail component for individual questions.
 * 
 * Follows Rule 1.4 (Strict PHP 8.4) and Rule 4.2 (Livewire Security).
 */
final class AskDetail extends Component
{
    public Ask $ask;

    /**
     * Initialize the component.
     * 
     * @param Ask $ask
     * @return void
     */
    public function mount(Ask $ask): void
    {
        $this->ask = $ask;
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    public function render(): View
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [[
                '@type' => 'Question',
                'name' => $this->ask->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($this->ask->ask_answer ?? $this->ask->answer)
                ]
            ]]
        ];

        return view('livewire.ask-detail')->layoutData([
            'title' => $this->ask->question . ' | Dirtech FAQ',
            'description' => Str::limit(strip_tags($this->ask->answer), 160),
            'ogType' => 'article',
            'ogImage' => 'img/og-ask.png',
            'schema' => $schema
        ]);
    }
}
