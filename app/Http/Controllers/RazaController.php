<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use function compact;
use Illuminate\Http\Request;
use function redirect;
use function trans;

class RazaController extends Controller
{
    public function __construct()
    {

        $this->columns = [
            'id' => '#',
            'name' => trans('raza.attrib.name'),
            'status' => trans('raza.attrib.status'),
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
        if(\Auth::user()->getType()!=0) return redirect()->route('home');
        $z = count(Raza::all());

        $columns = $this->columns;
        if ($z == 0) {
            $d = trans('horse.raza');

            foreach ($d as $k => $v) {
                if ($k != 0) {
                    $s = new Raza();
                    $s->setName(trans('horse.raza.' . $k))->setStatus(0)->push();
                }
            }
        }


        $raza = Raza::where('id', '!=', 0)->paginate(20);
        return view('backend.content.raza.index', compact('columns', 'raza'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.content.raza.create');
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
     * @param  \App\Models\Raza $raza
     * @return \Illuminate\Http\Response
     */
    public function show(Raza $raza)
    {
        //
        return view('backend.content.raza.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raza $raza
     * @return \Illuminate\Http\Response
     */
    public function edit(Raza $raza)
    {
        //
        return view('backend.content.raza.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Raza $raza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raza $raza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raza $raza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raza $raza)
    {
        //
    }
}

