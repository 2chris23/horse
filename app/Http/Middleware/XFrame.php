<?php

namespace App\Http\Middleware;

use Closure;

class XFrame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Header always set X-Frame-Options SAMEORIGIN
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST');
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $next($request);
    }
}
