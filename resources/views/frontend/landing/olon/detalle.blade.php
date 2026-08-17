@extends('frontend.landing.v3.base')

@section('content')
    @php
        $razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
          $colores =  $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
          $colorcoorp = $stud->getColor();
          $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        $f =$horse->getPhotoFirstModel();
        $img = null;
        if(!empty($f)){
            $img = $f->getUrl();
        }


$edad = $horse->getAge();
$mes = $horse->getAgeMonth();
$sold = ($horse->sold == 1) ?'sold':'';
$fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
$Ptr = Funciones::CompartirPinterest($horse->getName(),Request::fullUrl());
    $print = route('VersionImpresa',['ids'=>$horse->slug]);

    @endphp

    @include('frontend.landing.v3.partial.intro',['title'=>$horse->getName(),'stitle'=>$stud->getName(),'fondo'=>$img])
    @include('frontend.landing.v3.partial.about',['title'=> $horse->getName(),'description'=>$horse->getDescripcion(),'detalles'=>1])
    @include('frontend.landing.v3.partial.fotos',['fotos'=>1,'imagenes'=>$horse->getPhotoModel(),'titulo'=>  trans('stud.ouranimal')])




    @include('frontend.landing.v3.partial.contact')
@endsection
