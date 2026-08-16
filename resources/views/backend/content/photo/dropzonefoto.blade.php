@php($user = isset($user)?$user:null)
@php($stud = !empty($user)?$user->Yeguada():null)
@php($tiempoaviso = 60000)
@php
    if(\Auth::user()->isAdm() != true){
$yegu = \Auth::user()->Yeguada();
$marca = $yegu->Marca();
$mostrarmarca = 0;
$agua = 0;
if(!empty($marca)){
$mostrarmarca = 1;
$agua = $yegu->MarcaAgua()->first()->status;
}
}

@endphp
@if(!empty($cd))
    <script>

                @endif

                {{--DROPZONE--}}
        var rspt = null;

        var horse_id = 0;
        Dropzone.autoDiscover = false;
        Dropzone.options.myAwesomeDropzone = false;
        var typep_gallery_drop = 'gallery';
        var subida_gallery_drop = 0;
        var dropconp_gallery_drop = {
            url: "{!!route('imagenes')!!}",
            method: "post",
            maxFilesize: 5,
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 20,
            headers: {
                'X-CSRF-TOKEN': token,
                'csrftoken': token,
            },
            acceptedFiles: 'image/' + '*',
            clickable: '#gallery_drop',
            init: function () {
                var myDropzone = this;
                $(".btn-drp-gallery_drop").click(function (e) {
                    {{--// Make sure that the form isn't actually being sent.--}}
                    e.preventDefault();
                    e.stopPropagation();
                    $(this).html("{!! Funciones::ReemplazarApostrofe(trans('users.sending')) !!}");
                    if ($("#gallery_drop").hasClass("dz-started")) {
                        {{--// eligio archivos pa subir--}}
                        if (drp_action_gallery_drop === 1) {
                            myDropzone.processQueue();
                            drp_action_gallery_drop = 0;
                        }

                    } else {
                        {{--// no esta subiendo archivos--}}
                        {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                    }
                    {{--//saveDatosContacto();--}}
                });
                this.on("sendingmultiple", function () {
                });
                this.on("successmultiple", function (files, response) {
                    archivos_ya_subieron = 1;
                    nombres_archivos = response;
                    GalleryUpload = 1;
                    {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                    {{--//alert("subiendo todo bien");--}}

                });
                this.on("errormultiple", function (files, response) {
                    {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFileError') !!}");--}}

                        GalleryUpload = 1;
                });
                this.on('sending', function (file, xhr, formData) {
                    {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesUp') !!}");--}}
                    formData.append('type', typep_gallery_drop);
                    @if($mostrarmarca!=0)
                    {{-- para marca de agua predeterminada --}}
                    formData.append('marca', $('#marcapredetermianda').val());
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

                    rspt = response.el;
                    rspt = rspt.replace('\n', '');
                    rspt = rspt.replace('\\', '');
                    var sa = '<div class="col-3 m-t-20 ">' + rspt + '</div>';
                    $("#photos").append(sa);
                    cargarimagenes();
                    myDropzone.removeFile(file);
                    /*
                    var saad = "";
                    $.each(rspt, function (k, v) {
                        saad = v.replace('\n', '');
                        saad = saad.replace('\\', '');
                        $("#photos").append(saad);
                        cargarimagenes()

                    });
*/

                    {{--UpdateStatus("{!! Funciones::ReemplazarApostrofe(trans('entity.GalleryFilesEnd') !!}");--}}
                    {{--//console.log(response);--}}
                });
                this.on("addedfile", function (file) {
                            {{--// Create the remove button
                            //var removeButton = Dropzone.createElement("<button>Remove file</button>");--}}
                    var removeButton = Dropzone.createElement('<a href="javascript:void(0)" class="btn btn-warning pull-right remover">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                            {{--// Capture the Dropzone instance as closure.--}}
                    var _this = this;
                    {{--// Listen to the click event--}}
                    removeButton.addEventListener("click", function (e) {
                        _this.removeFile(file);
                    });
                    {{--// Add the button to the file preview element.--}}
                    file.previewElement.appendChild(removeButton);
                });
                this.on("error", function (file, response) {
                    {{--// do stuff here.--}}
                    console.error('error 51');
                    GlobalError = 1;
                    var ErrorSms = Dropzone.createElement(response.sms + '<br><a class="dz-remove" href="javascript:undefined;" data-dz-remove="">{!! Funciones::ReemplazarApostrofe(trans('text.RemoveFile')) !!}</a>');
                    ErrorSms.addEventListener("click", function (e) {
                        myDropzone.removeFile(file);
                    });
                    $(file.previewElement).find('.dz-error-message').text("").append(response).append(ErrorSms);


                });

            }
        };

        {{--//called when key is pressed in textbox
        //var dp_gallery_drop=new Dropzone("div#gallery_drop", dropconp_gallery_drop);
        //$(window).on('load',--}}
        $(document).ready(
            function () {
                $('.drp_action_gallery_drop').on('click', function () {
                    drp_action_gallery_drop = 1;
                });
                new Dropzone("div#gallery_drop", dropconp_gallery_drop);
            });

        {{--DROPZONE--}}
        @if(!empty($cd))
    </script>
@endif