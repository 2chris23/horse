<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Fuerza que todas las URLs generadas y redirecciones usen https,
     * incluso cuando la app esta detras de un proxy (Plesk/nginx) que
     * termina SSL y no propaga correctamente el esquema https.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Asegura que el request sea tratado como https para que
        // redirect('/') y route() generen URLs https (evita loops
        // de redireccion http <-> https en Plesk).
        if (! $request->isSecure() && $this->shouldForceHttps($request)) {
            $request->server->set('HTTPS', 'on');
            $request->server->set('SERVER_PORT', 443);
        }

        \Illuminate\Support\Facades\URL::forceScheme('https');

        return $next($request);
    }

    protected function shouldForceHttps(Request $request): bool
    {
        // En local/CLI no forzamos https.
        if ($request->is('up')) {
            return false;
        }

        return true;
    }
}
