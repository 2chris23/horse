@php
    $nombre = (isset($nombre))?$nombre:'MyDropzone';
    $tipo = (isset($tipo))?$tipo:'TipoMyDropzone';
    $MaxFile = (isset($MaxFile))?$MaxFile:5;
    $class = (isset($class))?$class:'';
    $imgchange = (isset($imgchange))?$imgchange:'';
    $cambio = (isset($cambio))?$cambio:'';
    $horse = (isset($horse))?$horse:null;
    $oculto = (isset($oculto))?$oculto:false;
    $stud = (isset($stud))?$stud:null;
    $mostrarmarca = 0;
    $agua = 0;
    if(\Auth::user()->isAdm() != true){
    $yegu = \Auth::user()->Yeguada();
    $marca = $yegu->Marca();


        if(!empty($marca)){
            $mostrarmarca = 1;
            $agua = $yegu->MarcaAgua()->first()->status;
        }
    } /*hidden-xl-down OCULTA EN BS4*/

@endphp

{{--
//requiere en la cabecera <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
//requiere en la cabecera <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
Dropzone.options.myAwesomeDropzone = false;
--}}
<div id="dro_{!! $nombre !!}" class="col-12 {!! $class !!}"
     data-toggle="popover" data-trigger="hover" data-placement="bottom"
     title="{!! trans('popover.horse.imagenes.titulo') !!}"
     data-content="{!! trans('popover.horse.imagenes.contenido') !!}"
>
    <div class="offset-1 col-10">
        <div id="{!! $nombre !!}" class="dropzone dropzone-previews dz-clickable 
">
            <div class="dz-default dz-message">
<span><i class="fa fa-cloud-upload fa-6" aria-hidden="true" style=" 
font-size: 60px;"></i></span>
                <span>
<br>
                    {!! trans('text.drop_file') !!}
</span>
            </div>
        </div>
    </div>
    <div class="col-4 m-t-10" @if($oculto != false)style="display:none"@endif>
        <input required="required" type="submit" value="{!! trans('text.save') !!}"
               class="btn btn-warning pull-left hidden form-control drp_action_{!! $nombre !!} btn-drp-{!! $nombre !!} ">
    </div>
</div>
@if($mostrarmarca !=0)
    <div class="col-12 text-center m-t-10">
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col-3 predeterminadrmarca m-t-20"
                 data-check="{!! $agua !!}" @include('backend.common.marcahelp')>
 <span class="nopredeterminado text-red @if($agua!=0) hidden-xs-up @endif">
    <i class="fa fa-times"></i>
 </span>
                <span class="predeterminado text-success @if($agua!=1) hidden-xs-up @endif">
 <i class="fa fa-check"></i>
 </span>
                @if($agua == 1)
                    <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                @else
                    <span class="campopredeterminado"> {!! trans('desing.watermark') !!} </span>
                @endif

                <input type="hidden" name="marcapredetermianda" id="marcapredetermianda"
                       value="{!! $agua !!}">
            </div>
        </div>
    </div>
@endif
{{--{!!Form::submit(trans('text.submit'), ['required' => 'required', 'class' => 'btn btn-warning pull-right hidden btn-drp-{!! $nombre !!} mtop-10', 'id'=> 'send1'])!!}--}}
<script>
    var rspt = null;
            @if(($horse!== null))
    var horse_id ={{$horse}};
            @else
    var horse_id = 0;
    @endif
        Dropzone.autoDiscover = false;
    Dropzone.options.myAwesomeDropzone = false;
    var typep_{!! $nombre !!} = '{!! $tipo !!}';
    var subida_{!! $nombre !!} = 0;
    var dropconp_{!! $nombre !!} = {
        url: "{!!route('imagenes')!!}",
        method: "post",
        @if(($horse!== null))
                {{--autoProcessQueue: false,--}}
                @endif
        maxFilesize: 5,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: {!! $MaxFile !!},
        headers: {
            'X-CSRF-TOKEN': token,
            'csrftoken': token,
        },
        acceptedFiles: 'image/*',
        clickable: '#{!! $nombre !!}',
        init: function () {
            var myDropzone = this;
            $(".btn-drp-{!! $nombre !!}").click(function (e) {
                {{-- // Make sure that the form isn't actually being sent. --}}
                e.preventDefault();
                e.stopPropagation();
                $(this).html("{!! Funciones::ReemplazarApostrofe(trans('users.sending')) !!}");
                if ($("#{!! $nombre !!}").hasClass("dz-started")) {
                    {{--
                    // eligio archivos pa subir
                    if (entity_id !== "") {--}}
                            {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.ProcessingGalleryImage') !!}");--}}
                            @if(($horse!== null))
                    if (horse_id !== 0) {
                        myDropzone.processQueue();
                    }
                    @else
                    if (drp_action_{!! $nombre !!} === 1) {
                        myDropzone.processQueue();
                        drp_action_{!! $nombre !!} = 0;
                    }
                    @endif
                    {{--AdviceOnline("Error subiendo los archivos:<br>Debes crear la entidad", "");--}}
                    {{--} else {
                    }--
                    --}}
                } else {
                    {{--// no esta subiendo archivos UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                }
                {{-- //saveDatosContacto(); --}}
            });
            this.on("sendingmultiple", function () {
            });
            this.on("successmultiple", function (files, response) {
                archivos_ya_subieron = 1;
                nombres_archivos = response;
                GalleryUpload = 1;
                {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                {{-- //alert("subiendo todo bien"); --}}
                @if($imgchange!='')
                $('.{!! $imgchange !!}>figure>img').prop('src', response.url);
                $('.{!! $imgchange !!}').removeClass('hidden-xl-down');
                $('#dro_{!! $nombre !!}').addClass('hidden-xl-down');
                @endif
                @if(!empty($cambio))
                $('#{!! $cambio !!}').prop('src', response.url);
                @endif
            });
            this.on("errormultiple", function (files, response) {
                {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFileError') !!}");--}}
                    GalleryUpload = 1;
            });
            this.on('sending', function (file, xhr, formData) {
                {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesUp') !!}");--}}
                formData.append('type', typep_{!! $nombre !!});
                @if($mostrarmarca!=0)
                {{-- para marca de agua predeterminada --}}
                formData.append('marca', $('#marcapredetermianda').val());
                @endif
                @if(($horse!== null))
                formData.append('id', horse_id);
                @endif
                @if(\Auth::user()->isAdm() and !empty($stud))
                formData.append('stud_id', {!! $stud->id !!});
                @endif
            });
            this.on('queuecomplete', function () {
                {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
            });
            this.on("success", function (file, response) {
                GalleryUpload = 1;
                @if($imgchange!='')
                $('.{!! $imgchange !!}>figure>img').prop('src', file.url);
                $('.{!! $imgchange !!}').removeClass('hidden-xl-down');
                $('#dro_{!! $nombre !!}').addClass('hidden-xl-down');
                @endif
                @if(!empty($cambio))
                $('#{!! $cambio !!}').prop('src', file.url);
                @endif
                    rspt = response.el;
                rspt = rspt.replace('\n', '');
                rspt = rspt.replace('\\', '');
                var sa = '<div class="col-3 m-t-20 ">' + rspt + '</div>';
                $("#photos").append(sa);
                cargarimagenes();
                {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                {{-- //console.log(response); --}}
            });
            this.on("addedfile", function (file) {
                        {{-- // Create the remove button
                        //var removeButton = Dropzone.createElement("<button>Remove file</button>"); --}}
                var removeButton = Dropzone.createElement('<a href="javascript:void(0)" class="btn btn-warning pull-right remover">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                        {{-- // Capture the Dropzone instance as closure. --}}
                var _this = this;
                {{-- // Listen to the click event --}}
                removeButton.addEventListener("click", function (e) {
                    _this.removeFile(file);
                });
                {{-- // Add the button to the file preview element. --}}
                file.previewElement.appendChild(removeButton);
            });
            this.on("error", function (file, response) {
                {{-- // do stuff here. --}}
                console.dir(response);
                GlobalError = 1;
                var ErrorSms = Dropzone.createElement(response.sms + '<br><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                ErrorSms.addEventListener("click", function (e) {
                    myDropzone.removeFile(file);
                });
                $(file.previewElement).find('.dz-error-message').text("").append(response).append(ErrorSms);
            });
        }
    };
    {{-- //called when key is pressed in textbox
    //var dp_{!! $nombre !!}=new Dropzone("div#{!! $nombre !!}", dropconp_{!! $nombre !!});
    //$(window).on('load', --}}
    $(document).ready(
        function () {
            $('.drp_action_{!! $nombre !!}').on('click', function () {
                drp_action_{!! $nombre !!} = 1;
            });
            new Dropzone("div#{!! $nombre !!}", dropconp_{!! $nombre !!});
        });
    $(window).on('load', function () {
        $('.predeterminadrmarca').on('click', function () {
                    {{-- //nopredeterminado 
                    predeterminado 
                    campopredeterminado 
                    #marcapredetermianda $aguapre --}}
            var s = $(this).attr('data-check');
            if (s == 0) {
                $(this).attr('data-check', 1);
                $('.nopredeterminado').addClass('hidden-xs-up');
                $('.predeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                $('#marcapredetermianda').val(1);
            } else {
                $(this).attr('data-check', 0);
                $('.predeterminado').addClass('hidden-xs-up');
                $('.nopredeterminado').removeClass('hidden-xs-up');
                $('.campopredeterminado').html('{!! Funciones::ReemplazarApostrofe(trans('desing.watermark')) !!}');
                $('#marcapredetermianda').val(0);
            }
        });
    }); </script>