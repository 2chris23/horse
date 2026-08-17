{{--
https://developers.facebook.com/tools/debug/
https://cards-dev.twitter.com/validator
https://developers.pinterest.com/rich_pins/validator/
https://developers.google.com/structured-data/testing-tool/

--}}
<?php

//$titulo
//$descripcion
//$logo
//$imagenes
//$url =
//$lang =
//$twpublica = n
//$twautor =m
//$videos=m


//https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=http%3A%2F%2Fhorsesworldsale.com%2Fyeguadajuanvazquez
$descripcion = isset($descripcion) ? Funciones::LimpiarTextoHard($descripcion) : '';
$titulo = isset($titulo) ? Funciones::LimpiarTextoHard($titulo) : '';
$key = isset($key) ? Funciones::LimpiarTextoHard($key) : '';
$horse = isset($horse) ?$horse : null;
/*
$lngalterno = isset($lngalterno) ? $lngalterno : null;
$lsd = isset($lsd) ? $lsd : null;
*/

$nombrederuta = Funciones::NombreDeRuta();
if (!isset($lngalterno)) {

    $lngalterno = '';
    $lsd = '';
    if (empty($horse)) {

        $g = Funciones::MetodosPorRoute(Request::route());
        foreach ($g['lng'] as $k => $v) {
            $lngalterno .= "<link rel=\"alternate\" hreflang=\"$k\" href=\"$v\" />";
            $lsd .= "$k,";
        }
    } elseif (!empty($horse)) {

        foreach ($horse->GetUrlLenguaje() as $k => $v) {
            $lngalterno .= "<link rel=\"alternate\" hreflang=\"$k\" href=\"$v\" />";
            $lsd .= "$k,";
        }

    }
}

?>


<meta charset="utf-8">
<!-- COMMON TAGS -->
<!-- Search Engine -->
<meta name="keywords" content="{{$key}}"/>
<meta name="image" content="{!! $logo !!}"/>
<meta name="description" content="{{strip_tags($descripcion) }}"/>
<!-- MArcado Schema.org para Google+ -->
<meta itemprop="name" content="{{ $titulo }}">
<meta itemprop="description" content="{{strip_tags($descripcion) }}">
<meta itemprop="image" content="{!! $logo !!}">
<meta itemprop="url" content="{!! Request::fullUrl() !!}">
<meta itemprop="logo" content="{!! $logo !!}">

<!-- Marcado Schema.org para Google+ -->
<!-- Schema.org for Google -->
<meta itemprop="name" content="{{ $titulo }}"/>
<meta itemprop="description" content="{{strip_tags($descripcion) }}"/>

<meta itemprop="image" content="{!! $logo !!}"/>
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="{{ $titulo }}"/>
<meta name="twitter:description" content="{{strip_tags($descripcion) }}"/>
<meta name="rating" content="General"/>
<meta name="revisit-after" content="2 days">
{{--<meta content='index,follow' name='robots' />--}}
{{--<meta name="twitter:site" content="@PelisPedia">--}}
{{--<meta name="twitter:creator" content="@PelisPedia">--}}
{{--<link href="https://www.google.com/+PelispediaTv-PeliculasHD" rel="publisher"> ----}}
{{--
<meta name="twitter:site" content="{!! $twpublica !!}" />
<meta name="twitter:creator" content="{!! $twautor !!}" />
--}}
<meta name="twitter:image:src" content="{!! $logo !!}"/>
<!-- Twitter - Product (e-commerce) -->
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta property="og:type" content="website"/>
<meta property="og:title" content="{{ $titulo }}"/>
<meta property="og:description" content="{{strip_tags($descripcion) }}"/>
<meta property="fb:app_id" content="260261811093896"/>
{{--
@foreach($imagenes as $h => $i)
    <meta property="og:image" content="{!! $i->url !!}"/>
@endforeach
--}}
<meta property="og:image" content="{!! $logo !!}"/>
<meta property="og:image:alt" content="{!! $logo !!}"/>
<meta property="og:url" content="{!! Request::fullUrl() !!}"/>
<meta property="og:site_name" content="{{ $titulo }}"/>
<meta property="og:locale" content="{!!  \Session::get('lang') !!}"/>
{{--
<meta property="og:video" content="{!! $videos  !!}" />
<meta name="twitter:player" content="{!! $videos  !!}" />
--}}
{{--
<meta name="fb:admins" content="facebookid" />
<meta name="fb:app_id" content="appodfb" />
<meta property="og:type" content="product" />
--}}
{{--

<!-- Open Graph - Product (e-commerce) -->
<meta name="product:availability" content="aviable" />
<meta name="product:price:currency" content="eur" />
<meta name="product:price:amount" content="555" />
<meta name="product:brand" content="tags" />

--}}
    <meta itemprop="availableLanguage" content="[{!! $lsd!!}]">
    {!! $lngalterno !!}

{{--
@foreach(LaravelLocalization::getSupportedLocales() as $l => $properties)
    <link rel="alternate" hreflang="{{$l}}"
          href="{{LaravelLocalization::getLocalizedURL($l, Request::fullUrl(), [], true)}}"/>";
@endforeach
--}}
