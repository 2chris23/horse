<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Sell;

use function array_push;
use Carbon\Carbon;
use DB;
use function flash;
use Illuminate\Http\Request;
use function redirect;
use function route;


class SellController extends Controller
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
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $venta = new Horse(); /*Cambiar por venta*/
        return view('backend.content.sell.create', compact('venta'));
        return view('backend.content.sell.index');
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
     * @param  \App\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $horse = Horse::find($id);
        if (empty($horse)) {
            flash('No se encontro el elemento')->error();
            $url = route('sell.create');
            return redirect($url);
        }
        $venta = Sell::where('horse_id', $horse->id)->first();
        return view('backend.content.sell.show', compact('horse', 'venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        return view('backend.content.sell.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

    public function DatosRango(Request $r)
    {


        $inicial = $r->primero;
        $final = $r->segundo;
        $vi = Functions::AjustarFechaTimeStamp($inicial);
        $vf = Functions::AjustarFechaTimeStamp($final);
        $horses = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        $ventad = Sell::wherein('horse_id', $horses);

        $inicial = Carbon::parse($inicial);
        $final = Carbon::parse($final);
        $ck = 0;
        if ($vi > $vf) {
            //echo $inicial . " > " . $final . "<br>";

            $c = $inicial;
            $f = $final;
            $inicial = $f;
            $final = $c;
            $ck = 1;

        } elseif ($vi < $vf) {
            //echo $inicial . " < " . $final . "<br>";
            //$inicial->subMonth();
            //$final->addMonth();

            $ck = 1;
        }

        if ($ck = 1) {
            $venta = $ventad->wherein('horse_id', $horses)->
            whereBetween('date', [$inicial, $final]);
        } else {
            $venta = $ventad->wherein('horse_id', $horses)->where('date', $inicial);
        }
        $venta = $venta->get();

        $inicial->subMonth();
        $final->addMonth();

        //echo $inicial . " -- " . $final . "<br>";
        //dd($venta);
        $venta->pluck('horse_id');

        //$horses = Horse::wherein('id', $venta)->get();

        /*Igual*/

        $ventad = Sell::query()->wherein('horse_id', $venta->pluck('horse_id'))->groupby('date')->
        select(
            'id',
            'created_at',
            'updated_at',
            'horse_id',
            'user_id',
            'date',
            DB::raw('count(date) as total')
        )->get();
        $venta = Horse::wherein('id', $venta)->get();
        $tiempos = Sell::wherein('horse_id', $venta);
        $datemin = $inicial;
        $datemax = $final;
        //$ventad = Sell::wherein('horse_id',$horses)->groupby('date')->select('count(*) as cantidad ')->get();
        $columns = [
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
            //'tosold' => trans('horse.attrib.tosold'),
            'sold' => trans('horse.attrib.solde'),
            'price' => trans('horse.attrib.price'),
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $this->columns = $columns;
        $horses = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        $tiempos = Sell::wherein('horse_id', $horses)->groupby('date')->get()->pluck('date');
        //$user = \Auth::user();
        //$stud = $user->Yeguada();
        //$venta = Horse::where(['studs_id' => $stud->id, 'sold' => 1])->with('Ventas')->get();

        return view('backend.content.sell.create', compact('venta', 'columns', 'ventad', 'datemin', 'datemax', 'tiempos'));
        /*IGUAL*/


    }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $venta = new Horse(); /*Cambiar por venta*/
        //$ventas = \Auth::user()->Yeguada()->Horses()->with('Ventas')->get();
        //$stud = \Auth::user()->Yeguada()->Horses();
        $horses = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        $ventad = Sell::wherein('horse_id', $horses)->get()->pluck('horse_id');
        $venta = Horse::wherein('id', $ventad)->get();
        $tiempos = Sell::wherein('horse_id', $horses);

        $datemin = $tiempos->min('date');
        $datemax = $tiempos->max('date');
        $dd = Functions::AjustarFechaY($datemin);
        $ds = Functions::AjustarFechaY();

        $anios = [];
        for ($dd; $dd <= $ds; $dd++) {
            array_push($anios, $dd);
        }
        $mes = trans('sell.meses');
        $cm = [];
        $ii = Functions::AjustarFechaY($datemin);
        $if = Functions::AjustarFechaY();

        for ($f = $ii; $f <= $if; $f++) {

                foreach($mes as $k=>$v)
                {

                    $cm[$f][$k] = Sell::query()->
                    //where('user_id', \Auth::user()->id)->
                    wherein('horse_id', $horses)->
                    //whereRaw('MONTH(date) = ?', [$tt])->
                    //whereRaw('YEAR(date) = ?', [$f])->
                    whereMonth('date', '=', $k)->
                    whereYear('date', '=', ($f))->
                    groupby('date')->
                    get();
                }

        }


        $tiempos = $tiempos->groupby('date')->get()->pluck('date');

        $ventamin = $datemin;
        $ventamax = $datemax;
        $ventad = Sell::query()->wherein('horse_id', $horses)->groupby('date')->
        select(
            'id',
            'created_at',
            'updated_at',
            'horse_id',
            'user_id',
            'date',
            DB::raw('count(date) as total')
        )->get();
        $razas = Horse::wherein('id',$ventad->pluck('horse_id'))->select('raza', DB::raw('count(raza) as total'))->
//whereYear('date', '=', ($inicial))->
groupby('raza')->
get();


$sexos = Horse::wherein('id',$ventad->pluck('horse_id'))->select('sex', DB::raw('count(sex) as total'))->
//whereYear('date', '=', ($inicial))->
groupby('sex')->
get();

        $r = [];
             foreach($razas as $k=>$v){
            $r[$k][$v->raza]=$v->total;

        };
        $raza = $r;


           $fs = [];
             foreach($sexos as $k=>$v){
            $fs[$k][$v->sex]=$v->total;

        };
        $sexos = $fs;
        //$ventad = Sell::wherein('horse_id',$horses)->groupby('date')->select('count(*) as cantidad ')->get();

        $columns = [
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
            //'tosold' => trans('horse.attrib.tosold'),
            'sold' => trans('horse.attrib.solde'),
            'price' => trans('horse.attrib.price'),
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $this->columns = $columns;

        //$user = \Auth::user();
        //$stud = $user->Yeguada();
        //$venta = Horse::where(['studs_id' => $stud->id, 'sold' => 1])->with('Ventas')->get();

//$anios = [];
        $ventas = $cm;
        return view('backend.content.sell.create', compact('venta', 'columns', 'ventad', 'datemin', 'datemax', 'tiempos','ventas','anios','raza','sexos'));
    }
    public function BusquedaSimple(Request $r)
    {
        //
        $inicial = $r->primero;
        if(empty($inicial)) return redirect()->back();
        $venta = new Horse(); /*Cambiar por venta*/
        //$ventas = \Auth::user()->Yeguada()->Horses()->with('Ventas')->get();
        //$stud = \Auth::user()->Yeguada()->Horses();
        $horses = \Auth::user()->Yeguada()->Horses()->get()->pluck('id');
        $ventad = Sell::wherein('horse_id', $horses)->whereYear('date', '=', ($inicial))->get()->pluck('horse_id');
        $venta = Horse::wherein('id', $ventad)->get();
        $tiempos = Sell::wherein('horse_id', $horses)->whereYear('date', '=', ($inicial));

        $datemin = $tiempos->min('date');
        $datemax = $tiempos->max('date');
        $dd = Functions::AjustarFechaY($datemin);
        $ds = Functions::AjustarFechaY();

        $anios = [];
        for ($dd; $dd <= $ds; $dd++) {
            array_push($anios, $dd);
        }
        $mes = trans('sell.meses');
        $cm = [];
        $ii = Functions::AjustarFechaY($datemin);
        $if = Functions::AjustarFechaY();

$ddss = [];

            foreach($mes as $k=>$v)
            {

                $cm[$inicial][$k] = Sell::query()->
                //where('user_id', \Auth::user()->id)->
                wherein('horse_id', $horses)->
                //whereRaw('MONTH(date) = ?', [$tt])->
                //whereRaw('YEAR(date) = ?', [$f])->
                whereMonth('date', '=', $k)->
                whereYear('date', '=', ($inicial))->
                groupby('date')->
                get();
                /*
                $dasd = $cm[$inicial][$k]->pluck('horse_id');
                foreach ($dasd as $key => $value) {
                    array_push($ddss, $value);
                }
                */
                
            }


        $tiempos = $tiempos->groupby('date')->get()->pluck('date');

        $ventamin = $datemin;
        $ventamax = $datemax;
        $ventad = Sell::query()->wherein('horse_id', $horses)->whereYear('date', '=', ($inicial))->groupby('date')->
        select(
            'id',
            'created_at',
            'updated_at',
            'horse_id',
            'user_id',
            'date',
            DB::raw('count(date) as total')
        )->get();
        
$razas = Horse::wherein('id',$ventad->pluck('horse_id'))->select('raza', DB::raw('count(raza) as total'))->
//whereYear('date', '=', ($inicial))->
groupby('raza')->
get();


$sexos = Horse::wherein('id',$ventad->pluck('horse_id'))->select('sex', DB::raw('count(sex) as total'))->
//whereYear('date', '=', ($inicial))->
groupby('sex')->
get();

        $r = [];
             foreach($razas as $k=>$v){
            $r[$k][$v->raza]=$v->total;

        };
        $raza = $r;


           $fs = [];

             foreach($sexos as $k=>$v){

            $fs[$k][$v->sex]=$v->total;

        };

        $sexos = $r;


        //$ventad = Sell::wherein('horse_id',$horses)->groupby('date')->select('count(*) as cantidad ')->get();

        $columns = [
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
            //'tosold' => trans('horse.attrib.tosold'),
            'sold' => trans('horse.attrib.solde'),
            'price' => trans('horse.attrib.price'),
            /*
        'users_id'=>trans('horse.attrib.users_id'),
        'created_by'=>trans('horse.attrib.created_by'),
        'updated_by'=>trans('horse.attrib.updated_by'),
        'deleted_by'=>trans('horse.attrib.deleted_by'),
        */
        ];
        $this->columns = $columns;

/*http://www.jqueryflottutorial.com/how-to-make-jquery-flot-area-chart.html*/
/*http://www.jqueryflottutorial.com/how-to-make-jquery-flot-time-series-chart.html*/

        $datemin = Sell::wherein('horse_id', $horses)->min('date');
        $dd = Functions::AjustarFechaY($datemin);
        $ds = Functions::AjustarFechaY();

        $anios = [];
        for ($dd; $dd <= $ds; $dd++) {
            array_push($anios, $dd);
        }
        //$user = \Auth::user();
        //$stud = $user->Yeguada();
        //$venta = Horse::where(['studs_id' => $stud->id, 'sold' => 1])->with('Ventas')->get();

//$anios = [];
        $ventas = $cm;
        return view('backend.content.sell.create', compact('venta', 'columns', 'ventad', 'datemin', 'datemax', 'tiempos','ventas','anios','inicial','raza','sexos'));
    }
}


