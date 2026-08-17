@php($escritorio = Agent::isDesktop())
@php($tiempoanimacion = (6*1000))

@if(!empty($stud))
    @php($colorcoorp = $stud->getColor())
    @if(empty($stud))
        <script>
                    @endif





            var s = undefined;
            $(document).ready(function () {
                s = $('.slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    arrows: false,
                    dots: false,
                });
            });

            /*
                        $('#modalcontact').modal('show');
                        */



            @if(empty($stud))
        </script>
    @endif
@endif
