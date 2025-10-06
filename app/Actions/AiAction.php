<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

final class AiAction
{
    public function execute(string $prompt): string
    {
        $response = Http::withToken(config('services.openai.token'))
            ->post(config('services.openai.url') . '/chat/completions', [
                'model' => 'gpt-4.1-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
            ])->json('choices.0.message.content');

        return $response;
    }
}
