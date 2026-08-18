<div class="head_title text-center">
    <h4>Fotos</h4>                                <!--h3>Experience</h3-->
</div>
@php($galeria = $stud->getPhotosModel())
{{--<div class="clearfix"></div>--}}
<div class="grids models text-center hidden">
    @foreach($galeria as $k=>$v)
        @php
            if($v['url']!=''){
            $p = Photo::find($v['id'])->getUrl();
            }else{
            $p='';
            }
        @endphp

        <div class="grids-item model-item">
            <a rel="nofollow" href="{!! $v['url'] !!}" class="popup">
                <img alt="{!! $stud->getName() !!}" lsrc="{!! $p !!}" class="img-responsive">
            </a>
        </div><!-- End off grid item -->
    @endforeach
</div>