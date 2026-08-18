@extends('backend.layouts.base',['user'=>\Auth::user()])
@section('title', trans('stud.Tittle') )
@section('pagetitleadmin')

    @include('admin.topstud')

@endsection
{{--@section('pagetitle', '<i class="fa fa-user"></i>'.trans('stud.new') )--}}
@section('topcss')

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/profile.min.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>


    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
@endsection
@section('topjs')


    <script>


        var url = "{!! route('yeguadas.store') !!}";

    </script>

@endsection
@section('content')


    <div id="datos1" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.text.create_title') !!}
            </div>
            <form class="row" id="yeguadas" enctype="multipart/form-data">
                <input type="hidden" name="stud_id" value="{!! $stud->id !!}">
                <div class="col-12 m-t-25">
                    <div class="row">

                        <div class="col-md-12 text-xs-center m-t-35">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('stud.logo') !!}:
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">

                                    @include('backend.common.dropify',['nombre'=>"stud",'tipo'=>'logo','link'=>$stud->getLogo(),'id'=>'mystud'])
                                </div>
                            </div>

                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('stud.email')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input
                                                id="input_stud_email"
                                                name="email"
                                                type="email"
                                                placeholder="{{trans('stud.placeholder.email')}}"
                                                value="" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('stud.name')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input
                                                id="input_stud_name"
                                                name="name"
                                                type="text"
                                                placeholder="{{trans('stud.placeholder.name')}}"
                                                value="{{$stud->getName()}}" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('users.text.email')}}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="email" placeholder="{{trans('users.placeholder.email')}}"
                                               id="email"
                                               name="email"
                                               value="{{$stud->email}}" class="form-control">

                                    </div>
                                </div>
                            </div>
                            @php
                                $phone =$stud->getNewPhone();
                            @endphp
                            @for($i=0;$i<3;$i++)
                                @include('backend.common.phone',[
'nombre' => 'input_stud_phone[]',
'texto'  => trans('stud.text.phone'),
'place' => trans('stud.placeholder.phone'),
])


                            @endfor


                            @include('backend.common.country',['seleccionado'=>$stud->country])


                            @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state')])
                            @include('backend.common.city',['city'=> $stud->getCity() ])
                            {{--
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('stud.text.city')}}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('stud.placeholder.city')}}"
                                               id="city"
                                               name="city"
                                               value="{!! $stud->getCity() !!}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            --}}
                            {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('stud.text.city')}}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <select class=" form-control" data-style="btn-primary"
                                                id="city"
                                                name="city"
                                                disabled=true
                                                placeholder="{{trans('stud.placeholder.city')}}">
                                            <option data-tokens="0"
                                                    value="0">{!! trans('city.chooseme') !!}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            --}}
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {!! trans('stud.address') !!}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{{trans('stud.placeholder.address')}}"
                                               id="input_stud_address"
                                               name="address"
                                               value="{!! $stud->getAddress() !!}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {!! trans('stud.mappos') !!}:
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        @include('backend.common.mapa',['lat'=>$stud->lat,'lng'=>$stud->lng])
                                        {{--<img class="img-fluid" src="https://i.stack.imgur.com/dApg7.png" alt="">--}}
                                    </div>
                                </div>
                            </div>
                            <div class="offset-3 col-6 m-t-25 text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <a href="#savebot" onclick="confirmarstud(url)" id="savebot"
                                           class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="datos2" class="card col-12 m-t-35 ">
        {{--Mapa--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studtextpresentation') !!}
            </div>
            <form id="descrip" class="row m-t-35">
                <div class="col-md-12 text-xs-center">
                    <form class="form-group row" id="descripcions" enctype="multipart/form-data">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {{trans('stud.text.description')}}:
                        </label>
                        <div class="col-9" id="stud_description">
                            <textarea name="description" id="input_stud_description">
                                {{$stud->getDescription()}}
                            </textarea>
                        </div>
                    </form>
                </div>

                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#saved" onclick="savedescription('{!! route('yeguadas.store') !!}')" id="saved"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="datos3" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studphoto') !!}
            </div>
            <form class="m-t-35 row no-gutters" id="galerias" enctype="multipart/form-data">
                <div class="col-12 m-t-35">
                    @include('backend.common.dropzone',['nombre'=>"imagenes",'tipo'=>'stud','MaxFile'=>10,'oculto'=>true])
                </div>
                <div class="m-t-35 row col-12 " id="photos">
                    @foreach($stud->getInstalationsGallery() as $k=>$v)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                            @include('backend.common.galleryimage',['titulo'=>$v['name'],'id'=>$v['id'],'imagen'=>$v['url']])
                        </div>
                    @endforeach
                </div>

                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#" class="btn btn-block btn-warning btninfo "
                               onclick="savegallery('{!! route('imgs_instalations') !!}')">
                                {!! trans('users.save') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="datos4" class="card col-12 m-t-35 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.studpresentation') !!}
            </div>
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 embed-responsive embed-responsive-16by9">
                            <div class="form-group row">
                                @if(!empty($u) and !empty($u->getVideo() ))
                                    @if(!empty($u->getVideo()->getEmbedVideoYoutube()))
                                        <iframe width="640" height="480"
                                                src="{!!$u->getVideo()->getEmbedVideoYoutube() !!}"
                                                frameborder="0"
                                                allowfullscreen></iframe>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            {!! trans('video.addressvideo') !!}:
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input type="text" placeholder="{{trans('stud.text.youtube')}}"
                                   id="input_stud_video"
                                   name="video"
                                   value="{!! $u->getVideo()->getUrl() !!}"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#savedv" onclick="savevideo('{!! route('yeguadas.store') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>

                </div>


                <form action="{!! route('yeguadas.store') !!}" method="post" id="form_stud">
                    <input type="hidden" value="{{$stud->id}}" id="stud_id" class="form-control">
                </form>
            </div>
        </div>
    </div>


    <div id="datos5" class="card col-12 m-t-35 ">
        {{--video--}}
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('stud.socialmedia') !!}
            </div>
            <div class="row">

                <div class="col-md-12 text-xs-center m-t-35">
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Facebook
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_facebook"
                                    name="facebook"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.facebook')}}"
                                    value="{{$stud->getFacebook()->getUrl()}}" class="form-control facebook">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Youtube
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_youtube"
                                    name="youtube"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.youtube')}}"
                                    value="{{$stud->getYoutube()->getUrl()}}" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Twitter
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_twitter"
                                    name="twitter"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.twitter')}}"
                                    value="{{$stud->getTwitter()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Instagram
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_instagram"
                                    name="instagram"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.instagram')}}"
                                    value="{{$stud->getInstagram()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    {{--
                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            google+
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
id="input_stud_google" type="text"
                                   placeholder="{{trans('stud.placeholder.google')}}"
                                   value="{{$stud->getGoogle()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                    --}}

                    <div class="form-group row">
                        <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                            Pinterest
                        </label>
                        <div class="col-xs-10 col-sm-10 col-md-6">
                            <input
                                    id="input_stud_pinterest"
                                    name="pinterest"
                                    type="url"
                                    placeholder="{{trans('stud.placeholder.pinterest')}}"
                                    value="{{$stud->getPinterest()->getUrl()}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#datos5" onclick="savesocial('{!! route('social.save') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>
                </div>
                <form action="{!! route('yeguadas.store') !!}" method="post" id="form_stud">
                    <input type="hidden" value="{{$stud->id}}" id="stud_id" class="form-control">
                </form>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <!--Plugin scripts-->


    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script>
        var pai = 0;
        var edo = 0;
    </script>
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>
        function savegallery(url) {
            var form = new FormData(document.getElementById("galerias"));

            @if(\Auth::user()->getType()==0)
            form.append('stud_id',{!! $stud->id !!})
            @endif

            axios.post(url, form)
                .then(function (response) {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                        'success'
                    )
               })
 .catch(function (error) {
                    var err = eval(xhr.responseText.sms);
                    var v = $.parseJSON(xhr.responseText);
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }

        function envio(form, url) {
            var confirm = $('#input_user_password_confirm');
            form = AddFormDisable(confirm, form, 'confirm');
            axios.post(url, form)
                .then(function (response) {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.successchange')) !!}',
                        'success'
                    )
               })
 .catch(function (error) {
                    console.dir(error);
                    //var error = eval(xhr.responseText.sms);
                    var v = $.parseJSON(error.responseText);
                    swal({
                        title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror')) !!}',
                        html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror')) !!}<br>' + v.sms,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
            {{--
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
                        '{!! Funciones::ReemplazarApostrofe(trans('users.applychange') !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.successchange') !!}',
                        'success'
                    )
                },
                error:
                    function (xhr, status, error) {
                        var err = eval(xhr.responseText.sms);
                        var v = $.parseJSON(xhr.responseText);
                        swal({
                            title: '{!! Funciones::ReemplazarApostrofe(trans('users.tittleerror') !!}',
                            html: '{!! Funciones::ReemplazarApostrofe(trans('users.someerror') !!}<br>' + v.sms,
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }
            });
        --}}
        }

        function confirmarstud(url) {
            clearnumber('');
            var form = new FormData(document.getElementById('yeguadas'));
            var name = $('#input_stud_name').val();
            var phone_1 = $('#input_stud_phone_0').val();
            var phone_2 = $('#input_stud_phone_1').val();
            var phone_3 = $('#input_stud_phone_2').val();

            var codt1 = $($('#input_stud_phone_0')).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp1 = $($('#input_stud_phone_0')).parent().find('.country-list').find('.active').attr('data-country-code');
            var codt2 = $($('#input_stud_phone_1')).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp2 = $($('#input_stud_phone_1')).parent().find('.country-list').find('.active').attr('data-country-code');
            var codt3 = $($('#input_stud_phone_2')).parent().find('.country-list').find('.active').attr('data-dial-code');
            var cotp3 = $($('#input_stud_phone_2')).parent().find('.country-list').find('.active').attr('data-country-code');

            var codid0 = $($('#input_stud_phone_0')).parent().parent().parent().find('[type=hidden]').val();
            var codid1 = $($('#input_stud_phone_1')).parent().parent().parent().find('[type=hidden]').val();
            var codid2 = $($('#input_stud_phone_2')).parent().parent().parent().find('[type=hidden]').val();


            var address = $('#input_stud_address').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var country = $('#country').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();

            form.append('name', name);
            form.append('phone_1', phone_1);
            form.append('phone_2', phone_2);
            form.append('phone_3', phone_3);
            form.append('city', city);
            form.append('state', state);
            form.append('country', country);
            form.append('address', address);
            form.append('lat', lat);
            form.append('lng', lng);

            form.append('phone_ext_1', codt1);
            form.append('phone_cc_1', cotp1);
            form.append('phone_ext_2', codt2);
            form.append('phone_cc_2', cotp2);
            form.append('phone_ext_3', codt3);
            form.append('phone_cc_3', cotp3);
            form.append('phone_id_1', codid0);
            form.append('phone_id_2', codid1);
            form.append('phone_id_3', codid2);

            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe(trans('users.changesconfirm') )!!}',
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
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
           });

        }

        function savedescription(url) {
            var form = new FormData(document.getElementById('descrip'));
            //var description = $('#input_stud_description');
            var description = CKEDITOR.instances['input_stud_description'].getData();
            form.append('description', description);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Confirmas el cambio de descipcion?',
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
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
           });

        }

        function validate_url(url) {
            if (/^(https?:\/\/)?((w{3}\.)?)facebook.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)youtube.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)twitter\.com\/(#!\/)?[a-z0-9_]+$/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)instagram.com\/.*/i.test(url)) return true;
            if (/^(https?:\/\/)?((w{3}\.)?)pinterest.com\/.*/i.test(url)) return true;


            return false;
        }

        function savesocial(url) {
            var form = new FormData();

            var facebook = $('#input_stud_facebook').val();
            var youtube = $('#input_stud_youtube').val();
            var twitter = $('#input_stud_twitter').val();
            var instagram = $('#input_stud_instagram').val();
            //var google = $('#input_stud_google').val();
            var pinterest = $('#input_stud_pinterest').val();
            if (validate_url(facebook) === false && facebook !== '') {
                swal('facebook', 'La direccion de facebook parece no ser valida. <br>debe ser www.facebook.com', 'error');
                return null;
            }
            if (validate_url(youtube) === false && youtube !== '') {
                swal('youtube', 'La direccion de youtube parece no ser valida. <br>debe ser www.youtube.com', 'error');
                return null;
            }
            if (validate_url(twitter) === false && twitter !== '') {
                swal('twitter', 'La direccion de twitter parece no ser valida. <br>debe ser www.twitter.com', 'error');
                return null;
            }
            if (validate_url(instagram) === false && instagram !== '') {
                swal('instagram', 'La direccion de instagram parece no ser valida. <br>debe ser www.instagram.com', 'error');
                return null;
            }
            if (validate_url(pinterest) === false && pinterest !== '') {
                swal('pinterest', 'La direccion de pinterest parece no ser valida. <br>debe ser www.pinterest.com', 'error');
                return null;
            }

            @if(\Auth::user()->getType()==0)
            form.append('stud_id', {!! $stud->id !!});
            @endif
            form.append('facebook', facebook);
            form.append('youtube', youtube);
            form.append('twitter', twitter);
            form.append('instagram', instagram);
            {{--form.append('google', google);--}}
            form.append('pinterest', pinterest);

            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no') )!!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Deseas actualizar tus redes sociales?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
           });

        }

        function savevideo(url) {
            var form = new FormData();
            //var description = $('#input_stud_description');
            var description = $('#input_stud_video').val();
            form.append('video', description);

            console.dir(description);
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure')) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: 'Se modificará el video de presentacion, ¿Deseas continuar?<br>',
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
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
           });

        }

        function savestud(url) {


            DisableElement($('.save'));
            DisableElement($('.cancel'));
            var clear = true;
            var form = new FormData();
            var name = $('#input_stud_name');
            var phone1 = $('#input_stud_phone_1');

            var phone_cc1 = $('#input_stud_phone_1').parent().find('.country-list').find('.active').attr('data-country-code');
            var phone_ext1 = $('#input_stud_phone_1').parent().find('.country-list').find('.active').attr('data-dial-code');


            var description = $('#input_stud_description');
            var city = $('#city');
            var state = $('#state');
            var country = $('#country');
            var address = $('#input_stud_address');
            var video = $('#input_stud_video');

            var id = $('#stud_id');
            form = AddFormDisable(name, form, 'name');
            form = AddFormDisable(phone1, form, 'phone1');

            form = AddFormDisable(phone_ext1, form, 'phone_ext_1');
            form = AddFormDisable(phone_cc1, form, 'phone_cc_1');
            form = AddFormDisable(description, form, 'description');
            form = AddFormDisable(city, form, 'city');
            form = AddFormDisable(state, form, 'state');
            form = AddFormDisable(country, form, 'country');
            form = AddFormDisable(address, form, 'address');
            form = AddFormDisable(video, form, 'video');


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
                    EnableElement(phone1, clear);
                    EnableElement(name, clear);
                    EnableElement(description, clear);
                    EnableElement(city, clear);
                    EnableElement(state, clear);
                    EnableElement(country, clear);
                    EnableElement(address, clear);
                    EnableElement(video, clear);
                    EnableElement($('.save'));
                    EnableElement($('.cancel'));
                    console.log(data);
                },
                error: function (data) {
                    clear = false;

                    EnableElement(name, clear);
                    EnableElement(phone1, clear);
                    EnableElement(description, clear);
                    EnableElement(city, clear);
                    EnableElement(state, clear);
                    EnableElement(country, clear);
                    EnableElement(address, clear);
                    EnableElement(video, clear);
                    EnableElement($('.save'), clear);
                    EnableElement($('.cancel'), clear);

                    console.log(data);
                }
            });
        }

        $(window).on('load', function () {
            $(".numbers").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    //$("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });

            CKEDITOR.replace("input_stud_description");
            CKEDITOR.on('instanceReady', function (evt) {
                CKEDITOR.instances['input_stud_description'].setData('{!! $stud->getDescription() !!}');

            });
            $("#photos").sortable().disableSelection();
            $(".cambiarlogo").on('click', function () {
                $('.perfil_logo').removeClass('hidden-xl-down');
                $('.preview_logo').addClass('hidden-xl-down');

            });


        });
        /*
                function telefono(el,ext,cod) {
                    var d = $(el).parent().find('.country-list').find('.active').attr('data-dial-code');
                    var c = $(el).parent().find('.country-list').find('.active').attr('data-country-code')
                    $(el).parent().parent().find('.ext').val(d);
                    $(el).parent().parent().find('.extc').val(c);
                }
        */
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
            preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
            initialCountry: "es",
            separateDialCode: true,
            utilsScript: "{!! url('phone/js/utils.js') !!}"

        });

        function savedescription(url) {
            var form = new FormData(document.getElementById('descripcions'));
            //var description = $('#input_stud_description');
            var description = CKEDITOR.instances['input_stud_description'].getData();
            form.append('description', description);
            form.append('stud_id', {!! $stud->id !!});
            swal({
                title: '{!! Funciones::ReemplazarApostrofe(trans('users.usure') )!!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no') )!!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Confirmas el cambio de descipcion?',
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
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
            });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWBy20udR6mPH_V4Qm9_7Fn5BoyyVyzyA&libraries=places&callback=initAutocomplete"
    ></script>
@endsection

