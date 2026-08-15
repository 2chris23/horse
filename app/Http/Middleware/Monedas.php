<?php

namespace App\Http\Middleware;

use App\Model\Moneda;
use Closure;

class Monedas
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


        $w = [
            //'monedas' => $request->hasCookie('monedas'),
            'moneda' => $request->hasCookie('moneda'),
            'currency' => $request->hasCookie('currency'),

        ];
        $t = true;
        foreach ($w as $k => $v) {
            if ($v == false) {
                $t = false;
                break;
            }
        }
        $Monedas = \Session::get('monedas');
        if (empty($Monedas)) {
            /*AJUSTE DE MONEDAS*/
            $t = Moneda::select('nombre', 'simbolo', 'small', 'valor')->where('status', 1)->get()->toArray();
            \Session::put('monedas', $t);
            \Session::set('monedas', $t);
        }
        if ($t == true) {
            return $next($request);
        }


        $Coins = \Session::get('moneda');
        if (empty($Coins)) {
            $fa = \Session::get('currency');
            if (!empty($fa)) {
                //\Session::put('moneda', $fa);
                //\Session::set('moneda', $fa);
                $fa = strtoupper($fa);
                $t = Moneda::select('simbolo')->where(['simbolo' => $fa, 'status' => 1])->first();
                if (!empty($t)) {
                    $t = $t->simbolo;
                    \Session::put('moneda', $t);
                    \Session::set('moneda', $t);
                    \Session::set('currency', $t);

                } else {
                    \Session::put('moneda', 'EUR');
                    \Session::set('moneda', 'EUR');
                    \Session::set('currency', 'EUR');
                }
            } else {
                \Session::put('moneda', 'EUR');
                \Session::set('moneda', 'EUR');
                \Session::set('currency', 'EUR');
            }
        }
        $response = $next($request);

        foreach ($w as $k => $v) {
            if ($v == false) {

                \Session::put('moneda', 'EUR');
                \Session::set('moneda', 'EUR');
                if (!is_array($v)) {
                    $response->withCookie($k, \Session::get($k));
                }
            }
        }
        $response->withCookie('moneda', \Session::get('moneda'));
        return $response;
    }


}
