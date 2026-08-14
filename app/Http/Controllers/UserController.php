<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$users = User::where('id', '!=', 0)->paginate();
        $users = User::where('id', '!=', 0)->get();
        return view('backend.content.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = new User();
        $personal = new Personal();
        return view('backend.content.user.create', compact('user', 'personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        //
        $user = \Auth::user();
        $admin = $user->isAdm();
        $personal = Personal::where('email', $user->email)->first();
        $personal = $user->Personal();
        if ($admin == true) {
            return view('admin.adminprofile', compact('user', 'personal'));
        } else {

            return view('backend.content.user.profile', compact('user', 'personal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CambioPsw(Request $r)
    {
        $u = \Auth::user();
        $npass = $r->npsw;
        $rnpass = $r->rnpsw;
        $pass = $r->psw;
        if (empty($pass)) {
            $sal['sms'] = "No puedes ingresar una contraseña vacia";
            return Functions::RetornaJson($sal);
        }
        if (empty($npass)) {
            $sal['sms'] = "No puedes ingresar una contraseña vacia";
            return Functions::RetornaJson($sal);
        }
        if (empty($rnpass)) {
            $sal['sms'] = "Debes repetir la contraseña";
            return Functions::RetornaJson($sal);
        }
        if ($npass != $rnpass) {
            $sal['sms'] = "Las contraseñas no coinciden";
            return Functions::RetornaJson($sal);

        }
        if (!empty($pass)) {
            $v = Functions::CheckHashedPass($pass, $u->password);
            //$v Functions::CheckHashedPass($psw,\Auth::user()->password);
            //$v = true;
            //$v = true;
            if ($v == false) {
                //$sal['psw'] = $pass;
                //$sal['cnt'] = $v;
                $sal['sms'] = "La contraseña que ingresaste no es correcta";
                return Functions::RetornaJson($sal);
            }
        }
        $u->setPassword($npass)->push();
        //return Functions::RetornaJson($u->toArray());
        $sal['sms'] = "Se ha actualizado tu contraseña";
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);

        return Functions::RetornaJson($r->all());
    }

    public function profileupdate(Request $request)
    {
        //
        $passlng = 3;
        $data = $request->all();

        $confirm = $data['confirm'];
        $u = \Auth::user();
        $first = $u->firstt;
        $per = $u->Personal();

        if (isset($data['email'])) {
            $f = null;
            $g = $f;

            $email = $data['email'];
            $password = $data['password'];

            /*Comprarar contraseñas*/

            if (!empty($confirm) and $first != 0) {
                $v = Functions::CheckHashedPass($confirm, \Auth::user()->getPassword());
                if ($v == false) {
                    $sal['sms'] = "La contraseña que ingresaste no es correcta";
                    return Functions::RetornaJson($sal);
                }
            } elseif ($first == 0) {
                if ($confirm != $password) {
                    $sal['sms'] = "Las contraseñas no coinciden";
                    return Functions::RetornaJson($sal);
                }
            } elseif ($first != 0) {
                $sal['sms'] = "Debes ingresar tu contraseña para confirmar los cambios";
                return Functions::RetornaJson($sal);
            }

            /*Verificar datos en tabla usuario*/
            if (!empty($email) and $first != 0) {
                $v = Functions::ComprobarCorreo($email);
                if ($v == false) {
                    $sal['sms'] = "El correo no es valido";
                    return Functions::RetornaJson($sal);
                } else {
                    $email = Functions::LimpiarCorreo($email);
                }

                if (strlen($password) < $passlng) {
                    $sal['sms'] = "La contraseña es menor a $passlng caracteres";
                    return Functions::RetornaJson($sal);
                }

            }
            if (!empty($email) and !empty($password)) {
                //$f = User::where('email', $email)->where('id', '!=', $u->id)->first();
                //$g = Personal::where('email', $email)->where('users_id', '!=', $u->id)->first();
                $e = 0;
                if (!empty($f)) $e = 1;
                if (!empty($g)) $e = 1;

                //$f = Personal::where('email', $email)->where('id', '!=', $u->id)->first();
                if ($e == 0) {
                    //$u->setEmail($email);
                    $u->setPassword($password)->push();
                    $sal['sms'] = "Datos de inicio han sido modifiados";
                    $sal['sms'] = "Contraseña modificada";
                    $sal['status'] = 200;
                } else {
                    $sal['sms'] = "El correo ya se encuentra registrado";
                }
                return Functions::RetornaJson($sal);
            } elseif ($first == 0) {
                $u->setPassword($password)->push();

            }
        }
        /*Verificar datos en tabla personal*/
        //return Functions::RetornaJson($request->all());
        if (isset($data['pemail'])) {
            $pemail = $data['pemail'];
            $phone = $data['phone'];
            $phone_ext = $data['phoneext'];
            $phone_cod = $data['phonecon'];
            //form.append('phone',$.serializeArray(phone));

            //$phone = explode(',',$phone);
            if (!empty($pemail)) {
                $v = Functions::ComprobarCorreo($pemail);
                if ($v == false) {
                    $sal['sms'] = "El correo de contacto no es valido<br>" . Functions::LimpiarCorreo($pemail);
                    return Functions::RetornaJson($sal);
                } else {
                    $pemail = Functions::LimpiarCorreo($pemail);
                }
            }
            /*Telefono es requerido*/
            /*
             * if (strlen($phone) < 8) {

                $sal['sms'] = "El numero de contacto no es valido";
                return Functions::RetornaJson($sal);
            }
            */
            $e = Personal::where('email', $pemail)->where('id', '!=', $per->id)->first();

            if (!empty($pemail) and empty($e)) {

                $u->setPhone($phone)->setExt($phone_ext)->setCountryCode($phone_cod)->setFirstt(1)->push();
                $per->
                setName($data['name'])->
                setPostal($data["postal"])->
                setEmail($pemail)->
                //setPhone($data["phone"])->
                setCity($data["city"])->
                setState($data["state"])->
                setCountry($data["country"])->
                setAddress($data["address"])->
                push();
                //return Functions::RetornaJson($per->toArray());
                /*
                foreach ($phone as $k=>$v){
                    $per->setPhone(Functions::RetornaNumero($v));
                }
                */

                $sal['sms'] = "Los datos de contacto han sido actualizados";
                $sal['status'] = 200;
                $sal['persona'] = $per;
                return Functions::RetornaJson($sal);

            }
        }
        $sal['sms'] = "Revisa que los datos esten correctos";
        return Functions::RetornaJson($sal);
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
        return view('backend.content.user.index');
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
        $user = User::find($id);
        $email = $user->email;
        $personal = Personal::where('email', $email)->first();
        return view('backend.content.user.create', compact('user', 'personal'));
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

    public function listusers()
    {
        $s = [
            'id' => 'Id',
            'email' => trans('users.attrib.email'),
            'password' => trans('users.attrib.password'),
            'type' => trans('users.attrib.type'),
            'created_by' => trans('users.attrib.created_by'),
            'updated_by' => trans('users.attrib.updated_by'),
            'deleted_by' => trans('users.attrib.deleted_by'),
        ];
        $d = User::where('id', '!=', 0)->get();
        $sal = [
            'columns' => $s,
            'rows' => $d,
        ];
        return json_encode($sal);
    }

    public function getinfo(Request $r)
    {
        $id = $r->id;
        $user = User::find($id);
        $sal = [
            'personaltittle' => trans('personal.text.create_title'),
            'personalsubtittle' => trans('personal.text.create_subtitle'),

            'usertittle' => trans('users.text.create_title'),
            'usersubtittle' => trans('users.text.create_title'),
            'userlabelemail' => trans('users.text.email'),
            'userlabelpassword' => trans('users.text.password'),
            'userlabeltype' => trans('users.text.type'),

            'personallabelname' => trans('personal.text.name'),
            'personallabelcountry' => trans('personal.text.country'),
            'personallabellastname' => trans('personal.text.lastname'),
            'personallabelstate' => trans('personal.text.state'),
            'personallabelcity' => trans('personal.text.city'),
            'personallabelphone' => trans('personal.text.phone'),

            'userplaceemail' => trans('users.placeholder.email'),
            'userplacetype' => trans('users.placeholder.type'),
            'userplacepassword' => trans('users.placeholder.password'),
            'personalplacename' => trans('personal.placeholder.name'),
            'personalplacelastname' => trans('personal.placeholder.lastname'),
            'personalplacecountry' => trans('personal.placeholder.country'),
            'personalplacestate' => trans('personal.placeholder.state'),
            'personalplacecity' => trans('personal.placeholder.city'),
            'personalplacephone' => trans('personal.placeholder.phone'),
        ];
        if (empty($user)) return json_encode($sal);
        $personal = Personal::where('email', $user->email)->first();
        $sal = [
            'personaltittle' => trans('personal.text.create_title'),
            'personalsubtittle' => trans('personal.text.create_subtitle'),

            'usertittle' => trans('users.text.create_title'),
            'usersubtittle' => trans('users.text.create_title'),
            'userlabelemail' => trans('users.text.email'),
            'userlabelpassword' => trans('users.text.password'),
            'userlabeltype' => trans('users.text.type'),

            'personallabelname' => trans('personal.text.name'),
            'personallabelcountry' => trans('personal.text.country'),
            'personallabellastname' => trans('personal.text.lastname'),
            'personallabelstate' => trans('personal.text.state'),
            'personallabelcity' => trans('personal.text.city'),
            'personallabelphone' => trans('personal.text.phone'),

            'userplaceemail' => trans('users.placeholder.email'),
            'userplacetype' => trans('users.placeholder.type'),
            'userplacepassword' => trans('users.placeholder.password'),
            'personalplacename' => trans('personal.placeholder.name'),
            'personalplacelastname' => trans('personal.placeholder.lastname'),
            'personalplacecountry' => trans('personal.placeholder.country'),
            'personalplacestate' => trans('personal.placeholder.state'),
            'personalplacecity' => trans('personal.placeholder.city'),
            'personalplacephone' => trans('personal.placeholder.phone'),


            'useremail' => $user->email,
            'userpassword' => '',
            'usertype' => $user->type,
            'personalname' => $personal->name,
            'personallastname' => $personal->lastname,
            'personalcountry' => $personal->country,
            'personalstate' => $personal->state,
            'personalcity' => $personal->city,
            'personalphone' => $personal->phone,
        ];

        return json_encode($sal);
    }
}

