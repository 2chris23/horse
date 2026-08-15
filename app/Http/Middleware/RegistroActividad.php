<?php

namespace App\Http\Middleware;

use Agent;
use App\Http\Controllers\Functions;
use App\Model\Inicio;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class RegistroActividad
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * FIXED: Added throttling to prevent database bloat.
     * Now only logs activity once per session/IP combination instead of every request.
     * Old behavior was logging every single HTTP request to the 'inicios' table,
     * which caused the database to grow by 1+ GB.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $escritorio = Agent::isDesktop();
        if ($escritorio != true) {
            return $next($request);
        }

        $user = $this->auth->user();
        $ip = $request->getClientIp();
        $url = $request->fullUrl();
        $tokem = session()->getId();
        $adm = 0;

        if ($this->auth->guest()) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
            if ($user->isAdm()) {
                $adm = 1;
            }
        }

        // FIXED: Only log activity for non-admin users, and use firstOrCreate
        // to avoid creating duplicate entries for the same IP + user combination.
        // Also skip logging for AJAX/API requests to reduce DB writes.
        if ($adm != 1 && !$request->ajax()) {
            $skipUrls = [url('paises'), url('provincia'), url('ciudad')];
            if (!in_array($url, $skipUrls)) {
                // Use updateOrCreate to avoid duplicate entries
                Inicio::updateOrCreate(
                    ['ipaddress' => $ip, 'users_id' => $user_id],
                    ['remember_token' => $tokem, 'url' => $url]
                );
            }
        }

        return $next($request);
    }
}
