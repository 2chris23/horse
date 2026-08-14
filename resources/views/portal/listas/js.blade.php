<?php $cd = null; ?>
@if(!empty($cd))
    <script>
                @endif


                <?php $pricemint = (isset($pricemin) and ($pricemin!=0) ) ?$pricemin:3000; ?>
                <?php $pricemaxt = (isset($pricemax)and ($pricemax!=0 ) )  ?$pricemax:20000; ?>
                <?php $preciomax = Horse::where('tosold',1)->max('price'); ?>
                <?php $raisedmint = (isset($raisedmin) and ($raisedmin!=0) )?$raisedmin:50; ?>
                <?php $raisedmaxt = (isset($raisedmax) and ($raisedmax!=0) )?$raisedmax:150; ?>
                <?php $alturamax = Horse::where('tosold',1)->max('raised'); ?>

        var horses = null;
        var start = 0;
        var $countr = $("#country");
        var $st = $("#state");
        var $colo = $(".coloress");

        function Envio(page) {

            if (start === 0) return null;
            $('#horsesplace').fadeToggle('slow').html('');

            $.ajax({
                url: '?page=' + page + "&" + $('form').serialize(),
                data: {page: page},
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: 'json',
                processData: true,
                type: 'POST',
                success: function (data) {
                    LimpiarTool();
                    var s = data.el;
                    $('#horsesplace').html(s).fadeToggle('slow');
                    $('#pagination').html(data.pag);
                    $('#mostrando').html(data.mostrando);
                    var t = $('#horsesplace').height() + 50;
                    $('#fieldhorses').height(t);

                    $('html, body').animate({
                        scrollTop: $("#showing").offset().top
                    }, 1000);
                    ObtenerPrecios();
                },
                error: function (data) {
                }
            });
        }


        function serial() {
            var s = $('form').serialize();

        }


        function limpiaractivo() {
            var sd = $('.pagination li');
            $.each(sd, function (k, v) {
                $(v).removeClass('active');
            });
        }

        function setOrden(ordem) {
            $('#orden').val(ordem);
            $('#sending').click();

        }

        function SetRaised() {
            $('#raisedmin').val($('#price-min-h').html());
        }

        function SetRaisedh() {
            $('#raisedmax').val($('#price-max-h').html());
        }

        function SetPrice() {
            $('#pricemin').val($('#price-min').html());

        }

        function SetPriceh() {
            $('#pricemax').val($('#price-max').html());
        }

        function LimpiarTool() {
            return null;
            if (tools.length != 0) {
                var s = tools.pop();
                /*$(s).tooltipster('destroy');*/
                LimpiarTool();
            }
        }

        @if(!empty($country))
        $(window).on('ready', function () {
            /*$('#country').val({!! $country !!}).trigger('change');*/
            @if(!empty($state))

            $('#color').val([
                @foreach($state as $k=>$v)
                {!! $v !!},
                @endforeach]).trigger('change');


            @endif
        });
        @endif
        @if(!empty($color))
        $(window).on('load', function () {
            $('#color').val([
                @foreach($color as $k=>$v)
                {!! $v !!},
                @endforeach]).trigger('change');

        });
                @endif

        var rr = 0;
        $(".morera").on('click', function () {
            var t = $('.second-class').length;
            var f = $('.ocultable').length;
            if (t !== 0 && rr === 0) {
                $('.second-class').addClass('ocultable').removeClass('second-class');
                rr = 1;
            }
            else if (rr !== 0) {
                rr = 0;
                $('.ocultable').addClass('second-class').removeClass('ocultable')
            }
        });
        var rp = 0;
        $(".morerap").on('click', function () {
            var t = $('.second-classp').length;
            var f = $('.ocultablep').length;
            if (t !== 0 && rp === 0) {
                $('.second-classp').addClass('ocultablep').removeClass('second-classp');
                rp = 1;
            }
            else if (rp !== 0) {
                rp = 0;
                $('.ocultablep').addClass('second-classp').removeClass('ocultablep')
            }
        });


        var ra = $('#price-slider-h').noUiSlider({
            connect: true,
            behaviour: 'tap',
            margin: 20,
            start: [{!! $raisedmint !!}, {!! $raisedmaxt !!}],
            step: 10,
            range: {
                'min': 0,
                @if(!empty($alturamax))
                'max': {!! $alturamax+20 !!},
                @else
                'max': 220,
                @endif
            },
        }).on('change', function (values, handle) {
            $('#raisedmin').val(handle[0]);
            $('#raisedmax').val(handle[1]);
            Envio(1);

        });
        $('#price-slider-h').Link('lower').to($('#price-min-h'), null, wNumb({
            decimals: 0
        }));
        $('#price-slider-h').Link('upper').to($('#price-max-h'), null, wNumb({
            decimals: 0
        }));

        $('#price-slider').noUiSlider({
            connect: true,
            behaviour: 'tap',
            margin: 5000,
            start: [{!! $pricemint !!}, {!! $pricemaxt !!}],
            step: 1500,
            range: {
                'min': 0,
                @if(!empty($preciomax))
                'max': {!! $preciomax +3000 !!},
                @else
                'max': 30000,
                @endif
            }, slide: function (event, ui) {
                $('#pricemin').val($('#price-min').html());
                $('#pricemax').val($('#price-max').html());
                Envio(1);

            },
            change: function (event, ui) {
                $('#pricemin').val($('#price-min').html());
                $('#pricemax').val($('#price-max').html());
                Envio(1);
            }
        }).on('change', function (values, handle) {

            $('#pricemin').val(handle[0]);
            $('#pricemax').val(handle[1]);
            Envio(1);

        });

        $('#price-slider').Link('lower').to($('#price-min'), null, wNumb({
            decimals: 0
        }));
        $('#price-slider').Link('upper').to($('#price-max'), null, wNumb({
            decimals: 0
        }));


        {{--
        $(document).on('click', '#busqueda li', function (e) {
            Envio(1);
        });
        --}}

        /*$(window).on('load', function () {*/
        /*$(document).on('ready', function () {*/


        $('.select').select2({
            closeOnSelect: false,
            tags: true,
            tokenSeparators: [',', ' '],
        });
        $('.noUi-handle-lower').on('click', function () {
            SetPrice();
        });

        $('#sending').on('click', function (e) {
            /*console.log('sendig');*/
            e.preventDefault();
            Envio(1);
        });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            Envio(page);

        });
        $('span.page-link').on('click', function () {
            var s = $(this).html();
            if (s === '1') {
                var page = 1;
                Envio(page);
            }
        });


        $(document).on('click', '#busqueda select', function (e) {
            Envio(1);
        });
        $('input').on('ifChanged', function (event) {
            Envio(1);
        });


        {{--
        $countr.on("select2:close", function (e) { console.log("select2:close", e); });
        $countr.on("select2:unselect", function (e) { console.log("select2:unselect", e); });
        $countr.on("select2:open", function (e) { console.log("select2:open", e); });
        --}}
                /*
            $countr.on("select2:select", function (e) {
                Envio(1);
            }).on("change", function (e) {
                Envio(1);
            });
            */
        $colo.on("select2:select", function (e) {
            Envio(1);
        }).on("change", function (e) {
            Envio(1);
        });
        $st.on("select2:select", function (e) {
            Envio(1);
        }).on("change", function (e) {
            Envio(1);
        });


        start = 1;


        /*});*/


        @if(!empty($cd))
    </script>
@endif