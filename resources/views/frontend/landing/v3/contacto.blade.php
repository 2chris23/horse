@extends('frontend.landing.v3.base')
@section('content')
    <div class="contacto">
        <div class="tituloSeccion">Contacto</div>
        <div class="subtituloSeccion"></div>
        <div class="separacion"></div>
        <div class="datosContacto">
            <ul>

                <strong>Rancho Sierra Helada</strong><br/>Camino del Repetidor nº 5 Alfaz del pi, (Benidorm)
                </li>
                <div class="separacion"></div>
                <li class="telf">Teléfonos: (+34) 692 50 66 18 | (+34) 610 917 446
                </li>
                <div class="separacion"></div>


                <li class="web">Web: <a rel="nofollow" href="{!! route('MyPage',['slug'=>$stud->slug]) !!}">www.ranchosierrahelada.es</a>
                </li>
                <div class="separacion"></div>
            </ul>
        </div>
        <div class="map">
            <div class="titulo">Encuéntranos</div>
            <div class="map_canvas" id="map_canvas" style="width:528px; height:400px;"></div>
        </div>
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var myLatlng = new google.maps.LatLng(38.556841, -0.078589);

            var mapOptions = {
                center: myLatlng,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.HYBRID
            };

            map = new google.maps.Map(document.getElementById("map_canvas"),
                mapOptions);
            var contentString = '<div><b>Rancho Sierra Helada</b></div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });


            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(38.556841, -0.078589),
                map: map,
                title: "Hello World!"
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        });


    </script>
@endsection
