<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

final class AiImageAction
{
    public function execute(string $prompt): string
    {
        $response = Http::timeout(180)->withToken(config('services.openai.token'))
            ->post(config('services.openai.url') . '/images/generations', [
                'model' => 'gpt-image-1',
                'prompt' => $prompt,
                'size' => '1536x1024',
                'quality' => 'high',
                'background' => 'transparent'
            ])->json('data.0.b64_json');

        return $response;
    }
}
