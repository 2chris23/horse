@php($escritorio = Agent::isDesktop())
@php($tiempoanimacion = (6*1000))

@if(!empty($stud))
    @php($colorcoorp = $stud->getColor())
    @if(empty($stud))
        <script>
                    @endif
            var token = "{!! csrf_token() !!}";
            var notes, pai = 0, edo = 0;

            function moveon() {
                var w = $(window).width(), wa = $('.hola1').width(), v = (w - wa) / 2;
                $('.hola1').css('left', v);
            }

            $(document).on('ready', function () {
                moveon();
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
            });

            function mostrarrecomendar(el) {
                modalshow(el);
            }

            function move440() {
                var e = $('.corte-440'), b = $(e).find('img');
                $(e).height($(b).height());
            }

            function sociales() {
                var w = $(window).width();
                var h = $(window).height();
                var tsd = $('#parallax').find('.slick-list');
                var tsf = $('#parallax').find('.hola1');
                $(tsd).css('top', '80px');
                /*
                $.each(tsf, function (k, v) {
                    $(v).attr('style', ' ').css('position', 'absolute').css('left', '0px').css('top', '50%');
               });
                */
                @if($escritorio!=false)
                if (w <= 425) {
                    $("#SocialShare").css('top', 'unset').css('width', 'auto').css('z-index', '5').css('bottom', '1px').css('position', 'fixed')
                        .css('right', 'unset');
                    /*
                                                $.each(tsf, function (k, v) {
                                                    $(v).attr('style', ' ').css('position', 'absolute').css('left', '0px').css('top', '50%');
                                               });
                                                */

                } else {
                    $("#SocialShare").attr('style', ' ');

                }
                @endif

            }

            function reloade(url) {
                window.location.href = url;
            }

            function changelan(id) {
                var url = '{!! route('lengauje') !!}/' + id;
                window.location.replace(url);
            }

            function playy() {
                {{--
                        var s = $(".fa-youtube-play");
                        $.each(s, function (k, v) {
                            var ts = $(v).closest('div').find('img');
                            var hi = $(ts).height();
                            var hv = $(v).height();
                            var wi = $(ts).width();
                            var wv = $(v).width();
                            var h2 = (hi)/2;
                            var w2 = (wi)/2;
                            console.error("-----");
                            console.log('h ' + $(ts).height() + " // " + $(v).height() + " // " + ($(v).height()+$(ts).height()));
                            console.log('h ' + hi + " // " + hv + " // " + h2);
                            console.log('h ' + $(ts).height() + " // " + $(v).height() + " // " + ($(v).height()+$(ts).height()));
                            console.log('h ' + wi + " // " + wv + " // " + w2);
                            $(v).css('top', h2 + 'px')
                                .css('left', w2 + 'px')
                            ;
                        });
--}}
            }

            function filtrado(clase) {
                console.dir(clase);
                if (filtered != false) {
                    console.error('Filtered es distinto falso');
                    $('.grid').slick('slickUnfilter');
                    limpiarclase();
                    filtered = false;
                    console.error(filtered);
                }
                if (filtered == false) {
                    console.error('Filtered es falso');
                    $('.grid').slick('slickFilter', clase);
                    limpiarclase();
                    filtered = true;
                } else {
                    console.error('Filtered es diferente falso ' + filtered);

                    $('.grid').slick('slickUnfilter');
                    limpiarclase();
                    filtered = false;
                }

            }

            function limpiarclase() {
                var s = $('.grid-item');
                $.each(s, function (k, v) {
                    $(v).removeClass('hidden');
                });
            }

            function ocultarclase(clase) {
                var s = $('.grid-item');
                clase = clase.replace('.', '');
                {{--//$(s).addClass('hidden');--}}
                $.each(s, function (k, v) {
                    /* busvar clase y evaluar si la clase esta*/
                    if ($(v).hasClass(clase)) {
                        $(v).removeClass('hidden');
                    } else {
                        $(v).addClass('hidden');
                    }
                });

            }

            sociales();
            playy();
            moveon();
            move440();
                    $(window).on('load', function () {

                        notes = $(".grids").removeClass('hidden').isotope({
                            itemSelector: ".grids-item",

                            sortBy: 'random',
                            resizable: true,
                        });
                        var w = $(window).width();
                        var h = $(window).height();

                        sociales();
                        playy();
                        moveon();
                        move440();
                    }).resize(function () {
                        move440();
                        playy();
                        sociales();
                        moveon();
                    });
                    if ($('.cab-slider').val() !== undefined) {
                        $('.cab-slider').slick({
                            animating: true,

                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true,
                            autoplaySpeed: 4000,
                        }).removeClass('hidden').slickAnimation();
                    }

                    if ($('.grid').val() !== undefined) {
                        $('.grid').slick({
                            slidesToShow: 3,
                            {{-- @if($escritorio!=true)
                        rows: 1,
                        @else
                        rows: 2,
                        @endif--}}
                            rows: 1,
                            slidesToScroll: 1,
                            prevNext: true,
                            arrows: true,
                            dots: true,
                            infinite: false,
                            responsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        infinite: false,

                                        rows: 1,
                                    }
                                },
                                {
                                    breakpoint: 770,
                                    settings: {
                                        slidesToShow: 2,

                                        rows: 1,
                                        slidesToScroll: 1,
                                        infinite: false,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,

                                        rows: 1,
                                        slidesToScroll: 1,
                                        infinite: false,
                                    }
                                },
                            ]
                        }).removeClass('hidden'){{--.slickAnimation()--}};
                    }


            var elemento = $('.grid-item');
            $.each(elemento, function (k, v) {
                var sa = $(v).attr('data-type');
                $(v).parent().parent().addClass(sa);
            });

                    if ($('.gal-videos').val() !== undefined) {
                        $('.gal-videos').slick({
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            autoplay: true,
                            autoplaySpeed: {!! $tiempoanimacion !!},
                            responsive: [
                                /* {
                                     breakpoint:1024,
                                     settings: {
                                         slidesToShow: 2,
                                         slidesToScroll: 2,
                                     }
                                 },*/
                                {
                                    breakpoint: 769,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 2,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                },
                            ]
                        }).removeClass('hidden').slickAnimation();
                    }
                    if ($('.carousel-inner').val() !== undefined) {
                        $('.carousel-inner').slick({
                            /*dots: false,
                            lazyLoad: 'ondemand',
                            */
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            autoplay: true,
                            autoplaySpeed: {!! $tiempoanimacion !!},
                            infinite: true,
                            arrows: true,

                            responsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 4,

                                    }
                                },
                                {
                                    breakpoint: 760,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 3
                                    }
                                },
                                {
                                    breakpoint: 600,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 2
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        }).removeClass('hidden').slickAnimation();
                    }
                    if ($('.cab-carousel').val() !== undefined) {
                        $('.cab-carousel').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true,
                            autoplaySpeed: 2000,
                            resoponsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 6,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                },
                            ]
                        }).removeClass('hidden').slickAnimation();
                    }
            /*$('.slickanimate’).slickAnimation()*/
                    if ($('.cab-carousel2').val() !== undefined) {
                        $('.cab-carousel2').slick({
                            slidesToShow: 6,
                            slidesToScroll: 6,
                            autoplay: true,
                            autoplaySpeed: {!! $tiempoanimacion !!},
                            resoponsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 6,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                },
                            ]
                        }).removeClass('hidden').slickAnimation();
                    }

            {{--
            $("#SocialShare").jsSocials({
                url: "{!! route('MyPageBase',['slug'=>$stud->slug]) !!}",
                text: '{!! $stud->getName() !!}',
                showLabel: false,
                showCount: "inside",
                shares: ["email",
                "twitter",
                 "facebook",
                 "googleplus",
                 "linkedin",
                 "pinterest",
                 "stumbleupon",
                 "whatsapp",
                 "telegram",
                 "viber",
                 "pocket",
                 "messenger",
                 "vkontakte"
                ]
            });
--}}
            /*
            $.each($('.animateslick'),function(k,v){
            $(v).slickAnimation();
                        });
            */

                    $(function () {
                        $('#contact').validate({
                            rules: {
                                name: {
                                    required: true,
                                    minlength: 2
                                },
                                email: {
                                    required: true,
                                    email: true
                                },
                                message: {
                                    required: true
                                }
                            },
                            messages: {
                                name: {
                                    required: "Por favor, ingrese su nombre",
                                    minlength: "Su nombre debe consistir de al menos 2 caracteres"
                                },
                                email: {
                                    required: "Por favor, agregue su dirección de email."
                                },
                                message: {
                                    required: "Por favor, ingrese su mensaje.",
                                    minlength: "Su mensaje es muy corto"
                                }
                            },
                            submitHandler: function (form) {
                                $(form).ajaxSubmit({
                                    type: "POST",
                                    data: $(form).serialize(),
                                    url: "{!! route('contacto.accion') !!}",
                                    success: function () {
                                        $('#contact :input').attr('disabled', 'disabled');
                                        $('#contact').fadeTo("slow", 0.15, function () {
                                            $(this).find(':input').attr('disabled', 'disabled');
                                            $(this).find('label').css('cursor', 'default');
                                            $('#success').fadeIn();
                                        });
                                    },
                                    error: function () {
                                        $('#contact').fadeTo("slow", 0.15, function () {
                                            $('#error').fadeIn();
                                        });
                                    }
                                });
                            }
                        });
                    });

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

            @if(empty($stud))
        </script>
    @endif
@endif