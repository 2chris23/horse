@php($animacionslick='
data-animation-in="flipInX"

')

<section id="abouts" class="abouts">
    <div class="container">
        <div class="row">
            <div class="abouts_content">
                <div class="col-md-5 col-xs-12">
                    <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                        <img src="{!! $stud->getLogo() !!}" alt="" class="img-responsive"/>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                        <h4>{!! trans('portal.welcometo') !!}</h4>
                        <h3>{!! $stud->getName() !!}</h3>
                        {!! $stud->getDescription() !!}
                        <a rel="nofollow" href="" class="btn btn-primary">click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="features" class="features">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 main_features_content_area  wow fadeIn"
                     data-wow-duration="3s">
                    <div class="single_features_text">
                        <div class="row" style="margin-top: 40px">
                            @php($v = $user->getVideo())
                            @if(!empty($v))
                                <div class="col-xs-12 col-md-6 col-md-offset-3 p-b-50">
                                    <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                                        <span class="fa fa-youtube-play"> </span>
                                        <img lsrc="{!! $v->getYoutubeThumb() !!}"
                                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}"
                                             class="img-responsive"
                                             style="margin: 0 auto;">
                                    </a>
                                </div>
                            @endif
                            @php($fotos = $stud->getInstalationsGallery())
                            @if(count($fotos)!=0)
                                <div class="col-xs-offset-1 col-xs-10" style="margin-top: 40px;margin-bottom: 40px;">
                                    <div class="carousel-inner  col-xs-12 m-top-40 hidden">
                                        @foreach($fotos  as $k=>$v)
                                            <div class="col-lg-3 col-xs-6 text-center corte">
                                                <a rel="nofollow" href="#"
                                                   onclick="$('#real_{!! $k !!}').click()" {!! $animacionslick !!} >
                                                    <img lsrc="{!!$v['url'] !!}" alt="{!! $stud->getName()  !!} "
                                                         {!! $animacionslick !!} class="img-responsive">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="hidden">
                                    @foreach($fotos as $k=>$v)
                                        <a rel="nofollow" id='real_{!! $k !!}' href="{!! $v['url'] !!}"
                                           class="popup-img">
                                            <img lsrc="{!!$v['url'] !!}" alt="{!! $stud->getName() !!}"
                                                 class="img-responsive">
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>