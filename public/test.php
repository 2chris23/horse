<?php
// NO Laravel - solo lectura de archivos
echo "=== WEB.PHP en servidor ===\n";
$lines = file(__DIR__.'/../routes/web.php');
echo "Total lineas: " . count($lines) . "\n";
for ($i = 0; $i < 15; $i++) {
    if (isset($lines[$i])) echo ($i+1) . ": " . $lines[$i];
}

echo "\n=== FIRSTLOG MIDDLEWARE ===\n";
$f = __DIR__.'/../app/Http/Middleware/Firstlog.php';
if (file_exists($f)) echo file_get_contents($f);
else echo "No existe\n";

echo "\n=== AUTHENTICATE MIDDLEWARE ===\n";
$f2 = __DIR__.'/../app/Http/Middleware/Authenticate.php';
if (file_exists($f2)) echo file_get_contents($f2);
else echo "No existe\n";

echo "\n=== TODOS LOS PROVIDERS ===\n";
$providerDir = __DIR__.'/../app/Providers/';
foreach (glob($providerDir . '*.php') as $p) {
    echo "\n--- " . basename($p) . " ---\n";
    echo file_get_contents($p);
}
