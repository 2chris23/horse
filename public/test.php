<?php
// Test que arranca Laravel paso a paso para encontrar donde falla
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "STEP 1: PHP OK\n";
echo "HTTPS=" . ($_SERVER['HTTPS'] ?? 'NOT SET') . "\n";

echo "STEP 2: Loading autoloader...\n";
try {
    require __DIR__.'/../vendor/autoload.php';
    echo "STEP 2: OK\n";
} catch (\Throwable $e) {
    echo "STEP 2 CRASH: " . $e->getMessage() . "\n";
    die();
}

echo "STEP 3: Loading bootstrap/app.php...\n";
try {
    $app = require_once __DIR__.'/../bootstrap/app.php';
    echo "STEP 3: OK\n";
} catch (\Throwable $e) {
    echo "STEP 3 CRASH: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
    die();
}

echo "STEP 4: Making HTTP Kernel...\n";
try {
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    echo "STEP 4: OK\n";
} catch (\Throwable $e) {
    echo "STEP 4 CRASH: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
    die();
}

echo "STEP 5: Handling /ping request...\n";
try {
    $request = \Illuminate\Http\Request::create('/ping', 'GET');
    $request->server->set('HTTPS', 'on');
    $response = $kernel->handle($request);
    echo "STEP 5: OK - Status=" . $response->getStatusCode() . "\n";
    echo "STEP 5: Location=" . ($response->headers->get('Location') ?? 'NONE') . "\n";
    echo "STEP 5: Body=" . substr($response->getContent(), 0, 200) . "\n";
} catch (\Throwable $e) {
    echo "STEP 5 CRASH: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}
