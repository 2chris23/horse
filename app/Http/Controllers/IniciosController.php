<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use function compact;
use Illuminate\Http\Request;

class IniciosController extends Controller
{
    //
    public function ListadoDeIngresos(){
        $columns = [
            'url'=>'Ultima consulta',
            'users_id'=>'Usuario',
            'ipaddress'=>'Ip',
            'updated_at'=>'Ultima conexion',
            'created_at'=>'Creado',
            //'remember_token'
        ];
        $consultas = Inicio::where('users_id','!=',0)->orderby('created_at','asc')->groupby('users_id')->get();
        return view('admin.Inicios.index',compact('consultas','columns'));
    }
}

