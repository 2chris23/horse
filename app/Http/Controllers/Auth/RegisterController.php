<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions;
use App\Http\Controllers\MailController;
use App\Models\Personal;
use App\Models\Pswtmp;
use App\Models\Stud;
use App\Models\User;
use function flash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Request;
use function str_replace;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // FIXED: Add rate limiting - max 5 registration attempts per hour per IP
        $this->middleware('throttle:5,60')->only('register');
    }

    public function register(Request $request)
    {
        //dd($request->all());

        // FIXED: Honeypot anti-bot check
        // If the hidden 'website' field is filled, it's a bot
        if ($request->filled('website_url')) {
            // Silently reject bot submissions - return success to fool the bot
            flash('Te has registrado exitosamente')->success();
            return redirect()->route('landinghome');
        }

        // FIXED: Time-based anti-bot check
        // If form was submitted in less than 3 seconds, likely a bot
        $formTime = $request->input('_form_time', 0);
        if ($formTime > 0 && (time() - $formTime) < 3) {
            flash('Te has registrado exitosamente')->success();
            return redirect()->route('landinghome');
        }

        $palabrasreservadas = [
            0 => 'admin',
            1 => 'reseting',
            2 => 'password',
            3 => 'login',
            4 => 'register',
            5 => 'panel',
            6 => 'home',
            7 => 'contacto',
            8 => 'Caballoestado',
            9 => 'Raza',
            10 => 'publicidad',
            11 => 'suscripcion',
            12 => 'Caballo',
            13 => 'lista',
            14 => 'Lang',
            15 => 'ciudad',
            16 => 'contacto',
            17 => 'provincia',
            18 => 'addphone',
            19 => 'Validacion',
            20 => 'broadcasting',
            21 => 'detalle',
            22 => 'error',
            23 => 'paises',
            24 => 'tickets',
            25 => 'tickets-comment',
            26 => 'tickets-admin',
            27 => 'tickets',
        ];

        $correo = new MailController();
        // dd($request->all());
        $email = Functions::LimpiarCorreo($request->email);
        $name = Functions::LimpiarTexto($request->name);
        $domain = Functions::LimpiarTexto($request->domain);/*Nombre de la yeguada*/
        $domain = str_replace('/', '-', $domain);/*Nombre de la yeguada*/


        //$password_confirmation = $request->password_confirmation;
        //$password = $request->password;
        $tel = Functions::SoloNumeros($request->tel);

        $sms = null;
        $error['error'] = 0;
        $error['sms'] = null;
        /* if (strlen($password) < 4) { $error['sms'] = "Contraseña menor a 4"; $error['error'] = 1; } */
        if (strlen($name) < 4) {
            $error['sms'] = trans('error.nameinvalid');
            $error['error'] = 1;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }

        if (empty($email)) {
            $error['sms'] = trans('error.emailinvalid');
            $error['error'] = 2;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['sms'] = trans('error.emailinvalid');
            $error['error'] = 2;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        };

        if (strlen($tel) < 4) {
            $error['sms'] = trans('error.phoneinvalid');
            $error['error'] = 3;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }

        if (strlen($domain) < 4) {
            $error['sms'] = trans('error.dominvalid');
            $error['error'] = 4;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }
        //EnviarDatosInicio
        $fg = Stud::where('name', $domain)->first();/*Verificamos que la yeguada no exista*/

        if (!empty($fg)) {
            $error['sms'] = trans('error.existeyeguada');
            $error['error'] = 4;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }
        $t = User::where('email', $email)->first();
        if (!empty($t)) {
            $fg = new MailController();
            $fg->EnviarDatosInicio($t->id);
            $error['sms'] = trans('error.existecorreo');
            //$correo->EnviarDatosInicio($t);
            $error['error'] = 3;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }
        $t = Personal::where('email', $email)->first();

        if (!empty($t)) {
            $error['sms'] = trans('error.existecorreo');
            $error['error'] = 3;
            flash($error['sms'])->error();
            return redirect()->back()->withInput();
        }

        foreach ($palabrasreservadas as $k => $v) {
            if ($v == $domain) {

                $error['sms'] = trans('error.nousarnombre', ['val' => $v]);
                $error['error'] = 4;
                flash($error['sms'])->error();
                return redirect()->back()->withInput();
            }
        }

        if (!empty($error['sms']) or $error['error'] != 0) {
            \Session::flash("flash_message", $error);
            flash($error)->error();
            return redirect()->back()->withInput();
        }



        $u = new User();
        // dd($u);
        // dd($u);
        $password = new Pswtmp();/*tabla temporal para contraseña debe eliminarse al activar*/
        $password->setPwd();
        $psw = $password->getPwd();

        /*Creamos el usuario*/

        $u->setPassword($psw)->setEmail($email)->setType(1)->setPhone($tel)->setDominio($domain)->push();
        $u->setCreatedBy($u->getId())->setUpdatedBy($u->getId())->push();
        $id = $u->getId();
        $password->setUsersId($u->id)->push();/*Creamos una contrasñea temporal*/

        /*Almacenamos los datos en la tabla personal*/
        $p = $u->getPersona();

        $p->setUserId($id)->setName($name)->setEmail($email)->setCreatedBy($id)->setUpdatedBy($id)->push();

        /*Creamos la yeguada basado en el dominio*/
        $stud = $u->Yeguada();
        if (empty($stud)) {
            $stud = new Stud(['users_id' => $u->id]);
        }
        $stud->setName($domain)->push();
        $phonestud = $stud->setPhone($tel)->push();
        $u->setStudsId($stud->id)->push();

        /*se envia correo */
        $correo->EnviarDatosInicio($id);
        flash('Te has registrado exitosamente')->success();
        /*No loguear, redireccionar*/
        //$this->guard()->login($u);/*Proceso completado, se loguea como ese usuario*/
        return redirect()->route('landinghome');
        return redirect($this->redirectPath());
        return $this->registered($request, $u) ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([

            'email' => $data['email'],
            //'password' => bcrypt($data['password']),
            'password' => Hash::make($data['password']),
        ]);
    }
}

