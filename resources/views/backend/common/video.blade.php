@php
    $vid=(isset($vid))?$vid:[];
if(count($vid)!=0){
    if(!is_array($vid)){
        $object = true;
    }elseif(is_array($vid)){
        $object = false;
    }
}
@endphp
<div id="gallery2" style="margin: 0px auto; max-width: 1100px; min-width: 150px; height: 509px; width: auto;"
     class="ug-gallery-wrapper ug-under-960 ug-theme-video ug-videoskin-right-thumb">
    @foreach($vid as $k=>$v)
        @php
            if(count($vid)!=0){
                if(!is_array($v)){
                    $id = $v->getVideoYoutube();
                    $tittle = $v->getNameYoutubeVideo();
                }elseif(is_array($v)){
                    $t = Video::find($v['id']);
                    $id = $t->getVideoYoutube();
                    $tittle = $t->getName();
                }
            }

        @endphp
        <div data-type="youtube"
             data-videoid="{!! $id !!}"
             {{--
             data-title="GoPro Demo"
             data-description="by Go Pro"
             --}}
             data-title="{!! $tittle !!}"
             data-description=""
        ></div>
        {{--@include('backend.common.galleryimage',['titulo'=>$v->getNameYoutubeVideo(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb()])--}}
    @endforeach

</div>

<script type="text/javascript" src="{{asset('assets/js/ug-theme-video.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/ug-theme-tiles.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/unitegallery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>
