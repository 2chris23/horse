<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use function flash;


class Firstlog
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = $this->auth->user();
        $url = route('landinghome') . "#register";


        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                $request->session()->flash('message', trans('text.nologin'));
                //return redirect()->route('login');s
                return redirect($url);
            }
        }


        if (empty($user)) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $request->session()->flash('message', trans('text.nologin'));
                //return redirect()->route('login');
                return redirect($url);
            }
        }

        if ($user->isAdm()) {
            return $next($request);
        }
        if ($user->Asociado()) {
            return $next($request);
        }
        if ($user->firstt == 0) {
            if ($request->ajax()) {
                return $next($request);
                //return response('Unauthorized.', 401);
            } else {
                //$ss = "Necesitamos que completes tus datos de contacto mediante el siguiente <a href=\"" . route('user.profile') . "\">enlace</a>";
                $ss = trans('users.avlo', ['link' => route('user.profile')]);

                flash($ss)->warning();
                //$request->session()->flash('message', trans('text.nologin'));
                return $next($request);
                return redirect()->route('user.profile');
            }
        }

        return $next($request);

    }
}
