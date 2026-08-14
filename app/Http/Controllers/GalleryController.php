<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.content.gallery.index');
    }
    public function RetornaCssGallery()
    {


        $txt = view('backend.content.gallery.css')->render();
        $s = new PublicController();
        return $s->RetronoCompreso('text/css',$txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/css');

    }

    public function RetornaJsGallery()
    {

        $txt = view('backend.content.gallery.js')->render();
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }
    public function index2()
    {
        //
        return view('backend.content.gallery.indexalt');
    }
    public function index3()
    {
        //
        return view('backend.content.gallery.indexalt-2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.content.gallery.index');
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
        return view('backend.content.gallery.index');
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
        return view('backend.content.gallery.index');
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
