<?php
// Minimal test: bypass Log::critical, write directly to file
// Also test if ANY route other than /ping also redirects

echo "=== VERIFYING WEB.PHP MODIFICATION TIME ===\n";
echo date('Y-m-d H:i:s', filemtime(__DIR__.'/../routes/web.php')) . "\n";

echo "\n=== RESTARTING OPCACHE (different approach) ===\n";
if (function_exists('opcache_reset')) {
    echo "reset: " . (opcache_reset() ? 'OK' : 'FAIL') . "\n";
}
// Also try to invalidate specific files
$files = [
    __DIR__ . '/index.php',
    __DIR__ . '/../routes/web.php',
    __DIR__ . '/../bootstrap/app.php',
    __DIR__ . '/../app/Providers/AppServiceProvider.php',
];
foreach ($files as $f) {
    if (function_exists('opcache_invalidate')) {
        $ok = opcache_invalidate($f, true);
        echo "invalidate " . basename($f) . ": " . ($ok ? 'OK' : 'FAIL/not-cached') . "\n";
    }
}

echo "\n=== INTERNAL REQUEST TO /ping (same PHP process) ===\n";
// Simulate the request internally
define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['REQUEST_URI'] = '/ping';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['HTTP_HOST'] = 'horsesworldsale.com';
$_SERVER['SERVER_NAME'] = 'horsesworldsale.com';

$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$request = \Illuminate\Http\Request::createFromGlobals();

ob_start();
try {
    $response = $kernel->handle($request);
    echo "STATUS: " . $response->getStatusCode() . "\n";
    echo "LOCATION: " . ($response->headers->get('Location') ?? 'NONE') . "\n";
    echo "BODY(50): " . substr($response->getContent(), 0, 50) . "\n";
} catch (\Throwable $e) {
    echo "EXCEPTION: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
ob_end_clean();
