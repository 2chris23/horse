<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// TEMPORARY DEBUG - remove after diagnosing redirect issue
if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/ping') === 0) {
    header('Content-Type: text/plain');
    echo "=== RAW SERVER VARS FOR /ping ===\n";
    foreach ($_SERVER as $k => $v) {
        if (is_string($v)) echo "$k = $v\n";
    }
    exit;
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Plesk Nginx terminates SSL and proxies to Apache over HTTP.
// Apache/PHP never sees HTTPS, so we must force it here.
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());

