@extends('backend.layouts.base')
@section('title', trans('Titulos.PerfilStud') )
{{--@section('pagetitle', '<i class="fa fa-user"></i>  Mi perfil')--}}
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
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    {{--
        <link type="text/css" rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    --}}
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <script>
        var url = "{!! route('user.profile.update') !!}";
    </script>
    <style>
        .btn-naranja {
            box-shadow: 0 0 0 2px rgba(234, 145, 7, 0.59);
        }
    </style>
@endsection




@section('content')
    @if($user->firstt == 0)
        <div class="card m-t-35">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('users.updatefirsttime') !!}
                </div>
            </div>
        </div>
    @endif
    <div class="col-12">
        <input type="hidden" value="{{$personal->id}}" id="personal_id" class="form-control">
        <input type="hidden" value="{{$user->id}}" id="user_id" class="form-control">

        @if($user->firstt != 0)
            <div class="card">
                <div class="card-block">
                    <div class='card-header bg-white '>
                        {!! trans('users.tittlelogdata') !!}
                    </div>
                    <div class="row">
                        <form class="col-12 m-t-25" id="newpass">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                    <div class="form-group row">
                                        <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                            {{trans('users.emailuser')}} :
                                        </label>
                                        <div class="col-xs-10 col-sm-10 col-md-6">
                                            <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                                   id="input_user_email"
                                                   value="{{$user->email}}" class="form-control" disabled>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center pswa  ">
                                    <div class="form-group row">
                                        <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                            {!! trans('users.actualpassword') !!} :
                                        </label>
                                        <div class="col-xs-10 col-sm-10 col-md-6">

                                            <a href="#" class="btn btn-naranja " id="cambiarcon"
                                               onclick="enpsw()">
                                                Cambiar tu contaseña
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center pswb  hidden-xs-up">
                                    <div class="form-group row">
                                        <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                            {!! trans('users.actualpassword') !!} :
                                        </label>
                                        <div class="col-xs-10 col-sm-10 col-md-6">
                                            <input type="password"
                                                   placeholder="{{trans('users.placeholder.actualpassword')}}"
                                                   id="psw"
                                                   name="psw"
                                                   value="{{$user->pasword}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center pswb  hidden-xs-up ">
                                    <div class="form-group row">
                                        <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right"
                                               for="psw">{!! trans('users.newpsw') !!} :</label>
                                        <div class="col-xs-10 col-sm-10 col-md-6">
                                            <input type="password" name="npsw" id="npsw" class="form-control"
                                                   placeholder="{{trans('users.placeholder.passwordnew')}}"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center  pswb text-right  hidden-xs-up ">
                                    <div class="form-group row">
                                        <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label "
                                               for="psw">{!! trans('users.pswrepeat') !!} :</label>
                                        <div class="col-xs-10 col-sm-10 col-md-6">
                                            <input type="password" name="rnpsw" id="rnpsw" class="form-control"
                                                   placeholder="{{trans('users.placeholder.passwordnewrepeat')}}">
                                        </div>
                                        <div class="clerafix"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center  pswb text-right   hidden-xs-up">
                                    <div class="form-group row">
                                        <div class="col-6 col-xs-6 col-md-3 col-lg-3  "
                                        ></div>
                                        <div class="col-xs-10 col-sm-10 col-md-6 row ">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <a href="#" class="btn btn-warning" id="savepass"
                                                   onclick="cancelpsw()"> Cancelar</a>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <a href="#" class="btn btn-warning" id="cancelpass"
                                                   onclick="savenewpsw()"> Guardar</a>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-6 m-t-25 text-center  alert alert-danger hidden-xs-up "
                                             id="errorcontra2">
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-3 col-6 m-t-25 text-center  alert alert-danger hidden-xs-up "
                                     id="errorcontra">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="card col-12 m-t-35">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('users.tittlepersonaldata') !!}
            </div>
            <div class="row">
                <div class="col-12 m-t-25">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('personal.text.name')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" id="input_user_personal_name" class="form-control"
                                           placeholder="{{trans('personal.placeholder.name')}} "
                                           value="{{$personal->name}}"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('personal.text.address')}} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="{{trans('users.placeholder.address')}}"
                                           id="input_user_personal_address"
                                           value="{{$personal->getAddress()}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Codigo Postal :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="Introduce el codigo postal"
                                           id="input_user_personal_postal"
                                           value="{{$personal->getPostal()}}" class="form-control numbers">
                                </div>
                            </div>
                        </div>

                        @include('backend.common.country',['seleccionado'=>$personal->getCountry()])
                        @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state')])
                        @include('backend.common.city',['city'=> $personal->getCity() ])


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{ trans('personal.text.phone') }} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">

                                    <input type="tel"
                                           placeholder="{{trans('personal.placeholder.phone')}}"
                                           id="input_user_personal_phone_1"
                                           value="{!! $user->getPhone() !!}" class="form-control numbers"
                                           onkeyup="telefono(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('users.contactemail') !!} :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                           id="input_user_personal_email"
                                           value="{{$personal->email}}" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="offset-3 col-6 m-t-25 text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <a href="#savebot2" onclick="confirmarcontact(url)" id="savebot2"
                                       class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection


@section('bottomjs')

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

    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>
        var pai = {!! $personal->getCountry() !!};
        var edo = {!! $personal->getState() !!};

        function enpsw() {
            $('.pswa').addClass('hidden-xs-up');
            $('.pswb').removeClass('hidden-xs-up');
        }

        var pr = null;

        function cancelpsw() {
            $('.pswa').removeClass('hidden-xs-up');
            $('.pswb').addClass('hidden-xs-up');
        }

        function savenewpsw() {
            var form = new FormData(document.getElementById('newpass'));
            $('.pswb').addClass('');
            $('.pswa').removeClass('');
            axios.post("{!! route('user.psw') !!}", form)
                .then(function (response) {
                    $('#errorcontra').html('').html(response.data.sms).removeClass('alert-danger').removeClass('alert-success').addClass('alert alert-success').removeClass('hidden-xs-up');
                    $('#errorcontra2').html('').html(response.data.sms).removeClass('alert-danger').removeClass('alert-success').addClass('alert alert-success').removeClass('hidden-xs-up');
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */

               })
                .catch(function (error) {
                    pr = error;
                    $('#errorcontra').html('').html(error.response.data.sms).removeClass('alert-danger').removeClass('alert-success').addClass('alert alert-danger').removeClass('hidden-xs-up');
                    $('#errorcontra2').html('').html(error.response.data.sms).removeClass('alert-danger').removeClass('alert-success').addClass('alert alert-danger').removeClass('hidden-xs-up');
                });
            $('.pswa').removeClass('hidden-xs-up');
            $('.pswb').addClass('hidden-xs-up');
        }

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
            var form = new FormData();
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
            var form = new FormData();
            var email = $('#input_user_email');
            var password = $('#input_user_password');
            form = AddFormDisable(email, form, 'email');
            form = AddFormDisable(password, form, 'password');
            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                @if($user->firstt == 0)
                html: '{!! trans('users.firstpassword') !!}<br>' +
                '<input type="password" placeholder="{!! trans('users.placeholder.password') !!}" id="input_user_password_confirm" value="" class="form-control">',
                @else
                html: '{!! trans('users.repeatpassword') !!}<br>' +
                '<input type="password" placeholder="{!! trans('users.placeholder.password') !!}" id="input_user_password_confirm" value="" class="form-control">',
                @endif
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

            @if($user->getCountryCode()!= null)
            initialCountry: "{!! $user->getCountryCode() !!}",
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

        @if($user->getCountryCode()!= null)
        $(window).on('load', function () {
            $("#input_user_personal_phone_1").intlTelInput("setCountry", "{!! $user->getCountryCode() !!}");

       });
        @endif

    </script>

    <script>
        var pai = {!! $personal->country !!};
        var edo = {!! $personal->state !!};

    </script>
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
@endsection



