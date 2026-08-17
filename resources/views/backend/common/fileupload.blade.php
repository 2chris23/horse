<?php $user = (isset($user))?$user:null; ?>
<?php $horse = (isset($horse))?$horse:null; ?>
<?php $stud= (isset($stud))?$stud:null; ?>
<?php $photos= (isset($photos))?$photos:null; ?>
<?php $type= (isset($type))?$type:null; ?>
@php
    if(!empty($horse)) $img =$horse->getPhotoModel();
    if(!empty($stud)) $img =$stud->getInstalationsGalleryModel();
    if(!empty($stud)) $img =$stud->getPhotosModel();

if($type =='slider') $img =\Auth::user()->Yeguada()->getSliders();


@endphp

{{--{!!Html::script("/js/canvas-to-blob.min.js")!!}--}}
<div class="col-12">
    <input id="input-fa" name="inputfa[]" type="file" multiple class="file-loading">
</div>

<script>
    $(window).on('load', function () {
        $("#input-fa").fileinput({
            theme: "fa",
            language: '{!! App::getLocale() !!}',
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            uploadUrl: "{!! route('imagenes') !!}",
            deleteUrl: "{!! route('erase.media') !!}",

            fileActionSettings: {
                removeIcon: '<i class="fa fa-trash"></i>',
                uploadIcon: '<i class="fa fa-upload"></i>',
                uploadRetryIcon: '<i class="fa fa-repeat"></i>',
                zoomIcon: '<i class="fa fa-search-plus"></i>',
                dragIcon: '<i class="fa fa-arrows"></i>',
                indicatorNew: '<i class="fa fa-plus-circle text-warning"></i>',
                indicatorSuccess: '<i class="fa fa-check-circle text-success"></i>',
                indicatorError: '<i class="fa fa-exclamation-circle text-danger"></i>',
                indicatorLoading: '<i class="fa fa-hourglass text-muted"></i>'
            },
            previewZoomButtonIcons: {
                prev: '<i class="fa fa-caret-left fa-lg"></i>',
                next: '<i class="fa fa-caret-right fa-lg"></i>',
                toggleheader: '<i class="fa fa-arrows-v"></i>',
                fullscreen: '<i class="fa fa-arrows-alt"></i>',
                borderless: '<i class="fa fa-external-link"></i>',
                close: '<i class="fa fa-remove"></i>'
            },
            previewFileIcon: '<i class="fa fa-file"></i>',
            browseIcon: '<i class="fa fa-folder-open"></i>',
            removeIcon: '<i class="fa fa-trash"></i>',
            cancelIcon: '<i class="fa fa-ban"></i>',
            uploadIcon: '<i class="fa fa-upload"></i>',
            msgValidationErrorIcon: '<i class="fa fa-exclamation-circle"></i> ',
            deleteExtraData: {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                _token: token,
                @if(!empty($type))
                type: '{!! $type !!}',
                @endif
                        @if(!empty($horse))
                id:{!! $horse->id !!},
                @endif
            },
            uploadExtraData: {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                _token: token,
                @if(!empty($type))
                type: '{!! $type !!}',
                @endif
                        @if(!empty($horse))
                id:{!! $horse->id !!},
                @endif
            },
            @if(!empty($img))

            initialPreview: [
                @foreach($img as $k=>$v)
@if(!empty($v))

                    "<img src='{!! $v->getUrl() !!}' class='file-preview-image img-fluid' alt='{!! $v->getName() !!}' title='{!! $v->getName() !!}'>",
                {{--
                    caption: '{!!$v->getName()!!}',
                    width: '120px',
                    //url: 'http://localhost/avatar/delete', // server delete action
                    key: {!! $v->id !!},
                    extra: {id: {!! $v->id !!}}
                    --}}
@endif
                @endforeach

            ],
            initialPreviewConfig: [
                    @foreach($img as $k=>$v)
                {
                    caption: '{!! $v->getName() !!}',
                    width: '100px',
                    {{-- //url: '/localhost/avatar/delete', --}}
                    key: {!! $v->id !!},
                    extra: {
                        id_img: {!! $v->id !!},
                        @if(!empty($type))
                        type: '{!! $type !!}',
                        @endif
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'csrftoken': token,
                        },
                        _token: token,
                    }
                },
                @endforeach
                {{--
                {
                    caption: 'jellyfish.jpg',
                    width: '120px',
                    url: '/localhost/avatar/delete',
                    key: 101,
                    frameClass: 'my-custom-frame-css',
                    frameAttr: {
                        style: 'height:80px',
                        title: 'My Custom Title',
                    },
                    extra: function() {
                        return {id: $("#id").val()};
                    },
                }
                --}}
            ]
            @endif
       });
        {{-- .on('filepredelete', function (event, key, jqXHR, data) {
            /* headers: {
                'X-CSRF-TOKEN': token,
                'csrftoken': token,
            },* /
            var form = data.form,
                files = data.files,
                extra = data.extra,
                response = data.response,
                reader = data.reader;
            console.dir(data);
            form.append('_token', token);
            form.append('id_img', key);
            //console.log('Key = ' + key);
       });
         --}}
            .on('filepreupload', function (event, data, previewId, index, jqXHR) {
                var form = data.form, files = data.files, extra = data.extra, response = data.response,
                    reader = data.reader;{{-- 
                //console.dir(data);
                //console.log('File pre upload triggered'); --}}
                form.append('_token', token);
                
            }).on('filesorted', function (event, params) {
            console.dir(params);
            console.log('File sorted ', params.previewId, params.oldIndex, params.newIndex, params.stack);
            var elementos = (params.stack);
            axios.post(urlorder, elementos)
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
                url: urlorder,
                data: s,
                headers: {
                    'X-CSRF-TOKEN': token,
                    'csrftoken': token,
                },
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    var v = $.parseJSON(data);
                    console.dir(data);
                    console.dir(v);
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
        });
   });
</script>
