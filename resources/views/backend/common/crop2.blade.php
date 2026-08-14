<?php $user = (isset($user))?$user:null; ?>
<?php $nombre = (isset($nombre))?$nombre:null; ?>
<?php $imagen = (isset($imagen))?$imagen:null; ?>
<?php $imagen_id = (isset($imagen_id))?$imagen_id:0; ?>
{{--
<?php $viewport=[0=> 128,1=> 72]; ?>
<?php $boundary=[0=> 256,1=> 144]; ?>


<?php $viewport=[0=> 256,1=> 144]; ?>
<?php $boundary=[0=> 384,1=> 216]; ?>
<?php $viewport=[0=> 384,1=> 216]; ?>

<?php $boundary=[0=> 1920,1=> 685]; ?>
<?php $viewport=[0=> 1920,1=> 685]; ?>
--}}
{{--<?php $viewport=[0=> 640,1=> 360]; ?>--}}





    <div id="PreviewDemo" class="col-12 ">
        <div class="row">

            <div class="offset-3 col-3">
                <div class="btn btn-warning btn-upload" for="inputImage"
                     title="Upload image file"
                     onclick="$('#CropUpload_{!! $nombre !!}').click()">
                        <span class="docs-tooltip" data-toggle="tooltip" title="">
                            <span class="fa fa-upload">
                            </span>
                                {!! trans('desing.cargaimagen') !!}
                        </span>
                </div>

                <input type="file" id="CropUpload_{!! $nombre !!}"
                       name="CropUpload_{!! $nombre !!}" accept="image/*"
                       class="hidden hidden-xs-down  hidden-md-down "
                       style="display: none"/>
            </div>



            <div id="CropCover_{!! $nombre !!}" class="demo col-12 centered m-t-20"></div>

            <div class="offset-3  col-6 m-t-20 " id="botones" style="display: none;">
                {{--
                <div onclick="cortar_{!! $nombre !!}()"
                     class="btn btn-warning upload-result_{!! $nombre !!}"
                     id="upload-result_{!! $nombre !!}">
                                <span onclick="cortar_{!! $nombre !!}()"
                                      class="fa fa-scissors"
                                      aria-hidden="true"></span> {!! trans('stud.cut') !!}
                </div>
                --}}

                <div class="clearfix"></div>

                {!!Form::hidden('dataBlob_'.$nombre , null, ['class' =>'form-control input-text mtop-10 grey blobls','data-id'=>$imagen_id, 'id' =>'dataBlob_'.$nombre  ])!!}
            </div>


            <div class="clearfix"></div>
            <div id="PreviewDemo" class="col-12 text-center m-t-20">
                <img src="{!! $imagen->getUrl() !!}" id="PreviewImg_{!! $nombre !!}" alt=""
                     class="img-responsive img-org img-fluid" style="display: none">
            </div>
            <div class="clearfix"></div>
            <div class="col-12">
                <div class="form-group row m-t-35">
                <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                    {!! trans('stud.titulo1') !!} :
                </label>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <input id="tittle1" type="text"
                           placeholder="{{trans('stud.placeholder.titulo1')}}"
                           value="" class="form-control">
                </div>
            </div>
            </div>
            <div class="col-12">

                <div class="form-group row m-t-35">
                    <label class="col-6 col-xs-6 col-xs-6 col-md-3 col-lg-3 col-form-label text-right">
                        {!! trans('stud.titulo2') !!} :
                    </label>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <input id="tittle2" type="text"
                               placeholder="{{trans('stud.placeholder.titulo2')}}"
                               value="" class="form-control">
                    </div>
                </div>
            </div>

        </div>
        {!!Form::open(['id'=>"FormBlob", 'method' => 'POST', 'files' => true])!!}
        {!!Form::close()!!}
        {!!Form::hidden('cover_blob_'. $nombre, null, ['class' =>'form-control input-text mtop-10 grey', 'id' =>'cover_blob_'. $nombre ])!!}


</div>
<script>
                var BlobBruto = null;
                var elementc_{!! $nombre !!} = null;
                var CropperExist = 0;

                function cortar_{!! $nombre !!}() {
                    elementc_{!! $nombre !!}.croppie('result', {
                        type: 'blob',
                        format: 'jpeg',
                        quality: 0.6,
                        size: 'original'
                    }).then(function (resp) {
                        mov = 1;
                        $('#PreviewImg_{!! $nombre !!}').attr('src', window.URL.createObjectURL(resp)).css('display','');
                        $('.savesd').removeClass('hidden-xs-up');
                    });
                    elementc_{!! $nombre !!}.croppie('result', {
                        type: 'base64',
                        format: 'jpeg',
                        quality: 0.6,
                        size: 'original'
                    }).then(function (resp) {
                        mov = 1;
                        $('#dataBlob_{!! $nombre !!}').val(resp);
                        $('.savesd').removeClass('hidden-xs-up');
                    });

                }

                {{-- //$('#upload-result_{!! $nombre !!}').on('click', function (ev) { --}}
                {{-- document.querySelector('.upload-result_{!! $nombre !!}').addEventListener('click', function (ev) {
                    elementc_{!! $nombre !!}.croppie('result', {
                        type: 'blob',
                        size: 'original'
                    }).then(function (resp) {
                        $('#PreviewImg_{!! $nombre !!}').attr('src', window.URL.createObjectURL(resp));
                    });
                    elementc_{!! $nombre !!}.croppie('result', {
                        type: 'base64',
                        size: 'original'
                    }).then(function (resp) {
                        $('#dataBlob_{!! $nombre !!}').val(resp);
                    });
                }); --}}
                $(window).on('load', function () {
                    elementc_{!! $nombre !!} = Cropper($('#CropCover_{!! $nombre !!}'), $('#CropUpload_{!! $nombre !!}'), elementc_{!! $nombre !!}, '{!! $imagen->url !!}');
                    $('.cr-boundary').on('mouseup',function(){
                        cortar_{!! $nombre !!}();
                    }).on('mousedown',function(){
                        cortar_{!! $nombre !!}();
                    });
               });
    function terminante(){
        $('.cr-boundary').on('mouseup',function(){
            cortar_{!! $nombre !!}();
        }).on('mousedown',function(){
            cortar_{!! $nombre !!}();
        });
    }

            </script>


<div class="clearfix"></div>
