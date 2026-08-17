@extends('frontend.landing.v4.base')
@section('title', trans('stud.home'))
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
    <!-- BANNER SLIDER -->
    @include('frontend.landing.v4.partials.slider')
        <!-- END / BANNER SLIDER -->

        <!-- ACCOMMODATIONS -->
    @include('frontend.landing.v4.partials.horses')
        <!-- END / ACCOMMODATIONS -->


        <!-- ABOUT -->
    @include('frontend.landing.v4.partials.about')
        <!-- END / ABOUT -->

        <!-- DEALS PACKAGE -->
    @include('frontend.landing.v4.partials.sexos')
        <!-- END / DEALS PACKAGE -->

        <!-- NEWS -->
    @include('frontend.landing.v4.partials.videos')
        <!-- END / NEWS -->

    <!-- MAP -->
    @include('frontend.landing.v4.partials.info')
    <!-- END / MAP -->
@endsection
