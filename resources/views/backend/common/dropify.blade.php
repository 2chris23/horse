@php
    $nombre = (isset($nombre))?$nombre:'MyDropzone';
    $tipo = (isset($tipo))?$tipo:'TipoMyDropzone';
    $MaxFile = (isset($MaxFile))?$MaxFile:5;
    $MaxSize = (isset($MaxSize))?$MaxSize:2;
    $class = (isset($class))?$class:'';
    $imgchange = (isset($imgchange))?$imgchange:'';
    $cambio = (isset($cambio))?$cambio:'';
    $horse = (isset($horse))?$horse:null;
    $link = (isset($link))?$link:null;
    $id = (isset($id))?$id:0;
    $cargapag = (isset($cargapag))?$cargapag:0;
    $show = false; if(!is_numeric($id )){
    $show = true; }
    $arrays = (isset($arrays))?$arrays:'[]';
    $name = (isset($name))?$name:''; /*hidden-xl-down OCULTA EN BS4*/ @endphp {{-- //requiere en la cabecera <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/> //requiere en la cabecera <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script> Dropzone.options.myAwesomeDropzone = false; --}}
<style> .dropify-filename-inner, .dropify-infos-message {
        display: none !important;
    } </style> <input type="file" class="dropify dro_{!! $id !!} deleabe_{!!  $id !!} form-control hidden-xs-up"
                      data-max-file-size="{!!  $MaxSize !!}M" data-min-width="100" data-min-height="100"
                      @if(!empty($link)) data-default-file="{!!  $link !!}"
                      @endif {{--data-max-width="250" data-max-height="250"--}} id="dro_{!!  $nombre !!}[]"
                      name="dro_{!!  $nombre !!}[]"/> {{--{!! dd($name) !!}--}} {{--{!! dd($link) !!}--}} @if(!empty($link))
    <input type="hidden" name="img_{!!  $nombre !!}{!!  $arrays !!}" class="deleabe_{!!  $id !!}"
           value="{!!  $name !!}"> @endif
@if($tipo == 'fb')
    <input type="hidden" name="type" value="{!! $tipo !!}" class="hidden-xs-up">
@endif
<script>
    $(window).on("load", function () {
        @if($cargapag == 0)
        $('.dropify').dropify({
            messages: {
                'default': '{!! Funciones::ReemplazarApostrofe(trans('drop.default')) !!}',
                'replace': '{!! Funciones::ReemplazarApostrofe(trans('drop.replace')) !!}',
                'remove': '{!! Funciones::ReemplazarApostrofe(trans('drop.remove')) !!}',
                'error': '{!! Funciones::ReemplazarApostrofe(trans('drop.error')) !!}'
            },
            imgFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'bmp'],
            maxFileSizePreview: "{!!  $MaxSize !!}M",
            error: {
                'fileSize': '{!! Funciones::ReemplazarApostrofe(trans('drop.fileSize')) !!}',
                'minWidth': '{!! Funciones::ReemplazarApostrofe(trans('drop.minWidth')) !!}',
                'maxWidth': '{!! Funciones::ReemplazarApostrofe(trans('drop.maxWidth') )!!}',
                'minHeight': '{!! Funciones::ReemplazarApostrofe(trans('drop.minHeight')) !!}',
                'maxHeight': '{!! Funciones::ReemplazarApostrofe(trans('drop.maxHeight') )!!}',
                'imageFormat': '{!! Funciones::ReemplazarApostrofe(trans('drop.imageFormat') )!!}',
                'fileExtension': '{!! Funciones::ReemplazarApostrofe(trans('drop.fileExtension') )!!}',
            },
        }).removeClass('hidden-xs-up');
        @endif
        @if(is_numeric($id !=0) or $show == true )

        $('.dro_{!!  $id !!}').on('dropify.beforeClear', function (event, element) {
            swal({
                title: '{!! Funciones::ReemplazarApostrofe( (trans('users.usure'))) !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! Funciones::ReemplazarApostrofe( (trans('text.yes'))) !!}',
                cancelButtonText: '{!! Funciones::ReemplazarApostrofe( (trans('text.no'))) !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! Funciones::ReemplazarApostrofe( (trans('users.deleteimage')) )!!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                axios.post('{!! Funciones::ReemplazarApostrofe( route('erase.media') )!!}', {
                    photo: '{!!  $id !!}',
                }).then(function (response) {
                    {{-- //console.log(response); --}} swal('{!! Funciones::ReemplazarApostrofe( (trans('users.applychange'))) !!}', '{!! Funciones::ReemplazarApostrofe( (trans('users.successchange'))) !!}', 'success');

                    $('.deleabe_{!!  $id !!}').remove();
                }).catch(function (error) {
                    swal('{!! Funciones::ReemplazarApostrofe(trans('error.borando')) !!}!', '{!! Funciones::ReemplazarApostrofe(trans('drop.error')) !!}.', 'error')
                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal('{!! Funciones::ReemplazarApostrofe( (trans('users.canceltask'))) !!}', '{!! Funciones::ReemplazarApostrofe( (trans('users.cancelmodal'))) !!}', 'error')
                }
            });
            /*Alerta y envio para borrar*/ {{-- //return confirm("Do you really want to delete \"" + element.filename + "\" ?"); --}} });
        @endif
        $('.dropify-filename-inner').css('display', 'none');
        $('.dropify-infos-message').css('display', 'none');
    }); </script> {{-- <div id="dro_{!!  $nombre !!}" class="col-12 {!!  $class !!}"> <div class="col-xs-12"> <div id="{!!  $nombre !!}" class="dropzone dropzone-previews dz-clickable "> <div class="dz-default dz-message"> <span> {!! trans('text.drop_file') !!} </span> </div> </div> </div> <div class="col-4 m-t-10"> <input required="required" type="submit" value="{!! trans('text.save') !!}" class="btn btn-warning pull-left hidden form-control drp_action_{!!  $nombre !!} btn-drp-{!!  $nombre !!} "> </div> </div> --}}
