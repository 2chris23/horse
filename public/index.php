<?php

if (isset($_GET['diag']) || isset($_GET['debug_diag'])) {
    header('Content-Type: text/plain; charset=utf-8');
    die("DIAG_INDEX_OK - public/index.php reached successfully!\nHTTPS: " . ($_SERVER['HTTPS'] ?? 'none') . "\nHOST: " . ($_SERVER['HTTP_HOST'] ?? 'none') . "\nPORT: " . ($_SERVER['SERVER_PORT'] ?? 'none'));
}

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

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();
$response = $app->handle($request);

if (isset($_GET['show_redirect']) || (isset($_SERVER['REQUEST_URI']) && str_contains($_SERVER['REQUEST_URI'], 'ping'))) {
    if ($response->isRedirection()) {
        header('Content-Type: text/plain; charset=utf-8');
        echo "=== REDIRECT INTERCEPTED ===\n";
        echo "Status Code: " . $response->getStatusCode() . "\n";
        echo "Target Location: " . $response->headers->get('Location') . "\n";
        echo "Current URL: " . $request->fullUrl() . "\n";
        echo "Scheme: " . $request->getScheme() . "\n";
        echo "isSecure: " . ($request->isSecure() ? 'YES' : 'NO') . "\n";
        echo "Matched Route: " . ($request->route() ? $request->route()->getName() . ' (' . $request->route()->uri() . ')' : 'NONE') . "\n";
        exit;
    }
}

$response->send();
$app->terminate($request, $response);


