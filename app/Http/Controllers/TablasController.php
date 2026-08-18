<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Photo;
use App\Models\Reporte;
use App\Models\Stud;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use function str_replace;
use function view;

class TablasController extends Controller
{
    //
    public function AdminHorses(Request $r = null)
    {
        /*Lista de caballos para admin*/
        $columnsHorse1 = [
            'id' => '#',
            'img' => 'Imagen',
            'stud' => trans('horse.attrib.stud'),
            'name' => trans('horse.attrib.name'),
            'raza' => trans('horse.attrib.raza'),
            'sex' => trans('horse.attrib.sex'),
            'color' => trans('horse.attrib.color'),
            'price' => trans('horse.attrib.price'),
            'action' => trans('photo.delete'),

        ];
        $cols = [
            0 => 'id',
            1 => 'img',
            2 => 'stud',
            3 => 'name',
            4 => 'raza',
            5 => 'sex',
            6 => 'color',
            7 => 'price',
            8 => 'action',

        ];
        /*
$lng = null;
if(isset($r->length)){
    $lng = $r->length;
    $horses = Horse::where('id', "!=", 0)->paginate($lng);
}else{
    $horses = Horse::where('id', "!=", 0)->paginate(25);
}
*/

        if (\Auth::user()->isAdm() or \Auth::user()->Asociado()) {
            $user = \Auth::user();
            $asoc = $user->Asociado();

            if ($asoc == true) {
                $control = $user->ControlAsociado();
                $paises = $control->getPaises();
                $studs = Stud::wherein('country', $paises)->get()->pluck('id');
                $horses = Horse::select('id', 'raza', 'sex', 'color', 'stud', 'raised', 'price', 'name', 'studs_id')->where('id', "!=", 0)->orderby('id', 'desc')->wherein('studs_id', $studs)->get();
            } else {
                $horses = Horse::select('id', 'raza', 'sex', 'color', 'stud', 'raised', 'price', 'name', 'studs_id')->where('id', "!=", 0)->orderby('id', 'desc')->get();
            }

            $adm = true;
        } else {
            $user = \Auth::user();
            $stud = $user->Yeguada();
            $adm = false;
            $horses = Horse::where(['studs_id' => $stud->id])->get();

        }

        $total = (count($horses));
        $prueba = new Collection;
        /*CaballoCliente*/
        //$TOTALTIME = (new Functions())->MicroTiempo("\n\n\n\nTOTALTIME INICIo ");
        if ($adm == true) {
            for ($i = 0; $i < count($horses); $i++) {
                //$tiempo = (new Functions())->MicroTiempo("\n\n\n\nInicio ID $i ");

                $b = [];
                if (isset($horses[$i])) {
                    $c = $horses[$i];
                    $repor = Reporte::where('horse_id', $c->id)->get();
                    $reporte = count($repor->toArray()) != 0 ? "red" : '';
                    $stud_name = Stud::find($c->studs_id);
                    if (!empty($stud_name)) {
                        $stud_name = $stud_name->name;
                    } else {
                        $stud_name = 'Desconocido ' . $c->studs_id;
                    }
                    //$visita = ($c->getVisitantes() != 0) ? " data-toggle=\"tooltip\" title=\"Visitas " . $c->getVisitantes() . "\" " : '';
                    for ($z = 0; $z < count($cols); $z++) {

                        $k = $cols[$z];
                        //$t1 = (new Functions())->MicroTiempo("Col  $k ", $tiempo) - $tiempo;

                        //foreach ($columnsHorse1 as $k => $v) {
                        if ($k == 'stud') {
                            $b[$k] = "    <a href=\"" . route('caballo.editar', ['id' => $c->id]) . "\">" . $stud_name . "</a>";
                        } elseif ($k == 'raza') {
                            $b[$k] = (!empty($c->raza)) ? trans('horse.raza.' . $c->raza) : null;
                        } elseif ($k == 'sex') {
                            $b[$k] = (!empty($c->sex)) ? trans('horse.sex.' . $c->sex) : null;
                        } elseif ($k == 'color') {
                            $b[$k] = (!empty($c->color)) ? trans('horse.color.' . $c->color) : null;
                        } elseif ($k == "id") {
                            $b[$k] = Functions::RellenarCeros($c->id);
                        } elseif ($k == "img") {
                            //$i = 0;
                            $p = Photo::Horse($c->id)->first();
                            if (!empty($p)) {
                                $ta = view('backend.common.galleryimage', [
                                    'titulo' => $p->getName(),
                                    'id' => $p->id, 'imagen' => $p->getUrl(),
                                    'adminpanel' => 1, 'size' => $p->Size()])->render();
                                //
                                $b[$k] = str_replace('lsrc', 'src', $ta);
                            } else {

                                $ta = view('backend.common.galleryimage', [
                                    'titulo' => null,
                                    'id' => 0, 'imagen' => null,
                                    'adminpanel' => 1, 'size' => 0])->render();
                                //
                                $b[$k] = str_replace('lsrc', 'src', $ta);
                            }


                        } elseif ($k == "studP") {
                            $b[$k] = (!empty($c->stud)) ? $c->stud : null;

                        } elseif ($k == "raised") {
                            $b[$k] = (!empty($c->raised)) ? Functions::AjustarNumeroMil($c->raised) . " cm" : null;
                        } elseif ($k == "price") {
                            $b[$k] = (!empty($c->price)) ? Functions::AjustarNumeroMil($c->price) : null;
                        } elseif ($k == "action") {
                            $fasd = '';
                            if (count($repor->toArray()) != 0) {
                                /*REPORTES*/
                                $fasd = '<span style = "padding-left:10px;" > <span class="badge badge-pill badge-danger notifications_badge_top" >' . count($repor->toArray()) . '</span > </span > <br >';
                            }
                            $fasd .= '<a href = "#!" class="dropify-clear" onclick = "erasehorse(this,' . $c->id . ')" > <i class="fa fa-trash" aria-hidden = "true" > </i> </a >';
                            $b[$k] = $fasd;
                        } else {
                            $b[$k] = $c->{$k};
                        }
                    }
                    $prueba->push($b);
                    $sa[$i] = $b;
                }

            };
        } else {
            for ($i = 0; $i < count($horses); $i++) {
                $prueba->push(self::CaballoCliente($horses[$i]));
            };
        }
        //$t1 = (new Functions())->MicroTiempo("TIEMPO RORLA ", $TOTALTIME) - $TOTALTIME;
        if (!empty($r)) {
            // El paquete yajra/laravel-datatables no esta instalado; se genera
            // la respuesta JSON con el formato esperado por DataTables
            // (serverSide) con paginacion manual sobre la coleccion.
            $draw = (int) $r->input('draw', 0);
            $start = (int) $r->input('start', 0);
            $length = (int) $r->input('length', 25);
            $total = $prueba->count();
            $data = $prueba->slice($start, $length)->values()->all();

            $f = response()->json([
                'draw' => $draw,
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data,
            ]);

        } else {
            $f = $prueba;
            //$f = (new PublicController())->ComprimirText(json_encode($prueba));

        }

        return $f;
    }

    public function CaballoCliente(Horse $c)
    {
        //$c = Horse::find(3);
        if (empty($columns)) {
            $columns1 = [
                'name' => trans('horse.attrib.name'),
                'img' => trans('stud.photos'),
                'raised' => trans('horse.attrib.raised'),
                'birthdate' => trans('horse.age'),
                'raza' => trans('horse.attrib.raza'),
                'doma' => trans('horse.attrib.doma'),
                'sex' => trans('horse.attrib.sex'),
                'stud' => trans('horse.attrib.stud'),
                'color' => trans('horse.attrib.color'),
                'tosold' => trans('horse.attrib.tosold'),
                'price' => trans('horse.attrib.price'),
                'action' => trans('users.see'),

            ];

            $columns = [
                0 => 'name',
                1 => 'img',
                2 => 'raised',
                3 => 'birthdate',
                4 => 'raza',
                5 => 'doma',
                6 => 'sex',
                7 => 'stud',
                8 => 'color',
                9 => 'tosold',
                10 => 'price',
                11 => 'action',


            ];
        }
        $sa = [];
        for ($col = 0; $col < count($columns); $col++) {
            $k = $columns[$col];
            if ($k == "doma") {
                if ($c->doma == true or $c->doma == 1) {
                    $sa[$k] = trans('horse.doma.1');
                } else {
                    $sa[$k] = trans('horse.doma.0');
                }
            } elseif ($k == "img") {
                $p = Photo::Horse($c->id)->first();
                if (!empty($p)) {
                    $ta = view('backend.common.galleryimage', [
                        'titulo' => $p->getName(),
                        'id' => $p->id, 'imagen' => $p->getUrl(),
                        'adminpanel' => 1, 'size' => $p->Size()])->render();
                    //
                } else {

                    $ta = view('backend.common.galleryimage', [
                        'titulo' => null,
                        'id' => 0, 'imagen' => null,
                        'adminpanel' => 1, 'size' => 0])->render();
                    //
                }
                $sa[$k] = str_replace('lsrc', 'src', $ta);;
            } elseif ($k == "color") {
                $sa[$k] = $c->getColorString();
            } elseif ($k == "raised") {
                $sa[$k] = $c->getRaisedFormat();
            } elseif ($k == "sex") {
                $sa[$k] = $c->getSexString();
            } elseif ($k == "price") {
                $pt = '';
                if (!empty($c->price)) {
                    if ($c->price != 0) {
                        $pt .= "<span ";
                        if ($c->sold == 0) {
                            $pt .= view('backend.common.toolmoneda', ['horse' => $c, 'p' => 1, 'class' => ' tdo '])->render();
                        }
                        $pt .= " >" . $c->ObtenPrecioMonedaMill() . $c->getSimboloMoneda() . "</span>";
                    } elseif ($c->getTosold() == true) {
                        $pt .= trans('users.pricecheck1');
                    }
                }
                $sa[$k] = $pt;

            } elseif ($k == "name") {
                $sa[$k] = '<a href="' . route('horse.edit', ['id' => $c->id]) . '">' . $c->{$k} . '</a>';
            } elseif ($k == "raza") {
                $sa[$k] = trans('horse.raza.' . $c->raza);
            } elseif ($k == "birthdate") {
                $edad = $c->getAge();
                $mes = $c->getAgeMonth();
                if ($edad != 0) {
                    $sa[$k] = trans('horse.years', ['ano' => $edad]);
                } else {
                    $sa[$k] = trans('horse.mes', ['mes' => $mes]);
                }
            } elseif ($k == "tosold") {
                if ($c->getTosold() == true) {
                    $sa[$k] = trans('horse.tosold.1');
                } else {
                    $sa[$k] = trans('horse.tosold.0');
                }
            } elseif ($k == "action") {
                $sa[$k] = view('backend.content.horse.botones.dropdown', ['modelo' => $c])->render();
            } else {
                $sa[$k] = $c->{$k};
            }
        }
        return $sa;

    }


    public function Fotos(Request $r = null)
    {
        $user = \Auth::user();
        $adm = $user->isAdm();
        $foto = null;
        $prueba = new Collection;
        if ($adm == true) {
            $co = [
                'id' => '#',

                'url' => trans('photo.image'),
                'type' => 'Tipo',
                'tableid' => trans('photo.tableid'),
                'tama' => trans('size', ['kb' => 'kb']),

                'created_at' => trans('photo.Uploaded'),
                'action' => trans('photo.delete'),
                //'name' => 'Nombre',
                //'description' => 'Descripcion',
                //'titulo1' => 'Titulo',
                //'titulo2' => 'Subtitulo',
                //'order' => 'Orden',
                //'publish' => 'Publicada',
                //'updated_by' => '',
                //'deleted_by' => '',
            ];
            $foto = Photo::where('id', '!=', 0)->where('type', '!=', 10)->where('type', '!=', 8)->orderby('created_at', 'asc')->get();
        }


        $cont = 0;
        if (!empty($foto)) {
            if ($adm == true) {
                for ($ka = 0; $ka < count($foto); $ka++) {
                    $c = $foto[$ka];
                    $fa = [];
                    $v = [];
                    $cont = $cont + 1;
                    $ga = $c->getTypeString();
                    $ds = $c->ObtenerYeguada();

                    $v['id'] = Functions::RellenarCeros($cont);;
                    $v['url'] = view('backend.common.galleryimage', ['titulo' => $c->getName(), 'id' => $c->id, 'imagen' => $c->getUrl(), 'adminpanel' => 1, 'size' => $c->Size()])->render();

                    $v['type'] = (!empty($ga)) ? $ga : 'Desconocida';


                    $bla = '';
                    $v['tableid'] = (!empty($ds)) ? '<a href="' . route('yeguadas.show', ['id' => $ds->id]) . '">' . $c->ObtenerNombrePadre() . '</a>' : "Desconocida ";

                    $bla = "-";
                    $v['tama'] = (!empty($c->size)) ? Functions::AjustarNumeroMil($c->Size()) : $bla;
                    $v['created_at'] = Functions::AjustarFechaDmy($c->created_at);
                    $v['action'] = '<a href = "#!" class="dropify-clear" onclick = "erasephoto(this,' . $c->id . ',\'photo\')" > <i class="fa fa-trash" aria-hidden = "true" > </i > </a >';

                    /*foreach ($co as $k => $v) {*/
                    /*
                        foreach ($co as $k => $v) {





                    if ($k == 'stud') {
                        $fa[$k] = '<a href = "' . route('clientes.edit', ['id' => $c->id]) . '">' . $c->getStudName() . '</a >';
                    } elseif ($k == "id") {
                        $cont = $cont + 1;
                        $fa[$k] = Functions::RellenarCeros($cont);
                    } elseif ($k == "action") {
                        $fa[$k] = '<a href = "#!" class="dropify-clear" onclick = "erasephoto(this,' . $c->id . ',\'photo\')" > <i class="fa fa-trash" aria-hidden = "true" > </i > </a >';
                    } elseif ($k == 'url') {
                        $fa[$k] = view('backend.common.galleryimage', ['titulo' => $c->getName(), 'id' => $c->id, 'imagen' => $c->getUrl(), 'adminpanel' => 1, 'size' => $c->Size()])->render();
                    } elseif ($k == 'type') {
                        $ga = $c->getTypeString();
                        if (!empty($ga)) {
                            $fa[$k] = $ga;
                        } else {
                            $fa[$k] = 'Desconocida';
                        }
                    } elseif ($k == 'tama') {
                        $bla = "n/a";
                        $ble = 0;
                        if (!empty($c->size)) {
                            $ble = Functions::AjustarNumeroMil($c->Size());

                        }
                        if ($ble != 0) {
                            $fa[$k] = $ble;
                        } else {
                            $fa[$k] = $bla;
                        }
                    } elseif ($k == 'tableid') {
                        $ds = $c->ObtenerYeguada();
                        $bla = '';
                        if (!empty($ds)) {
                            $bla .= '<a href="' . route('yeguadas.show', ['id' => $ds->id]) . '">' . $c->ObtenerNombrePadre() . '</a>';
                        } else {
                            $bla = "Desconocida ";
                        }
                        $fa[$k] = $bla;
                    } elseif ($k == 'created_at') {
                        $fa[$k] = Functions::AjustarFechaDmy($c->created_at);
                    } else {
                        $fe = $c->{$k};
                        if (empty($fe)) {
                            $fa[$k] = "&nbsp";
                        } else {
                            $fa[$k] = $fe;
                        }

                        //&nbsp


                    }

                }
                    */
                    $prueba->push($v);

                }
            }
        }
        $fa = json_encode($prueba);
        return $fa;
        return (new PublicController())->ComprimirText(json_encode($prueba));;
    }


    public
    function Videos(Request $r = null)
    {
        $user = \Auth::user();
        $adm = $user->isAdm();
        $foto = null;
        $prueba = new Collection;
        if ($adm == true) {
            $co = [
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
            $foto = Video::where('id', '!=', 0)->orderby('id', 'asc')->get();;

        }


        $cont = 0;
        if (!empty($foto)) {
            if ($adm == true) {
                for ($ka = 0; $ka < count($foto); $ka++) {
                    $bla = "n/a";
                    $ble = "&nbsp";

                    $c = $foto[$ka];
                    $fa = [];
                    foreach ($co as $k => $v) {
                        if ($k == 'stud') {
                            $fa[$k] = '<a href="' . route('clientes.edit', ['id' => $c->id]) . '">' . $c->getStudName() . '</a>';
                        } elseif ($k == "id") {
                            $cont = $cont + 1;
                            $fa[$k] = Functions::RellenarCeros($cont);
                        } elseif ($k == 'type') {
                            $fa[$k] = $c->getTypeString();
                        } elseif ($k == 'tableid') {
                            $fa[$k] = $c->ObtenerNombrePadre();
                        } elseif ($k == 'created_at') {
                            $fa[$k] = Functions::AjustarFechaDmy($c->created_at);
                        } elseif ($k == 'url') {
                            if (!empty($c->getEmbedVideoYoutube())) {
                                $fa[$k] = view('backend.common.galleryimage', ['titulo' => $c->getName(), 'id' => $c->id, 'imagen' => $c->getYoutubeThumb(), 'embed' => $c->getEmbedVideoYoutube(), 'video' => 1, 'specialvideo' => 1])->render();
                            }
                        } elseif ($k == "action") {
                            $fa[$k] = '<a href="#!" class="dropify-clear" onclick="erasephoto(this,' . $c->id . ',\'video\')"> <i class="fa fa-trash" aria-hidden="true"> </i> </a>';
                        } else {
                            $fa[$k] = $c->{$k};
                        }

                        if (empty($fa[$k])) {
                            $fa[$k] = $ble;
                        }
                    }
                    $prueba->push($fa);
                }
            }
        }

        return json_encode($prueba);
        return (new PublicController())->ComprimirText(json_encode($prueba));;
    }


    public function BusquedaOlonkar(Request $r, Stud $slug)
    {
        $horses = Horse::Caballos($slug);
        $total = $horses->get();
        $stud = $slug;
        $consulta = '';
        $objetos = [];
        $paginate = 25;
        $current = 0;
        $t = 0;
        $sa = 0;

        if (isset($r->statuses)) {
            $consulta = json_decode(urldecode($r->statuses));
            foreach ($consulta as $k => $v) {
                $objetos_ = [];
                $objetos_ = [
                    'name' => $v->name,
                    'data' => $v->data,
                    'type' => $v->type,
                ];
                $objetos[$t] = $objetos_;
                $t = $t + 1;
                if ($v->type == "items-per-page-drop-down") {
                    /*Paginacion*/
                    $paginate = $v->data->number;
                    if (!empty($paginate)) {
                        $sa = 1;
                    }

                } elseif ($v->type == 'pagination') {
                    $current = $v->data->currentPage;
                }


            }

            /*
            $fa['dato'] = $objetos;
            $fa['eva'] = $paginate;
            $fa['status'] = 200;
            return Functions::RetornaJson($fa);
            */

        }

        /*
                $fa['horses'] = $horses;
                $fa['data'] = $r->all();
                $fa['datos'] = $consulta;
                $fa = $consulta;
                $fa['status'] = 200;
                return Functions::RetornaJson($fa);

                */
        //$horses = $horses->get();
        if ($sa == 1) {
            $horses = $horses->paginate($paginate);
            return (new PublicController())->ComprimirText(view('frontend.landing.v3.partial.CartaCaballo', compact('horses', 'stud'))->render());

        } else {
            $horses = $total;
            return view('frontend.landing.v3.partial.CartaCaballo', compact('horses', 'stud'));
        }


    }

}

