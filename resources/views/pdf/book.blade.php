<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Libro generado por IA</title>
    <style>
            body {
                font-family: 'DejaVu Sans', Arial, Helvetica, sans-serif;
                margin: 0;
                color: #222;
                background: #fff;
            }
            .cover {
                width: 100vw;
                height: 100vh;
                position: relative;
                overflow: hidden;
                margin: 0;
                padding: 0;
                background: #fff;
            }
            .cover img {
                width: 100vw;
                height: 100vh;
                object-fit: cover;
                display: block;
            }
            .cover .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                background: rgba(255,255,255,0.7);
            }
            .cover h1 {
                font-size: 2.8em;
                margin-bottom: 0.5em;
                color: #3a3a3a;
            }
            .cover h2 {
                font-size: 1.5em;
                color: #666;
                margin-bottom: 1em;
            }
            .cover p {
                font-size: 1.1em;
                color: #888;
            }
            h1, h2, h3 {
                color: #2a2a2a;
            }
            h1 {
                font-size: 2em;
                margin-top: 1.5em;
            }
            h2 {
                font-size: 1.3em;
                margin-top: 1em;
            }
            h3 {
                font-size: 1.1em;
                margin-top: 0.8em;
            }
            .highlight {
                background: #ffeeba;
                border-left: 4px solid #ffc107;
                padding: 8px 12px;
                margin: 16px 0;
                font-style: italic;
            }
            .chapter-title {
                font-size: 1.5em;
                margin-top: 2em;
                color: #0056b3;
            }
            .prologue {
                font-size: 1.1em;
                color: #444;
                margin: 1em 0;
                font-style: italic;
            }
            .content {
                margin: 40px;
            }
    </style>
</head>
<body>
    {{-- Portada --}}
    <div class="cover">
        @if(isset($image) && $image)
            <img src="data:image/png;base64,{{ $image }}" alt="Portada" />
        @endif
        <div class="overlay">
            @php
                preg_match('/#(.*?)#/', $content, $titleMatch);
                preg_match('/##(.*?)##/', $content, $subtitleMatch);
                preg_match('/###(.*?)###/', $content, $prologueMatch);
                $title = $titleMatch[1] ?? 'Libro generado por IA';
                $subtitle = $subtitleMatch[1] ?? '';
                $prologue = $prologueMatch[1] ?? '';
            @endphp
            <h1>{{ $title }}</h1>
            @if($subtitle)
                <h2>{{ $subtitle }}</h2>
            @endif
            @if($prologue)
                <p class="prologue">{{ $prologue }}</p>
            @endif
            <p>Generado automáticamente por IA</p>
        </div>
    </div>

    {{-- Contenido principal --}}
    <div class="content">
        @php
            $formatted = $content;
            $formatted = preg_replace('/#(.*?)#/', '<h1>$1</h1>', $formatted);
            $formatted = preg_replace('/##(.*?)##/', '<h2>$1</h2>', $formatted);
            $formatted = preg_replace('/###(.*?)###/', '<h3>$1</h3>', $formatted);
            $formatted = preg_replace('/@@(.*?)@@/', '<div class="highlight">$1</div>', $formatted);
            $formatted = preg_replace('/---/', '<div class="page-break"></div>', $formatted);
            $formatted = str_replace('◀', '<br>', $formatted);
        @endphp
        {!! $formatted !!}
    </div>
</body>
</html>
