<?php

namespace App\Http\Middleware;

use App\Models\Country;
use Closure;
use Illuminate\Support\Facades\App;
use function strlen;

class Colo
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

        $w = [
            'espana' => $request->hasCookie('espana'),
            'moneda' => $request->hasCookie('moneda'),
            'currency' => $request->hasCookie('moneda'),
            'pais_id' => $request->hasCookie('pais_id'),
            'timezone' => $request->hasCookie('timezone'),
        ];
        $t = true;
        foreach ($w as $k => $v) {
            if ($v == false) {
                $t = false;
                break;
            }
        }

        if (isset($_SERVER['HTTP_HOST'])) {
            //spain
            $hos = $_SERVER['HTTP_HOST'];
            $h = explode('.', $hos);
            $lng = strlen($h[0]);
            if ($lng == 2) {
                if (strtolower($h[0]) == strtolower('co')) {
                    $spa = 1;
                }
            }
            if ($lng == 8) {
                if (strtolower($h[0]) == strtolower('colombia')) {
                    $spa = 1;
                }
            }
        }
        $response = $next($request);


        if ($spa == 0) {
            \Session::put('colombia', false);
            \Session::set('colombia', false);
            return $response->withCookie('colombia', false);


        } else {
            $pais = Country::Corto('CO')->first();
            $lng = 'es';
            $spa = 1;
            \Session::put('colombia', true);
            \Session::set('colombia', true);

            $response->withCookie('colombia', \Session::get('colombia'));
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
                $pais->setTimezone('America/Bogota')->push();
            }
            //date_default_timezone_set($pais->timezone);
        }


        return $response->withCookie('colombia', \Session::get('colombia'));


    }

}
