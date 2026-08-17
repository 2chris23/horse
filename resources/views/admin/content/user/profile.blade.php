@extends('backend.layouts.base')
@section('title', trans('users.Tittle') )
@section('pagetitle')

@endsection
@section('pagetitleadmin')

    @include('admin.topstud')
    {{--
    <div class="row col-12 m-t-25">
        <div class="col-8"></div>
        <div class="col-3 pull-right">
            <a class="btn btn-warning pull-right" href="{!! route('yeguadas.show',['id'=>$stud->id]) !!}">
                {!! trans('users.return') !!}
            </a>
        </div>
    </div>
    --}}

@endsection


{{--@section('pagetitle', '<i class="fa fa-user"></i>'.trans('stud.new') )--}}
@section('topcss')

    {{--}}
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
{{--<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>--}}
    {{--
<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>
--}}
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>

    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>


    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--
        <link type="text/css" rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    --}}
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <script>
        var url = "{!! route('usuario.update') !!}";
    </script>
@endsection
@section('topjs')
    <script>
        var pai = {!! $personal->getCountry() !!};
        var edo = {!! $personal->getState() !!};

    </script>
    {{--
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    --}}
@endsection
@section('content')


    <div class="card">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('users.tittlelogdata') !!}
            </div>
            <div class="row">
                <div class="col-12 m-t-25">
                    <form class="row" id="ingreso">
                        <input type="hidden" value="0" id="tipo" name="tipo" class="form-control">
                        <input type="hidden" value="{{$personal->id}}" id="personal_id" persona="personal_id"
                               class="form-control">
                        <input type="hidden" value="{{$usuario->id}}" id="user_id" name="user_id" class="form-control">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('users.text.email')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                           id="input_user_email"
                                           name="email"
                                           value="{{$usuario->email}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('users.text.password')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="password" placeholder="{{trans('users.placeholder.password')}}"
                                           id="input_user_password"
                                           name="password"
                                           value="{{$usuario->pasword}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="offset-3 col-6 m-t-25 text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <a href="#savebot" onclick="confirmarlogin(url)" id="savebot"
                                       class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                                </div>
                                {{--
                                <div class="col-6 ">
                                    <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                                </div>
                                --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                Datos personales de contacto
            </div>
            <div class="row">
                <div class="col-12 m-t-25">
                    <form class="row" id="contacto">
                        <input type="hidden" value="{{$personal->id}}" id="personal_id" persona="personal_id"
                               class="form-control">
                        <input type="hidden" value="{{$usuario->id}}" id="user_id" name="user_id" class="form-control">
                        <input type="hidden" value="1" id="tipo" name="tipo" class="form-control">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('personal.text.name')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text"
                                           id="input_user_personal_name"
                                           name="name"
                                           class="form-control"
                                           placeholder="{{trans('personal.placeholder.name')}} "
                                           value="{{$personal->name}}"
                                    >

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('personal.text.address')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="{{trans('users.placeholder.address')}}"
                                           id="input_user_personal_address"
                                           name="address"
                                           value="{{$personal->getAddress()}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Codigo Postal :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="Introduce el codigo postal"
                                           id="input_user_personal_postal"
                                           name="postal"
                                           value="{{$personal->getPostal()}}" class="form-control numbers">
                                </div>
                            </div>
                        </div>

                        @include('backend.common.country',['seleccionado'=>$personal->getCountry()])
                        @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state')])
                        {{--
                        <div class="col-md-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('stud.text.city')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="{{trans('stud.placeholder.city')}}"
                                           id="city"
                                           name="city"
                                           value="{!! $personal->getCity() !!}"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        --}}
                        @include('backend.common.city',['city'=> $personal->getCity() ])

                        @include('backend.common.phone',[
 'numero' => $usuario->getPhone(),
 'nombre' => 'phone',
 'texto'  => trans('stud.text.phone'),
 'place' => trans('stud.placeholder.phone'),
 'pais'  => $usuario->getCountryCode(),
 'id'=>$usuario->id,
 'exte'=>$usuario->getExt(),
 ])

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('users.contactemail') !!} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                           id="input_user_personal_email"
                                           value="{{$usuario->email}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="offset-3 col-6 m-t-25 text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <a href="#savebot2" onclick="confirmarcontact(url)" id="savebot2"
                                       class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                                </div>
                                {{--
                                <div class="col-6 ">
                                    <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                                </div>
                                --}}
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottomjs')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{!!url('frontend/js/bootstrap3-wysihtml5.js')!!}"></script>

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>

    <!--End of plugin scripts-->
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script type="text/javascript" src="{!!url('assets/js/pages/modals.js')!!}"></script>
    {{--<script type="text/javascript" src="{!!url('assets/js/pages/form_editors.js')!!}"></script>--}}
    {{--<script type="text/javascript" src="{!!url('frontend/js/wysihtml5-0.3.0.min.js')!!}"></script>--}}
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>

        function envio(form, url) {
            var confirm = $('#input_user_password_confirm');
            form = AddFormDisable(confirm, form, 'confirm');
            $.ajax({
                url: url,
                data: form,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    clear = false;

                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! trans('users.tittleerror') !!}',
                            html: '{!! trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
        }

        function confirmarcontact(url) {
            clearnumber('');
            var form = new FormData(document.getElementById('contacto'));
            var personal_name = $('#input_user_personal_name');
            var personal_postal = $('#input_user_personal_postal');
            var city = $('#city');
            var state = $('#state');
            var country = $('#country');
            var address = $('#input_user_personal_address');
            var phone = $('#input_user_personal_phone_1');
            var codt = $(phone).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp = $(phone).parent().find('.country-list').find('.active').attr('data-country-code');
            var personal_email = $('#input_user_personal_email');

            {{--
            var phone = [
                @if(count($personal->getPhone()) !=0)
                        @foreach($personal->getPhone() as $k=>$v)
                        { {!! $v['id'] !!}:$('#input_user_personal_phone_{{$k}}').val() },
            //phone.push();
            @endforeach
            @else
                { {!! $k !!}: $('#input_user_personal_phone_1').val(),}
                //phone.push($('#input_user_personal_phone_1').val());

            @endif
        ]
            ;
--}}
            form.append('phoneext', codt);
            form.append('phonecon', cotp);
            //form.append('phone',$.serializeArray(phone));
            //form.append('phone', phone);
            form = AddFormDisable(phone, form, 'phone');
            form = AddFormDisable(personal_name, form, 'name');
            form = AddFormDisable(personal_postal, form, 'postal');
            //form = AddFormDisable(phone, form, 'phone');
            form = AddFormDisable(city, form, 'city');
            form = AddFormDisable(state, form, 'state');
            form = AddFormDisable(country, form, 'country');
            form = AddFormDisable(address, form, 'address');
            form = AddFormDisable(personal_email, form, 'pemail');


            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! trans('users.changesconfirm') !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);

                /*
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });

        };

        function confirmarlogin(url) {
            var form = new FormData(document.getElementById('ingreso'));
            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! trans('users.repeatpassword') !!}<br><input type="password" placeholder="{!! trans('users.placeholder.password') !!}" id="input_user_password_confirm" value="" class="form-control">',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                /*
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });


        };

        $("#input_user_personal_phone_1").intlTelInput({
            // allowDropdown: false,
            //autoHideDialCode: false,
            //autoPlaceholder: "off",
            // dropdownContainer: "body",
            // excludeCountries: ["us"],
            formatOnDisplay: false,
            {{--
                 geoIpLookup: function(callback) {
                   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                     var countryCode = (resp && resp.country) ? resp.country : "";
                     callback(countryCode);
                   });
                 },
                 --}}
            //hiddenInput: "full_number",

            @if($usuario->getCountryCode()!= null)
            initialCountry: "{!! $usuario->getCountryCode() !!}",
            @endif

            // nationalMode: false,
            // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            // placeholderNumberType: "MOBILE",
            preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
            separateDialCode: true,
            utilsScript: "{!! url('phone/js/utils.js') !!}"

        });
        $(".intl-tel-input").css('width', "100%");

        function telefono(el) {
            var codt = $(el).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp = $(el).parent().find('.country-list').find('.active').attr('data-country-code');
        }

        @if($usuario->getCountryCode()!= null)
        $(window).on('load', function () {
            $("#input_user_personal_phone_1").intlTelInput("setCountry", "{!! $usuario->getCountryCode() !!}");

       });
        @endif
    </script>

@endsection
