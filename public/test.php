<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Capture headers at the moment of exit
register_shutdown_function(function() {
    $file = __DIR__.'/../storage/logs/debug-headers.txt';
    $data = "TIME: " . date('Y-m-d H:i:s') . "\n";
    $data .= "HEADERS:\n";
    foreach (headers_list() as $h) {
        $data .= "  $h\n";
    }
    $data .= "OUTPUT BUFFER:\n";
    $data .= ob_get_contents() ?: '(empty)';
    $data .= "\nLAST ERROR:\n";
    $data .= print_r(error_get_last(), true);
    file_put_contents($file, $data);
    
    // Also echo for curl
    echo "\n\n=== SHUTDOWN HANDLER ===\n";
    echo "Headers:\n";
    foreach (headers_list() as $h) {
        echo "  $h\n";
    }
    echo "Last error: " . print_r(error_get_last(), true) . "\n";
});

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

// Create a request that simulates what Nginx sends
$request = \Illuminate\Http\Request::create(
    'https://horsesworldsale.com/ping',
    'GET',
    [],  // query
    [],  // cookies
    [],  // files
    [    // server vars
        'HTTPS' => 'on',
        'SERVER_PORT' => 443,
        'HTTP_HOST' => 'horsesworldsale.com',
        'SERVER_NAME' => 'horsesworldsale.com',
        'REQUEST_URI' => '/ping',
    ]
);

echo "BEFORE HANDLE\n";
$response = $kernel->handle($request);
echo "AFTER HANDLE - Status: " . $response->getStatusCode() . "\n";
echo "Location: " . ($response->headers->get('Location') ?? 'NONE') . "\n";
echo "Body: " . substr($response->getContent(), 0, 500) . "\n";
