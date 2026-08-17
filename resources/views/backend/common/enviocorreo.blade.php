@php
/*
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $requerido = (isset($requerido))?$requerido:'';
    $principales = trans('stud.categoriacontacto');
*/
/*
 $id = $r->id;
        $titulo = $r->titulo;
        $contenido = $r->contenido;
        $correos = $r->correos;
        */
@endphp

{{--

<form class="col-12" id="mailcaballos">
    <div class="col-12">
        Ingresa las direcciones de correo de los destinatarios (separados por comas)
    </div>
    <div class="col-12">
        <input type="text" name="correodestinatario" class="form-control">
    </div>
    <div class="col-12">
        Escribe un titulo para el mensaje
    </div>
    <div class="col-12">
        <input type="text" name="titulomail" class="form-control">
    </div>
    <div class="col-12">
        Escribe un mensaje a los destinatarios
    </div>
    <div class="col-12">
        <textarea name="mensajedestinatario" id="" cols="30" rows="10" class="form-control  "></textarea>
    </div>
    <input type="hidden" name="caballomail">
</form>
<div class="tag-box editable"
                                             data-no-duplicate="true"
                                             data-tags-input-name="words"
                                             id="tagBox1">{!! $stud->getWords() !!}</div>


<div class="tag-box" data-no-duplicate="true" data-tags-input-name="words" id="tagBox1d"> </div>
--}}
<script>

    function EnviarPorMail(id,nombre){
        var url = "{!! route('horse.sendmail') !!}";
        var formData = new FormData(document.getElementById('mailcaballos'));
        {{--
        $(".tag-box").tagging({
            "no-duplicate": true,
            "tags-input-name": "words",
            "edit-on-delete": false,
        });
        --}}
        swal({
            title: 'Enviar a '+nombre+' por email',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '{!! trans('text.yes') !!}',
            cancelButtonText: '{!! trans('text.no') !!}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonColor: '#4fb7fe',
            html: '<form class="col-12" id="mailcaballos">' +
            '    <div class="col-12 text-left">' +
            '        Ingresa las direcciones de correo de los destinatarios (separados por comas)' +
            '    </div>' +
            '    <div class="col-12 m-t-10">' +
            '        <input type="text" name="correodestinatario" class="form-control">' +
            {{--'        <div class="tag-box" data-no-duplicate="true" data-tags-input-name="words" id="tagBox1d"> </div>' +--}}
                '    </div>' +
            '    <div class="col-12 m-t-10  text-left">' +
            '        Escribe un titulo para el mensaje' +
            '    </div>' +
            '    <div class="col-12 m-t-10">' +
            '        <input type="text" name="titulomail" class="form-control">' +
            '    </div>' +
            '    <div class="col-12 m-t-10  text-left">' +
            '        Escribe un mensaje a los destinatarios' +
            '    </div>' +
            '    <div class="col-12 m-t-10">' +
            '        <textarea name="mensajedestinatario" id="mensajedestinatario" cols="20" rows="5" class="form-control  "></textarea>' +
            '    </div>' +
            '    <input type="hidden" id="caballomail" name="caballomail" value="'+id+'">' +
            '</form>',
            cancelButtonColor: '#EF6F6C',
            buttonsStyling: false
        }).then(function () {
            /**/
            $.each($('#mailcaballos [type=text]'),function(k,v){
                formData.append($(v).attr('name'),$(v).val());
            });
            formData.append('caballomail',$('#caballomail').val());
            formData.append('mensajedestinatario', $('#mensajedestinatario').val());
            axios.post(url, formData)
                .then(function (response) {
                    console.dir(response);
                    swal(
                        '',
                        response.data.sms,
                        'success'
                    )

               })
                .catch(function (error) {
                    console.error('error');
                    console.dir(error);

                    console.dir(error.data);
                    swal(
                        'Error enviando correo',
                        error.data.sms,
                        'error'
                    )
                });
            /**/
        }, function (dismiss) {
            /*
            if (dismiss === 'cancel') {
                swal(
                    '{!! trans('users.canceltask') !!}',
                    '{!! trans('users.cancelmodal') !!}',
                    'error'
                )
            }
            */
       });

    }
</script>
