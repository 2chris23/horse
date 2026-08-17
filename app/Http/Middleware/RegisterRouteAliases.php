<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterRouteAliases
{
    /**
     * Laravel 13 clavea el RouteCollection por metodo+URI, por lo que no se
     * pueden registrar dos rutas con la misma URI y distinto nombre (la segunda
     * sobrescribe a la primera). Para conservar los nombres de ruta que usaba
     * la app original, enlazamos esos nombres (como alias) al objeto Route ya
     * registrado. Este middleware corre despues del boot completo de la app,
     * cuando el RouteCollection ya tiene todas las rutas y tras cualquier
     * refreshNameLookups().
     */
    public function handle(Request $request, Closure $next): Response
    {
        static::register();

        return $next($request);
    }

    /**
     * Enlaza los nombres de ruta heredados de Laravel 5 al objeto Route ya
     * registrado. Se invoca desde el pipeline HTTP y desde comandos que
     * generan URLs (p.ej. hws:test-all), siempre con el boot completo.
     */
    public static function register(): void
    {
        $routes = app('router')->getRoutes();

        $known = method_exists($routes, 'getRoutesByName') ? $routes->getRoutesByName() : [];

        $map = [
            'MyPage'            => 'MyPageBase',
            'MyGallery2config'  => 'MyGallery2post',
            'MySellHorse'       => 'MySellDetailSell',
            'MyHorses_1'        => 'MyHorsesV1',
            'MyWorking'         => 'TrabajoIndex',
            'MyWorkingPost'     => 'TrabajoIndexPost',
        ];

        $clones = [];
        foreach ($map as $source => $alias) {
            if (isset($known[$source]) && ! isset($known[$alias])) {
                $clone = clone $known[$source];
                $clone->name($alias);
                $clones[$alias] = $clone;
            }
        }

        if ($clones) {
            $reflection = new \ReflectionClass($routes);

            $nameProperty = $reflection->getProperty('nameList');
            $nameProperty->setAccessible(true);
            $names = $nameProperty->getValue($routes);
            foreach ($clones as $alias => $clone) {
                $names[$alias] = $clone;
            }
            $nameProperty->setValue($routes, $names);

            $allProperty = $reflection->getProperty('allRoutes');
            $allProperty->setAccessible(true);
            $all = $allProperty->getValue($routes);
            foreach ($clones as $alias => $clone) {
                $all['hws_alias|' . $alias] = $clone;
            }
            $allProperty->setValue($routes, $all);
        }
    }
}