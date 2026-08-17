@php($escritorio = Agent::isDesktop())
@if(!empty($stud)) @php($colorcoorp = $stud->getColor()) @if(empty($stud))
    <script> @endif var pai = 0;
        var edo = 0;
        var token = "{!! csrf_token() !!}";

        function cargarimagenes() {
            {{--
            $(".lazy").removeClass('hidden').Lazy({
                attribute:'lsrc',
            });
            return null;
            --}}
            $(function () {
                $.each(document.images, function () {
                    var this_image = this;
                    var src = $(this_image).attr('src') || '';
                    if (!src.length > 0) {
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


        function changelan(id) {
            var url = '{!! route('lengauje') !!}/' + id;
            console.log(url);
            window.location.replace(url);
        }

        @if(!empty($stud->getFacebook()->getUrlPage()) or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getPinterest()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage()) or !empty($stud->getGoogle()->getUrlPage()))
        $.contactButtons({
            effect: 'slide-on-scroll',
            buttons: {
                @if(!empty($stud->getFacebook()->getUrlPage())) 'facebook': {
                    class: 'facebook',
                    use: true,
                    link: '{!! $stud->getFacebook()->getUrlPage() !!}',
                    extras: 'target="_blank"',
                    title: '{!! trans('social.folfb') !!}'
                },
                @endif @if(!empty($stud->getTwitter()->getUrlPage())) 'twitter': {
                    class: 'twitter',
                    use: true,
                    icon: 'twitter',
                    link: '{!! $stud->getTwitter()->getUrlPage() !!}',
                    extras: 'target="_blank"',
                    title: '{!! trans('social.foltw') !!}'
                },
                {{--, title: 'Follow on Twitter' --}} @endif @if(!empty($stud->getPinterest()->getUrlPage())) 'pinterest': {
                    class: 'pinterest',
                    use: false,
                    icon: 'pinterest',
                    link: '{!! $stud->getPinterest()->getUrlPage() !!}',
                    extras: 'target="_blank"',
                    title: '{!! trans('social.folpn') !!}'
                },
                {{--, title: 'Follow on Pinterest' --}} @endif {{-- @if(!empty($stud->getYoutube()->getUrlPage())) <li><a href="{!! $stud->getYoutube()->getUrlPage() !!}" target="_blank"> <i class="fa fa-youtube"></i> </a></li> @endif @if(!empty($stud->getInstagram()->getUrlPage())) <li><a href="{!! $stud->getInstagram()->getUrlPage() !!}" target="_blank"><i class="fa fa-instagram"></i></a></li> @endif --}} @if(!empty($stud->getYoutube()->getUrlPage())) 'mybutton': {
                    class: 'youtube',
                    use: true,
                    link: '{!! $stud->getYoutube()->getUrlPage() !!}',
                    icon: 'youtube',
                    extras: 'target="_blank"',
                    title: '{!! trans('social.folyt') !!}'
                },
                {{--, title: 'My title for the button' --}} @endif @if(!empty($stud->getGoogle()->getUrlPage())) 'google': {
                    class: 'gplus',
                    use: true,
                    link: '{!! $stud->getGoogle()->getUrlPage() !!}',
                    extras: 'target="_blank"',
                    title: '{!! trans('social.folgb') !!}'
                }, @endif {{-- @if($escritorio != true) @php($cd=0) @foreach($stud->getPhoneModel() as $k=> $v) @if($v->isNull() !== true) @if($cd == 0) 'phone': { class: 'phone separated', use: true, link: '{!! $v->getFormatNumberOnly() !!}', extras: 'target="_blank"' , title: '{!! trans('social.folph') !!}' }, @endif @php($cd = 1) @endif @endforeach @endif --}} {{-- @if(!empty($stud->getEmail())) 'email': {class: 'email', use: true, link: '{!! $stud->getEmail() !!}'}, @endif 'linkedin': { class: 'linkedin', use: true, link: 'https://www.linkedin.com/company/mycompany' }, 'mybutton': { class: 'git', use: true, link: 'http://github.com', icon: 'github', title: 'My title for the button' }, --}} }
        });
        @endif
        if ($('.ourmap').val() !== undefined) {
            var map = new GMaps({
                el: '.ourmap',
                lat: {!! $stud->getLat() !!},
                lng: {!! $stud->getLng() !!},
                scrollwheel: false,
                zoom: 13,
                zoomControl: true,
                panControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false,
                clickable: false,
                styles: [{
                    'stylers': [{'hue': 'gray'}, {saturation: -100},
                        {gamma: 0.80}]
                }]
            });

            var image = {
                url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                {{--// This marker is 20 pixels wide by 32 pixels high.--}}
                size: new google.maps.Size(20, 32),
                {{--// The origin for this image is (0, 0).--}}
                origin: new google.maps.Point(0, 0),
                {{--// The anchor for this image is the base of the flagpole at (0, 32).--}}
                anchor: new google.maps.Point(0, 32)
            };

            var marker = new google.maps.Marker({
                position: {
                    lat: {!! $stud->getLat() !!},
                    lng: {!! $stud->getLng() !!},
                },
                animation: google.maps.Animation.DROP,
                title: "{!! $stud->getName() !!}",
                icon: '{!! url('theme/v/images/mapi.png') !!}',
                {{--//icon: image,--}}
            });
            $(window).on('load', function () {

                map.addMarker(marker);
            });
        }

        function mostrarrecomendar(el) {
            modalshow(el);
        };

        function modalshow(clase) {
            $(clase).modal('show');
        };
        "use strict";
        jQuery(document).ready(function ($) {

            {{--
            //==========================================
            //for Preloader
            //=========================================
            --}}

            $(window).load(function () {
                $("#loading").fadeOut(500);
            });

            {{--
            //==========================================
            // Mobile menu
            //=========================================--}}
            $('#navbar-menu').find('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: (target.offset().top - 80)
                        }, 1000);
                        if ($('.navbar-toggle').css('display') != 'none') {
                            $(this).parents('.container').find(".navbar-toggle").trigger("click");
                        }
                        return false;
                    }
                }
            });


                    {{--//==========================================
                    // wow
                    //=========================================--}}

            var wow = new WOW({
                    mobile: false
                });
            wow.init();


            {{--// =========================================
            // magnificPopup
            // =========================================--}}

            $('.popup-img').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            $('.video-link').magnificPopup({
                type: 'iframe'
            });


            {{--// =========================================
            //      featured slider
            // =========================================--}}


            $('.featured_slider').slick({
                centerMode: true,
                dote: true,
                centerPadding: '60px',
                slidesToShow: 3,
                speed: 1500,
                index: 2,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });


            {{--// =========================================
            // Counter
            // =========================================--}}

            $('.statistic-counter').counterUp({
                delay: 10,
                time: 2000
            });


            {{--// =========================================
            // Scroll Up
            // =========================================--}}

            $(window).scroll(function () {
                if ($(this).scrollTop() > 600) {
                    $('.scrollup').fadeIn('slow');
                } else {
                    $('.scrollup').fadeOut('slow');
                }
            });
            $('.scrollup').click(function () {
                $("html, body").animate({scrollTop: 0}, 1000);
                return false;
            });

            {{--
// =========================================
// About us accordion
// =========================================
--}}
            $("#faq_main_content").collapse({
                accordion: true,
                open: function () {
                    this.addClass("open");
                    this.css({height: this.children().outerHeight()});
                },
                close: function () {
                    this.css({height: "0px"});
                    this.removeClass("open");
                }
            });

            {{--// =========================================
// Team Skillbar active js
// =========================================--}}


            jQuery('.teamskillbar').each(function () {
                jQuery(this).find('.teamskillbar-bar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 6000);
            });


            {{--//End--}}

        });


        {{--// =========================================
        //  Portfolio Isotop
        // =========================================--}}
        /*
        $(function () {
            // Initialize Isotope
            var $notes = $(".grid").isotope({
                itemSelector: ".grid-item"
            });

            // On filter button click
            $(".filters-button-group .button").on("click", function (e) {
                var $this = $(this);

                // Prevent default behaviour
                e.preventDefault();

                // Toggle the active class on the correct button
                $(".filters-button-group .button").removeClass("is-checked");
                $this.addClass("is-checked");

                // Get the filter data attribute from the button
                $notes.isotope({
                    filter: $this.attr("data-filter")
                });

            });
        });
        */
        $(window).on('load', function () {
            $('#company').find('.over').height($('#company').find('.container').height());
            $('.principio').owlCarousel({
                items: 1,
                responsiveClass: true,
                dots: false,
                autoplayTimeout: 5000,
                singleItem: true,
                rewindNav: false,
                autoplay: true,
                center: true,
                loop: true,
                mouseDrag: true,
                touchDrag: true,
                responsive: {0: {items: 1}, 450: {items: 1,}, 650: {items: 1,}, 991: {item: 1,},},
                nav: true,
                navText: ["<div class='owl-prevf sombraizquierda ' >" + "<i class='fa fa-chevron-left pull-left flecha flecha-izquierda '>" + "</i></div>", "<div class='owl-nextf sombraderecha ' >" + "<i class='fa fa-chevron-right pull-right flecha flecha-derecha '></i></div>"]
            });
            var $notes = $(".grid").removeClass('hidden').isotope({
                itemSelector: ".grid-item"
            });

            {{--// On filter button click--}}
            $(".filters-button-group .button").on("click", function (e) {
                var $this = $(this);

                {{--// Prevent default behaviour--}}
                e.preventDefault();

                {{--// Toggle the active class on the correct button--}}
                $(".filters-button-group .button").removeClass("is-checked");
                $this.addClass("is-checked");

                {{--// Get the filter data attribute from the button--}}
                $notes.isotope({
                    filter: $this.attr("data-filter")
                });

            });

        }).resize(function () {
            var w = $(window).width();
            var h = $(window).height();
            $('#company').find('.over').height($('#company').find('.container').height());
        });


        $(document).on('ready', function () {
            cargarimagenes();
            $('[data-toggle="popover"]').popover();
            {{--//called when key is pressed in textbox--}}
            $(".numbers").keypress(function (e) {
                {{--//if the letter is not digit then display error and don't type anything--}}
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    {{--//display error message
                    //$("#errmsg").html("Digits Only").show().fadeOut("slow");--}}
                        return false;
                }
            });
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        @if(empty($stud)) </script> @endif
@endif
