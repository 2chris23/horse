<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Stud;
use DB;
use Illuminate\Http\Request;
use function array_push;
use function compact;
use function count;
use function explode;
use function flash;
use function is_array;
use function redirect;
use function view;


class ExportarController extends Controller
{
    //
    private $document;

    public function Inicio()
    {
        $user = \Auth::user();
        $stud = \Auth::user()->Yeguada();
        $sex = \Auth::user()->Yeguada()->Horses()->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get();
        $raza = \Auth::user()->Yeguada()->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get();
        $razass = \Auth::user()->Yeguada()->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get();
        $color = \Auth::user()->Yeguada()->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get();

        $venta_r = \Auth::user()->Yeguada()->Horses()->select('raza', DB::raw('count(*) as total'))->where('tosold', 1)->groupby('raza')->get()->pluck('raza')->toArray();
        $venta_s = \Auth::user()->Yeguada()->Horses()->select('sex', DB::raw('count(*) as total'))->where('tosold', 1)->groupby('sex')->get()->pluck('sex')->toArray();
        $venta_c = \Auth::user()->Yeguada()->Horses()->select('color', DB::raw('count(*) as total'))->where('tosold', 1)->groupby('color')->get()->pluck('color')->toArray();

        $cubri_r = \Auth::user()->Yeguada()->Horses()->select('raza', DB::raw('count(*) as total'))->where('tocubri', 1)->groupby('raza')->get()->pluck('raza')->toArray();
        $cubri_c = \Auth::user()->Yeguada()->Horses()->select('color', DB::raw('count(*) as total'))->where('tocubri', 1)->groupby('color')->get()->pluck('color')->toArray();
        $cubri_s = \Auth::user()->Yeguada()->Horses()->select('sex', DB::raw('count(*) as total'))->where('tocubri', 1)->groupby('sex')->get()->pluck('sex')->toArray();


        $horses = \Auth::user()->Yeguada()->Horses()->get();
        $columns = [
            'sel' => '<span class="text-success"><i class="fa fa-check"></i></span>',
            'name' => trans('horse.attrib.name'),
            'img' => trans('stud.photos'),
            'raza' => trans('horse.attrib.raza'),
            'sex' => trans('horse.attrib.sex'),
            'color' => trans('horse.attrib.color'),

        ];

        return view('backend.content.exportar.index', compact('razass', 'user', 'stud', 'horses', 'columns', 'sex', 'raza', 'color', 'venta_r', 'venta_s', 'venta_c', 'cubri_s', 'cubri_c', 'cubri_r'));
    }

    public function ObtenerElementos(Request $r)
    {
        $fake = 0;
        $sal['status'] = 200;
        //$sal = $r->all();
        $sal['dato'] = $r->all();
        $cubricion = !empty($r->cubricion) ? $r->cubricion : null;
        $user = \Auth::user();
        $stud = $user->Yeguada();
        $correos = $r->para;
        $titulo = $r->titulo;
        $seleccioncaballo = $r->horsesel;
        $caballos = null;

        $contenido = $r->conten;
        if (!is_array($correos)) {
            $correos = explode(',', $correos);
        }

        $bueno = [];
        $malo = [];
        foreach ($correos as $k => $v) {
            $d = Functions::ComprobarCorreo($v);
            if ($d == true) {
                array_push($bueno, $v);
            } else {
                array_push($malo, $v);
            }

        }

        $razas = $r->raza;
        $sexo = $r->sexo;
        $color = $r->color;
        /*
                if (count($razas) == 0 and count($sexo) == 0 and count($color) == 0) {
                    return null;
                }

                */
        $tsd = Horse::where('studs_id', \Auth::user()->Yeguada()->id);
        if (count($razas) != 0) {
            /*
            if (isset($razas[0])) {
                $razas = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $razas = \Auth::user()->Yeguada()->Horses()->wherein('raza', $razas)->get()->pluck('id')->toArray();
            }
            */
            $tsd->wherein('raza', $razas);
            $razas = \Auth::user()->Yeguada()->Horses()->wherein('raza', $razas)->get()->pluck('id')->toArray();

        }

        if (count($sexo) != 0) {
            /*
            if (isset($sexo[0])) {
                $sexo = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $sexo = \Auth::user()->Yeguada()->Horses()->wherein('sex', $sexo)->get()->pluck('id')->toArray();
            }*/
            $tsd->wherein('sex', $sexo);
            $sexo = \Auth::user()->Yeguada()->Horses()->wherein('sex', $sexo)->get()->pluck('id')->toArray();
        }
        if (count($color) != 0) {
            /*
            if (isset($color[0])) {
                $color = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $color = \Auth::user()->Yeguada()->Horses()->wherein('color', $color)->get()->pluck('id')->toArray();
            }
            */
            $tsd->wherein('color', $color);
            $color = \Auth::user()->Yeguada()->Horses()->wherein('color', $color)->get()->pluck('id')->toArray();
        }
        if (count($seleccioncaballo) != 0) {
            $caballos = \Auth::user()->Yeguada()->Horses()->wherein('id', $seleccioncaballo)->get()->pluck('id')->toArray();
            $tsd->wherein('id', $seleccioncaballo);
        }

        $t = [];
        if (is_array($color)) {
            foreach ($color as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($sexo)) {
            foreach ($sexo as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($razas)) {
            foreach ($razas as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($caballos)) {
            foreach ($caballos as $k => $v) {
                array_push($t, $v);
            }
        }
        $tsd = $tsd->get();
        $t = $tsd->pluck('id');

        if (count($t) == 0) {
            //$sal['horses']=$buscar;
            $sal['err'] = $t;
            flash(trans('error.NoHorses'))->error();
            return redirect()->back();
            return Functions::RetornaJson($sal);
        }

        if (isset($r->todosts)) {
            $t = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        }
        $sal['t'] = $t;
        $horses = Horse::wherein('id', $t)->where('studs_id', \Auth::user()->Yeguada()->id);

        if (!empty($r->venta)) {
            $horses->where(['tosold' => 1, 'sold' => 0]);
        }
        $horses = $horses->get();
        if (!empty($r->venta) and empty($horses) and empty($cubricion)) {
            $horses = Horse::where(['tosold' => 1, 'sold' => 0])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        } elseif (!empty($r->venta) and empty($horses) and !empty($cubricion)) {
            $horses = Horse::where(['tosold' => 1, 'sold' => 0, 'tocubri' => 1])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        } elseif ((empty($r->venta) and empty($horses) and !empty($cubricion))) {
            $horses = Horse::where(['tocubri' => 1])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        }

        if (count($horses) == 1) {
            //return view('backend.Masivo.saturno', $data);
            $horses = Horse::wherein('id', $horses->pluck('id'))->where('studs_id', \Auth::user()->Yeguada()->id);
            if (!empty($r->venta)) {
                $horses = $horses->where(['tosold' => 1, 'sold' => 0]);
            }
            if (!empty($cubricion)) {
                $sal['cubricion'] = $cubricion;
                $horses->where('tocubri', 1);
            }
            $horses = $horses->first();
            //$sal['vista'] = view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
        } elseif (count($horses) > 1) {
            //$sal['vista'] = view('backend.Masivo.uno', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
        }

        $sal['buenos'] = $bueno;
        $sal['malos'] = $malo;
        $sal['status'] = 200;
        //$pdf = PDF::loadView('pdf', compact('user'));
        //$pdf = PDF::loadView('backend.Masivo.uno', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
        $tipo = 5;
        if (count($horses) > 1) {
            $tipo = 1;

            $data = compact('horses', 'user', 'stud', 'titulo', 'contenido', 'file');
            //$pdf = PDF::loadView('backend.Masivo.uno', $data);
            //$f = $pdf->download('invoice.pdf');

        } elseif (count($horses) == 1) {
            $tipo = 0;
            $data = compact('horses', 'user', 'stud', 'titulo', 'contenido');
            //$pdf = PDF::loadView('backend.Masivo.saturno', $data);
            //return view('backend.Masivo.saturno', $data);
            //$sal['vista'] = view('backend.Masivo.saturno', $data)->render();
        }
        $special = 1;
        $dato = compact('horses', 'user', 'stud', 'titulo', 'contenido', 'tipo', 'special');;
        if ($fake == 0) {
            $f = new MailController();
            $t = $f->EnviarExportar($titulo, $bueno, $tipo, $dato, 1);

            if (count($t) != 0) {
                foreach ($t as $k => $v) {
                    flash('No se pudo enviar el correo a la dirección ' . $v)->error();
                }
            }
        }

        $buenook = '';
        foreach ($bueno as $k => $v) {
            $buenook .= "$v";
            if ($k != count($bueno) - 1) {
                $buenook .= ", ";
            }
        }
        $malook = '';
        foreach ($malo as $k => $v) {
            $malook .= "$v";
            if ($k != count($malo) - 1) {
                $malook .= ", ";
            }
        }
        if (count($horses) > 1) {
            if ($fake == 0) {

                //flash('Se envio el correo a las siguientes direcciones <strong>"' . $buenook . '"</strong>')->success();
                if (count($malo) != 0) {
                    //flash('Las siguientes direcciones de correo pueden estar equivocadas <strong>"' . $malook . '"</strong>"')->error();
                    return redirect()->back()->with(['malos' => $malo]);
                } else {
                    return redirect()->back();
                }
                if (count($horses) == 0) {
                    $horses = null;
                }
            }

            return view('backend.Masivo.saturno-v', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
            return view('backend.Masivo.largo', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
        } else {
            if ($fake == 0) {

                //flash('Se envio el correo a las siguientes direcciones <strong>"' . $buenook . '"</strong>')->success();
                if (count($malo) != 0) {
                    //flash('Las siguientes direcciones de correo pueden estar equivocadas <strong>"' . $malook . '"</strong>"')->error();
                    return redirect()->back()->with(['malos' => $malo]);
                } else {
                    return redirect()->back();
                }
                if (count($malo) != 0) {
                    flash('Las siguientes direcciones de correo pueden estar equivocadas <strong>"' . json_encode($malo) . '"</strong>strong"')->error();
                    return redirect()->back()->with(['malos' => $malo]);
                } else {
                    return redirect()->back();
                }
                if (count($horses) == 0) {
                    $horses = null;
                }
            }
            return view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
        }
        //return $pdf->download('invoice.pdf');

    }

    public function ObtenerElementosAjax(Request $r)
    {
        $sal['status'] = 200;
        //$sal = $r->all();
        //return Functions::RetornaJson($sal);
        //$sal['dato'] =$r->all();
        $user = \Auth::user();
        $stud = $user->Yeguada();
        $correos = $r->para;
        $titulo = $r->titulo;
        $seleccioncaballo = $r->horsesel;
        $cubricion = !empty($r->cubricion) ? $r->cubricion : null;
        $caballos = null;

        $contenido = $r->conten;
        if (!is_array($correos)) {
            $correos = explode(',', $correos);
        }
        $bueno = [];
        $malo = [];
        foreach ($correos as $k => $v) {
            $d = Functions::ComprobarCorreo($v);
            if ($d == true) {
                array_push($bueno, $v);
            } else {
                array_push($malo, $v);
            }

        }

        $razas = $r->raza;
        $sexo = $r->sexo;
        $color = $r->color;
        $todos = isset($r->todosts) ? 1 : 0;
        /*
                if (count($razas) == 0 and count($sexo) == 0 and count($color) == 0) {
                    return null;
                }

                */
        $tsd = Horse::where('studs_id', \Auth::user()->Yeguada()->id);
        if (count($razas) != 0) {
            /*
            if (isset($razas[0])) {
                $razas = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $razas = \Auth::user()->Yeguada()->Horses()->wherein('raza', $razas)->get()->pluck('id')->toArray();
            }
            */
            $tsd->wherein('raza', $razas);
            $razas = \Auth::user()->Yeguada()->Horses()->wherein('raza', $razas)->get()->pluck('id')->toArray();

        }


        if (count($sexo) != 0) {
            /*
            if (isset($sexo[0])) {
                $sexo = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $sexo = \Auth::user()->Yeguada()->Horses()->wherein('sex', $sexo)->get()->pluck('id')->toArray();
            }*/
            $tsd->wherein('sex', $sexo);
            $sexo = \Auth::user()->Yeguada()->Horses()->wherein('sex', $sexo)->get()->pluck('id')->toArray();
        }
        if (count($color) != 0) {
            /*
            if (isset($color[0])) {
                $color = \Auth::user()->Yeguada()->Horses()->get()->pluck('id')->toArray();
            } else {
                $color = \Auth::user()->Yeguada()->Horses()->wherein('color', $color)->get()->pluck('id')->toArray();
            }
            */
            $tsd->wherein('color', $color);
            $color = \Auth::user()->Yeguada()->Horses()->wherein('color', $color)->get()->pluck('id')->toArray();
        }
        if (count($seleccioncaballo) != 0) {
            $caballos = \Auth::user()->Yeguada()->Horses()->wherein('id', $seleccioncaballo)->get()->pluck('id')->toArray();
            $tsd->wherein('id', $seleccioncaballo);
        }

        $t = [];
        if (is_array($color)) {
            foreach ($color as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($sexo)) {
            foreach ($sexo as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($razas)) {
            foreach ($razas as $k => $v) {
                array_push($t, $v);
            }
        }
        if (is_array($caballos)) {
            foreach ($caballos as $k => $v) {
                array_push($t, $v);
            }
        }
        $tsd = $tsd->get();
        $t = $tsd->pluck('id');

        $s = null;
        if ($todos == 1) {
            $t = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        }
        $sal['t'] = $t;
        if (count($t) == 0) {
            //$sal['horses']=$buscar;
            $sal['err'] = $t;
            //flash('No se econtraron caballos')->error();
            //return redirect()->back();
            //return Functions::RetornaJson($sal);
        }

        $horses = Horse::wherein('id', $t)->where('studs_id', \Auth::user()->Yeguada()->id);
        if (!empty($r->venta)) {
            $sal['vendido'] = $r->venta;
            $horses->where(['tosold' => 1, 'sold' => 0]);
        }
        if (!empty($cubricion)) {
            $sal['cubricion'] = $cubricion;
            $horses->where('tocubri', 1);
        }
        //$cubricion
        $horses = $horses->get();

        if (!empty($r->venta) and empty($horses) and empty($cubricion)) {
            $horses = Horse::where(['tosold' => 1, 'sold' => 0])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        } elseif (!empty($r->venta) and empty($horses) and !empty($cubricion)) {
            $horses = Horse::where(['tosold' => 1, 'sold' => 0, 'tocubri' => 1])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        } elseif ((empty($r->venta) and empty($horses) and !empty($cubricion))) {
            $horses = Horse::where(['tocubri' => 1])->where('studs_id', \Auth::user()->Yeguada()->id)->get();
        }
        $tda = count($horses->toArray());
        if ($tda != 0) {

            if ($tda == 1) {
                //return view('backend.Masivo.saturno', $data);
                $horses = Horse::wherein('id', $horses->pluck('id'))->where('studs_id', \Auth::user()->Yeguada()->id);
                if (!empty($r->venta)) {
                    $horses = $horses->where(['tosold' => 1, 'sold' => 0]);
                }
                if (!empty($cubricion)) {
                    $horses = $horses->where(['tocubri' => 1]);
                }
                $horses->first();
                //$sal['vista'] = view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
            } elseif ($tda > 1) {
                //$sal['vista'] = view('backend.Masivo.uno', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
            }
        } else {
            $sal['noHorse'] = 1;
        }

        $sal['buenos'] = $bueno;
        if (count($malo) == 0) {
            $malo = null;
        }
        $sal['malos'] = $malo;
        $sal['status'] = 200;
        //$sal['cs'] = $horses->getPhotoFirstModel();
        //$sal['cs'] = count($horses);


        $tipo = 5;
        if (count($horses) > 1) {
            $tipo = 1;
            $data = compact('horses', 'user', 'stud', 'titulo', 'contenido', 'file');

            //$pdf = PDF::loadView('backend.Masivo.uno', $data);
            //$f = $pdf->download('invoice.pdf');
            if (!empty($horses)) {
                if (count($horses) == 0) {
                    $horses = null;
                }
                $sal['vista'] = view('backend.Masivo.saturno-v', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
            } else {
                $sal['vista'] = null;
            }

        } elseif (count($horses) == 1) {
            $tipo = 0;
            $data = compact('horses', 'user', 'stud', 'titulo', 'contenido');
            if (!empty($horses)) {
                if (count($horses) == 0) {
                    $horses = null;
                }
                $sal['vista'] = view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido'))->render();
            } else {
                $sal['vista'] = null;
            }
            //$pdf = PDF::loadView('backend.Masivo.saturno', $data);
            //return view('backend.Masivo.saturno', $data);
            //$sal['vista'] = view('backend.Masivo.saturno', $data)->render();
        }
//$pdf = PDF::loadView('pdf', compact('user'));

        //return $pdf->download('invoice.pdf');
        if ($r->ajax()) {
            return Functions::RetornaJson($sal);
        }
        return Functions::RetornaJson($sal);
        if (count($horses) > 1) {
            return view('backend.Masivo.saturno-v', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
            return view('backend.Masivo.largo', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
        } else {
            return view('backend.Masivo.saturno', compact('horses', 'user', 'stud', 'titulo', 'contenido'));
        }
        return view('backend.Masivo.uno', compact('horses', 'user', 'stud', 'titulo', 'contenido'));

    }

    public function EnviarUnico(Request $r)
    {
        //id
        $id = $r->caballomail;
        $user = \Auth::user();
        $stud = $user->Yeguada();
        $titulo = $r->titulomail;
        $contenido = $r->mensajedestinatario;
        $correos = $r->correodestinatario;
        $horses = \Auth::user()->Yeguada()->Horses()->where(['id' => $id, 'studs_id' => \Auth::user()->Yeguada()->id])->first();
        $correos = explode(',', $correos);
        $bueno = [];
        $malo = [];
        foreach ($correos as $k => $v) {
            $d = Functions::ComprobarCorreo($v);
            if ($d == true) {
                array_push($bueno, $v);
            } else {
                array_push($malo, $v);
            }

        }
        $correos = $bueno;
        $tipo = 0;
        $titulo = Functions::LimpiarTexto($titulo);
        $contenido = Functions::LimpiarTexto($contenido);
        $special = 1;
        $dato = compact('horses', 'user', 'stud', 'titulo', 'contenido', 'tipo', 'special');
        $f = new MailController();
        $sal['sms'] = 'Se han encontrado errores intentando enviar el correo';
        $t = null;
        if (count($bueno) != 0) {
            $sal['status'] = 200;
            $t = $f->EnviarExportar($titulo, $bueno, $tipo, $dato, 1);
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


        return Functions::RetornaJson($sal);


    }

    public function ExportarOlx(Horse $slug)
    {
        $olx = new OlxController();
        $olx = $olx->ExportarOlx($slug);
        dd($olx);
    }

    public function ExportarAnuncio($slug = null)
    {
        $user = \Auth::user();
        $yeguada = $user->Yeguada();
        $slug = Horse::where(['id' => $slug, 'studs_id' => $yeguada->id])->first();
        if (empty($slug)) return redirect()->route('caballoc.index');
        $xml = new Functions();

        //dd($slug);
        /*http://www.divendo.es/about/feeds/articulos*/
        /*Datos Basicos*/
        $yeguada=$slug->getYeguada();
        $ciudad = $yeguada->city;
        $yeguada = Stud::find(1);
        $provincia = $yeguada->getStateModel()->getName();
        $yeguada_address= $yeguada->getAddress() .', '. $yeguada->getCity() .', '. $yeguada->getStateModel()->name 
                    .', '.$yeguada->getCountryModel()->name ;

                    
        $cd = 0;         
        $tel  ='';
        foreach($yeguada->getPhoneModel() as $k=> $v){
            if($v->isNull() !== true){
                if($cd == 0){
                    $tel = str_replace('+', '', $v->getFormatNumberOnly());
                    $cd = 1;
                }
            }
        }
        $divendo = [
            'id' => $slug->id,
            'url'=>route('MyHorseDetailed',['stud'=>$yeguada->slug,'horse'=>$slug->slug]),
            'mobile_url'=>route('MyHorseDetailed',['stud'=>$yeguada->slug,'horse'=>$slug->slug]),
            'title'=>$slug->getName(),
            'content'=>$slug->getDescripcion(),
            'category'=>'Pets',
            'price'=>$slug->getPrice(),
            'city'=>$ciudad,
            'region'=>$provincia,
            'date'=>Functions::AjustarFechaYYYMMDD($slug->created_at),
            'time'=>Functions::AjustarFechaHM($slug->created_at),
            'make'=>$slug->getStud(),
            'model'=>trans('horse.raza.'.$slug->raza),
            'address'=>$yeguada_address,
            'contact_name'=>$yeguada->getName(),
            'contact_email'=>$yeguada->getEmail(),
            'contact_telephone'=>$tel,
        ];

        $fotos = $slug->getPhotoModel();
        if(!empty($fotos)){
            $f = [];
            foreach($fotos as $k=>$v){
                $g['picture'] =  [
                    'picture_url'=>$v->getUrl(),
                    'picture_title'=>$slug->getName(),
                ];
                array_push($f,  [
                    'picture_url'=>$v->getUrl(),
                    'picture_title'=>$slug->getName(),
                ]);
                $g = [];
            }
            $divendo['pictures'] = $f;
        }
//
        /*
  <price currency="USD"><![CDATA[...]]></price>
  expiration_date

        */
        $ad['ad']= $divendo;
        $xml = new Functions();
        $s = $xml->ArrayToXml($ad,'divendo');
        $xml = new Functions();
        $s = $xml->ArrayToXml($ad,'trovit');
        return redirect()->route('caballoc.index');
        return $s;

    }
}

