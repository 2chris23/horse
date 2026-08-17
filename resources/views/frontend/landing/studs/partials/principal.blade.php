@php
    $texto = (isset($texto))?$texto:null;
    $titulo = (isset($titulo))?$titulo:null;
@endphp
@if(!empty($stud->getFront()))
    @if(!empty($stud->getFront()->getUrl()))
        <style>
            .page-banner {
                background: url({!! $stud->getFront()->getUrl() !!}) center center no-repeat;
                background-size: cover;
            }
        </style>
    @endif
@endif
<div class="page-banner">
    <div class="container">
        <div class="parallax-mask"> </div>
        <div class="col-12 ">
            <h2 class="font-dst text-right font-dst1 section-name texto-shadow f-white " style="  margin-top: 10px;  font-size: 20px!important;">

                <b>{!! $titulo !!}</b>
                <span class="font-dst font-dst1  font-right  texto-shadow f-white" style="    margin-top: -42px; font-size: 15px!important;">
                // {!! $texto !!}
            </span>
            </h2>

        </div>
        {{--
        <div class="section-name">
            <h2 class="text-left font-dst1 section-name">{!! $titulo !!}</h2>
            <div class="text-right">
            <h5 class="text-right texto-shadow">
                {{--{!! $stud->getName() !!}
                {{--<i class="fa fa-angle-double-right"></i>
                //
                {!! $texto !!}
            </h5>
            {{--</div>
    </div>
        --}}


    </div>
</div>