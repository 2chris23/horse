<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/', 'GET', [], [], [], [
    'HTTP_HOST' => 'app.horsesworldsale.com',
]);

$response = $kernel->handle($request);

echo $response->getContent();

$kernel->terminate($request, $response);
