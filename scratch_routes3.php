<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$routes = app('router')->getRoutes();
foreach ($routes as $route) {
    if ($route->getActionName() === 'App\Http\Controllers\PublicController@Estados') {
        echo "Found route! Name: " . $route->getName() . "\n";
    }
}
