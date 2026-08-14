@php
    $lat = (!empty($lat))?$lat:'-33.8688';
    $lng = (!empty($lng ))?$lng:'151.2195';

@endphp
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */

    #map {
        height: 100%;
        min-height: 300px !important;;
        min-width: 300px !important;;
        position: initial !important;
    }

    #map > div:nth-child(1) {
        overflow: hidden;
    }
</style>

<div id="map"
     style=" height: 100%;min-height: 300px!important;min-width: 300px !important;position: initial !important;"></div>
<input type="hidden" name="lat" id="lat" value="{!! $lat !!}" class="form-control hidden-xs-down">
<input type="hidden" name="lng" id="lng" value="{!! $lng !!}" class="form-control hidden-xs-down">
<input type="hidden" name="rad" id="rad" value="200" class="form-control hidden-xs-down">
{{--
<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    //  window.onload = function () {
    var markers = [];

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: {!! $lat !!}, lng: {!! $lng !!}},
            zoom: 15,
            mapTypeId: 'hybrid',
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('input_stud_address');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });


        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length === 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                var m = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    other: place,
                    lng: place.geometry.location.lng(),
                    lat: place.geometry.location.lat(),
                    position: place.geometry.location,
                    url: place.url,
                    place_id: place.place_id,
                    formated_address: place.formated_address,
                    adr_address: place.adr_address,
                });
                markers.push(m);
                $('#lat').val(m.lat);
                $('#lng').val(m.lng);
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    //    };


</script>
--}}

