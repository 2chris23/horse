<?php
echo "=== OPCACHE STATUS ===\n";
if (function_exists('opcache_get_status')) {
    $s = opcache_get_status(false);
    echo "Enabled: " . ($s['opcache_enabled'] ? 'YES' : 'NO') . "\n";
    echo "Cached scripts: " . $s['opcache_statistics']['num_cached_scripts'] . "\n";
    echo "Hits: " . $s['opcache_statistics']['hits'] . "\n";
    echo "validate_timestamps: " . (ini_get('opcache.validate_timestamps') ? 'YES' : 'NO') . "\n";
} else {
    echo "opcache_get_status NOT available\n";
}

echo "\n=== CLEARING OPCACHE ===\n";
if (function_exists('opcache_reset')) {
    $result = opcache_reset();
    echo "opcache_reset: " . ($result ? 'SUCCESS - cache cleared!' : 'FAILED') . "\n";
} else {
    echo "opcache_reset NOT available\n";
}

echo "\n=== VERIFY WEB.PHP ON DISK ===\n";
$webphp = __DIR__.'/../routes/web.php';
echo "Modified: " . date('Y-m-d H:i:s', filemtime($webphp)) . "\n";
echo "First 15 lines:\n";
$lines = file($webphp);
for ($i = 0; $i < min(15, count($lines)); $i++) {
    echo ($i+1) . ": " . $lines[$i];
}

echo "\n=== VERIFY INDEX.PHP ON DISK ===\n";
$indexphp = __DIR__.'/index.php';
echo "Modified: " . date('Y-m-d H:i:s', filemtime($indexphp)) . "\n";
$lines2 = file($indexphp);
for ($i = 0; $i < min(8, count($lines2)); $i++) {
    echo ($i+1) . ": " . $lines2[$i];
}
