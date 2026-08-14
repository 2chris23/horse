<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    //

    public function Indice(Request $r){
        $stud = \Auth::user()->Yeguada();
        $sus = $stud->getSubcritiondate();
        /*dd($sus);*/
        return view('backend.content.suscripcion.index');
    }
    public function Planes(Request $r){
        return view('backend.BaseSuscripcion');
    }
    public function Planes1(Request $r){
        $suscripcion = Servicio::Plan()->first();

        return view('backend.BaseSuscripcion44',compact('suscripcion'));
    }
}

