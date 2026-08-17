@extends('frontend.landing.v3.base')

@section('content')
    <div class="page-title fix"><!--Start Title-->
        <div class="overlay section">
            <h2>
                {!! trans('stud.menu.caption') !!}

            </h2>
            <h3>
                {!! trans('landing.instalaciones') !!}
            </h3>
        </div>
    </div><!--End Title-->

    <section class="about-page page fix"><!--Start About Area-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-title">
                        {{--<h2>WELCOME TO <span>OLONGKER</span></h2>--}}
                        <h2>
                            {!! trans('tema3.aboutus',['name'=>$stud->getName()]) !!}
                        </h2>
                        <h3>ONLINE JEWELRY STORE</h3>
                    </div>
                    <div class="col-xs-12 col-md-6 about-text">
                        <blockquote>
                            {!! $stud->getDescription() !!}
                        </blockquote>

                    </div>
                    @php($v = $user->getVideo())
                    @if(!empty($v))
                        <div class="col-xs-12 col-md-6 about-text">
                            <div class="about-img">
                                {{--
                                <a href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                                    <span class="fa fa-play"> </span>
                                    <img lsrc="{!! $v->getYoutubeThumb() !!}" class="hidden"
                                         alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
--}}
                                </a>
                            </div>
                        </div>

                    @endif
                </div>
                {{--
                <div class="col-sm-6">
                    <div class="about-text">
                        <h2>WHY <span>CHOOSE US</span></h2>
                        <p class="about-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, conse ctetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, consectetur adipiscing elit,ed</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation, conse ctetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="about-img">
                        <img src="img/about/about.jpg" alt="" />
                    </div>
                </div>
                --}}
            </div>
        </div>
    </section><!--End About Area-->
    <div class="clearfix"></div>
    @include('frontend.landing.v3.partial.fotos',[
    'fotos'=>1,
    'imagenes'=>$stud->getInstalationsGalleryModel(),
    'titulo'=>  trans('stud.ouranimal')

    ])
    <div class="clearfix"></div>
    {{--'$videos'=>  trans('stud.ouranimal')--}}
    @php($gs = $stud->Horses()->where('favorite',1)->get())
    @if(!empty($gs))
        <section class="team-area page fix"><!--Start Designer Area-->
            <div class="container">
                <div class="row">
                    <div class="section-title text-center">
                        <h2>Our designer</h2>
                        <div class="underline"></div>
                    </div>

                    @foreach($gs as $k=>$v)
                        @php
                            $f = $v->getPhotoFirstModel();
                            $img = '';
                            $edad = $v->getAge();
                            $mes = $v->getAgeMonth();
                            $sold = ($v->sold == 1) ?'sold':'';
                            $url = Request::fullUrl();
                            $url = route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);
                            $fbs = Funciones::CompartirFacebook($v->getName(),$url);
                            $tws = Funciones::CompartirTwitter($v->getName(),$url);
                            $Gs = Funciones::CompartirGoogle($url);
                            $Ptr = Funciones::CompartirPinterest($v->getName(),$url);
                            if(!empty($f)){
                            $img = $f->getUrl();
                            }
                        @endphp
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="designer fix">
                                <div class="designer-img imagestatic">
                                    <img lsrc="{!! $img !!}" alt="{!! $v->getAltText() !!}" class="hidden"/>
                                    <div class="designer-text ">
                                        <h2>{!! $v->getName() !!}</h2>
                                        <h3>{!! trans('horse.sex.'.$v->sex) !!}</h3>
                                        <p>
                                            {!! $v->getDescripcion() !!}
                                        </p>
                                        <div class="designer-socials">
                                            <a href="{!! $fbs !!}"><i class="fa fa-facebook"></i></a>
                                            <a href="{!! $tws !!}"><i class="fa fa-twitter"></i></a>
                                            <a href="{!! $Ptr !!}"><i class="fa fa-pinterest"></i></a>
                                            <a href="{!! $Gs !!}"><i class="fa fa-google-plus"></i></a>
                                            <a rel="nofollow" href="#!"
                                               onclick="window.open('{!! $print !!}', '{!! $horse->getName() !!}', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                                                <i class="fa fa-print"> </i> </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="designer fix">
                            <div class="designer-img">
                                <img src="img/about/designer-1.jpg" alt=""/>
                                <div class="designer-text">
                                    <h2>Lora Smith</h2>
                                    <h3>Jewelry Designer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <div class="designer-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="designer fix">
                            <div class="designer-img">
                                <img src="img/about/designer-2.jpg" alt=""/>
                                <div class="designer-text">
                                    <h2>William Martin</h2>
                                    <h3>Jewelry Designer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <div class="designer-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="designer fix">
                            <div class="designer-img">
                                <img src="img/about/designer-3.jpg" alt=""/>
                                <div class="designer-text">
                                    <h2>Julia Jones</h2>
                                    <h3>Jewelry Designer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <div class="designer-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="designer fix">
                            <div class="designer-img">
                                <img src="img/about/designer-4.jpg" alt=""/>
                                <div class="designer-text">
                                    <h2>Thomas Albert</h2>
                                    <h3>Jewelry Designer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <div class="designer-socials">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </section><!--End Designer Are-->
        <div class="clearfix"></div>
        <div class="m-top-20"></div>
    @endif
    {{--@include('frontend.landing.v3.partial.contact')--}}

@endsection