<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$routes = app('router')->getRoutes();
$names = [];
foreach ($routes as $route) {
    if ($route->getName()) {
        $names[] = $route->getName();
    }
}
file_put_contents('scratch_route_names.txt', implode("\n", $names));
echo "Done! Total named routes: " . count($names) . "\n";
