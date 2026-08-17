{{--
<div class=" float-left hidden-sm-down text-center">
    {{--<a href="{!! route('suscripcion.plan') !!}" class="header_input_search text-center btn suscrip" target="_blank">**}}
    <button class="{!! trans('suscripcion.titulo',['date'=>Funciones::AjustarFechaDmy('2018-01-15')]) !!} text-center btn suscrip">
        {{--
        <i class="fa fa-retweet"></i>
        @php

            if((\Auth::user()->Yeguada()->getSubcritiondate())!=null)
             {
             echo trans('suscripcion.titulo',['date'=>\Auth::user()->Yeguada()->getSubcritiondate()]);
             }else{
             echo  trans('suscripcion.titulo',['date'=>Funciones::AjustarFechaDmy('2018-01-15')]);

             }
        @endphp
        **}}
            {!! trans('suscripcion.titulo',['date'=>Funciones::AjustarFechaDmy('2018-01-15')]) !!}

    </button>
    {{--</a>**}}

</div>
--}}

<div class=" col-12    offset-sm-4 col-sm-3  offset-md-4 col-md-4  offset-md-4 col-md-4 offset-lg-3 col-lg-6 text-center subpa hidden-xs-down ">
    {{--
    p-t
    xs    100px
            .btn-sus{
                padding-right: 40px !important;;
                padding-left: 40px !important;;
            }

            @media (min-width: 76px) and ( max-width: 768px ) {
                .btn-sus{
                    padding-right: 22px !important;
                    padding-left: 22px !important;;
                }
            }

    --}}

    @php($envi = \Config::get('app.env'))
    @php($dia = \Auth::user()->Yeguada()->DiasDeSuscipcion())

    <button class="btn btn-outline-warning notify_fromtop m-t-8  p-8 btn-sus"
            style="padding-left: 40px!important;padding-right: 40px!important; @if($dia >= -30 and $dia <-10)
                    background-color: #ffc107;color: white;
            @elseif($dia >= -10)
                    background-color: #ff5722; color: white;
            @endif
                    ">

        @if(!empty(\Auth::user()->Yeguada()->getSubcritiondate()))
            @if($dia >= -30 and $dia < 0)
                {!! trans('suscripcion.titulofalta',['dia'=>($dia*-1),'date'=>Funciones::AjustarFechaDmySlash(\Auth::user()->Yeguada()->getSubcritiondate())]) !!}
            @elseif($dia < -30)
                {!! trans('suscripcion.titulo',['date'=>Funciones::AjustarFechaDmySlash(\Auth::user()->Yeguada()->getSubcritiondate())]) !!}
            @elseif($dia==0 )
                {!! trans('suscripcion.hoyvence',['date'=>Funciones::AjustarFechaDmySlash(\Auth::user()->Yeguada()->getSubcritiondate())]) !!}
            @elseif($dia > 0)
                {!! trans('suscripcion.vencida',['date'=>Funciones::AjustarFechaDmySlash(\Auth::user()->Yeguada()->getSubcritiondate())]) !!}
            @endif

        @else
            {!! trans('suscripcion.titulo',['date'=>Funciones::AjustarFechaDmySlash('2017-01-20')]) !!}
        @endif

    </button>
    <button class="btn btn-warning glow_button m-t-8 p-8 @if($envi == 'local') suscrip @endif " style="padding-right: 10px !important;
        margin-left: 15px;
            padding-left: 10px !important;"
            onclick="window.location.href = '{!! route('suscripcion.plan') !!}';"

    >
        {{--{!! trans('suscripcion.extension') !!}--}}
        {!! trans('suscripcion.renovar') !!}
    </button>


</div>
<script>
    @if($envi == 'local')


    $('.suscrip').on('click', function () {
        console.log("redirige");
    });

    @endif

</script>
