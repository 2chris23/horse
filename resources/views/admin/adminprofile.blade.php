@extends('backend.layouts.base')
@section('title', trans('users.Tittle') )
@section('pagetitle', '<i class="fa fa-user"></i>  Mi perfil')
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
        var url = "{!! route('AdminPerfilPost') !!}";
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

    <div class="col-12">
        <input type="hidden" value="{{$personal->id}}" id="personal_id" class="form-control">

        <input type="hidden" value="{{$user->id}}" id="user_id" class="form-control">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('users.tittlelogdata') !!}
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        <form class="row" id="inicio">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('users.text.email')}} :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                               id="input_user_email"
                                               value="{{$user->email}}" class="form-control">

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
                                               value="{{$user->pasword}}" class="form-control">

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
                    {!! trans('users.tittlecontactdata') !!}
                </div>
                <div class="row">
                    <div class="col-12 m-t-25">
                        <form class="row" id="contacto">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        Logo :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        @php
                                            $logo = \Auth::user()->getAdminLogo();
                                        if(!empty($logo)){
                                        $logo= $logo->getUrl();
                                        }
                                        @endphp
                                        @include('backend.common.dropify',
                                        ['nombre'=>"logo",
                                        'tipo'=>'adminlogo',
                                        'link'=>$logo,
                                        'id'=>'adminlogo'
                                        ])
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
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
                            {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('personal.text.lastname')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" id="input_user_personal_lastname" class="form-control"
                                               placeholder="{{trans('personal.placeholder.lastname')}} "

                                               value="{{$personal->lastname}}"
                                        >

                                    </div>
                                </div>
                            </div>
                            --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('personal.text.address')}} :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        {{--<textarea class="textarea form_editors_textarea_wysihtml form-control"
                                                  id="input_user_personal_address" style=""
                                                  placeholder="{!! trans('personal.placeholder.address') !!}"> {{$personal->address}} </textarea>--}}
                                        {{--
                                        <textarea class="textarea form_editors_textarea_wysihtml form-control"
                                                  id="input_user_personal_address" style=""
                                                  placeholder="{!! trans('personal.placeholder.address') !!}"> {{$personal->address}} </textarea>
                                        --}}
                                        <input type="text" placeholder="{{trans('users.placeholder.address')}}"
                                               id="input_user_personal_address"
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
                                        {{--<textarea class="textarea form_editors_textarea_wysihtml form-control"
                                                  id="input_user_personal_address" style=""
                                                  placeholder="{!! trans('personal.placeholder.address') !!}"> {{$personal->address}} </textarea>--}}
                                        {{--
                                        <textarea class="textarea form_editors_textarea_wysihtml form-control"
                                                  id="input_user_personal_address" style=""
                                                  placeholder="{!! trans('personal.placeholder.address') !!}"> {{$personal->address}} </textarea>
                                        --}}
                                        <input type="text" placeholder="Introduce el codigo postal"
                                               id="input_user_personal_postal"
                                               value="{{$personal->getPostal()}}" class="form-control numbers">
                                    </div>
                                </div>
                            </div>
                            {{--
                                                        <telefono
                                                                :id="'input_user_personal_postal'"
                                                                :tel="'{{$personal->getPostal()}}'"
                                                                :place="'Introduce el codigo postal'"
                                                                :label="'Codigo Postal :'"
                                                                :classe="'col-6'"
                                                                :mask='"#####"'
                                                        ></telefono>
                            --}}
                            {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('personal.text.phone')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" id="input_user_personal_phone" class="form-control"
                                               placeholder="{{trans('personal.placeholder.phone')}} "
                                               value="{{$personal->phone}}"
                                        >

                                    </div>
                                </div>
                            </div>
--}}
                            @include('backend.common.country',['seleccionado'=>$personal->getCountry()])
                            {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('personal.text.country')}} :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <select class=" form-control" data-style="btn-primary" id="country"
                                                placeholder="{{trans('personal.placeholder.country')}}">
                                            @foreach(\App\Http\Controllers\PublicController::ArrayPais() as $k=>$v)
                                                @if($personal->getCountry() == $v['id'])
                                                    <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                                            selected>{!! $v['name'] !!}</option>
                                                @else

                                                    <option data-tokens="{!! $v['id']!!}"
                                                            value="{!! $v['id'] !!}">{!! $v['name'] !!}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            --}}
                            @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state')])
                            @include('backend.common.city',['city'=> $personal->getCity() ])
                            {{--
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                              <div class="form-group row">
                                  <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                      {{trans('personal.text.city')}} :
                                  </label>
                                  <div class="col-xs-10 col-sm-10 col-md-6">
                                      <select class=" form-control" data-style="btn-primary" id="city" disabled=true
                                              placeholder="{{trans('personal.placeholder.city')}}">
                                          <option data-tokens="0" value="0">{!! trans('city.chooseme') !!}</option>

                                      </select>
                                  </div>
                              </div>
                          </div>
                          --}}{{--

                          @if(count($personal->getPhone()) !=0)
                              @foreach($personal->getPhone() as $k=>$v)

                                  <telefono
                                          :id="'input_user_personal_phone_{{$k}}'"
                                          :tel="'{{$v['phone']}}'"
                                          :place="'{{trans('personal.placeholder.phone')}}'"
                                          :label="'{{trans('personal.text.phone')}} :'"
                                          :classe="'col-6'"
                                          :mask='"+(##)###-###-###-##"'
                                  ></telefono>

                              @endforeach
                          @else
                              <telefono
                                      :id="'input_user_personal_phone_1'"
                                      :tel="''"
                                      :place="'{{trans('personal.placeholder.phone')}}'"
                                      :label="'{{trans('personal.text.phone')}} :'"
                                      :classe="'col-6'"
                                      :mask='"+(##)###-###-###-##"'
                              ></telefono>
                          @endif
                          --}}


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
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
                            {{--
                            {{ $personal->getPhone() }}
                            <telefono
                                    :id="'input_user_personal_phone_1'"
                                    :tel="'{!! $user->getPhone() !!}'"
                                    :place="'{{trans('personal.placeholder.phone')}}'"
                                    :label="'{{trans('personal.text.phone')}} :'"
                                    :classe="'col-6'"
                                    :mask='"+(##)###-###-###-##"'
                            ></telefono>
                            --}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
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
                                    {{--
                                    <div class="col-6 ">
                                        <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                                    </div>
                                    --}}
                                </div>
                            </div>
                            {{--}}
                                        <texto
                                                :id="'input_user_personal_address'"
                                                :label="'{{trans('personal.text.address')}}'"
                                                :contenido="'{{$personal->getAddress()}}'"
                                        ></texto>
                                        --}}


                            {{--
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('personal.text.address')}}
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <tinymce id="input_user_personal_address" :content='"{{$personal->address}}"'></tinymce>
                                </div>
                            </div>
                        </div>
                        --}}


                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--
        <div class="card m-t-35 ">
            <div class="card-block">
                <div class="row">
                    <div class="offset-3 col-6 m-t-25 text-center">
                        <div class="row">
                            <div class="col-6 ">
                                <a href="#savebot" onclick="confirmar(url)" id="savebot"
                                   class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                            </div>
                            {{--
                            <div class="col-6 ">
                                <a href="#" class="btn cancel btn-block btn-danger glow_button">{!! trans('users.cancel') !!}</a>
                            </div>
                            --}}
            </div>
        </div>
    </div>
</div>
</div>
-->


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
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    {{--}}
    <script type="text/javascript" src="{!!url('assets/js/pages/mini_calendar.js')!!}">
    </script>
    --}}
    <!--End of Page level scripts-->

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="{!! url('js/dropify/js/dropify.min.js') !!}"></script>
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
            var form = new FormData(document.getElementById('inicio'));
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

@endsection
