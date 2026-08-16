<?php

// Complete error and diagnostic console for HorsesWorldSale
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');
http_response_code(200);

echo "====================================================\n";
echo "       HORSES WORLD SALE - SYSTEM DEBUG CONSOLE     \n";
echo "====================================================\n\n";

echo "1. SERVER ENVIRONMENT:\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "HTTPS: " . ($_SERVER['HTTPS'] ?? 'NOT SET') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'NOT SET') . "\n";
echo "SERVER_PORT: " . ($_SERVER['SERVER_PORT'] ?? 'NOT SET') . "\n";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? 'NOT SET') . "\n";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'NOT SET') . "\n\n";

echo "2. TESTING AUTOLOAD & BOOTSTRAP:\n";
try {
    require __DIR__ . '/../vendor/autoload.php';
    echo "[OK] Composer autoload loaded successfully.\n";
} catch (\Throwable $e) {
    die("[FATAL ERROR IN COMPOSER AUTOLOAD]\n" . $e->getMessage() . "\n" . $e->getTraceAsString());
}

try {
    /** @var \Illuminate\Foundation\Application $app */
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->boot();
    echo "[OK] bootstrap/app.php loaded and $app->boot() executed successfully.\n";
} catch (\Throwable $e) {
    die("[FATAL ERROR IN BOOTSTRAP/APP.PHP]\n" . $e->getMessage() . "\n" . $e->getTraceAsString());
}


echo "\n3. TESTING DATABASE CONNECTION:\n";
try {
    $db = $app->make('db');
    $pdo = $db->connection()->getPdo();
    echo "[OK] Database connected! Driver: " . $db->connection()->getDriverName() . " | Database: " . $db->connection()->getDatabaseName() . "\n";
} catch (\Throwable $e) {
    echo "[WARNING - DATABASE ISSUE]\n" . $e->getMessage() . "\n";
}

echo "\n4. TESTING ROUTE RESOLUTION FOR ROOT ('/'):\n";
try {
    $request = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');
    $router = $app->make('router');
    $route = $router->getRoutes()->match($request);
    echo "[OK] Route matched for '/'!\n";
    echo "  - Route Name: " . ($route->getName() ?: 'NONE') . "\n";
    echo "  - Controller Action: " . $route->getActionName() . "\n";
    echo "  - Middlewares: " . json_encode($route->gatherMiddleware()) . "\n";
} catch (\Throwable $e) {
    echo "[ERROR IN ROUTE MATCHING FOR '/']\n" . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
}

echo "\n5. EXECUTING REQUEST THROUGH PIPELINE (SIMULATING ROOT '/'):\n";
try {
    $request = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');
    $response = $app->handleRequest($request);
    
    echo "Response HTTP Status: " . $response->getStatusCode() . "\n";
    echo "Is Redirection? " . ($response->isRedirection() ? 'YES' : 'NO') . "\n";
    if ($response->isRedirection()) {
        echo "--> REDIRECT TARGET LOCATION: " . $response->headers->get('Location') . "\n";
    }
    echo "Content Type: " . $response->headers->get('Content-Type') . "\n";
    echo "Content Length: " . strlen($response->getContent()) . " bytes\n";
    echo "Content Snippet (First 300 chars):\n";
    echo substr(strip_tags($response->getContent()), 0, 300) . "\n";
} catch (\Throwable $e) {
    echo "[FATAL EXCEPTION DURING CONTROLLER EXECUTION]\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (Line " . $e->getLine() . ")\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}

// Remove any Location header that handleRequest might have set in the global header list
header_remove('Location');
http_response_code(200);

echo "\n====================================================\n";
echo "                 DEBUG COMPLETED                    \n";
echo "====================================================\n";

