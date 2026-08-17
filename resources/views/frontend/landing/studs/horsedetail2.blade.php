@extends('frontend.landing.studs.base',['user'=>$user,'stud'=>$stud])
@section('title', trans('Titulos.DetalleCliente',['name',$stud->getName()]))
@php
    /* AQUI */
        $next = (isset($next))?$next:null;
        $prev = (isset($prev))?$prev:null;
            $logo =$stud->getLogo();
                $logobasic= url("landing/images/basic/logo.png");
        $fotos = $horse->getPhotoModel();
        $nombre = $horse-> getName();
        $doma = $horse-> getDoma();
        $raza = $horse-> getRaza();
        $precio = Funciones::AjustarNumeroMil($horse-> getPrice());
        $bday = $horse-> getBirthdate();
        $raised = $horse-> getRaised();
        $ParaVender= $horse->getTosold();
        $cubri= Funciones::AjustarNumeroMil($horse-> getCubri()). " €";
        $vendido= $horse->getSold();
        $yeguada= $horse->getStud();
        $sex= $horse->getSex();
        $color = $horse->getColorString();
        //$fotos = Photo::find(39);
        if($vendido == false)$vendido = 0;
        $doma = ($doma == 'true' or $doma==true)?1: 0;
        $linklo =route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$horse->id]);
@endphp
@section('cssup')
    <link rel="stylesheet" href="{!! url('frontend/alt.css') !!}">
    <style>
        .novo, .novo > img {
            /*height: 340px !important;*/
            height: auto !important;
            margin: 0 auto !important;
        }

        {{--}}
        .table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
            background-color:  #01889a;
            color: #eeeeee;
        }
        --}}
        {{--
      .table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
          background-color:  {!! $stud->getColor() !!};
          color: #eeeeee;
      }
      --}}
      .owl-item {
            width: 200px;
        }

        .img-owl {
            /*height: 160px !important;*/
            /*
            max-height: 160px !important;
            margin: 0 auto !important;
            width: auto!important;
            */
            margin: 0 auto;
            /*max-width: 100px!important;*/
        }

        .single-images-gl {
            /*max-width: 100px;*/
            margin: 0px auto;
        }

        .owl-prev, .owl-next {
            margin-top: -15px !important;
        }

        /*
          .grid-item {
              background-color: #4DC7A0;
              color: white;
              font-size: 30px;
              height: 150px;
              padding: 10px;
          }
          */
    </style>
@endsection
@section('csstop')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <style>
        article + [data-readmore-toggle], article[data-readmor-e] {
            display: block;
            width: 100%;
        }

        article[data-readmore] {
            transition: height 500ms;
            overflow: hidden;
        }

        .table {
            border-color: grey;
        }

        tbody {
            border-color: inherit;
        }

        td {
            border: 1px solid #aab;
        }

        .ta1 {
            background-color: rgba(170, 170, 170, 0.1);
            /*
            background-color: #f1f1f1;
            color: #c4af5a;
            */
        }

        .ta2 {
            /*
            background-color:black;
            color: #aab;
            */
        }

        .btn-fake {
            padding: 8px 35px;
            background: transparent;
            border: 2px solid #535961;
            color: #535961;
        }

        .btn-fake:hover {
            padding: 8px 35px;
            background: #535961;
            border: 2px solid #535961;
            color: #fff;
        }

        .noborder {
            border-top: 0px;
            border-right: 0px;
            border-left: 0px;
            border-bottom: 0px;
        }

        .derechasup {
            border-top: 0px;
            border-right: 0px;
        }

        .izsup {
            border-top: 0px;
            border-left: 0px;
        }

        .derechadown {
            border-bottom: 0px;
            border-right: 0px;
        }

        .izdown {
            border-bottom: 0px;
            border-left: 0px;
        }

        .izqu {
            border-left: 0px;
        }

        .dere {
            border-right: 0px;
        }

        .post-prev,
        .post-prev:focus,
        .post-prev:active {

            left: 14px;
        }

        .post-next {

            right: 14px;
        }
    </style>
    {{--
        <script src="{!! url('html5gallery/html5lightbox.js') !!}"></script>
    --}}
@endsection
@section('content')
    <!-- basic-slider start -->
    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>trans('stud.horses'),'texto'=>trans('stud.ouranimal')])
    {{--}}
                    <div class="row">
                        <div class="col-md-5">
                            <h3 class="line-bottom-no-border">Characteristics</h3>
                            <ul class="list theme-colored">
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            </ul>
                        </div>
                        <div class="col-md-7">
                            <h3 class="line-bottom-no-border">More Information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto odit quod debitis repudiandae
                                consectetur pariatur vitae sapiente ducimus at doloribus aliquid, ab distinctio eveniet
                                consequuntur, voluptates voluptas minus dolorum accusamus qui. , itaque, nihil.
                                Minus, repellendus.</p>
                        </div>
                    </div>
                    colocar los elementos a los lados del post
                    --}}
    <style>
        @php($flotante = false)
        .work-navigation {
            width: 100%;
            z-index: 99;
            height: 1px;
            @if($flotante != false)
                                position: fixed;
        @endif





        }

        {{--
        .nav {
            display: block;
        }
        --}}
        .navigation.post-navigation {
            @if($flotante != false)
                               position: fixed;
        @endif






        }

        .post-next.pull-right {
            right: 0;
            @if($flotante != false)
                               position: fixed;
        @endif






        }

        .work-all,
        .post-prev.pull-left,
        .post-next.pull-right {
            display: block;
            font-size: 14px;
            display: inline !important;
            width: 100px;
            /*top: 25%;*/
            z-index: 10;
            font-size: 35px;
            @if(!empty($stud->getColor()))
                                color: {!! $stud->getColor() !!};
            @else
                                color: #01889a !important;
        @endif
                    /*background: #f6f6f6;*/
            background: transparent;
            position: absolute;
            /*top: 210px;*/
        }

        .colorc {
            border: 1px @if(!empty($stud->getColor())) {!! $stud->getColor() !!} solid;
            @else                #01889a solid;
        @endif





        }

        .work-all:hover,
        .post-prev.pull-left:hover,
        .post-next.pull-right:hover {
            color: #a5a5a5 !important;

        }

        .post-prev.pull-left:active,
        .post-next.pull-right:active {
            transform: scale(1.2);
        }

        .work-all, .work-all:hover {
            margin: auto;
            margin-left: 50%;
        }

        .post-prev.pull-left > span,
        .post-next.pull-right > span,
        .post-prev.pull-left > i,
        .post-next.pull-right > i {
            font-size: 14px;

        }

        .volver {
            margin-right: 25%;
            font-size: 14px;
            float: right;
            @if(!empty($stud->getColor()))
                                color: {!! $stud->getColor() !!};
            @else
                                color: #01889a !important;
        @endif





        }

        .volver:hover {
            color: #a5a5a5 !important;
            transform: scale(1.2);
            margin-right: 25%;
            font-size: 14px;
            float: right;
        }

        .videop > i {
            position: fixed;
            z-index: 99;
            top: 25px;
            /*border: 1px solid wheat;*/
            margin-left: 45px;
            font-size: 30px;
            @if(!empty($stud->getColor()))
                                color: {!! $stud->getColor() !!};
            @else
                                color: #01889a !important;
            @endif
               text-shadow: 0px 0px 17px rgba(0, 0, 0, 1);
        }

        .pull-left.pull-right {
            position: inherit;
            padding-top: 30px;
            padding-bottom: 30px;
            margin-left: -20px;
        }

        .st-191 {
            top: 191px;
        }

        .namehor {
            margin-top: 25px !important;
        }

        @media (min-width: 320px) {
            .post-prev,
            .post-prev:hover,
            .post-prev:focus,
            .post-prev:active {
                padding-top: 365px;
                left: 14px;
            }

            .post-next,
            .post-next:hover,
            .post-next:focus,
            .post-next:active {
                padding-top: 489px;
                right: 14px;
            }

            .novo, .novo > img {
                height: auto !important;
            }

            .namehor {
                margin-top: -15px !important;
            }

        }

        @media (min-width: 576px) {
            .namehor {
                margin-top: 25px !important;
            }

            .novo, .novo > img {
                height: auto !important;
            }
        }

        @media (min-width: 768px) {
            .post-prev,
            .post-prev:hover,
            .post-prev:focus,
            .post-prev:active {
                padding-top: 450px;

                left: 14px;
            }

            .post-next,
            .post-next:hover,
            .post-next:focus,
            .post-next:active {
                padding-top: 595px;
                right: 14px;
            }

            .novo, .novo > img {
                height: 340px !important;
                margin: 0 auto !important;
            }
        }

        @media (min-width: 867px) {
            .novo, .novo > img {
                height: auto !important;
            }
        }

        @media (min-width: 992px) {
            .novo, .novo > img {
                height: 340px !important;
                margin: 0 auto !important;
            }
        }

        @media (min-width: 1200px) {
            .novo, .novo > img {
                height: 430px !important;
                margin: 0 auto !important;
            }
        }
    </style>
    {{--
    <div class="work-navigation  clearfix">
        <nav class="navigation post-navigation" role="navigation">
            <div class="nav-links clearfix">
                <a class="post-prev pull-left" href="{!! $prev !!}"><i class="fa fa-chevron-left"
                                                                       aria-hidden="true"></i>
                </a>
                <a class="work-all" href="{!! Request::server('HTTP_REFERER') !!}"><i
                            class="fa fa-square-o"></i>
                </a>
                <a class="post-next pull-right" href="{!! $next !!}"><i class="fa fa-chevron-right"
                                                                        aria-hidden="true"></i></a>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
    </div>
    --}}
    {{--
    @if(!empty($next))    <a href="{!! $next !!}" class="post-next pull-right"> <i class="icon icon-arrows-right"></i>
    </a> @endif
    @if(!empty($prev))    <a href="{!! $prev !!}" class="post-prev pull-left"> <i class="icon icon-arrows-left"></i>
    </a> @endif
    --}}
    <div class="blog-page-wrapper">
        <div class="container">
            <div class="row">
                <a
                        @if($venta == 1)
                        href="{!! route('MySell',['id'=>$user->id,'slug'=>$user->getMySlug(),'v'=>1]) !!}"
                        @else
                        href="{!! route('MyHorses',['id'=>$user->id,'slug'=>$user->getMySlug(),'type'=>$tipo,'v'=>0]) !!}"
                        @endif
                        class="volver" style=" ">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    {!! trans('stud.horsedetail.goback') !!}
                </a>

                @if(!empty($prev))
                    <a class="post-prev pull-left " href="{!! $prev !!}">
                                        <span style="float:left;display: inline-block;">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                            {!! trans('portal.back') !!}</span>
                    </a>
                @endif

                @if(!empty($next))
                    <a class="post-next pull-right st-191" href="{!! $next !!}">
                                        <span style="float:left;display: inline-block;">{!! trans('portal.next') !!}
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            </span>
                    </a>
                @endif


                {{--
                <div class=" col-xs-1 pull-left">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title">
                                @if(!empty($prev))
                                    <a class="post-prev pull-left " href="{!! $prev !!}">
                                        <span style="float:left;display: inline-block;">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                            {!! trans('portal.back') !!}</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                --}}
                <div class="blog-posts col-xs-offset-1 col-md-offset-1 col-xs-10 col-md-10">
                    <div class="col-xs-12 blog-post single-post">
                        <div class="col-xs-12 col-sm-8 col-md-9 m-t-40">
                            <div class="col-xs-12">
                                @if(!empty($fotos->first()))
                                    <div class="images  ">
                                        <a href="{!! $fotos->first()->getUrl() !!}"
                                           class="nivo-trigger"
                                           data-lightbox-gallery="gallery1">
                                            <span class="fa fa-arrows-alt hidden"> </span>
                                            <figure class="novo">
                                                <img src="{!! $fotos->first()->getUrl()  !!}"
                                                     class=" img-responsive img-owl"
                                                     alt=""
                                                     style="margin: 0 auto;">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="nivo-activator"></div>

                                @endif
                            </div>
                            <div class="col-xs-12 m-t-25">
                                <div class="owl-carousel owl-theme">
                                    @foreach($fotos as $k=>$v)
                                        @if(!empty($v->first()))
                                            <div class="item">
                                                <div class="images single-images-gl ">
                                                    <a href="{!! $v->getUrl() !!}" class="nivo-trigger"
                                                       data-lightbox-gallery="gallery1">
                                                        <span class="fa fa-arrows-alt hidden"> </span>
                                                        <img src="{!! $v->getUrl()  !!}"
                                                             class=" img-responsive img-owl"
                                                             alt="{!! $v->getName() !!}"
                                                             style="margin: 0 auto;">
                                                    </a>
                                                </div>
                                                <div class="nivo-activator"></div>
                                            </div>
                                            {{--
                                            <div class="grid-item ">
                                                <div class="grid-item-content ">
                                                    <div class="images-outer">
                                                        <div class="images single-images-gl ">
                                                            <a href="{!! $v->getUrl() !!}" class="nivo-trigger"
                                                               data-lightbox-gallery="gallery1">
                                                                <span class="fa fa-arrows-alt hidden"> </span>
                                                                <img src="{!! $v->getUrl()  !!}"
                                                                     class=" img-responsive img-owl"
                                                                     alt="{!! $v->getName() !!}"
                                                                     style="margin: 0 auto;">
                                                            </a>
                                                        </div>
                                                        <div class="nivo-activator"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            --}}
                                        @endif
                                    @endforeach
                                    {{--
                                    https://codepen.io/pierrinho/pen/vNLGMa
                                    --}}
                                    @foreach($horse->getVideosModel() as $k=>$v)
                                        <div class="grid-item p-l-7 ">
                                            <div class="grid-item-content ">
                                                <div class="images-outer">
                                                    <div class="images single-images-gl ">
                                                        <a href="{!! $v->getNormalVideoYoutube() !!}"
                                                           class="nivo-trigger"
                                                           data-lightbox-gallery="gallery1">
                                                                <span class="videop">
                                                                <span class="fa fa-arrows-alt hidden"> </span>
                                                                <img src="{!! $v->getYoutubeThumb()  !!}"
                                                                     class=" img-responsive img-owl"
                                                                     alt="{!! $v->getName() !!}"
                                                                     style="margin: 0 auto;">
                                                                    <i class="fa fa-play" aria-hidden="true"></i></span>
                                                        </a>
                                                    </div>
                                                    <div class="nivo-activator"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 m-t-25 namehor">
                            {{--}}<a href="{!! $nada !!}">{{--}}
                            <h1 class="text-center">
                                <strong>
                                    {!! $nombre!!}
                                </strong>
                            </h1>
                            <div class="col-xs-12 table-responsive m-t-20">
                                <table class="col-xs-12 table table-striped table-hover">
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    <tr class="ta{!! $i !!}">
                                        @php($i =($i ==1)?2:1)
                                        <td class="noborder"><strong>{!! trans('horse.text.raza') !!}:</strong></td>
                                        <td class="noborder">{!! trans('horse.raza.'.$raza) !!}</td>
                                    </tr>
                                    <tr class="ta{!! $i !!}">
                                        @php($i =($i ==1)?2:1)
                                        <td class="noborder">
                                            <strong>{!! trans('horse.text.sex') !!}:</strong></td>
                                        <td class="noborder">
                                            {!! trans('horse.sex.'.$sex) !!}</td>
                                    </tr>
                                    @php
                                        $edad = $horse->getAge();
                                        $mes = $horse->getAgeMonth();
                                    @endphp
                                    @if($edad !=0)
                                        <tr class="ta1">
                                            <td class="noborder"><strong>{!! trans('horse.age') !!}:</strong></td>
                                            <td class="noborder">{!! trans('horse.years',['ano'=>$edad]) !!} </td>
                                        </tr>
                                    @else
                                        <tr class="ta{!! $i !!}">
                                            @php($i =($i ==1)?2:1)
                                            <td class="noborder"><strong>{!! trans('horse.age') !!}:</strong></td>
                                            <td class="noborder">{!! trans('horse.mes',['mes'=>$mes]) !!}</td>
                                        </tr>
                                    @endif
                                    @if($raised!=0)
                                        <tr class="ta{!! $i !!}">
                                            @php($i =($i ==1)?2:1)
                                            <td class="noborder"><strong>{!! trans('horse.text.raised') !!}:</strong>
                                            </td>
                                            <td class="noborder">
                                                {!! $raised !!} cm
                                            </td>
                                        </tr>
                                    @endif
                                    @if(!empty($color) )
                                        <tr class="ta{!! $i !!}">
                                            @php($i =($i ==1)?2:1)
                                            <td class="noborder"><strong>{!! trans('horse.attrib.color') !!}:</strong>
                                            </td>
                                            <td class="noborder">{!! $color !!}</td>
                                        </tr>
                                    @endif
                                    <tr class="ta{!! $i !!}">
                                        @php($i =($i ==1)?2:1)
                                        <td class="noborder"><strong>{!! trans('horse.text.doma') !!}:</strong></td>
                                        <td class="noborder">  {!! trans('horse.doma.'.$doma) !!}</td>
                                    </tr>
                                    <tr class="ta{!! $i !!}">
                                        @php($i =($i ==1)?2:1)
                                        <td class="noborder"><strong>{!! trans('horse.text.stud') !!}:</strong></td>
                                        <td class="noborder">{!! $yeguada !!}</td>
                                    </tr>
                                    @if($sex== 1 or $sex == 4)
                                        @if($horse->tocubri == 1)
                                            <tr class="ta{!! $i !!}">
                                                @php($i =($i ==1)?2:1)
                                                <td class="noborder"><strong>{!! trans('horse.cubri') !!}:</strong></td>
                                                <td class="noborder"
                                                    style="    text-align: right;">  {!! $cubri !!}</td>
                                            </tr>
                                        @endif
                                    @endif
                                    </tbody>
                                </table>
                                {{--
                                <div class="col-xs-12">
                                    <div class="col-xs-6" onclick="contacto()">ffffff</div>
                                </div>
                                --}}
                            </div>
                            <div class="col-xs-12 table-responsive">
                                @if($ParaVender != 0)
                                    <table class="col-xs-12 table table-striped table-hover"
                                           style="margin-top: 15px; margin-bottom: 15px;">
                                        <tr>
                                            <td class="colorc text-center" style=" font-size: 23px;"><strong
                                                        style="    padding-left: 10px;">{!! trans('horse.text.price') !!}
                                                    :</strong>
                                                <span style="    padding-right: 10px;">{!! $precio !!}</span>
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                                <div class="col-xs-12 m-t-10 text-center"
                                     style="padding-bottom: 10px; @if($ParaVender == 0)margin-top: 100px !important;@endif">
                                    <a
                                            href="{!! route('MyContact',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">
                                        {!! trans('stud.horsedetail.moreinfo') !!}
                                    </a>
                                </div>
                            </div>
                            <div class="author m-t-40">
                                <div class="widget-title">
                                    <h4 class="text-center"><span style="    font-size: 12px;">
                                            {!! trans('stud.horsedetail.share') !!}
                                        </span></h4>
                                    <div class="sep">
                                        <div class="sep-inside">
                                        </div>
                                    </div>
                                </div>
                                <div class="social-media clearfix m-t-20">
                                    <a name="fb_share" type="button"
                                       href="{!! Funciones::CompartirFacebook($stud->getName(),$linklo) !!}"
                                       style="padding-right: 10px;"
                                       target="_blank">
                                        <i class="fa fa-facebook" style="font-size: 17px;">
                                        </i>
                                    </a>
                                    <a href="{!! Funciones::CompartirTwitter($stud->getName(),$linklo) !!}"
                                       style="padding-right: 10px;"
                                       target="_blank">
                                        <i class="fa fa-twitter" style="font-size: 17px;">
                                        </i>
                                    </a>
                                    <a href="{!! Funciones::CompartirPinterest($stud->getName(),$linklo) !!}"
                                       style="padding-right: 10px;"
                                       target="_blank">
                                        <i class="fa fa-pinterest" style="font-size: 17px;">
                                        </i>
                                    </a>
                                </div>
                            </div>
                            {{--
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum quos quae, provident
                                aspernatur et voluptatibus saepe recusandae accusamus sit non, numquam pariatur odit veniam
                                aut.</p>
                            <a href="page-horse-details.html" class="btn btn-sm btn-theme-colored">Read more</a>
                            --}}
                        </div>
                        <div class="col-xs-12 m-t-25">
                            <article>
                                <p class="text-justify">{!!   $horse->getDescripcion() !!}</p>
                                {{--<p class="text-justify">{!!   $horse->Traducir() !!}</p>--}}
                                {{--
http://horsesworldsale.com/Cliente/2/Caballo/0/1?
                                --}}
                                {{--<p class="text-justify">{!!  Publico::Traduccion( $horse->getDescripcion()) !!}</p>--}}
                                {{--
                                <h3 class="line-bottom">Description</h3>
                                <p class="lead">Lorem ipsum dolor sit amet, <span class="text-theme-colored">consectetur</span>
                                    adipisicing elit. Eos cum minima eligendi tempore unde autem ut nam quaerat quisquam, <span
                                            class="text-theme-colored">aspernatur ratione</span> quis voluptatum optio quidem
                                    eum molestias blanditiis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum commodi magni culpa modi
                                    temporibus totam ut alias eius voluptas mollitia eaque, odit quia, ea at voluptates minima,
                                    vel quam libero. Magni corrupti ratione maiores quis amet, eligendi quasi necessitatibus nam
                                    natus praesentium aliquid alias debitis repellendus eius dignissimos accusantium similique
                                    repellat nostrum odit tempore! Minus commodi laboriosam quod numquam dolore eveniet
                                    corrupti, beatae nobis a optio, laudantium facere esse ipsam temporibus ipsa dolor quisquam
                                    sunt.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum commodi magni culpa modi
                                    temporibus totam ut alias eius voluptas mollitia eaque, odit quia, ea at voluptates minima,
                                    vel quam libero. Magni corrupti ratione maiores quis amet, eligendi quasi necessitatibus nam
                                    natus praesentium aliquid alias debitis repellendus eius dignissimos accusantium similique
                                    repellat nostrum odit tempore! Minus commodi laboriosam quod numquam dolore eveniet
                                    corrupti, beatae nobis a optio, laudantium facere esse ipsam temporibus ipsa dolor quisquam
                                    sunt.</p>
                                --}}
                            </article>
                        </div>
                        {{--}}
                                                <p class="first">{!! $horse->getDescripcion() !!}</p>
                                                @include('frontend.landing.studs.partials.galeriadetalle',['fotos'=>$fotos])
                                                --}}
                    </div>

                </div>


            {{--<div class="col-xs-1 pull-right">
                <div class="sidebar">
                    <div class="widget">
                        <div class="widget-title">
                            @if(!empty($next))
                                <a class="post-next pull-right" href="{!! $next !!}">
                                    <span style="float:left;display: inline-block;">{!! trans('portal.next') !!}
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>--}}
            <!-- sidebar -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    {{--
    <script src="{!! url('mosaic/jquery.mosaicflow.min.js') !!}"> </script>
    --}}
    <script>
        {{--}}
        var $grid = $('.grid').imagesLoaded(function () {
            // init Masonry after all images have loaded
            $grid.masonry({
                // options...
                itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
                columnWidth: '.grid-sizer',
                percentPosition: true
            });
        });
        $('article').readmore({
            speed: 500, collapsedHeight: 400,
            moreLink: '<a href="#">Lee mas</a>',
            lessLink: '<a href="#">Lee Menos</a>',
        });
        --}}
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 3,
            margin: 10,
            nav: true,
            dots: false,
            //nav: false,
            lazyLoad: true,
            URLhashListener: true,
            autoplayHoverPause: true,
            startPosition: 'URLHash',
            video: true,
            //autoWidth: true,
            navText: ["<", ">"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
       });
        $('article').readmore({
            speed: 500, collapsedHeight: 103,
            moreLink: '<a href="#" >{!! trans('portal.readmore') !!}</a>',
            lessLink: '<a href="#">{!! trans('portal.readless') !!}</a>',
        });

        function contacto() {
            var s = "<div class=\"contact-message col-12\">" +
                "    <form id=\"contact-form\" action=\"{!! route('contacto.accion') !!}\" method=\"post\">" +
                "        <input type=\"hidden\" value=\"{!! csrf_token() !!}\" id=\"_token\" name=\"_token\">" +
                "        <div class=\"col-xs-12\">" +
                "            <div class=\"col-xs-12 form-control\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"name\" class=\"form_control\" type=\"text\"" +
                "                           placeholder=\"nombre y apellido\">" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"email\" class=\"form_control\" type=\"text\"" +
                "                           placeholder=\"correo electronico (opcional)\">" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <input name=\"phone\" class=\"form_control\" type=\"tel\"" +
                "                           placeholder=\"Escribe tu numero de contacto\">" +
                "                </div>" +
                "            </div>" +
                "" +
                "        </div>" +
                "        <div class=\"col-xs-12 \" style=\"padding-bottom: 86px;\">" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"single-input field col-xs-12 form-control\">" +
                "                    <textarea name=\"message\" class=\"form_control\"" +
                "                              placeholder=\"Escribe tu mensaje\"></textarea>" +
                "                </div>" +
                "            </div>" +
                "            <div class=\"col-xs-12\">" +
                "                <div class=\"send-button field col-xs-12 form-control\">" +
                "                    <button type=\"submit\" class=\"btn btn-big btn-solid\">" +
                "                        <span> Enviar </span></button>" +
                "                </div>" +
                "            </div>" +
                "        </div>" +
                "    </form>" +
                "</div>";
            swal({
                title: 'Contaca con {!! $stud->getName() !!}',
                /*type: 'info',*/
                html: s,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Contacta',
                confirmButtonAriaLabel: '',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: '{!! trans('users.cancel') !!}',
           });
        }
    </script>
@endsection
