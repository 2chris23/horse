<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;


class PlantillasController extends Controller
{
    //
    public function RetornaCssTema()
    {


        $txt = view('backend.content.plantillas.css')->render();
        $s = new PublicController();
        return $s->RetronoCompreso('text/css',$txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');

    }

    public function RetornaJsTema()
    {

        $txt = view('backend.content.plantillas.js')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }

    public function Index()
    {
        $user = \Auth::user();

        $yeguada = $user->Yeguada();

        return view('backend.content.plantillas.index');
    }

    public function Cambiar(Request $r)
    {
        $sal = [];
        $sal['data'] = $r->all();
        $dise = $r->desing;
        $stud = \Auth::user()->Yeguada();

        if ($dise > 8) {
            $dise = $stud->desing;
        } else {
            $dise = $dise * 1;
        }
        $stud = \Auth::user()->Yeguada();
        $stud->desing = $dise;
        $stud->push();
        $sal['pet'] = $r->desing;
        $sal['status'] = 200;
        $sal['desing'] = $stud->desing;
        return Functions::RetornaJson($sal);
    }
}
