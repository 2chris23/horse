@php($stud = \Auth::user()->Yeguada())
@extends('backend.layouts.base')
@section('title', trans('Titulos.DesingStud') )
@section('topcss')
    <script>var mov = 0;</script>
    <style>
        /*
        .swal2-modal {
            min-height: 300px;
        }
        */
        .cr-vp-square {
            border: 2px dotted #fff !important;
            /*border: 1px solid #fff !important;*/
        }
    </style>
    <link rel="Stylesheet" type="text/css" href="{!! url('css/jPicker-1.1.6.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>
    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    <link type="text/css" rel="stylesheet"
          href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('js/tags/tag.css')!!}"/>
    {{--
    <style>
        .gallery-style {
            width: 100px !important;
            height: 70px !important;
        }

        .gallery-elem {
            margin-right: 10px !important;
            margin-top: 10px !important;
        }
    </style>
    --}}
@endsection

@section('topjs')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
    @php($ima = \Auth::user()->Yeguada()->getSliders())
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.js"></script>
    {{--
    @php($viewport=[0=> 256,1=> 144])
    @php($boundary=[0=> 384,1=> 216])
    --}}
    {{--
    @php($boundary=[0=> 1920,1=> 685])
    @php($viewport=[0=> 1920,1=> 685])
    --}}
    @php($ancho = 640)

    @php($boundary=[0=> ($ancho * 1.2),1=> ($ancho*0.356666666666)])
    @php($viewport=[0=> $ancho,1=> ($ancho*0.356666666666)])

    <script>

        function CoverData(url, id, data) {
            {{-- //var data = $('#dataBlob').val(); --}}
            if (data.length < 1) {
                return true;
            }
            var formData = new FormData(document.getElementById('FormBlob'));
            UpdateStatus("{!! trans('common_croppie.ChangeImage') !!}");
            var blob = base64toBlob(limpliarblob(data), mimeblob(data));
            var request = new XMLHttpRequest();
            var GetInfo = null;
            request.open('POST', url, false);
            formData.append("imagen_id", id);
            {{-- 
            //UpdateStatus("{!! trans('common_croppie.PuttingImgToRequest') !!}");
            //UpdateStatus("{!! trans('common_croppie.SendingImg') !!}");
            --}}
            formData.append("cover_file", new File([blob], URL.createObjectURL(blob)));

            request.send(formData);
            GetInfo = jQuery.parseJSON(request.response);
            var code = GetInfo.status;
            if (GetInfo.status == 200) {


                return true;
                {{-- 
                    console.dir(GetInfo);
                    //UpdateStatus({!! trans('common_croppie.FinishOk') !!});
                // ok
                // window.location.replace(GetInfo.url);
                //return false;
                --}}
            } else {
                {{-- 
                //UpdateStatus({!! trans('common_croppie.FinishFail') !!});
                //AdviceOnline({!! trans('common_croppie.Error') !!});
                --}}
                    return false;
            }
            ;


        };

        function Cropper(cropzone, UploadElement, elemento, url_ = null) {

            var elemento_t = cropzone.croppie({
                viewport: {
                    width: {!! $viewport[0] !!},
                    height: {!! $viewport[1] !!}
                },
                boundary: {
                    width: {!! $boundary[0] !!},
                    height: {!! $boundary[1] !!}
                },
                enforceBoundary: false,
                enableExif: true,
            }).css("border", "1px dotted #fff");

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        cropzone.addClass('ready');
                        $('#botones').css('display', '');
                        elemento_t.croppie('bind', {
                            url: e.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });

                    };
                    reader.readAsDataURL(input.files[0]);
                }
                else {
                    swal("Sorry - you're browser doesn't support the FileReader API");
                }
            };

            if (url_ !== null) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        {{-- 
                        //this.response is what you're looking for
                        // handler(this.response);
                        //var img = document.getElementById('lightbox_image');--}}
                        console.log(this.response, typeof this.response);

                        var url = window.URL || window.webkitURL;
                        destino = url.createObjectURL(this.response);
                        cropzone.addClass('ready');
                        elemento_t.croppie('bind', {
                            url: destino
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });
                        {{--
                                                //img.src = url.createObjectURL(this.response);
                                                //console.log(img.src); --}}
                    }
                }
                xhr.open('GET', url_);
                xhr.responseType = 'blob';
                xhr.send();

            }
            ;


            UploadElement.on('change', function () {
                readFile(this);
            });
            CropperExist = 1;


            return elemento_t;
        }

        function SendCrop(elemento, dabal) {
            elemento.croppie('result', {
                {{-- //type: 'base64', --}}
                format: 'jpeg',
                quality: 0.7,
                size: 'original'
            }).then(function (resp) {
                {{-- //$('#dataBlob').val(resp); --}}
                $(dabal).val(resp);
            });
            return true;
        }

        function SetBlob(el, Blob) {
            //$("#cover_blob").val(Blob);
            $(el).val(Blob);
        }

        function obtenerblobl(url, destino) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    {{-- //this.response is what you're looking for
                    // handler(this.response);
                    //var img = document.getElementById('lightbox_image'); --}}
                    console.log(this.response, typeof this.response);

                    var url = window.URL || window.webkitURL;
                    destino = url.createObjectURL(this.response);
                    {{--
                                        //img.src = url.createObjectURL(this.response);
                                        //console.log(img.src); --}}
                }
            }
            xhr.open('GET', url);
            xhr.responseType = 'blob';
            xhr.send();
        };

        function b64toBlob(b64Data, contentType, sliceSize) {
            contentType = contentType || '';
            sliceSize = sliceSize || 512;

            var byteCharacters = atob(b64Data);
            var byteArrays = [];

            for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                var slice = byteCharacters.slice(offset, offset + sliceSize);

                var byteNumbers = new Array(slice.length);
                for (var i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }

                var byteArray = new Uint8Array(byteNumbers);

                byteArrays.push(byteArray);
            }

            var blob = new Blob(byteArrays, {type: contentType});
            return blob;
        }

        function enviarimagen(form, imgurl, index, id = null) {
            if (imgurl === undefined) return form;
            if (imgurl === null) return form;
            var block = imgurl.split(';');
            //console.dir(block);
            if (block[0].length < 2) return form;
            var contentType = block[0].split(":")[1];
            var realData = block[1].split(",")[1];
            var blob = b64toBlob(realData, contentType);

            {{-- // Create a FormData and append the file
            //var fd = new FormData(form); --}}
            form.append("image[" + index + "]", blob);
            form.append("image_id[" + index + "]", id);
            {{-- //form.append('image', $('input[type=file]')[index].files[index]); --}}
                return form;

        }


    </script>
@endsection

@section('content')
    {{--
    Color principal
    Imagen cabecera
    Sliders
    Slide portada
    --}}
    {{--
    $('#principal').css('display','none');
    $('#secundario').css('display','');
    --}}


    <div class="card col-12 " id="page1">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('desing.youweb') !!}
            </div>
            <form class="col-12 " id="pages" enctype="multipart/form-data">
                <div class="col-12 m-t-25">
                    <div class="row">
                        <div class="col-md-12 text-xs-center m-t-35">
                            @include('backend.common.headers',['head'=>$stud->getHeader()])
                            @include('backend.common.footer',['$footer'=>$stud->getFooter()])


                            <div class="form-group row m-t-35">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('desing.tittleweb') !!}
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <input id="tittles" type="text"
                                           placeholder="{{trans('stud.placeholder.name')}}"
                                           value="{!! $stud->getTitulo() !!}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('desing.desciptionweb') !!}
                                </label>

                                <div class="col-xs-10 col-sm-10 col-md-6">
                                <textarea name="descriptions" class="form-control" id="descriptions"
                                          value="{!! $stud->seodescripcion !!}" cols="50"
                                          rows="3">{!! $stud->seodescripcion !!}</textarea>
                                    {{--
                                    <input id="descriptions" type="text"
                                           placeholder="{{trans('stud.placeholder.name')}}"
                                           value="{!! $stud->getSeodescripcion() !!}" class="form-control">--}}
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    Google Analitics
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <input id="ga" name="ga" type="text"
                                           placeholder="Codigo de Google Analitics"
                                           value="{!! $stud->getGa() !!}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('desing.wordsweb') !!}
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <div class="tag-box"
                                         data-no-duplicate="true"
                                         data-tags-input-name="words"
                                         id="tagBox1">{!! $stud->getWords() !!}</div>
                                    {{--
                                    <input id="words" type="text"
                                           placeholder="{{trans('stud.placeholder.name')}}"
                                           value="{!! $stud->getWords() !!}" class="form-control">
                                    --}}
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('desing.colorweb') !!}
                                </label>
                                <div class="col-xs-10 col-sm-10 col-md-6">
                                    <span id="Expandable"></span>
                                </div>
                            </div>
                            <div class="form-group row m-t-30">
                                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                                    {!! trans('desing.imgweb') !!}
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    {{--@include('backend.common.dropzone',['nombre'=>"portada",'tipo'=>'front','MaxFile'=>'1'])--}}
                                    {{--{!! dd($stud->getFront()) !!}--}}
                                    {{--{!! dd($horse->getPhotoModel()) !!}--}}
                                    <div class="col-xs-10 col-sm-10 col-md-6">
                                        @if(!empty($stud->getFront()))
                                            @include('backend.common.dropify',['nombre'=>"caballo",'tipo'=>'front','link'=>$stud->getFront()->url])
                                        @else
                                            @include('backend.common.dropify',['nombre'=>"caballo",'tipo'=>'front'])
                                        @endif


                                    </div>
                                </div>
                            </div>


                            <div class="offset-3 col-6 m-t-25 text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                        <a href="#page" onclick="savecolor('{!! route('landingcolor') !!}')" id="savedv"
                                           class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="principal" class="hidden-xs-down">
        <div class="card col-12 m-t-35" id="page">
            <div class="card-block">
                <div class='card-header bg-white '>
                    {!! trans('desing.imgpweb') !!}

                </div>
                <form class="m-t-35 row no-gutters" id="galerias" enctype="multipart/form-data">

                    <div class="row col-12 " id="photos">
                        {{-- PASAR COMO DROPIFy --}}

                        {{--{!! dd($ima) !!}--}}
                        @php($ima = \Auth::user()->Yeguada()->getSliders())
                        @php($cima = count($ima))



                        @if( $cima !=0)

                            @foreach( $ima as $k=>$v)
                                @php ($rs = is_bool($v))

                                @if($rs != 1)
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                                        @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getUrl(),'Mensaje'=>'Titulos'])
                                    </div>
                                @endif

                            @endforeach


                        @endif

                    </div>
                    <div class="offset-3 col-6 m-t-25 text-center">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                {{--
                                <a href="#" class="btn btn-block btn-warning btninfo " onclick="getItems('#photos')">
                                    Establecer el orden
                                </a>--}}
                                {{--
                                                                <a href="#" class="btn btn-block btn-warning btninfo "
                                                                   onclick="savegallery('{!! route('imgs_instalations') !!}')">
                                                                    Guardar
                                                                </a>--}}

                                <a href="#secundario" class="btn btn-warning btninfo "
                                   onclick="AgregarSlider()">
                                    {!! trans('users.newimage') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{--
                    <div class="offset-3 col-6 m-t-25 text-center">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                <a href="#saved" onclick="savestud('{!! route('stud.store') !!}')" id="saved"
                                   class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                            </div>

                        </div>

                    </div>
                    --}}
                </form>
            </div>
        </div>
    </div>
    <div id="secundario" class="m-t-35" style="display:none">
        <div class="card col-12 " id="page1">
            <div class="card-block">
                <div class='card-header bg-white row'>
                    <div class="col-9">{!! trans('users.fiximage') !!}</div>
                    <div class="col-3 ">
                        <a href="#" onclick="cancelar()"
                           class="btn btn-warning pull-right">
                                <span onclick="cancelar()"
                                      aria-hidden="true"></span>{!! trans('users.cancel') !!}
                        </a>
                    </div>
                </div>
                <form class="row" id="pages" enctype="multipart/form-data">
                </form>
                <div class="col-md-12 text-xs-center ">
                    <div class="form-group row m-t-30">
                        @php($ima = \Auth::user()->Yeguada()->getSliders())
                        {{--
                        @php($viewport=[0=> 256,1=> 144])
                        @php($boundary=[0=> 384,1=> 216])
                        --}}

                        @php($v = new Photo())
                        @include('backend.common.crop2',['user'=>\Auth::user(),'imagen'=>$v,'nombre'=>'crop_','imagen_id'=>$v->id])
                    </div>
                </div>
                <div class="offset-3 col-6 m-t-25 text-center ">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#page" onclick="saveslider('{!! route('landingslider') !!}')" id="savedv"
                               class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                })
                .catch(function (error) {
                    var err = eval(xhr.responseText.sms);
                    var v = $.parseJSON(xhr.responseText);
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v.sms,
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
            --}}
        }

        var ttt = null;

        function saveslider(url) {
            if (mov == 0) return null;
            var form = new FormData(document.getElementById("sliderf"));
            $('.blobls').each(function (k, v) {

                form = enviarimagen(form, v.value, k, $(v).attr('data-id'));

            });
            form.append('t1', $('#tittle1').val());
            form.append('t2', $('#tittle2').val());

            axios.post(url, form)
                .then(function (response) {

                    form = null;
                    {{-- swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    ) --}}
                    swal({
                        title: '{!! trans('users.applychange') !!}',
                        type: 'success',
                        {{-- //html: t, --}}
                        text: '{!! trans('users.successchange') !!}',
                        showCloseButton: true,
                        showCancelButton: false,
                        confirmButtonColor: '#fa6900',
                        focusConfirm: false,
                        confirmButtonText: '{!! trans('users.accept') !!}',
                        confirmButtonAriaLabel: '{!! trans('users.accept') !!}',
                        {{-- //cancelButtonText: '',
                        //cancelButtonAriaLabel: 'Thumbs down', --}}
                    }).then(function () {
                        location.reload();
                        {{-- //cancelar(); --}}
                    });

                    {{--
                                        //location.reload();
                                        //cancelar(); --}}
                })
                .catch(function (error, response) {


                    form = null;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.maxslider') !!}<br>',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                });
        }

        function savecolor(url) {
            var form = new FormData(document.getElementById("pages"));
            var color = $.jPicker.List[0].color.current.val().hex;
            var head = $('#headers').val();
            var foot = $('#footers').val();
            var tittle = $('#tittles').val();
            var descipcion = $('#descriptions').val();
            var palabra = $('#words').val();

            form.append('head', head);
            form.append('foot', foot);
            form.append('tittle', tittle);
            form.append('descipcion', descipcion);
            form.append('palabra', palabra);

            form.append('color', color);
            {{--
            $('.blobls').each(function (k, v) {

                form = enviarimagen(form, v.value, k, $(v).attr('data-id'));

            });
            --}}


            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '¿Deseas realizar estos cambios?',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                {{-- //$('btn-drp-imagenes').click(); --}}
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.canceltaskbyuser') !!}',
                        'error'
                    )
                }
            });

        }

        function setColor() {
            var color = $.jPicker.List[0].color.current.val().hex;
        }

        $(window).on('load',
                {{-- //$(document).ready( --}}
                function () {
                    $('#Expandable').jPicker({
                        window:
                            {
                                expandable: true,
                                position:
                                    {
                                        x: 'screenCenter',
                                        {{-- // acceptable values "left", "center", "right", "screenCenter", or relative px value --}}
                                        y: 'center',
                                        {{-- // acceptable values "top", "bottom", "center", or relative px value --}}
                                    },

                            },
                        images:
                            {
                                clientPath: '{!! url('css/images/').'/' !!}', /* Path to image files */
                                colorMap:
                                    {
                                        width: 256,
                                        height: 256,
                                        arrow:
                                            {
                                                file: 'mappoint.gif', /* ColorMap arrow icon */
                                                width: 15,
                                                height: 15
                                            }
                                    },
                                colorBar:
                                    {
                                        width: 20,
                                        height: 256,
                                        arrow:
                                            {
                                                file: 'rangearrows.gif', /* ColorBar arrow icon */
                                                width: 20,
                                                height: 7
                                            }
                                    },
                                picker:
                                    {
                                        file: 'picker.gif', /* Color Picker icon */
                                        width: 25,
                                        height: 24
                                    }
                            },

                    });
                    {{--$('#Expandable').jPicker();--}}
                            @if(!empty(\Auth::user()->Yeguada()->getColor()))
                        $.jPicker.List[0].color.active.val('hex', '{{\Auth::user()->Yeguada()->getColor()}}');
                    @endif

                });


    </script>

    {{--<script src="{!!  !!}"></script>
    $.jPicker.List[0].color.active.val('hex', 'c6973b');
    --}}




@endsection

@section('bottomjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="{!! url('js/jpicker-1.1.6.min.js') !!}"></script>
    <script>
        $('#btn-get-photo').click(function () {
            {{-- //alert(getItems('#photos')); --}}
        });

        function AgregarSlider() {
            $('#principal').css('display', 'none');
            $('#secundario').css('display', '');
        }

        function cancelar() {
            $('#secundario').css('display', 'none');
            $('#principal').css('display', '');
        }

        $(document).on('load', function () {
            $(function () {
                $("#sliders").sortable({
                    stop: function (ui, event) {
                        getItems('#sliders');
                    }
                }).disableSelection();
                $("#photos").sortable({
                    stop: function (ui, event) {
                        getItems('#photos');
                    }
                }).disableSelection();
                $("#video").sortable({
                    stop: function (ui, event) {
                        getvideos('#video');
                    }
                }).disableSelection();
            });
        });

        function GuardarSlider() {

        }

        function aviso(id) {
            console.log(id);
            var url = '{!! route('obtenerdatoslider')."/" !!}' + id;
            var f = new FormData();
            f.append('id', id);

            axios.post(url, f)
                .then(function (response) {
                    var r = response.data;
                    var t1 = r.titulo1;
                    if (t1 === 'null') t1 = '';

                    var t2 = r.titulo2;
                    if (t2 === 'null') t2 = '';
                    var t = "<div class=\"form-group col-12 row m-t-35\">" +
                        "                        <label class=\"col-5 col-form-label text-right\">" +
                        "                            {!! trans('stud.titulo1') !!}" +
                        "                        </label>" +
                        "                        <div class=\"col-lg-7 col-md-7 col-sm-12 col-xs-12 \">" +
                        "                            <input id=\"tittles1\" type=\"text\"" +
                        "                                   placeholder=\"{!! trans('users.putthettitle') !!}\"" +
                        "                                   value=\"" + t1 + "\" class=\"form-control\">" +
                        "                        </div>" +
                        "                    </div>" +
                        "      <div class=\"form-group col-12 row m-t-35\">" +
                        "                        <label class=\"col-5 col-form-label text-right\">" +
                        "                            {!! trans('stud.titulo2') !!}" +
                        "                        </label>" +
                        "                        <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 \">" +
                        "                            <input id=\"tittles2\" type=\"text\"" +
                        "                                   placeholder=\"{!! trans('users.putdescription') !!}\"" +
                        "                                   value=\"" + t2 + "\" class=\"form-control\">" +
                        "                        </div>" +
                        "                    </div>"

                    console.dir(r);
                    swal({
                        title: '{!! trans('users.imagechangettitle') !!}',
                        {{-- //type: 'info', --}}
                        html: t,
                        showCloseButton: true,
                        showCancelButton: false,
                        confirmButtonColor: '#fa6900',
                        focusConfirm: false,
                        confirmButtonText: '{!! trans('users.change') !!}',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        cancelButtonText: '{!! trans('users.cancel') !!}',
                        cancelButtonAriaLabel: 'Thumbs down',
                    }).then(function () {
                        var url_ = '{!! route('setdatoslider')."/" !!}' + id;
                        f.append('t1', $('#tittles1').val());
                        f.append('t2', $('#tittles2').val());
                        axios.post(url_, f)
                            .then(function (response) {
                                var r = response.data;
                            })
                            .catch(function (error) {
                                        {{-- //var err = eval(xhr.responseText.sms); --}}
                                var e = error;
                                console.dir(e);
                                var v = e.message;
                                swal({
                                    title: '{!! trans('users.tittleerror') !!}',
                                    html: '{!! trans('users.someerror') !!}<br>' + v,
                                    type: 'error',
                                    confirmButtonColor: '#4fb7fe'
                                });
                                $('.save').prop('disabled', false);
                            });


                    });

                })
                .catch(function (error) {
                            {{-- //var err = eval(xhr.responseText.sms); --}}
                    var e = error;
                    console.dir(e);
                    var v = e.message;
                    swal({
                        title: '{!! trans('users.tittleerror') !!}',
                        html: '{!! trans('users.someerror') !!}<br>' + v,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    });
                    $('.save').prop('disabled', false);
                });

        }

    </script>
    <script type="text/javascript"
            src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js"></script>
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/gallery.js')}}"></script>
    <script src="{!! url('js/tags/tagging.js') !!}"></script>
    <script>
        $('canvas').addClass('img-fluid');
    </script>
    <script>
        var my_custom_options = {
            "no-duplicate": true,
            "tags-input-name": "words",
            "edit-on-delete": false,
        };
        $(window).on('resize', function () {
            var a = $(window).width();
            var eh = a * .6;
            var ea = eh * .3;
            var fh = eh * .83;
            var fa = fh * .35;
            var ff = fh * .72;
            $(".cr-boundary").css('width', eh).css('heigth', ea);
            {{-- //$(".cr-viewport.cr-vp-square").css('width',fh).css('heigth',fa); --}}
            $("canvas").css('transform', 'translate3d(-' + fh + ', -' + ff + 'px, 0px) scale(0.2341);');


        });
        $(".tag-box").tagging(my_custom_options);

        $(window).on('load', function () {
            {{-- //$('.croppie-container.cr-viewpor').css("border","1px solid #000");
            //$('.cr-vp-square').css("border","1px dotted #fff"); --}}

        });

    </script>

@endsection                                                 
