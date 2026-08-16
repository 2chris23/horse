<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';

// Capture any headers set during bootstrap
register_shutdown_function(function() {
    echo "\n--- SHUTDOWN ---\n";
    echo "HEADERS SENT: \n";
    foreach (headers_list() as $h) {
        echo "  $h\n";
    }
});

// Prevent any exit() from killing without output
ob_start();

$app = require_once __DIR__.'/../bootstrap/app.php';

echo "APP BOOTED\n";

// Check if there's a cached config causing issues
$configPath = __DIR__.'/../bootstrap/cache/config.php';
echo "CACHED CONFIG EXISTS: " . (file_exists($configPath) ? 'YES' : 'NO') . "\n";

$routesPath = __DIR__.'/../bootstrap/cache/routes-v7.php';
echo "CACHED ROUTES EXISTS: " . (file_exists($routesPath) ? 'YES' : 'NO') . "\n";

// Check the config value that routes depend on
try {
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    echo "APLICATION HOST CONFIG: " . config('aplication.host') . "\n";
    echo "APP_URL: " . config('app.url') . "\n";
    echo "APP_ENV: " . config('app.env') . "\n";
} catch (\Throwable $e) {
    echo "CONFIG CRASH: " . $e->getMessage() . "\n";
}

$content = ob_get_clean();
echo $content;
