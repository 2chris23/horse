<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$routes = app('router')->getRoutes();
foreach ($routes as $route) {
    if ($route->getName() === 'cliente.state.ajax') {
        $action = $route->getAction();
        if (isset($action['uses']) && $action['uses'] instanceof \Closure) {
            $ref = new \ReflectionFunction($action['uses']);
            echo "Closure in file: " . $ref->getFileName() . " line " . $ref->getStartLine() . "\n";
        } else {
            echo "Action is not a closure. Action is: " . $route->getActionName() . "\n";
            // Check if there is any reflection hint in the route
            $refClass = new \ReflectionClass(get_class($route));
            echo "Route class: " . get_class($route) . "\n";
            // Is it possible to find where the route was defined? No.
        }
    }
}
