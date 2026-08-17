<?php
    $mensaje  = isset($mensaje)?$mensaje:null;
        $t = \Session::all();
           $app = false;
        $error = null;
        $flash = null;
        if(isset($t['app'])){
        $app = $t['app'];
        \Session::put('app',$app);
        }
        if(isset($t['Error'])){
        $error = $t['Error'];
        \Session::put('Error',$error);
        $e = ['sms'=>$error,$error=>0];
        \Session::put('flash_message',$e);
        flash($error)->error();
        }
        if(isset($t['flash_notification'])){
        $flash = $t['flash_notification'];
        \Session::put('flash_notification',$flash);
        }


        if($app == 'true'){
        $url =  'http://app.horsesworldsale.com';
        //$url =  route('landinghome');
        }else{
        //$url =  route('portal');
        $url =  'http://horsesworldsale.com';
        }
        \Session::put('url',$url);
    header("Location: $url");
    die();
?>

@extends('backend.layouts.fakelanding')
@section('content')
    <style>
        html, body {
            height: 100%;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            margin-bottom: 4%;
            margin-top: 25%;
            font-size: 30px;

        }
    </style>

    <div class="container">
        <div class="content" style="vertical-align: middle;">
            <div class="title">{!! $mensaje !!}<br>
                @if(Agent::isDesktop()!=true)
                    <div class="col-12 row text-center">
                        <a href="{!! route('landinghome') !!}" class="btn btn-warning">
                            {!! trans('stud.home') !!}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
