<?php

namespace App\Http\Middleware;


use Agent;
use Closure;
use Config;
use Session;


class ExpirationTime
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
        $time = intval($request->input('remember_me_for'));
        $escritorio = Agent::isDesktop();
        if ($escritorio != true) {
            $time = 241920;
            Session::put('cookie_expiration', 241920);
            Config::set('session.lifetime', $time);
            //lifetime
            //dd($time);
        }
        //241920 6 meces en min
        if (isset($time) and $escritorio != true) {

            Session::put('cookie_expiration', $time);
            Config::set('session.lifetime', $time);
            //dd(App::getS)
        }

        return $next($request);
    }
}
