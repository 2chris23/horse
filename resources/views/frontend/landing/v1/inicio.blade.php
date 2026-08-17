@section('fbheader')
    @include('meta',
    [
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
    ])

@endsection

@php($razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray())
@php($sexos = $stud->Horses()->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray())
@extends('frontend.landing.v1.base')
@section('content')

    <!--Home Sections-->
    {{--
        @if(!empty($horsesfav))
            @php($d = rand(0,count($horsesfav)-1))
            @php($df = $horsesfav[$d])
            @include('frontend.landing.v1.partials.iniciofav')
        @else
            @php($d = rand(0,count($horses)-1))
            @php($df = $horses[$d])
            @include('frontend.landing.v1.partials.iniciofav')
        @endif
        --}}

    @include('frontend.landing.v1.partials.slider')

    <!--About Sections-->
    <section id="feature" class="feature p-top-100">
        <div class="container">
            <div class="row">
                <div class=" col-xs-offset-3 col-xs-6 m-t-20">
                    @include('flash::message')
                </div>
                <div class="main_testimonial text-center">
                    <div class="item active testimonial_item">
                        <div class="col-sm-10 col-sm-offset-1">

                            <div class="test_authour">
                                <img class="img-circle tam-img-150 hidden  lazy" lsrc="{!! $stud->getLogo() !!}"
                                     alt=""/>
                                <h2>
                                    {!! trans('portal.welcometo') !!}{!! $stud->getName() !!}
                                </h2>
                                <h5>
                                    <em>
                                        {{--LEMA--}}
                                    </em>
                                </h5>
                                <div class="separator_auto"></div>
                            </div>

                            <div class="feature_content wow fadeIn m-top-40 text-justify">
                                <p>
                                    @php($ds = $stud->getDescription() )
                                    @if(strlen($ds >201))
                                        @php($ds1 = substr($ds,0,200));
                                        {!! $ds1 !!}...

                                    @else
                                        {!! $ds !!}
                                    @endif

                                </p>

                                <div class="feature_btns m-top-30 m-bottom-30 text-center ">
                                    <a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}"
                                       class="btn btn-default text-uppercase coorp"
                                    >
                                        {!! trans('portal.seemore') !!}
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>

                                    {{--<a href="aboutus.html" class="btn btn-default text-uppercase"></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End off container -->


        <!--Our Work Section-->
        <div class="container">
            <div class="row">
                <div class="main_work m-t-40">
                    @php($i = 0)
                    @foreach($sexos as $k=>$v)
                        @include('frontend.landing.v1.partials.iniciorazas')
                        @php($i++)
                    @endforeach
                </div>
            </div>
        </div>


    </section> <!--End off About section -->


    <!--Models section-->
    @if(!empty($horses))

        <section id="models" class="models bg-grey roomy-50">
            <div class="container">
                <div class="row">
                    <div class="main_models text-center">
                        <div class="col-md-12">
                            <div class="head_title text-left sm-text-center wow fadeInDown">
                                <h2>{!! trans('stud.ouranimal') !!}</h2>
                                <h5><em>
                                        {!! trans('tema1.destacados') !!}

                                    </em></h5>
                                <div class="separator_left"></div>
                            </div>
                        </div>
                        <style>
                            .flot {
                                top: -150px;
                                /* left: 50%; */
                                position: relative;
                                opacity: 1;
                            }
                        </style>
                        <div class="clearfix"></div>
                        <div class=" models text-center">
                            @for($i = 0;$i<7;$i++)
                                @if($i < count($horses))
                                    @php
                                        $w = $horses[$i];

                                        $p = $w->getPhotoFirstModel();
                                            if(!empty($p)){
                                            $img = $p->getUrl();
                                            }else{
                                            $img ='';
                                            }

                                    @endphp
                                    <div class="col-md-3 col-sm-6  col-xs-12 m-top-30 m-b-30">
                                        <a href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$w->slug]) !!}"
                                           class="">
                                            <div class="model_item ">
                                                <div class="model_img" {{--@if($img!='') style="background-image: url('{!! $img !!}') " @endif--}}>
                                                    @if($w->sold == 1)
                                                        <div class="sold sold-n"></div>
                                                    @endif
                                                    <figure class="figure-center tam-img-270">
                                                        @if($img !='')
                                                            <img lsrc="{!!$img !!}" alt="{!! $w->getAltText() !!}"
                                                                 class="img-responsive hidden lazy"/>
                                                        @endif
                                                    </figure>

                                                    {{--

                                                    {!! trans('portal.seemore') !!}
                                                    <i class="fa fa-long-arrow-right"></i>

                                                    --}}

                                                    <div class="model_caption">
                                                        <h5 class="text-white">{!! $w->getName() !!}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div><!-- End off col-md-3 -->
                                    {{--
                                        <div class="col-md-3 col-sm-6">
                                            <div class="model_item m-top-30">
                                                <div class="model_img">
                                                    <figure class="figure-center tam-img-270">
                                                        @if($img !='')
                                                            <img lsrc="{!!$img !!}" alt="{!! $w->getAltText() !!}"
                                                                 class="img-responsive"/>
                                                        @endif
                                                    </figure>
                                                    <a href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$w->slug]) !!}"
                                                       class="btn btn-default m-top-20">
                                                        {!! trans('portal.seemore') !!}
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </a>
                                                    <div class="model_caption">
                                                        <h5 class="text-white">{!! $w->getName() !!}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End off col-md-3 -->
                                        --}}
                                @endif
                            @endfor

                            <div class="col-md-3 col-sm-6 col-xs-12 grid-items  boxi m-b-30">
                                <div class="model_item meet_team m-top-30 boxi">
                                    <a class="cooprlink" href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}">
                                        {!! trans('tema1.seeall') !!}
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- End off col-md-3 -->

                        </div>
                    </div>
                </div>
        </section>
    @endif
    {{--}}
    <script>
        $('.model_img').on('hover',function(){
        console.dir(this);

            var s = $(this).find('.flot');
            console.dir(s);
            $(s).attr('opacity',1).hover();
            console.log('dddddddddd');
       });
        model_item m-top-30
        col-md-3 col-sm-6
        $('.col-md-3').on('hover',function(){
               console.dir(this);
              });
        $('.model_img').on('hover',function(){
               console.dir(this);

            var s = $(this).find('.flot');
            console.dir(s);
            $(s).attr('opacity',1).hover();
            console.log('dddddddddd');
       });
    </script>
    --}}

@endsection
