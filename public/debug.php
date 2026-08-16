<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=utf-8');

echo "====================================================\n";
echo "       HORSES WORLD SALE - ERRORES DEL SISTEMA      \n";
echo "====================================================\n\n";

$logFile = __DIR__ . '/../storage/logs/laravel.log';

echo "--- 1. ÚLTIMOS ERRORES EN STORAGE/LOGS/LARAVEL.LOG ---\n";
if (file_exists($logFile)) {
    $lines = file($logFile);
    $lastLines = array_slice($lines, -100);
    echo implode("", $lastLines);
} else {
    echo "No existe archivo laravel.log aún o está vacío.\n";
}

echo "\n\n====================================================\n";
echo "--- 2. TEST DIRECTO DE BOOTSTRAP Y BASE DE DATOS ---\n";
echo "====================================================\n";

require __DIR__ . '/../vendor/autoload.php';

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['HTTP_X_FORWARDED_SSL'] = 'on';
$_SERVER['HTTP_HOST'] = 'horsesworldsale.com';

try {
    /** @var \Illuminate\Foundation\Application $app */
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

    $req = \Illuminate\Http\Request::create('https://horsesworldsale.com/', 'GET');
    $app->instance('request', $req);
    \Illuminate\Support\Facades\Request::swap($req);

    $kernel->bootstrap();

    echo "Bootstrap: OK\n";
    $db = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
    echo "Base de datos conectada: $db\n";
    $users = \Illuminate\Support\Facades\DB::table('users')->count();
    echo "Total usuarios en DB: $users\n";

    $admin = \App\Models\User::where('email', 'admin@horse.com')->first();
    if ($admin) {
        echo "Admin encontrado: {$admin->email} (type: {$admin->type})\n";
    } else {
        echo "ALERTA: No existe admin@horse.com en la BD.\n";
    }

} catch (\Throwable $e) {
    echo "ERROR EN BOOTSTRAP / BD:\n";
    echo $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
}

echo "\n\n====================================================\n";
echo "--- 3. TEST DE ACCESO AL PANEL DE ADMINISTRADOR ---\n";
echo "====================================================\n";

try {
    if (isset($admin) && $admin) {
        \Illuminate\Support\Facades\Auth::login($admin);
        echo "Sesión iniciada como admin.\n";

        $testReq = \Illuminate\Http\Request::create('https://horsesworldsale.com/admin/LogAs', 'GET');
        $app->instance('request', $testReq);
        \Illuminate\Support\Facades\Request::swap($testReq);

        $response = $app->handle($testReq);
        echo "Ruta /admin/LogAs - Estado HTTP: " . $response->getStatusCode() . "\n";
        if ($response->getStatusCode() >= 400) {
            echo "Contenido de error:\n" . substr($response->getContent(), 0, 500) . "\n";
        }
    }
} catch (\Throwable $e) {
    echo "ERROR AL CARGAR /admin/LogAs:\n";
    echo $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
}

echo "\n\n====================================================\n";
echo "--- 4. TEST DE ACCESO AL PANEL DE GANADERO (/panel/Caballos) ---\n";
echo "====================================================\n";

try {
    $testReq2 = \Illuminate\Http\Request::create('https://horsesworldsale.com/panel/Caballos', 'GET');
    $app->instance('request', $testReq2);
    \Illuminate\Support\Facades\Request::swap($testReq2);

    $response2 = $app->handle($testReq2);
    echo "Ruta /panel/Caballos - Estado HTTP: " . $response2->getStatusCode() . "\n";
    if ($response2->getStatusCode() >= 400) {
        echo "Contenido de error:\n" . substr($response2->getContent(), 0, 500) . "\n";
    }
} catch (\Throwable $e) {
    echo "ERROR AL CARGAR /panel/Caballos:\n";
    echo $e->getMessage() . " en " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
}

echo "\n--- FIN DEL TEST ---\n";
