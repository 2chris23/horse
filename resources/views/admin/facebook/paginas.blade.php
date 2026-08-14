@php($etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12")
@php($tiquetainput = "col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12")
@extends('backend.layouts.base')
@section('title', trans('facebook.paginas') )
@section('topcss')
    {{--
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css"/>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
--}}
    <link type="text/css" rel="stylesheet" href="{!! route('TimeCss') !!}"/>
    <style>
        .modal-content {
            border-radius: 10px 10px;
        }

        .modal-header {
            border-radius: 10px 10px 0px 0px;
        }

        .dtp .dtp-buttons,
        .dtp-content {
            border-radius: 10px 10px 10px 10px;
        }

        .dtp-header,
        .dtp > .dtp-content > .dtp-date-view > header.dtp-header {
            border-radius: 10px 10px 0px 0px;
        }

        #dtp-svg-clock {
            height: 270px;
        }

        .dtp-buttons > .btn {
            margin-left: 10px;
        }
    </style>
@endsection
@section('topjs')

@endsection
@section('bottomjs')
    <script type="text/javascript" src="{!! url('js/dropify/js/dropify.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    <script type="text/javascript" src="{!! route('FullCalendar.js') !!}"></script>
    {{--<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>--}}
    <script src="{!! route('TimeJs') !!}"></script>
    <script src="{!! route('CalendarFacebookJsAdmin') !!}"></script>
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        <div class="col-8">
                            {!! trans('facebook.selectpagina') !!}
                        </div>
                        {{--
                        <div class=" col-3 ">
                            <a href="{!! route('caballoc.index') !!}"
                               class=" btn btn-warning pull-right right"> {!! trans('users.return') !!}</a>
                        </div>
                        --}}
                    </div>
                </div>
                <div class="col-12 row ">
                    <div class="col-12 m-t-25 row">
                        @for($i=0;$i<count($paginas);$i++)
                            @php($t = $paginas[$i])
                            <form action="{!! route('MisPaginasAdminPost') !!}" method="post"
                                  class="col-12 col-sm-6 col-lg-3 col-md-3 row m-t-10 text-center">
                                {!! csrf_field() !!}
                                <input type="hidden" class="hidden-xs-up" name="data_page"
                                       value='{{ Funciones::ReemplazarComilla( json_encode($t) ) }}'>
                                <span class="p-l-10 pull-right">
                                <button class="btn btn-raised btn-warning adv_cust_mod_btn bounceindown"
                                >
                                {{ $t['name'] }}
                                </button>
                            </span>
                            </form>
                        @endfor

                    </div>
                    <div class="col-12">
                        <a href="#!" class="btn btn-warning pull-right m-l-10" onclick="BorrarDatosFbAdmin()">
                            {!! trans('facebook.deletedatab') !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')


@endsection