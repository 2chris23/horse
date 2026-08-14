<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Video;
use Illuminate\Http\Request;
use function compact;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $columns = [
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
        $video = \Auth::user()->Yeguada()->getVideosModel();
        return view('backend.content.video.index',compact('video','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.content.video.index');
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

        //https://www.youtube.com/watch?v=0lPQZni7I18&index=18&list=PLgRdph0qPLy53IhYrQLPpATDDA2TpFey5

        $user = \Auth::user();
        if($user->isAdm()){
            $stud_id = $request->stud_id;
        }else{
            $stud_id = \Auth::user()->Yeguada()->id;
        }
        if(empty($stud_id))return Functions::RetornaJson(['sms'=>'No se encontro el elemento']);

        $video = new Video(['tableid' => $stud_id, 'type' => 3]);
        $type = (!empty($request->type)) ? $request->type : null;
        $re = $request->video;

        $sal['status'] = 400;
        $sal['sms'] = 'Problemas de proceso';
        if ($type == 'horse') {
            $id = $request->horse_id;
            $horse = Horse::find($id);
            if (!empty($horse)) {
                //setVideos($url, $description = null, $id = null)
                $video = new Video(['tableid' => $horse->id, 'type' => 4]);

                $video->setVideoYoutube($re)->setName();
                if (empty($video->getName()) or $video->getName() == '') {
                    $video->setName($horse->name);
                }
                $vod = Video::NormalBuscarVidHorse($horse->id, $video->url)->first();
                $sal['el'] = null;
                $sal['sms'] = 'El video se encuentra duplicado';
                if (empty($vod)) {
                    $video->push();
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

                }
                //@include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb()])
                $sal['status'] = 200;

                return Functions::RetornaJson($sal);
            }

        }
        if (!empty($re) and $type != 'horse') {
            $video->setVideoYoutube($re)->setName();
            $vod = Video::NormalBuscarVid($stud_id, $video->url)->first();
            $sal['el'] = null;
            $sal['sms'] = 'El video se encuentra duplicado';
            if (empty($vod)) {
                $video->push();
                $sal['id'] = $video->id;
                $sal['youtube_id'] = $video->url;
                $sal['youtube_embed'] = $video->getEmbedVideoYoutube();
                $sal['youtube_img'] = $video->getYoutubeThumb();
                $sal['youtube_name'] = $video->getName();
                $sal['sms'] = trans('horse.processcomplet');
                $titulo = $video->getName();
                $id = $video->id;
                $imagen = $video->getYoutubeThumb();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();

            }
            //@include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb()])
            $sal['status'] = 200;

            return Functions::RetornaJson($sal);
        }
        return Functions::RetornaJson($sal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        return view('backend.content.video.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        return view('backend.content.video.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}

