<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;
use Illuminate\Support\Facades\App;
use function strlen;

class Espa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $spa = 0;

        if (isset($_SERVER['HTTP_HOST'])) {
            //spain
            $hos = $_SERVER['HTTP_HOST'];
            $h = explode('.', $hos);
            $lng = strlen($h[0]);
            if ($lng == 2) {
                if (strtolower($h[0]) == strtolower('es')) {
                    $spa = 1;
                }
            }
            if ($lng == 5) {
                if (strtolower($h[0]) == strtolower('spain')) {
                    $spa = 1;
                }
            }
        }


        if ($spa == 0) {
            \Session::put('espana', false);
            \Session::set('espana', false);
            $response = $next($request);
            return $response->withCookie('espana', false);
        } else {
            $pais = Country::Corto('ES')->first();
            $lng = 'es';
            $spa = 1;
            \Session::put('espana', true);
            \Session::set('espana', true);


            $response->withCookie('espana', \Session::get('espana'));
            \Session::put('currency', $pais->currency);
            \Session::set('currency', $pais->currency);
            $response->withCookie('currency', \Session::get('currency'));

            \Session::put('moneda', $pais->currency);
            \Session::set('moneda', $pais->currency);
            $response->withCookie('moneda', \Session::get('moneda'));

            \Session::put('pais_id', $pais->id);
            \Session::set('pais_id', $pais->id);
            $response->withCookie('pais_id', \Session::get('pais_id'));

            App::setLocale($lng);
            \Session::put('lang', $lng);
            \Session::put('applocale', $lng);
            \Session::set('lang', $lng);
            \Session::set('applocale', $lng);
            $response->withCookie('lang', \Session::get('lang'));
            //America/Mexico_City
            if (empty($pais->timezone)) {
                $pais->setTimezone('Europe/Madrid')->push();
            }
            //date_default_timezone_set($pais->timezone);
        }

        $response = $next($request);

        return $response->withCookie('espana', \Session::get('espana'));


    }

}
