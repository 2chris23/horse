<div id="videos" class="col-md-12">
    <div class="head_title text-center">
        <h4>{!! trans('tema2.menu.video') !!}</h4>
    </div>
    <div class="grid text-center c-videos">
        @if(count($stud->getVideosModel()) !=0 )
            @foreach($stud->getVideosModel() as $k=>$v)
                <div class="grid-item ">
                    <a rel="nofollow" href="{!! $v->getNormalVideoYoutube() !!}" class="popup-youtube">
                        <span class="fa fa-play"> </span>
                        <img lsrc="{!! $v->getYoutubeThumb() !!}"
                             alt="{!! $stud->getName()  !!}  {!! $v->getName() !!}">
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>