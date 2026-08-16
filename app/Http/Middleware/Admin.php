<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use function redirect;

class Admin
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

        if ($this->auth->guest() || empty($user)) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $request->session()->flash('message', trans('text.nologin'));
                return redirect()->route('login');
            }
        }


        if ($user->type != 0) {
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
