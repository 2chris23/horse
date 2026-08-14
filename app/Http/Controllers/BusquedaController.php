<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Stud;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    protected $paginacion;

    /**
     * BusquedaController constructor.
     * @param $paginacion
     */
    public function __construct()
    {
        $this->paginacion = 1;
    }

    //https://laraveles.com/introduccion-a-laravel-scout/
    //https://laravel-news.com/tntsearch-with-laravel-scout
    public function BuscarPais(Request $r)
    {

        $f[0] = url('landing/images/slider/1/2.jpg');
        $f[1] = url('landing/images/slider/1/6.jpg');
        $f[2] = url('landing/images/slider/1/9.jpg');
        $f[3] = url('landing/images/slider/1/8.jpg');
        $imagen = $f[rand(0, 2)]; //Imagenes al azar
        $paginacion = $this->paginacion;

        //$st = Stud::where('')
        $texto = $r->texto;
        $raza = $r->seleccion;

        //->paginate();
        //dd($raza);
        if (!empty($texto)) {
            if($raza != 0){
                $horses = Horse::search($texto)->where('raza', $raza)->where('publish', 1)->get();
            }else{
                $horses = Horse::search($texto)->where('publish', 1);
            }

        } elseif ($raza != 0) {

            $horses = Horse::where(['raza' => $raza, 'publish' => 1]);
        } else {
            $horses = Horse::where('id', '!=', 0)->where('publish', 1);
        }


//dd($r);

        if (empty($orden)) {
            $horses = $horses->orderby('id', 'desc');

        } else {
            $orden = strtolower($orden);
            if ($orden == 'edad') {
                $horses = $horses->orderby('birthdate', 'desc');
            } elseif ($orden == 'precio') {
                $horses = $horses->orderby('price', 'desc');
            } elseif ($orden == 'capa') {
                $horses = $horses->orderby('color', 'desc');
            } elseif ($orden == 'alzada') {
                $horses = $horses->orderby('raised', 'desc');
            }

        }

        $horses = $horses->paginate($paginacion);
        $sal['lastPage'] = $horses->lastPage();
        $sal['pagination'] = $paginacion;
        $sal['currentPage'] = $horses->currentPage();

        if ($r->ajax()) {
            return $horses;
            $sal['status'] = 200;
            $sal['el'] = view('portal.listas.partials.horse', ['horses' => $horses])->render();
            return Functions::RetornaJson($sal);
        }
        //dd($horses);
        //$horses = $horses->paginate(25);

        return view('portal.listas.listing-5', compact('horses', 'orden', 'raza', 'imagen'));
    }
}

