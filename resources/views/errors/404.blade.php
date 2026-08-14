<?php
$mensaje = isset($mensaje) ? $mensaje : null;
$t = \Session::all();
$error = null;
$flash = null;
if (isset($t['app'])) {
    $app = $t['app'];
    \Session::put('app', $app);
}
if (isset($t['Error'])) {
    $error = $t['Error'];
    \Session::put('Error', $error);
    $e = ['sms' => $error, $error => 0];
    \Session::put('flash_message', $e);
    //flash($error)->error();
}
if (isset($t['flash_notification'])) {
    $flash = $t['flash_notification'];
    \Session::put('flash_notification', $flash);
}
$url = ($app == 'true') ? 'http://app.' . \Config::get('aplication.host') : 'http://' . \Config::get('aplication.host');
\Session::put('url', $url);
// dd(\Session::all());
if (isset($timezone)) {
    if (!empty($timezone)) {
        \Session::put('timezone', $timezone);
    }
}
if (isset($currency)) {
    if (!empty($currency)) {
        \Session::put('currency', $currency);
    }
}
/*
    if(!empty( $url)){ header("Location: $url");}
    elseif(!empty( $host)){ header("Location: $host");}
    */

//die();
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
        <div class="content text-center" style="vertical-align: middle;">
            <div class="title text-center">
                {!! $mensaje !!}<br>
                {{--
                <div class="col-12 row text-center">
                    <a href="http://{!! $host !!}" class="btn btn-warning">
                        {!! trans('stud.home') !!}
                    </a>
                </div>
                --}}
            </div>
        </div>
    </div>
    <script>
        window.setTimeout(function () {
            window.location.href = @if(!empty( $url)) "{!! $url !!}"
            @elseif(!empty( $host)) "{!! $host !!}" @endif ;
        }, 5000);
    </script>
    @php

        if(isset($t['Error'])){
            flash($error)->error();
        }
        if(isset($t['flash_notification'])){
            flash($flash)->error();
        }
    @endphp
@endsection