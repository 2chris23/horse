<?php

namespace App\Http\Middleware;

use Agent;
use App\Http\Controllers\Functions;
use App\Http\Controllers\PublicController;
use App\Model\Country;
use App\Model\Moneda;
use Closure;
use Illuminate\Support\Facades\App;
use function strlen;

class Language
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

//dd($request);
        $w = [
            'moneda' => $request->hasCookie('moneda'),
            'currency' => $request->hasCookie('moneda'),
            'timezone' => $request->hasCookie('timezone'),
            //'lat' => $request->hasCookie('lat'),
            //'lng' => $request->hasCookie('lng'),
            'applocale' => $request->hasCookie('applocale'),
        ];
        $t = true;

        foreach ($w as $k => $v) {
            if ($v == false) {
                $t = false;
                break;
            }
        }
        /*
        if ($t == true) {
            $response = $next($request);

            foreach ($w as $k => $v) {
                $time = $request->cookie($k);
                //echo "$time <br>";
                \Config::set($k, $time);
                \Session::set($k, $time);
                if ($k == 'timezone') {
                    \Config::set('app.' . $k, $time);
                    \Session::set('app.' . $k, $time);
                }
            }
            //dd($w);

            $lng = App::getLocale();

            cookie()->forever('applocale', $lng);
            cookie()->forever('lang', $lng);

            $response->withCookie('applocale', $lng);
            $response->withCookie('lang', $lng);
            return $response;
        }
        */


        $robot = Agent::isRobot();
        $LangNav = Agent::languages();
        //dd($fa);
        if ($robot == true) {
            $base = Country::where('shortname', 'ES')->first();
            $tas = "Europe/Madrid";
            if (!empty($base->id)) {
                \Session::put('moneda', $base->currency);

                \Session::set('moneda', $base->currency);
                \Session::put('currency', $base->currency);

                \Session::set('currency', $base->currency);

                if (empty($base->timezone)) {
                    $base->timezone = "Europe/Madrid";
                } else {
                    $tas = $base->timezone;
                }
                \Session::set('timezone', $base->timezone);

                \Session::put('timezone', $base->timezone);
                //\Session::put('timezone_h',$base->timezone_h);
                \Session::put('lat', $base->lat);

                \Session::put('lng', $base->lng);
                \Session::set('lat', $base->lat);
                \Session::set('lng', $base->lng);

                cookie()->forever('moneda', $base->currency);
                cookie()->forever('currency', $base->currency);
                cookie()->forever('timezone', $base->timezone);
                //cookie()->forever('lat', $base->lat);
                //cookie()->forever('lng', $base->lng);
            }
        }


        $k = ($request->hasCookie('lang'));

        /*
        if($k == true){
            return $next($request);
        }
        */

        $cm = ($request->hasCookie('moneda'));
        $cc = ($request->hasCookie('currency'));
        $ct = ($request->hasCookie('timezone'));
        //$cl1 = ($request->hasCookie('lat'));
        //$cl2 = ($request->hasCookie('lng'));

        $pa = \Session::get($request->cookie('timezone'));
        if ($ct != true) {
            $pa = \Session::get('timezone');
        }


        if (empty($pa)) {
            $fa = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
            (new Functions())->GetTimeZoneIp($fa);
            (new Functions())->setCookies();

        }

        $lng = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        $prefo = null;
        if (isset($_SERVER['REQUEST_URI'])) {
            $hos = $_SERVER['REQUEST_URI'];
            $h = explode('/', $hos);
            if (isset($h[1])) {
                $lngs = strlen($h[1]);

                if ($lngs == 2) {
                    $f = false;

                    for ($i = 0; $i < count($lng); $i++) {
                        if (!isset($lng[$i])) {
                            break;
                        }

                        if ($f == true) {
                            break;
                        }
                        $fa = strtolower($lng[$i]);
                        $fe = strtolower($h[1]);
                        $prefo = ($fe === $fa) ? $fe : null;
                        if (!empty($prefo)) {
                            App::setLocale($prefo);
                            \Session::put('lang', $prefo);
                            \Session::put('applocale', $prefo);
                            \Session::set('lang', $prefo);
                            \Session::set('applocale', $prefo);
                            (new Functions())->setCookies();
                            break;
                        }
                    }
                }
            }
        }
        $lng = (new PublicController())->EstablecerLenguaje($request);
        App::setLocale($lng);
        \Session::set('lang', $lng);
        \Session::set('applocale', $lng);


        $fa = \Session::get('moneda');
        $te = 'EUR';
        if (!empty($fa)) {
            $ta = Moneda::where(['status' => 1, 'small' => $fa])->first();
            if (empty($ta)) {
                \Session::put('moneda', $te);
                \Session::put('currency', $te);
                \Session::set('moneda', $te);
                \Session::set('currency', $te);
            }

        }


        $response = $next($request);
        foreach ($w as $k => $v) {
            if ($v == false) {
                $response->withCookie($k, \Session::get($k));
            }
        }
        return $response;

        return $next($request);

    }

}
