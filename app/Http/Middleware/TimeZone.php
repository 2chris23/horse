<?php

namespace App\Http\Middleware;

use App;
use App\Http\Controllers\Functions;
use Closure;
use Config;
use function strtolower;

class TimeZone
{
    /** currency
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //timezone  189.139.216.38


        $w = [
            'timezone' => $request->hasCookie('timezone'),
        ];
        $t = true;
        foreach ($w as $k => $v) {
            if ($v == false) {
                $t = false;
                break;
            }
        }
        if ($t == true) {
            $time = $request->cookie('timezone');
            if (strlen($time) < 40) {
                $t = true;

            } else {
                $t = false;
            }
            return $next($request);
        }
        if ($t == true) {

            $time = $request->cookie('timezone');
            date_default_timezone_set($time);
            \Config::set('app.timezone', $time);
            \Session::set('timezone', $time);
            return $next($request);
        }


        $tas = 'Europe/Madrid';
        $time = \Session::get('timezone');
        if (empty($time)) {
            $tz = (new Functions())->TZ($request);

            if ($tz == "Undefined") {
                $tz = Config::get('app.timezone');
            }
            if (strtolower($tz) == "none") {
                $tz = 'Europe/Madrid';
            }
            if (empty($tz)) {
                $tz = 'Europe/Madrid';
            }
            $time = $tz;;
            try {
                date_default_timezone_set($time);
                \Config::set('app.timezone', $time);
                \Session::set('timezone', $time);
            } catch (\ErrorException $e) {
                date_default_timezone_set($tas);
                \Config::set('app.timezone', $tas);
                \Session::set('timezone', $tas);
            }


        } else {
            if ($time == "Undefined" or empty($time)) {
                $time = Config::get('app.timezone');
            }
            if (empty($time)) {
                $time = 'Europe/Madrid';
            }
            try {

                date_default_timezone_set($time);
                \Config::set('app.timezone', $time);
                \Session::set('timezone', $time);
            } catch (\ErrorException $e) {
                date_default_timezone_set($tas);
                //\Log::critical("Defino ERror el tiempo ");
                \Config::set('app.timezone', $tas);
                \Session::set('timezone', $tas);
            }
        }


        $response = $next($request);
        foreach ($w as $k => $v) {
            if ($v == false) {
                $response->withCookie($k, \Session::get($k));
            }
        }
        return $response;


    }


}
