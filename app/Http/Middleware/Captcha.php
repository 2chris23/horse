<?php

namespace App\Http\Middleware;

use Closure;

class Captcha
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
        $t = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
        dd($t);
        // 'g-recaptcha-response' => 'required|recaptcha',

        return $next($request);
    }
}
