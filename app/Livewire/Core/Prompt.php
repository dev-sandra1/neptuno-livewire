<?php

namespace App\Livewire\Core;

use App\Actions\AiAction;
use App\Models\Prompt as ModelsPrompt;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Prompt extends Component
{
    #[Validate('required|string|max:255')]
    public string $prompt = '';
    public ?string $response = null;

    /**
     * Handle an incoming registration request.
     */
    public function submit(): void
    {
        $this->validate();
        $this->response = null;
        $this->response = (new AiAction)->execute($this->prompt);
        ModelsPrompt::create([
            'user_id' => auth()->id(),
            'prompt' => $this->prompt,
        ]);
        $this->prompt = '';
    }
}
