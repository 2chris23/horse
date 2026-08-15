<?php

namespace App\Http\Middleware;


use Closure;
use function strlen;

class Pre
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
        $pre = 0;

        if (isset($_SERVER['HTTP_HOST'])) {
            $hos = $_SERVER['HTTP_HOST'];
            $h = explode('.', $hos);
            $lng = strlen($h[0]);
            if ($lng == 3) {

                if (strtolower($h[0]) == strtolower('pre')) {

                    $pre = 1;
                }

            }
        }
        $response = $next($request);

        if ($pre == 0) {
            \Session::put('pre', false);
            \Session::set('pre', false);
            $response = $next($request);
            return $response->withCookie('pre', false);
        } else {

            \Session::put('pre', true);
            \Session::set('pre', true);
            return $response->withCookie('pre', true);
        }


        return $response;

    }

}
