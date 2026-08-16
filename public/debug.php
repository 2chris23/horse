<?php

ini_set('display_errors', '1');

ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');

echo "====================================================\n";
echo "       HORSES WORLD SALE - SYSTEM DEBUG CONSOLE     \n";
echo "====================================================\n\n";

require __DIR__ . '/../vendor/autoload.php';

// Force HTTPS detection
if (
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    (isset($_SERVER['HTTP_HOST']) && str_contains($_SERVER['HTTP_HOST'], 'horsesworldsale.com'))
) {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

$request = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');

try {
    $response = $app->handleRequest($request);
} catch (\Throwable $e) {
    header_remove('Location');
    http_response_code(200);
    echo "=== FATAL EXCEPTION IN LARAVEL ===\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (" . $e->getLine() . ")\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
    exit;
}

header_remove('Location');
http_response_code(200);

echo "1. RESPONSE DETAILS:\n";
echo "HTTP Status Code: " . $response->getStatusCode() . "\n";
echo "Is Redirection? " . ($response->isRedirection() ? 'YES' : 'NO') . "\n";
if ($response->isRedirection()) {
    echo "Target Location Header: " . $response->headers->get('Location') . "\n";
}

echo "\n2. ROUTE MATCHING INFO:\n";
if ($request->route()) {
    echo "Matched Route Name: " . ($request->route()->getName() ?: 'NONE') . "\n";
    echo "Matched Route URI: " . $request->route()->uri() . "\n";
    echo "Controller Action: " . $request->route()->getActionName() . "\n";
    echo "Middlewares Applied: " . json_encode($request->route()->gatherMiddleware()) . "\n";
} else {
    echo "No route was matched directly (likely intercepted before routing by middleware).\n";
}

echo "\n3. CONTENT PREVIEW:\n";
echo substr(strip_tags($response->getContent()), 0, 500) . "\n";

echo "\n====================================================\n";
echo "                 DEBUG COMPLETED                    \n";
echo "====================================================\n";


