<?php

$url = "https://cuttingfame.net/e/k55htp1f198yp";

$opts = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0\r\n"
    ]
];

$context = stream_context_create($opts);

$html = file_get_contents($url, false, $context);

// Eliminar scripts de publicidad
$html = preg_replace('/<script[^>]*ads[^>]*>[\s\S]*?<\/script>/i', '', $html);
$html = preg_replace('/<script[^>]*popads[^>]*>[\s\S]*?<\/script>/i', '', $html);
$html = preg_replace('/<script[^>]*doubleclick[^>]*>[\s\S]*?<\/script>/i', '', $html);
$html = preg_replace('/<script[^>]*googlesyndication[^>]*>[\s\S]*?<\/script>/i', '', $html);

// Eliminar URLs de anuncios
$html = preg_replace('/https?:\/\/[^"\']*(doubleclick|ads|banner|popads|taboola|outbrain)[^"\']*/i', '', $html);

// Eliminar iframes de publicidad
$html = preg_replace('/<iframe[^>]*ads[^>]*>[\s\S]*?<\/iframe>/i', '', $html);

// Eliminar overlays molestos
$html = preg_replace('/<div[^>]*overlay[^>]*>[\s\S]*?<\/div>/i', '', $html);

echo $html;
?>
