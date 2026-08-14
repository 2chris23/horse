@extends('frontend.landing.v5.base')
@php($venta= isset($venta)?$venta:0)
@php($logo = $stud->getLogo())
@section('fbheader')

    @include('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
])
@endsection
@section('content')

    @include('frontend.landing.v5.partials.nhorse')
    @include('frontend.landing.v5.partials.contacto')
@endsection