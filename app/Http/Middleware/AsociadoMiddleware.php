<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AsociadoMiddleware
{

    /**
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * admins constructor.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param          $request
     * @param \Closure $next
     *
     * @return \Illuminate\Http\RedirectResponse
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
                //return redirect()->route('login');
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

        if ($user->type != 2) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $request->session()->flash('message', trans('text.nologin'));
                return redirect()->route('landinghome');
                //return redirect()->back();
            }
        }

        return $next($request);

    }


}
