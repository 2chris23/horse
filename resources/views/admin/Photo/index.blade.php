@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css"/>
    {{--
<link type="text/css" rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css"/>
<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/timeline2.css')!!}"/>
<link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/calendar_custom.css')!!}"/>
--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/css/pages/gallery.css')!!}"/>


    {{--<link type="text/css" rel="stylesheet" href="#" id="skin_change"/>--}}

    <link type="text/css" rel="stylesheet" href="{!!url('assets/vendors/imagehover/css/imagehover.min.css')!!}"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('phone/css/intlTelInput.css') !!}"/>

    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }

        .img-tmp {
            max-height: 100px !important;
            width: auto !important;
            margin: auto !important;
        }

        .img-tmp > dropify-preview {
            display: block !important;
            top: 0px !important;
            left: 0px !important;
            padding: 0px !important;
        }

        .img-tmp > dropify-preview > dropify-render > img {
            padding: 0px !important;
        }

    </style>
@endsection
@section('content')


        <div id="datos" class="card col-12 ">
            <div class="card-block">
                <div class='card-header bg-white row'>
                    <div class="col-9">
                    Listado de todas las fotos
                    @if(count($photo) !=0)
                        <span style="padding-left:10px;">
                            <span class="badge badge-pill badge-warning notifications_badge_top">
                                {!! count($photo )!!}
                            </span>
                        </span>
                    @endif
                    </div>
                    <div class="col-3">
                        <a href="{!! route('fotos.indexcarta') !!}" class="btn pull-right"><i class="fa fa-th-large"></i>Vista cuadricula </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 m-t-25">
                        <div class="row">
                            <div class=" col-12 table-responsive noSwipe m-t-20">
                                {{--tablafoto--}}
                                <table id="tablafoto" class="table table-striped table-hover" cellspacing="0"
                                       data-url="{!! route('FotosIndexAdmin') !!}" data-token="{!! csrf_token() !!}">
                                    <thead>
                                    <tr>
                                        <?php $cont = 0; ?>
                                        @foreach($columns as $k=>$v)

                                            <th >
                                                {!! $v !!}
                                            </th>
                                        @endforeach

                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                    {{--
                                                                        <tbody>

                                                                        @foreach($photo as $c)
                                                                            @if($c->type !=10)
                                                                                @if($c->type !=8)


                                                                            <tr>
                                                                                @foreach($columns as $k=>$v)
                                                                                    <td>

                                                                                        @if($k=='stud')
                                                                                            <a href="{!! route('clientes.edit',['id'=>$c->id]) !!}">
                                                                                                {!! $c->getStudName() !!}
                                                                                            </a>
                                                                                        @elseif($k == "id")
                                                                                            <?php $cont =$cont+1 ; ?>
                                                                                            {!! Funciones::RellenarCeros($cont) !!}
                                                                                        @elseif($k == "action")
                                                                                            <a href="#!" class="dropify-clear"
                                                                                               onclick="erasephoto(this,{{$c->id}},'photo')">
                                                                                                <i class="fa fa-trash" aria-hidden="true">
                                                                                                </i>
                                                                                            </a>
                                                                                        @elseif($k=='url')

                                                                                            <?php $id = $c->id; ?>
                                                                                            <?php $imagen =  $c->url; ?>

                                                                                            @include('backend.common.galleryimage',['titulo'=>$c->getName(),'id'=>$c->id,'imagen'=>$c->getUrl(),'adminpanel'=>1,'size'=>$c->Size()])

                                                                                        @elseif($k=='type')
                                                                                            {!! $c->getTypeString() !!}
                                                                                        @elseif($k=='tama')
                                                                                            {!! Funciones::AjustarNumeroMil($c->Size()) !!}
                                                                                        @elseif($k=='tableid')
                                                                                            <?php $ds = $c->ObtenerYeguada(); ?>


                                                                                            @if(!empty($ds))
                                                                                                <a href="{!! route('yeguadas.show',['id'=>$ds->id]) !!}">@endif
                                                                                                    {!! $c->ObtenerNombrePadre() !!}
                                                                                                    @if(!empty($ds))
                                                                                                </a>
                                                                                            @endif
                                                                                        @elseif($k=='created_at')
                                                                                            {!! Funciones::AjustarFechaDmy($c->created_at) !!}
                                                                                        @else
                                                                                            {!! $c->{$k} !!}
                                                                                        @endif
                                                                                    </td>


                                                                                @endforeach
                                                                            </tr>
                                                                            @endif
                                                                            @endif
                                                                        @endforeach

                                                                        </tbody>
                                                                        --}}
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection

@section('bottomjs')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js">
    </script>
    {{--
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-calendar/0.2.5/js/calendar.min.js">
    </script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js">
    </script>

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js">
    </script>
    --}}
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
    <script src="{!! route('cliente.horse.indexjs') !!}"></script>
@endsection
