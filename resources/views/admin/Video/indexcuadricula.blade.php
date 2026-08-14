@extends('backend.layouts.base')
@section('title', trans('horse.chooseone') )
{{--@section('pagetitle', '<i class="fa fa-pagelines"></i>  '.trans('sell.new') )--}}
@section('topcss')

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>

    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>


    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>
    <link rel="stylesheet" href="{{asset('assets/css/unite-gallery.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/ug-theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-bottom-text.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-no-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-thumb.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/skin-right-title-only.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/video_gallery.css')}}"/>
@endsection
@php
    //$video_url = "https://www.youtube.com/embed/sogCtOe8FFY?controls=2&showinfo=true&rel=0&enablejsapi=1&origin=http%3A%2F%2Fdemo.lorvent.com&widgetid=1";

/* http://unitegallery.net/index.php?page=video-items-syntax */
$vid[0] = '4QA2P0i7L1Y';
$vid[1] = 'lkch2YUZyhc';
$vid[2] = '-4Wk6WXM1hM';

$vid[3] = 'VojWCB1g59s';
$vid[4] = 'vsaKSbGmIuU';
$vid[5] = 'i2_ChgeoTEI';
$vid[6] = 'ns_ZyH9NRrE';

/*[
'4QA2P0i7L1Y',
'lkch2YUZyhc',
'-4Wk6WXM1hM',
'VojWCB1g59s',
'vsaKSbGmIuU',
'i2_ChgeoTEI',
'ns_ZyH9NRrE',
]
*/
@endphp
@section('topjs')




@endsection
@section('content')

    <div id="datos4" class="card col-12  ">
        <div class="card-block">
            <div class='card-header bg-white row'>
                <div class="col-9">
                {!! trans('video.myvideo') !!}
                </div>
                <div class="col-3">
                    <a href="{!! route('videos.index') !!}" class="btn pull-right"><i class="fa fa-bars"></i>Vista tabla </a>
                </div>
            </div>
            <div class="row">
                <div class="m-t-35 row  m-t-25 col-12" id="video">
                    @foreach($Video as $k=>$v)
                        @if(!empty($v->getEmbedVideoYoutube()))
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 m-t-20">
                                @include('backend.common.galleryimage',['titulo'=>$v->getName(),'id'=>$v->id,'imagen'=>$v->getYoutubeThumb(),'embed'=>$v->getEmbedVideoYoutube(),'video'=>1])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    <script type="text/javascript" src="{!!url('assets/js/pages/gallery.js')!!}"></script>
    <script type="text/javascript" src="{!! url('js/dropify/js/dropify.min.js') !!}"></script>
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

    <script type="text/javascript" src="{{asset('assets/js/ug-theme-video.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/ug-theme-tiles.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/unitegallery.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/video_gallery.js')}}"></script>--}}
    <script>
        function envio(form, url) {
            axios.post(url, form)
                .then(function (response) {
                    var r = response;
                    var el = r.data.el;
                    console.dir(r);
                    console.dir(r.data);
                    console.dir(r.data.el);
                    if (el === null) console.log('solo null');
                    if (el === 'null') console.log('solo texto null');
//https://www.youtube.com/watch?v=XFRfrPkfghY
                    if (el !== null) {

                        $('#video').append("<div class='col-3 m-t-20'>" + r.data.el + "</div>");
                        cargarimagenes();

                        swal(
                            '{!! trans('users.applychange') !!}',
                            r.data.sms,
                            'success'
                        );
                    } else {
                        swal({
                            title: '{!! trans('users.tittleerror') !!}',
                            html: r.data.sms + '<br>',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        });
                    }


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
                    console.dir(data);
                    var s = $.parseJSON(data);
                    $('#video').append(s.el);


                    swal(
                        '{!! trans('users.applychange') !!}',
                        s.sms,
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

        function savevideo(url) {
            var form = new FormData();
            //var description = $('#input_stud_description');
            var description = $('#input_stud_video').val();
            form.append('video', description);

            swal({
                title: '{!! trans('users.usure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '{!! trans('text.yes') !!}',
                cancelButtonText: '{!! trans('text.no') !!}',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonColor: '#4fb7fe',
                html: '{!! trans('video.videoconfirmation') !!}<br>',
                cancelButtonColor: '#EF6F6C',
                buttonsStyling: false
            }).then(function () {
                envio(form, url);
                $('#input_stud_video').val();

                /*
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                */
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        '{!! trans('users.canceltask') !!}',
                        '{!! trans('users.cancelmodal') !!}',
                        'error'
                    )
                }
           });

        }

        $(window).on('load', function () {
            $(function () {
                $("#video").sortable().disableSelection();
            });

            // =============start gallery2 js==========
            var gallery2 = $("#gallery2").unitegallery({
                gallery_theme: "video",
                gallery_width: 1100,
                gallery_height: 600,

            });
            // api.resize(width, height)
            // =============end gallery2 js==========
            $("#menu-toggle").on("click", function () {
                setTimeout(function () {
                    gallery2.resize();
                }, 400);
            });

        });
    </script>
    {{--
    <script type="text/javascript" src="http://unitegallery.net/unitegallery/themes/grid/ug-theme-grid.js"></script>

    <script type="text/javascript" src="http://unitegallery.net/unitegallery/js/unitegallery.min.js"></script>
    <script type="text/javascript" src="http://unitegallery.net/unitegallery/themes/grid/ug-theme-grid.js"></script>
    <script>
        $(document).ready(function(){


            // =============start gallery2 js==========
            var gallery2= $("#gallery2").unitegallery({

    gallery_width: 1100,
    gallery_height: 600,
    gallery_carousel:true,
    gallery_theme: "grid",
    theme_panel_position: "right"

    });
    // api.resize(width, height)
    // =============end gallery2 js==========


    $("#menu-toggle").on("click",function () {
    setTimeout(function () {
    gallery2.resize();
    },400);
    });
    });
    </script>
    --}}



    {{--}}<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-tubeplayer/2.1.0/jquery.tubeplayer.min.js"></script>{{--}}


@endsection