@extends('frontend.landing.v3.base')
@section('content')
    <div class="home">
        <div class="eslogan">
            Bienvenidos Rancho Sierra Helada <br/><span class="peque">y al mundo Ecuestre.</span>
        </div>
        <div class="separacion"></div>
        <div class="bienvenidos">
            <div class="titulo">¡Reserva tu excursión!</div>
            <div class="img"><img src="{!! url('theme/b/img/excursiones/IMG_2378.jpg') !!}"
                                  alt="Bienvenidos al Rancho Sierra Helada"
                                  style="border:2px solid #fff; margin-top:10px;"/></div>
            <div class="texto">Ofrecemos excursiones a caballo por el campo y montañas de benidorm. Grupos de hasta 8
                personas máximo y duración suele ser de 1hora.
            </div>
            <div class="more"><a rel="nofollow" href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}">Ver
                    más</a></div>
        </div>
        <div class="excursiones">
            <div class="titulo">Caballos en venta</div>
            <div class="excursion">
                <div class="cajaExcursion">
                    <div class="dia"><img src="{!! url('theme/b/img/venta/IMG_2113.jpg') !!}"
                                          style="width:100px; height:auto;"/></div>
                    <div class="texto">PURA RAZA INGLÉS</div>
                </div>
                <div class="more"><a rel="nofollow" href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}"></a>
                </div>
            </div>
            <div class="excursion">
                <div class="cajaExcursion">
                    <div class="dia"><img src="{!! url('theme/b/img/venta/054.jpg') !!}"
                                          style="width:100px; height:auto;"/></div>
                    <div class="texto">CENTRO EUROPEOS</div>
                </div>

            </div>

            <div class="excursion">
                <div class="cajaExcursion">
                    <div class="dia"><img src="{!! url('theme/b/img/venta/IMG_2152.jpg') !!}"
                                          style="width:100px; height:auto;"/></div>
                    <div class="texto">PURA RAZA ESPAÑOL</div>
                </div>
                <div class="more"><a rel="nofollow" href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">Ver
                        más</a></div>
            </div>

        </div>
        <div class="facebookCol">
            <div class="fb-like-box" data-href="https://www.facebook.com/RSierraHelada" data-width="310"
                 data-height="410"
                 data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true"
                 data-show-border="false"></div>
        </div>

        <div class="clear"></div>
    </div>
@endsection
