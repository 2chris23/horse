<section class="section-news borde-top">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                    <div class="ot-heading row-20 mb40 text-center">
                        <h2>{!! trans('tema2.menu.video') !!}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php($videos = $stud->getVideosModel())
                @if(count($videos) !=0 )
                    @for($i=0;$i<3;$i++)
                        @if(isset($videos[$i]))
                            @php($v = $videos[$i])
                            <div class="col-xs-12 col-sm-4">
                                <div class="item grid text-center">
                                    <div class="img grid-item">
                                        <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}"
                                           class="popup-youtube">
                                            <span class="fa fa-play"> </span>
                                            <img src="{!! $v->getYoutubeThumb() !!}"
                                                 alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                                        </a>
                                        {{--<img class="img-responsive img-full" src="{!! url('theme/lotus/images/home-3/blog/blog-1.png') !!}" alt="">--}}
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endfor
                @endif
            </div>
            <div class="text-center">
                <a rel="nofollow" href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}"
                   class="awe-btn btn-medium font-hind bold f12 awe-btn-default mt15 awe-btn-default mt15 f13">{!! trans('portal.seemore') !!}</a>
            </div>
        </div>
    </div>
</section>
