<?php

namespace App\Http\Controllers;

use App\Models\BuscarCaballo;
use App\Models\Country;
use App\Models\Horse;
use App\Models\Moneda;
use App\Models\Notification;
use App\Models\Photo;
use App\Models\Raz;
use App\Models\Raza;
use App\Models\Reporte;
use App\Models\Stud;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class PortalController extends Controller
{
    //
    public function EstablecerLenguaje(Request $r)
    {
        $agent = new Agent();
        /*Cambia el idioma dependiendo del navegador*/
        $lng = $agent->languages();
        $total = \Config::get('otra.lenguajes');
        $encontrado = 0;
        $lang = \Session::get('lang');

        if (empty($lang)) {
            foreach ($lng as $k => $v) {
                if ($encontrado == 0) {
                    foreach ($total as $f => $g) {
                        if (strtolower($v) == $g) {
                            $encontrado = 1;
                            \Session::put('lang', $g);
                        }
                    }
                }

            }
            if ($encontrado == 0) {
                \Session::put('lang', 'en');
            }
        }

    }

    public function index(Request $r)
    {
        $error = \Session::all();
        $lang = new PublicController($r);
        $lang->EstablecerLenguaje($r);
        $sms = (isset($error['flash_message'])) ? $error['flash_message'] : null;

        \Session::flash("flash_message", $sms);
        \Session::flash('Error', $sms);

        if (!empty($sms)) {
            \Session::flash("flash_message", $sms);
            flash($sms)->error();
            \Session::flash('Error', $sms);
        }
        $mx = \Session::get('mexico');
        $pre = \Session::get('pre');
        $spa = \Session::get('espana');
        $colombia = \Session::get('colombia');
        if ($mx == true) {
            /*Para mexico nada mas*/
            $country = Country::Corto('MX')->first()->id;
            $stud_id = Stud::where('country', $country)->get()->pluck('id');
            $horses = Horse::VentaPublica()->
            wherein('studs_id', $stud_id)->
            orderby('id', 'desc')->take(18)->get();
        } elseif ($spa == true) {
            /*Para mexico nada mas*/
            $country = Country::Corto('ES')->first()->id;
            $stud_id = Stud::where('country', $country)->get()->pluck('id');
            $horses = Horse::VentaPublica()->
            wherein('studs_id', $stud_id)->
            orderby('id', 'desc')->take(18)->get();
        } elseif ($colombia == true) {
            /*Para Colombia nada mas*/
            $country = Country::Corto('CO')->first()->id;
            $stud_id = Stud::where('country', $country)->get()->pluck('id');
            $horses = Horse::VentaPublica()->
            wherein('studs_id', $stud_id)->
            orderby('id', 'desc')->take(18)->get();
        } elseif ($pre == true) {
            /*Para Colombia nada mas*/
            $horses = Horse::VentaPublica()->where('raza', 25)->
            orderby('id', 'desc')->take(18)->get();
        } else {

            $horses = Horse::VentaPublica()->orderby('id', 'desc')->take(18)->get();
        }
        return view('portal.landing', compact('horses'));
    }

    public function indexAD(Request $r)
    {

        $error = \Session::all();
        $lang = new PublicController($r);
        $lang->EstablecerLenguaje($r);
        //$this->EstablecerLenguaje($r); /*Para landing home tambien*/

        $sms = (isset($error['flash_message'])) ? $error['flash_message'] : null;

        \Session::flash("flash_message", $sms);
        \Session::flash('Error', $sms);

        if (!empty($sms)) {
            \Session::flash("flash_message", $sms);
            flash($sms)->error();
            \Session::flash('Error', $sms);
        }
        $pub[0] = url('img/pub/uno.png');
        $pub[1] = url('img/pub/dos.png');
        $pub[2] = url('img/pub/tres.png');

        $horses = Horse::where(['tosold' => 1, 'publish' => 1, 'sold' => 0])->orderby('id', 'desc')->take(24)->get();
        return view('portal.landing', compact('horses'));
    }

    public function PorRaza(Request $r, $raza = 0, $orden = null)
    {
        //$tiempo = (new Functions())->MicroTiempo("\n\n\n\nInicio ");

        if (isset($r->texto)) {
            $texto = $r->texto;

        }
        $paginacion = 10;
        $data = $r->all();
        $ra['texto'] = '';
        $ra['sex'] = '';
        $ra['doma'] = '';
        $ra['color'] = '';
        $ra['country'] = '';
        $ra['state'] = '';
        $ra['pricemin'] = '';
        $ra['pricemax'] = '';
        $ra['raisedmax'] = '';
        $ra['raisedmin'] = '';
        $ra['raza'] = '';
        $ra['texto'] = '';
        $ra['orden'] = '';
        $ids = [];
        $studsi = [];
        $moneda = \Session::get('moneda');
        if (empty($moneda)) {
            $moneda = 'EUR';
        }

        $cubricion = isset($r->cubricion) ? $r->cubricion : null;
        $orden = isset($r->orden) ? $r->orden : null;
        $texto = isset($r->texto) ? $r->texto : null;
        $raza = isset($r->raza) ? $r->raza : null;

        if (empty($raza)) {
            $raza = isset($r->razas) ? $r->razas : null;
        }
        $raisedmin = isset($r->raisedmin) ? $r->raisedmin : 0; // min -
        $raisedmax = isset($r->raisedmax) ? $r->raisedmax : 0; // 0 - max
        $pricemin = isset($r->pricemin) ? $r->pricemin : 0;
        $pricemax = isset($r->pricemax) ? $r->pricemax : 0;
        $country = isset($r->country) ? $r->country : 0;
        $spa = \Session::get('espana');
        $mx = \Session::get('mexico');
        $colombia = \Session::get('colombia');
        $hc = null;

        $pre = \Session::get('pre');
        $pre = (!empty($pre)) ? $pre : false;
        if ($mx == true) {
            /*Para mexico nada mas*/
            $country = Country::Corto('MX')->first()->id;
        } elseif ($spa == true) {
            /*Para mexico nada mas*/
            $country = Country::Corto('ES')->first()->id;
        } elseif ($colombia == true) {
            /*Para mexico nada mas*/
            $country = Country::Corto('CO')->first()->id;
        $f_img = [
            url('landing/images/slider/1/2.jpg'),
            url('landing/images/slider/1/6.jpg'),
            url('landing/images/slider/1/9.jpg'),
            url('landing/images/slider/1/8.jpg'),
        ];
        $imagen = $f_img[rand(0, 3)];

        $monedaObj = Moneda::Cambio($moneda)->first();
        $multiplo = $monedaObj ? $monedaObj->valor : 1;
        if (!empty($pricemin)) {
            $pricemin = $multiplo * $pricemin;
        }
        if (!empty($pricemax)) {
            $pricemax = $multiplo * $pricemax;
        }

        $sex = isset($r->sex) ? $r->sex : null;
        $doma = isset($r->doma) ? $r->doma : null;
        $color = isset($r->color) ? $r->color : null;
        $state = isset($r->state) ? $r->state : null;
        $ids = [];

        $spa = \Session::get('espana');
        $mx = \Session::get('mexico');
        $colombia = \Session::get('colombia');
        $pre = \Session::get('pre');

        //$sal['dds'] = $data;
$a=[];
$b=[];
$c=[];
        if (!empty($texto)) {
            $texto = strip_tags(Functions::LimpiarTextoHard($texto));
            $lng = strlen($texto);

            if ($lng > 3) {
                $segundo = 1;
                $ble = $ids;
                $ids = [];
                $stids = [];
//Nuevo tipo de busqueda
                $ids = BuscarCaballo::search($texto)->get()->pluck('horse_id');
                $a = $ids;
                $ids = Horse::VentaPublica()->wherein('id', $ids)->get()->pluck('id');
                $b = $ids;



                //Bsuscamos string de nombre o lo que sea
                /*
                $std = Stud::search($texto)->get()->pluck('id');
                if (count($std) != 0) {
                    foreach ($std as $v) {
                        array_push($stids, $v);

                    }
                }
                */
                //Buscar pais de yeguadas
                /*
                $cty = Country::search($texto)->get()->pluck('id');
                if (count($cty) != 0) {
                    $st = Stud::wherein('country', $cty)->get()->pluck('id');
                    foreach ($st as $v) {
                        array_push($stids, $v);

                    }
                }
                */

                //Buscar caballos
                /*
                $hrs = Horse::search($texto)->get()->pluck('id');
                if (count($hrs) != 0) {
                    foreach ($hrs as $v) {
                        array_push($ids, $v);
                    }
                }
                */

                //buscar colores
                /*
                if ($pre != true) {
                    $raz = Raza::search($texto)->get()->pluck('id');
                    if (count($raz) != 0) {
                        $tt = [];
                        foreach ($raz as $d) {
                            $fas = Horse::where('color', $d)->get()->pluck('id');
                            if (count($fas) != 0) {
                                foreach ($fas as $v) {
                                    array_push($ids, $v);
                                }
                            }
                            $tt = [];
                        }
                    }
                }
                */

                //buscar sexos
                /*
                $raz = Raz::search($texto)->get()->pluck('id');
                if (count($raz) != 0) {
                    foreach ($raz as $d) {
                        $fas = Horse::where('sex', $d)->get()->pluck('id');
                        if (count($fas) != 0) {
                            foreach ($fas as $v) {

                                array_push($ids, $v);
                            }

                        }
                    }

                }
                */

                /*
                if (!empty($stids)) {
                    $fas = Horse::wherein('studs_id', $stids)->get()->pluck('id');
                    if (count($fas) != 0) {
                        foreach ($fas as $v) {
                            array_push($ids, $v);
                        }

                    }
                }
                */

                if (empty($ids)) {
                    $ids = $ble;
                } else {
                    $ids = Horse::VentaPublica()->wherein('id', $ids)->get()->pluck('id');
                }
            }

        }
        if (!empty($ids)) {
            $horse_ = Horse::VentaPublica()->wherein('id', $ids)->get()->pluck('id')->toArray();
        } else {
            $horse_ = Horse::VentaPublica()->get()->pluck('id')->toArray();
        }


        $f = Photo::where('type', 4)->wherein('tableid', $horse_)->get()->pluck('tableid')->toArray(); //solo caballo con foto
        $cty = null;
        $stud_idc = null;
        if ($mx == true) {
            /*Para mexico nada mas*/
            $cty = Country::Corto('MX')->first()->id;
        } elseif ($spa == true) {
            /*Para mexico nada mas*/
            $cty = Country::Corto('ES')->first()->id;
        } elseif ($colombia == true) {
            /*cty mexico nada mas*/
            $cty = Country::Corto('CO')->first()->id;
        }

        if (!empty($cty)) {
            $stud_idc = Stud::where('country', $cty)->get()->pluck('id');
        }

        if ($mx == true) {
            $hc = Horse::VentaPublica()->orderby('id', 'desc')->wherein('studs_id', $stud_idc);
        } elseif ($spa == true) {
            $hc = Horse::VentaPublica()->orderby('id', 'desc')->wherein('studs_id', $stud_idc);
        } elseif ($colombia == true) {
            $hc = Horse::VentaPublica()->orderby('id', 'desc')->wherein('studs_id', $stud_idc);
        } elseif ($pre == true) {
            $hc = Horse::VentaPublica()->orderby('id', 'desc')->where('raza', 25);
        } else {
            $hc = Horse::VentaPublica()->orderby('id', 'desc');
        }

        //$sal['request'] = $ra;
        //$sal['horses'] = $horse->get();
        if ($pre == true) {
            $hc = $hc->where('raza', 25);
        }


        $ids = $f;
        try {
            $hd = $hc->wherein('id', $ids)->get()->pluck('id');
            if (!empty($hd)) {
                $ids = $hd;
            }
        } catch (\Exception $e) {
            $ids = [];

        }

        if ($r->ajax()) {


            $horse = Horse::VentaPublica();
            $stud = Stud::query();

            $f[0] = url('landing/images/slider/1/2.jpg');
            $f[1] = url('landing/images/slider/1/6.jpg');
            $f[2] = url('landing/images/slider/1/9.jpg');
            $f[3] = url('landing/images/slider/1/8.jpg');
            $imagen = $f[rand(0, 2)];
            if ($pre == false) {
                if (is_array($raza)) {
                    $tt = [];
                    $ck = false;
                    /*for ($i = 0; $i < count($raza); $i++) {*/
                    foreach ($raza as $k => $v) {
                        /*$v = $raza[$i];*/
                        if (is_string($v)) {
                            array_push($tt, $k);
                        } elseif (is_int($v)) {
                            $ck = true;
                            array_push($tt, $v);
                        }

                    }
                    if ($ck == true) {
                        foreach ($raza as $k => $v) {
                            $raza[$v] = 'on';
                        }
                    }
                    $horse = $horse->wherein('raza', $tt);

                } elseif ($raza != 0) {

                    $horse = $horse->where(['raza' => $raza]);
                    $t = $raza;
                    $raza = [];
                    $raza[$t] = 'on';
                    $t = null;

                }
            } elseif ($pre == true) {
                $horse = $horse->where('raza', 25);
            }

            /*********************************************************************/
            /*********************************************************************/
            /*********************************************************************/
            /*********************************************************************/

            $raisedmin = $raisedmin * 1;
            $raisedmax = $raisedmax * 1;
            if ($raisedmin != 0 and $raisedmax == 0) {
                $raisedmax = 150;
            } elseif ($raisedmax != 0 and $raisedmin == 0) {
                $raisedmin = 50;
            }
            if ($raisedmin != 0 and $raisedmax != 0) {

                $horse = $horse->BuscarPorAlzada($raisedmin, $raisedmax);

            }

            $pricemin = $pricemin * 1;
            $pricemax = $pricemax * 1;

            //return Functions::RetornaJson(['r'=>$pricemax,'rs'=>$pricemin]);
            /*
            if ($pricemin != 0 and $pricemax == 0) {
            $pricemax = 150;
            }elseif ($pricemax != 0 and $pricemin==0){
            $pricemin = 50;
            }
             */
            if ($pricemin != 0 and $pricemax != 0) {

                $horse = $horse->BuscarPorPrecio($pricemin, $pricemax);
            }

            /****************************************************************************************/
            /****************************************************************************************/
            /****************************************************************************************/

            $stud_id = null;
            if ($country != 0) {
                $studsi = $stud->where('country', $country)->get()->pluck('id');
            }
            $st = 0;

            if (!empty($state)) {
                if (is_array($state)) {
                    $tt = [];
                    $ck = false;
                    foreach ($state as $k => $v) {
                        if ($k != 0) {
                            if (is_int($v)) {
                                $ck = true;
                                array_push($tt, $v);
                            } elseif (is_string($v)) {
                                array_push($tt, $k);
                            }

                        }
                    }
                    if ($ck == true) {
                        foreach ($state as $k => $v) {
                            $state[$v] = 'on';
                        }
                    }
                    if (count($tt) != 0) {
                        $st = 1;
                        $stud_1 = $stud->wherein('state', $tt);

                        $sd = $stud_1->first();
                        if (empty($sd)) {
                            flash(trans('error.NoHorseProvincia'))->error();

                        } else {
                            $stud = $stud_1;
                        }
                    } else {
                        $horse = $horse->BuscarPorYeguadas($stud_id);
                    }
                } elseif
                ($state != 0) {
                    $st = 1;
                    $stud_1 = $stud->where('state', $state);
                    $sd = $stud_1->first();
                    if (empty($sd)) {
                        flash(trans('error.NoHorseProvincia'))->error();

                    } else {
                        $stud = $stud_1;
                    }
                    $t = $state;
                    $state = [];
                    $state[$t] = 'on';
                    $t = null;
                }
            }

            if ($country != 0 or ($st != 0)) {
                $stud = $stud->get()->pluck('id');
            } else {
                $stud = null;
            }

            if (!empty($stud)) {
                if (count($stud) != 0) {
                    $horse = $horse->BuscarPorYeguadas($stud);
                }
            }

            /****************************************************************************************/
            /****************************************************************************************/
            /****************************************************************************************/

            if (!empty($sex)) {
                $tt = [];
                foreach ($sex as $k => $v) {
                    array_push($tt, $k);
                }
                $horse = $horse->BuscarPorSexos($tt);
            }
            if (!empty($doma)) {
                $tt = [];
                foreach ($doma as $k => $v) {
                    array_push($tt, $k);
                }
                $horse = $horse->wherein('doma', $tt);
            }
            if (!empty($cubricion)) {
                $horse = $horse->Cubricion();
            }


            /*"color" => array:1 [▼
            0 => "1"
            ]*/
            $tt = [];
            if (!empty($color)) {
                foreach ($color as $k => $v) {
                    array_push($tt, $v);
                }
            }
            if (!empty($tt)) {
                $horse = $horse->wherein('color', $tt);
            }
            $tt = [];

            /*********************************************************************/
            /*********************************************************************/
            /*********************************************************************/
            /*********************************************************************/
            if (!empty($texto) and $segundo == 0) {
                $texto = strip_tags(Functions::LimpiarTextoHard($texto));
                $lng = strlen($texto);

                if ($lng > 3) {
                    $ble = $ids;
                    $ids = [];
                    $stids = [];

                    //Bsuscamos string de nombre o lo que sea

                    $std = Stud::search($texto)->get()->pluck('id');
                    if (count($std) != 0) {
                        foreach ($std as $v) {
                            array_push($stids, $v);

                        }
                    }
                    $hrs = Horse::search($texto)->get()->pluck('id');
                    if (count($hrs) != 0) {
                        foreach ($hrs as $v) {
                            array_push($ids, $v);
                        }
                    }


                    $cty = Country::search($texto)->get()->pluck('id');
                    if (count($cty) != 0) {
                        $st = Stud::wherein('country', $cty)->get()->pluck('id');
                        foreach ($st as $v) {
                            array_push($stids, $v);

                        }
                    }


                    /*CAPA*/
                    if ($pre != true) {
                        $raz = Raza::search($texto)->get()->pluck('id');
                        if (count($raz) != 0) {
                            $tt = [];
                            foreach ($raz as $d) {
                                $fas = Horse::where('color', $d)->get()->pluck('id');
                                if (count($fas) != 0) {
                                    foreach ($fas as $v) {
                                        array_push($ids, $v);
                                    }
                                }
                                $tt = [];
                            }
                        }
                    }

                    /*SEXO*/
                    $raz = Raz::search($texto)->get()->pluck('id');
                    if (count($raz) != 0) {
                        foreach ($raz as $d) {
                            $fas = Horse::where('sex', $d)->get()->pluck('id');
                            if (count($fas) != 0) {
                                foreach ($fas as $v) {

                                    array_push($ids, $v);
                                }

                            }
                        }

                    }

                    if (!empty($stids)) {
                        $fas = Horse::wherein('studs_id', $stids)->get()->pluck('id');
                        if (count($fas) != 0) {
                            foreach ($fas as $v) {
                                array_push($ids, $v);
                            }

                        }
                    }

                    if (empty($ids)) {
                        $ids = $ble;
                    } else {
                        $ids = Horse::VentaPublica()->wherein('id', $ids)->get()->pluck('id');
                    }
                }

            }
            if (!empty($studsi)) {
                $horse = $horse->wherein('studs_id', $studsi);
            }
            if (!empty($ids)) {
                $horse = $horse->wherein('id', $ids);
            }
            $c = $ids;

            if (empty($orden)) {
                $horse = $horse->orderby('id', 'desc');
            } else {
                $orden = strtolower($orden);
                if ($orden == 'edad') {
                    $horse = $horse->orderby('birthdate', 'desc');
                } elseif ($orden == 'precio') {
                    $horse = $horse->orderby('price', 'desc');
                } elseif ($orden == 'capa') {
                    $horse = $horse->orderby('color', 'desc');
                } elseif ($orden == 'alzada') {
                    $horse = $horse->orderby('raised', 'desc');
                } else {
                    $horse = $horse->orderby('id', 'desc');
                }

            }

            $ra['texto'] = $texto;
            $ra['sex'] = $sex;
            $ra['doma'] = $doma;
            $ra['color'] = $color;
            $ra['country'] = $country;
            $ra['state'] = $state;
            $ra['pricemin'] = $pricemin;
            $ra['pricemax'] = $pricemax;
            $ra['raisedmax'] = $raisedmax;
            $ra['raisedmin'] = $raisedmin;
            $ra['raza'] = $raza;
            $ra['texto'] = $texto;
            $ra['orden'] = $orden;

            //$sal['request'] = $ra;
            //$sal['horses'] = $horse->get();
            $horse = $horse->paginate($paginacion);
            $sal['lastPage'] = $horse->lastPage();
            $paginator = $horse;
            $sal['pagination'] = $paginacion;
            $sal['currentPage'] = $horse->currentPage();
            //return $horses;
            //$sal['pag'] = (new PublicController())->ComprimirText( view('vendor.pagination.portalcaballo', compact('paginator'))->render());
            $sal['pag'] = (new PublicController())->ComprimirText(view('vendor.pagination.portalcaballo', compact('paginator'))->render());
            $sal['mostrando'] = trans('portal.showing', [
                'currentpage' => $horse->currentPage(),
                'lastpage' => $horse->lastPage(),
                'total' => $horse->total(),
            ]);
            /*$sal['compl'] = $horse;*/
            $sal['status'] = 200;
            $fr = count($horse);
            //$t1 = (new Functions())->MicroTiempo("Cantidad de h = $fr Luego de el =", $tiempo) - $tiempo;
            $sal['el'] = (new PublicController())->ComprimirText(view('portal.listas.partials.horse', ['horses' => $horse])->render());
            //$t1 = (new Functions())->MicroTiempo("Luego de el =  ", $tiempo) - $tiempo;
            return Functions::RetornaJson($sal);
        } else {


            $horse = Horse::wherein('id', $ids)->orderby('id', 'desc');

            $horse = $horse->paginate($paginacion);
            //$sal['el'] = (new PublicController())->ComprimirText(view('portal.listas.partials.horse', ['horses' => $horse])->render());
            $sal['lastPage'] = $horse->lastPage();
            $paginator = $horse;

            $sal['pagination'] = $paginacion;
            $sal['currentPage'] = $horse->currentPage();

        }
        $horses = $horse;

        return view('portal.listas.listing-5', compact(
            'horses',
            'imagen',
            'raisedmin',
            'raisedmax',
            'raza',
            'texto',
            'pricemin',
            'pricemax',
            'state',
            'country',
            'doma',
            'sex',
            'color',
            'orden'
        ));
    }

    public function PorEstado(Request $r, $country = 0, $state = 0)
    {
        $s = Stud::where('country', $country)->pluck('id');
        if (!empty($state)) {
            $s = Stud::where(['country' => $country, 'state' => $state])->pluck('id');
        }
        $sql = \DB::table('horses');
        foreach ($s as $select) {
            $sql->orWhere('studs_id', '=', $select);
        }
        $horses = $sql->paginate(25);
        //$horses = $sql->get();

        $imagen = url('landing/images/slider/1/2.jpg');
        return view('portal.listas.listing-5', compact('horses', 'country', 'state', 'imagen'));
    }

    public function index5(Request $r)
    {
        //$horses = Horse::where(['tosold'=> 1,'publish'=>1])->orderby('id', 'desc')->paginate(25);
        $horses = Horse::where(['tosold' => 1, 'publish' => 1])->orderby('id', 'desc')->paginate(25);
        $f[0] = url('landing/images/slider/1/2.jpg');
        $f[1] = url('landing/images/slider/1/6.jpg');
        $f[2] = url('landing/images/slider/1/9.jpg');
        $f[3] = url('landing/images/slider/1/8.jpg');
        $imagen = $f[rand(0, 2)];
        return view('portal.listas.listing-5', compact('horses', 'imagen'));
    }

    public function caballo($slug = null)
    {

        if (empty($slug)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->back();
        }
        if (is_numeric($slug)) {
            $slug = Horse::find($slug);
        } else {
            $slug = (new Functions())->BuscarCaballoSlug($slug);
            if (empty($slug)) {
                $slug = Horse::where('slug', $slug)->first();
            }
        }
        $f[0] = url('landing/images/slider/1/2.jpg');
        $f[1] = url('landing/images/slider/1/6.jpg');
        $f[2] = url('landing/images/slider/1/9.jpg');
        $f[3] = url('landing/images/slider/1/8.jpg');
        $imagen = $f[rand(0, 2)];

        $horse = $slug;
        /*$horse = Horse::find($slug);*/
        if (empty($horse)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->back();
        }
        $visita = $horse->byPortal();

        return view('portal.single', compact('horse', 'imagen'));
    }

    public function ContactoCaballoVenta(Request $r, Horse $slug = null)
    {
        $emilio = new MailController();
        $link = $r->urld;

        /*
        $tada = $slug->StudConDominio();
        if (!empty($tada)) {
        $id = $tada->id;
        }
        dd($id);
         */

        $c = new Notification();
        if (empty($slug)) {
            $horse_id = $r->horse_id;
        } else {
            $horse_id = $slug->id;
        }
        $email = $r->email;
        $numero = $r->phone;
        $mensaje = $r->mensaje;
        if (empty($horse_id)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->back();
        }
        $c->setNotificacionDeCaballo($horse_id, $email, $numero, $mensaje)->setOther($r->nombre)->push();
        $emilio->ContactoMail($c, $link);

        flash(trans('error.NotificacionEnviada'))->success();
        return redirect()->back();

    }

    public function SuscripcionIndex()
    {
        //dd($r);
        return view('portal.suscripcion.suscripcion');
    }

    public function ContactoIndex()
    {
        return view('portal.contacto.contacto');
    }

    public function PublicidadIndex()
    {
        return view('portal.publicidad.publicidad');
    }

    public function ReportarCaballo(Request $r)
    {
        //https://styde.net/como-integrar-google-recaptcha-en-formularios-de-login-y-registro-de-laravel-5-2/
        try {

            $this->validate($r, [
                'g-recaptcha-response' => 'required|recaptcha',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            flash(trans('error.gcaptcha'))->error();
            return back()->withInput();
        }
        $f = $r->all();
        $motivo = $r->reporti;
        $url = $r->url;
        $id = $r->idcaballo;
        $comentario = $r->comentario;
        $g_recaptcha_response = $f['g-recaptcha-response'];

        //L: https://www.google.com/recaptcha/api/siteverify
        $f = new Reporte([
            'url' => $url,
            'horse_id' => $id,
            'type' => $motivo,
            'correo' => '',
            'comentario' => $comentario,
            'gcaptcha' => $g_recaptcha_response,
        ]);
        flash(trans('error.reporteok'))->error();
        $f->push();
        return back()->withInput();

        $s = $f->VerificarCaptcha($r->ip());

        if ($s == true) {
            flash(trans('error.reporteok'))->error();
            $f->push();
        } else {
            flash(trans('error.gcaptchaver'))->error();
            return back()->withInput();
        }

        return back()->withInput();
    }

    public function EnviarCaballo(Request $r)
    {
        //https://styde.net/como-integrar-google-recaptcha-en-formularios-de-login-y-registro-de-laravel-5-2/
        /*
        try {

        $this->validate($r, [
        'g-recaptcha-response' => 'required|recaptcha',
        ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
        flash(trans('error.gcaptcha'))->error();
        return back()->withInput();
        }
         */
        $f = $r->all();
        $url = $r->url;
        $idcaballo = $r->idcaballo; //128"
        $name = Functions::LimpiarTexto($r->name); //carlos"
        $mail = Functions::LimpiarCorreo($r->mail); //carlos@ff.com"
        $comentario = Functions::LimpiarTexto($r->comentario); //gasdgasd"
        $titulo = $name;

        $horses = Horse::find($idcaballo);
        $stud = $horses->getYeguada();
        $correos = explode(',', $mail);
        $bueno = [];
        $malo = [];
        $p = 0;
        $contenido = trans('report.sharedemail', ['nameuser' => $name, 'name' => $horses->getName()]) . $comentario;
        foreach ($correos as $k => $v) {
            if ($p == 0) {
                $d = Functions::ComprobarCorreo($v);
                if ($d == true) {
                    array_push($bueno, $v);
                    $p = 1;
                } else {
                    array_push($malo, $v);
                }
            }
        }
        $correos = $bueno;
        $tipo = 0;
        $titulo = Functions::LimpiarTexto($titulo);
        $contenido = Functions::LimpiarTexto($contenido);
        $dato = compact('horses', 'user', 'stud', 'titulo', 'contenido', 'tipo');
        $f = new MailController();
        $sal['sms'] = 'Se han encontrado errores intentando enviar el correo';
        $t = null;

        if (count($bueno) != 0) {
            $sal['status'] = 200;
            // EnviarExportar($titulo, $mail, $tipo, $datos, $pdf = 1, $stud = null)
            $t = $f->EnviarExportar($titulo, $bueno, $tipo, $dato, 1, $url, $stud);
            if (count($t) == 0) {
                $sal['sms'] = 'Se ha enviado correctamente a todos los destinatarios';
            } elseif (count($t) != 0) {
                $sal['sms'] = 'No se ha podido enviar a todos los destinatarios<br>' . json_encode($t);
            }
        }
        $sal['malo'] = $malo;
        $sal['correos'] = $correos;
        $sal['err'] = $t;
        $sal['datos'] = $r->all();
        flash(trans('error.shareok', ['name' => $horses->getName()]))->success();
        return back()->withInput();
    }
}

