@php($escritorio = Agent::isDesktop())
@php($tiempoanimacion = (6*1000))

@if(!empty($stud))
    @php($colorcoorp = $stud->getColor())
    @if(empty($stud))
        <script>
            @endif

            $(function () {

                var $el = $('#baraja-el'),
                    baraja = $el.baraja();

                /* navigation */
                $('#nav-prev').on('click', function (event) {

                    baraja.previous();

                });

                $('#nav-next').on('click', function (event) {

                    baraja.next();

                });

            });
            $(document).ready(function () {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,

                    fixedContentPos: false
                });
                $('.popup-img').magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
                var $notes = $(".g-pho").isotope({
                    itemSelector: ".photo"
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