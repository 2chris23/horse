@php

    $id = (!empty($id))?$id:null;//$v['id']
    $url = (!empty($url))?$url:null;//$v['url']
    $link = (!empty($link))?$link:'#!';//$v['url']
    $titulo = (!empty($titulo))?$titulo:null;//$v['titulo1']
    $stitulo = (!empty($stitulo))?$stitulo:null;//$v['titulo2']
$link = route('MyHorseDetailed');
@endphp
<div class="post clearfix">
    <div class="image-wrapper">
        <div class="mask">
            <a href="{!! $link !!}">
                <i class="fa fa-link">
                </i>
            </a>
        </div>
        <img class="img-responsive" src="{!! $url !!}" alt="" style="height: 100px;">
    </div>
    <div class="info-block">
        <a href="{!! $link !!}">
            <h4>{!! $titulo !!}</h4>
        </a>
        {{--
        <div class="meta">
            <p>
                <i class="fa fa-user">
                </i>WorkHub</p>
            <span>|</span>
            <p>
                <i class="fa fa-clock-o">
                </i>30 Dec, 2017</p>
        </div>
        --}}
    </div>
</div>