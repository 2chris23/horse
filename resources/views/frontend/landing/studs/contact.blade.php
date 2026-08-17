@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@php
    $logo =$stud->getLogo();
    $phones= $stud->getPhone();
    $totaltel = count($phones);

        $logobasic= url("landing/images/basic/logo.png");

            $espanol =  url("landing/img/es.png");
            $english =  url("landing/img/en.png");

            /*slider*/
            $dummy = url("landing/images/dummy.png");
            /*slider 1*/
            $text1 = "LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO";
            $stext1 ="¡INSCRÍBETE CON NOSOTROS YA!";

            $text2 = '2 LA APLICACIÓN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
            $stext2 ='LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';

            $horseapp ='LA APLICACIÖN DE CABALLOS QUE TE HARA LAS COSAS MÄS FACIL PARA GESTIONAR TU NEGOCIO';
            $horseinscription ="¡INSCRÍBETE CON NOSOTROS YA!";

            $tittlehorsewordsale ='Horses Word Sale';
            $contenido ="Este contenido es de prueba";
            $contenido2 ="Caballos, ventas";
            $login = "Iniciar sesion";
            $imgother3 = url("landing/images/other/3.png");

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

    $text[0]= "{!! trans('users.fake.0') !!}";
    $text[1]= "{!! trans('users.fake.1') !!}";
    $text[2]= "{!! trans('users.fake.2') !!}";
    $text[3]= "{!! trans('users.fake.3') !!}";
    $text[4]= "";
    $text[5]= "";
    $text[6]= "";
    $text[7]= "";
    $text[8]= "";
    $text[9]= "";
    $stext[0]= "{!! trans('users.fake.0') !!}";
    $stext[1]= "{!! trans('users.fake.1') !!}";
    $stext[2]= "{!! trans('users.fake.2') !!}";
    $stext[3]= "{!! trans('users.fake.3') !!}";
    $stext[4]= "";
    $stext[5]= "";
    $stext[6]= "";
    $stext[7]= "";
    $stext[8]= "";
    $stext[9]= "";

@endphp
@section('fbheader')
    @include('meta',
      [
  'titulo' => $stud->getTituloWeb(),
  'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
  'logo'=>$logo,
  'imagenes' =>$stud->getPhotosModel(),
      ])

@endsection
@section('title', trans('Titulos.Contactoliente'))

@section('content')
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.contact'),'texto'=>trans('stud.subtext')])


    <!-- contact wrapper -->

    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-xs-12 col-md-7">
                            @include('frontend.landing.studs.partials.mapa',['lat'=>$stud->lat,'lng'=>$stud->lng])
                        </div>
                        <div class="col-xs-12 col-md-5 ">

                            <h4 class="m-b-10 m-t-15 text-center">
                                {!! trans('stud.contactdata') !!}
                            </h4>
                            <div class="col-xs-12">
                                <div class="col-xs-12 widget">
                                    <div class="col-xs-2">
                                        <i class="m-t-15 fa  inverso fa-phone inverso f-s-25 m-b-10"></i>
                                    </div>
                                    @foreach($stud->getPhoneModel() as $k=> $v)
                                        @if($v->isNull() !== true)
                                            <div class="col-xs-10 text-left m-t-10">
                                                <a href="tel:{!! $v->getFormatNumberOnly() !!}">
                                    <span class="text-left f-s-18">
                                        {!! $v->FormatNumber() !!}
                                        {{--+34 647 456 789--}}
                                        </span>
                                                </a>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>


                                <div class="col-xs-12  widget">
                                    <div class="col-xs-2">
                                        <i class="m-t-15 fa  inverso fa-envelope  f-s-18 m-b-10"></i>
                                    </div>
                                    <div class="col-xs-10 m-t-10 text-left">
                                    <span class="text-left f-s-18">
                                        {!! $stud->getEmail() !!}
                                        {{--
                                        @if(!empty($stud))
                                            @if(!empty($stud->getEmail()))
                                                {!! $stud->getEmail() !!}
                                            @else
                                                {!! $persona->getEmail() !!}
                                            @endif
                                        @else
                                            {!! $persona->getEmail() !!}
                                        @endif
                                        --}}
                                    </span>
                                    </div>
                                </div>
                                <div class="col-xs-12  widget">
                                    <div class="col-xs-2">
                                        <i class="fa inverso fa-map-marker m-t-15 f-s-25 m-b-10"></i>
                                    </div>
                                    <div class="col-xs-10 m-t-10 text-left">
                                        @if(!empty($stud->getAddress() ))
                                            <span class="text-left f-s-18">

                                        {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                                , {!! $stud->getStateModel()->name !!}
                                                , {!! $stud->getCountryModel()->name !!}
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-offset-2 col-xs-9    ">
                                @if(!empty($stud->getFacebook()->getUrlPage()))
                                    <div class="col-xs-2  widget ">
                                        <div class="col-xs-2">
                                            <a class="facebook" href="{!! $stud->getFacebook()->getUrlPage() !!}"
                                               target="_blank">
                                                <i class="m-t-15 fa facebook inverso fa-facebook "
                                                   style="font-size: 18px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($stud->getTwitter()->getUrlPage()))
                                    <div class="col-xs-2  widget">
                                        <div class="col-xs-2">
                                            <a class="twitter" href="{!! $stud->getTwitter()->getUrlPage() !!}"
                                               target="_blank">
                                                <i class="m-t-15 fa twitter inverso fa-twitter   "
                                                   style="font-size: 18px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                {{--
                                @if(!empty($stud->getGoogle()->getUrlPage()))
                                <div class="col-xs-2  widget">
                                    <div class="col-xs-2">
                                        <a href="{!! $stud->getGoogle()->getUrlPage() !!}" target="_blank">
                                            <i class="m-t-15 fa  inverso fa-google-plus-official    "
                                               style="font-size: 18px"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                --}}
                                @if(!empty($stud->getInstagram()->getUrlPage()))
                                    <div class="col-xs-2  widget">
                                        <div class="col-xs-2">
                                            <a class="instagram" href="{!! $stud->getInstagram()->getUrlPage() !!}"
                                               target="_blank">
                                                <i class="m-t-15 fa instagram fa-instagram    "
                                                   style="font-size: 18px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($stud->getPinterest()->getUrlPage()))
                                    <div class="col-xs-2  widget">
                                        <div class="col-xs-2">
                                            <a class="pinterest" href="{!! $stud->getPinterest()->getUrlPage() !!}"
                                               target="_blank">
                                                <i class="m-t-15 fa pinterest inverso fa-pinterest     "
                                                   style="font-size: 18px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($stud->getYoutube()->getUrlPage()))
                                    <div class="col-xs-2  widget">
                                        <div class="col-xs-2">
                                            <a class="youtube" href="{!! $stud->getYoutube()->getUrlPage() !!}"
                                               target="_blank">
                                                <i class="m-t-15 fa youtube  fa-youtube     "
                                                   style="font-size: 18px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-xs-12 text-center text-small">
                                    {!! trans('tema1.whorwithus',['link'=>route('TrabajoIndex',['slug'=>$stud->slug])]) !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="comment-form-wrapper contact-from clearfix m-t-60">
                        <div class="widget-title ">
                            <h4 class="font-dst1">
                                {!! trans('stud.contactus') !!}
                            </h4>
                            <p>
                                {!! trans('stud.contactustext') !!}
                            </p>
                            <div class=" col-xs-offset-3col-xs-6 m-t-25">
                                @include('flash::message')
                            </div>
                        </div>
                        <div class="contact-message col-12 m-t-25">
                            <form id="contact-form" action="{!! route('contacto.accion') !!}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" value="{!! csrf_token() !!}" id="_token" name="_token">
                                <input type="hidden" value="{!! $stud->id !!}" id="stud" name="stud">
                                <div class="col-xs-12 col-md-4">
                                    <div class="single-input field  form_control">
                                        <label for="name">
                                            {!! trans('stud.namecontact') !!}
                                        </label>
                                        <input name="name" class="form_control form_control" type="text"
                                               placeholder="{!! trans('stud.namecontactplace') !!}">
                                    </div>
                                    <div class="single-input field  form_control">
                                        <label for="email">
                                            {!! trans('stud.emailcontact') !!}
                                        </label>
                                        <input name="email" class="form_control" type="text"
                                               placeholder="{!! trans('stud.emailcontactplace') !!}">
                                    </div>
                                    <div class="single-input field  form_control">
                                        <label for="name">
                                            {!! trans('stud.phonecontact') !!}
                                        </label>
                                        <input name="phone" class="form_control" type="tel"
                                               placeholder="{!! trans('stud.phonecontactplace') !!}">
                                    </div>

                                </div>
                                <div class="col-xs-12 col-md-8">

                                    <div class="single-input field col-xs-12 form_control">
                                        <label for="name">
                                            {!! trans('stud.smscontact') !!}
                                        </label>
                                        <textarea name="message" class="form_control"
                                                  placeholder="{!! trans('stud.smscontactplace') !!}"></textarea>
                                    </div>
                                    <div class="send-button field col-xs-12 form_control">
                                        <button type="submit" class="btn btn-big btn-solid">
                                                <span>
                                                    {!! trans('stud.send') !!}
                                                </span>
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>


                    {{--
                    <div class="send-button field col-xs-12 form_control">
                        <button class="btn-block btn-contact contactEmail" data-toggle="modal"
                                data-target="#workwi">
                            TRABAJA
                        </button>


                    </div>
                    --}}


                </div>
            </div>
        </div>
    </div>

    {{--
    <div class="contact-map-area">
        <div class="map-area">
            <div id="map"></div>
        </div>
    </div>
    --}}

    {{--@include('frontend.trabajos.modal')--}}
@endsection

@section('js')
    {{--<script>
        $( "#slider-skill-first" ).slider({
            range: "max",
            min: 0,
            max: 100,
            value: 50,
            slide: function( event, ui ) {
                $( "#amount-first" ).val( ui.value + "%" );
            }
        });

        $( "#amount-first" ).val( $( "#slider-skill-first" ).slider( "value" ) + "%" );

    </script>--}}

@endsection
