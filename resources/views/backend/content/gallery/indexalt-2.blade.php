@php($stud = \Auth::user()->Yeguada())
@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right ")
@php($tiquetainput = " col-xs-12 col-sm-12 col-md-12 col-lg-9 ")
@extends('backend.layouts.base')
@section('title', trans('Titulos.DesingStud') )
@section('topcss')
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.min.js"></script>

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

        .informaciond {
            /*
            background-color: rgba(52, 125, 255, 0.36);
         border-radius: 10px;
            */
        }

        .selfix {
            /*width: 25%!important;*/
            background-color: #eceeef;
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
    <style>
        .inline_table {
            display: inline-table;
            margin-left: 15px;

        }

        .colorspl > .inline_table {
            margin-top: 15px;
        }

        .redondo {
            width: 25px;
            height: 25px;
            border-radius: 50px;
            box-shadow: -1px 1px 5px 2px #ccc;
        }
    </style>
@endsection

@section('topjs')
    @php

        session()->forget('img_slider_up')

    @endphp
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
            //var data = $('#dataBlob').val();
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
            //UpdateStatus("{!! trans('common_croppie.PuttingImgToRequest') !!}");
            formData.append("cover_file", new File([blob], URL.createObjectURL(blob)));
            //UpdateStatus("{!! trans('common_croppie.SendingImg') !!}");
            request.send(formData);
            GetInfo = jQuery.parseJSON(request.response);
            var code = GetInfo.status;
            if (GetInfo.status == 200) {
                console.dir(GetInfo);
                //UpdateStatus({!! trans('common_croppie.FinishOk') !!});
                return true;
                // ok
                // window.location.replace(GetInfo.url);
                //return false;
            } else {
                //UpdateStatus({!! trans('common_croppie.FinishFail') !!});
                //AdviceOnline({!! trans('common_croppie.Error') !!});
                return false;
            }


        }

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
            }

            if (url_ !== null) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        //this.response is what you're looking for
                        // handler(this.response);
                        console.log(this.response, typeof this.response);
                        //var img = document.getElementById('lightbox_image');
                        var url = window.URL || window.webkitURL;
                        destino = url.createObjectURL(this.response);
                        cropzone.addClass('ready');
                        elemento_t.croppie('bind', {
                            url: destino
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });

                        //img.src = url.createObjectURL(this.response);
                        //console.log(img.src);
                    }
                }
                xhr.open('GET', url_);
                xhr.responseType = 'blob';
                xhr.send();

            }


            UploadElement.on('change', function () {
                readFile(this);
            });
            //terminante();
            return elemento_t;
        }

        function SendCrop(elemento, dabal) {
            elemento.croppie('result', {
                //type: 'base64',
                format: 'jpeg',
                quality: 0.9,
                size: 'original'
            }).then(function (resp) {
                //$('#dataBlob').val(resp);
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
                    //this.response is what you're looking for
                    // handler(this.response);
                    console.log(this.response, typeof this.response);
                    //var img = document.getElementById('lightbox_image');
                    var url = window.URL || window.webkitURL;
                    destino = url.createObjectURL(this.response);

                    //img.src = url.createObjectURL(this.response);
                    //console.log(img.src);
                }
            }
            xhr.open('GET', url);
            xhr.responseType = 'blob';
            xhr.send();
        }

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
            console.dir(block);
            if (block[0].length < 2) return form;
            var contentType = block[0].split(":")[1];
            var realData = block[1].split(",")[1];
            var blob = b64toBlob(realData, contentType);

            // Create a FormData and append the file
            //var fd = new FormData(form);
            form.append("image[" + index + "]", blob);
            form.append("image_id[" + index + "]", id);
            //form.append('image', $('input[type=file]')[index].files[index]);
            return form;

        }


    </script>
@endsection

@section('content')


    <div class="card col-12 " id="page1">
        <div class="card-block row col-12">
            {{--}}<form class="col-12 row " id="pages" enctype="multipart/form-data"> </form>--}}
            {{--

                                    <div class="col-lg-6 m-t-35">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                                <span class="card-title">
                                                                    Otro

                                                                </span>
                                                <span class="float-right">
                                                    <i class="fa fa-pencil edito"></i>
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </span>
                                            </div>
                                            <div class="card-block">
                                                <div class="form-group row m-t-35">
                                                    <label class="{!! $etiquetalabel !!}col-form-label ">
                                                        {!! trans('desing.tittleweb') !!}
                                                    </label>

                                                    <div class="{!! $tiquetainput !!} ">
                                                        <input id="tittles" type="text"
                                                               placeholder="{{trans('stud.placeholder.name')}}"
                                                               value="{!! $stud->getTitulo() !!}" class="form-control editable">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        --}}
            {{--Diseño web --}}
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.youweb') !!}

                                        </span>
                        <span class="float-right">
                                                         {{--<i class="fa fa-close"></i>--}}
                            <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>
                            {{--
                        <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>
                        --}}
                                                    </span>
                    </div>
                    <div class="card-block">
                        <form action="" class="row" id="headfoot">
                            <input type="hidden" class="url" value="{!! route('stud.headfoot') !!}">
                            @php
                                $head =$stud->getHeader();
                            $headers = [];

                            @endphp
                            <div class="form-group row col-12 m-t-35 ">
                                <label class="{!! $etiquetalabel !!}">
                                    {!! trans('users.cabecera') !!}:
                                </label>
                                <div class="{!! $tiquetainput !!}">
                                    <select class=" form-control editable" data-style="btn-primary" id="head"
                                            name="head"
                                            placeholder="{{trans('color.placeholder.color')}}">

                                        {{--}}
                                        <option data-tokens="1" value="1" >Blanco</option>
                                        <option data-tokens="2" value="2" >Negro</option>
                                        <option data-tokens="3" value="1" >Rojo</option>--}}
                                        @foreach(trans('users.header') as $k=>$v)
                                            <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                                                    @if($head == $k) selected @endif>{!! $v !!}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            @php
                                $foot = $stud->getFooter();
                            $footers = [];

                            @endphp
                            <div class="form-group row col-12 m-t-35">
                                <label class="{!! $etiquetalabel !!}">
                                    {!! trans('users.piede') !!} :
                                </label>
                                <div class="{!! $tiquetainput !!}">
                                    <select class=" form-control editable" data-style="btn-primary" id="footers"
                                            name="footers"
                                            placeholder="{{trans('color.placeholder.color')}}">
                                        {{--}}
                                        <option data-tokens="1" value="1" >Blanco</option>
                                        <option data-tokens="2" value="2" >Negro</option>
                                        <option data-tokens="3" value="1" >Rojo</option>--}}
                                        @php($footers = trans('users.foot'))
                                        @foreach($footers as $k=>$v)
                                            <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                                                    @if($foot == $k) selected @endif>{!! $v!!}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            {{--<a href="#page" onclick="savecolor('{!! route('landingcolor') !!}')" id="savedv"
                                                       class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>--}}
                            <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                <div class="offset-1 col-5">
                                    <a href="#" class="btn btn-warning " id="cambiarcon2"
                                       onclick="savehead()">{!! trans('users.save') !!}
                                    </a>
                                </div>
                                <div class=" col-4">
                                    <a href="#" class="btn btn-warning "
                                       onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </div>

            {{--Colores --}}
            <div class="col-xs-12  col-sm-12 col-md-12 col-lg-3 col-xl-3 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.colores') !!}

                                        </span>
                        <span class="float-right">
                                                         {{--<i class="fa fa-close"></i>--}}
                            <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>
                            {{--
                        <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>
                        --}}
                                                    </span>
                    </div>
                    <div class="card-block">
                        <form action="" id="colorin">
                            <input type="hidden" class="url" value="{!! route('stud.colorin') !!}">
                            <input type="hidden" id="colore" name="colore"
                                   value="{{\Auth::user()->Yeguada()->getColor()}}">
                            <div class="form-group row m-t-35">
                                <label class="{!! $etiquetalabel !!} col-form-label col-lg-12 col-xl-3  text-lg-left">
                                    {!! trans('desing.color') !!}
                                </label>

                                <div class="{!! $tiquetainput !!} col-lg-12 col-xl-9 row">
                                    <div class="col-2">
                                        <span id="Expandable"></span>
                                    </div>
                                    <div class="col-3">
                                        <div class="inline_table">
                                            <div class="redondo" data-color="{{\Auth::user()->Yeguada()->getColor()}}"
                                                 style="background-color: {{\Auth::user()->Yeguada()->getColor()}};"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-12">
                                    {!! trans('desing.colordefault') !!} :
                                </div>
                                <div class="col-12 row colorspl">
                                    {{--    --}}
                                    @php
                                        $colores = [
                                            0=>'#3f7f00',
                                            1=>'#d62c2c',
                                            2=>'#f9912f',
                                            3=>'#e0e035',
                                            4=>'#f9f900',
                                            5=>'#ff007f',
                                            6=>'#ceb167',
                                            7=>'#543d20',
                                            8=>'#7c7c7c',
                                            9=>'#1E90FF',
                                            10=>'#53ba85',
                                           11=>'#000080',
                                        ];
                                    @endphp
                                    @foreach($colores as $k=>$v)
                                        <div class="col-2 ">
                                            <div class="redondo" data-color="{!! $v !!}"
                                                 style="background-color: {!! $v !!};"></div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                {{--<div class="offset-lg-3 col-12 col-lg-4">--}}
                                <div class=" col-12 offset-col-xl-3 col-xl-4">
                                    <a href="#" class="btn btn-warning " id="cambiarcon2"
                                       onclick="savecolor2()">{!! trans('users.save') !!}
                                    </a>
                                </div>
                                {{--<div class=" col-12 col-lg-4">--}}
                                <div class=" col-12 col-xl-4">
                                    <a href="#" class="btn btn-warning "
                                       onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
            {{-- Chat --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.chatweb') !!}

                                        </span>
                        <span class="float-right">
                            <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>

                                                    </span>
                    </div>
                    <div class="card-block">
                        <form action="" id="chateo">
                            <input type="hidden" class="url" value="{!! route('stud.chateo') !!}">
                            <div class="form-group row m-t-35">
                                <label class="{!! $etiquetalabel !!} col-form-label col-lg-12 col-xl-3  text-lg-left">
                                    {!! trans('stud.wsuser') !!} :
                                </label>

                                <div class="{!! $tiquetainput !!} col-lg-12 col-xl-9 ">
                                    <input
                                            id="wsuser"
                                            name="wsuser"
                                            type="text"
                                            placeholder="{{trans('stud.placeholder.wsuser')}}"
                                            title="{!! trans('popover.whatsapp.titulo') !!}"
                                            data-toggle="popover"
                                            data-trigger="hover"
                                            data-placement="left"
                                            data-content="{!! trans('popover.whatsapp.contenido') !!}"
                                            value="{{$stud->getWscontact()}}" class="form-control numbers editable ">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="{!! $etiquetalabel !!} col-form-label col-lg-12 col-xl-3  text-lg-left">
                                    {!! trans('stud.fbuser') !!} :
                                </label>

                                <div class="{!! $tiquetainput !!} col-lg-12 col-xl-9 ">
                                    <input
                                            id="fbuser"
                                            name="fbuser"
                                            type="text"
                                            placeholder="{{trans('stud.placeholder.fbuser')}}"
                                            title="{!! trans('popover.facebook.titulo') !!}"
                                            data-placement="left"
                                            data-toggle="popover"

                                            data-trigger="hover"
                                            data-content="{!! trans('popover.facebook.contenido') !!}"
                                            value="{{$stud->getFbcontact()}}" class="form-control editable">
                                </div>
                            </div>
                            <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                <div class="offset-3 col-9">
                                    <p>
                                        {!! trans('desing.infochat') !!}


                                    </p>
                                </div>
                                <div class="offset-3 col-4">
                                    <a href="#" class="btn btn-warning " id="cambiarcon2"
                                       onclick="savechat()">{!! trans('users.save') !!}
                                    </a>
                                </div>

                                <div class=" col-4">
                                    <a href="#" class="btn btn-warning "
                                       onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12  col-sm-12 col-md-12 col-lg-6 col-xl-6 m-t-35">
                {{-- Dominio--}}

                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.domain') !!} :
                                        </span>
                            <span class="float-right">
                            <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>

                                                    </span>

                        </div>
                        <div class="card-block">
                            <form class="form-group row m-t-35" id="domain">
                                <input type="hidden" class="url" value="{!! route('stud.domain') !!}">
                                <div class="col-12 row ">
                                    <label class="
                                    col-xs-12
                                    col-sm-12
                                    col-md-3
                                    col-lg-3
                                    text-sm-left
                                    text-md-left
                                    text-lg-right
                                    col-form-label
                                    text-lg-left">
                                        {!! trans('desing.slug') !!} :
                                    </label>
                                    {{--
                                                                        <div class="{!! $tiquetainput !!} col-lg-12 col-xl-9 row">
                                                                        </div>
                                                                            --}}
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
                                        <div class="input-group">
                                            <span class="input-group-addon"
                                                  id="basic-addon3">HorsesWorldSale.com/</span>
                                            <input id="slug_input" type="text"
                                                   name="slug"
                                                   placeholder="{{trans('stud.placeholder.name')}}"
                                                   value="{!! $stud->getSlug() !!}" class="form-control editable"
                                                   aria-describedby="basic-addon3">

                                        </div>
                                    </div>

                                </div>


                                <div class="col-12 row m-t-35">
                                    <label class="
                                    col-xs-3
                                    col-sm-3
                                    col-md-3
                                    col-lg-3
                                    text-sm-left
                                    text-md-left
                                    text-lg-right
                                    col-form-label
                                    text-lg-left">
                                        {!! trans('desing.domain') !!} :
                                    </label>
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
                                        <div class="input-group">
                                            <span class="input-group-addon"
                                                  id="basic-addon3">www.</span>
                                            <input id="domain_id" type="text"
                                                   name="domain"
                                                   placeholder="{{trans('stud.placeholder.name')}}"
                                                   value="{!! $stud->getDomain() !!}"
                                                   class="form-control editable"
                                                   aria-describedby="basic-addon3"
                                                   style="    width: 56%;">
                                            <select class=" form-control editable selfix"
                                                    data-style="btn-primary"
                                                    id="dom_extension" name="dom_extension"
                                                    placeholder=""
                                                    aria-describedby="basic-addon3 ">

                                                <option data-tokens="com" value="com" selected>
                                                    .com
                                                </option>
                                                <option data-tokens="es" value="es">
                                                    .es
                                                </option>


                                            </select>

                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                    <div class="col-12">
                                        <div class="offset-2 col-10">
                                            <p class="text-left text-justified informaciond">
                                                {!! trans('desing.dominfo') !!}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="offset-3 col-4">
                                        <a href="#" class="btn btn-warning " id="cambiardom2"
                                           onclick="savedom()">{!! trans('users.save') !!}
                                        </a>
                                    </div>

                                    <div class=" col-4">
                                        <a href="#" class="btn btn-warning "
                                           onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                        </a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                {{--Imagen de cabecera --}}
                {{--<div class="col-xs-12 col-md-12 col-lg-12 m-t-35">--}}
                <div class="col-12 m-t-35 ">
                    <div class="card">
                        <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.imgcabecera') !!}
                                        </span>
                            <span class="float-right">
                                                         {{--<i class="fa fa-close"></i>--}}
                                <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>
                                {{--
                            <i class="fa fa-tint"></i>
                                        <i class="fa fa-arrows-alt"></i>
                            --}}
                                                    </span>

                        </div>
                        <div class="card-block">
                            <form class="form-group row" id="imghead">
                                <input type="hidden" class="url" value="{!! route('stud.ImagenCabecera') !!}">
                                {{--
                                <label class="{!! $etiquetalabel !!}col-form-label ">
                                    {!! trans('desing.imgweb') !!}
                                </label>

                                <div class="{!! $tiquetainput !!} ">
                                    --}}
                                <div class="col-12 row m-t-25" style="    padding-left: 40px;">
                                    @if(!empty($stud->getFront()))
                                        @include('backend.common.dropify',['nombre'=>"caballo",'tipo'=>'front','link'=>$stud->getFront()->url])
                                    @else
                                        @include('backend.common.dropify',['nombre'=>"caballo",'tipo'=>'front'])
                                    @endif
                                </div>
                                <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                    <div class="offset-3 col-4">
                                        <a href="#" class="btn btn-warning " id="cambiarcon2"
                                           onclick="saveheadimg()">{!! trans('users.save') !!}
                                        </a>
                                    </div>

                                    <div class=" col-4">
                                        <a href="#" class="btn btn-warning "
                                           onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                        </a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{--Posicionamiento y buscadores --}}
            <div class="col-xs-12 col-md-12 col-lg-6 col-xl-6 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.seopos') !!}

                                        </span>
                        <span class="float-right">
                                                         {{--<i class="fa fa-close"></i>--}}
                            <i class="fa fa-pencil edito"></i>
                                                        <i class="fa fa-chevron-up"></i>
                            {{--
                        <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>
                        --}}
                                                    </span>
                    </div>
                    <div class="card-block">

                        <form action="" id="seo">
                            <input type="hidden" class="url" value="{!! route('stud.seo') !!}">
                            <div class="form-group row m-t-35">
                                <label class="{!! $etiquetalabel !!} col-form-label ">
                                    {!! trans('desing.tittleweb') !!} :
                                </label>

                                <div class="{!! $tiquetainput !!} ">
                                    <input id="tittles" type="text"
                                           name="tittles"
                                           placeholder="{{trans('stud.placeholder.name')}}"
                                           value="{!! $stud->getTitulo() !!}" class="form-control editable">
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="{!! $etiquetalabel !!}col-form-label ">
                                    {!! trans('desing.desciptionweb') !!} :
                                </label>

                                <div class="{!! $tiquetainput !!}">
                                <textarea name="descriptions" class="form-control editable" id="descriptions"
                                          value="{!! $stud->seodescripcion !!}" cols="50"
                                          rows="6">{!! $stud->seodescripcion !!}</textarea>
                                    {{--
                                    <input id="descriptions" type="text"
                                           placeholder="{{trans('stud.placeholder.name')}}"
                                           value="{!! $stud->getSeodescripcion() !!}" class="form-control">--}}
                                </div>
                            </div>
                            <div class="form-group row m-t-35">
                                <label class="{!! $etiquetalabel !!}col-form-label ">
                                    {!! trans('desing.wordsweb') !!} :
                                </label>
                                <div class="{!! $tiquetainput !!}">
                                    <div class="tag-box editable"
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
                                <label class="{!! $etiquetalabel !!}col-form-label ">
                                    <a href="https://analytics.google.com/" target="_blank">
                                        Google Analitics :
                                    </a>
                                </label>
                                <div class="{!! $tiquetainput !!}">
                                    <input id="ga" name="ga" type="text"
                                           placeholder="Codigo de Google Analitics"
                                           value="{!! $stud->getGa() !!}" class="form-control editable">
                                </div>
                            </div>
                            <div class="form-group row m-t-35 col-12 boton hidden-xs-up">
                                <div class="offset-3 col-4">
                                    <a href="#" class="btn btn-warning " id="cambiarcon"
                                       onclick="saveSeo()">{!! trans('users.save') !!}
                                    </a>
                                </div>

                                <div class=" col-4">
                                    <a href="#" class="btn btn-warning "
                                       onclick="BotonCancelar(this)">{!! trans('users.cancel') !!}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--corte --}}
            {{--{!! trans('users.fiximage') !!}--}}
            <div class="col-12 m-t-35">
                <div class="card">
                    <div class="card-header bg-white">
                                        <span class="card-title">
                                            {!! trans('desing.imgpweb') !!}

                                        </span>
                        <span class="float-right">

                                            <a href="#secundario" class="btn btn-warning btninfo "
                                               onclick="AgregarSlider()">
                                                {!! trans('users.newimage') !!}

                                            </a>

                            {{--<i class="fa fa-close"></i>--}}
                            {{--<i class="fa fa-pencil edito"></i>--}}
                            <i class="fa fa-chevron-up" style="    margin-left: 30px;"></i>
                            {{--
                        <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>
                        --}}
                                                    </span>
                    </div>
                    <div class="card-block">

                        <div class="form-group row ">
                            <form class="no-gutters col-12 row " id="galerias" enctype="multipart/form-data">
                                <div class="row col-12 " id="photos">
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

                                {{--
                                                                <div class=" row col-12 m-t-25 text-center">
                                                                    <div class="col-3">

                                                                    </div>
                                                                    <div class="form-group row m-t-35 boton ">
                                                                        <div class="col-3">
                                                                            <a href="#secundario" class="btn btn-warning btninfo "
                                                                               onclick="AgregarSlider()">
                                                                                {!! trans('users.newimage') !!}

                                                                            </a>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                --}}
                            </form>


                            <form class=" row" id="secundario" enctype="multipart/form-data"
                                  style="display: none;">

                                <div class="col-md-12 text-xs-center ">
                                    <div class="form-group row m-t-30">
                                        @php($ima = \Auth::user()->Yeguada()->getSliders())
                                        @php($v = new Photo())
                                        @include('backend.common.crop2',['user'=>\Auth::user(),'imagen'=>$v,'nombre'=>'crop_','imagen_id'=>$v->id])
                                    </div>
                                    <div class="offset-3 col-6 m-t-25 text-center">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 savesd hidden-xs-up">
                                                <a href="#page" onclick="saveslider('{!! route('landingslider') !!}')"
                                                   id="savedv"
                                                   class="save btn btn-block btn-success glow_button">{!! trans('users.save') !!}</a>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                                                <a href="#page" onclick="cancelar()"
                                                   class="save btn btn-block btn-success glow_button">{!! trans('users.cancel') !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>














    <div class="col-12">
        <a href="{!! route('LogeoSocial',['provider'=>'facebook']) !!}" class="btn-warning">Autorizar Fb</a>
        <a href="{!! route('FacebooCallBack') !!}" class="btn-warning">Autorizar Fb</a>
        <a href="{!! route('ObtenerPagina') !!}" class="btn-warning">Obtener Pagina</a>
        <a href="{!! route('paywithstripe2') !!}" class="btn-warning">Obtener Pagina 2</a>
        <div class="col-12">
            <div class="fb-login-button" data-max-rows="2" data-size="small" data-button-type="login_with"
                 data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div>
        </div>
    </div>
@endsection

@section('bottomjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js"
            type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
    <script src="{!! url('js/jpicker-1.1.6.min.js') !!}"></script>
    <script type="text/javascript">
        function savedom() {
            var form = new FormData(document.getElementById('domain'));
            var url = $('#domain').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#domain').closest('.card').find('.edito').click();

                })
                .catch(function (error) {
                    console.dir(error.data);
                    swal(
                        'Error aplicando los cambios',
                        error.data.sms,
                        'error'
                    )


                });


        }

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
            var form = new FormData(document.getElementById("sliderf"));
            $('.blobls').each(function (k, v) {

                form = enviarimagen(form, v.value, k, $(v).attr('data-id'));

            });
            form.append('t1', $('#tittle1').val());
            form.append('t2', $('#tittle2').val());

            axios.post(url, form)
                .then(function (response) {

                    form = null;
                    $('.savesd').addClass('hidden-xs-up');
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */

                    swal({
                        title: '{!! trans('users.applychange') !!}',
                        type: 'success',
                        //html: t,
                        text: '{!! trans('users.successchange') !!}',
                        showCloseButton: true,
                        showCancelButton: false,
                        confirmButtonColor: '#fa6900',
                        focusConfirm: false,
                        confirmButtonText: '{!! trans('users.accept') !!}',
                        confirmButtonAriaLabel: '{!! trans('users.accept') !!}',
                        //cancelButtonText: '',
                        //cancelButtonAriaLabel: 'Thumbs down',
                    }).then(function () {
                        location.reload();
                        //cancelar();
                    });


                    //location.reload();
                    //cancelar();
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
            var head = $('#head').val();
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
                //$('btn-drp-imagenes').click();
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
            //$(document).ready(
            function () {
                $('#Expandable').jPicker({
                        window:
                            {
                                expandable: true,
                                position:
                                    {
                                        x: 'screenCenter', // acceptable values "left", "center", "right", "screenCenter", or relative px value
                                        y: 'center', // acceptable values "top", "bottom", "center", or relative px value
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

                    },
                    function (color, context) {
                        {{--}}
                        var all = color.val('all');
                        alert('Color chosen - hex: ' + (all && '#' + all.hex || 'none') + ' - alpha: ' + (all && all.a + '%' || 'none'));
                        $('#Commit').css(
                            {
                                backgroundColor: all && '#' + all.hex || 'transparent'
                            }); // prevent IE from throwing exception if hex is empty
                        --}}
                    },
                    function (color, context) {
                        var e = $('#Expandable').closest('.card').find('.card-header');
                        var s = "#" + color.val('hex');
                        $(e).css('background-color', s + "!important");
                        $('#colore').val(s);
                        {{--
                        if (context == LiveCallbackButton.get(0)) alert('Color set from button');
                        var hex = color.val('hex');
                        LiveCallbackElement.css(
                            {
                                backgroundColor: hex && '#' + hex || 'transparent'
                            }); // prevent IE from throwing exception if hex is empty
                        --}}
                    },
                    function (color, context) {
                        //alert('"Cancel" Button Clicked');

                    });
                {{--$('#Expandable').jPicker();--}}
                        @if(!empty(\Auth::user()->Yeguada()->getColor()))
                    $.jPicker.List[0].color.active.val('hex', '{{\Auth::user()->Yeguada()->getColor()}}');
                @endif

            });


    </script>
    <script>
        $('#btn-get-photo').click(function () {
            //alert(getItems('#photos'));
        });

        function AgregarSlider() {
            $('#galerias').css('display', 'none');
            $('#secundario').css('display', '');
        }

        function cancelar() {
            $('#secundario').css('display', 'none');
            $('#galerias').css('display', '');
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
                        "                        <label class=\"col-5 col-form-label text-md-center text-lg-right\">" +
                        "                            {!! trans('stud.titulo1') !!}" +
                        "                        </label>" +
                        "                        <div class=\"col-lg-7 col-md-7 col-sm-12 col-xs-12 \">" +
                        "                            <input id=\"tittles1\" type=\"text\"" +
                        "                                   placeholder=\"{!! trans('users.putthettitle') !!}\"" +
                        "                                   value=\"" + t1 + "\" class=\"form-control\">" +
                        "                        </div>" +
                        "                    </div>" +
                        "      <div class=\"form-group col-12 row m-t-35\">" +
                        "                        <label class=\"col-5 col-form-label text-md-center text-lg-right\">" +
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
                        //type: 'info',
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
                                //var err = eval(xhr.responseText.sms);
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
                    //var err = eval(xhr.responseText.sms);
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
            var eh = a * .6;//30
            var ea = eh * .3, fh = eh * .83;
            var fa = fh * .35, ff = fh * .72;
            $(".cr-boundary").css('width', eh).css('heigth', ea);
            //$(".cr-viewport.cr-vp-square").css('width',fh).css('heigth',fa);
            $("canvas").css('transform', 'translate3d(-' + fh + ', -' + ff + 'px, 0px) scale(0.2341);');


        });
        $(".tag-box").tagging(my_custom_options);

        $(window).on('load', function () {
            //$('.croppie-container.cr-viewpor').css("border","1px solid #000");
            //$('.cr-vp-square').css("border","1px dotted #fff");

        });
        $(".fa-pencil").on('click', function (e) {

            var entradas = $(this).closest('.card').find('.editable');
            var btn = $(this).closest('.card').find('.boton');
            if (!$(this).hasClass("fa-pencil")) {
                $.each(entradas, function (k, v) {
                    $(v).attr('disabled', 'disabled');
                });
                $(btn).addClass('hidden-xs-up');
            } else {
                $.each(entradas, function (k, v) {
                    $(v).removeProp('disabled');

                });
                $(btn).removeClass('hidden-xs-up');
            }
            $(this).toggleClass('fa-check').toggleClass('fa-pencil');

            console.dir(entradas);
        });
        {{--
        $(".fa-pencil").on('click', function (e) {
            var edit = $(this).closest('.card').find('.card-header .card-title').text();
            var editable = $(this).closest('.card').find('.card-header');
            var editBox = "<div class='card_editbox'><input type='text' class='form-control text_for_save' maxlength='20' value='" + edit + "'></div>";

            var edit = $(this).closest('.card').find('.card-header .card-title').text();
            var editable = $(this).closest('.card').find('.card-header');
            var editBox = "<div class='card_editbox'><input type='text' class='form-control text_for_save' maxlength='20' value='" + edit + "'></div>";
            if (!$(this).hasClass("fa-check")) {
                editable.after(editBox);
                $(this).closest('.card').find("input").focus().setCursorToTextEnd();
            } else {
                $(this).closest(".card").find(".card_editbox").remove();
            }
            $(this).toggleClass('fa-check').toggleClass('fa-pencil');

        });
        --}}
        $(document).on('ready', function () {
            var s = $(document).find('.editable');
            $.each(s, function (k, v) {
                $(v).attr('disabled', 'disabled');
            });
            $("#photos").sortable({
                stop: function (ui, event) {
                    getItems('#photos');
                }
            }).disableSelection()
        });
        $('.redondo').on('click', function () {
            var v = $(this).attr('data-color');

            $.jPicker.List[0].color.active.val('hex', v);
            var e = $(this).closest('.card').find('.card-header');
            $('#colore').val(v);
            $(e).css('background-color', v + "!important")

        });

        function saveSeo() {
            var form = new FormData(document.getElementById('seo'));
            var url = $('#seo').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#seo').closest('.card').find('.edito').click();
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savechat() {
            var form = new FormData(document.getElementById('chateo'));
            var url = $('#chateo').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#chateo').closest('.card').find('.edito').click();
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function saveheadimg() {
            var form = new FormData(document.getElementById('imghead'));
            var url = $('#imghead').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#imghead').closest('.card').find('.edito').click();
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savehead() {
            var form = new FormData(document.getElementById('headfoot'));
            var url = $('#headfoot').find('.url').val();
            axios.post(url, form)
                .then(function (response) {
                    $('#headfoot').closest('.card').find('.edito').click();
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }

        function savecolor2() {
            var form = new FormData(document.getElementById('colorin'));
            var url = $('#colorin').find('.url').val();
            //$('#colorin').closest('.card').css('background-color')
            axios.post(url, form)
                .then(function (response) {
                    $('#colorin').closest('.card').find('.edito').click();
                    /*
                    swal(
                        '{!! trans('users.applychange') !!}',
                        '{!! trans('users.successchange') !!}',
                        'success'
                    )
                    */
                })
                .catch(function (error) {
                    console.dir(error.data);


                });

        }


        function BotonCancelar(el) {
            console.log('clicl en ');
            console.dir(this);
            var card = $(el).closest('.card');

            $(card).find('.edito').click()
        }


    </script>

@endsection
