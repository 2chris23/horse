<?php $user = (isset($user))?$user:null; ?>
@php($logo = str_replace('\\','/',$user->getLogo()))
{{--{!!Html::script("/js/canvas-to-blob.min.js")!!}--}}
{{--{!!Html::script("https://foliotek.github.io/Croppie/bower_components/exif-js/exif.js")!!}--}}
<script src="{!! url('cropper/darkroomjs/demo/vendor/fabric.js') !!}"></script>
<script src="{!! url('cropper/darkroomjs/build/darkroom.js') !!}"></script>


<div class="col-6">
    <img src="{!! $logo !!}" id="target" class="img-fluid">
</div>
<script>
    {{-- //new Darkroom('#target'); --}}
    $(window).on('load', function () {


        var r = new Darkroom('#target', {
            {{-- // Canvas initialization size --}}
            /*
             containerElement: null,
            canvas: null,
            image: null,
            sourceCanvas: null,
            sourceImage: null,
            originalImageElement: null,
            transformations: [],
            defaults: {
                minWidth: null,
                minHeight: null,
                maxWidth: null,
                maxHeight: null,
                ratio: null,
                backgroundColor: "#fff",
                plugins: {},
                initialize: function () {
                }
            },
            plugins: {},
            options: {},
            */
            minWidth: 100,
            minHeight: 100,
            maxWidth: 500,
            maxHeight: 500,
            image: "{!! $logo !!}",
            {{-- // Plugins options --}}
            plugins: {
                crop: {
                    minHeight: 50,
                    minWidth: 50,
                    ratio: 1
                },
                save: false {{-- // disable plugin --}}
            },

            {{-- // Post initialization method --}}
            initialize: function () {
                {{-- // Active crop selection --}}
                this.plugins['crop'].requireFocus();

                {{-- // Add custom listener --}}
                this.addEventListener('core:transformation', function () {
                    {{-- // --}}
                });
            }
        });
    });


</script>


