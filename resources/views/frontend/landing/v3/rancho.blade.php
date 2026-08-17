@extends('frontend.landing.v3.base')
@section('content')
    <div class="rancho">
        <div class="tituloSeccion">{!! $stud->getName() !!}</div>
        <div class="separacion"></div>
        <div class="texto">{!! $stud->getDescription() !!}</div>
        <div class="imagenes">
            <img class="grande" src="{!! url('theme/b/img/rancho01.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/rancho02.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/rancho03.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/rancho04.jpg') !!}"/>
            <img class="peque" src="{!! url('theme/b/img/rancho05.jpg') !!}"/>
        </div>
        <div class="clear"></div>
    </div>
@endsection
