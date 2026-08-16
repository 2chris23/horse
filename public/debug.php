<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

echo "<h1>HWS ROUTE & VIEW TEST (login & panel)</h1><pre>";

require __DIR__ . '/../vendor/autoload.php';

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['HTTP_X_FORWARDED_SSL'] = 'on';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$kernel->bootstrap();

echo "Step 1: Kernel Bootstrapped!\n";

echo "\n--- TESTING /login ROUTE MATCH ---\n";
try {
    $loginReq = \Illuminate\Http\Request::create('https://horsesworldsale.com/login', 'GET');
    $router = $app->make(\Illuminate\Routing\Router::class);
    $matchedRoute = $router->getRoutes()->match($loginReq);
    echo "Matched URI: " . $matchedRoute->uri() . "\n";
    echo "Matched Name: " . ($matchedRoute->getName() ?? 'none') . "\n";
    echo "Matched Action: " . $matchedRoute->getActionName() . "\n";
    echo "Matched Middleware: " . implode(', ', $matchedRoute->gatherMiddleware()) . "\n";
} catch (\Throwable $e) {
    echo "ERROR MATCHING /login: " . $e->getMessage() . "\n";
}

echo "\n--- TESTING auth.login VIEW RENDER ---\n";
try {
    $viewHtml = view('auth.login')->render();
    echo "SUCCESS: auth.login view rendered (" . strlen($viewHtml) . " bytes)\n";
} catch (\Throwable $e) {
    echo "ERROR RENDERING auth.login: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "\n--- TESTING /panel/caballo ROUTE MATCH ---\n";
try {
    $panelReq = \Illuminate\Http\Request::create('https://horsesworldsale.com/panel/caballo', 'GET');
    $matchedRoute2 = $router->getRoutes()->match($panelReq);
    echo "Matched URI: " . $matchedRoute2->uri() . "\n";
    echo "Matched Name: " . ($matchedRoute2->getName() ?? 'none') . "\n";
    echo "Matched Action: " . $matchedRoute2->getActionName() . "\n";
    echo "Matched Middleware: " . implode(', ', $matchedRoute2->gatherMiddleware()) . "\n";
} catch (\Throwable $e) {
    echo "ERROR MATCHING /panel/caballo: " . $e->getMessage() . "\n";
}
