<?php
// NO Laravel boot - pure PHP file reads

echo "=== MAINTENANCE MODE CHECK ===\n";
$maintenance = __DIR__.'/../storage/framework/maintenance.php';
if (file_exists($maintenance)) {
    echo "MAINTENANCE.PHP EXISTS!\n";
    echo file_get_contents($maintenance);
} else {
    echo "maintenance.php: NOT FOUND (good)\n";
}

echo "\n=== ALL FILES IN storage/framework/ ===\n";
$dir = __DIR__.'/../storage/framework/';
foreach (scandir($dir) as $f) {
    if ($f !== '.' && $f !== '..') {
        echo $f . "\n";
    }
}

echo "\n=== CURRENT .env key values ===\n";
$env = __DIR__.'/../.env';
if (file_exists($env)) {
    foreach (file($env) as $line) {
        if (preg_match('/^(APP_URL|APP_ENV|APP_KEY|APP_DEBUG)=/', $line)) {
            echo trim($line) . "\n";
        }
    }
}

echo "\n=== bootstrap/cache/ files ===\n";
$cache = __DIR__.'/../bootstrap/cache/';
foreach (glob($cache . '*') as $f) {
    echo basename($f) . " (" . date('Y-m-d H:i:s', filemtime($f)) . ")\n";
}
