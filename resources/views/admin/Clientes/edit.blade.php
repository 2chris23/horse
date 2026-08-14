@extends('backend.layouts.base')
@section('title', trans('clientes.Tittle') )
@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('clientes.new') )
@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>

    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/bootstrap-select.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>


@endsection
@section('dd')

    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>--}}



@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('clientes.clientdataedit',['name'=>$cliente->getStud()]) !!}
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        <form action="" id="formulario" class="row">
                            <input type="hidden"
                                   id="id"
                                   name="id"
                                   value="{{$cliente->id }}" class="form-control">
                            {{--nombre--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.name')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('clientes.placeholder.name')}}"
                                               id="input_cliente_name"
                                               name="name"
                                               value="{{$cliente->getName() }}" class="form-control">

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        Yeguada :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{!! trans('clientes.studplaceholder') !!}"
                                               id="stud"
                                               name="stud"
                                               value="{{$cliente->getStud() }}" class="form-control">

                                    </div>
                                </div>
                            </div>

                            {{--correo--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.email')}} :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="email" placeholder="{{trans('clientes.placeholder.email')}}"
                                               id="input_cliente_email"
                                               name="email"
                                               value="{{$cliente->getEmail() }}" class="form-control">

                                    </div>
                                </div>
                            </div>
                            {{--Localidad aqui --}}
                            @include('backend.common.country',['seleccionado'=>$cliente->country_id])
                            @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state')])
                            @include('backend.common.city',['city'=> $cliente->city ])
                            {{--direccion--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.address')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('clientes.placeholder.address')}}"
                                               id="address"
                                               name="address"
                                               value="{{$cliente->getAddress() }}" class="form-control">

                                    </div>
                                </div>
                            </div>

                            {{--telefono 1--}}
                            @foreach( $cliente->getPhoneModel() as $k => $v )
                                @include('backend.common.phone',[
                                'numero' => $v->getPhone(),
                                'nombre' => 'input_stud_phone[]',
                                'texto'  => trans('stud.text.phone'),
                                'place' => trans('clientes.placeholder.phone'),
          'pais'  => $v->getCountryCode(), 'id'=>$v->id, ])
                            @endforeach

                            @if(count($cliente->getPhoneModel()) <3)
                                <?php $p = count($cliente->getPhoneModel()); ?>
                                @for($i=$p;$i<5;$i++)
                                    <?php $v = $cliente->getNewPhone(); ?>
                                    @php
                                            try{
                                            $s = $v->getExt();
                                            }catch(\ErrorException $e){

                                            $s = null;
                                            }
                                    @endphp


                                    @include('backend.common.phone',[
'numero' => $v->getPhone(),
'nombre' => 'input_stud_phone[]',
'texto'  => trans('stud.text.phone'),
'place' => trans('stud.placeholder.phone'),
'pais'  => $v->getCountryCode(),
'id'=>$v->id,
'exte'=>$s,
])

                                @endfor
                            @endif

                            @include('backend.common.RedesSociales',[
                            'facebook'=>$cliente->getFacebook()->getUrl(),
                            'youtube'=>$cliente->getYoutube()->getUrl(),
                            'twitter'=>$cliente->getTwitter()->getUrl(),
                            'instagram'=>$cliente->getInstagram()->getUrl(),
                            'pinterest'=>$cliente->getPinterest()->getUrl(),
                            ])
                            {{--TIENE SITIO WEB BOOLEANO URL--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.url')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <button type="button" id="web_si"
                                                class=" btn btn-labeled btn-success {!! ($cliente->getUrl() == true )?'':'hidden-xl-down' !!} "

                                        >

                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            {{trans('text.yes')}}
                                        </button>
                                        <button type="button" id="web_no"
                                                class=" btn btn-labeled btn-danger {!! ($cliente->getUrl() == false)?'':'hidden-xl-down' !!} ">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"></i>
                                                </span>
                                            {{trans('text.no')}}
                                        </button>


                                        <input type="hidden" placeholder="{{trans('clientes.placeholder.url')}}"
                                               id="input_cliente_url"
                                               name="url"
                                               value="{{$cliente->getUrl() }}" class="form-control">

                                    </div>
                                </div>
                            </div>
                            {{--URL SI TIENE SITE--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.site')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('clientes.placeholder.site')}}"
                                               name="site"
                                               id="input_cliente_site"
                                               value="{{$cliente->getSite() }}" class="form-control">

                                    </div>
                                </div>
                            </div>

                            {{--BOTON--}}
                            <div class="offset-3 col-6  text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <a href="#" onclick="savedata()"
                                           class=" btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{$cliente->id}}" id="cliente_id" name="cliente_id"
                                   class="form-control">


                        </form>

                        {{--
                        <form action="{!! route('clientes.store') !!}" method="post" id="form_horse">
                            <input type="hidden" value="{{$cliente_id}}" id="cliente_id" class="form-control">
                        </form>
                        --}}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script>
        var pai = {!! $cliente->getCountryId() !!};
        var edo = {!! $cliente->getStateId() !!};

    </script>
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>

        function telefono(el) {

        }

        function savedata() {
            clearnumber('');
            var formElement = document.getElementById("formulario");
            var form = new FormData(formElement);
            /*
            if (s === true) {
                doma = false;
            } else {
                doma = true;
            }
            if (d === true) {
                tosold = false;
            } else {
                tosold = true;
            }
*/
            axios.post('{!! route('clientes.store') !!}', form)
                .then(function (response) {
                    var r = response.data;
                    cliente_id = r.id;
                    $('#cliente_id').val(cliente_id);
                    //$('.fileinput-upload-button').click();


                    //$('.btn-drp-caballo').click();
                    swal(
                        '{!! trans('users.applychange') !!}',
                        r.sms,
                        'success'
                    )
                    //window.location.href = '{!! route('clientes.index') !!}';

               })
 .catch(function (error) {
                    //var err = eval(xhr.responseText.sms);
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });
        };
        $('#web_si').on('click', function (e) {
            $('#web_si').addClass('hidden-xl-down').prop('checked', false);
            $('#web_no').removeClass('hidden-xl-down').prop('checked', true);
            $('#input_cliente_url').val(0);
        });
        $('#web_no').on('click', function (e) {

            $('#web_no').addClass('hidden-xl-down').prop('checked', false);
            $('#web_si').removeClass('hidden-xl-down').prop('checked', true);
            $('#input_cliente_url').val(1);
        });

        $(window).on('load', function () {
            console.log("TERMINO DE CARGAR")
       });
        $(".telefonos").intlTelInput({
            // allowDropdown: false,
            // autoHideDialCode: false,
            // autoPlaceholder: "off",
            // dropdownContainer: "body",
            // excludeCountries: ["us"],
            // formatOnDisplay: false,
            /*
            geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            */
            //hiddenInput: "full_number",
            {{--
                 @if($user->getCountryCode()!= null)
                initialCountry: "{!! $user->getCountryCode() !!}",
                 @endif
                 --}}
            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            //preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
            initialCountry: "es",
            preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
            separateDialCode: true,
            utilsScript: "{!! url('phone/js/utils.js') !!}"

        });
        $(window).on('load',function(){
            $("select").select2({
                placeholder: "{!! trans('users.chooseone') !!}",
                allowClear: true,
                width: '100%'
            });
       });
    </script>

@endsection