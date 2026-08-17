<?php

namespace App\Http\Controllers;

use App;
use App\Models\Horse;
use App\Models\Sell;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function flash;
use function redirect;
use function strlen;
use function strtoupper;
use function view;


class HorseController extends Controller
{
    protected $columns;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->columns = [
            'name' => trans('horse.attrib.name'),
            'img' => trans('stud.photos'),
            'raised' => trans('horse.attrib.raised'),
            'birthdate' => trans('horse.attrib.birthdate'),
            'raza' => trans('horse.attrib.raza'),
            'doma' => trans('horse.attrib.doma'),
            'sex' => trans('horse.attrib.sex'),
            'stud' => trans('horse.attrib.stud'),
            'color' => trans('horse.attrib.color'),
            'tosold' => trans('horse.attrib.tosold'),
            //'sold' => trans('horse.attrib.sold'),
            'price' => trans('horse.attrib.price'),
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];

    }

    public function HorseEditJs($id)
    {
        $s = new PublicController();
        $horse = Horse::find($id);

        $txt = view('backend.content.horse.jsedit', compact('horse'))->render();
        return $s->RetronoCompreso('text/javascript', $txt, 10);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }

    public function IndexJs()
    {
        $user = \Auth::user();
        $txt = view('backend.content.horse.js', compact('user'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }

    public function IndexCss()
    {
        $user = \Auth::user();
        $txt = view('backend.content.horse.css', compact('user'))->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/css');

    }

    public function index()
    {
        //
        $horses = Horse::where([
            'studs_id' => \Auth::user()->Yeguada()->id,
            'sold' => 0,
        ])->get();
        $this->columns = [
            'name' => trans('horse.attrib.name'),
            'img' => trans('stud.photos'),
            'raised' => trans('horse.attrib.raised'),
            //'birthdate' => trans('horse.attrib.birthdate'),
            'birthdate' => trans('horse.age'),
            'raza' => trans('horse.attrib.raza'),
            'doma' => trans('horse.attrib.doma'),
            'sex' => trans('horse.attrib.sex'),
            'stud' => trans('horse.attrib.stud'),
            'color' => trans('horse.attrib.color'),
            'tosold' => trans('horse.attrib.tosold'),
            //'sold' => trans('horse.attrib.sold'),
            'price' => trans('horse.attrib.price'),
            'action' => trans('users.see'),
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $columns = $this->columns;
        return view('backend.content.horse.index', compact('horses', 'columns'));
    }

    public function index2()
    {
        //
        $horses = Horse::where('id', '!=', 0)->get();
        return view('backend.content.horse.index2', compact('horses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $horse = new Horse();
        return view('backend.content.horse.create', compact('horse'));
    }

    public function create2()
    {
        //
        $horse = new Horse();
        return view('backend.content.horse.create2', compact('horse'));
    }

    public function save2(Request $r)
    {

        $t = \Session::get('horse');
        //flash($t)->error();
        if (!isset($t)) {
            \Session::flash('horse', 1);


            $data = $r->all();
            $data['sms'] = "Guardando Caballo Nuevo";
            $user = \Auth::user();
            $user_id = $user->id;
            $studs = $user->Yeguada();
            $studs_id = $studs->id;
            $nocontinuar = false;
            $horse = null;
            $raised = Functions::ConvertirNumeroAFloat($data['raised']);/*Generar solo numeros, coma por punto*/
            $nombre = (isset($data['name'])) ? $data['name'] : null;
            $bdate = (!empty($data["date"])) ? $data["date"] : Carbon::now();
            $raza = (isset($data['raza'])) ? $data['raza'] : 0;
            $gene = (isset($data['genealogia'])) ? $data['genealogia'] : null;
            $doma = (isset($data['doma'])) ? $data['doma'] : false;
            $descripcion = (isset($data['descripcion'])) ? $data['descripcion'] : null;
            $color = (isset($r->colorselect)) ? $r->colorselect : 0;
            $tosold = (isset($data['tosold'])) ? $data['tosold'] : false;
            $cubribol = (isset($data['cubribol'])) ? $data['cubribol'] : false;
            $video = (isset($data['video'])) ? $data['video'] : [];
            $sex = (isset($r->sex)) ? $r->sex : 0;
            $price = (isset($data['price'])) ? $data['price'] : 0;
            $price = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($price, '', ' €'));
            $cubri = (isset($data['cubri'])) ? $data['cubri'] : 0;
            $cubri = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($cubri, '', ' €'));
            $id = (isset($data['horse_id'])) ? $data['horse_id'] : 0;
            $moneda = (isset($data['moneda'])) ? $data['moneda'] : null;
            $moneda = (!empty($moneda)) ? $moneda : $r->moneda;
            $moneda = strtoupper($moneda);
            if (!empty($moneda)) {
                \Auth::user()->Yeguada()->setMoneda(strtoupper($moneda))->push();
            }


            //dd($id);
            //return Functions::RetornaJson(['d'=>$id]);
            //return Functions::RetornaJson($data);
            $stud = (isset($data['input_horse_stud'])) ? $data['input_horse_stud'] : null;


            if (empty($stud)) {
                $stud = (isset($data['input_horse_stud'])) ? $data['input_horse_stud'] : null;
            }
            if (empty($stud)) {
                $stud = (isset($data['input_horse_stud'])) ? $data['input_horse_stud'] : null;
            }
            if (empty($nombre)) {
                $sal['sms'] = "Nombre vacio";
                return Functions::RetornaJson($sal);
            }


            if (empty($sex) or $sex == 0) {
                $sal['sms'] = "Debes indicar algun genero";
                return Functions::RetornaJson($sal);
            } elseif (empty($color) or $color == 0) {
                $sal['sms'] = "Debes indicar la capa";
                return Functions::RetornaJson($sal);
            } elseif (empty($raza) or $raza == 0) {
                $sal['sms'] = "Debes indicar la raza";
                return Functions::RetornaJson($sal);
            } elseif (strlen($nombre) < 2) {
                $sal['sms'] = "El caballo debe tener un nombre";
                return Functions::RetornaJson($sal);
            }
            //if(empty($r->name)) $e['name'] = 'Nombre vacio';
            //if(empty($r->date)) $e['date'] = 'Fecha vacio';
            $horse = Horse::find($id);


            if (empty($horse)) {
                $horse = Horse::where(['users_id' => $user_id, 'name' => $nombre, 'studs_id' => $stud])->first();
                $nocontinuar = true;
            }

            if (empty($horse)) {
                $now = Carbon::now();
                $now_3 = Carbon::now()->subMinutes(3);
                //$max = Horse::where('id', '!=', 0)->max('id') + 1;
                $h = Horse::where([
                    'name' => $nombre,
                    'studs_id' => \Auth::user()->Yeguada()->id,
                    //'created_at' => $now_3
                ])->
                whereBetween('created_at', [$now_3, $now])
                    ->first();

                //return Functions::RetornaJson(['r'=>$max]);
                if (empty($h)) {
                    $horse = new Horse([
                        //'id' => $max,
                        'name' => $nombre,
                        'raised' => $raised,
                        'birthdate' => $bdate,
                        'raza' => $raza,
                        'doma' => $doma,
                        'sex' => $sex,
                        'stud' => $stud,
                        'tosold' => $tosold,
                        'color' => $color,
                        'descripcion' => $descripcion,
                        'price' => $price,
                        'cubri' => $cubri,
                        'tocubri' => $cubribol,
                        'users_id' => $user->id,
                        'genealogia' => $gene,
                        'monedabase' => $moneda,
                    ]);
                    $horse->save();
                } else {
                    $horse = $h;
                }

                $horse->price = $price;
                $horse->cubri = $cubri;
                $horse->tosold = $tosold;
                $horse->doma = $doma;
                $horse->raza = $raza;


                $horse->VerificarCubricion($cubribol)->push();
                $data['horse'] = $horse;
                $data['horse_id'] = $horse->id;
                $data['status'] = 200;

                /*Video*/
                $ff = [];
                $type = 'horse';

                if ($type == 'horse') {
                    if (!empty($horse)) {
                        foreach ($video as $k => $v) {
                            //setVideos($url, $description = null, $id = null)
                            $video = new Video(['tableid' => $horse->id, 'type' => 4]);
                            $video->setVideoYoutube($v)->setName();
                            if (empty($video->getName()) or $video->getName() == '') {
                                $video->setName($horse->name);
                            }
                            //$vod = Video::where(['url'=>$video->url,'tableid'=>$horse->id])->first();

                            $sal['el'] = null;
                            //$sal['sms'] = 'El video se encuentra duplicado';
                            if (empty($vod)) {
                                $vod = Video::NormalBuscarVidHorse($horse->id, $video->url)->first();
                                if (empty($vod)) {
                                    $video->push();
                                }
                                $sal['id'] = $video->id;
                                $sal['tipo'] = $video->type;
                                $sal['youtube_id'] = $video->url;
                                $sal['youtube_embed'] = $video->getEmbedVideoYoutube();
                                $sal['youtube_img'] = $video->getYoutubeThumb();
                                $sal['youtube_name'] = $video->getName();
                                $sal['sms'] = trans('horse.processcomplet');
                                $titulo = $video->getName();
                                $id = $video->id;
                                $imagen = $video->getYoutubeThumb();
                                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                                $ff[$k] = $sal;
                            }
                        }
                    }

                }

                $r->request->add(['horse_id' => $horse->id]);
                $r->request->add(['id' => $horse->id]);
                $r->request->add(['type' => 'horse']);

                $t = new FileController();

                $data['img'] = $t->Imagen($r);
                $data['video'] = $ff;
                $data['status'] = 200;
                $fa = $horse->GetUrlLenguaje(App::getLocale());
                if (is_array($fa)) {
                    $fa = $fa[App::getLocale()];
                }

                $link = route('MyHorseDetailed', ['stud' => \Auth::user()->Yeguada()->slug, 'horse' => $fa]);
                $text = Functions::CompartirFacebook($horse->name, $link);
                $data['facebook'] = $text;
                \Session::flash('facebook', $link);
                \Session::flash('horse_name', $horse->name);
                flash(trans('error.AddHorse', ['name' => $nombre]))->success();
                flash(trans('error.AddHorseShare', ['socials' => "<a href='$text'>Facebook</a>"]))->success();
                return Functions::RetornaJson($data);
            }

        } else {
            $sal['status'] = 200;
            return Functions::RetornaJson($sal);

        }
        /*Video*/


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        /*
        $s['status']=200;
        $s['d']=$data;
        return Functions::RetornaJson($s);
        */


        $horse = null;
        $raised = Functions::ConvertirNumeroAFloat($data['raised']);/*Generar solo numeros, coma por punto*/
        $nombre = (isset($data['name'])) ? $data['name'] : null;

        $bdate = (!empty($data["birthdate"])) ? $data["birthdate"] : Carbon::now();
        $raza = (isset($data['raza'])) ? $data['raza'] : null;
        $doma = (isset($data['doma'])) ? $data['doma'] : false;
        $descripcion = (isset($data['description'])) ? $data['description'] : null;
        $color = (isset($data['color'])) ? $data['color'] : 0;
        $tosold = (isset($data['tosold'])) ? $data['tosold'] : false;
        $gene = (isset($data['genealogia'])) ? $data['genealogia'] : null;
        $moneda = (isset($data['moneda'])) ? $data['moneda'] : null;
        //
        $moneda = (!empty($moneda)) ? $moneda : $request->monedabase;
        $moneda = strtoupper($moneda);
        if (!empty($moneda)) {
            \Auth::user()->Yeguada()->setMoneda(strtoupper($moneda))->push();
        }


        $sex = (isset($data['sex'])) ? $data['sex'] : 0;
        $price = (isset($data['price'])) ? $data['price'] : 0;

        $price = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($price, '', ' €'));
        $cubri = (isset($data['cubri'])) ? $data['cubri'] : 0;
        $tocubri = (isset($data['cubribol'])) ? $data['cubribol'] : 0;
        $cubri = Functions::ConvertirNumeroAFloat(Functions::BuscarReemplazarString($cubri, '', ' €'));
        $id = (isset($data['id'])) ? $data['id'] : null;
        $stud = (isset($data['stud'])) ? $data['stud'] : null;


        if (empty($stud)) {
            $stud = (isset($data['input_horse_stud'])) ? $data['input_horse_stud'] : null;
        }
        if (empty($stud)) {
            $stud = (isset($data['input_horse_stud'])) ? $data['input_horse_stud'] : null;
        }
        if (empty($nombre)) {
            $sal['sms'] = "Nombre vacio";
            return Functions::RetornaJson($sal);
        }
        if (!empty($id)) {
            $horse = Horse::find($id);
        }
        $user = \Auth::user();
        $user_id = $user->id;
        if (empty($horse)) {
            $horse = new Horse();
        }

        if ($tosold == "false") $tosold = 0;
        if ($doma == "false") $doma = 0;

        if (empty($sex) or $sex == 0) {
            $sal['sms'] = "Debes indicar algun genero";
            return Functions::RetornaJson($sal);
        } elseif (empty($color) or $color == 0) {
            $sal['sms'] = "Debes indicar la capa";
            return Functions::RetornaJson($sal);
        } elseif (empty($raza) or $raza == 0) {
            $sal['sms'] = "Debes indicar la raza";
            return Functions::RetornaJson($sal);
        } elseif (strlen($nombre) < 2) {
            $sal['sms'] = "El caballo debe tener un nombre";
            return Functions::RetornaJson($sal);
        }

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
        setUsersId($user_id)->
        setCreatedBy($user_id)->
        setStudsId($user_id)->
        setCubri($cubri)->
        setToCubri($tocubri)->
        setGenealogia($gene)->
        setMonedabase($moneda)->
        setPrice($price);
        //return Functions::RetornaJson($horse->toArray());
        //return Functions::RetornaJson(['d'=>$tosold]);

        $horse->price = $price;
        $horse->cubri = $cubri;
        $horse->tocubri = $tocubri;
        $horse->tosold = $tosold;
        $horse->doma = $doma;

        $horse->push();
        $horse->CambioDoma($doma);
        $horse->CambioVenta($tosold);
        $sal['sms'] = 'Actualizacion completa paso a archivo';
        $sal['horse'] = $horse;
        // FIXED: Photo upload is now handled exclusively via AJAX FileController@Imagen
        // Removed duplicate file processing that caused every photo to be saved twice
        // The frontend sends photos separately via the FileInput plugin

        $sal['horse'] = $horse;
        $sal['status'] = 200;
        $sal['sms'] = 'Actualizacion completa';
        $sal['id'] = $horse->id;
        return Functions::RetornaJson($sal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
        return view('backend.content.horse.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (\Auth::user()->isAdm()) {
            $horse = Horse::find($id);
        } else {
            $stud = \Auth::user()->Yeguada();
            $horse = Horse::where(['id' => $id, 'studs_id' => $stud->id])->first();
        }
        if (empty($horse)) {

            flash(trans('error.NoHorse'))->error();
            return redirect()->route('caballoc.index');
        }
        if ($horse->sold != 0) {
            flash(trans('error.NoSold'))->error();
            return redirect()->route('caballoc.index');
        }

        return view('backend.content.horse.edit', compact('horse'));
    }

    public function edit2($id)
    {
        //
        if (\Auth::user()->isAdm()) {
            $horse = Horse::find($id);
        } else {
            $stud = \Auth::user()->Yeguada();
            $horse = Horse::where(['id' => $id, 'studs_id' => $stud->id])->first();
        }
        if (empty($horse)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->route('caballoc.index');
        }
        return view('backend.content.horse.edit2', compact('horse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Horse $horse
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Horse $horse)
    public function update(Request $request, $id = null)
    {

        $data = $request->all();
        $horse = Horse::find($id);
        if (\Auth::user()->isAdm()) {
            $horse = Horse::find($id);
        } else {
            $stud = \Auth::user()->Yeguada();
            $horse = Horse::where(['id' => $id, 'studs_id' => $stud->id])->first();
        }
        if (empty($horse)) {
            flash(trans('error.NoHorse'))->error();
            return redirect()->route('caballoc.index');
        }
        if (empty($horse)) return Functions::RetornaJson(['status' => 400, 'sms' => trans('error.NoFoundHorse')]);
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

        $user = \Auth::user();
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

    public function update2(Request $request, $id = null)
    {
        $t = \Session::get('horse');
        if (!isset($t)) {
            \Session::flash('horse', 1);
            $data = $request->all();
            //$horse = Horse::find($id);
            if (\Auth::user()->isAdm()) {
                $horse = Horse::find($id);
            } else {
                $stud = \Auth::user()->Yeguada();
                $horse = Horse::where(['id' => $id, 'studs_id' => $stud->id])->first();
            }
            if (empty($horse)) {
                flash(trans('error.NoHorse'))->error();
                return redirect()->route('caballoc.index');
            }
            if (empty($horse)) return Functions::RetornaJson(['status' => 400, 'sms' => trans('error.NoFoundHorse')]);
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

            $user = \Auth::user();
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
            flash(trans('error.UpdateHorse', ['name' => $horse->name]))->success();
            $sal['id'] = $horse->id;

        } else {
            $sal = $request->all();
        }
        return Functions::RetornaJson($sal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        //
    }

    public function setFav(Request $r, $id)
    {
        $aa = $r->seti;
        if (\Auth::user()->isAdm()) {
            $t = Horse::find($id);
        } else {
            $t = Horse::where(['id' => $id, 'users_id' => \Auth::user()->id])->first();
        }

        if (!empty($t)) {
            $t->favorite = $aa;
            $t->push();
            $s = $t->getFavorite();

        }
        return $s;
    }

    public function Borrar(Request $r, $id)
    {

        if (\Auth::user()->isAdm()) {
            $t = Horse::find($id);
        } else {
            $t = Horse::where(['id' => $id, 'users_id' => \Auth::user()->id])->first();
        }

        if (!empty($t)) {
            $t->delete();
            return 1;

        }
        return 1;
    }

    public function Vendido(Request $r, $id)
    {


        if (\Auth::user()->isAdm()) {
            $t = Horse::find($id);
        } else {
            $t = Horse::where([
                'id' => $id,
                'users_id' => \Auth::user()->id,
                'sold' => 0,
                'tosold' => 1
            ])->first();
        }


        if (!empty($t)) {
            $venta = Sell::where('horse_id', $t->id)->first();
            if (empty($venta)) $venta = new Sell();
            $venta->setUserId(\Auth::user()->id)->setHorseId($t->id)->setDate()->push();
            $t->setSold(1)->push();
            return 1;
        }
        return 1;
    }

}

