<?php

namespace App\Actions;

final class PromptAction
{
    public function execute(string $prompt, array $selected_genres): string
    {
        $genres = implode(', ', $selected_genres);

        return <<<PROMPT
Crea una historia original basada en el siguiente concepto: "{$prompt}". Los géneros que debe incluir son: {$genres}.
La historia debe ser extensa, como un libro completo, con muchos detalles, capítulos y desarrollo profundo.

Formato obligatorio para el contenido:
- Título principal entre signos de número simples: #Título del libro#
- Subtítulo entre signos de número dobles: ##Subtítulo##
- Prólogo o introducción entre signos de número triples: ###Texto del prólogo o introducción###
- Textos importantes, exaltaciones o frases destacadas entre signos de arroba dobles: @@Texto destacado@@

No devuelvas explicaciones, introducciones, ni notas editoriales. Solo y únicamente la historia completa, sin excusas.
PROMPT;
    }
}
