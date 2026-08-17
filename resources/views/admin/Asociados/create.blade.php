<?php
use App\Models\ControlAsociado;
$asocia = ControlAsociado::BuscarAsociado($user)->first();
if (empty($asocia)) {
    $asocia = new ControlAsociado();
    $asocia->setUser($user);
}
$persona = $user->Personal();
$country = $persona->getCountry();

?>
@extends('backend.layouts.base')
@section('title', trans('clientes.Tittle') )
@section('pagetitleadmin')

    @include('admin.topstud')

@endsection

@section('pagetitle')

@endsection
@section('topcss')
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>

    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/bootstrap-select.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <script>
        var pai = 0;
        var edo = 0;
    </script>

@endsection
@section('dd')

    {{--<script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>--}}



@endsection
@section('content')
    <form action="{!! route('Asociados.save') !!}" method="post" id="formulario" class="row">
        {!! csrf_field() !!}
        <input type="text" value="{!! $user->id !!}" name="id" class="hidden hidden-xs-up">
        <input type="text" value="{!! $asocia->id !!}" name="asocia" class="hidden hidden-xs-up">
        <input type="text" value="{!! $persona->id !!}" name="persona" class="hidden hidden-xs-up">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white row'>
                        <div class="col-12 col-md-9">
                            Datos del Usuario
                        </div>
                        <div class="col-3">
                            <a href=""></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 m-t-25 row">


                            <?php $campos = trans('asociados.campos'); ?>
                            @foreach($campos as $k=>$v)

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                    <div class="form-group row">
                                        <?php
                                        $texto = 'text';
                                        $class = '';
                                        if ($k == 'email') {
                                            $texto = $k;
                                        } elseif ($k == 'password') {
                                            $texto = $k;
                                        } elseif ($k == 'type') {
                                            $texto = 'number';
                                            $class = "numeric";

                                        } elseif ($k == 'active') {
                                            $texto = 'number';
                                            $class = "numeric";

                                        } elseif ($k == 'phone' or $k == 'ext') {
                                            $texto = 'number';
                                            $class = "numeric";

                                        }
                                        ?>

                                        @if($k !=  'country_code')
                                            <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                {!! $v !!}
                                            </label>
                                        @elseif($k !=  'country')
                                            <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                {!! $v !!}
                                            </label>
                                        @elseif($k ==  'password')
                                            @if(empty($user->id))
                                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                    {!! $v !!}
                                                </label>
                                            @endif

                                        @endif

                                        @if($k ==  'country')
                                            @include('backend.common.country',['seleccionado'=>$country])
                                        @elseif($k ==  'password')
                                            @if(empty($user->id))
                                                <div class="col-xs-10 col-sm-10 col-md-6">
                                                    <input type="{!! $texto !!}"
                                                           id="{!! $k !!}"
                                                           placeholder="{!! trans('asociados.placeholder.'.$k) !!}"
                                                           name="{!! $k !!}"
                                                           value=""
                                                           class="form-control {!! $class !!}"
                                                           required>

                                                </div>
                                                <div class="col-xs-12 ">&nbsp;</div>
                                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right m-t-10">
                                                    Repetir Password
                                                </label>
                                                <div class="col-xs-10 col-sm-10 col-md-6 m-t-10">
                                                    <input type="{!! $texto !!}"
                                                           id="{!! 'repeat_'.$k !!}"
                                                           placeholder="{!! trans('asociados.placeholder.'.$k) !!}"
                                                           name="{!! 'repeat_'.$k !!}"
                                                           value=""
                                                           class="form-control {!! $class !!}"
                                                           required>

                                                </div>
                                            @endif

                                        @else

                                            <div class="col-xs-10 col-sm-10 col-md-6">
                                                <input type="{!! $texto !!}"
                                                       id="{!! $k !!}"
                                                       placeholder="{!! trans('asociados.placeholder.'.$k) !!}"
                                                       name="{!! $k !!}"
                                                       value="{{$user->{$k} }}"
                                                       class="form-control {!! $class !!}"
                                                       required>

                                            </div>
                                        @endif

                                    </div>
                                </div>
                            @endforeach
                            <div class="offset-3 col-6  text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <input type="submit" value="{!!  trans('users.save') !!}"
                                               class=" btn btn-block btn-success glow_button">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{---------------------------------}}
        {{---------------------------------}}
        {{---------------------------------}}
        {{---------------------------------}}
        {{---------------------------------}}

        {{--
        {!! dd($asocia) !!}
        --}}


        <div class="col-md-12 m-t-35">
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        Opciones
                    </div>
                    <div class="row">
                        <div class="col-12 m-t-25 row">

                            {{--Codigo--}}
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="col-12 text-center">
                                    <label for="">Codigo de referido</label>
                                </div>
                                <div class=" col-12 row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                        <div class="form-group row">


                                            <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                                Codigo de referencia
                                            </label>


                                            <div class="col-xs-10 col-sm-10 col-md-6">
                                                <input type="text"
                                                       id="codigo}"
                                                       placeholder=""
                                                       name="codigo"
                                                       value="{{$asocia->codigo }}" class="form-control "
                                                       required>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--Codigo--}}
                            {{--Paises--}}
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="col-12 text-center">
                                    <label for="">Paises Asociados a este usuario</label>
                                </div>
                                <div class=" col-12 row">
                                    <?php
                                    $paises = \App\Http\Controllers\PublicController::ArrayPais();
                                    $colpais = " col-3 col-xs-12 col-xl-2 col-lg-2 col-md-4 text-left ";
                                    $asic = $asocia->getPaises();
                                    //dd($asic);
                                    ?>
                                    @foreach($paises as $k=>$v)
                                        <?php
                                        $id = $v['id'];
                                        $selec = 0;

                                        $name = $v['name'];
                                        $flag = null;
                                        $dest = null;
                                        if ($id != 0) {
                                            $dest = Country::find($id);
                                            if (!empty($dest)) {
                                                $flag = $dest->flag;
                                            }
                                        }

                                        ?>
                                        @if($id!=0)
                                            <div class="{!! $colpais !!}">

                                                <input type="checkbox" name="pais[]" value="{!! $id !!}"
                                                       @if(in_array($id,$asic)) checked="checked" @endif
                                                       id="pais_{!! $id !!}">
                                                <label for="pais_{!! $id !!}">
                                                    <img src="{!! $flag !!}" alt="{!! $name !!}"
                                                         class="img-fluid image-responsive"
                                                         style="    height: 40px; width: 80px;">
                                                    <br>
                                                    {!! $name !!}

                                                </label>
                                            </div>
                                        @endif


                                    @endforeach

                                </div>
                            </div>
                            {{--Paises--}}

                            <div class="offset-3 col-6  text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <input type="submit" value="{!!  trans('users.save') !!}"
                                               class=" btn btn-block btn-success glow_button">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
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
        $('#tosold').change(function () {
            if ($(this).is(":checked")) {
                console.log('check');
                $('#cardsell').removeClass('hidden-xl-down');
                return null;
            }
            $('#cardsell').addClass('hidden-xl-down');
            return null;
            /*
            $('#textbox1').val($(this).is(':checked'));
            */
        });
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
    </script>

@endsection
