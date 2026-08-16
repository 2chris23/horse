@php
    /*('user','stud','gallery')*/
    /*
        $d[0]= url("landing/images/slider/1/2.jpg");
    $d[1]= url("landing/images/slider/1/1.jpg");
    $d[2]= url('frontend/img/slides/s3.jpg');
    $d[3]= url('frontend/img/gallery/img-2.jpg');
    $d[4]= url('frontend/img/gallery/img-3.jpg');
    $d[5]= url('frontend/img/gallery/img-4.jpg');
    $d[6]= url('frontend/img/gallery/img-5.jpg');
    $d[7]= url('frontend/img/slides/s1.jpg');
    $d[8]= url('frontend/img/slides/s2.jpg');
    $d[9]= url('frontend/img/slides/s3.jpg');
*/
if(\Auth::user()->isAdm() != true){
    $yegu = \Auth::user()->Yeguada();
    $marca = $yegu->Marca();
    $mostrarmarca = 0;
    $agua = 0;
    if(!empty($marca)){
    $mostrarmarca = 1;
    $agua = $yegu->MarcaAgua()->first()->status;
    }
    }

@endphp
@extends('backend.layouts.base')
{{--@section('title', trans('sell.Tittle') )--}}
@section('title', trans('Titulos.FotosStud') )
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  Albun de fotos' )--}}
@section('topcss')


    <!--Plugin styles -->
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-buttons.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-thumbs.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>


    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/imagehover/css/imagehover.min.css')}}"/>
    <!--End of plugin-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/gallery.css')}}"/>
    {{--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    --}}
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/explorer-fa/theme.min.css"
          media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/explorer/theme.min.css"
          media="all" rel="stylesheet" type="text/css"/>

@endsection
@section('topjs')
    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>--}}

@endsection
@section('content')


    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-header bg-white">
                {!! trans('photo.userphoto') !!}
                @if(count($gallery) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($gallery )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="card-block">

                <div class="m-t-35 row " style="    margin-top: 50px;">
                    {{--@include('backend.common.dropzone', [ 'nombre'=>"gallery_drop", 'tipo'=>'gallery', 'MaxFile'=>20, 'oculto'=>true])--}}
                    {{----------------------------------------------------------------------------------------------------------------}}
                    {{----------------------------------------------------------------------------------------------------------------}}
                    {{----------------------------------------------------------------------------------------------------------------}}
                    {{----------------------------------------------------------------------------------------------------------------}}
                    {{----------------------------------------------------------------------------------------------------------------}}



                    @php

                        $oculto=true;



                                           /*hidden-xl-down OCULTA EN BS4*/
                    @endphp
                    {{--
                    //requiere en la cabecera <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
                    //requiere en la cabecera <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
                    Dropzone.options.myAwesomeDropzone = false;
                    --}}
                    <div id="dro_gallery_drop" class="col-12 ">

                        <div class="offset-1 col-10">
                            <div id="gallery_drop" class="dropzone dropzone-previews dz-clickable  ">
                                <div class="dz-default dz-message">
                                    <span><i class="fa fa-cloud-upload fa-6" aria-hidden="true"
                                             style="    font-size: 60px;"></i></span>

                                    <span>
                <br>

                                        {!! trans('text.drop_file') !!}
            </span>
                                </div>
                            </div>
                            @if($mostrarmarca !=0)
                                <div class="col-12 text-center m-t-10">
                                    <div class="row">
                                        <div class="col-9">

                                        </div>
                                        <div class="col-3 predeterminadrmarca m-t-20"
                                             data-check="{!! $agua !!}" @include('backend.common.marcahelp')>

                                        <span class="nopredeterminado text-red  @if($agua!=0) hidden-xs-up @endif">
                                            <i class="fa fa-times"></i>
                                        </span>
                                            <span class="predeterminado text-success @if($agua!=1) hidden-xs-up @endif">
                                            <i class="fa fa-check"></i>
                                        </span>
                                            @if($agua == 1)
                                                <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                                            @else
                                                <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                                            @endif
                                            <input type="hidden" name="marcapredetermianda" id="marcapredetermianda"
                                                   value="{!! $agua !!}">
                                        </div>
                                    </div>

                                </div>
                            @endif
                        </div>

                        <div class="col-4 m-t-10" @if($oculto != false)style="display:none"@endif>
                            <input required="required" type="submit" value="{!! trans('text.save') !!}"
                                   class="btn btn-warning pull-left hidden form-control drp_action_gallery_drop btn-drp-gallery_drop ">

                        </div>
                    </div>

                    {{--{!!Form::submit(trans('text.submit'), ['required' => 'required', 'class' => 'btn btn-warning pull-right hidden btn-drp-gallery_drop mtop-10', 'id'=> 'send1'])!!}--}}




                </div>
                <div class="m-t-35 row " id="photos">

                    @foreach($gallery as $k=>$v)
                        <div class="col-3 m-t-20 ">
                            @include('backend.common.galleryimage',['titulo'=>$v['name'],'id'=>$v['id'],'imagen'=>$v['url']])
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>


@endsection


@section('bottomjs')

    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    <!--Plugin scripts-->
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>
    <script type="text/javascript" src="{{route('foto.js')}}"></script>

@endsection
@section('antesjs')
    <script type="text/javascript" src="{{route('dropfoto.js')}}"></script>
@endsection