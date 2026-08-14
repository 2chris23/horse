<?php $etiquetalabel = "col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12"; ?>
<?php $tiquetainput = "col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12"; ?>

@extends('backend.layouts.base')
@section('title', trans('facebook.titulolog') )
@section('topcss')

@endsection
@section('topjs')

@endsection
@section('bottomjs')


@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div class='card-header bg-white '>
                    <div class="row">
                        <div class="col-8">
                            {!! trans('facebook.titulologin') !!}
                        </div>
                        {{--
                        <div class=" col-3 ">
                            <a href="{!! route('caballoc.index') !!}"
                               class=" btn btn-warning pull-right right"> {!! trans('users.return') !!}</a>
                        </div>
                        --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-25 row">
                        <div class="col-12 table-responsive text-xs-center">
                            <div class="col-12 offset-md-2  col-md-8  row">
                                <div class="col-12 m-t-20 text-center" style="font-weight: 600">
                                    {!! trans('facebook.publish_pages_titulo') !!}
                                </div>
                                <div class="col-12 m-t-10">
                                    {!! trans('facebook.publish_pages_help') !!}
                                </div>
                                <div class="col-12 m-t-20 text-center" style="font-weight: 600">
                                    {!! trans('facebook.manage_pages_titulo') !!}
                                </div>
                                <div class="col-12 m-t-10">
                                    {!! trans('facebook.manage_pages_help') !!}
                                </div>
                                <div class="col-12 text-center  m-t-20">
                                    <a href="{!! route('LogeoSocial',['provider'=>'facebook']) !!}"
                                       class="btn btn-warning">
                                        {!! trans('facebook.autoriza') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

