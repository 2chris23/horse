@php($gallery2 = false)
@if(!empty($stud))
    @php($colorcoorp = $stud->getColor())
    @if(empty($stud))
        <script>
            @endif
            var token = "{!! csrf_token() !!}";

            function getPrice(v, d) {
                $(v).append(d.precio + " <span class=\"coinl \">" + d.moneda + "</span>");
            };

            function ObtenerPrecios() {
                var s = $('[data-getprice]');
                var d = new FormData();
                {{--
                $.each(s, function (k, v) {
                    d.append(k, $(v).attr('data-getprice'));

                });

                axios.post("{!! route('ObtenerPrecioCaballos') !!}", d).then(function (data) {
                    var horses = data.data.horses;

                    $.each(horses, function (k, v) {
                        $.each(v, function (a, b) {
                            s = $('[data-getprice="' + b.slug + '"]');
                            if (s.length > 1) {
                                console.dir(a);
                                console.dir();
                                if (a == 0) {
                                    getPrice($("#pcsw"), b);
                                } else {
                                    getPrice(s, b);
                                }
                            } else {

                                getPrice(s, b);
                            }

                        });
                    });

                }).catch(function (error) {
                    console.dir(error);
                });
--}}

                    s = $('[data-slugp]');
                var ptool = new FormData();
                $.each(s, function (k, v) {
                    ptool.append(k, $(v).attr('data-slugp'));

                });


                axios.post("{!! route('ObtenerPreciosCaballos') !!}", ptool).then(function (data) {
                            {{--console.dir(data);--}}
                    var horses = data.data.horses;

                    $.each(horses, function (k, v) {
                        $.each(v, function (a, b) {
                            s = $('[data-slugp="' + b.slug + '"]');
                            if (s.length > 1) {
                                $.each(s, function (q, w) {
                                    {{--console.error(q);
                                    console.dir(w);--}}
                                    $(w).tooltipster({
                                        animation: 'fade',
                                        delay: 200,
                                        theme: 'tooltipster-borderless',
                                        trigger: 'hover',
                                        content: b.precio,
                                        multiple: true,
                                        contentAsHTML: true,
                                        contentCloning: false
                                    });
                                });
                            } else {
                                $(s).tooltipster({
                                    animation: 'fade',
                                    delay: 200,
                                    theme: 'tooltipster-borderless',
                                    trigger: 'hover',
                                    content: b.precio,
                                    multiple: true,
                                    contentAsHTML: true,
                                    contentCloning: false
                                });
                            }
                            if ($("#pcsw").val() != undefined) {
                                $("#pcsw").tooltipster({
                                    animation: 'fade',
                                    delay: 200,
                                    theme: 'tooltipster-borderless',
                                    trigger: 'hover',
                                    content: b.precio,
                                    multiple: true,
                                    contentAsHTML: true,
                                    contentCloning: false
                                });
                            }

                        });
                    });
                }).catch(function (error) {
                    console.dir(error);
                });


                var sa = $('[data-slugc]');
                var ctool = new FormData();
                $.each(sa, function (k, v) {
                    ctool.append(k, $(v).attr('data-slugc'));
                });
                axios.post("{!! route('ObtenerCubricionesCaballos') !!}", ctool).then(function (data) {
                    var horses = data.data.horses;
                    $.each(horses, function (k, v) {
                        s = $('[data-slugc="' + v.slug + '"]');
                        /*tooltipsnew(s, v.precio);*/
                        $(s).tooltipster({
                            animation: 'fade',
                            delay: 200,
                            theme: 'tooltipster-borderless',
                            trigger: 'hover',
                            content: v.tool,
                            multiple: true,
                            contentAsHTML: true,
                            contentCloning: false
                        });
                    });
                }).catch(function (error) {
                    console.dir(error);
                });

            }
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 16000,
                startwidth: 400,
                startheight: 400,
                hideThumbs: 200,

                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,

                navigationType: "bullet",
                navigationArrows: "solo",
                navigationStyle: "preview1",

                touchenabled: "on",
                onHoverStop: "on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

                keyboardNavigation: "off",

                navigationHOffset: 0,
                navigationVOffset: 20,
                navigationHAlign: "top", {{--// Vertical Align top,center,bottom--}}
                navigationVAlign: "bottom", {{--// Horizontal Align left,center,right--}}


                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",

                spinner: "spinner4",

                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: "off",

                autoHeight: "off",
                forceFullWidth: "off",


                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "rs-plugin/videojs/",
                fullScreenOffsetContainer: ""
            });

            {{--// SLIDER REVOLUTION--}}
            jQuery('.tp-banner1').show().revolution({
                dottedOverlay: "none",
                delay: 16000,
                startwidth: 1170,
                startheight: 550,
                hideThumbs: 200,

                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,

                {{--//navigationType: "bullet",--}}
                navigationType: "thumb",
                navigationArrows: "solo",
                navigationStyle: "preview5",

                touchenabled: "on",
                onHoverStop: "on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

                keyboardNavigation: "off",

                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: "on",
                fullScreen: "off",

                spinner: "spinner4",

                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: "off",

                autoHeight: "off",
                forceFullWidth: "off",


                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "rs-plugin/videojs/",
                fullScreenOffsetContainer: ""
            });

            {{--// SLIDER REVOLUTION--}}
            jQuery('.tp-banner-full').show().revolution({
                dottedOverlay: "none",
                delay: 16000,
                startwidth: 1170,
                startheight: 700,
                hideThumbs: 200,

                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,

                navigationType: "bullet",
                navigationArrows: "solo",
                navigationStyle: "preview5",

                touchenabled: "on",
                onHoverStop: "on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

                keyboardNavigation: "on",

                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: "on",
                fullScreen: "on",

                spinner: "spinner4",

                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: "off",

                autoHeight: "off",
                forceFullWidth: "off",


                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "{!! url('landing/js/rs-plugin/videojs/') !!}",
                fullScreenOffsetContainer: ""
            });

            function cargarimagenes() {
                $(function () {
                    $.each(document.images, function () {
                        var this_image = this;
                        var src = $(this_image).attr('src') || '';
                        if (!src.length > 0) {
                                    {{--//this_image.src = options.loading; // show loading--}}
                            var lsrc = $(this_image).attr('lsrc') || '';
                            if (lsrc.length > 0) {
                                var img = new Image();
                                img.src = lsrc;
                                $(img).load(function () {
                                    this_image.src = this.src;
                                    $(this_image).removeClass('hidden');
                                });
                            }
                        }
                    });
                });
            }

            $(document).on('ready', function () {
                ObtenerPrecios();
                cargarimagenes();

            });
            $(window).on('resize', function () {
                $('header').css('width', $('footer').width() + 'px');
                /*console.log('header ' + $('footer').width());*/
            });

            $(window).on('load', function () {
                $('header').css('width', $('footer').width() + 'px');
                /*console.log('header ' + $('footer').width());*/
            });

            function Llamar(tel, el) {
                var s = "<a href='tel:" + tel + "' class='teleff'></a>";
                /*console.dir(s);*/
                $(el).after(s);
                $('.teleff').click().remove()
            }

            @if($gallery2 == true)
            $(document).ready(function () {
                var zindex = 10;

                $("div.card").click(function (e) {
                    e.preventDefault();

                    var isShowing = false;

                    if ($(this).hasClass("show")) {
                        isShowing = true
                    }

                    if ($("div.cards").hasClass("showing")) {
                        {{--// a card is already in view--}}
                        $("div.card.show")
                            .removeClass("show");

                        if (isShowing) {
                            {{--// this card was showing - reset the grid--}}
                            $("div.cards")
                                .removeClass("showing");
                        } else {
                            {{--// this card isn't showing - get in with it--}}
                            $(this)
                                .css({zIndex: zindex})
                                .addClass("show");

                        }

                        zindex++;

                    } else {
                        {{--// no cards in view--}}
                        $("div.cards")
                            .addClass("showing");
                        $(this)
                            .css({zIndex: zindex})
                            .addClass("show");

                        zindex++;
                    }

                });
            });
            @endif


            $('.owl-nextf').on('click', function () {
                $('.owl-next').click();
            });
            $('.owl-prevf').on('click', function () {
                $('.owl-prev').click();
            });
            $(document).ready(function () {
                $('.owl-nextf').removeClass('oculto');
                $('.owl-prevf').removeClass('oculto');
                {{--//$.fn.snow();--}}
            });

            $('.principio').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                items: 1,
                nav: true,
                responsiveClass: true,
                {{-- // Optional helper class. Add 'owl-reponsive-' + 'breakpoint' class to main element.--}}
                navText: ['<i class="ion-chevron-left"><i/>', '<i class="ion-chevron-right"><i/>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });

            var ancho = $(window).width();
            var principio = $('.principio');

            if ($('#maps').val() !== undefined) {
                        @php
                            $lat=$stud->lat;
                            $lng=$stud->lng;
                            $lat = (!empty($lat))?$lat:-33.8688;
                            {{--//$lat = (!empty($lat))?$lat:38.366511900000000;
                            //$lng = (!empty($lng ))?$lng :-0.459893999999963;--}}
                            $lng = (!empty($lng ))?$lng :151.2195;
                            {{--//$zoom = (!empty($zoom))?$zoom:16;--}}
                            $zoom = 11;

                        @endphp
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
                        {{--center: {lat: -28.643387, lng: 153.612224},
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

                    // Clear out the old markers.--}}
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

            }

            @if(empty($stud))

        </script>


    @endif
@endif