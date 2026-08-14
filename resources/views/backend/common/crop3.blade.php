<?php $user = (isset($user))?$user:null; ?>
{{--{!!Html::script("/js/canvas-to-blob.min.js")!!}--}}


<div class="row">
    <div class="col-3">
        <form id="FormBlob" action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            {{csrf_field()}}

            {{--Crop--}}
            <a class="btn btn-success center" onclick="void(0);" data-toggle="collapse" data-target="#coverup">
                Agregar Imagen
            </a>
            <div id="PreviewDemo" class="col-12 ">
                <div id="PreviewDemo" class="col-12 centered center no-padding-left col-4">
                    <img src="{!! $user->getLogo() !!}" id="PreviewImg" alt="" class="img-responsive img-org"
                         style="margin:0 auto;max-width: 200px;">
                </div>
                <div class="col-12" style="min-height: 160px">
                    {{--<div class="col-12 col-sm-6 collapse centered no-padding-left" id="coverup">--}}
                    <div class="col-12 col-sm-6 centered no-padding-left" id="coverup">
                        <div id="fra" class="{{--hidden--}}">
                            <div id="CropCover" class="demo col-12 centered"></div>
                            <div class="col-12 centered no-padding-left" id="botones">
                                <div class="btn btn-light upload-result">
                                    <span class="fa fa-scissors upload-result" aria-hidden="true"> </span>
                                    Cortar
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="btn btn-green btn-upload" for="inputImage"
                                     title="Upload image file" onclick="$('#CropUpload').click()">
			                            <span class="docs-tooltip" data-toggle="tooltip" title="">
			                                <span class="fa fa-upload"> </span>
				                                Subir Imagen
                                        </span>
                                </div>

                                <div class="btn btn-light ">
                                    <input type="hidden" id="ruta" value="CAMBIAR">
                                    <div id="GuardarImagen" class="btn btn-primary btn-lg btn-block"
                                         onclick="CoverData('{!! url('') !!}') ">
                                        Guardar
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                                <input type="file" id="CropUpload" name="CropUpload" accept="image/*"
                                       class="hidden-xs-down "/>
                                <div class="clearfix">
                                </div>
                                <input type="hidden" id="dataBlob" name="dataBlob">
                                {{--{!!Form::hidden('dataBlob', null, ['class' =>'form-control input-text mtop-10 grey', 'id' =>'dataBlob' ])!!}--}}
                            </div>
                        </div>
                        <div class="bloq ">
                            <a href="#!" class="btn btn-success btn-blq" style="">
                                Cambiar imagen
                            </a>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                {{--
                {!!Form::open(['id'=>"FormBlob", 'method' => 'POST', 'files' => true])!!}
                {!!Form::close()!!}
                --}}
                {!!Form::hidden('cover_blob', null, ['class' =>'form-control input-text mtop-10 grey', 'id' =>'cover_blob' ])!!}

                {{--
                <div class="col-12 collapse no-padding-left" id="coverup">
                </div>
                --}}
            </div>

        </form>
    </div>


</div>

<script>
    function CoverData(url) {

        var data = $('#dataBlob').val();
        var formData = new FormData(document.getElementById('FormBlob'));
        var request = new XMLHttpRequest();
        var GetInfo = null;
        request.open('POST', url, false);
        formData.append("check", 3);
        if (data.length < 1) {
            {{-- //return true; --}}
        } else {
            var blob = base64toBlob(limpliarblob(data), mimeblob(data));
            formData.append("cover_file", new File([blob], URL.createObjectURL(blob)));
        }
        request.send(formData);
        GetInfo = jQuery.parseJSON(request.response);
        var code = GetInfo.status;
        if (GetInfo.status === 200) {
            console.dir(GetInfo);
            console.log("Imagen Ok");
            return true;
        } else {
            console.dir(GetInfo);
            console.log("Imagen Fail");
            return false;
        }
    }

    function mimeblob(data) {
        var ss = null;
        var res = null;
        ss = 'data:image/jpeg;base64,';
        if (data.search(ss) === 0) {
            res = "image/jpeg";
        }
        ss = 'data:image/svg+xml;base64,';
        if (data.search(ss) === 0) {
            res = "image/svg+xml";
        }
        ss = 'data:image/png;base64,';
        if (data.search(ss) === 0) {
            res = "image/png";
        }
        return res;
    }

    function limpliarblob(data) {
        var ss = null;
        var res = null;
        ss = 'data:image/jpeg;base64,';
        if (data.search(ss) === 0) {
            res = data.replace(ss, "");
        }
        ss = 'data:image/svg+xml;base64,';
        if (data.search(ss) === 0) {
            res = data.replace(ss, "");
        }
        ss = 'data:image/png;base64,';
        if (data.search(ss) === 0) {
            res = data.replace(ss, "");
        }
        return res;
    }

    function Cropper(cropzone, UploadElement) {
        console.log("Iniciando");

        function readFile(input) {
            console.log('leyendo archivo');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    cropzone.addClass('ready');
                    ECrop.croppie('bind', {
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

        ECrop = cropzone.croppie({
            viewport: {
                width: 300,
                height: 240
            },
            boundary: {
                width: 330,
                height: 350
            },
            enableExif: true
        });
        UploadElement.on('change', function () {
            console.log("Subiendo archivo");
            readFile(this);
        });
        CropperExist = 1;
    }

    function base64toBlob(base64Data, contentType) {
        contentType = contentType || '';
        var sliceSize = 1024;
        var byteCharacters = atob(base64Data);
        var bytesLength = byteCharacters.length;
        var slicesCount = Math.ceil(bytesLength / sliceSize);
        var byteArrays = new Array(slicesCount);
        for (var sliceIndex = 0; sliceIndex < slicesCount; ++sliceIndex) {
            var begin = sliceIndex * sliceSize;
            var end = Math.min(begin + sliceSize, bytesLength);
            var bytes = new Array(end - begin);
            for (var offset = begin, i = 0; offset < end; ++i, ++offset) {
                bytes[i] = byteCharacters[offset].charCodeAt(0);
            }
            byteArrays[sliceIndex] = new Uint8Array(bytes);
        }
        return new Blob(byteArrays, {type: contentType});
    }

    var BlobBruto = null;
    var ECrop = null;
    var CropperExist = 0;
    $(".upload-result").on('click', function (ev) {
        {{-- //document.querySelector('.upload-result').addEventListener('click', function (ev) { --}}
        console.log("click");
        ECrop.croppie('result', {
            type: 'blob',
            size: 'original'
        }).then(function (resp) {
            $('#PreviewImg').attr('src', window.URL.createObjectURL(resp));
        });
        ECrop.croppie('result', {
            type: 'base64',
            size: 'original'
        }).then(function (resp) {
            $('#dataBlob').val(resp);
        });
    });

    function SendCrop() {
        ECrop.croppie('result', {
            type: 'base64',
            size: 'original'
        }).then(function (resp) {
            $('#dataBlob').val(resp);
        });
        return true;
    }


    function SetBlob(Blob) {
        $("#cover_blob").val(Blob);
        {{-- //console.log($("#cover_blob").val()); --}}
    }

    window.onload = function () {
        $(function () {
            console.log('Epa esta en load');

            Cropper($('#CropCover'), $('#CropUpload'));
        });

    };

    $(document).ready(function (e) {
        @if(!empty($user))
        $('.bloq').height($("#PreviewImg").height()).width("60%").css("margin-left", "10px");
        $('.btn-blq').css('margin-top', ( ($('.bloq').height() - $('.btn-blq').height()) / 2 ));
        @else
        $('.bloq').height($("#PreviewImg").height()).width("50%").css("margin-left", "10px");
        $('.btn-blq').css('margin-top', ( ($('.bloq').height() - $('.btn-blq').height()) / 2 ));
        @endif
    });


</script>