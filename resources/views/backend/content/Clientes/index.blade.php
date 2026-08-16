@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')

@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('clientes.liststud') !!}
                @if(count($clientes) !=0)
                    <span style="padding-left:10px;"><span
                                class="badge badge-pill badge-warning notifications_badge_top">{!! count($clientes )!!}</span>
                                                 </span>
                @endif


                <span class="pull-right">
<a href="{!! route('Aplications.index') !!}"
   class="save btn btn-block btn-success glow_button">
                                        {!! trans('clientes.workrequest') !!}
                                    </a>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <div class="offset-9 col-3  text-right ">
                            <div class="row">
                                <div class="col-7 ">
                                    <a href="{!! route('StudClientes.crear') !!}"
                                       class="save btn btn-block btn-success glow_button">{!! trans('clientes.new') !!}</a>

                                </div>
                            </div>
                        </div>
                        <div class=" col-12 table-responsive noSwipe m-t-20">
                            {{--
                            <div class="col-12 row ">
                                <div class="col-3 pull-right">
                                    Tipo 1
                                </div>
                                <div class="col-3 pull-right">
                                    Tipo 2
                                </div>
                                <div class="col-3 pull-right">
                                    Tipo 3
                                </div>
                            </div>
                            --}}
                            @if(count($clientes) !=0)
                                <table id="tablarev" class="table table-striped table-hover" cellspacing="0">
                                    <thead>
                                    <tr>
                                        @foreach($columns as $k=>$v)

                                            <th {{--style="@if($k == 'status')width: 160px; @endif"--}}>
                                                {!! $v !!}
                                            </th>
                                        @endforeach
                                        <th>
                                            {!! trans('users.ations') !!}
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($clientes as $a => $c)
                                        <tr data-id="{!! $c->id !!}" data-fav= {!! $c->favorito !!}>
                                            @foreach($columns as $k=>$v)
                                                <td>

                                                    @if($k == "web" )

                                                        @if(!empty($c->getWeb()))
                                                            <a href="{!! $c->getWeb() !!}" class="pad-5-5"
                                                               target="_blank">
                                                                <i class="fa p-r-3 fa-globe" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if(!empty($c->getInstagram()))
                                                            <a href="{!! $c->getInstagram() !!}" class="pad-5-5"
                                                               target="_blank">
                                                                <i class="fa p-r-3 fa-instagram"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if(!empty($c->getPinterest()))
                                                            <a href="{!! $c->getPinterest() !!}" class="pad-5-5"
                                                               target="_blank">
                                                                <i class="fa p-r-3 fa-youtube-square"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if(!empty($c->getFacebook()))

                                                            <a href="{!! $c->getFacebook() !!}" class="pad-5-5"
                                                               target="_blank">
                                                                <i class="fa p-r-3 fa-facebook-official"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        @if(!empty($c->getTwitter()))
                                                            <a href="{!! $c->getTwitter() !!}" class="pad-5-5"
                                                               target="_blank">
                                                                <i class="fa p-r-3 fa-twitter-square"
                                                                   aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                        {{--

                                                        @if(!empty($c->getInstagram()))
                                                    <a href="{!! $c->getInstagram() !!}" class="pad-5-5"
                                                       target="_blank">
                                                        <i class="fa p-r-3 fa-youtube-square"
                                                           aria-hidden="true"></i>
                                                    </a>
                                                    @endif
                                                        --}}





                                                    @elseif($k=='telefono')

                                                        @foreach($c->getTelefono() as $y=>$u)
                                                            @if(!empty($u->tel))
                                                                +{{$u->ext}} {{$u->tel}}

                                                                {{--{!! $u->FormatNumber() !!}--}}<br>
                                                            @endif
                                                        @endforeach
                                                    @elseif($k == "id")
                                                        <a href="{!! route('StudClientes.edit',['id'=>$c->id]) !!}">
                                                            {!! Funciones::RellenarCeros($a+1) !!}
                                                        </a>
                                                    @elseif($k == "country_id")
                                                        {!! Funciones::NombrePais($c->getCountryId()) !!}
                                                    @elseif($k == "state_id")
                                                        {!! Funciones::NombreProvincia($c->getStateId()) !!}
                                                    @elseif($k=='nombre' or $k =='name')
                                                        <a href="{!! route('StudClientes.edit',['id'=>$c->id]) !!}">
                                                            {!! $c->{$k} !!}
                                                        </a>

                                                    @elseif($k=='nota')
                                                        {!! Funciones::CortarCadena($c->{$k},130) !!}
                                                    @elseif($k=='categoria')
                                                        {!! trans('stud.categoriacontacto.'.$c->{$k}); !!}

                                                    @else
                                                        {!! $c->{$k} !!}
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td>
                                                {{--@include('backend.content.Clientes.botones.index',['modelo'=>$c])--}}
                                                @include('backend.content.Clientes.botones.dropdown',['modelo'=>$c])
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="col-12 text-center m-t-35 m-b-35">
                                    <div class="offset-md-3 col-md-6 col-12">
                                        {!! trans('stud.nocontactlist') !!}
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{--<div class="offset-3 col-6 text-center ">
                            {{$clientes->render()}}
                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <script>
        $(document).ready(function () {


            var table = $('#tablarev').dataTable({
                "order": [[1, "asc"]],
                "pageLength": 25,
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    //"lengthMenu": "Mostrando _MENU_ registros por pagina",
                    "zeroRecords": "{!! trans('users.zerorecord') !!}",
                    "info": "{!! trans('users.tableinfo') !!}",
                    "loadingRecords": "{!! trans('users.tableloading') !!}",
                    //"processing": "{!! trans('users.tablebusy') !!}",
                    //"search": "Filter records:",
                    "search": "{!! trans('users.tablesearch') !!}",
                    "infoEmpty": "{!! trans('users.tableinfoempty') !!}",
                    "infoFiltered": "{!! trans('users.tableinfofilter') !!}",
                    "emptyTable": "{!! trans('users.tableempty') !!}",
                    "lengthMenu": "{!! trans('users.tableregistros') !!}",
                    "emptyTable": "{!! trans('users.emptyTable') !!}",

                    "paginate": {
                        "first": "{!! trans('users.tablefirst') !!}",
                        "last": "{!! trans('users.tablelast') !!}",
                        "next": "{!! trans('users.tablenext') !!}",
                        "previous": "{!! trans('users.tableprevious') !!}",

                    },
                    {{--
                                "ajax": {
                                    'url': "{!! route('fotospost.index') !!}",
                                    'type': 'POST',
                                    'beforeSend': function (request) {
                                        request.setRequestHeader("X-CSRF-TOKEN", token);
                                        request.setRequestHeader("csrftoken", token);
                                    }

                                },
                                --}}


                },

                "fnInitComplete": function (oSettings, json) {
                    $('#tablarev').on('page.dt', function () {
                        //var info = table.page.info();
                        //console.log( 'Showing page: '+info.page+' of '+info.pages );
                        cargarimagenes();
                        $('.page-link').on('click', function () {
                            cargarimagenes();
                        });
                    });
                },

                //"processing": true,
                //"serverSide": true,
            });
            {{--}}
            var t1 = $('#tablarev').dataTable({
                "ajax": {
                    'url':"{!! route('fotospost.index') !!}",
                    'type':'POST',
                    'beforeSend':function(request){
                        console.log("EEEEEEEEEEEEEEEEEEE");
                        request.setRequestHeader("X-CSRF-TOKEN",token);
                        request.setRequestHeader("csrftoken",token);
                    }

                },
            });
            --}}
            {{--
            t1.ajax.url("http://horse.com/admin/Fotos").load();
                //.url("{!! route('fotospost.index') !!}").load();
            //"http://horse.com/admin/Fotos"
            --}}
            //table.ajax.url("http://horse.com/admin/Fotos").load();

            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });
            $('#tablarev tbody').on('click', 'tr', function () {
                console.log('clicl');
                //var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');
            });
        });

        function BorrarContacto(id) {
            var url = "{!! route('StudClientes.delete') !!}";
            var form = new FormData();
            swal({
                title: '{!! trans('users.borrarcontactotitulo') !!}',
                type: 'info',
                //html: t,
                text: '{!! trans('users.borrarcontacto') !!}',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#fa6900',
                focusConfirm: false,
                confirmButtonText: '{!! trans('text.yes') !!}',
                confirmButtonAriaLabel: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                cancelButtonAriaLabel: '{!! trans('text.no') !!}',
            }).then(function () {
                form.append('id', id);
                axios.post(url, form)
                    .then(function (response) {
                        $('tr[data-id=' + id + ']').remove();
                   })
                    .catch(function (error) {
                        console.dir(error.data);

                        swal(
                            '{!! trans('users.borrarcontactoerro') !!}',
                            error.sms,
                            'error',
                        )


                    });
                //cancelar();
            });
        }

        function Favorito(id) {
            var url = "{!! route('StudClientes.fav') !!}";
            var form = new FormData();
            {{--
            swal({
                title: '{!! trans('users.favoritocontactotitulo') !!}',
                type: 'info',
                //html: t,
                text: '{!! trans('users.favoritocontacto') !!}',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#fa6900',
                focusConfirm: false,
                confirmButtonText: '{!! trans('text.yes') !!}',
                confirmButtonAriaLabel: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                cancelButtonAriaLabel: '{!! trans('text.no') !!}',
            }).then(function () {
                --}}
            form.append('id', id);
            axios.post(url, form)
                .then(function (response) {

                    var s = response.fav;
                    if (s === 0) {
                        //no fav
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        //$('tr[data-fav="1"]').addClass('favorite');
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        //fav
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }


               })
 .catch(function (error) {
                    console.dir(error);
                    console.dir(error.data);

                    swal(
                        '{!! trans('users.favoritocontactoerro') !!}',
                        error.sms,
                        'error',
                    )


                });
            //cancelar();
            {{--});--}}
        }

    </script>
@endsection