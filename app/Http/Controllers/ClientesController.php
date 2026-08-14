<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use function flash;
use function redirect;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ClientesYeguada()
    {
        $columns = [
            /*
                    0 => "nombre"
        1 => "alias"
        2 => "correo"
        3 => "telefono"
        4 => "nota"
        5 => "facebook"
        6 => "twitter"
        7 => "instagram"
        8 => "pinterest"
        9 => "web"
        10 => "direccion"
        11 => "city"
        12 => "country_id"
        13 => "state_id"
        14 => "categoria"
        15 => "studs_id"
        16 => "users_id"

            */
            //'id' => '#',
            'categoria' => trans('users.categoria'), //icono SI HAY SUBCATERGORIA CON FLOTANTE
            'nombre' => trans('users.contact'),
            'country_id' => trans('users.country_'),
            'state_id' => trans('users.state'),
            'telefono' => trans('users.phones'),
            'correo' => trans('clientes.attrib.email'),
            'web' => trans('stud.ClienteWeb'),
            //'subcat' => trans('users.subcategoria'),
            'nota' => trans('users.nota'),

            /*
            1 => "alias"
        3 => "telefono"
        4 => "nota"
        5 => "facebook"
        6 => "twitter"
        7 => "instagram"
        8 => "pinterest"
        9 => "web"
        10 => "direccion"
        11 => "city"
        14 => "categoria"
        15 => "studs_id"
        16 => "users_id"
    */

            //'phone' => trans('users.phones'),
            /*falta telefono*/

            //'url' => trans('clientes.attrib.url'),

            //'site' => trans('clientes.attrib.site'),

            //'type' => trans('clientes.attrib.type'),
            //'created_by' =>trans('clientes.attrib.created_by'),
            //'updated_by' =>trans('clientes.attrib.updated_by'),
            //'deleted_by' => trans('clientes.attrib.deleted_by'),
            //'country_id'=>trans('clientes.attrib.country_id'),
            //'state_id'=>trans('clientes.attrib.state_id'),
            //'city'=>trans('clientes.attrib.city'),
            //'address' => trans('clientes.attrib.address'),
        ];
        //$clientes = Cliente::where(['type'=>1,'studs_id'=>\Auth::user()->Yeguada()->id])->get();
        $user = \Auth::user();
        $stud = $user->Yeguada();
        $clientes = $stud->contacto()->get();

        return view('backend.content.Clientes.index', compact('clientes', 'columns'));
    }

    public function ClientesEditarYeguada($id = null)
    {


        $cliente = Contacto::where(['id' => $id, 'studs_id' => \Auth::user()->Yeguada()->id])->first();

        /*Retornar a index con error*/
        if (empty($cliente)) {
            return redirect()->route('StudClientes.crear');
        }
        return view('backend.content.Clientes.create', compact('cliente'));
    }

    public function ClientesCrearYeguada()
    {
        $cliente = new Contacto();

        /*Retornar a index con error*/

        return view('backend.content.Clientes.create', compact('cliente'));
    }

    public function ClientesGuardarYeguada(Request $r)
    {
        //dd($r->all());
        /*
            'name',
            'url',
            'site',
            'type',
            'email',
            'studs_id',

            'country_id',
            'stud',
            'state_id',
            'city',
            'address',
        */
        //dd($r);
        //dd($r->all());
        $pp = Functions::RetornoArrayTelefono($r);
        //dd($pp);
        $tel = [];
        if (count($pp) != 0) {
            foreach ($pp as $k => $v) {
                $t = [];
                $t['tel'] = $v['n'];
                $t['ext'] = $v['e'];
                $t['con'] = $v['c'];
                if (!empty($v['n'])) {
                    array_push($tel, $t);
                }
            }
        }
        //dd(json_encode($tel));
        //dd($pp);//3
        //dd($tel);//3
        $user = \Auth::user();
        $stud = $user->Yeguada();
        if (empty($r->cliente_id)) {
            $cliente = new Contacto(['users_id' => $user->id, 'studs_id' => $stud->id]);
        } else {
            $cliente = Contacto::where(['id' => $r->cliente_id, 'studs_id' => $stud->id])->first();
            if (empty($cliente)) {
                $cliente = new Contacto(['users_id' => $user->id, 'studs_id' => $stud->id]);
            }
        }
        $nota = (str_replace('  ', ' ', Functions::LimpiarTexto($r->nota)));
        $cliente->setNombre($r->name)->setCorreo($r->email)->setCountryId($r->country)->setStateId($r->state)->
        setCity($r->city)->setDireccion($r->address)->setFacebook($r->facebook)->
        setTwitter($r->twitter)->setInstagram($r->instagram)->setPinterest($r->pinterest)->setTelefono($tel)->
        setNota($nota)->setCategoria($r->categoria)->setSubcat($r->subcat)
            ->setWeb($r->web);
//dd($cliente);
        $cliente->push();
        //dd($cliente);
        flash(trans('users.contactoguardado', ['name' => $cliente->getNombre()]))->success();
        //$r = route('StudClientes.edit').'/' . $cliente->id;
        $r = route('StudClientes.index');
        return redirect()->to($r);
//return redirect()->action('ClientesController@ClientesEditarYeguada',[$cliente->id]);
    /*

        return view('backend.content.Clientes.create', compact('cliente'));
        return redirect()->route('StudClientes.index');
        */

    }

    public function BorrarContacto(Request $r)
    {
        $data = $r->all();
        $user = \Auth::user();
        $yeguada = $user->Yeguada();
        $contacto = Contacto::where(['id' => $r->id, 'studs_id' => $yeguada->id])->first();
        if (empty($contacto)) {
            $data['sms'] = trans('users.borrarcontactoerro');
            return redirect()->route('landinghome');
            return Functions::RetornaJson($data);
        }
        $contacto->delete();
        //$data['contacto']=$contacto->toArray();
        $data['status'] = 200;
        return redirect()->route('landinghome');
        return Functions::RetornaJson($data);

    }

    public function EstablecerFavorito(Request $r)
    {
        $data = $r->all();
        $user = \Auth::user();
        $yeguada = $user->Yeguada();
        $contacto = Contacto::where(['id' => $r->id, 'studs_id' => $yeguada->id])->first();
        if (empty($contacto)) {
            $data['sms'] = trans('users.favoritocontactoerro');
            return Functions::RetornaJson($data);
        }
        //$contacto->delete();
        $fav = $contacto->CambiarFavorito()->push();
        //$data['contacto']=$contacto->toArray();
        $data['fav'] = $contacto->getFavorito();
        $data['status'] = 200;
        return Functions::RetornaJson($data);
    }
}

