<?php
// Test 1: Direct internal request to Apache (bypassing Nginx)
// This tells us if Apache or Nginx is generating the redirect

echo "=== TEST: Internal Apache request to /ping ===\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1/ping');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Host: horsesworldsale.com',
    'X-Forwarded-Proto: https',
]);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$result = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo "CURL ERROR: $err\n";
} else {
    // Show only headers
    $parts = explode("\r\n\r\n", $result, 2);
    echo "HEADERS:\n" . $parts[0] . "\n";
    echo "BODY (first 200 chars):\n" . substr($parts[1] ?? '', 0, 200) . "\n";
}

echo "\n=== TEST: Server .htaccess files ===\n";
$dirs = [
    '/var/www/vhosts/horsesworldsale.com/httpdocs',
    '/var/www/vhosts/horsesworldsale.com/httpdocs/public',
    '/var/www/vhosts/horsesworldsale.com',
];
foreach ($dirs as $dir) {
    $htaccess = $dir . '/.htaccess';
    if (file_exists($htaccess)) {
        echo "\nFOUND: $htaccess\n";
        echo file_get_contents($htaccess);
    } else {
        echo "NOT FOUND: $htaccess\n";
    }
}

echo "\n=== TEST: Apache REDIRECT vars ===\n";
foreach ($_SERVER as $k => $v) {
    if (strpos($k, 'REDIRECT') !== false || strpos($k, 'REWRITE') !== false) {
        echo "$k = $v\n";
    }
}
