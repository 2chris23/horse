<?php
$mensaje = isset($mensaje) ? $mensaje : null;
$t = \Session::all();
$error = null;
$flash = null;
$app = null; // Fix undefined variable $app
if (isset($t['app'])) {
    $app = $t['app'];
    \Session::put('app', $app);
}
if (isset($t['Error'])) {
    // Fix: Cannot access offset of type array on array
    // If Error in session is an array, convert to string so it can be used as array key below
    $error = is_array($t['Error']) ? json_encode($t['Error']) : $t['Error']; 
    \Session::put('Error', $error);
    $e = ['sms' => $error, $error => 0];
    \Session::put('flash_message', $e);
}
if (isset($t['flash_notification'])) {
    $flash = $t['flash_notification'];
    \Session::put('flash_notification', $flash);
}
$url = ($app == 'true') ? 'http://app.' . \Config::get('aplication.host') : 'http://' . \Config::get('aplication.host');
\Session::put('url', $url);

if (isset($timezone) && !empty($timezone)) {
    \Session::put('timezone', $timezone);
}
if (isset($currency) && !empty($currency)) {
    \Session::put('currency', $currency);
}
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