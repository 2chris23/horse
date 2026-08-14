@php
    $titulo = (isset($titulo ))?$titulo:null;
    $embed = (isset($embed ))?$embed:null;
    $imagen = (isset($imagen ))?$imagen:null;
    $id = (isset($id ))?$id:null;
$video = (isset($video))?'video':'photo';
$Mensaje = (isset($Mensaje))?$Mensaje:null;
$adminpanel = (isset($adminpanel))?$adminpanel:null;
$specialvideo = (isset($specialvideo))?$specialvideo:null;
$size = (isset($size))?$size:null;
$sold = (isset($sold))?$sold:0;

@endphp
{{--
<div class="col-xl-2 col-lg-3 col-md-4 col-xs-6 gallery-border gallery-border sortable-item gallery-elem"
     data-id="{!! $id !!}">

    <div class="delete" onclick="erasephoto(this,{{$id}},'{!! $video !!}')"><i class="fa fa-times"
                                                                               aria-hidden="true"></i></div>

    <a class="fancybox-buttons zoom thumb_zoom"
       data-fancybox-group="button"
       data-id="{!! $id !!}"
       id="{!! $id !!}"
       title="{!! $titulo !!}"
       href="{{$imagen}}">
        <img src="{{$imagen}}"
             class="img-fluid gallery-style" alt="Image1"></a>
</div>
--}}

<div class="dropify-wrapper has-preview sortable-item " id="maxy_{!! $id !!}" data-id="{!! $id !!}"
     @if(!empty($adminpanel))style="    height: 100px; width: 100px; border:none;    background: transparent;;" @endif
     @if(!empty($specialvideo))style="    height: 100px;width: 100px;"@endif

>
    @if(empty($adminpanel) and empty($specialvideo))
        <button type="button" class="dropify-clear" onclick="erasephoto(this,{{$id}},'{!! $video !!}')">{!! trans('users.delete') !!}</button>
    @endif
    @if(!empty($Mensaje))
        <button type="button" class="dropify-clear Titulos" style="top: 150px;" onclick="aviso({{$id}})">{!! trans('users.change') !!}
            {!! trans('users.tittles') !!}
        </button>
    @endif
    <div class="dropify-preview"
         @if(empty($adminpanel) and empty($specialvideo)) style="display: block;" @endif
         @if(!empty($adminpanel))style="   display: block; top: -6px; left: -9px;    background: transparent;" @endif
         @if(!empty($specialvideo))style="   display: block; top: -6px; left: -9px;"@endif

    >

        <span class="dropify-render">
            <a style="display: none;"
               {{--
                              data-fancybox-group="button"

                              data-id="{!! $id !!}"
                              id="{!! $id !!}"
                              title="{!! $titulo !!}"
                              --}}
               @if(empty($embed))
               class="fancybox-buttons zoom thumb_zoom img_{!! $id !!}" href="{{$imagen}}">

                @else
                    class="fancybox-buttons zoom thumb_zoom img_{!! $id !!} fancybox.iframe" href="{{$embed}}"
                    style="display: none;">

                @endif
                </a>
            <img lsrc="{{$imagen}}" class="fancybox-buttons  lazy zoom thumb_zoom img_zoom_{!! $id !!}">
            @if($video == 1)
                <i class="fa fa-play" aria-hidden="true"></i></span>
        @endif


            {{-- <a class="fancybox-buttons zoom thumb_zoom"
       data-fancybox-group="button"
       data-id="{!! $id !!}"
       id="{!! $id !!}"
       title="{!! $titulo !!}"
       href="{{$imagen}}">
        <img src="{{$imagen}}"
             class="img-fluid gallery-style" alt="Image1"></a>--}}
        </span>

        <div class="dropify-infos infos_{!! $id !!}" onclick="$('.img_{!! $id !!}').click()">
            <div class="dropify-infos-inner">
                {{--
                @if(!empty($Mensaje))
                    <p class="dropify-filename">
                        <span class="file-icon"></span>
                        <span class="dropify-filename-inner inner_l_{{$id}}" onclick="aviso({{$id}})">
                        {!! $Mensaje !!}
                    </span>
                    </p>
                @endif
                --}}
                {{--
                <p class="dropify-filename">
                    <span class="file-icon"></span>
                    <span class="dropify-filename-inner" style="display: none;">
                        d233fad2b66f0bdc5b45.jpg
                    </span>
                </p>
                <p class="dropify-infos-message" style="display: none;">
                    Arrastra y suelta tus archivos o haz click para
                    reemplazarlo
                </p>
                --}}
            </div>
        </div>

    </div>
        @if($sold == 1)
            <div class="ribbon popular ribbon-fix-content"></div>
        @endif
</div>
@if(!empty($adminpanel))
    <span id="mini_{!! $id !!}" class="minimark" style="display: none;">
                    <img style="max-height: 200px;"
                         class="img-responsive  lazy"
                         lsrc="{!! $imagen !!}"/><br/>
                    <span>
                        {!! trans('users.size') !!} ({!! $size !!} kb) {{--{!!  $c-> Width()!!} x {!!  $c-> Heigth()!!}--}}

                    </span>
            </span>
@endif
<script>
    $('.infos_{!! $id !!}').on('hover', function () {
        $('.img_zoom_{!! $id !!}').hover();
    });
    @if(!empty($Mensaje))
    $(window).on('load', function () {
        $('.inner_l_{{$id}}').css('display', '');
        {{-- //$('.dropify-infos-message').css('display','none'); --}}
   });
    @endif
    @if(!empty($adminpanel))
    $(window).on('load', function () {
        $("#maxy_{!! $id !!}").hover(
            function () {
                {{-- //console.log('uno'); --}}
                $("#mini_{!! $id !!}").css('display', 'block');
                {{-- //$(this).find('#').css('display', 'block'); --}}
            }, function () {
                {{-- //console.log('dos'); --}}
                $("#mini_{!! $id !!}").css('display', 'none');
                {{-- //$(this).find('span').css('display', 'none'); --}}
            }
        );
        @if(!empty($embed) and empty($specialvideo))
        $("#maxy_{!! $id !!}").on('click',function(){
        $(".img_{!! $id !!}").click();
       });
        @endif

    });
    @endif

</script>


{{--
<a href="#!" id="imgt_{!! $c->id !!}"
   class="thumbnailb">
        <div class="clearfix"></div>
            <figure>
                <img lsrc="{!! $c->getUrl() !!}"
                     class="img-responsive" alt=""
                     style=" max-height: 64px;">
            </figure>


        <div class="clearfix"></div>
</a>
--}}