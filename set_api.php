<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$TOKEN_CORRETO = '21979879082';

$token = $_POST['token'] ?? '';
$url   = $_POST['url'] ?? '';

if ($token !== $TOKEN_CORRETO) {
    http_response_code(403);
    echo json_encode([
        'ok' => false,
        'erro' => 'Token invalido'
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'erro' => 'URL invalida'
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if (!str_ends_with($url, '/api/gerar')) {
    http_response_code(400);
    echo json_encode([
        'ok' => false,
        'erro' => 'A URL precisa terminar com /api/gerar'
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

$data = [
    'ok' => true,
    'url' => $url,
    'updated_at' => date('Y-m-d H:i:s'),
    'source' => 'colab_cloudflare'
];

$ok = file_put_contents(
    __DIR__ . '/api_url.json',
    json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
);

if ($ok === false) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'erro' => 'Nao foi possivel gravar api_url.json'
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

echo json_encode([
    'ok' => true,
    'url' => $url
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
