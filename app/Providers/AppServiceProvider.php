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
        try {
            \Illuminate\Support\Facades\URL::forceScheme('https');
            \Illuminate\Support\Facades\View::share('errors', new \Illuminate\Support\ViewErrorBag());
        } catch (\Throwable $e) {
            // Ignore during early bootstrap
        }
        Schema::defaultStringLength(191);


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
