@extends('backend.layouts.base')
@section('title', trans('clientes.Tittle') )
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

    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('clientes.clientdata') !!}
                    <span class="pull-right">

                        <a href="{!! route('StudClientes.index') !!}" class=" btn btn-warning pull-right right">
                                {!! trans('users.return') !!}
                        </a>
                    </span>
                </div>
                <form method="post" action="{!! route('StudClientes.guardar') !!}" class="row">
                    {!! csrf_field() !!}
                    <div class="col-12 m-t-25">

                        {{--nombre--}}
                        {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        Yeguada :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input type="text" placeholder="{!! trans('clientes.studplaceholder') !!}"
                                               id="stud"
                                               name="stud"
                                               value="" class="form-control">

                                    </div>
                                </div>
                            </div>
                        --}}
                        {{--https://www.youtube.com/watch?v=SMBsfuocuEU--}}
                        {{--nombre--}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('clientes.text.name')}}
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="text" placeholder="{{trans('clientes.placeholder.name')}}"
                                           id="name"
                                           name="name"
                                           required
                                           value="{{$cliente->getNombre() }}" class="form-control">

                                </div>
                            </div>
                        </div>


                        {{--@include('backend.common.categoria',['seleccionado'=>$cliente->country_id,'requerido'=>'required'])--}}
                        @include('backend.common.categoria',['seleccionado'=>$cliente->categoria])
                        @include('backend.common.subcategoria',['seleccionado'=>$cliente->subcat])
                        {{--Localidad aqui --}}
                        @include('backend.common.country',['seleccionado'=>$cliente->country_id,'requerido'=>'required'])
                        @include('backend.common.state',['label'=>trans('personal.text.state'),'place'=>trans('personal.placeholder.state'),'requerido'=>'required'])
                        @include('backend.common.city',['city'=>$cliente->city])

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
                                           value="{{$cliente->getDireccion() }}" class="form-control">

                                </div>
                            </div>
                        </div>

                        {{--telefono 1--}}
                        @php($tels = $cliente->getTelefono())
                        {{--$t['tel'] = $v['n'];
                $t['ext'] = $v['e'];
                $t['con'] = $v['c'];--}}
                        @if(count($tels)!=0)
                            @foreach( $tels as $k => $v )
                                @include('backend.common.phone',[
                                'numero' => $v->tel,
                                'nombre' => 'input_stud_phone[]',
                                'texto'  =>trans('stud.text.phone'),
                                'place' => trans('clientes.placeholder.phone'),
                                'pais'  => $v->con,
                                'exte'  => $v->ext,
                                 ])
                            @endforeach

                            @for($i = 0 ; $i<2; $i++)
                                @include('backend.common.phone',[

                                    'nombre' => 'input_stud_phone[]',
                                    'texto'  => trans('stud.text.phone'),
                                    'place' => trans('stud.placeholder.phone'),

                                    ])
                            @endfor
                        @else
                            @for($i = 0 ; $i<2; $i++)
                                @include('backend.common.phone',[

                                    'nombre' => 'input_stud_phone[]',
                                    'texto'  => trans('stud.text.phone'),
                                    'place' => trans('stud.placeholder.phone'),

                                    ])
                            @endfor
                        @endif
                        {{--correo--}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {{trans('clientes.text.email')}}
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input type="email" placeholder="{{trans('clientes.placeholder.email')}}"
                                           id="email"
                                           name="email"
                                           value="{{$cliente->getCorreo() }}" class="form-control">

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Web :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input
                                            id="web"
                                            name="web"
                                            Type="text"
                                            placeholder="{{trans('stud.placeholder.web')}}"
                                            value="{{$cliente->getWeb()}}"
                                            class="form-control web">

                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Facebook :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input
                                            id="input_cliente_facebook"
                                            name="facebook"
                                            Type="text"
                                            placeholder="{{trans('stud.placeholder.facebook')}}"
                                            value="{{$cliente->getFacebook()}}"
                                            class="form-control facebook">

                                </div>
                            </div>
                        </div>
                        {{--
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        Youtube :
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <input
                                                id="input_cliente_youtube"
                                                name="youtube"
                                                Type="text"
                                                placeholder="{{trans('stud.placeholder.youtube')}}"
                                                value="{{$cliente->getYoutube()}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">

                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Twitter :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input
                                            id="input_cliente_twitter"
                                            name="twitter"
                                            Type="text"
                                            placeholder="{{trans('stud.placeholder.twitter')}}"
                                            value="{{$cliente->getTwitter()}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Instagram :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input
                                            id="input_cliente_instagram"
                                            name="instagram"
                                            Type="text"
                                            placeholder="{{trans('stud.placeholder.instagram')}}"
                                            value="{{$cliente->getInstagram()}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Youtube :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <input
                                            id="pinterest"
                                            name="pinterest"
                                            Type="text"
                                            placeholder="{{trans('stud.placeholder.youtube')}}"
                                            value="{{$cliente->getPinterest()}}" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                            <div class="form-group row">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Nota :
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <textarea
                                            id="nota"
                                            name="nota"
                                            rows="5"
                                            placeholder="{{trans('stud.placeholder.nota')}}"
                                            class="form-control">{{$cliente->getNota()}}</textarea>
                                </div>
                            </div>
                        </div>

                        {{--TIENE SITIO WEB BOOLEANO URL--}}
                        {{--}}
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                                <div class="form-group row">
                                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                        {{trans('clientes.text.url')}}
                                    </label>
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        <div class="col-xs-10 col-sm-10 col-md-6">
                                            <button type="button" id="web_si"
                                                    class=" btn btn-labeled btn-success hidden-xl-down "

                                            >

                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                {{trans('text.yes')}}
                                            </button>
                                            <button type="button" id="web_no"
                                                    class=" btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                    <i class="fa fa-close"></i>
                                                </span>
                                                {{trans('text.no')}}
                                            </button>

                                        </div>

                                        <input type="hidden" placeholder="{{trans('clientes.placeholder.url')}}"
                                               id="input_cliente_url"
                                               name="url"
                                               value="0" class="form-control">

                                    </div>
                                </div>
                            </div>
                        --}}
                        {{--URL SI TIENE SITE--}}
                        {{--
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
--}}
                        {{--BOTON--}}
                        <div class="offset-3 col-6  text-center">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                    <input type="submit" id="sending" class=" hidden-xs-up">
                                    <a href="#" onclick="clearnumber($('#sending'))"
                                       class=" btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$cliente->id}}" id="cliente_id" name="cliente_id"
                               class="form-control">


                        {{--
                        <form action="{!! route('clientes.store') !!}" method="post" id="form_horse">
                            <input type="hidden" value="{{$cliente_id}}" id="cliente_id" class="form-control">
                        </form>
                        --}}

                    </div>
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
    <script>
        var pai = {!! $cliente->getCountryId() !!};
        var edo = {!! $cliente->getStateId() !!};

    </script>
    <script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
    <script src="{!! url('phone/js/intlTelInput.js') !!}"></script>
    <script>
        /*
                function telefono(el) {

                }
                */

        function savedata() {
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
            axios.post('{!! route('StudClientes.guardar') !!}', form)
                .then(function (response) {
                    var r = response.data;
                    cliente_id = r.id;
                    $('#cliente_id').val(cliente_id);
                    var a = document.createElement('a');
                    a.href = '{!! route('StudClientes.edit')."/" !!}' + cliente_id;
                    /*a.target = '_blank';*/
                    document.body.appendChild(a);
                    a.click();

                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('clientes.newclientadviceok') !!}',
                        'success'
                    );

               })
 .catch(function (error) {
                    //var err = eval(xhr.responseText.sms);
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('clientes.newclientadvicebad') !!}<br>' + v,
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
        $(".telefonos").intlTelInput({
            initialCountry: "es",
            preferredCountries: ['mx', 'es', 'nl', 'de', 'us'],
            separateDialCode: true,
            utilsScript: "{!! url('phone/js/utils.js') !!}"

        });

        function cambiarcat() {
            var v = $("#categoria").val();
            if (v === '3') {
                $('#scdiv').removeClass('hidden-xs-up');
            } else {
                $('#scdiv').addClass('hidden-xs-up');
            }
        }

        $(document).on('ready', function () {
            cambiarcat();
        });
        $(window).hover(function () {
            cambiarcat();
        });


        $('#categoria').on('change', function () {
            cambiarcat();
       });
        //scdiv

    </script>

@endsection