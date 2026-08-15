<?php

namespace App\Http\Middleware;

use App\Model\Country;
use Closure;
use Illuminate\Support\Facades\App;
use function strlen;

class Mexico
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
        $mexico = 0;
        $w = [
            'mexico' => $request->hasCookie('mexico'),
            'moneda' => $request->hasCookie('moneda'),
            'currency' => $request->hasCookie('currency'),
            'pais_id' => $request->hasCookie('pais_id'),
            'lang' => $request->hasCookie('lang'),

        ];
        $t = true;
        foreach ($w as $k => $v) {
            if ($v == false) {
                $t = false;
                break;
            }
        }

        if (isset($_SERVER['HTTP_HOST'])) {
            $hos = $_SERVER['HTTP_HOST'];
            $h = explode('.', $hos);
            $lng = strlen($h[0]);
            if ($lng == 2) {
                if (strtolower($h[0]) == strtolower('mx')) {
                    $mexico = 1;
                }
            }
            if ($lng == 6) {
                if (strtolower($h[0]) == strtolower('mexico')) {
                    $mexico = 1;
                }
            }
        }

        $response = $next($request);
        if ($mexico == 0) {
            \Session::put('mexico', false);
            \Session::set('mexico', false);
            return $response->withCookie('mexico', false);
        } else {
            $pais = Country::Corto('MX')->first();
            $lng = 'es';
            $mexico = 1;
            \Session::put('mexico', true);
            \Session::set('mexico', true);
            $response->withCookie('mexico', true);


            \Session::put('moneda', $pais->currency);
            \Session::set('moneda', $pais->currency);
            $response->withCookie('moneda', \Session::get('moneda'));
            \Session::put('currency', $pais->currency);
            \Session::set('currency', $pais->currency);
            $response->withCookie('currency', \Session::get('currency'));

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
                $pais->setTimezone('America/Mexico_City')->push();
            }
            //date_default_timezone_set($pais->timezone);
        }


        return $response->withCookie('mexico', \Session::get('mexico'));

    }

}
