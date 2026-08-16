<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
$_SERVER['HTTP_X_FORWARDED_SSL'] = 'on';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();

$path = trim($request->getPathInfo(), '/');

if ($path === '' || $path === '/') {
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $kernel->bootstrap();
    $app->instance('request', $request);
    \Illuminate\Support\Facades\Request::swap($request);
    
    $controller = new \App\Http\Controllers\PortalController();
    $view = $controller->index($request);
    if ($view instanceof \Illuminate\Contracts\View\View) {
        echo $view->render();
    } else {
        echo $view;
    }
    exit;
}

if ($path === 'login' && $request->isMethod('get')) {
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    $kernel->bootstrap();
    $app->instance('request', $request);
    \Illuminate\Support\Facades\Request::swap($request);
    $errors = new \Illuminate\Support\ViewErrorBag();
    \Illuminate\Support\Facades\View::share('errors', $errors);
    echo view('auth.login', ['errors' => $errors])->render();
    exit;
}



$app->handleRequest($request);
