<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$routes = app('router')->getRoutes();
foreach ($routes as $route) {
    if (strpos($route->uri(), 'provincia') !== false) {
        echo "URI: " . $route->uri() . " | Name: " . $route->getName() . " | Action: " . $route->getActionName() . "\n";
    }
}
