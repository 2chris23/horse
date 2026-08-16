<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

if (isset($_GET['step'])) {
    header('Content-Type: text/plain; charset=utf-8');
    try {
        $step = (int)$_GET['step'];
        if ($step === 1) die("STEP 1: Reached index.php");
        if ($step === 2) {
            $app = require_once __DIR__.'/../bootstrap/app.php';
            die("STEP 2: Bootstrapped app.php successfully!");
        }
        if ($step === 3) {
            $app = require_once __DIR__.'/../bootstrap/app.php';
            $request = Request::capture();
            die("STEP 3: Captured Request successfully! Scheme: " . $request->getScheme() . " Path: " . $request->path() . " FullUrl: " . $request->fullUrl());
        }
        if ($step === 4) {
            $app = require_once __DIR__.'/../bootstrap/app.php';
            $request = Request::capture();
            $router = $app->make('router');
            $route = $router->getRoutes()->match($request);
            die("STEP 4: Matched route: " . ($route->getName() ?: $route->uri()) . "\nAction: " . $route->getActionName() . "\nMiddleware: " . json_encode($route->gatherMiddleware()));
        }
        if ($step === 5) {
            $app = require_once __DIR__.'/../bootstrap/app.php';
            $request = Request::capture();
            $response = $app->handleRequest($request);
            die("STEP 5: handleRequest completed!\nResponse class: " . get_class($response) . "\nStatus: " . $response->getStatusCode() . "\nLocation: " . ($response->headers->get('Location') ?? 'none'));
        }
    } catch (\Throwable $e) {
        die("=== STEP ERROR DETECTED ===\nMessage: " . $e->getMessage() . "\nFile: " . $e->getFile() . ":" . $e->getLine() . "\n\nTrace:\n" . $e->getTraceAsString());
    }
}



// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();

try {
    $response = $app->handleRequest($request);
} catch (\Throwable $e) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== FATAL EXCEPTION IN LARAVEL ===\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (" . $e->getLine() . ")\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
    exit;
}

if ($response->isRedirection() && (isset($_GET['debug']) || isset($_GET['show_redirect']) || isset($_GET['diag']))) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "=== REDIRECT INTERCEPTED ===\n";
    echo "Status Code: " . $response->getStatusCode() . "\n";
    echo "Target Location: " . $response->headers->get('Location') . "\n";
    echo "Current URL: " . $request->fullUrl() . "\n";
    echo "Scheme: " . $request->getScheme() . "\n";
    echo "isSecure: " . ($request->isSecure() ? 'YES' : 'NO') . "\n";
    exit;
}

$response->send();



