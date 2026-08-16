<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Force HTTPS detection when behind proxy or on production domain
if (
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    (isset($_SERVER['HTTP_HOST']) && str_contains($_SERVER['HTTP_HOST'], 'horsesworldsale.com')) ||
    (isset($_SERVER['SERVER_NAME']) && str_contains($_SERVER['SERVER_NAME'], 'horsesworldsale.com'))
) {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

if (isset($_SERVER['REQUEST_URI']) && str_contains($_SERVER['REQUEST_URI'], 'ping')) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== LARAVEL PIPELINE TRACE FOR /ping ===\n";
    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $request = Request::capture();

    $response = $app->handleRequest($request);
    echo "Response Status: " . $response->getStatusCode() . "\n";
    echo "Target Location: " . ($response->headers->get('Location') ?? 'none') . "\n";
    echo "Content Preview: " . substr($response->getContent(), 0, 300) . "\n";
    exit;
}


// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());




