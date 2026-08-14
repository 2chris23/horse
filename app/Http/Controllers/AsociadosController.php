<?php

namespace App\Http\Controllers;

use App\Models\ControlAsociado;
use Illuminate\Http\Request;
use User;
use function flash;

class AsociadosController extends Controller
{
    //
    public function Index()
    {
        $users = User::where('type', 2)->paginate();
        $columns = [
            'name',
            'email',
            'firstt',
            //'password',
            'type',
            //'created_by',
            //'updated_by',
            //'deleted_by',
            //'remember_token',
            //'domain',
            'validado',
            //'studs_id',
            'active',
            //'subcritiondate',
            //'phone',
            //'ext',
            //'country_code',
        ];
        return view('admin.Asociados.index', compact('users', 'columns'));
    }

    public function Nuevo()
    {
        $user = new User();
        return view('admin.Asociados.create', compact('user'));
    }

    public function Edit(User $user = null)
    {
        if (empty($user)) {
            $user = new User();
        }
        return view('admin.Asociados.create', compact('user'));
    }

    public function Save(Request $r)
    {
        $correo = Functions::LimpiarCorreo($r->email);
        $id = (empty($r->id)) ? 0 : $r->id;

        $data = $r->all();
        $user = new User($r->all());
        $paises = $r->pais;
        $codigo = $r->codigo;
        $activo = $r->active;
        $country = $r->country;
        //dd($data);
//dd($data);
        $nuevo = false;


        $usuario_por_correo = User::where('email', $correo)->first();
        //dd($usuario_por_correo);

        //$usuario_por_Correoid = User::where(['email' => $correo,])->where('id', '!=', $correo)->first();
        //dd($usuario_por_Correoid);
        if (empty($id)) {
            $user_ = $usuario_por_correo;
            if (!empty($user_)) {
                flash("Error, el correo ya esta en uso")->error();
                return view('admin.Asociados.create', compact('user'));

            } else {
                $user = new User($r->all());
                $nuevo = true;
                //dd($user);
            }
        } else {

            $user_ = User::find($id);


            if (empty($user_)) {
                /*Nuevo usuario? o retorno*/
                $user = new User();
                flash("Error, El usuario que intentas modificar no existe")->error();
                return view('admin.Asociados.create', compact('user'));;
            } else {
                if ($correo != $user_->email) {
                    //Aqui para modificar correo
                    $b = User::where('email', $correo)->first();
                    if (!empty($b)) {
                        /*Retorna con error de usuario*/
                        flash("Error, el correo para el usuario " . $user->getName() . "ya esta en uso")->error();
                        return view('admin.Asociados.create', compact('user'));
                    } else {
                        $user = new User($r->all());
                        flash("El usuario ha sido actualizado")->success();
                    }
                } else {

                    $user = $user_;
                    $key = 'password';
                    $d = [];
                    if (isset($data[$key])) {
                        foreach ($data as $v => $vv) {
                            if ($v != $key) {
                                $d[$v] = $vv;
                            }
                        }
                        $data = $d;
                    }

                    $user->fill($data);
                    /*
                    $user->setName($r->name)->setFirstt($r->firstt)
                        ->set
                        */

                }


            }
        }
        if (!empty($user)) {
            /*OK*/
            if (isset($data['password'])) {
                $user->setPassword($data['password']);
            }
            $user->setType(2)->push();
            //SELECT * FROM `control_asociado`;
            $personal = $user->Personal();
            //dd($personal);
            $personal->setCountry($country)->push();

            if ($nuevo == true) {
                $Control = new ControlAsociado();
                $Control->setUser($user);

            } else {
                $Control = ControlAsociado::BuscarAsociado($user)->first();
            }
//dd($data);
            $Control->setCodigo($codigo)->setPaises($paises)->push();

            return view('admin.Asociados.create', compact('user'));
        }

        $data = $r->all();
        dd($data);

    }
}

