<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Admin;

use App\Actions\Admin\Asks\UpsertAskAction;
use App\Models\Ask;
use Livewire\Attributes\Validate;
use Livewire\Form;

/**
 * Refactored AskForm object.
 * 
 * Follows Rule 6.5 (Modularity) and delegates logic to Actions.
 */
final class AskForm extends Form
{
    public ?int $id = null;

    #[Validate('required|min:5')]
    public string $question = '';

    #[Validate('required|min:10')]
    public string $answer = '';

    /**
     * Filling form from existing ask.
     * 
     * @param Ask $ask
     * @return void
     */
    public function setAsk(Ask $ask): void
    {
        $this->id = $ask->id;
        $this->question = $ask->question;
        $this->answer = $ask->answer;
    }

    /**
     * Store or update ask using injected action.
     * 
     * @param UpsertAskAction $action
     * @return void
     */
    public function store(UpsertAskAction $action): void
    {
        $this->validate();

        $action->execute([
            'question' => $this->question,
            'answer' => $this->answer,
        ], $this->id);
    }
}
