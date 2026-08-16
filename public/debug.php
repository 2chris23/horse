<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

echo "<h1>HWS DIRECT VIEW TEST (portal.landing)</h1><pre>";

require __DIR__ . '/../vendor/autoload.php';

// Force HTTPS
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$request = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');
$app->instance('request', $request);
\Illuminate\Support\Facades\Request::swap($request);
\Illuminate\Support\Facades\URL::setRequest($request);

set_error_handler(function($severity, $message, $file, $line) {
    echo "\n[PHP ERROR ($severity)]: $message in $file:$line\n";
});

set_exception_handler(function(\Throwable $e) {
    echo "\n[UNCAUGHT EXCEPTION]: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n" . $e->getTraceAsString() . "\n";
});

try {
    $kernel->bootstrap();
    echo "Step 1: Kernel bootstrapped successfully!\n";
} catch (\Throwable $e) {

    echo "FATAL EXCEPTION DURING KERNEL BOOTSTRAP:\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (Line " . $e->getLine() . ")\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
    exit;
}


try {
    $horses = \App\Models\Horse::VentaPublica()->orderby('id', 'desc')->take(18)->get();
    echo "Step 2: Database query for horses successful! Count: " . count($horses) . "\n";
} catch (\Throwable $e) {
    echo "Step 2 FAILED (Database query): " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
}

try {
    echo "Step 3: Rendering portal.landing view...\n";
    $html = view('portal.landing', compact('horses'))->render();
    echo "Step 3 SUCCESS! Rendered " . strlen($html) . " bytes of HTML!\n\n";
    echo "</pre><hr><h2>RENDERED HTML PREVIEW:</h2>" . $html;
    exit;
} catch (\Throwable $e) {
    echo "\n=== FATAL ERROR RENDERING BLADE VIEW ===\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " (Line " . $e->getLine() . ")\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n</pre>";
    exit;
}



