<?php

namespace App\Http\Controllers;

use App;
use App\Models\City;
use App\Models\Color;
use App\Models\Country;
use App\Models\Facebookpost;
use App\Models\Horse;
use App\Models\Moneda;
use App\Models\Notification;
use App\Models\Photo;
use App\Models\Raz;
use App\Models\Raza;
use App\Models\State;
use App\Models\Stud;
use App\Models\Video;
use Artisan;
use Auth;
use Carbon\Carbon;
use ChrisKonnertz\DeepLy\DeepLy;
use ChrisKonnertz\DeepLy\HttpClient\CallException;
use ChrisKonnertz\DeepLy\Protocol\ProtocolException;
use ChrisKonnertz\DeepLy\ResponseBag\BagException;
use Config;
use DB;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\Response;
use Jenssegers\Agent\Agent;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Statickidz\GoogleTranslate;
use Stevebauman\Purify\Purify as Purify;
use Storage;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use URL;
use function array_push;
use function base_path;
use function compact;
use function explode;
use function flash;
use function is_array;
use function is_object;
use function is_string;
use function redirect;
use function str_random;
use function str_replace;
use function strtolower;
use function strtoupper;
use function view;

//use Laravel\Scout\ScoutServiceProvider as scout;
//use ChrisKonnertz\DeepLy\Integrations\Laravel\DeepLyFacade as Translate;
class PublicController extends Controller
{
    //http://www.combeschool.com/video/id/mnaqmUAqC-U PAGINACIOn
    protected $request;

    /**
     * PublicController constructor.
     */
    public function __construct(Request $r = null)
    {
        $this->request = $r;
    }

    public static function ArrayPaisPrincipal()
    {
        $t[0] = ['id' => 0, 'name' => trans('country.chooseone'),];
        //$data = Country::select('id', 'name', 'shortname')->where('status', 0)->orderby('name')->get();
        $lng = \Session::get('lang');
        $lng = (empty($lng)) ? 'en' : $lng;
        $data = Country::where('status', 0);
        if ($lng == 'en') {
            $data = $data->orderby('name');
        } else {
            $data = $data->orderby($lng);
        }
        $data = $data->get();
        for ($i = 0; $i < count($data); $i++) {
            $v = $data[$i];
            if ($lng == 'en') {
                $name = $v->name;
            } else {
                $name = $v->{$lng};
            }
            $fa = ['id' => $v->id, 'name' => $name, 'shortname' => $v->shortname];
            array_push($t, $fa);
        }
        /*
        foreach ($data as $k => $v) {
            //$s = $data[$i];
            $t[$k] = ['id' => $v['id'], 'name' => $v['name'], 'shortname' => $v['shortname']];
        }
        */
        return $t;
    }

    public static function ArrayMonedas()
    {
        $t[0] = ['id' => 0, 'name' => trans('country.chooseone'),];
        $data = Moneda::select('small', 'nombre', 'simbolo')->where('status', 1)->get()->toArray();
        return $data;
    }

    public static function ArrayRazaPrincipal()
    {
        $t[0] = ['id' => 0, 'name' => trans('country.chooseone'),];
        $data = Raza::select('id', 'name', 'status')->where('status', 1)->orderby('name')->get()->toArray();
        if (count($data) == 0) {
            foreach (trans('horse.raza') as $k => $v) {
                if (empty(Raza::where('name', $v)->first())) {
                    $h = new Raza();
                    $h->setName($v)->push();
                }
            }
            $data = Raza::select('id', 'name', 'status')->where('status', 1)->orderby('name')->get()->toArray();
        }
        //dd($data);
        foreach ($data as $k => $v) {
            $t[$k] = ['id' => $v['id'], 'name' => $v['name'], 'status' => $v['status']];
        }
        return $t;
    }

    public static function ArrayRazaSecundaria()
    {
        $t[0] = ['id' => 0, 'name' => trans('country.chooseone'),];
        $data = Raza::select('id', 'name', 'status')->where('status', 0)->orderby('name')->get()->toArray();
        if (count($data) == 0) {
            foreach (trans('horse.raza') as $k => $v) {
                if (empty(Raza::where('name', $v)->first())) {
                    $h = new Raza();
                    $h->setName($v)->push();
                }
            }
            $data = Raza::select('id', 'name', 'status')->where('status', 1)->orderby('name')->get()->toArray();
        }
        //dd($data);
        foreach ($data as $k => $v) {
            $t[$k] = ['id' => $v['id'], 'name' => $v['name'], 'status' => $v['status']];
        }
        return $t;
    }

    public static function Arraysex()
    {
        $data = trans('horse.sex');
        //$d = asort($data);
        return $data;
    }

    public static function Arraysexs()
    {
        $data = trans('horse.sexs');
        //$d = asort($data);
        return $data;
    }

    public static function ArrayColor()
    {
        $t[0] = ['id' => 0, 'name' => trans('color.chooseone'),];
        $data = Color::select('id', 'name', 'hex')->orderby('name')->get()->toArray();
        if (count($data) == 0) {
            $t = trans('horse.color');
            foreach ($t as $k => $v) {
                if ($k != 0) {
                    $g = new Color();
                    $g->setName($v)->push();
                }
            }
            $data = Color::select('id', 'name', 'hex')->orderby('name')->get()->toArray();
        }
        $data = trans('horse.color');
        $d = asort($data);
        return $data;
    }

    public static function ArrayRaza()
    {
        $data = Raza::select('id', 'name')->orderby('name')->get()->toArray();
        if (count($data) == 0) {
            foreach (trans('horse.raza') as $k => $v) {
                if (empty(Raza::where('name', $v)->first())) {
                    $h = new Raza();
                    $h->setName($v)->push();
                }
            }
            $data = Raza::select('id', 'name', 'status')->where('status', 1)->orderby('name')->get()->toArray();
        }
        /*
        $t = [
            'id' => 0,
            'name' => trans('country.chooseone'),
        ];
        array_push($data, $t);
        */
        return $data;
    }

    public static function ArrayPais($select = 0)
    {
        //$data = Country::select('id', 'name', 'shortname')->where('status', 1)->orderby('name')->get()->toArray();
        if ($select == 0) {
            $t[0] = ['id' => 0, 'name' => trans('country.chooseone'),];
        } else {
            $t = [];
        }
        //$data = Country::select('id', 'name', 'shortname')->where('status', 0)->orderby('name')->get();
        $lng = \Session::get('lang');
        $lng = (empty($lng)) ? 'en' : $lng;
        $data = Country::where('status', 1);
        if ($lng == 'en') {
            $data = $data->orderby('name');
        } else {
            $data = $data->orderby($lng);
        }
        $data = $data->get();
        for ($i = 0; $i < count($data); $i++) {
            $v = $data[$i];
            if ($lng == 'en') {
                $name = $v->name;
            } else {
                $name = $v->{$lng};
            }
            $fa = ['id' => $v->id, 'name' => $name, 'shortname' => $v->shortname];
            //$fa = ['id' => $v->id, 'name' => $v->{$lng}, 'shortname' => $v->shortname];
            array_push($t, $fa);
        }
        return $t;
    }

    public static function TotalCaballoVenta()
    {
        return count(Horse::where('tosold', 1)->get());
    }

    public static function TotalYeguada()
    {
        return count(Stud::all());
    }

    public static function ArrayDominio($seleccionado = null)
    {
        $dominios = [
            '.com' => '.com',
            '.es' => '.es',
            '.net' => '.net',
            '.tk' => '.tk',
            '.de' => '.de',
            '.fr' => '.fr',
            'nl.' => '.nl',
            '.it' => '.it',
            '.pt' => '.pt',
        ];
        return $dominios;
    }

    public static function ObtenerExtensionDominio($str)
    {
        $d = explode('.', $str);
        if (count($d) != 0) {
            $str = "." . $d[count($d) - 1];
            return $str;
        }
        return null;
    }

    public function Error($sms = null, $host = null, $general = null, $exception = null, Request $req = null)
    {
        $error = \Session::all();
        $sms = \Session::get('Error');
        //$host = (isset($error['host'])) ? $error['host'] : null;
        $sub_app = \Config::get('aplication.sub_app');
        $buscar = \Config::get('aplication.host');
        $r = str_replace($buscar, '', $host);
        //$general = (isset($error['general'])) ? $error['general'] : null;
        //$sms = (isset($error['flash_message'])) ? $error['flash_message'] : null;
        //$exception = (isset($error['exception'])) ? $error['exception'] : null;
        if (!empty($sms)) {
            \Session::flash('Error', $sms);
            \Session::flash("flash_message", $sms);
            \Session::put("Error", $sms);
            flash($sms)->error();
        }
        $t = new HomeController($sms);
        //\Session::flash('Error', $sms);
        //\Session::flash('error', $error);
        $s = \Auth::user();
        if (!empty($s) and empty($general)) {
            return redirect()->route('home');
        } elseif (empty($general)) {
            if ($r == $sub_app) {
                //$td = new HomeController();
                //return $td->indexlanding($sms);
                $s = ['Error' => $sms];
                \Session::put('Error', $sms);
                return $t->index($req);
                //return redirect()->route('landinghome')->with($s)->withErrors($s);
                //return view('frontend.landing.index');
            } else {
                return redirect()->route('portal')->withErrors(['Error' => $sms]);
            }
            //return redirect()->route('landinghome');
            //return view('frontend.landing.index');
        } else {
            return redirect()->route('portal')->withErrors([
                'Error' => $sms,
            ]);
        }
    }

    public function Limpiar()
    {
        //StudController::SetSlugs();
        //echo '<h1>Limpiando cache de ruta</h1><br>';
//        $exitCode = Artisan::call('route:cache');
        //echo '<h1>Limpiando cache</h1><br>';
        //$exitCode = Artisan::call('cache:clear');
        $ajustecolor = 0;
        if ($ajustecolor == 1) {
            $lng = App::getLocale();
            $lns = [
                0 => 'es',
                1 => 'en',
                2 => 'de',
                3 => 'fr',
                4 => 'it',
                5 => 'nl',
                6 => 'pt',
            ];
            $fa = trans('horse.color');
            $w = [];
            $z = [];
            $colores = 1;
            $limi = 0;
            $t = Raza::all();
            foreach ($t as $g => $q) {
                $q->setDescription([])->push();
            }
            for ($i = 0; $i < count($lns); $i++) {
                $ac = $lns[$i];
                \Session::put('lang', $ac);
                \Session::put('applocale', $ac);
                App::setLocale($ac);
                $fa = trans('horse.color');
                foreach ($fa as $r => $q) {
                    if ($r != 0) {
                        $fw = Raza::find($r);
                        $t = $fw->getDescription();
                        if ($t == null) $t = [];
                        array_push($t, $q);
                        if ($ac == strtolower('es')) {
                            $fw->setName($q);
                        }
                        $fw->setDescription($t)->push();
                        (Raza::find($r))->searchable();
                        array_push($w, $q);
                    }
                }
            }
            \Session::put('lang', $lng);
            \Session::put('applocale', $lng);
        }
        $ajusteraza = 0;
        if ($ajusteraza == 1) {
            $lng = App::getLocale();
            $lns = [
                0 => 'es',
                1 => 'en',
                2 => 'de',
                3 => 'fr',
                4 => 'it',
                5 => 'nl',
                6 => 'pt',
            ];
            $fa = trans('horse.sex');
            $w = [];
            $z = [];
            $colores = 1;
            $limi = 0;
            $t = Raz::all();
            foreach ($t as $g => $q) {
                $q->setDescription([])->push();
            }
            for ($i = 0; $i < count($lns); $i++) {
                $ac = $lns[$i];
                \Session::put('lang', $ac);
                \Session::put('applocale', $ac);
                App::setLocale($ac);
                $fa = trans('horse.sex');
                foreach ($fa as $r => $q) {
                    if ($r != 0) {
                        $fw = Raz::find($r);
                        if (empty($fw)) {
                            $fw = new Raz();
                            $fw->id = $r;
                            $fw->push();
                            $fw = Raz::find($r);
                        }
                        $t = $fw->getDescription();
                        if ($t == null) $t = [];
                        array_push($t, $q);
                        if ($ac == strtolower('es')) {
                            $fw->setName($q);
                        }
                        $fw->setDescription($t)->push();
                        (Raz::find($r))->searchable();
                        array_push($w, $q);
                    }
                }
                $fa = trans('horse.sexs');
                foreach ($fa as $r => $q) {
                    if ($r != 0) {
                        $fw = Raz::find($r);
                        $t = $fw->getDescription();
                        if ($t == null) $t = [];
                        array_push($t, $q);
                        if ($ac == strtolower('es')) {
                            $fw->setName($q);
                        }
                        $fw->setDescription($t)->push();
                        (Raz::find($r))->searchable();
                        array_push($w, $q);
                    }
                }
            }
            $lng = 'es';
            \Session::put('lang', $lng);
            \Session::put('applocale', $lng);
        }
        echo '<h1>Limpiando Ruta</h1><br>';
        \Artisan::call('route:clear');
        $d = nl2br(\Artisan::output());
        echo $d;
        echo '<h1>Limpiando Vista</h1><br>';
        \Artisan::call('view:clear');
        $d = nl2br(\Artisan::output());
        echo $d;
        /*
        echo "<br>";
        \Artisan::call(' scout:import "App\Model\Country"');
        $d =  nl2br(\Artisan::output());
        echo $d;
        */
        /*
            $fa = Country::where('id',"!=",0)->get();
            foreach($fa as $k=>$v){
                $v->searchable();
                echo $v->id."<br>";
            }
            */
        /*
        $d =  nl2br(\Artisan::output());
         echo $d;
        echo '<h1>Limpiando Configuracion</h1><br>';
        \Artisan::call('config:cache');
        $d =  nl2br(\Artisan::output());
         echo $d;
         echo '<h1>Optimizando </h1><br>';
        \Artisan::call('optimize');
        //$host = gethostbyname('smtp.horsesworldsale.com');
         $d =  nl2br(\Artisan::output());
         echo $d;
         */
        /*
       echo '<h1>Lista de ruta</h1><br>';
       //$exitCode = Artisan::call('route:list');
        \Artisan::call('route:list');
        $d =  nl2br(\Artisan::output());
        $d = str_replace('-','',$d);
        $d = str_replace('+','',$d);
        $b = '|';
        //$d = str_replace($b,"",$d);
        $d = str_replace("<br />","",$d);
        $t = explode("\n",$d);
        echo "<table style='width:100%'>";
       foreach($t as $k=>$v){
           echo "<tr>";
           $v = str_replace('GET|','GET<br>',$v);
           $v = str_replace('HEAD|','HEAD<br>',$v);
           $v = str_replace('PUT|','PUT<br>',$v);
           $v = str_replace('POST|','POST<br>',$v);
           $re = explode($b,$v);
           foreach($re as $k1=>$v1){
               echo "<td width='10%'>$v1</td>";
           }
           echo "</tr>";
        }
        echo "</table>";
        */
        //$this->CrearMapaSitioHorse();
        return '<h1>end</h1>';
    }

    public function BackupDiario()
    {
        set_time_limit(0);
        \Artisan::call('backup:run');
    }

    public function Backtrup()
    {
        $blob = \Session::get('MakingBackup');
        if (!empty($blob)) {
            $fa = (new Functions())->MicroTiempo('Iniciando el backuo ');
            \Session::put('MakingBackup', $fa);
            set_time_limit(0);
            echo '<h1>Backup Start</h1><br>';
            \Artisan::call('backup:run');
            $d = nl2br(\Artisan::output());
            echo $d;
            echo '<h1>Backup End</h1><br>';
            \Session::forget('MakingBackup');
            return '<h1>end</h1>';
        } else {
            $fa = (new Functions())->MicroTiempo('Backup en proceso ', $blob);
            echo '<h1>Proces iniciado' . $blob . '</h1><br>';
            echo '<h1>El bakcup se esta haciendo</h1><br>';
        }
    }

    public function MonitorBackup()
    {
        \Artisan::call('backup:monitor');
        $d = nl2br(\Artisan::output());
    }

    public function SoporteIndex()
    {
        return redirect()->route('tickets.index');
    }

    public function Paises()
    {
        $data = Country::select('id', 'name', 'shortname')->orderby('name')->where('status', '!=', 0)->get()->toArray();
        /*
        $t = [];
        foreach($data as $k=>$v){
            $s['id'] = $v['id'];
            $s['shortname'] = $v['shortname'];
            $s['name'] = trans('country.name.'.$v['id']);
            $t[$k] = $s;
        }
        $data = $t;
        */
        /*
        $t = [
            'id' => 0,
            'name' => trans('country.chooseone'),
        ];
        array_push($data, $t);
        */
        $colums = [
            'id' => trans('country.attrib.id'),
            'name' => trans('country.attrib.name'),
            'shortname' => trans('country.attrib.shortname'),
            'status' => trans('country.attrib.status'),
            'created_by' => trans('country.attrib.created_by'),
            'updated_by' => trans('country.attrib.updated_by'),
            'deleted_by' => trans('country.attrib.deleted_by'),
        ];
        $sal['data'] = $data;
        $sal['colums'] = $colums;
        $sal['text'] = trans('country.chooseone');
        return json_encode($sal);
    }

    public function Estados(Request $r)
    {
        $country = $r->country;
        $data = State::select('id', 'name')->orderby('name')->where('country_id', $country)->get()->toArray();
        /*
        dd($data);
        $t = [];
        foreach($data as $k=>$v){
            $s['id'] = $v['id'];
            $s['name'] = trans('state.name.'.$v['id']);
            $t[$k] = $s;
        }
        $data = $t;
        */
        /*
        $t = [
            'id' => 0,
            'name' => trans('country.chooseone'),
        ];
        array_push($data, $t);
        */
        if (count($data) == 0) {
            $sal['text'] = trans('state.NoOne');
        } else {
            $sal['text'] = trans('state.chooseone');
        }
        $colums = [
            'id' => trans('state.attrib.id'),
            'name' => trans('state.attrib.name'),
            'country_id' => trans('state.attrib.country_id'),
            'status' => trans('state.attrib.status'),
            'created_by' => trans('state.attrib.created_by'),
            'updated_by' => trans('state.attrib.updated_by'),
            'deleted_by' => trans('state.attrib.deleted_by'),
        ];
        $sal['data'] = $data;
        $sal['colums'] = $colums;
        $sal['text'] = trans('state.chooseone');
        return json_encode($sal);
    }

    public function DataSliders(Request $r)
    {
        $d = Photo::find($r->id);
        $sal['status'] = 400;
        $sal['userid'] = \Auth::user()->id;
        $sal['sms'] = 'checando';
        if (!empty($d)) {
            $sal['status'] = 200;
            //$sal['slider'] = $d;
            $sal['titulo1'] = $d->getTitulo1();
            $sal['titulo2'] = $d->getTitulo2();
        }
        return Functions::RetornaJson($sal);
    }

    public function SetDataSliders(Request $r)
    {
        $d = Photo::find($r->id);
        $sal['status'] = 400;
        $sal['userid'] = \Auth::user()->id;
        $sal['sms'] = 'estableciendo';
        if (!empty($d)) {
            $d->setTitulo1($r->t1)->setTitulo2($r->t2)->push();
            $sal['status'] = 200;
            //$sal['slider'] = $d;
            $sal['titulo1'] = $d->getTitulo1();
            $sal['titulo2'] = $d->getTitulo2();
        }
        return Functions::RetornaJson($sal);
    }

    public function EraseMedia(Request $r)
    {
        $photo = (!empty($r->photo)) ? $r->photo : null;
        $video = (!empty($r->video)) ? $r->video : null;
        $type = $r->type;
        if ($type == 'slider') {
            $d = $r->id_img;
            $ph = Photo::find($d);
            $f = \Config::get('aplication.fotoslider');
            if (!empty($ph)) {
                $folder = DS . "uploads" . DS . $f . DS . $ph->getName();
                Storage::delete(public_path() . $folder);
                if (!empty($ph)) {
                    $ph->Borrar();
                }
                //$ph->forcedelete();
                $sal['status'] = 200;
                $sal['sms'] = 'Archivo eliminado';
                return Functions::RetornaJson($sal);
            }
        }
        $sal['status'] = 400;
        $sal['sms'] = trans('error.NoFound');
        if (!empty($photo)) {
            if ($photo == "mystud") {
                $ph = \Auth::user()->Yeguada();
                $pf = $ph->getLogoClear();
                $f = \Config::get('aplication.fotologo');
                $folder = "uploads" . DS . $f . DS . $pf;
                Storage::delete($folder);
                $borrado = new FileController();
                $borrado->Borrar_File(public_path($folder));
                /*
                if(!empty($ph)){
                    $ph->Borrar();
                }
                */
                $ph->setLogo('')->push();
            } else {
                $d = Photo::find($photo);
                if (!empty($d)) {
                    $folder = $d->getFolder();
                    $file = $folder . $d->name;
                    Storage::delete($file);
                    $d->setDeletedBy(\Auth::user()->id);
                    $d->Borrar();
                }
                //$d->delete();
            }
            $sal['status'] = 200;
            $sal['sms'] = 'Imagen Borrada';
            Functions::RetornaJson($sal);
        }
        if (!empty($video)) {
            $d = Video::find($video);
            $d->setDeletedBy(\Auth::user()->id);
            $d->delete();
            $sal['status'] = 200;
            $sal['sms'] = 'Video Borrado';
            Functions::RetornaJson($sal);
        }
        Functions::RetornaJson($sal);
    }

    public function Ciudades(Request $r)
    {
        return null;
        $state = $r->state;
        $data = City::select('id', 'name')->where('state_id', $state)->get()->toArray();
        /*
        $t = [];
        foreach($data as $k=>$v){
            $s['id'] = $v['id'];
            $s['name'] = trans('city.name.'.$v['id']);
            $t[$k] = $s;
        }
        $data = $t;
        */
        /*
        $t = [
            'id' => 0,
            'name' => trans('country.chooseone'),
        ];
        array_push($data, $t);
        */
        if (count($data) == 0) {
            $sal['text'] = trans('city.NoOne');
        } else {
            $sal['text'] = trans('city.chooseone');
        }
        $colums = [
            'id' => trans('state.attrib.id'),
            'name' => trans('state.attrib.name'),
            'state_id' => trans('state.attrib.state_id'),
            'status' => trans('state.attrib.status'),
            'created_by' => trans('state.attrib.created_by'),
            'updated_by' => trans('state.attrib.updated_by'),
            'deleted_by' => trans('state.attrib.deleted_by'),
        ];
        $sal['data'] = $data;
        $sal['colums'] = $colums;
        return json_encode($sal);
    }

    public function Moneda(Request $r)
    {
        $moneda = $r->moneda;
        \Session::put('moneda', $moneda);
        $sal['status'] = 200;
        $sal['moneda'] = $moneda;
        flash('Se ha cambiado la moneda a ' . $moneda)->info();
        return json_encode($sal);
    }

    public function Contacto(Request $r)
    {
        $nombre = $r->name;
        $correo = Functions::LimpiarCorreo($r->email);
        $telefono = $r->phone;
        $mensaje = $r->message;
        $stud = $r->stud;
        //return Functions::RetornaJson($r->all());
        if (empty($nombre)) return redirect()->back()->withErrors(['namee' => "Nombre vacio"]);
        if (empty($stud)) return redirect()->back()->withErrors(['undefined' => "No se encontro el elemento"]);
        $stud = Stud::find($stud);
        $user_id = $stud->getUsersId();
        $stud_id = $stud->id;
        $t = new Notification();
        $t->
        setAsunto('contact')->
        setMensaje($mensaje)->
        setNumero($telefono)->
        setUsersId($user_id)->
        setStudId($stud_id)->
        setAlertAdvice()->
        setTypeContact()->
        setOther($nombre)->
        setCorreo($correo);
        $t->push();
        $s = new MailController();
        $s->ContactoMail($t);
        flash(trans('error.MensajeEnviado'))->success();
        /*enviar mail */
        return redirect()->back();
        return json_encode($r->all());
    }

    public function ChangeLang(Request $r, $lang = 'es')
    {

        \Session::put('lang', $lang);
        \Session::put('applocale', $lang);
        App::setLocale($lang);
        cookie()->forever('applocale', $lang);
        cookie()->forever('lang', $lang);
        $anterior = redirect()->back()->getTargetUrl();
        $lang = new PublicController($r);
        $lang->EstablecerLenguaje($r);
        LaravelLocalization::setLocale(App::getLocale());
        //LaravelLocalization::getLocalizedURL(optional string $locale, optional string $url, optional array $attributes)
        //$url = aravelLocalization::getLocalizedURL($lang, optional string $url, optional array $attributes);
        //$aqui = $r->fullUrl();
        //$limpia =  LaravelLocalization::getNonLocalizedURL($aqui);
        $limpia = LaravelLocalization::getNonLocalizedURL($anterior);
        $limpia = LaravelLocalization::getLocalizedURL(App::getLocale(), $limpia);
        $limpia = str_replace("//", '/', $limpia);
        $limpia = str_replace("http:/", 'http://', $limpia);
        $limpia = str_replace("https:/", 'https://', $limpia);

        //dd($limpia);


        return redirect($limpia)->withCookie('lang', App::getLocale())->withCookie('applocale', App::getLocale());
        //return redirect()->back();
    }

    public function EstablecerLenguaje(Request $r = null)
    {
        $encontrado = 0;
        $agent = new Agent();
        /*Cambia el idioma dependiendo del navegador*/
        $lng = $agent->languages();
        //$total = \Config::get('lenguaje');
        $lang = \Session::get('applocale');
        $lngs = [
            'es' => 'es',
            'en' => 'en',
            'de' => 'de',
            'fr' => 'fr',
            'it' => 'it',
            'nl' => 'nl',
            'pt' => 'pt',
        ];
        $lns = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        if (empty($lang)) {
            //\Log::critical("Carlos   ".json_encode($lng));
            //si la sesion no tiene lenguaje, buscamos el navegador la primera coincidencia
            $f = false;
            for ($i = 0; $i < count($lng); $i++) {
                if (!isset($lng[$i])) {
                    break;
                }
                if ($f == true) {
                    break;
                }
                $l = $lng[$i]; //lenguaje de agente
                for ($z = 0; $z < count($lns); $z++) {
                    if (!isset($lns[$z])) {
                        break;
                    }
                    if ($f == true) {
                        break;
                    }
                    $fa = $lns[$z];//Lenguajes disponibles
                    if ($l == $fa) {
                        $f = true;
                        $lang = $fa;
                        App::setLocale($lang);
                        \Session::put('lang', $lang);
                        \Session::put('applocale', $lang);
                        \Session::put('lang', $lang);
                        \Session::put('applocale', $lang);
                        break;
                    }
                }
            }

            if ($f == false) {
                //si no se encuentra
                $lang = Config::get('app.fallback_locale');
                // \Session::put('lang', 'en');
                App::setLocale($lang);
                \Session::put('lang', $lang);
                \Session::put('applocale', $lang);
                \Session::put('lang', $lang);
                \Session::put('applocale', $lang);
            }
        } else {
            \Session::put('lang', $lang);
            \Session::put('applocale', $lang);
            \Session::put('lang', $lang);
            \Session::put('applocale', $lang);
            App::setLocale($lang);
        }
        LaravelLocalization::setLocale(App::getLocale());
        //(new Functions())->setCookies();
        return $lang;
    }

    public function CambioMoneda(Request $r, $moneda = 'EUR')
    {
        $ruta = $r->route();
        //dd($ruta);
        $back = ($_SERVER["HTTP_REFERER"]);
        $moneda = strtoupper($moneda);
        //dd($moneda);
        \Session::put('moneda', $moneda);
        \Session::put('moneda', $moneda);

        //dd(App::getLocale());
        return redirect($back)->withCookie('moneda', $moneda);
    }

    public function OpcionesUsuario()
    {
        return view('backend.content.Opciones.index');
    }

    public function SoporteUsuario()
    {
        return view('backend.content.Soporte.index');
    }

    public function OtroTelefono()
    {
        $sal['status'] = 200;
        $sal['el'] = view('backend.common.phone')->render();
        return Functions::RetornaJson($sal);
    }

    public function Salir(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

    protected
    function guard()
    {
        return Auth::guard();
    }

    public function NuevaBusqueda(Request $r)
    {
        $newv = true;
        $raisedmin = isset($r->raisedmin) ? $r->raisedmin : 0;
        $raisedmax = isset($r->raisedmax) ? $r->raisedmax : 0;
        $pricemin = isset($r->pricemin) ? $r->pricemin : 0;
        $pricemax = isset($r->pricemax) ? $r->pricemax : 0;
        $horse = Horse::query();
        $stud = Stud::query();
        $paginacion = 1;
        $data = $r->all();
        /****************************************************************************************/
        /****************************************************************************************/
        /****************************************************************************************/
        $country = isset($r->country) ? $r->country : null;
        $state = isset($r->state) ? $r->state : null;
        /* "state" => array:1 [▼
            0 => "620"
          ]*/
        if (!empty($country)) {
            $stud = $stud->where('country', $country);
        }
        if (!empty($state)) {
            foreach ($state as $k => $v) {
                $stud = $stud->where('state', $v);
            }
        }
        if (!empty($country) or !empty($state)) {
            $stud = $stud->pluck('id');
        } else {
            $stud = null;
        }
        if (!empty($stud)) {
            foreach ($stud as $k => $v) {
                $horse = $horse->where('studs_id', $k);
            }
        }
        /****************************************************************************************/
        /****************************************************************************************/
        /****************************************************************************************/
        $sex = isset($r->sex) ? $r->sex : null;
        if (!empty($sex)) {
            foreach ($sex as $k => $v) {
                $horse = $horse->where('sex', $k);
            }
        }
        $doma = isset($r->doma) ? $r->doma : null;
        if (!empty($doma)) {
            foreach ($doma as $k => $v) {
                $horse = $horse->where('doma', $k);
            }
        }
        $raza = isset($r->raza) ? $r->raza : null;
        if (!empty($raza)) {
            foreach ($raza as $k => $v) {
                $horse = $horse->where('raza', $k);
            }
        }
        $color = isset($r->color) ? $r->color : null;
        /*"color" => array:1 [▼
            0 => "1"
          ]*/
        if (!empty($color)) {
            foreach ($color as $k => $v) {
                $horse = $horse->where('color', $v);
            }
        }
        $horse_ax = $horse->simplePaginate($paginacion);
        $horses = $horse_ax;
        $horse = $horse->paginate($paginacion);
        $sal['horse'] = $horse;
        if (count($horse) != 0) {
            $sal['status'] = 200;
        }
        if ($r->ajax()) {
            return view('portal.listas.partials.horse', ['horses' => $horse])->render();
            //return $horse;
            $sal['status'] = 200;
            $sal['request'] = $r;
            $st = $horse_ax->render();
            $sal['rr'] = $horse_ax->links('vendor.pagination.simple-default');
            $sal['data'] = $data;
            $sal['links'] = $horse_ax->links();
            $sal['el'] = view('portal.listas.partials.horse', ['horses' => $horse])->render();
            return Functions::RetornaJson($sal);
        }
        return view('portal.listas.listing-5', compact(
            'newv',
            'horses', 'raza',
            'color',
            'country',
            'state',
            'sex',
            'doma',
            'raisedmin',
            'raisedmax',
            'pricemax',
            'pricemin'));
        /*
        $sal['lastPage']  = $horse->lastPage();
        $sal['currentPage'] = $horse->currentPage();
        $sal['pagination']  = $paginacion;
        /*
        if($r->ajax()){
            return $horse;
            $sal['status']=200;
            $sal['el'] = view('portal . listas . partials . horse',['horses'=>$horse])->render();
            return Functions::RetornaJson($sal);
        }
        return Functions::RetornaJson($sal);
        return Functions::RetornaJson($data);
        dd($r->all());
        */
    }

    public function ProbarEsto()
    {
        $texto = "Ejemplar tordo con 1,70 cm de altura de extraordinaria belleza y movimientos. Nació en salamanca para posteriormente ser adquirido por la yeguada Juan Vázquez donde seguiría su carrera deportiva y su desarrollo como reproductor.
Desciende de la línea de Gorrón II, ampliamente conocida por la calidad de su descendencia.  Esta línea se caracteriza por poseer de una extraordinaria belleza, grandes movimientos y fuerte carácter. Características imprescindibles para llegar al más alto nivel.
De él destacaríamos su perfección morfológica, lo que le ha hecho ganar multitud de premios en concursos morfológicos. Clasificado entre los 5 mejores 3 veces consecutivas en la final de SICAB. Ganador de pruebas de caballos jóvenes. De sus aires destacaríamos su elasticidad, su amplitud, su fuerza e impulsión. Pocos ejemplares se pueden ver con la calidad de este ejemplar. Sus pies tocan la corriente cuando trota y su manos parecen flotar.
En definitiva, otro ejemplar de la filosofía de Yeguada Juan Vázquez, no sólo belleza, raza y morfología, sino movimientos y aptitud. Semental especialmente recomendado para amantes del deporte.";
        return self::Traduccion($texto);
    }

    public
    static function Traduccion($text = null)
    {
        $t = new PublicController();
        $text = $t->Traducir($text);
        return $text;
    }

    public function Traducir($translatedText = null)
    {
        $mylng = strtoupper(App::getLocale());
        $languageCode = null;
        $t = $translatedText;
        $config = [
            'HTML . ForbiddenElements' => '',
            'HTML . Allowed' => 'div,b,strong,i,em,a[href | title],ul,ol,li[style],br,span[style],img[width | height | alt | src]',
            'CSS . AllowedProperties' => 'font,font - size,font - weight,font - style,font - family,text - decoration,padding - left,color,background - color,text - align',
            'AutoFormat . AutoParagraph' => false,
            'AutoFormat . RemoveEmpty' => true,
        ];
        /*Traduccion peude dar problemas con etiquetas html*/
        $p = new Purify();
        $translatedText = $p->clean($translatedText, $config);
        $deepLy = new DeepLy();
        $languageCode = $deepLy->detectLanguage($translatedText);
        $maxlng = $deepLy->getValidateTextLength();
        if (!empty($languageCode)) {
            if (($languageCode != $mylng)) {
                if (!empty($translatedText)) {
                    $translatedText = self::NuevoTraductor($translatedText, $languageCode, $mylng);
                    $t = $translatedText;
                }
            }
        }
        return $t;
    }

    public function NuevoTraductor($sms = null, $lngorg = 'es', $lngdst = 'es')
    {
        $trans = new GoogleTranslate();
        $result = $trans->translate($lngorg, $lngdst, $sms);
        return $result;
    }

    public function TransG1($lng = 'EN', $gr = 1)
    {
        $exitCode = Artisan::call('cache:clear');
        $lng = 'de';
        if ($gr == 1) {
            self::trad($lng, 'auth');
            echo "Auth<br>";
            self::trad($lng, 'city');
            echo "city<br>";
            self::trad($lng, "clientes");
            echo "clientes<br>";
        } elseif ($gr == 2) {
            self::trad($lng, "color");
            echo "color<br>";
            self::trad($lng, "desing");
            echo "desing<br>";
            self::trad($lng, "drop");
            echo "drop<br>";
            self::trad($lng, "gateway");
            echo "gateway<br>";
        } elseif ($gr == 3) {
            self::trad($lng, "landing");
            echo "landing<br>";
            self::trad($lng, "login");
            echo "login<br>";
            self::trad($lng, "notification");
            echo "notification<br>";
            self::trad($lng, "pagination");
            echo "pagination<br>";
            self::trad($lng, "passwords");
            echo "passwords<br>";
            self::trad($lng, "payment");
            echo "payment<br>";
        } elseif ($gr == 4) {
            self::trad($lng, "personal");
            echo "personal<br>";
            self::trad($lng, "photo");
            echo "photo<br>";
            self::trad($lng, "publicidad");
            echo "publicidad<br>";
            self::trad($lng, "raza");
            echo "raza<br>";
        } elseif ($gr == 5) {
            self::trad($lng, "sell");
            echo "sell<br>";
            self::trad($lng, "sex");
            echo "sex<br>";
            self::trad($lng, "style");
            echo "style<br>";
        } elseif ($gr == 6) {
            self::trad($lng, "stud");
            echo "stud<br>";
            self::trad($lng, "text");
            echo "text<br>";
        } elseif ($gr == 7) {
            self::trad($lng, "validation");
            echo "validation<br>";
            self::trad($lng, "video");
            echo "video<br>";
        } elseif ($gr == 8) {
            self::trad($lng, "country");
            echo "country<br>";
        } elseif ($gr == 9) {
            self::trad($lng, "state");
            echo "state<br>";
        } elseif ($gr == 10) {
            self::trad($lng, "portal");
            echo "portal<br>";
        } elseif ($gr == 11) {
            self::trad($lng, "horse");
            echo "horse<br>";
        } elseif ($gr == 12) {
            self::trad($lng, "users");
            echo "users<br>";
        }
    }

    public function trad($lng = 'en', $file = null)
    {
        $directory = base_path() . DS . 'resources' . DS . "lang" . DS . $lng;
        $files = File::allFiles($directory);
        $sal = [];
        $mylng = strtoupper('ES');
        foreach ($files as $k => $v) {
            if (is_file($v)) {
                //$exitCode = Artisan::call('cache:clear');
                $txta = "<?php return [\n";
                $txte = "\n];";
                $name = $v->getFilename();
                $ext = $v->getExtension();
                $name = str_replace(".$ext", "", $name);
                if (
                    //$name == "auth" or $name == "city"
                    //$name == "clientes" or $name == "color" or $name == "desing"
                    //$name == "drop" or $name == "gateway" or $name == "horse"
                    //$name == "landing"
                    //$name == "login" or $name == "notification"
                    //$name == "pagination" or $name == "passwords" or $name == "payment"  or $name == "personal"
                    //$name == "photo" or $name == "publicidad" or $name == "raza" or $name == "sell"
                    //$name == "sex"  or $name == "style"  or $name == "stud"
                    //$name == "text" or $name == "users"
                    //$name == "validation" or $name == "video"
                    //$name == "country"
                    //$name == "state"
                    //$name == "portal"
                    $name == $file
                ) {
                    echo "Procesando <strong>$name</strong><br>";
                    $traduc = trans($name);
                    $file = base_path() . DS . 'resources' . DS . 'lang' . DS . strtolower($lng) . DS . strtolower($v->getFilename());
                    File::put($file, $txta);
                    $sal[$name] = self::traducirarray($traduc, strtoupper($lng), strtoupper($v->getFilename()), $file);
                    File::append($file, $txte);
                    echo "Fin del proceso <strong>$name</strong><br><br>";
                }
            }
        }
        //$txt = self::imprime($sal);
    }

    public function traducirarray($ar = [], $lng = 'en', $gilename = 'txt . txt', $file)
    {
        $r = [];
        $deepLy = new DeepLy();
        $lng = strtoupper($lng);
        foreach ($ar as $k => $v) {
            if (!empty($v)) {
                if (is_array($v)) {
                    File::append($file, "'$k'=>[\n");
                    self::traducirarray($v, $lng, $gilename, $file);
                    File::append($file, "],\n");
                } else {
                    try {
                        //$va = self::NuevoTraductor($v, $lng, 'ES');
                        $va = $deepLy->translate($v, $lng, 'ES');
                    } catch (BagException $e) {
                        /*Si da error la traduccion, se mantiene el contenido*/
                        \Log::debug('La traduccion de ' . $v . " ha dado errores");
                        $va = self::NuevoTraductor($v, $lng, 'ES');
                    } catch (ProtocolException $e) {
                        $va = self::NuevoTraductor($v, $lng, 'ES');
                    } catch (CallException $e) {
                        /*Si da error la traduccion, se mantiene el contenido*/
                        \Log::debug('La traduccion de ' . $v . " ha dado errores");
                        $va = self::NuevoTraductor($v, $lng, 'ES');
                    }
                    $va = str_replace("'", "\\'", $va);
                    $txt = "'$k' => '$va',\n";
                    File::append($file, $txt);
                    //$r[$k] = $v;
                }
            }
        }
        //return $r;
    }

    public function unico($lng = 'en', $file = 'stud')
    {
        self::trad($lng, $file);
    }

    public function fakemail()
    {
        return view('backend . mail . base');
    }

    public function imprime($ar = [])
    {
        $txt = null;
        foreach ($ar as $k => $v) {
            if (is_array($v)) {
                $txt .= self::imprime($v);
            } else {
                $txt .= "\t$v,\n>";
            }
        }
        return $txt;
    }

    public function fakeValidacion()
    {
        $token = str_random(64);
        return view('backend . auth . passwords . changepassword', compact('token'));
    }

    public function CrearMapaSitioIndex()
    {
        $sitemaps = $this->CrearMapaSitioHorse();
        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        $sitemaps->store('xml', 'sitemap');
        /*
                $s = $sitemaps->render('xml');
                dd($s);
                dd($s->getContent());
        */
        //return view('vendor.sitemap.sitemapindex', compact('sitemaps'));
        return $sitemaps->render('sitemapindex');
    }

    public function CrearMapaSitioHorse()
    {
        $lng = Config::get('lenguaje');
        // create new sitemap object
        $sitemap = App::make('sitemap');
        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);
        //dd($sitemap);
        // check if there is cached sitemap and build new only if is not
        //if (!$sitemap->isCached()) {
        // add item to the sitemap (url, date, priority, freq)
        //$sitemap->add(route('portal'), Functions::AjustarFechaRfc3339(), '1.0', 'daily');
        //$sitemap->add(URL::to('page'), Carbon::now()->toRfc3339String(), '0.9', 'monthly');
        // add item with translations (url, date, priority, freq, images, title, translations)
        $translations = [
            ['language' => 'fr', 'url' => route('fr.portal')],
            ['language' => 'de', 'url' => route('fr.portal')],
            ['language' => 'es', 'url' => route('es.portal')],
            ['language' => 'en', 'url' => route('en.portal')],
            ['language' => 'nl', 'url' => route('nl.portal')],
            ['language' => 'it', 'url' => route('it.portal')],
        ];
        $sitemap->add(route('portal'), Functions::AjustarFechaRfc3339(), '1.0', 'daily', null, null, $translations);
        //$sitemap->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);
        /*
                // add item with images
                $images = [
                    ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
                    ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
                    ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
                ];
                $sitemap->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);
        */
        // get all posts from db
        $Yeguadas = Stud::all();
        foreach ($Yeguadas as $stud) {
            //$link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$horse_venta->slug]);
            $link = route('MyPageBase', ['slug' => $stud->slug]);
            $link2 = route('MyPage', ['slug' => $stud->slug]);
            //Con Yeguada, pero ahorita no intereza asi
            $ff = $stud->getPhotosModel();
            $imagen = [];
            $video = [];
            foreach ($ff as $k => $v) {
                $imagen[$k] = [
                    'url' => $v->url,
                    'title' => $stud->getName(),
                    'caption' => $stud->getName(),
                    'geo_location' => null,
                ];
            }
            $prioridad = '0.8';
            $frecuencia = 'daily';
            $titulo = $stud->getName();
            $translations = [];
            $translations2 = [];
            foreach ($lng as $k => $v) {
                $tte = route($k . '.MyPageBase', ['slug' => $stud->slug]);
                array_push($translations, ['language' => $k, 'url' => $tte]);
                $tte2 = route($k . '.MyPage', ['slug' => $stud->slug]);
                array_push($translations2, ['language' => $k, 'url' => $tte]);
            }
            $sitemap->add($link, Functions::AjustarFechaRfc3339($stud->updated_at), $prioridad, $frecuencia, $imagen, $titulo, $translations);
            $sitemap->add($link2, Functions::AjustarFechaRfc3339($stud->updated_at), $prioridad, $frecuencia, $imagen, $titulo, $translations2);
        }
        $horse_ventas = Horse::where(['tosold' => 1, 'publish' => 1, 'sold' => 0])->orderBy('created_at', 'desc')->get();
        foreach ($horse_ventas as $horse_venta) {
            $link = route('portalcaballo', ['horse' => $horse_venta->slug]);
            $ff = $horse_venta->getPhotoModel();
            $imagen = [];
            $video = [];
            foreach ($ff as $k => $v) {
                $imagen[$k] = [
                    'url' => $v->url,
                    'title' => $horse_venta->getName(),
                    'caption' => $horse_venta->getName(),
                    'geo_location' => null,
                ];
            }
            $prioridad = '0.8';
            $frecuencia = 'daily';
            $titulo = $horse_venta->getName();
            $translations = [];
            foreach ($lng as $k => $v) {
                $tte = route($k . '.portalcaballobase', ['slug' => $horse_venta->GetUrlPortalLenguaje()]);
                array_push($translations, ['language' => $k, 'url' => $tte]);
            }
            $sitemap->add($link, Functions::AjustarFechaRfc3339($horse_venta->updated_at), $prioridad, $frecuencia, $imagen, $titulo, $translations);
        }
        foreach ($horse_ventas as $horse_venta) {
            //$link =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$horse_venta->slug]);
            $link = route('MyHorseDetailedBase', ['horse' => $horse_venta->GetUrlLenguaje(), 'stud' => $horse_venta->getYeguada()->slug]);
            //Con Yeguada, pero ahorita no intereza asi
            $ff = $horse_venta->getPhotoModel();
            $imagen = [];
            $video = [];
            foreach ($ff as $k => $v) {
                $imagen[$k] = [
                    'url' => $v->url,
                    'title' => $horse_venta->getName(),
                    'caption' => $horse_venta->getName(),
                    'geo_location' => null,
                ];
            }
            $prioridad = '0.8';
            $frecuencia = 'daily';
            $titulo = $horse_venta->getName();
            $translations = [];
            $slug = $horse_venta->GetUrlLenguaje();
            if (empty($slug)) {
                $horse_venta->push();
                $slug = $horse_venta->GetUrlLenguaje();
            }
            foreach ($lng as $k => $v) {
                $tte =
                    route($k . '.MyHorseDetailedBase', ['horse' => $slug, 'stud' => $horse_venta->getYeguada()->slug]);
                //\Log::critical('Revisa el detalle de caballo en 1290 ' . $titulo . "\n" . $slug . "\n" . $tte);
                array_push($translations, ['language' => $k, 'url' => $tte]);
            }
            $sitemap->add($link, Functions::AjustarFechaRfc3339($horse_venta->updated_at), $prioridad, $frecuencia, $imagen, $titulo, $translations);
        }
        //}
        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap;
        return $sitemap->render('xml');
    }

    public function CrearMapaSitioHorse2()
    {
        // create sitemap
        $sitemap_venta = App::make("sitemap");
        // add items
        $horse_ventas = Horse::where(['tosold' => 1, 'publish' => 1])->orderBy('created_at', 'desc')->get();
        foreach ($horse_ventas as $horse_venta) {
            /*
               $sitemap_posts->add($post->slug, $post->modified, $post->priority, $post->freq);
            */
//        $sitemap_venta->add($horse_venta->slug, $horse_venta->updated_at, );
        }
        dd($sitemap_venta);
        // create file sitemap-posts.xml in your public folder (format, filename)
        $sitemap_venta->store('xml', 'sitemap-posts');
        // create sitemap
        $sitemap_tags = App::make("sitemap");
        // add items
        $tags = DB::table('tags')->get();
        foreach ($tags as $tag) {
            $sitemap_tags->add($tag->slug, null, '0.5', 'weekly');
        }
        // create file sitemap-tags.xml in your public folder (format, filename)
        $sitemap_tags->store('xml', 'sitemap-tags');
        // create sitemap index
        $sitemap = App::make("sitemap");
        // add sitemaps (loc, lastmod (optional))
        $sitemap->addSitemap(URL::to('sitemap-posts'));
        $sitemap->addSitemap(URL::to('sitemap-tags'));
        // create file sitemap.xml in your public folder (format, filename)
        $sitemap->store('sitemapindex', 'sitemap');
    }

    public function PrepararCaballo(Request $r)
    {
        $nombre = $r->nombre;
        $horse = Horse::where('name', $nombre)->first();
        $s = null;
        if (!empty($horse)) {
            $stud = Stud::find($horse->studs_id);
            if (!empty($stud)) {
                $url = route('MyHorseDetailedBase', ['stud' => $stud->slug, 'horse' => $horse->GetUrlLenguaje()]);
                $s = Functions::facebookDebugger($url);
            }
        }
        return $s;
    }

    public function RetornaCssTema1(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v1.css', compact('stud'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetronoCompreso($type, $text, $tiempo = 0)
    {
        $age = (Functions::BuscarEnString($type, 'css') == true) ? 2592000 : 60;
        $age = (Functions::BuscarEnString($type, 'javascript') == true) ? 2592000 : $age;
        $age = (Functions::BuscarEnString($type, 'html') == true) ? 60 : $age;
        if ($tiempo != 0) {
            $age = $tiempo;
        }
        $hoy = Carbon::now();
        $dat = $hoy->format('D, d M Y H:i:s \G\M\T');
        $date = $hoy->addDay()->format('D, d M Y H:i:s \G\M\T');
        $response = response($text, 200)
            ->header('Content-Type', $type);
        $buffer = $this->ComprimirText($response->getContent());
        $response->setContent($buffer)->
        header('expires', $date)->
        header('date', $dat)->
        header('vary', 'User-Agent')->
        header('Cache-Control', "max-age=$age, public");
        //ini_set("pcre.recursion_limit", "16777");
        //ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
        return $response;
    }

    public function ComprimirText($texto = null)
    {
        $buffer = $texto;
        if (strpos($buffer, '<pre>') !== false) {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                //'//*[^\[](.*?)[^\]]*//s' => '',
                "/<\?php/" => '<?php ',
                "/\r/" => '',
                "/>\n</" => '><',
                "/>\s+\n</" => '><',
                "/>\n\s+</" => '><'
            );
        } else {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                //'//*[^\[](.*?)[^\]]*//s' => '',
                "/<\?php/" => '<?php ',
                "/\n([\S])/" => '$1',
                "/\r/" => '',
                "/\n/" => '',
                "/\t/" => '',
                "/ +/" => ' '
            );
        }
        // Remove htmlcomment;
        $additionaly = array(
            '/<!--[^\[](.*?)[^\]]-->/s' => '',
            // strip whitespaces after tags, except space
            '/\>[^\S ]+/s' => '>',
            // strip whitespaces before tags, except space
            '/[^\S ]+\</s' => '<',
            // shorten multiple whitespace sequences
            '/(\s)+/s' => '\\1',
            // Remove htmlcomment
            '!/\*.*?\*/!s' => '',
            '/\n\s*\n/' => ''
        );
        // $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
        $buffer = preg_replace(array_keys($additionaly), array_values($additionaly), $buffer);
        $buffer = $buffer = $this->compress($buffer);
        return $buffer;
    }

    public function compress($buffer)
    {
        /**
         * To remove useless whitespace from generated HTML, except for Javascript.
         * [Regex Source]
         * https://github.com/bcit-ci/codeigniter/wiki/compress-html-output
         * http://stackoverflow.com/questions/5312349/minifying-final-html-output-using-regular-expressions-with-codeigniter
         */
        $regexRemoveWhiteSpace = '%# Collapse ws everywhere but in blacklisted elements.
        (?>             # Match all whitespaces other than single space.
          [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
        | \s{2,}        # or two or more consecutive-any-whitespace.
        ) # Note: The remaining regex consumes no text at all...
        (?=             # Ensure we are not in a blacklist tag.
          (?:           # Begin (unnecessary) group.
            (?:         # Zero or more of...
              [^<]++    # Either one or more non-"<"
            | <         # or a < starting a non-blacklist tag.
              (?!/?(?:textarea|pre)\b)
            )*+         # (This could be "unroll-the-loop"ified.)
          )             # End (unnecessary) group.
          (?:           # Begin alternation group.
            <           # Either a blacklist start tag.
            (?>textarea|pre)\b
          | \z          # or end of file.
          )             # End alternation group.
        )  # If we made it here, we are not in a blacklist tag.
        %ix';
        $regexRemoveWhiteSpace = '%(?>[^\S ]\s*| \s{2,})(?=(?:(?:[^<]++| <(?!/?(?:textarea|pre)\b))*+)(?:<(?>textarea|pre)\b|\z))%ix';
        $re = '%# Collapse whitespace everywhere but in blacklisted elements.
        (?>             # Match all whitespans other than single space.
          [^\S ]\s*     # Either one [\t\r\n\f\v] and zero or more ws,
        | \s{2,}        # or two or more consecutive-any-whitespace.
        ) # Note: The remaining regex consumes no text at all...
        (?=             # Ensure we are not in a blacklist tag.
          [^<]*+        # Either zero or more non-"<" {normal*}
          (?:           # Begin {(special normal*)*} construct
            <           # or a < starting a non-blacklist tag.
            (?!/?(?:textarea|pre|script)\b)
            [^<]*+      # more non-"<" {normal*}
          )*+           # Finish "unrolling-the-loop"
          (?:           # Begin alternation group.
            <           # Either a blacklist start tag.
            (?>textarea|pre|script)\b
          | \z          # or end of file.
          )             # End alternation group.
        )  # If we made it here, we are not in a blacklist tag.
        %Six';
        // $new_buffer = preg_replace('/<!--(.*|\n)-->/Uis', " ", sanitize_output($buffer));
        // $new_buffer = preg_replace('/\s+/', " ", sanitize_output($new_buffer));
        $new_buffer = preg_replace($regexRemoveWhiteSpace, " ", $this->sanitize_output($buffer));
        // We are going to check if processing has working
        if ($new_buffer === null) {
            $new_buffer = $buffer;
        }
        return $new_buffer;
    }

    public function sanitize_output($buffer)
    {
        $search = array(
            '/\>[^\S ]+/s', // strip whitespaces after tags, except space
            '/[^\S ]+\</s', // strip whitespaces before tags, except space
            '/(\s)+/s', // shorten multiple whitespace sequences
            '!/\*.*?\*/!s', // Remove htmlcomment
            '/\n\s*\n/'
        ); // Remove htmlcomment
        $replace = array(
            '>',
            '<',
            '\\1',
            '',
            ''
        );
        $buffer = preg_replace($search, $replace, $buffer);
        return $buffer;
    }

    public function RetornaCssPortal()
    {
        $txt = view('portal.css')->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsLazy()
    {
        $txt = view('lazy')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaBSjs()
    {
        $txt = view('assets.js.btimepicker')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsModer()
    {
        $txt = view('assets.js.modernizr')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsFullCalebdar()
    {
        $txt = view('assets.js.fullcalendar')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsVideo()
    {
        $txt = view('backend.content.video.js')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsFoto()
    {
        $txt = view('backend.content.photo.js')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsFotoDropZone()
    {
        $txt = view('backend.content.photo.dropzonefoto')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsPortal()
    {
        $txt = view('portal.js')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsTabla()
    {
        $txt = view('tablacaballoJS')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssPlanes()
    {
        $txt = view('backend.content.plan.css')->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsPlanes()
    {
        $txt = view('backend.content.plan.js')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssLista()
    {
        /*
        $txt = ;
        return $this->RetronoCompreso('text/css', $txt);
        */
        return $this->RetronoCompreso('text/css', view('portal.listas.css')->render());
    }

    public function RetornaJsLista()
    {
        return $this->RetronoCompreso('text/javascript', view('portal.listas.js')->render());
        return response($txt, 200)->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsTema1(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v1.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssTema3(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v3.css', compact('stud'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsTema3(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v3.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    /*****************************************************/
    public function RetornaCssTema4(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v4.css', compact('stud'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsTema4(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v4.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssTema5(Stud $slug = null)
    {
        $stud = $slug;
        return $this->RetronoCompreso('text/css', view('frontend.landing.v5.css', compact('stud'))->render());
    }

    public function RetornaCssTema6(Stud $slug = null)
    {
        $stud = $slug;
        return $this->RetronoCompreso('text/css', view('frontend.landing.v6.css', compact('stud'))->render());
    }

    public function RetornaCssTrabajoTema6(Stud $slug = null)
    {
        $stud = $slug;
        return $this->RetronoCompreso('text/css', view('frontend.landing.v6.csstrabajo', compact('stud'))->render());
    }

    public function RetornaJsTema5(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v5.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsTema6(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v6.js', compact('stud'))->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsStudJs()
    {
        $user = \Auth::user();
        $txt = view('backend.content.stud.js', compact('user'))->render();
        return $this->RetronoCompreso('text/javascript', $txt);
        return response($txt, 200)->header('Content-Type', 'text/javascript');
    }

    /******************************************************/
    public function RetornaCssTema2(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v2.css', compact('stud'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsTema2(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.v2.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssTema0(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.studs.css', compact('stud'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');
    }

    public function RetornaJsTema0(Stud $slug = null)
    {
        $stud = $slug;
        $txt = view('frontend.landing.studs.js', compact('stud'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaJsPanel()
    {
        $user = \Auth::user();
        $txt = view('backend.js', compact('user'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');
    }

    public function RetornaCssPanel()
    {
        $user = \Auth::user();
        $txt = view('backend.css', compact('user'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)->header('Content-Type', 'text/css');
    }

    public function RetornaJsTime()
    {
        $txt = view('assets.js.timepicker')->render();
        return $this->RetronoCompreso('text/javascript', $txt);
    }

    public function RetornaJsFaceCalendar()
    {
        $user = \Auth::user();
        $adm = $user->isAdm();
        if ($adm != true) {
            $stud = $user->Yeguada();
            $st_id = 0;
            if (!empty($stud)) {
                $st_id = $stud->id;
            }
            //$social = $stud->Social()->where('type', 1)->first();
            $publicaciones = Facebookpost::where([
                'user_post' => $user->id,
                'user_make' => $user->id,
                /*'studs_id' => $st_id,*/
            ])->get();
            //$publicaciones = $stud->FacebookPost()->get();
            $txt = view('assets.js.FacebookJs', compact('stud', 'publicaciones'))->render();
        } else {
            $publicaciones = Facebookpost::where([
                'user_post' => $user->id,
                'user_make' => $user->id,
                /*'studs_id' => 0,*/
            ])->get();
            $txt = view('assets.js.FacebookJs', compact('publicaciones'))->render();
        }
        return $this->RetronoCompreso('text/javascript', $txt, 5);
    }

    public function RetornaCssTime()
    {
        $txt = view('assets.css.timepicker')->render();
        return $this->RetronoCompreso('text/css', $txt);
    }

    public function RetornaCssMail()
    {
        $user = \Auth::user();
        $txt = view('backend.content.exportar.css', compact('user'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)->header('Content-Type', 'text/css');
    }

    public function RetornaJsMail()
    {
        $user = \Auth::user();
        $txt = view('backend.content.exportar.js', compact('user'))->render();
        return $this->RetronoCompreso('text/css', $txt);
        return response($txt, 200)->header('Content-Type', 'text/javascript');
    }

    public function ImagenCache($folder, $type, $w, $h, $name)
    {
        /*No sirve*/
        $w = (integer)Functions::SoloNumeros($w);
        $h = (integer)Functions::SoloNumeros($h);
        $w = $w * 1;
        $h = $h * 1;
        $img = Photo::where('name', $name)->first();
        if (empty($img)) {
            $img = Image::canvas($w, $h, '#ffffff');
            return $img->response();
        }
        $tsd = ['w' => $w, 'h' => $h];
        //$img = Image::make($img->getFolder().$img->getName());
        $ig = Image::cache(function ($img) use ($tsd) {
            $img = Image::make($img->getFolder() . $img->getName())->Resize($tsd['w'], $tsd['h']);
            dd($img);
        });
        return $ig;
        if (empty($t)) {
            $img = Image::canvas($w, $h, '#ffffff');
            return $img->response();
        }
        $ty = explode(";base64", $t);
        $ty = $ty[0];
        $ty = Functions::BuscarReemplazarString($ty, '', 'data:');
        $en = 'png';
        if ($ty == "image/jpeg") {
            $en = 'jpeg';
        }
        return response($t, 200)
            ->header('Content-Type', $ty);
        return $img->response();
        return Response::make($t, 200, array('Content-Type' => $ty));
        return response($img->encode($en), 200)->header('Content-Type', $ty);
    }

    public function PreviewCaballos($ids)
    {
        $ds = explode(',', $ids);
        $w = [];
        if (count($ds) == 1)
            foreach ($ds as $f => $s) {
                $sd = Horse::where('slug', $s)->first();
                if (!empty($sd)) {
                    array_push($w, $sd);
                }
            }
        elseif (count($ds) > 1) {
            $w = Horse::wherein('slug', $ds)->get();
        } else {
            return redirect()->route('portal');
        }
        if (count($w) == 1) {
            $horses = $w[0];
            $user = $horses->getuser();
            $stud = $horses->getYeguada();
            $titulo = '';
            $contenido = '';
            $print = 1;
            $d = view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido', 'print'))->render();
            $s = new CssToInlineStyles();
            $s = $s->convert($d);
            return $s;
        } elseif (count($w) > 1) {
            $horses = $w;
            $studs = $w->pluck('studs_id');
            $w = Stud::wherein('id', $studs)->get();
            $user = $w[0]->getUserModel();
            $stud = $w[0];
            $titulo = '';
            $contenido = '';
            $print = 1;
            $d = view('backend.Masivo.saturno-v', compact('horses', 'user', 'stud', 'titulo', 'contenido', 'print'))->render();
            $s = new CssToInlineStyles();
            $s = $s->convert($d);
            return $s;
        } else {
            return redirect()->route('portal');
        }
        dd($w);
    }

    public function MonedasCaballo(Horse $slug = null)
    {
        $horse = $slug;
        if (empty($horse)) {
            $sal['status'] = 400;
        } else {
            $s = $horse->ObtenerPrecioEurSql();
            $da = '';
            if (!empty($s)) {
                foreach ($s as $k => $v) {
                    if (Functions::BuscarEnString($k, 'moneda_')) {
                        $da .= str_replace('moneda_', '', $k) . " " . Functions::AjustarNumeroMil($v) . "<br>";
                    }
                }
                $sal['cubri'] = '';
                $sal['precio'] = $da;
                $sal['data'] = $s;
                $sal['status'] = 200;
            } else {
                $sal['h'] = $horse->id;
                $sal['cubri'] = '';
                $sal['precio'] = 0;
                $sal['data'] = $s;
                $sal['status'] = 200;
            }

        }
        return Functions::RetornaJson($sal);
    }

    public function CubricionCaballo(Horse $slug = null)
    {
        $horse = $slug;
        if (empty($horse)) {
            $sal['status'] = 400;
        } else {
            $sa = $horse->ObtenerPrecioEurSql(1);
            $das = '';
            if (!empty($sa)) {

                foreach ($sa as $k => $v) {
                    if (Functions::BuscarEnString($k, 'moneda_')) {
                        $das .= str_replace('moneda_', '', $k) . " " . Functions::AjustarNumeroMil($v) . "<br>";
                    }
                }
                $sal['tool'] = $das;
                $sal['cubri'] = $das;
                $sal['precio'] = '';
                $sal['data'] = $sa;
                $sal['status'] = 200;
            } else {
                $sal['tool'] = '';
                $sal['h'] = $horse->id;
                $sal['cubri'] = '';
                $sal['precio'] = '';
                $sal['data'] = $sa;
                $sal['status'] = 200;
            }

        }
        return Functions::RetornaJson($sal);
    }

    public function ObtenerPrecioCaballo($slug = null)
    {
        $horse = (new Functions())->BuscarCaballoSlug($slug);
        if (empty($horse)) {
            $horse = Horse::where('slug', $slug)->first();
        }
        $Coins = \Session::get('moneda');
        $Coins = empty($Coins) ? 'EUR' : $Coins;
        if (empty($horse)) {
            $sal['status'] = 400;
        } else {
            $sa = $horse->ObtenerPrecioEurSql();
            $das = '';
            $b = 0;
            foreach ($sa as $k => $v) {
                if (Functions::BuscarEnString($k, 'moneda_')) {
                    $ck = str_replace('moneda_', '', $k);
                    $das .= $ck . " " . Functions::AjustarNumeroMil($v) . "<br>";
                    if (strtoupper($ck) == $Coins) {
                        $b = Functions::AjustarNumeroMil($v);
                    }
                }
            }
            if (empty($b)) {
                $b = $sa->price;
                $m = $sa->simbolo;
            } else {
                $m = Moneda::where('small', $Coins)->first()->simbolo;
            }
            $sal['precio'] = $b;
            $da = $m;
            $sal['moneda'] = $da;
            $sal['data'] = $sa;
            $sal['tool'] = $das;
            $sal['status'] = 200;
        }
        return Functions::RetornaJson($sal);
    }

    public function ObtenerPrecioCaballos(Request $r)
    {
        $Coins = \Session::get('moneda');
        $Coins = empty($Coins) ? 'EUR' : $Coins;
        $sal['re'] = $r->all();
        $da = Moneda::where('small', $Coins)->first()->simbolo;
        $sal = [];
        $r = $r->all();
        $f = [];
        foreach ($r as $k => $v) {
            $d = [];
            $horse = null;
            //$horse = Horse::where('slug', $v)->first();
            $horse = (new Functions())->BuscarCaballoSlug($v);
            if (empty($horse)) {
                $horse = Horse::where('slug', $v)->first();
            }
            $d[$k] = self::ObtenerPrecioCaballoNo($horse);
            array_push($f, $d);
        }
        $sal['horses'] = $f;
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function ObtenerPrecioCaballoNo($slug = null)
    {
        if (is_string($slug)) {
            $horse = (new Functions())->BuscarCaballoSlug($slug);
            if (empty($horse)) {
                $horse = Horse::where('slug', $slug)->first();
            }
        } elseif (is_object($slug)) {
            $horse = $slug;

        }
        $Coins = \Session::get('moneda');
        $monedas = \Session::get('monedas');
        if (empty($monedas)) {
            /*AJUSTE DE MONEDAS*/
            $t = Moneda::select('nombre', 'simbolo', 'small', 'valor')->where('status', 1)->get()->toArray();
            \Session::put('monedas', $t);
            \Session::put('monedas', $t);
        }
        $Coins = empty($Coins) ? 'EUR' : strtoupper($Coins);
        $sal = [];
        $m = null;
        $b = null;
        $das = '';
        if (!empty($horse)) {
            $sa = $horse->ObtenerPrecioEurSql();
            if (!empty($horse->price)) {
                if (!empty($sa)) {
                    $b = $sa->price;
                    $m = $sa->simbolo;
                } else {
                    $b = 0;
                    $m = '';
                }
                foreach ($monedas as $k => $v) {

                    $small = strtoupper($v['small']);
                    $sim = $v['simbolo'];
                    try {
                        $t = $sa->{'moneda_' . $small};
                        $mon = strtoupper($horse->monedabase);
                        if ($small == 'EUR' and $mon == $small) {
                            $t = $horse->price;
                        }
                        //$ck = strtoupper(str_replace('moneda_', '', $v));
                        if ($small == $Coins) {
                            $b = Functions::AjustarNumeroMil($t);
                            $m = $sim;
                            $das .= $small . " " . Functions::AjustarNumeroMil($horse->price) . "<br>";
                        } else {
                            if ($small != $Coins) {
                                $das .= $small . " " . Functions::AjustarNumeroMil($t) . "<br>";
                            }
                        }
                    } catch (\ErrorException $e) {

                    }
                }
                /*
                foreach ($sa as $k => $v) {
                    if (Functions::BuscarEnString($k, 'moneda_')) {
                        $ck = strtoupper(str_replace('moneda_', '', $k));
                        $v = empty($v) ? $sa->price : (($ck == strtoupper($horse->small)) ? $sa->price : $v);
                        if ($ck == $Coins) {
                            $b = Functions::AjustarNumeroMil($v);
                            $m = Moneda::where('small', $ck)->first()->simbolo;
                        } else {
                            $das .= $ck . " " . Functions::AjustarNumeroMil($v) . "<br>";
                        }
                    }
                }
                */
                $b = !empty($b) ? $b : 0;
                $m = !empty($m) ? $m : Moneda::where('small', $Coins)->first()->simbolo;
                $sal = [
                    'slug' => $horse->slug,
                    'precio' => $b,
                    'tool' => $das,
                    'moneda' => $m,
                    'data' => $sa,
                ];
            }
        }
        return $sal;
    }

    public function ObtenerPreciosCaballos(Request $r)
    {
        $Coins = \Session::get('moneda');
        $Coins = empty($Coins) ? 'EUR' : $Coins;
        $da = Moneda::where('small', $Coins)->first()->simbolo;
        $sal = [];
        $r = $r->all();
        //return Functions::RetornaJson($r);
        $f = [];
        $d = [];
        foreach ($r as $k => $v) {
            $d = [];
            $t = $k;
            /*
            $sa[$v] = $k;
            return Functions::RetornaJson($sa);
            */
            $horse = (new Functions())->BuscarCaballoSlug($v);
            if (empty($horse)) {
                $horse = Horse::where('slug', $v)->first();
            }
            //$horse = Horse::where('slug', $v)->first();
            if (!empty($horse)) {
                $s = $horse->ObtenerPrecioEurSql(0);
                $da = '';
                $mon = strtoupper($horse->monedabase);
                if (!empty($s)) {
                    foreach ($s as $df => $a) {
                        if (Functions::BuscarEnString($df, 'moneda_')) {
                            $small = strtoupper(str_replace('moneda_', '', $df));
                            if ($small == 'EUR' and $mon == $small) {
                                $t = $horse->price;
                            } else {
                                $t = $a;
                            }
                            $da .= $small . " " . Functions::AjustarNumeroMil($t) . "<br>";
                        }
                    }
                }
                $d[$t] = [
                    'slug' => $horse->slug,
                    'cubri' => '',
                    'precio' => $da,
                    'data' => $s,
                ];
                array_push($f, $d);
            }
        }
        $sal['horses'] = $f;
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function ObtenerCubricionesCaballos(Request $r)
    {
        $Coins = \Session::get('moneda');
        $Coins = empty($Coins) ? 'EUR' : $Coins;
        $da = Moneda::where('small', $Coins)->first()->simbolo;
        $sal = [];
        $r = $r->all();
        //return Functions::RetornaJson($r);
        $f = [];
        $d = [];
        foreach ($r as $k => $v) {
            $d = [];
            $t = $k;
            /*
            $sa[$v] = $k;
            return Functions::RetornaJson($sa);
            */
            $horse = null;
            //$horse = Horse::where('slug', $v)->first();
            $horse = (new Functions())->BuscarCaballoSlug($v);
            if (empty($horse)) {
                $horse = Horse::where('slug', $v)->first();
            }
            if (!empty($horse)) {
                $d[$t] = self::ObtenerCubriCaballoNo($horse);
            }
        }
        $sal['horses'] = $d;
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function ObtenerCubriCaballoNo(Horse $slug)
    {
        $horse = $slug;
        $Coins = \Session::get('moneda');
        $monedas = \Session::get('monedas');
        if (empty($monedas)) {
            /*AJUSTE DE MONEDAS*/
            $t = Moneda::select('nombre', 'simbolo', 'small', 'valor')->where('status', 1)->get()->toArray();
            \Session::put('monedas', $t);
            \Session::put('monedas', $t);
        }
        $Coins = empty($Coins) ? 'EUR' : strtoupper($Coins);
        $sal = [];
        $m = null;
        $b = null;
        $das = '';
        $f = "-$Coins- ";
        if (!empty($horse)) {
            $sa = $horse->ObtenerPrecioEurSql(1);
            if (!empty($horse->cubri)) {
                if (!empty($sa)) {
                    $b = $sa->cubri;
                    $m = $sa->simbolo;
                } else {
                    $b = 0;
                    $m = '';
                }
                foreach ($monedas as $k => $v) {
                    $small = strtoupper($v['small']);
                    $sim = $v['simbolo'];
                    try {
                        $t = $sa->{'moneda_' . $small};
                        $mon = strtoupper($horse->monedabase);
                        if ($small == 'EUR' and $mon == $small) {
                            $t = $horse->cubri;
                        }
                        if ($small == $Coins) {
                            $b = Functions::AjustarNumeroMil($t);
                            $m = $sim;
                            $das .= $small . " " . Functions::AjustarNumeroMil($t) . "<br>";
                        } else {
                            $das .= $small . " " . Functions::AjustarNumeroMil($t) . "<br>";
                        }
                    } catch (\ErrorException $e) {
                    }
                }
                /*
                foreach ($sa as $k => $v) {
                    if (Functions::BuscarEnString($k, 'moneda_')) {
                        $ck = strtoupper(str_replace('moneda_', '', $k));
                        $v = empty($v) ? $sa->price : (($ck == strtoupper($horse->small)) ? $sa->price : $v);
                        if ($ck == $Coins) {
                            $b = Functions::AjustarNumeroMil($v);
                            $m = Moneda::where('small', $ck)->first()->simbolo;
                        } else {
                            $das .= $ck . " " . Functions::AjustarNumeroMil($v) . "<br>";
                        }
                    }
                }
                */
                $b = !empty($b) ? $b : 0;
                $m = !empty($m) ? $m : Moneda::where('small', $Coins)->first()->simbolo;
                $sal = [
                    'slug' => $horse->slug,
                    'cubri' => $b,
                    'tool' => $das,
                    'moneda' => $m,
                    'data' => $sa,
                ];
            }
        }
        return $sal;
    }
}

