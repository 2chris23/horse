@extends('backend.layouts.base')
@section('title', trans('users.Tittle') )
@section('content')
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>

    <div id="datos1" class="card col-12">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.text.create_title') !!}
            </div>

            <form action="{!! route('usuario.save') !!}" id="formulario" method="POST" class="row">
                {!! csrf_field() !!}
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Nombre:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="text" placeholder="{{trans('clientes.placeholder.name')}}"
                                   id="name"
                                   name="name"
                                   value="" class="form-control" required>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Correo :
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="email" placeholder="{{trans('clientes.placeholder.name')}}"
                                   id="email"
                                   name="email"
                                   value="" class="form-control" required>
                        </div>
                    </div>
                </div>
                @include('backend.common.phone',[
'numero' => '',
'nombre' => 'input_stud_phone[]',
'texto'  => trans('stud.text.phone'),
'place' => trans('stud.placeholder.phone'),
])
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center ">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Yeguada:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="text" placeholder="{{trans('clientes.placeholder.stud')}}"
                                   id="stud"
                                   name="stud"
                                   value="" class="form-control" required>

                        </div>
                    </div>
                </div>
                {{--BOTON--}}
                <div class="offset-3 col-6  text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a
                                    class=" btn btn-block btn-success glow_button" onclick="Guardar">{!! trans('users.save') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
@section('bottomjs')
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>
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

        function Guardar() {
            clearnumber('');
            var url = '{!! route('usuario.save') !!}';
            var form = new FormData(document.getElementById('formulario'))
            axios.post(url, form)
                .then(function (response) {
                    var r = response.data;
                    var dir = r.url;
                    window.location.assign(dir);
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
        }
    </script>
@endsection