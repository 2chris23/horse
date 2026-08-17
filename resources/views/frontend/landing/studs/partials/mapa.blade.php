@php
    $lat = (!empty($lat))?$lat:-33.8688;
    //$lat = (!empty($lat))?$lat:38.366511900000000;
    //$lng = (!empty($lng ))?$lng :-0.459893999999963;
    $lng = (!empty($lng ))?$lng :151.2195;
    //$zoom = (!empty($zoom))?$zoom:16;
    $zoom = 11;
$r = 3;
@endphp
@if($r == 17)
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #maps {
            height: 100%;
            min-height: 300px !important;;
            min-width: 300px !important;;
            /*position: initial !important;*/
        }

    </style>
@endif
<div class="clearfix"></div>
<div id="maps"
     style=" height: 100%;min-height: 300px!important;min-width: 300px !important;position: initial !important;"></div>
<div class="clearfix"></div>
@if($r == 17)
    <script>
                {{--
                // This example adds a search box to a map, using the Google Place Autocomplete
                // feature. People can enter geographical searches. The search box will return a
                // pick list containing a mix of places and predicted search terms.

                // This example requires the Places library. Include the libraries=places
                // parameter when you first load the API. For example:
                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
                //  window.onload = function () {
                --}}
        var markers = [];
        var lat = parseFloat({!! $lat !!});
        var lng = parseFloat({!! $lng !!});
        var inicial = {lat: lat, lng: lng};
        var maps;
        var zom = {!! $zoom !!};

        function initmap() {
            {{--
            maps = new google.maps.Map(document.getElementById('maps'), {
                center: {lat: -28.643387, lng: 153.612224},
                zoom: {!! $zoom !!},
                mapTypeId: 'roadmap',
            });
    --}}
                maps = new google.maps.Map(document.getElementById('maps'), {
                zoom: zom,
                center: inicial,
                mapTypeId: 'hybrid',
                {{--
                    center: {lat: -28.643387, lng: 153.612224},
                                mapTypeControl: true,
                                mapTypeControlOptions: {
                                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                                    position: google.maps.ControlPosition.TOP_CENTER
                                },
                                zoomControl: true,
                                zoomControlOptions: {
                                    position: google.maps.ControlPosition.LEFT_CENTER
                                },
                                scaleControl: true,
                                streetViewControl: true,
                                streetViewControlOptions: {
                                    position: google.maps.ControlPosition.LEFT_TOP
                                },
                                --}}
            });
            {{--

            // Create the search box and link it to the UI element.

            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.


            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
    --}}
            {{--// Clear out the old markers.--}}
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

                    {{--// For each place, get the icon, name and location.--}}
            var bounds = new google.maps.LatLngBounds();

                    {{--// Create a marker for each place.--}}
            var m = new google.maps.Marker({
                    map: maps,
                        {{--//icon: icon,--}}
                        position: inicial,
                });
            markers.push(m);

            maps.fitBounds(bounds);
            google.maps.event.addListenerOnce(maps, 'idle', function () {
                {{--// do something only the first time the map is loaded--}}
                maps.setCenter(inicial);
                maps.setZoom({!! $zoom !!});
            });

        }

        $(window).on('load', function () {
            initmap();

        });
    </script>
@endif

