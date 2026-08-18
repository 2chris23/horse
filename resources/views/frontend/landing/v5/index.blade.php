@extends('frontend.landing.v5.base')
@section('content')
    <!--sliders-->
    @include('frontend.landing.v5.partials.sliders')
    <!-- instalaciones-->
    @include('frontend.landing.v5.partials.instalaciones')
    <!-- caballos -->
    @include('frontend.landing.v5.partials.poetafolio2')
    @include('frontend.landing.v5.partials.horses')
    <!-- fotos y videos -->
    @include('frontend.landing.v5.partials.portafolio')
    <!-- contacto -->
    @include('frontend.landing.v5.partials.contacto')
@endsection