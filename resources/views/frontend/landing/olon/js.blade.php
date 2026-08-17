@php($cd = null)
@if(!empty($cd))
    <script>
        @endif


(function ($) {
    "use strict";
    $(document).ready(function ($) {
        /*----- Mobile Menu -----*/
        $('.mobile-menu nav').meanmenu({
            meanScreenWidth: "990",
            meanMenuContainer: ".mobile-menu",
        });

        /*----- main slider -----*/
        $('#mainSlider').nivoSlider({
            directionNav: false,
            animSpeed: 500,
            slices: 18,
            pauseTime: 1111115000,
            pauseOnHover: false,
            controlNav: true,
            prevText: '<i class="fa fa-angle-left nivo-prev-icon"></i>',
            nextText: '<i class="fa fa-angle-right nivo-next-icon"></i>'
        });

        /*Owl Carousel for Weekly Featured Products*/
        $(".feature-pro-slider, .related-pro-slider").owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 1,},
                480: {items: 2,},
                750: {items: 3,},
                950: {items: 4,},
                1170: {items: 4,},
            }
        });
        /*Owl Carousel for Weekly Featured Products*/
        $(".tab-pro-slider").owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 1,},
                480: {items: 2,},
                750: {items: 3,},
                950: {items: 4,},
                1170: {items: 4,},
            }
        });
        /*Owl Carousel for Weekly Featured Products*/
        $(".tab-pro-slider-2").owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 1,},
                480: {items: 2,},
                750: {items: 3,},
            }
        });
        $(".trendy-product-slider").owlCarousel({
            loop: true,
            nav: false,
            margin: 20,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 2,},
                480: {items: 2,},
                750: {items: 4,},
                950: {items: 2,},
                1170: {items: 2,},
            }
        });
        /*Owl Carousel for blog*/
        $(".blog-slider").owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 1,},
                750: {items: 2,},
                1170: {items: 3,},
            }
        });

        $('.funfact').appear(function () {
            $('.timer').countTo({
                speed: 3000
            });
        });
        /*Owl Carousel for Testimonial*/
        $(".testimonial-slider").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });
        /*Owl Carousel for Brand*/
        $(".brand-slider").owlCarousel({
            loop: true,
            nav: false,
            margin: 30,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {items: 2,},
                750: {items: 4,},
                950: {items: 5,},
            }
        });
        /*----- Scroll Up -----*/
        $.scrollUp({
            scrollText: '<i class="fa fa-chevron-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade'
        });

        $('#portfolio').mixItUp();

        /*-- Work PopUp --*/
        $('.port-wrap .hover').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-with-zoom',
        });

        /*----- Cart Plus Minus Button -----*/
        $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
        $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
        $(".qtybutton").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                /* Don't allow decrementing below zero*/
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find("input").val(newVal);
        });

        /*----- Check Out Accordion -----*/
        $(".panel-heading a").on("click", function () {
            $(".panel-heading a").removeClass("active");
            $(this).addClass("active");
        });
        /*----- Simple Lens -----*/
        $('.simpleLens-lens-image').simpleLens({
            loading_image: 'img/loading.gif'
        });

        /*----- Price Slider -----*/
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 800,
            values: [50, 550],
            slide: function (event, ui) {
                $("#price-amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#price-amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));

        $('.newslater-container .close').on("click", function () {
            $('#popup-newslater').addClass('hidden');
        });

    });

})(jQuery);

        {{--
        function changelan(id) {
            var url = '{!! route('lengauje') !!}/' + id;
            console.log(url);
            window.location.replace(url);
        }


        function cargarimagenes() {
            $(function () {
                $.each(document.images, function () {
                    var this_image = this;
                    var src = $(this_image).attr('src') || '';
                    if (!src.length > 0) {
                        
                        this_image.src = options.loading; 
                        show loading
                        
                        
                        var lsrc = $(this_image).attr('lsrc') || '';
                        if (lsrc.length > 0) {
                            $(this_image).removeClass('hidden');
                            var img = new Image();
                            img.src = lsrc;
                            $(img).load(function () {
                                this_image.src = this.src;
                            });
                        }
                    }
                });
            });
        }

        $('.popup-img').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
        $('.video-link').magnificPopup({
            type: 'iframe'
        });


        $(window).on('load',function(){
            cargarimagenes();
             $(".gallery").removeClass('hidden').isotope({
                itemSelector: ".gallery-item",

                sortBy: 'random',
                resizable: true,
            });
        });
        --}}

        function cargarimagenes() {
            $(function () {
                $.each(document.images, function () {
                    var this_image = this;
                    var src = $(this_image).attr('src') || '';
                    if (!src.length > 0) {
                                {{--this_image.src = options.loading;  show loading--}}
                        var lsrc = $(this_image).attr('lsrc') || '';
                        if (lsrc.length > 0) {
                            $(this_image).removeClass('hidden');
                            var img = new Image();
                            img.src = lsrc;
                            $(img).load(function () {
                                this_image.src = this.src;
                            });
                        }
                    }
                });
            });
            $(".gallery").removeClass('hidden').isotope({
                itemSelector: ".gallery-item",
                sortBy: 'random',
                resizable: true,
            });
        }

        $('.popup-img').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
        $('.video-link').magnificPopup({
            type: 'iframe'
        });

        $('.mone').on('click', function () {
            $(this).tooltip('enable').tooltip('open');
        });
        /*
                $(v).attr('data-title', r).attr('title', r)
                    .tooltip({
                        html: true,
                        title: r,
                        placement: "auto",
                        track: true,
                        content: function () {
                            return $(this).prop('title');
                        },
                        open: function (event, ui) {
                            ui.tooltip.animate({top: ui.tooltip.position().top + 10}, "fast");
                        },
                        position: {
{{--
                    my: "center bottom-20",
                    at: "center bottom",
                    --}}
        / *
        using: function (position, feedback) {
            $(this).css(position);
            $("<div>")
                .addClass("arrow")
                .addClass(feedback.vertical)
                .addClass(feedback.horizontal)
                .appendTo(this);
        }
        * /
    }
});
*/
        $(window).on('load', function () {
            cargarimagenes();
            var s = $('.pro-name-price-ratting');
            $.each(s, function (k, v) {
                var ds = $(v).find('.product-img-hover');
                var dsa = $(v).find('.pro-name-price-ratting');
                $(ds).css('position', 'relative').css('height', '173px');
                $(dsa).css('position', ' absolute').css('top', ' 173px').css('padding-bottom', ' 36px');
            });
            $('.featured-product').find('.owl-item').css('height', '250px');

        });

        @if(!empty($cd))
    </script>
@endif