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
        \Illuminate\Support\Facades\URL::forceScheme('https');
        Schema::defaultStringLength(191);
        \Illuminate\Foundation\AliasLoader::getInstance()->alias('Funciones', \App\Http\Controllers\Functions::class);
        \Illuminate\Foundation\AliasLoader::getInstance()->alias('Phone', \App\Models\Directory::class);
        \Illuminate\Foundation\AliasLoader::getInstance()->alias('Directory', \App\Models\Directory::class);
        \Illuminate\Foundation\AliasLoader::getInstance()->alias('Recaptcha', \App\Helpers\Recaptcha::class);

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
