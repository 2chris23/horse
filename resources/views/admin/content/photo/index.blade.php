@php


@endphp
@extends('backend.layouts.base')
@section('title', trans('sell.Tittle') )
@section('pagetitleadmin')

    @include('admin.topstud')

@endsection
@section('topcss')


    <!--Plugin styles -->
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-buttons.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    {{--<link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fancybox/css/jquery.fancybox-thumbs.css')}}"/>--}}
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>


    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/imagehover/css/imagehover.min.css')}}"/>
    <!--End of plugin-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/gallery.css')}}"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('/js/dropify/css/dropify.css') !!}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/explorer-fa/theme.min.css"
          media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/explorer/theme.min.css"
          media="all" rel="stylesheet" type="text/css"/>

@endsection
@section('topjs')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>

@endsection
@section('content')

    <div class="col-lg-12 ">
        <div class="card">
            <div class="card-header bg-white">
                Album de fotos
                @if(count($gallery) !=0)
                    <span style="padding-left:10px;">
                        <span class="badge badge-pill badge-warning notifications_badge_top">
                            {!! count($gallery )!!}
                        </span>
                    </span>
                @endif
            </div>
            <div class="card-block">

                <div class="m-t-35 row " style="    margin-top: 50px;">
                    @include('backend.common.dropzone', [ 'nombre'=>"gallery_drop", 'tipo'=>'gallery', 'MaxFile'=>20, 'oculto'=>true,'stud'=>$stud])
                </div>
                <div class="m-t-35 row " id="photos">
                    {{-- PASAR COMO DROPIFy --}}

                    @foreach($gallery as $k=>$v)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                            @include('backend.common.galleryimage',['titulo'=>$v['name'],'id'=>$v['id'],'imagen'=>$v['url']])
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>


@endsection


@section('bottomjs')

    <script type="text/javascript" src="{!! url('/js/dropify/js/dropify.min.js') !!}"></script>
    <!--Plugin scripts-->
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
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


    <script>
        {{--
        $('#btn-get-photo').click(function () {
            alert(getItems('#photos'));
        });
        --}}
        function saveslider(url) {
            var form = new FormData(document.getElementById("glerias"));

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
        }

        window.onload = function () {
            $(function () {
                $("#photos").sortable().disableSelection();
            });

        };
    </script>
@endsection
