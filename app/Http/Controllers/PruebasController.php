<?php

namespace App\Http\Controllers;

use App\Models\Stud;

class PruebasController extends Controller
{
    //

    public function ClientDetail2($id = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de inicio*/

        $data = StudController::getDataStud($id);
        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $galeria = $data['studphoto'];
        $horses = $data['horses'];
        $horsesfav = $data['horsesfav'];

        $studphotoinstalations = $data['studphotoinstalations'];
        $persona = $data['persona'];
        $error = $data['error'];

        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }


        /*
        $user = User::find(1);
        $user = (!empty($id)) ? User::find($id) : new User();
        $user = (!empty($user)) ? $user : new User();
        */

        return view('frontend.landing.studs.modelos.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
    }
}

