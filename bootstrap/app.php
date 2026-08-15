<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // Cargar TODOS los archivos de rutas con el namespace de controladores
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/admin.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/publicas.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/user.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'Compresion' => \App\Http\Middleware\Compresion::class,
            'CompresionMax' => \App\Http\Middleware\CompresionMax::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
