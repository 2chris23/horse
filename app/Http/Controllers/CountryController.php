<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public $columns;

    /**
     * CountryController constructor.
     * @param $columns
     */
    public function __construct()
    {

        $this->columns = [
            'name' => trans('country.attrib.name'),
            'shortname' => trans('country.attrib.shortname'),
            'status' => trans('country.attrib.status'),
            //'created_by' => trans('country.attrib.created_by'),
            //'updated_by' => trans('country.attrib.updated_by'),
            //'deleted_by' => trans('country.attrib.deleted_by'),
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
        $columns = $this->columns;
        $country = Country::get();
        return view('backend.content.country.index', compact('country', 'columns'));

    }

    public function SetPrimary(Request $request)
    {
        $id = $request->id;
        $sal['status'] = 400;
        $sal['sms'] = "Id nulo";
        $sal['st'] = 0;
        if (!empty($id)) {
            $d = Country::find($id);

            if (!empty($d)) {
                $d->setStatus()->push();

                $sal['status'] = 200;
                $sal['sms'] = "Pais actualizado";
                $sal['st'] = $d->getStatus();
            } else {
                $sal['status'] = 400;
                $sal['sms'] = "No se encontro el pais con id $id";

            }


        }
        return Functions::RetornaJson($sal);

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
}

