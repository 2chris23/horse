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
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/admin1.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/admin2.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/administrador.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/asociado.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/cliente.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/comun.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/portal.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/ticket.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'Compresion' => \App\Http\Middleware\Compresion::class,
            'CompresionMax' => \App\Http\Middleware\CompresionMax::class,
            'XFrame' => \App\Http\Middleware\XFrame::class,
            'Autentificado' => \App\Http\Middleware\Authenticate::class,
            'Admin' => \App\Http\Middleware\Admin::class,
            'Firstlog' => \App\Http\Middleware\Firstlog::class,
            'Asociado' => \App\Http\Middleware\AsociadoMiddleware::class,
            'StudPaid' => \App\Http\Middleware\StudPaid::class,
            'Expira' => \App\Http\Middleware\ExpirationTime::class,
            'TimeZone' => \App\Http\Middleware\TimeZone::class,

            /**** LaravelLocalization Middlewares ****/
            'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
