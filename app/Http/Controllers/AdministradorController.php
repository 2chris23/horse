<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClientesVisita;
use App\Models\Codigopromo;
use App\Models\Directory;
use App\Models\Horse;
use App\Models\Orden;
use App\Models\Personal;
use App\Models\Photo;
use App\Models\Raza;
use App\Models\Servicio;
use App\Models\Stud;
use App\Models\Video;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function compact;
use function flash;
use function redirect;
use function str_replace;
use function view;

class AdministradorController extends Controller
{
    protected $columnsCliente;
    protected $columnsClienteVisita;
    protected $columnsStud;
    protected $columnsHorse;
    protected $columnsHorse1;
    protected $columnsPhoto;
    protected $columnsVideo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        /*
         *
         * Yeguada
                                Pais Provincia
                                persona contacto
                                telefono
                                email
        */
        $this->columnsVideo = [
            'id' => '#',
            'url' => trans('video.video'),
            'type' => trans('video.type'),
            'tableid' => trans('video.stud'),
            'name' => trans('video.tittles'),
            'created_at' => trans('video.Uploaded'),
            'action' => trans('video.delete'),
            //'desription' => 'Descripcion',
            //'orden',
            //'publish',
            //'created_by',
            //'updated_by',
            //'deleted_by'
        ];
        $this->columnsPhoto = [
            'id' => '#',
            //'name' => 'Nombre',
            'url' => trans('photo.image'),
            'type' => 'Tipo',
            'tableid' => trans('photo.tableid'),
            'tama' => trans('size', ['kb' => 'kb']),
            //'description' => 'Descripcion',
            'created_at' => trans('photo.Uploaded'),
            'action' => trans('photo.delete'),
            //'titulo1' => 'Titulo',
            //'titulo2' => 'Subtitulo',
            //'order' => 'Orden',
            //'publish' => 'Publicada',
            //'updated_by' => '',
            //'deleted_by' => '',
        ];
        $this->columnsHorse = [
            'id' => '#',
            'name' => trans('horse.attrib.name'),
            //'raised' => trans('horse.attrib.raised'),
            //'birthdate' => trans('horse.attrib.birthdate'),
            'raza' => trans('horse.attrib.raza'),
            'doma' => trans('horse.attrib.doma'),
            'sex' => trans('horse.attrib.sex'),
            //'stud' => trans('horse.attrib.stud'),
            'color' => trans('horse.attrib.color'),
            'tosold' => trans('horse.attrib.tosold'),
            //'sold' => trans('horse.attrib.sold'),
            'price' => trans('horse.attrib.price'),
            'action' => 'Borrar',
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $this->columnsHorse1 = [
            'id' => '#',
            'img' => 'Imagen',
            'stud' => trans('horse.attrib.stud'),
            'name' => trans('horse.attrib.name'),
            //'raised' => trans('horse.attrib.raised'),
            //'birthdate' => trans('horse.attrib.birthdate'),
            'raza' => trans('horse.attrib.raza'),
            //'doma' => trans('horse.attrib.doma'),
            'sex' => trans('horse.attrib.sex'),
            //'studP' => 'Yeguada de Origen',
            'color' => trans('horse.attrib.color'),
            //'tosold' => trans('horse.attrib.tosold'),
            //'sold' => trans('horse.attrib.sold'),
            'price' => trans('horse.attrib.price'),
            'action' => trans('photo.delete'),
            //'stud' => 'Yeguada',
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $this->columnsCliente = [
            'id' => '#',
            'stud' => trans('users.stud'),
            'country_id' => trans('users.country_'),
            'state_id' => trans('users.state'),
            'name' => trans('users.contact'),
            'phone' => trans('users.phones'),
            /*falta telefono*/
            'email' => trans('clientes.attrib.email'),
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
        $this->columnsStud = [
            'id' => "#",
            'name' => trans('stud.attrib.name'),
            'created_at' => trans('stud.attrib.created_at'),
            //'lastlogin' => 'Ingreso',
            'subscription' => trans('users.suscripcion'),
            //'created_by' => 'Creado por',
            //'updated_by' => 'Actualizado por',
            //'deleted_by' => 'Borrado por',
            //'logo'=>'Logo',
            //'description'=>'Descripcion',
            //'color'=>'Color',
            //'address' => 'Direccion',
            'country' => trans('users.country_'),
            'state' => trans('users.state'),
            //'titulo' => 'Titulo',
            //'seodescripcion'=>'Posicion Seo',
            //'words'=>'Palabras Clave',
            //'footer'=>'',
            //'header'=>'',
            //'state'=>'',
            //'city'=>'Ciudad',
            //'lat'=>'Latitud',
            //'slug'=>'Slug',
            //'lng'=>'Longitud',
            'users_id' => trans('users.contactperson'),
            //'subscribe' => trans('users.suscripcion'),
        ];
        $this->columnsClienteVisita = [
            'visita' => 'Fecha',
            'nota' => 'Nota',
            'cliente_id' => 'Cliente',
        ];
    }

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

    public function PrecioMensualidad(Request $r)
    {
        $mes1 = $r->mes1;
        $mes1dst = $r->mes1dst;
        $mes3dst = $r->mes3dst;
        $mes6dst = $r->mes6dst;
        $mes12dst = $r->mes12dst;
        $mes1moneda = $r->mes1moneda;
        $d['mes1'] = $r->mes1;
        $d['mes1moneda'] = $r->mes1moneda;
        $psw = $r->psw;
        $descripcion = [
            "de" => $r->alm,
            "es" => $r->esp,
            "nl" => $r->hol,
            "en" => $r->ing,
            "it" => $r->ita,
            "fr" => $r->fra,
        ];
        $descuento = Functions::RetornaNumero($mes1dst);
        $descuento3 = Functions::RetornaNumero($mes3dst);
        $descuento6 = Functions::RetornaNumero($mes6dst);
        $descuento12 = Functions::RetornaNumero($mes12dst);
        $d['mes1dst'] = $descuento;
        $d['mes3dst'] = $descuento3;
        $d['mes6dst'] = $descuento6;
        $d['mes12dst'] = $descuento12;
        $moneda = Functions::RetornaNumero($mes1moneda);
        $serv = Servicio::find($r->idserv);
        if (!empty($serv)) {
            $serv = Servicio::where('type', 1)->first();
        }
        if (!empty($serv)) {
            $serv = Servicio::findornew($r->idserv);
        }
        $serv->
        setPrice($mes1)->
        setType(1)->
        setDiscount($descuento)->
        setDs3($descuento3)->
        setDst6($descuento6)->
        setDst12($descuento12)->
        setMoneda($moneda)/*->
setName($r->nombreplan_es)->
        setNameEn($r->nombreplan_en)->
        setNameNl($r->nombreplan_hol)->
        setNameDe($r->nombreplan_de)->
        setNameFr($r->nombreplan_fr)->
        setNameIt($r->nombreplan_it)->
        setNamePr($r->nombreplan_pr)->
        setEN($descripcion['en'])->
        setES($descripcion['es'])->
        setNL($descripcion['nl'])->
        setDE($descripcion['de'])->
        setFR($descripcion['fr'])->
        setIT($descripcion['it'])
            */
        ;
        //$serv->set
        //return Functions::RetornaJson($serv->toArray());
        $confirm = Functions::CheckHashedPass($r->psw, \Auth::user()->password);
        if ($confirm != true) {
            $d['sms'] = 'Contraseña/Usuario invalido';
            return Functions::RetornaJson($d);
        }
        $serv->push();
        $d['dato'] = $serv;
        $d['status'] = 200;
        $d['sms'] = 'Guardado Existoso';
        return Functions::RetornaJson($d);
    }

    public function PosibleClienteIndex()
    {
        $clientes = Cliente::where('id', '!=', 0)->get();
        //->where('type','!=',1)
        $columns = $this->columnsCliente;
        return view('admin.Clientes.index', compact('clientes', 'columns'));
    }

    public function PosibleClienteNuevo()
    {
        $cliente = new Cliente();
        return view('admin.Clientes.create', compact('cliente'));
    }

    public function PosibleClienteEditar($id)
    {
        $cliente = Cliente::find($id);
        if (empty($cliente)) {
            flash(trans('error.NoCliente'))->error();
            return redirect()->route('home');
        }
        return view('admin.Clientes.edit', compact('cliente'));
    }

    public function GuardarCliente(Request $r)
    {
        $pp = Functions::RetornoArrayTelefono($r);
        //return Functions::RetornaJson($r->all());
        //return Functions::RetornaJson($data['4']=$r->all());
        $sal['status'] = 400;
        $sal['pp'] = $pp;
        $sal['sms'] = "Correo electronico vacio";
        $sal['data'] = $r->all();
        //if (empty($r->email)) return Functions::RetornaJson($sal);
        $phones = $r->input_cliente_phone;
        $id_phones = $r->id_input_cliente_phone;
        $s = null;
        //$s = Cliente::where('email', $r->email)->first();
        //$s = new Cliente();
        //$p=$p->setId();
        if (!empty($r->id)) {
            $p = Cliente::find($r->id);
            $sal['op'] = $p;
        }
        //return Functions::RetornaJson($sal);
        $sal['sms'] = "Actualizando cliente";
        if (empty($p)) {
            $p = new Cliente($sal['data']);
            $sal['sms'] = "Cliente creado";
        }
        $p->setName($r->name)->setEmail($r->email)->setAddress($r->address);
        $p->setSite($r->site)->setUrl($r->url)->setStud($r->stud);
        $p->setCountryId($r->country)->setStateId($r->state)->setCity($r->city);
        $p->push();
        $tst = [];
        foreach ($pp as $k => $v) {
            $f = Functions::RetornaNumero(str_replace(' ', '', $v['n']));
            $id = $v['i'];
            if (!empty($f) or $f != 0) {
                $p->setPhone($f, $id)->push();
                //$id = $p->id;
                if (!empty($id)) {
                    $pd = Directory::find($id);
                    if (!empty($f)) {
                        $pd->setPhone($f)->setExt($v['e'])->setCountryCode($v['c'])->push();
                        $tst[$k] = $pd;
                    }
                } else {
                    if (!empty($f) and empty($id)) {
                        $p->getNewPhone()->setPhone($f)->setExt($v['e'])->setCountryCode($v['c'])->push();
                    }
                }
            }
        }
        /*
        foreach ($phones as $k => $v) {
            $id = $id_phones[$k];
            $p->setPhone($v, $id)->push();
        }
        */
        /*Redes Sociales */
        $t = $p;
        $t->getFacebook()->setFacebook($r->facebook)->push();
        $t = $p;
        $t->getYoutube()->setYoutube($r->youtube)->push();
        $t = $p;
        $t->getTwitter()->setTwitter($r->twitter)->push();
        $t = $p;
        $t->getInstagram()->setInstagram($r->instagram)->push();
        $t = $p;
        $t->getPinterest()->setPinterest($r->pinterest)->push();
        $sal['tst'] = $tst;
        $sal['cliente'] = $p;
        $sal['id'] = $p->id;
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function YeguadasIndex()
    {
        $user = \Auth::user();
        $asoc = $user->Asociado();
        if ($asoc != true) {
            $yeguadas = Stud::where('id', '!=', '0')->orderby('created_at', 'desc')->get();
        } else {

            $control = $user->ControlAsociado();
            $paises = $control->getPaises();
            $yeguadas = Stud::where('id', '!=', '0')->wherein('country', $paises)->orderby('created_at', 'desc')->get();
        }
        $columns = $this->columnsStud;
        return view('admin.content.stud.index', compact('yeguadas', 'columns'));
    }

    public function YeguadasShow($id)
    {
        $stud = Stud::find($id);
        return view('admin.content.stud.show', compact('stud'));
    }

    public function VisitasIndex()
    {
        $visitas = ClientesVisita::groupby('cliente_id')->get();
        $columns = $this->columnsClienteVisita;
        return view('admin.Clientes.index', compact('visitas', 'columns'));
    }

    public function YeguadasEdit($id = null)
    {
        if (!empty($id)) {
            $stud = Stud::find($id);
            $u = User::find($stud->getUsersId());
            return view('admin.content.stud.edit', compact('stud', 'u'));
        }
    }

    public function YeguadasNueva()
    {
        $stud = new Stud();
        $u = new User();
        $user = new User();
        $personal = new Personal();
        //return view('admin.content.user.create',compact('stud','user','personal'));
        return view('admin.content.stud.create', compact('stud', 'u'));
    }

    public function YeguadasSalvar(Request $request)
    {
        //
        $data = $request->all();
        $stud_id = $request->stud_id;
        $stud = Stud::find($stud_id);
        //$u = \Auth::user();
        //$stud = $u->Yeguada();
        if (empty($stud)) {
            $sal['sms'] = trans('error.NoFound');
            return Functions::RetornaJson($sal);
        }
        $user = User::find($stud->getUsersId());
        $name = (isset($data['name'])) ? $data['name'] : null;
        $description = (isset($data['description'])) ? $data['description'] : null;
        $city = (isset($data['city'])) ? $data['city'] : null;
        $state = (isset($data['state'])) ? $data['state'] : null;
        $country = (isset($data['country'])) ? $data['country'] : null;
        $address = (isset($data['address'])) ? $data['address'] : null;
        $video = (isset($data['video'])) ? $data['video'] : null;
        $lat = (isset($data['lat'])) ? $data['lat'] : null;
        $lng = (isset($data['lng'])) ? $data['lng'] : null;
        $descripcion = (isset($data['description'])) ? $data['description'] : null;
//=(isset($data['']))?$data['']:null;
        if (!empty($name)) $stud->setName($name);
        if (!empty($description)) $stud->setDescription($description);
        if (!empty($city)) $stud->setCity($city);
        if (!empty($country)) $stud->setCountry($country);
        if (!empty($state)) $stud->setState($state);
        if (!empty($address)) $stud->setAddress($address);
        if (!empty($lat)) $stud->setLat($lat);
        if (!empty($lng)) $stud->setLng($lng);
        if (!empty($descripcion)) $stud->setDescription($descripcion);
        if (!empty($stud->getUsersId())) $stud->setUsersId($user->id);
        $stud->push();
        if (!empty($video)) {
            $user->setVideo($video);
        }
        if (!empty($request->file('dro_stud'))) {
            $s = new FileController();
            $sd = $s->imagen_logo($request->file('dro_stud'), $stud_id);
        }
        $pp = Functions::RetornoArrayTelefono($request);
        foreach ($pp as $k => $v) {
            $f = Functions::RetornaNumero(str_replace(' ', '', $v['n']));
            $id = $v['i'];
            if (!empty($id)) {
                $pd = Directory::find($id);
                if (!empty($f)) {
                    $pd->setPhone($f)->setExt($v['e'])->setCountryCode($v['c'])->push();
                }
            } else {
                if (!empty($f)) {
                    $stud->getNewPhone()->setPhone($f)->setExt($v['e'])->setCountryCode($v['c'])->push();
                }
            }
        }
        //if(!empty($phone3)){ $phone3_ext = $data['phone_ext_3']; $phone3_cc = $data['phone_cc_3']; }
        $sal['stud'] = $stud->toJson();
        //$sal['persona'] = $persona->toJson();
        $sal['status'] = 200;
        $sal['sms'] = 'Salvado Exitoso';
        $sal['mapa'] = $stud->getStaticMap();
        return Functions::RetornaJson($sal);
    }

    public function GuardarNuevaYeguada(Request $request)
    {
        //
        $data = $request->all();
        $stud = new Stud();
        $user = new User();
        if (empty($request->email)) {
            $sal['sms'] = "Correo vacio";
            return Functions::RetornaJson($sal);
        }
        //$u = \Auth::user();
        //$stud = $u->Yeguada();
        //$stud = Stud::find($request->stud_id);
        if (empty($stud)) {
            $sal['sms'] = trans('error.NoFound');
            return Functions::RetornaJson($sal);
        }
        $user = User::find($stud->getUsersId());
        $name = (isset($data['name'])) ? $data['name'] : null;
        $description = (isset($data['description'])) ? $data['description'] : null;
        $city = (isset($data['city'])) ? $data['city'] : null;
        $state = (isset($data['state'])) ? $data['state'] : null;
        $country = (isset($data['country'])) ? $data['country'] : null;
        $address = (isset($data['address'])) ? $data['address'] : null;
        $video = (isset($data['video'])) ? $data['video'] : null;
        $lat = (isset($data['lat'])) ? $data['lat'] : null;
        $lng = (isset($data['lng'])) ? $data['lng'] : null;
//=(isset($data['']))?$data['']:null;
        if (!empty($name)) $stud->setName($name);
        if (!empty($description)) $stud->setDescription($description);
        if (!empty($city)) $stud->setCity($city);
        if (!empty($country)) $stud->setCountry($country);
        if (!empty($state)) $stud->setState($state);
        if (!empty($address)) $stud->setAddress($address);
        if (!empty($lat)) $stud->setLat($lat);
        if (!empty($lng)) $stud->setLng($lng);
        if (!empty($stud->getUsersId())) $stud->setUsersId($user->id);
        $stud->push();
        if (!empty($video)) {
            $user->setVideo($video);
        }
        if (!empty($request->file('dro_stud'))) {
            $s = new FileController();
            $sd = $s->imagen_logo($request->file('dro_stud'));
        }
        $phones = $stud->getPhoneModel();
        /*
        $total = count($phones);
        $max = 3;
        for ($i = $total; $i < $max; $i++) {
            $de = $pp[$i];
            $df = $stud->getNewPhone()->setPhone($de['n'])->setExt($de['e'])->setCountryCode($de['c']);//->push();
        }
        */
        $pp = Functions::RetornoArrayTelefono($request);
        foreach ($pp as $k => $v) {
            if (!empty($v['i'])) {
                $pd = Directory::find($v['i']);
                if (Functions::RetornaNumero($v['n']) != 0) {
                    $pd->setPhone($v['n'])->setExt($v['e'])->setCountryCode($v['c'])->push();
                }
            } else {
                if (Functions::RetornaNumero($v['n']) != 0) {
                    $stud->getNewPhone()->setPhone($v['n'])->setExt($v['e'])->setCountryCode($v['c'])->push();
                }
            }
        }
        //if(!empty($phone3)){ $phone3_ext = $data['phone_ext_3']; $phone3_cc = $data['phone_cc_3']; }
        $sal['stud'] = $stud->toJson();
        //$sal['persona'] = $persona->toJson();
        $sal['status'] = 1;
        $sal['sms'] = 'Salvado Exitoso';
        $sal['mapa'] = $stud->getStaticMap();
        return json_encode($sal);
    }

    public function NuevoUsuario()
    {
        return view('admin.content.user.create');
    }

    public function EditarUsuario($id = null)
    {
        //dd($id);
        $stud = Stud::find($id);
        $usuario = User::find($stud->getUsersId());
        $personal = $usuario->getPersona();
        return view('admin.content.user.profile', compact('usuario', 'personal', 'stud'));
    }

    public function NuevoUsuarioUpdate(Request $r)
    {
        $data = $r->all();
        $e = null;
        if ($r->tipo == 0) {
            $email = Functions::LimpiarCorreo($r->email);
            $s = Functions::ComprobarCorreo($email);
            $password = $r->password;
            $user_id = $r->user_id;
            $user = User::find($user_id);
            $d = User::where('email', $email)->where('id', "!=", $user->id)->first();
            if ($s == false) {
                $data['sms'] = "Correo invalido";
                $e = 1;
            } elseif (!empty($d)) {
                $data['sms'] = "Correo ya registrado";
                $e = 1;
            }
            if ($e == null) {
                $user->setEmail($email)->setPassword($password)->push();
                $data['sms'] = "Actualizacion Completa";
                $data['status'] = 200;
            }
        }
        if ($r->tipo == 1) {
            $address = $r->address;
            $city = $r->city;
            $country = $r->country;
            $name = $r->name;
            $email = $r->pemail;
            $postal = $r->postal;
            $state = $r->state;
            $user_id = $r->user_id;
            $user = User::find($user_id);
            $personal = $user->getPersona();
            $data['user'] = $user;
            $data['personal'] = $personal;
            $email = Functions::LimpiarCorreo($email);
            $s = Functions::ComprobarCorreo($email);
            $d = Personal::where('email', $email)->where('id', "!=", $personal->id)->first();
            if ($s == false) {
                $data['sms'] = "Correo invalido";
                $e = 1;
            } elseif (!empty($d)) {
                $data['sms'] = "Correo ya registrado";
                $e = 1;
            }
            if ($e == null) {
                $personal->setAddress($address)->setCity($city)->setState($state)->setCountry($country)
                    ->setName($name)->setEmail($email)->setPostal($postal)->push();
                $data['sms'] = "Actualizacion Completa";
                $data['status'] = 200;
            }
            /*Falta telefono*/
        }
        return Functions::RetornaJson($data);
        return view('admin.content.user.create');
    }

    public function NuevoUsuarioSave(Request $r)
    {
        $email = Functions::LimpiarCorreo($r->email);
        $email_valido = Functions::ComprobarCorreo($email);
        $stud = $r->stud;
        $t1 = User::Where('email', $email)->first();
        $t2 = Personal::Where('email', $email)->first();
        $t3 = Stud::where('name', $stud)->first();
        $sal['status'] = 400;
        $sal['sms'] = '';
        $e = null;
        if ($email_valido == false) {
            $sal['sms'] .= "Correo no valido<br>";
            $e = 1;
        }
        if (!empty($t1)) {
            $sal['sms'] .= "Correo de usuario ya registrado<br>";
            $e = 1;
        }
        if (!empty($t2)) {
            $sal['sms'] .= "Correo de contacto ya registrado<br>";
            $e = 1;
        }
        if (!empty($t3)) {
            $sal['sms'] .= "Yeguada ya registrada<br>";
            $e = 1;
        }
        if (!empty($e)) return Functions::RetornaJson($sal);
        $name = $r->name;
        $t = Functions::RetornaNumero(str_replace(" ", '', (isset($r->input_stud_phone[0])) ? $r->input_stud_phone[0] : null));
        $phone = (!empty($t) or $t != 0) ? $t : null;
        $phone_ext = (!empty($t) or ($t != 0)) ? ((isset($r->ext_input_stud_phone[0])) ? $r->ext_input_stud_phone[0] : null) : null;
        $phone_code = (!empty($t) or ($t != 0)) ? ((isset($r->extc_input_stud_phone[0])) ? $r->extc_input_stud_phone[0] : null) : null;
        $usuario = new User(['email' => $email, 'name' => $name, 'domain' => $stud,
            'phone' => $phone_ext,
            'ext' => $phone_ext,
            'country_code' => $phone_code,
        ]);
        $usuario->save();
        $stud = $usuario->Yeguada();
        $sal['url'] = route('yeguadas.edit', ['id' => $stud->id]);
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function GaleriaShow($id)
    {
        $user = \Auth::user();
        $stud = Stud::find($id);
        $gallery = $stud->getPhotos();/*generales*/
        $gallery = $stud->getPhotosInv();/*generales*/
        return view('admin.content.photo.index', compact('user', 'stud', 'gallery'));
    }

    public function HorseIndex($id)
    {
        //
        $stud = Stud::find($id);
        //$horses = Horse::where('users_id', $stud->getUsersId())->paginate();
        $horses = Horse::where('users_id', $stud->getUsersId())->get();
        $columns = $this->columnsHorse;
        return view('admin.content.horse.index', compact('horses', 'columns', 'stud'));
    }

    public function VideoIndex($id)
    {
        //
        $stud = Stud::find($id);
        //dd($stud);
        //  $horses = Horse::where('users_id', $stud->getUsersId())->paginate();
        //    $columns = $this->columnsHorse;
        //
        return view('admin.content.video.index', compact('stud'));
    }

    public function EditarCaballo($id)
    {
        $horse = Horse::find($id);
        $stud = Stud::find($horse->studs_id);
        return view('admin.Horses.edit', compact('horse', 'stud'));
    }

    public function EditarCaballoPost(Request $request, $id)
    {
        $data = $request->all();
        $stud = Stud::find($request->stud_id);
        $horse = Horse::find($id);
        $user = $horse->getUser();
        if (empty($horse)) return Functions::RetornaJson(['status' => 400, 'sms' => trans('error.NoFoundHorse')]);
        if (empty($stud)) return Functions::RetornaJson(['status' => 400, 'sms' => trans('error.NoFoundStud')]);
        /*
        $s['status']=200;
        $s['d']=$data;
        return Functions::RetornaJson($s);
        */
        //$horse = null;
        $raised = Functions::ConvertirNumeroAFloat($data['raised']);/*Generar solo numeros, coma por punto*/
        $nombre = (isset($data['name'])) ? $data['name'] : null;
        $bdate = (!empty($data["birthdate"])) ? $data["birthdate"] : Carbon::now();
        $raza = (isset($data['raza'])) ? $data['raza'] : null;
        $doma = (isset($data['doma'])) ? $data['doma'] : false;
        $descripcion = (isset($data['description'])) ? $data['description'] : null;
        $color = (isset($data['color'])) ? $data['color'] : 0;
        $tosold = (isset($data['tosold'])) ? $data['tosold'] : false;
        $sex = (isset($data['sex'])) ? $data['sex'] : 0;
        $price = (isset($data['price'])) ? $data['price'] : 0;
        $price = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($price, '', ' €'));
        $cubri = (isset($data['cubri'])) ? $data['cubri'] : 0;
        $cubri = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($cubri, '', ' €'));
        $id = (isset($data['id'])) ? $data['id'] : null;
        $stud = (isset($data['stud'])) ? $data['stud'] : null;
        //$user = \Auth::user();
        $user_id = $user->id;
        //$tosold=($tosold == true or $tosold == 'true'or $tosold == 1)?1:0;
        if ($tosold == "false") $tosold = 0;
        if ($doma == "false") $doma = 0;
        /*
         $doma = ($doma == false)?0:$doma;
        $doma = ($doma == 'false')?0:$doma;
        $doma = ($doma == 0)?0:$doma;
         */
        $horse->
        setRaised($raised)->
        setName($nombre)->
        setBirthdate($bdate)->
        setDescripcion($descripcion)->
        setColor($color)->
        setRaza($raza)->
        setDoma($doma)->
        setStud($stud)->
        setToSold($tosold)->
        setSex($sex)->
        setUsersId($user_id)->setCreatedBy($user_id)->
        setStudsId($user_id)->
        setPrice($price)->
        setCubri($cubri)
            ->push();
        $horse->cubri = $cubri;
        $horse->price = $price;
        $horse->tosold = $tosold;
        $horse->doma = $doma;
        $horse->push();
        $horse->CambioDoma($doma);
        $horse->CambioVenta($tosold);
        $sal['sms'] = 'Actualizacion completa paso a archivo';
        $sal['horse'] = $horse;
        $d = new FileController();
        $file = $request->allFiles();
        $imgs = $request->img_caballo;
        foreach ($file as $k => $v) {
            try {
                $name = $imgs[$k];
            } catch (\ErrorException $e) {
                $name = null;
            }
            $d->imagen_caballo($v, $horse->id, $name);
        }
        $sal['horse'] = $horse;
        $sal['status'] = 200;
        $sal['sms'] = 'Actualizacion completa';
        $sal['id'] = $horse->id;
        return Functions::RetornaJson($sal);
    }

    public function LimpiarCaballo()
    {
        /*Administrativa*/
        $d = Horse::where('id', '!=', 0)->get();
        foreach ($d as $k => $v) {
            $s = User::find($v->getUsersId());
            $s = $s->hasYeguada();
            if ($s == false) {
                \Log::critical("Borrando caballo huerfano " . $v->name);
                $v->delete();
            }
        }
    }

    public function LimpiarFoto()
    {
        /*Administrativa*/
        $d = Photo::where('id', '!=', 0)->get();
        foreach ($d as $k => $v) {
            if ($v->Huerfana() == true) {
                \Log::critical("Borrando foto huerfana " . $v->name);
                $v->delete();
            }
        }
    }

    public function AllPhoto()
    {
        //self::LimpiarFoto();
        //self::FixImagenes();
        $photo = Photo::where('id', '!=', 0)->where('type', '!=', 10)->orderby('created_at', 'asc');

        $user = \Auth::user();
        $asoc = $user->Asociado();

        if ($asoc == true) {
            $control = $user->ControlAsociado();
            $paises = $control->getPaises();
            $studs = Stud::wherein('country', $paises)->get()->pluck('id');
        } else {
            $photo = $photo->get();
        }

        $columns = $this->columnsPhoto;
        return view('admin.Photo.index', compact('photo', 'columns'));
    }

    public function AllPhotoCard()
    {
        //self::LimpiarFoto();
        //self::FixImagenes();
        $photo = Photo::where('id', '!=', 0)->where('type', '!=', 10)->orderby('created_at', 'asc')->get();
        $columns = $this->columnsPhoto;
        return view('admin.Photo.indexcard', compact('photo', 'columns'));
    }

    public function AllPhotoPost()
    {
        //self::LimpiarFoto();
        $photo = Photo::where('id', '!=', 0)->orderby('created_at', 'desc')->get();
        $columns = $this->columnsPhoto;
        $sal = [];
        $i = 0;
        foreach ($photo as $c) {
            $d = [];
            foreach ($columns as $k => $v) {
                if ($k == 'stud') {
                    $d[$k] = '<a href="' . route('clientes.edit', ['id' => $c->id]) . '">' . $c->getStudName() . '</a>';
                } elseif ($k == "id") {
                    $d[$k] = Functions::RellenarCeros($c->id);
                } elseif ($k == 'url') {
                    $d[$k] = '<figure ><img src = "' . $c->url . '" class="img-responsive" alt = "" style = " max-height: 64px;" > </figure>';
                } elseif ($k == 'type') {
                    $d[$k] = $c->getTypeString();
                } elseif ($k == 'tableid') {
                    $d[$k] = $c->ObtenerNombrePadre();
                } elseif ($k == 'created_at') {
                    $d[$k] = Functions::AjustarFechaDmy($c->created_at);
                } else {
                    $d[$k] = $c->{$k};
                }
            }
            $sal[$i] = $d;
            $i++;
        }
        $t['data'] = $sal;
        $t['status'] = 200;
        $t['columns'] = $this->columnsPhoto;
        return Functions::RetornaJson($t);
    }

    public function AllVideo()
    {
        //self::LimpiarCaballo();
        $Video = Video::where('id', '!=', 0)->orderby('id', 'asc')->get();;
        $columns = $this->columnsVideo;
        //return view('admin.Video.indexcuadricula', compact('Video', 'columns'));
        return view('admin.Video.index', compact('Video', 'columns'));
    }

    public function AllVideoCard()
    {
        //self::LimpiarCaballo();
        $Video = Video::where('id', '!=', 0)->orderby('id', 'desc')->get();;
        $columns = $this->columnsVideo;
        //return view('admin.Video.indexcuadricula', compact('Video', 'columns'));
        return view('admin.Video.indexcuadricula', compact('Video', 'columns'));
    }

    public function AllHorses()
    {
        //self::LimpiarCaballo();
        $horses = Horse::where('id', '!=', 0)->orderby('id', 'desc');
        $user = \Auth::user();
        $asoc = $user->Asociado();

        if ($asoc == true) {
            $control = $user->ControlAsociado();
            $paises = $control->getPaises();
            $studs = Stud::wherein('country', $paises)->get()->pluck('id');
            $horses = $horses->wherein('studs_id', $studs)->get();
        } else {
            $horses = $horses->get();
        }

        $columns = $this->columnsHorse1;
        return view('admin.Horses.index', compact('horses', 'columns'));
    }

    function GuardarDatosAdmin(Request $r)
    {
        $sal['sms'] = "Almacenando datos de administrador";
        $confirm = $r->confirm;
        $passlng = 3;
        $user = \Auth::user();
        $personal = $user->Personal();
        if (isset($r->email)) {
            $email = $r->email;
            $password = $r->password;
            /*Comprarar contraseñas*/
            if (!empty($confirm)) {
                $v = Functions::CheckHashedPass($confirm, \Auth::user()->getPassword());
                if ($v == false) {
                    $sal['sms'] = "La contraseña que ingresaste no es correcta";
                    return Functions::RetornaJson($sal);
                }
            } else {
                $sal['sms'] = "Debes ingresar tu contraseña para confirmar los cambios";
                return Functions::RetornaJson($sal);
            }
            /*Verificar datos en tabla usuario*/
            if (!empty($email)) {
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
                $f = User::where('email', $email)->where('id', '!=', $user->id)->first();
                $g = Personal::where('email', $email)->where('users_id', '!=', $user->id)->first();
                $e = 0;
                if (!empty($f)) $e = 1;
                if (!empty($g)) $e = 1;
                //$f = Personal::where('email', $email)->where('id', '!=', $u->id)->first();
                if ($e == 0) {
                    $user->setPassword($password)->setEmail($email)->push();
                    $sal['sms'] = "Datos de inicio han sido modifiados";
                    $sal['status'] = 200;
                } else {
                    $sal['sms'] = "El correo ya se encuentra registrado";
                }
                return Functions::RetornaJson($sal);
            }
        }
        if (!empty($r->pemail)) {
            /*Validar correo*/
            /*Contacto*/
            $address = (isset($r->address)) ? $r->address : null;
            $city = (isset($r->city)) ? $r->city : null;
            $country = (isset($r->country)) ? $r->country : null;
            $name = (isset($r->name)) ? $r->name : null;
            $pemail = (isset($r->pemail)) ? $r->pemail : null;
            $phone = (isset($r->phone)) ? $r->phone : null;
            $ext = (isset($r->phoneext)) ? $r->phoneext : null;
            $coun = (isset($r->phonecon)) ? $r->phonecon : null;
            $postal = (isset($r->postal)) ? $r->postal : null;
            $state = (isset($r->state)) ? $r->state : null;
            $logo = $r->file('dro_logo'); //logo
            if (!empty($logo)) {
                $s = new FileController();
                $sal['file'] = $s->imagen_logo_admin($logo);
            }
            if (!empty($personal)) {
                if (!empty($pemail) and Functions::ComprobarCorreo($pemail) == true) {
                    $ps = Personal::where('email', $pemail)->where('id', '!=', $personal->id)->first();
                    if (empty($ps)) $personal->setEmail($pemail);
                }
                if (!empty($phone)) $user->setPhone($phone);
                if (!empty($ext)) $user->setExt($ext);
                if (!empty($coun)) $user->setCountryCode($coun);
                if (!empty($name)) {
                    $personal->setName($name);
                }
                if (!empty($address)) {
                    $personal->setAddress($address);
                }
                if (!empty($city)) {
                    $personal->setCity($city);
                }
                if (!empty($state)) {
                    $personal->setState($state);
                }
                if (!empty($country)) {
                    $personal->setCountry($country);
                }
                if (!empty($postal)) {
                    $personal->setPostal($postal);
                }
                $personal->push();
                $user->push();
                $sal['personal'] = $personal;
                $sal['user'] = $user;
                $sal['status'] = 200;
            }
        }
        return Functions::RetornaJson($sal);
    }

    public function FixImagenes()
    {
        $t = new FileController();
        $f1 = \Config::get('aplication.fotoyeguada');
        $t->ProcesarImgFolder($f1);
        $f1 = \Config::get('aplication.fotoperfil');
        $t->ProcesarImgFolder($f1, 640);
        $f1 = \Config::get('aplication.fotologo');
        $t->ProcesarImgFolder($f1, 640);
        $f1 = \Config::get('aplication.fotohorse');
        $t->ProcesarImgFolder($f1, 640);
        $f1 = \Config::get('aplication.fotoslider');
        $t->ProcesarImgFolder($f1, 2048);
        $f1 = \Config::get('aplication.fotofront');
        $t->ProcesarImgFolder($f1);
        $f1 = \Config::get('aplication.adminimage');
        $t->ProcesarImgFolder($f1, 300);
        //ProcesarImgFolder
    }

    public function BorrarCaballo(Request $r)
    {
        $data = $r->all();
        $p = [];
        $sal['sms'] = "";
        if (!empty($r->horse_id)) {
            $horse = Horse::find($r->horse_id);
            $sal['sms'] = trans('error.NoFoundHorse');
            if (empty($horse)) return Functions::RetornaJson($sal);
            $name = $horse->getName();
            $id = $horse->id;
            $sal['sms'] = "Caballo  encontrado";
            $fotos = $horse->getPhotoModel();
            $sal['nombre'] = $horse->getName();
            foreach ($fotos as $k => $v) {
                $sal['sms'] = "Borrando fotos";
                $fo = $v->getName();
                $p[$k] = "Foto $fo Borrada del caballo $name id=$id";
                $v->borrar();
            }
            $sal['fotos'] = $p;
            $sal['status'] = 200;
            $sal['sms'] = "Borrando Caballo";
            $horse->delete();
            $sal['sms'] = "Caballo Borrado";
        }
        return Functions::RetornaJson($sal);
    }

    public function VentasAdmin()
    {
        $user = \Auth::user();
        $asociado = $user->Asociado();
        $paises = null;
        $hoy = Carbon::now();
        $clientesPago = Stud::where('paid', 1);
        $clientesFalso = Stud::where('paid', 0);
        $pagos = Orden::where('id', '!=', 0);


        if ($asociado == true) {
            $control = $user->ControlAsociado();
            $paises = $control->getPaises();
            $p = count($paises);

            if ($p == 1) {
                $clientesPago = $clientesPago->where('country', $paises[0]);
                $clientesFalso = $clientesFalso->where('country', $paises[0]);
            } else {
                $clientesPago = $clientesPago->wherein('country', $paises);
                $clientesFalso = $clientesFalso->wherein('country', $paises);
                /*
                foreach ($paises as $k => $v) {
                    if($k == 0){
                        $clientesPago = $clientesPago->where('country',$v);
                        $clientesFalso = $clientesFalso->where('country',$v);
                    }else{
                        $clientesPago = $clientesPago->where('country',$v);
                        $clientesFalso = $clientesFalso->where('country',$v);
                    }

                }
                */
            }

        }
        $clientesPagoMes = $clientesPago->whereMonth('created_at', '=', $hoy->month);
        $clientesFalsoMes = $clientesFalso->whereMonth('created_at', '=', $hoy->month);
        if ($asociado == true) {
            $pagos = $pagos->wherein('studs_id', $clientesPago->pluck('id'));
        }

        $clientesPago = $clientesPago->get();
        $clientesFalso = $clientesFalso->get();
        $clientesPagoMes = $clientesPagoMes->get();
        $clientesFalsoMes = $clientesFalsoMes->get();

        $pagos = $pagos->get();

        return view('admin.Ventas.index', compact('clientesPago',
            'clientesFalso',
            'clientesPagoMes',
            'asociado',
            'pagos',
            'clientesFalsoMes'));
    }

    public function VentasAdminPost(Request $r)
    {
        $sal['status'] = 200;
        $d['status'] = 200;
        $d['label'] = 'Suscripciones';
        $d['data'] = [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2], [2003, 1.3], [2004, 2.5], [2005, 2.0], [2006, 3.1], [2007, 2.9], [2008, 0.9]];
        return Functions::RetornaJson($d);
        $d = Orden::orderby('id', 'desc')->get();
        $sal['label'] = "Todos";
        $g = "";
        foreach ($d as $k => $v) {
            $g .= "[" . $v->created_at . "," . $v->subtotal . "]";
        }
        $sal['data'] = "[$g]";
        return Functions::RetornaJson($sal);
        return Functions::RetornaJson($d->toArray());
    }

    public function ServiciosAdmin()
    {
        $servicios = Servicio::where('id', '!=', 0)->get();
        return view('admin.Servicios.index', compact(
            'servicios'
        ));
    }

    public function SoporteAdmin()
    {
        return view('admin.Soporte.index');
    }

    public function OpcionesAdmin()
    {
        return view('admin.Opciones.index');
    }

    public function Iconos()
    {
        return view('iconos');
    }

    public function RazaIndex()
    {
        //$razas = trans('horse.raza');
        /*
        $ids = [27,8,9,11,25];
        foreach ($ids as $k){
            $ra = Raza::find($k);
            $ra->setStatus(1)->push();
        }
        */
        $razas = Raza::where('id', '!=', 0)->get();
        if (count($razas) == 0) {
            foreach (trans('horse.raza') as $k => $v) {
                if ($k != 0) {
                    $d = new Raza(['name' => $v, 'status' => 0]);
                    $d->push();
                }
            }
            $razas = Raza::where('id', '!=', 0)->get();
        }
        //$r = new Raza();
        $columns = [
            'id' => '#',
            'name' => 'nombre',
            'status' => 'status',
        ];
        return view('admin.Horses.razaindex', compact('columns', 'razas'));
    }

    public function CambioStatusRaza(Request $r)
    {
        $id = $r->id;
        $raza = Raza::find($id);
        $sal['sms'] = 'No se encontro la solicitud';
        if (!empty($raza)) {
            $raza->CambioStatus()->push();
            $t = $raza->status;
            $s = 0;
            if ($t == true) {
                $s = 1;
            }
            $sal['st'] = $s;
            $sal['status'] = 200;
            $sal['sms'] = 'Raza ' . trans('horse.raza.' . $raza->id) . ' cambiada';
        }
        return Functions::RetornaJson($sal);
    }

    public function GuardarNuevoCodigoPromo(Request $r)
    {
        Codigopromo::Valido('jjj')->first();
        $fechafin = Functions::AjustarFechaYmd($r->fechafin);
        $fechainicio = Functions::AjustarFechaYmd($r->fechainicio);
        $tt = null;
        if ($fechafin < $fechainicio) {
            $tt = $fechafin;
            $fechafin = $fechainicio;
            $fechainicio = $tt;
        }
        $nombre = ($r->nombre);
        $codigo = ($r->promocionales);
        $status = ($r->status) * 1;
        $dst = Functions::ConvertirNumeroAFloat(($r->usos), 2) * 1;
        $psw = ($r->psw);
        $confirm = Functions::CheckHashedPass($psw, \Auth::user()->password);
        if ($confirm != true) {
            $d['sms'] = 'Contraseña/Usuario invalido';
            return Functions::RetornaJson($d);
        }
        $pro = Codigopromo::where('code', $codigo)->first();
        if (!empty($pro)) {
            $d['sms'] = 'Codigo repetido';
            return Functions::RetornaJson($d);
        }
        $d = new Codigopromo();
        $d->setName($nombre)->setStatus($status)->setDst($dst)->setCode($codigo)
            ->setFin($fechafin)->setInicio($fechainicio);
        $d->push();
        $sal['status'] = 200;
        $sal['data'] = $r->all();
        $sal['promo'] = $d;
        return Functions::RetornaJson($sal);
    }

    public function MostrarUsuarios()
    {
        $usuarios = Stud::where('id', '!=', 0)->get()->pluck('users_id');
        $usuarios = User::wherein('id', $usuarios)->get();
        return view('admin.mostrarusuarios', compact('usuarios'));
    }

    public function MostrarUsuariosPost(Request $r)
    {
        $usuario = $r->usuario;
        \Auth::loginUsingId($usuario);
        return redirect()->route('home');
    }

    public function MostrarUsuariosGet(User $id = null)
    {
        if (empty($id)) {
            flash('No se encontro el usuario')->error();
            return redirect('/');
        }
        \Auth::loginUsingId($id->id);
        return redirect()->route('home');
    }
}

