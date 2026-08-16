@php($cd = null);
@if(!empty($cd))
    <script>
        @endif
        {{--<script src="{!! url('js/tags/tagging.js') !!}"></script>--}}

        $(document).ready(function () {

            $(window).hover(function () {
                cargarimagenes();
                $('tr[data-fav="1"]').addClass('favorite');
            });
            $('#tabla tbody').on('click', 'tr', function () {
                console.log('clicl');
                {{--//var data = table.row(this).data();
                //alert('You clicked on ' + data[0] + '\'s row');--}}
            });
        });

        function deleteit(id) {
            var dat = new FormData();

            dat.append('seti', '');
            var url = "{!! route('caballoc.del') !!}" + "/" + id;

            swal({
                title: '¿Estas seguro de borrar este caballo?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '<span class="mensajepeque">Se eliminarán todos las imagenes y registros de este caballo.</span>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            {{--//no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                        }
                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            {{--console.dir(v);--}}
                        }
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                        '{!! Funciones::ReemplazarApostrofe(trans('users.cancelmodal')) !!}',
                        'error'
                    )
                }
           });


            dat = null;

        }

        function setfav(id, valu) {
            {{--//caballoc.fav--}}
            var dat = new FormData();
            dat.append('seti', valu);
            var url = "{!! route('caballoc.fav') !!}" + "/" + id;
            $.ajax({
                url: url,
                data: dat,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                async: false,
                type: 'POST',
                success: function (data) {
                    var s = $.parseJSON(data);
                    {{--console.dir(s);--}}
                    if (s === 0) {
                        {{--//no fav
                        //$('tr[data-id=128]').removeClass('favorite');--}}
                        $('tr[data-id=' + id + ']').removeClass('favorite').attr('data-fav', 0);
                        $('#favorite_si_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_no_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    } else {
                        {{--//fav--}}
                        $('tr[data-id=' + id + ']').addClass('favorite').attr('data-fav', 1);
                        $('#favorite_no_' + id).addClass('hidden-xl-down').prop('checked', false);
                        $('#favorite_si_' + id).removeClass('hidden-xl-down').prop('checked', true);
                    }
                },
                error:
                    function (xhr, status, error) {
                        var v = $.parseJSON(xhr.responseText);
                        console.error('error');
                        {{--console.dir(v);--}}
                    }
            });
            dat = null;

        }

                @if(\Session::has('facebook'))
        var tace = "{!! \Session::get('facebook') !!}";
        swal({
            title: 'Puedes compartir el caballo {!! \Session::get('horse_name') !!} por facebook',
            type: 'success',
            showCancelButton: true,
            confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
            cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonColor: '#4fb7fe',
            html: '¿Quieres compartirlo ahora?',
            cancelButtonColor: '#EF6F6C',
            buttonsStyling: false
        }).then(function () {
            window.open('https://www.facebook.com/sharer.php?u=' + tace, 'Compartir caballo', 'resizable=no,height=200,width=300,scrollbars=no');
            {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
        }, function (dismiss) {

        });

        {!! \Session::forget('facebook') !!}
        {!! \Session::forget('horse_name') !!}

        @endif
        function ComparteFb(url, name) {
            window.open('https://www.facebook.com/sharer.php?u=' + url, 'Comparte a ' + name, 'resizable=no,height=200,scrollbars=no');
            {{--
            swal({
                title: 'Compartir por Facebook',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes') !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Quieres compartir a ' + name + ' por facebook ahora?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                window.open('https://www.facebook.com/sharer.php?u=' + url, 'Comparte a ' + name, 'resizable=no,height=200,scrollbars=no');
                {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");-- }}
            }, function (dismiss) {

           });
            --}}
        }

        function Vendido(id) {
            swal({
                title: 'Confirmación de venta',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Has vendido este caballo?<br><span class="mensajepeque">Puedes consultar tus caballos vendidos en tu historia de ventas.</span>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                var url = "{!! route('horse.vendido') !!}" + "/" + id;
                var dat = new FormData();
                dat.append('seti', id);
                $.ajax({
                    url: url,
                    data: dat,
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'csrftoken': token,
                    },
                    contentType: false,
                    processData: false,
                    async: false,
                    type: 'POST',
                    success: function (data) {
                        var s = $.parseJSON(data);
                        if (s === 1) {
                            {{--//no fav--}}
                            $('.horse_' + id).addClass('hidden-xl-down').prop('checked', false);
                            swal(
                                '{!! Funciones::ReemplazarApostrofe(trans('users.canceltask')) !!}',
                                '',
                                'success'
                            )
                        }

                    },
                    error:
                        function (xhr, status, error) {
                            var v = $.parseJSON(xhr.responseText);
                            console.error('error');
                            {{--console.dir(v);--}}
                        }
                });
            }, function (dismiss) {

           });
        }


        function Visitas(url, cantidad, name) {
            swal({
                title: 'Visitas',
                type: 'success',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.yes')) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe(trans('text.no')) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: name + ' ha sido visitado ' + cantidad + ' veces<br>¿Quieres visitar su página? ',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                window.open(url);
                {{--window.open(tace, 'Compartir caballo', "resizable=no,height=200,scrollbars=no");--}}
            }, function (dismiss) {
           });
        }

        @php($cd = null);
        @if(!empty($cd))
    </script>


@endif

{{--
    <!--var table = $('#tabla').dataTable({
"order": [[0, "asc"]],
"pageLength": 25,
"language": {
"decimal": ",",
"thousands": ".",
{{--//"lengthMenu": "Mostrando _MENU_ registros por pagina",-- }}
            "zeroRecords": "{!! Funciones::ReemplazarApostrofe(trans('users.zerorecord') !!}",
"info": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfo') !!}",
"loadingRecords": "{!! Funciones::ReemplazarApostrofe(trans('users.tableloading') !!}",
{{--//"processing": "{!! Funciones::ReemplazarApostrofe(trans('users.tablebusy') !!}",-- }}
            //"search": "Filter records:",}}
            "search": "{!! Funciones::ReemplazarApostrofe(trans('users.tablesearch') !!}",
"infoEmpty": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfoempty') !!}",
"infoFiltered": "{!! Funciones::ReemplazarApostrofe(trans('users.tableinfofilter') !!}",
"emptyTable": "{!! Funciones::ReemplazarApostrofe(trans('users.tableempty') !!}",
"lengthMenu": "{!! Funciones::ReemplazarApostrofe(trans('users.tableregistros') !!}",
"emptyTable": "{!! Funciones::ReemplazarApostrofe(trans('users.emptyTable') !!}",
"paginate": {
"first": "{!! Funciones::ReemplazarApostrofe(trans('users.tablefirst') !!}",
"last": "{!! Funciones::ReemplazarApostrofe(trans('users.tablelast') !!}",
"next": "{!! Funciones::ReemplazarApostrofe(trans('users.tablenext') !!}",
"previous": "{!! Funciones::ReemplazarApostrofe(trans('users.tableprevious') !!}",

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
            -- }}


            },

            "fnInitComplete": function (oSettings, json) {
            $('#tabla').on('page.dt', function () {
{{--//var info = table.page.info();
//console.log( 'Showing page: '+info.page+' of '+info.pages );-- }}
            cargarimagenes();
            $('.page-link').on('click', function () {
            cargarimagenes();
            });
            });
            },

{{--//"processing": true,
    //"serverSide": true,-- }}
            });
{{-- }}
var t1 = $('#tabla').dataTable({
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
-- }}
    {{--
    t1.ajax.url("http://horse.com/admin/Fotos").load();
        //.url("{!! route('fotospost.index') !!}").load();
    //"http://horse.com/admin/Fotos"
    //table.ajax.url("http://horse.com/admin/Fotos").load();
    -- }}

            @endif-->
--}}