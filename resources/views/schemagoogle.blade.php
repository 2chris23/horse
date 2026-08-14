{{--
https://developers.facebook.com/tools/debug/
https://cards-dev.twitter.com/validator
https://developers.pinterest.com/rich_pins/validator/
https://developers.google.com/structured-data/testing-tool/

--}}
@php
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
    $descripcion = isset($descripcion)?Funciones::LimpiarTextoHard($descripcion):'';
    $titulo = isset($titulo)?Funciones::LimpiarTextoHard($titulo):'';
    $key = isset($key)?Funciones::LimpiarTextoHard($key):'';
    $nombrederuta=Funciones::NombreDeRuta();
    $lng =  Config::get('lenguaje');
    $lngalterno ='';
    $lsd = '';
    foreach($lng as $k=>$v){
    $f = Funciones::CambiarIdiomaUrl($k."/".Request::path());
    $lsd .= "$k, ";
    $lngalterno .="<link rel=\"alternate\" hreflang=\"$k\" href=\"http://".$_SERVER['HTTP_HOST']."/$f\" />\n";
    //$lngalterno  = '';

    }
     //dd($nombrederuta) ;
@endphp


{{--producto--}}
<div itemscope itemtype="http://schema.org/Product">
    <span itemprop="brand">ACME</span>
    <span itemprop="name">Executive Anvil</span>
    <img itemprop="image" src="anvil_executive.jpg" alt="Executive Anvil logo"/>
    <span itemprop="description">Sleeker than ACME's Classic Anvil, the
    Executive Anvil is perfect for the business traveler
    looking for something to drop from a height.
  </span>
    Product #: <span itemprop="mpn">925872</span>
    <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue">4.4</span> stars, based on <span itemprop="reviewCount">89
      </span> reviews
  </span>
    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    Regular price: $179.99
    <meta itemprop="priceCurrency" content="USD"/>
    $<span itemprop="price">119.99</span>
    (Sale ends <time itemprop="priceValidUntil" datetime="2020-11-05">
      5 November!</time>)
    Available from: <span itemprop="seller" itemscope itemtype="http://schema.org/Organization">
                      <span itemprop="name">Executive Objects</span>
                    </span>
    Condition: <link itemprop="itemCondition" href="http://schema.org/UsedCondition"/>Previously owned,
      in excellent condition
    <link itemprop="availability" href="http://schema.org/InStock"/>In stock! Order now!
  </span>
</div>
{{--producto--}}
{{--organizacion--}}
<span itemscope itemtype="http://schema.org/Organization">
  <link itemprop="url" href="http://www.your-company-site.com">
  <a itemprop="sameAs" href="http://www.facebook.com/your-company">FB</a>
  <a itemprop="sameAs" href="http://www.twitter.com/YourCompany">Twitter</a>
</span>
{{--organizacion--}}
