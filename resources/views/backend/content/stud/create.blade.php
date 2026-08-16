@extends('backend.layouts.base',['user'=>\Auth::user()])
@section('title', trans('Titulos.StudStud') )
{{--@section('pagetitle', '<i class="fa fa-user"></i>'.trans('stud.new') )--}}
@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>
    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}
    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--tags https://github.com/sniperwolf/taggingJS/blob/master/README.md#available-options --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <style>
        .intl-tel-input {
            width: 100%;
        }
    </style>
@endsection
@section('topjs')
    @php
        $telefonos = count($stud->getPhone());
        $oculto = "";
    @endphp
    {{--<script type="text/javascript" src="{!!url('assets/js/dropzone.min.js')!!}"></script>--}}
    <script>
        var pai = {!! $stud->getCountry() !!};
        var edo = {!! $stud->getState() !!};
        var url = "{!! route('stud.store') !!}";
        //Dropzone.options.myAwesomeDropzone = false;
    </script>
@endsection
@section('content')
    @php
        $lat = (!empty($stud->lat))?$stud->lat:'-33.8688';
        $lng = (!empty($stud->lng ))?$stud->lng:'151.2195';
    @endphp
    <div id="datos1" class="card col-12 {!! $oculto !!}">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.text.create_title') !!}
            </div>
            <form class="row" id="yeguadas" enctype="multipart/form-data">
                <div class="col-12 m-t-25">
                    <div class="row">
                        <div class="col-md-12 text-xs-center m-t-35">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('stud.logo') !!}:
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    @include('backend.common.dropify',['name'=>$stud->slug,'nombre'=>"stud",'tipo'=>'logo','link'=>$stud->getLogo(),'id'=>'mystud'])
                                </div>
                            </div>
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('stud.name')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input id="input_stud_name" type="text"
                                               placeholder="{{trans('stud.placeholder.name')}}"
                                               value="{{$stud->getName()}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('users.text.email')}}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                               id="email"
                                               name="email"
                                               value="{{$stud->email}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            @if($telefonos!=0)
                                @foreach($stud->getPhoneModel() as $k=>$v)
                                    @if(!empty($v->getPhone()))
                                        @if($v->getPhone()!=0)
                                            @include('backend.common.phone',[
                                            'numero' => $v->getPhone(),
                                            'nombre' => 'input_stud_phone[]',
                                            'texto' => trans('stud.text.phone'),
                                            'place' => trans('stud.placeholder.phone'),
                                            'pais' => $v->getCountryCode(),
                                            'id'=>$v->id,
                                            'exte'=>$v->getExt(),
                                            ])
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                            @php
                                $phone =$stud->getNewPhone();
                            @endphp
                            @for($i=count($stud->getPhoneModel());$i<2;$i++)
                                @include('backend.common.phone',[
                                'nombre' => 'input_stud_phone[]',
                                'texto' => trans('stud.text.phone'),
                                'place' => trans('stud.placeholder.phone'),
                                ])
                            @endfor
                            {{--addphone--}}
                            @include('backend.common.country',['seleccionado'=>$stud->country])
                            @include('backend.common.state')
                            @include('backend.common.city',['city'=> $stud->getCity() ])
                            {{--
                            <div class="col-md-12 text-xs-center">
                            <div class="form-group row">
                            <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {{trans('stud.text.city')}}:
                            </label>
                            <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="text" placeholder="{{trans('stud.placeholder.city')}}"
                            id="city"
                            name="city"
                            value="{!! $stud->getCity() !!}"
                            class="form-control">
                            </div>
                            </div>
                            </div>
                            --}}
                            {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                            <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {{trans('stud.text.city')}}:
                            </label>
                            <div class="col-xs-10 col-sm-10 col-md-6">
                            <select class=" form-control" data-style="btn-primary" id="city"
                            disabled=true
                            placeholder="{{trans('stud.placeholder.city')}}">
                            <option data-tokens="0"
                            value="0">{!! trans('city.chooseme') !!}</option>
                            </select>
                            </div>
                            </div>
                            </div>
                            --}}
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {!! trans('stud.address') !!}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('stud.placeholder.address')}}"
                                               id="input_stud_address"
                                               value="{!! $stud->getAddress() !!}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {!! trans('stud.mappos') !!}:
                                        <br>
                                        <span class="small-text">
                                            {!! trans('stud.mapposhelp') !!}
                                        </span>
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        @include('backend.common.mapa',['lat'=>$stud->lat,'lng'=>$stud->lng])
                                        {{--<img class="img-fluid" src="https://i.stack.imgur.com/dApg7.png" alt="">--}}

                                        <div class="input-group col-10 input-map-float "
                                             rel="tooltip" data-html="true"
                                             data-toggle="popover"
                                             data-placement="auto"
                                             data-trigger="hover"
                                             title="Ubicacion "
                                             data-title=" Ubicacion"
                                             data-content=" Presiona la marca azul para utilizar la direccion de los mapas de google "

                                        >
                                            <span class="input-group-addon" id="basic-addon3" onclick="tomarmapa()">
                                                <i class="fa fa-map-marker"> </i>
                                            </span>
                                            <input type="text" id="decopl" class="form-control"
                                                   aria-describedby="basic-addon3">
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="offset-3 col-6 m-t-25 text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <a href="#savebot" onclick="confirmarstud(url)" id="savebot"
                                           class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="datos2" class="card col-12 m-t-35 {!! $oculto !!}">
        {{--Mapa--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studtextpresentation') !!}
            </div>
            <div class="row m-t-35">
                <div class="col-md-12 text-xs-center">
                    <form class="form-group row" id="descripcions" enctype="multipart/form-data">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {{trans('stud.text.description')}}:
                        </label>
                        <div class="col-9" id="stud_description">
                            <textarea name="input_stud_description"
                                      id="input_stud_description">{{$stud->getDescription()}}</textarea>
                        </div>
                    </form>
                </div>
                {{--
                <texto
                :id="'input_stud_description'"
                :label="'{{trans('stud.text.description')}} :'"
                :contenido="'{{$stud->getDescription()}}'"
                :classe="'col-5'"
                ></texto>
                --}}
                {{--<script type=”text/javascript”> </script>--}}
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#saved" onclick="savedescription('{!! route('stud.store') !!}')" id="saved"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                        {{--
                        <div class="col-6 ">
                        <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="datos4" class="card col-12 m-t-35 {!! $oculto !!}">
        {{--video--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studpresentation') !!}
            </div>
            <div class="row">
                {{--}}
                <div class="offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-sm-6 m-t-35 embed-responsive embed-responsive-16by9 m-t-35">
                <iframe width="640" height="480" src="https://www.youtube.com/embed/ybiPmjJkvro" frameborder="0"
                allowfullscreen></iframe>
                </div>
                --}}
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-5 embed-responsive embed-responsive-16by9">
                            <div class="form-group row">
                                @if(!empty(\Auth::user()->getVideo()->getEmbedVideoYoutube()))
                                    <iframe width="{!! 640/2 !!}" height="{!! 480/2 !!}"
                                            src="{!!\Auth::user()->getVideo()->getEmbedVideoYoutube() !!}"
                                            frameborder="0"
                                            allowfullscreen></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {!! trans('video.addressvideo') !!}:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                   id="input_stud_video"
                                   value="{!! \Auth::user()->getVideo()->getUrl() !!}"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#savedv" onclick="savevideo('{!! route('stud.store') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                        {{--
                        <div class="col-6 ">
                        <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                        </div>
                        --}}
                    </div>
                </div>
                <form action="{!! route('stud.store') !!}" method="post" id="form_stud">
                    <input type="hidden" value="{{$stud->id}}" id="stud_id" class="form-control">
                </form>
            </div>
        </div>
    </div>
    <div id="datos3" class="card col-12 m-t-35 {!! $oculto !!}">
        {{--Galeria--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studphoto') !!}
            </div>
            <form class="m-t-35 row no-gutters" id="galerias" enctype="multipart/form-data">
                <div class="col-12 m-t-35">
                    @include('backend.common.dropzone',['nombre'=>"imagenes",'tipo'=>'stud','MaxFile'=>200,'oculto'=>true])
                </div>
                <div class="m-t-35 row col-12 " id="photos" data-toggle="popover" data-trigger="hover"
                     data-placement="top" title="{!! trans('popover.ordenarfoto.titulo') !!}"
                     data-content="{!! trans('popover.ordenarfoto.contenido') !!}">
                    {{-- PASAR COMO DROPIFy --}}
                    @foreach($stud->getInstalationsGallery() as $k=>$v)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20 ">
                            @include('backend.common.galleryimage',['titulo'=>$v['name'],'id'=>$v['id'],'imagen'=>$v['url']])
                        </div>
                    @endforeach
                </div>
            {{--
            <div class="offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-sm-6 m-t-35 row " id="photos">
            <div class="row">
            @include('backend.common.fileupload',['stud'=>$stud,'type'=>'stud'])
            --}}
            {{--
            @php($ima = $stud->getInstalationsGallery())
            @foreach($ima as $k=>$v)
            <div class="col-6 m-t-25 sortable-item gallery-elem">
            @include('backend.common.dropify',['name'=>$v['name'],'nombre'=>"stud",'tipo'=>'stud','link'=>$v['url'],'id'=>$v['id']])
            </div>
            @endforeach
            @for ($i = 0; $i < 5; $i++)
            <div class="col-6 m-t-25">
            @include('backend.common.dropify',['nombre'=>"stud",'tipo'=>'stud'])
            </div>
            @endfor</div>
            </div>
            --}}
            <!--
 <div class="offset-3 col-6 m-t-25 text-center">
 <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
 {{--
 <a href="#" class="btn btn-block btn-warning btninfo " onclick="getItems('#photos')">
 Establecer el orden
 </a>--}}
                    <a href="#" class="btn btn-block btn-warning btninfo "
                    onclick="savegallery('{!! route('imgs_instalations') !!}')">
 {!! trans('users.save') !!}
                    </a>
                    </div>
                    </div>
                    </div>
-->
                {{--
                <div class="offset-3 col-6 m-t-25 text-center">
                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                <a href="#saved" onclick="savestud('{!! route('stud.store') !!}')" id="saved"
                class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                </div>
                </div>
                </div>
                --}}
            </form>
        </div>
    </div>
    <div id="datos5" class="card col-12 m-t-35 {!! $oculto !!}">
        {{--video--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.socialmedia') !!}
            </div>
            <form id="sociales" class="row">
                <div class="col-md-12 text-xs-center m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Facebook:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_facebook"
                                    name="facebook"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.facebook')}}"
                                    value="{{$stud->getFacebook()->getUrl()}}" class="form-control facebook">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Youtube:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_youtube"
                                    name="youtube"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.youtube')}}"
                                    value="{{$stud->getYoutube()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Twitter:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_twitter"
                                    name="twitter"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.twitter')}}"
                                    value="{{$stud->getTwitter()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Instagram:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_instagram"
                                    name="instagram"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.instagram')}}"
                                    value="{{$stud->getInstagram()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    {{--
                    <div class="form-group row">
                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                    google+
                    </label>
                    <div class="col-xs-10 col-sm-10 col-md-6">
                    <input id="input_stud_google" type="text"
                    placeholder="{{trans('stud.placeholder.google')}}"
                    value="{{$stud->getGoogle()->getUrl()}}" class="form-control">
                    </div>
                    </div>
                    --}}
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Pinterest:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_pinterest"
                                    name="pinterest"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.pinterest')}}"
                                    value="{{$stud->getPinterest()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    {{--}}
                    <div class="form-group row">
                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                    {!! trans('stud.fbuser') !!}:
                    </label>
                    <div class="col-xs-10 col-sm-10 col-md-6">
                    <input
                    id="fbuser"
                    name="fbuser"
                    type="text"
                    placeholder="{{trans('stud.placeholder.fbuser')}}"
                    value="{{$stud->getFbcontact()}}" class="form-control">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                    {!! trans('stud.wsuser') !!}:
                    </label>
                    <div class="col-xs-10 col-sm-10 col-md-6">
                    <input
                    id="wsuser"
                    name="wsuser"
                    type="text"
                    placeholder="{{trans('stud.placeholder.wsuser')}}"
                    value="{{$stud->getWscontact()}}" class="form-control numbers">
                    </div>
                    </div>
                    --}}
                </div>
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#datos5" onclick="savesocial('{!! route('social.save') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>
                </div>
                <form action="{!! route('stud.store') !!}" method="post" id="form_stud">
                    <input type="hidden" value="{{$stud->id}}" id="stud_id" class="form-control">
                </form>
            </form>
        </div>
    </div>
@endsection
@section('bottomjs')
    <!--Plugin scripts-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWBy20udR6mPH_V4Qm9_7Fn5BoyyVyzyA&libraries=places"
    ></script>
    <script type="text/javascript"
            src="{!! url('js/locacion/locationpicker.jquery.min.js') !!}">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    {{--
    <script type="text/javascript" src="{!!url('assets/js/pages/mini_calendar.js')!!}">
    </script>
    --}}
    <!--End of Page level scripts-->
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    {{--<script type="text/javascript" src="{!!url('assets/js/pages/modals.js')!!}"></script>--}}
    {{--<script type="text/javascript" src="{!!url('assets/js/pages/form_editors.js')!!}"></script>--}}
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>

        function savegallery(url) {
            var form = new FormData(document.getElementById("galerias"));
            axios.post(url, form)
                .then(function (response) {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                        'success'
                    )
                })
                .catch(function (error) {
                    var err = eval(xhr.responseText.sms);
                    var v = $.parseJSON(xhr.responseText);
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }

        function envio(form, url) {
            var confirm = $('#input_user_password_confirm');
            form = AddFormDisable(confirm, form, 'confirm');
            axios.post(url, form)
                .then(function (response) {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                        'success'
                    );
                    window.location.href = '{!! route('stud.create') !!}';
                })
                .catch(function (error) {
                    console.dir(error);
                            {{-- BORRAR var error = eval(xhr.responseText.sms);--}}
                    var v = $.parseJSON(error.responseText);
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }

        function confirmarstud(url) {
            clearnumber('');
            var form = new FormData(document.getElementById('yeguadas'));
            var name = $('#input_stud_name').val();
            var address = $('#input_stud_address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var country = $('#country').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            form.append('name', name);
            form.append('city', city);
            form.append('state', state);
            form.append('country', country);
            form.append('address', address);
            form.append('lat', lat);
            form.append('lng', lng);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.changesconfirm')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                /*
                swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask') )!!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }

        function savedescription(url) {
            var form = new FormData(document.getElementById('descripcions'));
                    {{-- BORRAR var description = $('#input_stud_description');--}}
            var description = CKEDITOR.instances['input_stud_description'].getData();
            form.append('description', description);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('stud.comfirmchangedescription')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                /*
                swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }

        function validate_url(url) {
            if (/^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)youtube.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)twitter\.com\/(#!\/)?[a-z0-9_]+$/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)pinterest.com\/.*/i.test(url)) return true;
            return false;
        }

        function savesocial(url) {
            var form = new FormData(document.getElementById('sociales'));
            var facebook = $('#input_stud_facebook').val();
            var youtube = $('#input_stud_youtube').val();
            var twitter = $('#input_stud_twitter').val();
            var instagram = $('#input_stud_instagram').val();
            var wsuser = $('#wsuser').val();
            var fbuser = $('#fbuser').val();
                    {{-- BORRAR var google = $('#input_stud_google').val();--}}
            var pinterest = $('#input_stud_pinterest').val();
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('stud.advsocial')) !!}',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }


        function savevideo(url) {
            var form = new FormData();
                    {{-- BORRAR var description = $('#input_stud_description');--}}
            var description = $('#input_stud_video').val();
            form.append('video', description);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',

                html: '{!! Funciones::ReemplazarApostrofe(trans('stud.advvideoprese')) !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                /*
                swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });
        }

        function savestud(url) {
            DisableElement($('.save'));
            DisableElement($('.cancel'));
            var clear = true;
            var form = new FormData();
            var name = $('#input_stud_name');
                    @if($telefonos!=0)
                    @foreach($stud->getPhone() as $k=>$v)
            var phone{{$k}} = $('#input_stud_phone_{{$k}}');
            var phone_cc{{$k}} = $(phone{{$k}}).parent().find('.country-list').find('.active').attr('data-country-code');
            var phone_ext{{$k}} = $(phone{{$k}}).parent().find('.country-list').find('.active').attr('data-dial-code');
                    @endforeach
                    @else
            var phone1 = $('#input_stud_phone_1');
            var phone_cc1 = $('#input_stud_phone_1').parent().find('.country-list').find('.active').attr('data-country-code');
            var phone_ext1 = $('#input_stud_phone_1').parent().find('.country-list').find('.active').attr('data-dial-code');
                    @endif
            var description = $('#input_stud_description');
            var city = $('#city');
            var state = $('#state');
            var country = $('#country');
            var address = $('#input_stud_address');
            var video = $('#input_stud_video');
            var id = $('#stud_id');
            form = AddFormDisable(name, form, 'name');
            @if($telefonos!=0)
            @foreach($stud->getPhone() as $k=>$v)
            /*
            *
            var phone = $('#input_user_personal_phone_1');
            var codt = $(phone).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp= $(phone).parent().find('.country-list').find('.active').attr('data-country-code');
            */
            form = AddFormDisable(phone{{$k}}, form, 'phone{{$k}}');
            form = AddFormDisable(phone_ext{{$k}}, form, 'phone_ext_{{$k}}');
            form = AddFormDisable(phone_cc{{$k}}, form, 'phone_cc_{{$k}}');
            @endforeach
                    @else
                form = AddFormDisable(phone1, form, 'phone1');
            form = AddFormDisable(phone_ext1, form, 'phone_ext_1');
            form = AddFormDisable(phone_cc1, form, 'phone_cc_1');
            @endif
                form = AddFormDisable(description, form, 'description');
            form = AddFormDisable(city, form, 'city');
            form = AddFormDisable(state, form, 'state');
            form = AddFormDisable(country, form, 'country');
            form = AddFormDisable(address, form, 'address');
            form = AddFormDisable(video, form, 'video');
            $.ajax({
                url: url,
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    clear = false;
                    @if($telefonos!=0)
                    @foreach($stud->getPhone() as $k=>$v)
                    EnableElement(phone{{$k}}, clear);
                    @endforeach
                    @else
                    EnableElement(phone1, clear);
                    @endif
                    EnableElement(name, clear);
                    EnableElement(description, clear);
                    EnableElement(city, clear);
                    EnableElement(state, clear);
                    EnableElement(country, clear);
                    EnableElement(address, clear);
                    EnableElement(video, clear);
                    EnableElement($('.save'));
                    EnableElement($('.cancel'));
                    console.log(data);
                },
                error: function (data) {
                    clear = false;
                    EnableElement(name, clear);
                    @if($telefonos!=0)
                    @foreach($stud->getPhone() as $k=>$v)
                    EnableElement(phone{{$k}}, clear);
                    @endforeach
                    @else
                    EnableElement(phone1, clear);
                    @endif
                    EnableElement(description, clear);
                    EnableElement(city, clear);
                    EnableElement(state, clear);
                    EnableElement(country, clear);
                    EnableElement(address, clear);
                    EnableElement(video, clear);
                    EnableElement($('.save'), clear);
                    EnableElement($('.cancel'), clear);
                    console.log(data);
                }
            });
        }

        function tomarmapa() {

            $('#input_stud_address').val($('#decopl').val());
        }

        $(".telefonos").intlTelInput({
            preferredCountries: ['es', 'mx', 'nl', 'de', 'us'],
            separateDialCode: true,
            utilsScript: "{!! url('phone/js/utils.js') !!}"
        });
        {{--

--}}

        $(window).on('load', function () {
            $(".numbers").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
            CKEDITOR.replace("input_stud_description");
            CKEDITOR.on('instanceReady', function (evt) {
                CKEDITOR.instances['input_stud_description'].setData('{!! $stud->getDescription() !!}');
            });
            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection();
            $(".cambiarlogo").on('click', function () {
                $('.perfil_logo').removeClass('hidden-xl-down');
                $('.preview_logo').addClass('hidden-xl-down');
            });
            $('#wsuser').mask("+00-000-00-00-00-00-00");
            $('#map').locationpicker({
                location: {
                    latitude: {!! $lat !!},
                    longitude: {!! $lng !!},
                },
                radius: 1,
                zoom: 12,
                mapTypeId: 'hybrid',
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lng'),
                    radiusInput: $('#rad'),
                    {{--locationNameInput: $('#input_stud_address')--}}
                    locationNameInput: $('#decopl')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    $('#lat').val(currentLocation.latitude);
                    $('#lng').val(currentLocation.longitude);
                    {{--
                    alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                    --}}
                }
            });
        });


    </script>
@endsection
