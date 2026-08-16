<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
            \Illuminate\Support\Facades\View::share('errors', new \Illuminate\Support\ViewErrorBag());
            \Illuminate\Support\Facades\View::share('etiquetalabel', 'col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right ');
            \Illuminate\Support\Facades\View::share('tiquetainput', 'col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ');
        } catch (\Throwable $e) {
            // Ignore during early bootstrap
        }
        Schema::defaultStringLength(191);

        $router = $this->app->make('router');
        $router->aliasMiddleware('Compresion', \App\Http\Middleware\Compresion::class);
        $router->aliasMiddleware('CompresionMax', \App\Http\Middleware\CompresionMax::class);
        $router->aliasMiddleware('XFrame', \App\Http\Middleware\XFrame::class);
        $router->aliasMiddleware('Autentificado', \App\Http\Middleware\Authenticate::class);
        $router->aliasMiddleware('Admin', \App\Http\Middleware\Admin::class);
        $router->aliasMiddleware('Firstlog', \App\Http\Middleware\Firstlog::class);
        $router->aliasMiddleware('Asociado', \App\Http\Middleware\AsociadoMiddleware::class);
        $router->aliasMiddleware('StudPaid', \App\Http\Middleware\StudPaid::class);
        $router->aliasMiddleware('Expira', \App\Http\Middleware\ExpirationTime::class);
        $router->aliasMiddleware('TimeZone', \App\Http\Middleware\TimeZone::class);
        $router->aliasMiddleware('localize', \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class);
        $router->aliasMiddleware('localizationRedirect', \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class);
        $router->aliasMiddleware('localeSessionRedirect', \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class);
        $router->aliasMiddleware('localeCookieRedirect', \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class);
        $router->aliasMiddleware('localeViewPath', \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class);


        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Funciones', \App\Http\Controllers\Functions::class);
        $loader->alias('Functions', \App\Http\Controllers\Functions::class);
        $loader->alias('Publico', \App\Http\Controllers\PublicController::class);
        $loader->alias('StudController', \App\Http\Controllers\StudController::class);
        $loader->alias('Phone', \App\Models\Directory::class);
        $loader->alias('Directory', \App\Models\Directory::class);
        $loader->alias('Recaptcha', \App\Helpers\Recaptcha::class);
        $loader->alias('Horse', \App\Models\Horse::class);
        $loader->alias('Horses', \App\Models\Horse::class);
        $loader->alias('Stud', \App\Models\Stud::class);
        $loader->alias('Photo', \App\Models\Photo::class);
        $loader->alias('Video', \App\Models\Video::class);
        $loader->alias('Moneda', \App\Models\Moneda::class);
        $loader->alias('Country', \App\Models\Country::class);
        $loader->alias('City', \App\Models\City::class);
        $loader->alias('Color', \App\Models\Color::class);
        $loader->alias('State', \App\Models\State::class);
        $loader->alias('Raza', \App\Models\Raza::class);
        $loader->alias('Sex', \App\Models\Sex::class);
        $loader->alias('BuscarCaballo', \App\Models\BuscarCaballo::class);
        $loader->alias('User', \App\Models\User::class);

        // Auto-alias legacy App\Model\* to App\Models\*
        spl_autoload_register(function ($class) {
            if (str_starts_with($class, 'App\\Model\\')) {
                $modelName = substr($class, strlen('App\\Model\\'));
                $targetClass = 'App\\Models\\' . $modelName;
                if (class_exists($targetClass)) {
                    class_alias($targetClass, $class);
                }
            }
        });
    }
}
