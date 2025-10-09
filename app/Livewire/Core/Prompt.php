<?php

namespace App\Livewire\Core;

use App\Actions\AiContentAction;
use App\Actions\AiImageAction;
use App\Actions\PromptContentAction;
use App\Actions\PromptImageAction;
use App\Models\Genre;
use App\Models\Prompt as ModelsPrompt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Prompt extends Component
{
    #[Validate('required|string|max:255')]
    public string $prompt = '';

    #[Validate('required|array|min:1')]
    public array $selected_genres = [];

    public array $book_genres = [];

    public ?string $response = null;


    public function mount(): void
    {
        $this->book_genres = Genre::all()->toArray();
    }


    /**
     * Handle an incoming registration request.
     */
    public function submit()
    {
        // validate the request
        $this->validate();
        $genres_names = collect($this->book_genres)
            ->whereIn('id', $this->selected_genres)
            ->pluck('name')
            ->toArray();

        // generate the prompt
        $current_prompt = (new PromptContentAction)->execute(
            prompt: $this->prompt,
            selected_genres: $genres_names,
        );

        // call the AI cintent service
        $this->response = null;
        $this->response = (new AiContentAction)->execute($current_prompt);

        // call the AI image service
        $prompt_image = (new PromptImageAction)->execute(
            content: $this->response,
            selected_genres: $genres_names,
        );

        $image = (new AiImageAction)->execute(prompt: $prompt_image);

        $pdf = Pdf::loadView('pdf.book', [
            'content' => $this->response,
            'image' => $image
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'mi-libro.pdf');

        ModelsPrompt::create([
            'user_id' => Auth::id(),
            'prompt' => $this->prompt,
        ]);
        $this->prompt = '';
    }
}
