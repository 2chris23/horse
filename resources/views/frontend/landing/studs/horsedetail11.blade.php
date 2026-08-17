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
    </style>

@endsection
@section('content')



    <!-- basic-slider start -->
    <!-- Banner -->
    @include('frontend.landing.studs.partials.principal',['stud'=>$stud,'titulo'=>'Caballos','texto'=>'Nuestros Animales'])
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
            width: auto;
            top: 25%;
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
            top: 210px;
        }

        .work-all:hover,
        .post-prev.pull-left:hover,
        .post-next.pull-right:hover {
            color: #a5a5a5 !important;
            transform: scale(1.2);
        }

        .work-all, .work-all:hover {
            margin: auto;
            margin-left: 50%;
        }
        .post-prev.pull-left >span,
        .post-next.pull-right >span,
        .post-prev.pull-left >i,
        .post-next.pull-right >i{
            font-size: 14px;

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

                <div class="sidebar-wrapper col-md-1">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title">
                                @if(!empty($prev))
                                <a class="post-prev pull-left" href="{!! $prev !!}">
                                    {{--<i class="fa fa-chevron-left" aria-hidden="true"></i>--}}
                                    <span>Anterior</span>
                                </a>
                                @endif
                                {{--}}
                                <h4>{!! $horse->getName() !!}</h4>
                                <div class="sep">
                                    <div class="sep-inside">
                                    </div>
                                </div>
                                <div class="image-wrapper m-t-15 col-xs-12">
                                    @if($fotos->first() !== null)
                                        <img src="{!! $fotos->first()->getUrl() !!}" alt="" class="img-responsive">
                                    @endif
                                </div>
                                @include('frontend.landing.studs.partials.tabladetalle',['horse'=>$horse])
                                --}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>


                <div class="blog-posts col-md-10">
                    <div class="blog-post single-post">
                        {{--<a href="{!! $nada !!}">
                            <h1><strong>{!! $nombre!!}</strong></h1>
                        </a>--}}
                        {{--}}
                        <div class="meta">
                            <h5>
                                <i class="fa fa-clock-o">
                                </i>
                                <a href="{!! $nada !!}">{!! Funciones::AjustarFechaDmy($bday) !!}</a>
                            </h5>
                        </div>
                        --}}

                        <div class="col-xs-8 col-sm-8 col-md-8 m-t-40">
                            <div class="col-12">
                            @if(!empty($fotos->first()))
                                <a class="image-popup-vertical-fit" title="Title Here 1"
                                   href="{!! $fotos->first()->getUrl()  !!}">
                                    <img class="img-responsive img-owl"
                                         src="{!! $fotos->first()->getUrl()  !!}" alt="">
                                </a>
                            @endif
                            </div>
                                <div class="col-xs-12 m-t-25">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($fotos as $k=>$v)
                                            @if(!empty($v->first()))
                                                <div class="grid-item p-l-7 ">
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
                                                                <span class="fa fa-arrows-alt hidden"> </span>
                                                                <img src="{!! $v->getYoutubeThumb()  !!}"
                                                                     class=" img-responsive img-owl"
                                                                     alt="{!! $v->getName() !!}"
                                                                     style="margin: 0 auto;">
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

                        <div class="col-xs-4 col-sm-4 col-md-4 m-t-25">
                            {{--}}<a href="{!! $nada !!}">{{--}}
                            <h1>
                                <strong>
                                    {!! $nombre!!}
                                </strong>
                            </h1>
                            {{--}}</a>--}}
                        <!--
                            <ul class="list theme-colored">
                                {{--
                                <li>
                                    {!! trans('horse.text.name') !!} :
                                    {!! $nombre !!}
                                </li>
                                --}}

                                <li>
                                    <strong>{!! trans('horse.text.raza') !!} :</strong>
                                    {!! trans('horse.raza.'.$raza) !!}
                                </li>


                                <li>
                                    <strong>{!! trans('horse.text.sex') !!} :</strong>
                                    {!! trans('horse.sex.'.$sex) !!}
                                </li>


                                <li>
                                    <strong>Edad :</strong>
                                    {!! trans('horse.years',['ano'=>$horse->getAge()]) !!},
                            {{-- Cambiar por edad--}}
                                </li>


                                <li>
                                    <strong>{!! trans('horse.text.raised') !!} :</strong>
                                    {!! $raised !!} cm
                                </li>

                                <li>
                                    <strong>Capa :</strong>
                                    {!! $color !!}
                                </li>

                                <li>
                                    <strong>{!! trans('horse.text.doma') !!} :</strong>
                                    {!! trans('horse.doma.'.$doma) !!}
                                </li>

                                {{--
                                <li>
                                    {!! trans('horse.text.tosolds') !!} :
                                    {!! trans('horse.tosold.'.$ParaVender) !!}
                                </li>
                                --}}
                            {{--@if($ParaVender != false)--}}
                            {{--
                            <li>
                                <strong>{!! trans('horse.text.sold') !!} :</strong>
                                {!! trans('horse.sold.'.$vendido) !!}
                            </li>
--}}

                            {{--@endif--}}
                                <li>
                                    <strong>{!! trans('horse.text.stud') !!} :</strong>
                                    {!! $yeguada !!}
                                </li>
                                {{--
                                                                <li style="    margin-top: 20px;">
                                                                    <strong>{!! trans('horse.text.price') !!} :</strong>
                                                                    2500
                                                                </li>
                                                                --}}


                                </ul>
-->
                            <div class="col-xs-12 table-responsive m-t-20">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr class="ta1">
                                        <td><strong>{!! trans('horse.text.raza') !!}:</strong></td>
                                        <td>{!! trans('horse.raza.'.$raza) !!}</td>
                                    </tr>

                                    <tr class="ta2">
                                        <td>
                                            <strong>{!! trans('horse.text.sex') !!}:</strong></td>
                                        <td>{!! trans('horse.sex.'.$sex) !!}</td>
                                    </tr>

                                    <tr class="ta1">
                                        <td><strong>Edad:</strong></td>
                                        <td>{!! trans('horse.years',['ano'=>$horse->getAge()]) !!}</td>
                                    </tr>

                                    <tr class="ta2">
                                        <td><strong>{!! trans('horse.text.raised') !!}:</strong></td>
                                        <td>{!! $raised !!} cm
                                        </td>
                                    </tr>

                                    <tr class="ta1">
                                        <td><strong>Capa:</strong></td>
                                        <td>{!! $color !!}</td>
                                    </tr>

                                    <tr class="ta2">
                                        <td><strong>{!! trans('horse.text.doma') !!}:</strong></td>
                                        <td>  {!! trans('horse.doma.'.$doma) !!}</td>
                                    </tr>
                                    <tr class="ta1">
                                        <td><strong>{!! trans('horse.text.stud') !!} :</strong></td>
                                        <td>{!! $yeguada !!}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                {{--
                                <div class="col-xs-12">
                                    <div class="col-xs-6" onclick="contacto()">ffffff</div>
                                </div>
                                --}}

                            </div>


                            <div class="col-xs-12 table-responsive">
                                <table class="table" style="margin-top: 15px;
    margin-bottom: 15px;">
                                    <tr>
                                        <td style="    border: 1px black solid;     font-size: 25px;"><strong
                                                    style="    padding-left: 10px;">{!! trans('horse.text.price') !!}
                                                :</strong>
                                            <span style="    padding-right: 10px;">{!! $precio !!}</span>
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-xs-12 m-t-10" style="padding-bottom: 10px">
                                    <a
                                            href="{!! route('MyContact',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">
                                        Solicitar mas informacion
                                    </a>

                                </div>
                            </div>

                            <div class="author m-t-40">
                                <div class="widget-title">
                                    <h4><span style="    font-size: 12px;">Compartir por redes sociales</span></h4>
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





                        <div class="col-md-12 m-t-25">
                            <article>
                                <p class="text-justify">{!!  $horse->getDescripcion() !!}</p>

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
                    <div class="single-post-footer">
                        {{--
                        <div class="author">
                            <div class="social-media clearfix">
                                <a name="fb_share" type="button"
                                   href="{!! Funciones::CompartirFacebook($stud->getName(),$linklo) !!}"
                                   target="_blank">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                                <a href="{!! Funciones::CompartirTwitter($stud->getName(),$linklo) !!}"
                                   target="_blank">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>

                                <a href="{!! Funciones::CompartirPinterest($stud->getName(),$linklo) !!}"
                                   target="_blank">
                                    <i class="fa fa-pinterest">
                                    </i>
                                </a>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>

                <div class="sidebar-wrapper col-md-1">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title">
                                @if(!empty($next))
                                <a class="post-next pull-right" href="{!! $next !!}">
                                    <span>Siguiente</span>
                                    {{--<i class="fa fa-chevron-right" aria-hidden="true"></i>--}}

                                </a>
                                @endif
                                {{--}}
                                <h4>{!! $horse->getName() !!}</h4>
                                <div class="sep">
                                    <div class="sep-inside">
                                    </div>
                                </div>
                                <div class="image-wrapper m-t-15 col-xs-12">
                                    @if($fotos->first() !== null)
                                        <img src="{!! $fotos->first()->getUrl() !!}" alt="" class="img-responsive">
                                    @endif
                                </div>
                                @include('frontend.landing.studs.partials.tabladetalle',['horse'=>$horse])
                                --}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

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
            lessLink: '<a href="#">{!! trans('portal.readmless') !!}</a>',
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
