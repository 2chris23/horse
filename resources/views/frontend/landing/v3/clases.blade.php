@extends('frontend.landing.v3.base')
@section('content')
    <div class="rancho">
        <div class="tituloSeccion">Clases</div>
        <div class="subtituloSeccion">Aprende a montar a caballo</div>
        <div class="separacion"></div>
        <div class="texto"><p>Escuela Rancho sierra Helada es un centro de equitación situado en la localidad Alfaz del
                pi
                al lado de Benidorm en el que un personal cualificado y especializado ofrece clases de equitación, así
                como
                otras actividades relacionadas con el apasionante mundo del caballo. </p>
            <p>Nuestras instalaciones se encuentran en un entorno natural privilegiado, junto a Benidorm, donde nuestros
                visitantes podrán disfrutar de nuestras actividades ecuestres al mismo tiempo que conocen rincones
                mágicos
                de exhuberante naturaleza a caballo.
            </p>
            <p>
                Contratar: 692 50 66 18 | 610 917 446
            </p>

        </div>
        <div class="imagenes">
            <img class="grande" src="{!! url('theme/b/img/clases/01.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/clases/200.jpg') !!}"/> <img class="peque"
                                                                                      src="{!! url('theme/b/img/clases/IMG_2585.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/clases/090.jpg') !!}"/> <img class="peque"
                                                                                      src="{!! url('theme/b/img/clases/020.jpg') !!}"/>
        </div>
        <div class="clear"></div>
    </div>
@endsection
