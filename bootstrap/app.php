<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::namespace('App\Http\Controllers')
                ->group(base_path('routes/administrador.php'));
            Route::namespace('App\Http\Controllers')
                ->group(base_path('routes/asociado.php'));
            Route::namespace('App\Http\Controllers')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(
            at: '*',
            headers: \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR |
                     \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST |
                     \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT |
                     \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO |
                     \Illuminate\Http\Request::HEADER_X_FORWARDED_PREFIX |
                     \Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB
        );

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
