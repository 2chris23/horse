<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$routes = app('router')->getRoutes();
foreach ($routes as $route) {
    if ($route->getName() === null) continue;
    if (strpos($route->getName(), 'state.ajax') !== false) {
        echo "Route name: " . $route->getName() . "\n";
        echo "Action: " . var_export($route->getAction(), true) . "\n\n";
    }
}
