<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\Horse;
use App\Models\Marcaagua;
use App\Models\Personal;
use App\Models\Photo;
use App\Models\Stud;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Storage;
use function array_push;
use function compact;
use function flash;
use function is_numeric;
use function is_object;
use function is_string;
use function rand;
use function redirect;

class StudController extends Controller
{
    //protected $request;
    protected $account;

    /**
     * StudController constructor.
     * @param $request
     */
    public function __construct($account = null)
    {
        //Request $request,
        //$this->request = $request;
        $this->account = $account;
    }

    public static function SetSlugs()
    {
        $d = Stud::wherenull('slug')->get();
        foreach ($d as $k => $v) {
            $v->push();
        }
        $d = Stud::where('slug', '')->get();
        foreach ($d as $k => $v) {
            $v->push();
        }
    }

    Public Static Function LimpiarStudFromUrl($url = '')
    {
        $dom = isset($_SERVER['HTTP_HOST']) ? strtolower($_SERVER['HTTP_HOST']) : 'localhost';
        $st = User::where(['domain' => $dom])->first();
        if (!empty($st)) {
            $stud = $st->Yeguada();
            $slug = $stud ? $stud->slug : '';
            $url = str_replace("?slug=$slug", "", $url);
            $url = str_replace("?stud=$slug", "", $url);
            //$url = str_replace("$slug", "", $url);
        }
        return $url;


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.content.stud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$stud = new \App\Models\Stud();
        $u = \Auth::user();
        $stud = $u->Yeguada();
        if (empty($stud->slug)) $stud->push(); /*Para slug*/
        return view('backend.content.stud.create', compact('stud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function NewStud(Request $request)
    {
        $u = \Auth::user();
        $data = $request;
        $nombre = $data->name;
        $address = $data->address;
        $phone = $data->phone;

        $sal['name'] = "$nombre";
        $sal['address'] = "$address";
        $sal['phone'] = "$phone";
        $sal['status'] = 400;
        $sal['sms'] = 'No haz ingresado al sistema';
        if (empty($u)) {
            return Functions::RetornaJson($sal);
        }
        if (empty($nombre)) {
            $sal['sms'] = 'El nombre no puede estar en blanco';
            return Functions::RetornaJson($sal);
        }
        if (empty($address)) {
            $sal['sms'] = 'La direccion no debe estar vacia';
            return Functions::RetornaJson($sal);
        }
        if (empty($address)) {
            $sal['sms'] = 'Debes colocar un numero de contacto';
            return Functions::RetornaJson($sal);
        }
        $stud = $u->Yeguada();
        if (empty($stud->toArray())) {
            $s = Stud::where('name', $nombre)->first();
            if (!empty($s)) {
                $sal['sms'] = 'El nombre ya existe';
                return Functions::RetornaJson($sal);
            }
            $stud = new Stud();
            $stud->setUsersId($u->id)->setName($nombre)->setAddress($address)->push();
            $sal['status'] = 200;
            $sal['sms'] = 'En hora buena, ya registraste tu yeguada';
            return Functions::RetornaJson($sal);

        } else {
            $sal['sms'] = 'Ya tienes una yeguada registrada';
            return Functions::RetornaJson($sal);
        }
    }

    public function store(Request $request)
    {
        //
        $data = $request->all();

//dd($data);

        $name = (isset($request->name)) ? $request->name : null;
        $email = (isset($data['email'])) ? $data['email'] : null;
        $description = (isset($data['description'])) ? $data['description'] : null;
        $city = (isset($request->city)) ? $request->city : null;
        $state = (isset($request->state)) ? $request->state : null;
        $country = (isset($request->country)) ? $request->country : null;
        $address = (isset($request->address)) ? $request->address : null;
        $video = (isset($data['video'])) ? $data['video'] : null;
        $lat = (isset($request->lat)) ? $request->lat : null;
        $lng = (isset($request->lng)) ? $request->lng : null;

        $u = \Auth::user();
        $stud = $u->Yeguada();
//=(isset($data['']))?$data['']:null;

        if (!empty($name)) $stud->setName($name);

        if (!empty($description)) $stud->setDescription($description);
        if (!empty($city)) $stud->setCity($city);
        if (!empty($country)) $stud->setCountry($country);
        if (!empty($state)) $stud->setState($state);
        if (!empty($address)) $stud->setAddress($address);
        if (!empty($email)) $stud->setEmail($email);

        if (!empty($lat)) $stud->setLat($lat);
        if (!empty($lng)) $stud->setLng($lng);
        if (!empty($stud->getUsersId())) $stud->setUsersId($u->id);

        $stud->push();

        if (!empty($video)) {
            \Auth::user()->setVideo($video);
        }
        if (!empty($request->file('dro_stud'))) {
            $s = new FileController();
            $sd = $s->imagen_logo($request->file('dro_stud'));
        }
        $phones = $stud->getPhoneModel();

        $pdd = Directory::where(['type' => 3, 'tableid' => $stud->id])->orderby('phone', 'desc')->get();
        $lid = "";
        $lnm = '';
        foreach ($pdd as $k => $v) {
            if ($v->phone == $lnm) {
                if ($lnm !== '') {
                    $v->delete();
                }
            } else {
                $lnm = $v->phone;
            }


        }


        $pp = Functions::RetornoArrayTelefono($request);


        //return Functions::RetornaJson($pdd->toArray());

        /*
         * $p = Directory::where([
                    'phone'=>,
                    'tableid'=>,
                    'ext'=>,
                    'ext'=>,
                ])->get();
        */

        foreach ($pp as $k => $v) {
            $id = $v['i'];
            $n = $v['n'];
            if (!empty($n) or $n != 0) {
                if (!empty($id)) {
                    $pd = Directory::find($id);
                    if (Functions::RetornaNumero($n) != 0) {
                        $pd->setPhone($n)->setExt($v['e'])->setCountryCode($v['c'])->push();
                    }


                } else {
                    if (Functions::RetornaNumero($n) != 0) {
                        $stud->getNewPhone()->setPhone($n)->setExt($v['e'])->setCountryCode($v['c'])->push();
                    }

                }
            }
        }
        $pdd = Directory::where(['type' => 3, 'tableid' => $stud->id])->orderby('phone', 'desc')->get();
        $lid = "";
        $lnm = '';
        foreach ($pdd as $k => $v) {
            if ($v->phone == $lnm) {
                if ($lnm !== '') {
                    $v->delete();
                }
            } else {
                $lnm = $v->phone;
            }


        }

//$sal['phones']=$pp;
        //if(!empty($phone3)){ $phone3_ext = $data['phone_ext_3']; $phone3_cc = $data['phone_cc_3']; }


        //      $sal['stud'] = $stud;
//        $sal['pori']=$stud->getPhoneModel();
        //$sal['persona'] = $persona->toJson();

        $sal['status'] = 200;
        $sal['sms'] = 'Salvado Exitoso';
        $sal['mapa'] = $stud->getStaticMap();

        return Functions::RetornaJson($sal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stud $stud
     * @return \Illuminate\Http\Response
     */
    public function show(Stud $stud)
    {
        //
        return view('backend.content.stud.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stud $stud
     * @return \Illuminate\Http\Response
     */
    public function edit(Stud $stud)
    {
        //
        return view('backend.content.stud.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Stud $stud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request = $request;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stud $stud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stud $stud)
    {
        //
    }

    public function ClientDetail($id = null, Stud $stud = null)
    {


        /*Pagina publica de clientes, pagina de inicio*/
        $d = false;
        $data = self::getDataStud($id);
        if (is_numeric($id)) {
            $d = true;
        }

        if (empty($id)) {
            return app(PortalController::class)->index(request());
        }

        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return redirect()->route('portal');
        }

        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $horses = $data['horses'];
        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];


        $studphotoinstalations = $data['studphotoinstalations'];
        $persona = $data['persona'];
        $error = $data['error'];


        /*
        $user = User::find(1);
        $user = (!empty($id)) ? User::find($id) : new User();
        $user = (!empty($user)) ? $user : new User();
        */
        /*desing*/
        $desing = $data['desing'];
        if ($d == true) {
            return redirect()->route('MyPage', ['slug' => $stud->slug]);
        }

        //return view('frontend.landing.v1.inicio', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.inicio', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            }
        }
        return view('frontend.landing.studs.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
    }

    public static function getDataStud($id)
    {
        $ck = null;

        $dom = self::getHost();
        if (!empty($dom)) {
            $id = $dom->Yeguada();

        }

        if (is_object($id)) {
            $r = $id->getUsersId();
            $id = $r;
            $data = StudController::Datos($id);
            $ck = $data;
        }

        if (is_numeric($id)) {
            $user = User::find($id);

            if (!empty($user)) $id = $user->id;
            $data = StudController::Datos($id);
            $ck = $data;

        }

        if (is_string($id)) {
            $stud = Stud::where('slug', $id)->first();
            if (!empty($stud)) {
                $user = $stud->getUsersId();
                $data = StudController::Datos($stud->getUsersId());
                $ck = $data;
            }
        }
        //$data = (is_numeric($id)) ? StudController::Datos($id) : Stud::where('slig', $id)->first();
        //$ck = (!is_string($id)) ? Stud::where('slug', $id)->first() : StudController::Datos($id);

        if (!empty($ck)) {
            $id = $ck['stud']->getUsersId();
            if (empty($ck)) $data = (is_numeric($id)) ? StudController::Datos($id) : null;

        } else {
            $titulo = trans('error.NoFoundStud') . '<br>';
            $mensaje = trans('error.NoFoundStud');
            $terror = 3;
            $error = ['error' => $mensaje, 'error_message' => $titulo . '<br>'];

            //\Session::flash('host', $host);
            //\Session::flash('exception', $exception);
            \Session::flash("flash_message", $error);
            flash($error)->error();
            \Session::flash('Error', $error);
            return null;
            return response()->redirectTo(route('portal'), 301);

        }

        return $data;
    }

    public static function GetHost()
    {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;

        $dom = null;
        if (!empty($host)) {
            $dom = User::where(['domain' => $host])->first();
        }
        return $dom;
    }

    public static function Datos($id = null)
    {
        /*Obtiene los datos necesarios para la pagina del cliente*/
        $sal = [];
        $user = null;
        $user = User::find($id);
        $error = 0;

        if (is_numeric($id)) {
            $user = User::find($id);

        } elseif (is_string($id)) {
            //$user = User::find($id);
        }

        if (empty($user)) {
            $u = Stud::all()->pluck('id');
            //$u = User::all()->pluck('id');
            $t = rand(1, count($u));
            $user = StudController::AzarYeguada($t);
            $user = $user->getUserModel();
            $error = 1;
        }

        //dd($user);
        $sal['user'] = $user;

        if (empty($user)) {
            $stud = new Stud();
            /*Si no hay yeguada, retorna nulo*/
            return null;
        } else {
            $stud = $user->Yeguada();
        }


        if (empty($stud)) {
            $error = 2;
            /*No tiene yeguada*/
            $u = Stud::all()->pluck('id');
            $t = rand(1, count($u));
            $stud = Stud::find($t);

        }

        if (empty($stud->id) or empty($stud->name)) {
            $error = 2;
            /*No tiene yeguada*/
            return null;
        }


        /*CMAR VALIDAR PAGO*/
        /*
        if (empty($stud->getPaid())) {
            $error = 2;
            return null;
        }
        */


        $sal['stud'] = $stud;
        //$sal['studphoto'] = $stud->getPhotos();
        $sal['studphoto'] = $stud->getPhotos();
        $sal['horses'] = Horse::where('studs_id', $stud->id)->orderby('id', 'desc')->get();
        $sal['horsesfav'] = Horse::where(['studs_id' => $stud->id, 'favorite' => 1])->orderby('id', 'desc')->get();
        $sal['nohorsesfav'] = Horse::where(['studs_id' => $stud->id, 'favorite' => 0])->orderby('id', 'desc')->get();
        $sal['studphotoinstalations'] = $stud->getInstalationsGallery();
        $sal['desing'] = $stud->getDesing();
        //$gallery = $stud->getInstalationsGallery();/*Instalaciones*/
        if (empty($user)) {
            $persona = new Personal();
        } else {
            $persona = $user->getPersona();
        }
        $sal['persona'] = $persona;
        $sal['error'] = $error;
        return $sal;
    }

    public static function AzarYeguada($id)
    {
        /*Busca una yeguada al azar para mostrarla, esta vacio se llama de forma recursivo hasta encontrarla*/
        $f = Stud::find($id);
        if (empty($f)) {
            $u = Stud::all()->pluck('id');
            $t = rand(1, count($u));
            $f = StudController::AzarYeguada($t);
        }
        return $f;
    }

    public function ClientDetail2($id = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de inicio*/

        $data = self::getDataStud($id);
        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $horses = $data['horses'];

        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];

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

        return view('frontend.landing.studs.indexDue', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav'));
    }

    public function ClientContact($id = null, Stud $stud = null)
    {
        $d = false;
        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $id = $tada->id;
        }
        */
        /*Pagina publica de clientes, pagina de contacto*/
        $data = self::getDataStud($id);
        if (is_numeric($id)) {
            $d = true;
        }
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }


        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $horses = $data['horses'];
        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];
        $studphotoinstalations = $data['studphotoinstalations'];
        $persona = $data['persona'];
        $error = $data['error'];
        $desing = $data['desing'];
        //return view('frontend.landing.v1.contacto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($d == true) {
            return redirect()->route('MyContact', ['slug' => $stud->slug]);
        }
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.contacto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.contacto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 6) { //beni
                return view('frontend.landing.v6.contacto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            }
        }
        return view('frontend.landing.studs.contact', compact('user', 'error', 'stud', 'persona', 'data', 'nohorsesfav'));
    }

    public function ClientGallery($id = null, Stud $stud = null)
    {

        $d = (is_numeric($id)) ? true : false;

        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $id = $tada->id;
        }
        */

        /*Pagina publica de clientes, pagina de contacto*/
        $data = (is_numeric($id)) ? StudController::Datos($id) : null;
        $ck = (is_string($id)) ? Stud::where('slug', $id)->first() : null;
        if (!empty($ck)) {
            $id = $ck->getUsersId();
            $data = (is_numeric($id)) ? StudController::Datos($id) : null;

        }
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $stud = $data['stud'];
        $galeria = $data['studphoto'];
        $persona = $data['persona'];
        $error = $data['error'];
        $user = $data['user'];

        $desing = $data['desing'];


        if ($d == true) {
            return redirect()->route('MyGallery', ['slug' => $stud->slug]);
        }
        //return view('frontend.landing.v1.fotos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.fotos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 3) { //olon
                return view('frontend.landing.v3.fotos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.fotos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 6) { //beni
                return view('frontend.landing.v6.foto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.pupilaje', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            }
        }
        return view('frontend.landing.studs.photo', compact('user', 'error', 'stud', 'persona', 'galeria'));
    }

    public function ClientVideo($id = null, Stud $stud = null)
    {
        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $id = $tada->id;
        }
        */
        $d = false;
        if (is_numeric($id)) {
            $d = true;
        }
        /*Pagina publica de clientes, pagina de contacto*/
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $galeria = $data['studphoto'];
        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $horses = $data['horses'];
        $studphotoinstalations = $data['studphotoinstalations'];
        $persona = $data['persona'];
        $error = $data['error'];
        $desing = $data['desing'];
        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];

        if ($d == true) {
            return redirect()->route('MyVideo', ['slug' => $stud->slug]);
        }
        //return view('frontend.landing.v1.inicio', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.video', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.video', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.video', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.video', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.rancho', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'nohorsesfav'));
            }
        }
        return view('frontend.landing.studs.video', compact('user', 'error', 'stud', 'persona', 'galeria', 'data', 'nohorsesfav'));
    }

    public function ClientInstalation($id = null, Stud $stud = null)
    {
        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $id = $tada->id;
        }
        */
        $d = false;
        if (is_numeric($id)) {
            $d = true;
        }
        /*Pagina publica de clientes, pagina de contacto*/
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }

        $user = $data['user'];
        $stud = $data['stud'];
        $persona = $data['persona'];
        $galeria = $data['studphotoinstalations'];
        $error = $data['error'];
        $desing = $data['desing'];
        if ($d == true) {
            return redirect()->route('MyInstalation', ['slug' => $stud->slug]);
        }
        //return view('frontend.landing.v1.instalaciones', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.instalaciones', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.instalations', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.instalations', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.instalations', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.instalations', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.contacto', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            }
        }
        return view('frontend.landing.studs.instalations', compact('user', 'error', 'stud', 'persona', 'galeria', 'data'));
    }

    public function ClientInstalationCentro($id = null, Stud $stud = null)
    {

        /*Pagina publica de clientes, pagina de contacto*/
        $d = true;
        if (is_numeric($id)) {
            $d = true;
        }
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }

        $user = $data['user'];
        $stud = $data['stud'];
        $persona = $data['persona'];
        $galeria = $data['studphotoinstalations'];
        $error = $data['error'];
        if ($d == true) {
            return redirect()->route('MyInstalation2', ['slug' => $stud->slug]);
        }

        return view('frontend.landing.studs.instalationscentro', compact('user', 'error', 'stud', 'persona', 'galeria'));
    }

    Public function Login()
    {
        $url = 'http://app.' . Config('aplication.host') . "/login";
        return redirect($url);
    }

    public function ClientHorses(Request $r, $id = null, $v = 0, $type = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de contacto*/

        $d = false;
        if (is_numeric($id)) {
            $d = true;
        }
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }

        $next = Horse::where('id', '<', $id)->first();
        $prev = Horse::where('id', '>', $id)->first();
        $user = $data['user'];
        $stud = $data['stud'];
        $horses = $data['horses'];

        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];

        //$horses = Horse::where(['users_id'=> $user->id, 'tosold'=>0])->get();
        $persona = $data['persona'];
        $error = $data['error'];
        $web = trans('stud.horses');
        $sweb = trans('stud.ouranimal');
        $venta = (isset($venta)) ? $venta : 0;
        if (!empty($type)) {
            $horses = Horse::where(['studs_id' => $stud->id, 'sex' => $type])->orderby('id', 'desc')->get();
            $sexos = Horse::where(['studs_id' => $stud->id, 'sex' => $type])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();

        } else {
            $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        }


        $desing = $data['desing'];
        /*
         * PENDIENTE MEJORAR
        if($d == true){
            return redirect()->route('MyPage',['slug'=>$stud->slug]);
        }
        */
        //return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav','venta','sexos'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'venta', 'sexos', 'data', 'type'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.caballos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'sexos', 'venta', 'data', 'type'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'sexos', 'type'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'sexos', 'type'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.excursiones', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            }
        }
        return view('frontend.landing.studs.sell', compact('user', 'error', 'stud', 'persona', 'web', 'sweb', 'horses', 'next', 'prev', 'venta', 'nohorsesfav', 'data', 'type'));
        //return view('frontend.landing.studs.horse', compact('user', 'error', 'stud', 'persona'));
    }

    public function ClientHorsesByHost(Request $r, $v = 0, $type = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de contacto*/
        $d = false;
        $dom = self::getHost();
        if (!empty($dom)) {
            $id = $dom->Yeguada();

        }
        if (is_numeric($id)) {
            $d = true;
        }
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }

        $next = Horse::where('id', '<', $id)->first();
        $prev = Horse::where('id', '>', $id)->first();
        $user = $data['user'];
        $stud = $data['stud'];
        $horses = $data['horses'];

        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];

        //$horses = Horse::where(['users_id'=> $user->id, 'tosold'=>0])->get();
        $persona = $data['persona'];
        $error = $data['error'];
        $web = trans('stud.horses');
        $sweb = trans('stud.ouranimal');
        $venta = (isset($venta)) ? $venta : 0;
        if (!empty($type)) {
            $horses = Horse::where(['studs_id' => $stud->id, 'sex' => $type])->orderby('id', 'desc')->get();
            $sexos = Horse::where(['studs_id' => $stud->id, 'sex' => $type])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();

        } else {
            $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        }


        $desing = $data['desing'];
        /*
         * PENDIENTE MEJORAR
        if($d == true){
            return redirect()->route('MyPage',['slug'=>$stud->slug]);
        }
        */
        //return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav','venta','sexos'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'venta', 'sexos', 'data', 'type'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.caballos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'sexos', 'venta', 'data', 'type'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'sexos', 'type'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'sexos', 'type'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.excursiones', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'nohorsesfav', 'data', 'venta', 'type'));
            }
        }
        return view('frontend.landing.studs.sell', compact('user', 'error', 'stud', 'persona', 'web', 'sweb', 'horses', 'next', 'prev', 'venta', 'nohorsesfav', 'data', 'type'));
        //return view('frontend.landing.studs.horse', compact('user', 'error', 'stud', 'persona'));
    }

    public function ClientSell($id = null, Stud $stud = null)
    {
        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $id = $tada->id;
        }
        */
        /*Pagina publica de clientes, pagina de contacto*/
        $data = self::getDataStud($id);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $stud = $data['stud'];
        $d = false;
        if (is_numeric($id)) {
            $d = true;
        }
        if ($d == true) {
            return redirect()->route('MySell', ['slug' => $stud->slug]);
        }
        $user = $data['user'];

        $persona = $data['persona'];
        $error = $data['error'];
        $horses = $data['horses'];

        $horsesfav = $data['horsesfav'];
        $nohorsesfav = $data['nohorsesfav'];
        $horses = Horse::where(['users_id' => $user->id, 'tosold' => 1])->get();
        $venta = (isset($venta)) ? $venta : 1;
        $sexos = Horse::where(['users_id' => $user->id, 'tosold' => 1])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        $desing = $data['desing'];
        //return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav','venta','sexos'));

        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'venta', 'sexos', 'data', 'nohorsesfav'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.index', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'nohorsesfav'));
            } elseif ($desing == 3) {//olon
                return view('frontend.landing.v3.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'nohorsesfav'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.caballos', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'nohorsesfav'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'sexos', 'nohorsesfav'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.ventas', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'sexos', 'nohorsesfav'));
            } elseif ($desing == 7) { //beni
                return view('frontend.landing.v3.venta', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'venta', 'nohorsesfav'));
            }
        }

        return view('frontend.landing.studs.sell', compact('user', 'error', 'stud', 'persona', 'horses', 'venta', 'data', 'nohorsesfav'));
    }

    public function luis($id = null)
    {
        return view('frontend.landing.studs.luis');
    }

    public function imagen_instalations(Request $r)
    {
        $d = new FileController();
        $file = $r->allFiles();
        $data = $r->all();

        $sal['status'] = 200;

        if (\Auth::user()->getType() == 0) {
            $stud_id = $r->stud_id;
            $stud = Stud::find($stud_id);

        } else {
            $stud = \Auth::user()->Yeguada();
        }
        $data = [];
        foreach ($file as $k => $v) {
            foreach ($v as $h => $i) {
                $g = $d->imagen_instalations($i, $stud);
                array_push($data, $g);
            }

        }
        $sal['sms'] = $data;
        //$s = $d->imagen_slider($r);
        return Functions::RetornaJson($sal);
    }

    public function setGallery(Request $r)
    {
        $d = new FileController();
        $file = $r->allFiles();
        $sal['status'] = 200;
        $data = [];
        foreach ($file as $k => $v) {
            foreach ($v as $h => $i) {
                $g = $d->imagen_gallery($i);
                array_push($data, $g);
            }

        }
        $sal['sms'] = $data;
        //$s = $d->imagen_slider($r);
        return Functions::RetornaJson($sal);
    }

    public function setLandingColor(Request $request)
    {
        $data = $request->all();


        //$img = $request->image;
        $img_id = $request->image_id;

        $f = \Config::get('aplication.fotoslider');
        if (!empty($img_id)) {
            foreach ($img_id as $t => $o) {
                $ph = Photo::find($o);
                if (!empty($ph)) {
                    //$f = \Config::get('aplication.fotologo');
                    $folder = DS . "uploads" . DS . $f . DS . $ph->getName();
                    \Log::critical('Epa estas probando la url ' . public_path() . $folder);
                    Storage::delete(public_path() . $folder);
                    //$ph->de
                    $ph->forcedelete();
                }
            }
        }
        //$data = $request->image_id;
        $d = self::setSliders($request);
        /*
        $s['status'] = 200;
        $s['data'] = $data;
        $s['d'] = $d;
        return Functions::RetornaJson($s);
        */


        $user = \Auth::user();
        $stud = $user->Yeguada();
        $color = (!empty($data['color'])) ? $data['color'] : null;
        $ga = (!empty($data['ga'])) ? $data['ga'] : null;
        $titulo = (!empty($data['tittle'])) ? $data['tittle'] : null;
        $descipcion = (!empty($data['descipcion'])) ? $data['descipcion'] : null;
        $foot = (!empty($data['foot'])) ? $data['foot'] : null;
        $head = (!empty($data['head'])) ? $data['head'] : null;
        $palabra = "";
        if (!empty($data['words'])) {
            foreach ($data['words'] as $k => $v) {
                if (!empty($v)) {
                    if ($k < count($data['words']) - 1) {
                        $palabra .= $v . ", ";
                    } else {
                        $palabra .= $v;
                    }

                }
            }
        }
        $palabra = str_replace('.', ', ', $palabra);
        //dd($palabra);

        if (!empty($color)) {
            $stud->setColor($color)->push();
        }
        if (!empty($palabra)) {
            $stud->setWords($palabra)->push();
        }
        if (!empty($head)) {
            $stud->setHeader($head)->push();
        }
        if (!empty($foot)) {
            $stud->setFooter($foot)->push();
        }
        if (!empty($ga)) {
            $stud->setGa($ga)->push();
        }
        if (!empty($titulo)) {
            $stud->setTitulo($titulo)->push();
        }
        if (!empty($descipcion)) {
            $stud->setSeodescripcion($descipcion)->push();
        }
        $cabecera = $request->file('dro_caballo');
        if (!empty($cabecera)) {
            $d = new FileController();
            $t = $d->imagen_front($request->file('dro_caballo'), $stud);
        }

        $data['status'] = 200;
        return Functions::RetornaJson($data);

    }

    public function setSliders(Request $r)
    {
        $d = new FileController();

        $file = $r->allFiles();

        $sal['status'] = 400;
        $data = [];
        $t1 = $r->t1;
        $t2 = $r->t2;
        //$sal['status']=400;
        $s = Photo::Slider(\Auth::user()->Yeguada()->id)->get();

        if (count($s) > 5) {

            $sal['sliders'] = $s;

            $sal['sms'] = 'Tienes el maximo de sliders permitidos';
            return Functions::RetornaJson($sal);
        }

        foreach ($file as $k => $v) {

            $g = $d->imagen_slider($v, $t1, $t2);
            array_push($data, $g);
            $sal['status'] = 200;
            /*
            foreach ($v as $h => $i) {

                $g = $d->imagen_slider($i);
                array_push($data, $g);
            }
            */

        }
        $sal['sms'] = $data;
        //$s = $d->imagen_slider($r);
        return Functions::RetornaJson($sal);
    }

    public function DetailedHorseVenta(Stud $slug = null, Horse $horse = null)
    {
        if (empty($horse->id)) {
            flash(trans('error.NoHorse'))->error();
            $url = route('portal');
            return redirect($url);
        }
        /*
                $tada = $this->StudConDominio();
                if(!empty($tada)){
                    $slug = $tada->Yeguada();
                }
                */

        /*Pagina publica de clientes, pagina de contacto*/
        $data = self::getDataStud($slug);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $user = $data['user'];
        $stud = $data['stud'];
        $persona = $data['persona'];
        $error = $data['error'];

        //$horse = Horse::find($horse);
        /*
        if (is_numeric($horse)) {
            dd($horse);
            $horse = Horse::find($horse);

            if(!empty($horse)){
                $url = route('MySellDetailSell',['slug'=>$slug,'horse'=>$horse->slug]);
                dd($url);
return redirect($url);
            }

        }
        */

        if (empty($horse)) {
            //echo "caballo no encontrado 2";exit();
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }


        if (is_numeric($horse)) {
            $horse = Horse::find($horse);

            if (!empty($horse)) {
                $url = route('MySellDetailSell', ['slug' => $slug, 'horse' => $horse->slug]);
                dd($url);
                return redirect($url);
            }

        }

        $prev = Horse::where('id', '<', $horse->id)->where(['users_id' => $user->id, 'tosold' => 1])->max('id');
        $next = Horse::where('id', '>', $horse->id)->where(['users_id' => $user->id, 'tosold' => 1])->min('id');

        if ($next == $horse->id) $next = null;
        if ($prev == $horse->id) $prev = null;
        if (!empty($prev)) {
            $prev = Horse::find($prev)->slug;
        }
        if (!empty($next)) {
            $next = Horse::find($next)->slug;
        }


        //$next = Horse::find($next);
        //$prev = Horse::find($prev);

        $next = (!empty($next)) ? route('MySellDetailSell', ['stud' => $stud->slug, 'horse' => $next]) : null;
        $prev = (!empty($prev)) ? route('MySellDetailSell', ['stud' => $stud->slug, 'horse' => $prev]) : null;
        // <a href="{!! route('MyHorses',['id'=>$user->id,'slug'=>$user->getMySlug(),'type'=>3]) !!}">Potras</a>
        $venta = 1;
        $tipo = 1;
        $visita = $horse->byLanding();
        /*
        $d = false;if(is_numeric($id)){$d == true;}
        if($d == true){
            return redirect()->route('MyPage',['slug'=>$stud->slug]);
        }
        */
        return view('frontend.landing.studs.horsedetail', compact('user', 'error', 'stud', 'persona', 'horse', 'next', 'prev', 'venta', 'tipo'));
    }

    public function DetailedHorse(Stud $stud = null, $horse = null)
    {

        //http://desarrollo.com/rainbow/detalle/Cruzado-Semental-Dramaturgo
        //http://desarrollo.com/rainbow/detalle/dramaturgo
        //dd($horse);
        /*
        $tada = $this->StudConDominio();
        if(!empty($tada)){
            $stud = $tada->Yeguada();
        }
        */
        /*Pagina publica de clientes, pagina de contacto*/


        $data = self::getDataStud($stud);
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $user = $data['user'];
        $stud = $data['stud'];
        $persona = $data['persona'];
        $error = $data['error'];
        $horses = $data['horses'];


        if (empty($horse)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->back();
        }
        //http://desarrollo.com/rainbow/detalle/Cruzado-Semental-Negro-Semental-Dramaturgo

        if (is_numeric($horse)) {
            $horse = Horse::find($horse);
        } else {
            $horse = (new Functions())->BuscarCaballoSlug($horse);

            if (empty($horse)) {
                $horse = Horse::where('slug', $horse)->first();
            }
        }

        if (empty($horse)) {
            //echo "caballo no encontrado 2";exit();
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }


        /*
        @php($user = (!empty($user))?$user:User::find(8))
    @php($stud= (!empty($stud))?$stud:Stud::find(8))
    @php($horse= (!empty($horse))?$horse: Horse::find(4))
    */  /*
        $d = Horse::where('id','!=',0)->pluck('id');
        $horse = Horse::find($d[rand(0,count($d))]);
        */
        //$horse = Horse::find(7);


        $prev = Horse::where('id', '<', $horse->id)->where('users_id', $user->id)->max('id');
        $next = Horse::where('id', '>', $horse->id)->where('users_id', $user->id)->min('id');
        if ($next == $horse->id) $next = null;
        if ($prev == $horse->id) $prev = null;
        if (!empty($prev)) {
            $prev = Horse::find($prev)->slug;
        }
        if (!empty($next)) {
            $next = Horse::find($next)->slug;
        }

        $next = (!empty($next)) ? route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $next]) : null;
        $prev = (!empty($prev)) ? route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $prev]) : null;
        // <a href="{!! route('MyHorses',['id'=>$user->id,'slug'=>$user->getMySlug(),'type'=>3]) !!}">Potras</a>
        $venta = 0;
        $tipo = 1;
        $visita = $horse->byLanding();
        $desing = $data['desing'];


        //return view('frontend.landing.v1.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'horse', 'next', 'prev', 'venta', 'tipo'));
        /*$d = false;if(is_numeric($id)){$d == true;}
                if($d == true){
                    return redirect()->route('MyPage',['slug'=>$stud->slug]);
                }*/
        $sth = $horse->getYeguada();

        if (!empty($sth)) {
            $td = $sth->slug;
            if ($td != $stud->slug) {
                //Ajuste para no confundir caballos con yeguaadas
                return redirect()->route('MyHorseDetailed', ['stud' => $horse->getYeguada()->slug, 'horse' => $horse->slug]);
            }
        }
        //http://desarrollo.com/la-esmeralda/detalle/sultanejo

        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            } elseif ($desing == 3) {
                return view('frontend.landing.v3.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.detalle', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
            }
        }


        return view('frontend.landing.studs.horsedetail', compact('user', 'error', 'stud', 'persona', 'horse', 'next', 'prev', 'venta', 'tipo', 'data'));
    }

    public function Seo(Request $r)
    {
        /*Para posicionamiento y buscador*/
        $stud = \Auth::user()->Yeguada();
        $sal['sms'] = "No se pudo guardar";
        $data = $r->all();
        $ga = (!empty($data['ga'])) ? $data['ga'] : null;
        $titulo = (!empty($data['tittles'])) ? $data['tittles'] : null;
        $descipcion = (!empty($data['descriptions'])) ? $data['descriptions'] : null;
        $palabra = "";
        if (!empty($data['words'])) {
            foreach ($data['words'] as $k => $v) {
                if (!empty($v)) {
                    if ($k < count($data['words']) - 1) {
                        $palabra .= $v . ", ";
                    } else {
                        $palabra .= $v;
                    }

                }
            }
        }
        $palabra = str_replace('.', ', ', $palabra);


        if (!empty($ga)) {
            $stud->setGa($ga)->push();
            $sal['ga'] = $ga;
            $sal['status'] = 200;
        }
        if (!empty($titulo)) {
            $stud->setTitulo($titulo)->push();
            $sal['titulo'] = $titulo;
            $sal['status'] = 200;
        }
        if (!empty($descipcion)) {
            $stud->setSeodescripcion($descipcion)->push();
            $sal['descipcion'] = $descipcion;
            $sal['status'] = 200;
        }
        if (!empty($palabra)) {
            $stud->setWords($palabra)->push();
            $sal['palabra'] = $palabra;
            $sal['status'] = 200;
        }
        return Functions::RetornaJson($sal);
    }

    public function chateo(Request $r)
    {
        /*Para soporte en pagina*/
        $data = $r->all();
        $sal['sms'] = 'Error';
        $stud = \Auth::user()->Yeguada();
        $fb = (!empty($data['fbuser'])) ? $data['fbuser'] : null;
        $ws = (!empty($data['wsuser'])) ? $data['wsuser'] : null;

        if (!empty($ws)) {
            $stud->setWscontact($ws)->push();
            $sal['wsuser'] = $ws;
            $sal['status'] = 200;
        }
        if (!empty($fb)) {
            $stud->setFbcontact($fb)->push();
            $sal['fbuser'] = $fb;
            $sal['status'] = 200;
        }
        return Functions::RetornaJson($sal);
    }

    public function headfoot(Request $r)
    {
        /*Para Header Footer*/
        $header = $r->head;
        $foot = $r->footers;
        $stud = \Auth::user()->Yeguada();
        $stud->setHeader($header)->setFooter($foot)->push();
        $sal['status'] = 200;
        $sal['menu'] = $stud->getHeader();
        $sal['foot'] = $stud->getFooter();
        //$stud
        return Functions::RetornaJson($sal);
    }

    public function Dominio(Request $r)
    {
        /*Para colores*/
        $stud = \Auth::user()->Yeguada();

        $slug = $r->slug;
        $dominio = $r->domain;
        $sal['slug'] = $slug;
        $sal['domain'] = $dominio;
        $slugs = Stud::where(['slug' => $slug])->where('id', '!=', $stud->id)->first();


        if (!empty($slugs)) {
            $sal['sms'] = "El elemento Slug ya esta en uso";
        }
        $usuariostud = User::find($stud->users_id);
        $domains = User::where('domain', $dominio)->where('id', '!=', $usuariostud->id)->first();
        if (!empty($domains)) {
            $sal['sms'] = "El dominio ya esta en uso";
        }

        if (!empty($stud) and empty($slugs) and empty($domains)) {
            //return Functions::RetornaJson($r->all());
            $stud
                ->setDomain($dominio . $r->dom_extension)
                ->setSlug($slug)
                ->push();

            $sal['slug'] = $stud->getSlug();
            $sal['domain'] = $stud->getDomain();
            $sal['status'] = 200;
        } else {
            $sal['status'] = 400;
        }
        return Functions::RetornaJson($sal);
    }

    public function colorin(Request $r)
    {
        /*Para colores*/
        $stud = \Auth::user()->Yeguada();
        $sal['colore'] = $r->colore;
        if (!empty($stud)) {
            $stud->setColor($r->colore)->push();
            $sal['status'] = 200;
        } else {
            $sal['status'] = 400;
        }
        return Functions::RetornaJson($sal);
    }

    public function ImagenCabecera(Request $request)
    {
        $stud = \Auth::user()->Yeguada();

        $cabecera = $request->file('dro_caballo');
        if (!empty($cabecera)) {
            $d = new FileController();
            $t = $d->imagen_front($request->file('dro_caballo'), $stud);
        }

        $data['status'] = 200;
        return Functions::RetornaJson($data);
    }

    public function ImagenAgua(Request $request)
    {
        $stud = \Auth::user()->Yeguada();
        $cabecera = $request->file('dro_agua');
        if (!empty($cabecera)) {
            //$cabecera = $cabecera['dro_agua'];dd($cabecera);
            $d = new FileController();
            $t = $d->imagen_agua($request->file('dro_agua'), $stud);
            $data['t'] = $t;
        }
        $pred = $request->marcapredetermianda;
        $mar = Marcaagua::where('stud_id', $stud->id)->first();
        $mar->setStatus($pred)->push();


        $data['status'] = 200;
        return Functions::RetornaJson($data);
    }

    public function ClientGallery2($id = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de contacto*/
        $data = (is_numeric($id)) ? StudController::Datos($id) : null;
        $ck = (is_string($id)) ? Stud::where('slug', $id)->first() : null;
        if (!empty($ck)) {
            $id = $ck->getUsersId();
            $data = (is_numeric($id)) ? StudController::Datos($id) : null;

        }
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $stud = $data['stud'];
        $galeria = $data['studphoto'];
        $persona = $data['persona'];
        $error = $data['error'];
        $user = $data['user'];
        $d = false;
        if (is_numeric($id)) {
            $d == true;
        }
        if ($d == true) {
            return redirect()->route('MyGallery2', ['slug' => $stud->slug]);
        }
        return view('frontend.landing.studs.photo2', compact('user', 'error', 'stud', 'persona', 'galeria'));
    }

    public function ClientGallery2config($id = null, Stud $stud = null)
    {
        /*Pagina publica de clientes, pagina de contacto*/
        $data = (is_numeric($id)) ? StudController::Datos($id) : null;
        $ck = (is_string($id)) ? Stud::where('slug', $id)->first() : null;
        if (!empty($ck)) {
            $id = $ck->getUsersId();
            $data = (is_numeric($id)) ? StudController::Datos($id) : null;

        }
        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }
        $galeria = $data['studphoto'];
        /*
         {
    "type": "photo",
    "category": "Category One",
    "thumbnail": "media/photos/thumbs/pic1.jpg",
    "source": "media/photos/pic1.jpg",
    "title": "Example of Photo",
    "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident nisi ipsam praesentium reprehenderit modi illo voluptatum libero aperiam voluptas fugit minima esse neque optio ipsa dicta fugiat voluptate maiores."
  },

        */
        $t = [];
        foreach ($galeria as $k => $v) {
            $s = [];
            $s['type'] = 'photo';
            $s['category'] = 'instalacion';
            $s['thumbnail'] = $v['url'];
            $s['source'] = $v['url'];
            $s['title'] = 'titulo - ' . $k;
            $s['title'] = '';
            $s['description'] = 'descripcion - ' . $k;
            $s['description'] = '';
            $t[$k] = $s;
        }
        return json_encode($t);
        return view('frontend.landing.studs.photo2', compact('user', 'error', 'stud', 'persona', 'galeria'));
    }

    function StudConDominio()
    {
        $j = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
        $dom = User::where(['domain' => $j])->first();
        $s = null;
        if (!empty($dom)) {
            $s = $dom;
        }
        return $s;
    }

    public function IndiceCliente()
    {

        $user = \Auth::user();
        $stud = $user->Yeguada();
        return view('backend.landing', compact('user', 'stud'));
    }
}

