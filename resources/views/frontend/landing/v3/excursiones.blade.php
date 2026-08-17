@extends('frontend.landing.v3.base')
@section('content')
    <div class="rancho">
        <div class="tituloSeccion">Excursiones</div>
        <div class="subtituloSeccion">Una aventura única</div>
        <div class="separacion"></div>
        <div class="texto"><p>Ofrecemos excursiones a caballo por el campo y montañas de benidorm.
                Grupos de hasta 8 personas máximo y duración suele ser de 1hora. </p>
            <p>
                Una alternativa más para disfrutar de tus vacaciones.</p>
            <p>
                No te lo pierdas.
            </p>
            <p>
                Contratar: 692 50 66 18 | 610 917 446

            </p>
        </div>
        <div class="imagenes">
            <img class="grande" src="{!! url('theme/b/img/excursiones/164.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/excursiones/IMG_2378.jpg') !!}"/> <img class="peque"
                                                                                                src="{!! url('theme/b/img/excursiones/068.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/excursiones/113.jpg') !!}"/> <img class="peque"
                                                                                           src="{!! url('theme/b/img/excursiones/061.jpg') !!}"/>
        </div>
        <div class="clear"></div>
    </div>
@endsection
