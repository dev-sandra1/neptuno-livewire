<?php

namespace App\Actions;

final class PromptImageAction
{
    public function execute(string $content, array $selected_genres): string
    {
        preg_match('/##(.*?)##/', $content, $subtitleMatch);
        $subtitle = isset($subtitleMatch[1]) ? trim($subtitleMatch[1]) : '';
        $genres = implode(', ', $selected_genres);
        $prompt_image = "Ilustración para el libro: '{$subtitle}'. Géneros: {$genres}. Estilo fantasía, portada atractiva.";

        return $prompt_image;
    }
}
