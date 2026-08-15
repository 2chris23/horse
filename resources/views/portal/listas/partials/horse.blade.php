@php
    //$tiempo = (new Funciones())->MicroTiempo("Inicio = ");

        $moneda = '<i class="fa fa-eur"></i>';
    $Coins = \Session::get('moneda');
    $Coins = empty($Coins)?'USD':$Coins;
    $j=0;
    $t = count($horses);
@endphp
@for($i =0;$i<$t;$i++)
    @php
        //$tca = (new Funciones())->MicroTiempo();
            //$t1 = (new Funciones())->MicroTiempo("Caballo $i inicia $tca --  ",$tiempo);

                $v = $horses[$i];
                $foto = $v -> getFirstFoto();
                    $photo =$v->getPhotoModel();
                        $url = (!empty($foto))?$foto->getUrl():null;
                        $rd = rand(0,3);
                        $color = $v->getColorString();
                        $link =route('portalcaballo',['slug'=>$v->slug]);
                        $titulo = $v->getName();
                        $descripcion = $v->getDescripcion();
                        $precio = $v->price;
                        $altfoto=$v->getAltText();
                        $raza =  trans('horse.raza.'.$v->getRaza());
                        $alzada = $v->getRaisedFormat();
                        $edad = $v->getAge();
                        $mes = $v->getAgeMonth();
         //(new Funciones())->MicroTiempo("Fin de ajuste de variables caballo $i ",$tca);
    @endphp
    @if($j== 4)
        <div class="col-md-12 col-xs-12 col-sm-12">
            <section class="advertising">
                <a href="{!! route('landinghome') !!}" target="_blank">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">
                                {!! trans('portal.publicidad1.titulo') !!}
                            </span>
                            <span class="submit">
                                {!! trans('portal.publicidad1.subtitulo') !!}
                                <i class="fa fa-plus-square"></i>
                            </span>
                        </div>
                    </div>
                    <!-- /.banner-->
                </a>
            </section>
        </div>
        @php($j=0)
    @endif
    @php($j++)
    {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
    @php((new Funciones())->MicroTiempo("Iniciando lista $f f ",$tca))--}}
    <div class="ads-list-archive">
        <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
            <div class="ad-archive-img">
                <a href="{!! $link !!}">
                    <div>
                        <figure class="novo">
                            @if(!empty($url))
                                <img class="img-responsive"
                                     src="{!! $url !!}"
                                     alt="{!! $altfoto !!}">
                            @else
                                <img class="img-responsive"
                                     src="{!! url('portal_/images/posting/car-3.jpg') !!}"
                                     alt="{!! $altfoto !!}"
                                     style="    min-height: 313px; margin: auto !important; ">
                            @endif
                        </figure>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
            <div class="ad-archive-desc">
                {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
                @php((new Funciones())->MicroTiempo("Iniciando precio  ",$tca))--}}

                <div data-getprice="{!! $v->slug !!}"

                     @if(empty($precio))
                     class="horse-special-price"
                @else
                    @include('backend.common.toolmoneda',['horse'=>$v,'p'=>1,'class'=>' horse-special-price '])
                        @endif >
                    @if(empty($precio))
                        <span class="consulta">
                            {!! trans('users.pricecheck') !!}
                        </span>
                    @endif
                </div>
                <!-- Title -->
                {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
                @php((new Funciones())->MicroTiempo("Iniciando toolmoneda ",$tca))--}}
                <a href="{!! $link !!}"
                        {{--@if(!empty($Coins) and !empty($precio)) @php($ccs = Funciones::currencyConverter($Coins, $precio) ) @if(!empty($ccs)) data-toggle="tooltip" data-placement="top" title="{!! Funciones::AjustarNumeroMil($ccs,2) !!} {!! $Coins !!}" @endif @endif--}}
                @if($v->sold == 0)
                    @include('backend.common.toolmoneda',['horse'=>$v,'p'=>1])
                        @endif
                >
                    <h3>{!! $titulo !!} </h3>
                </a>
                <!-- Category -->
                {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
                @php((new Funciones())->MicroTiempo("Iniciando Datos de caballo ",$tca))--}}
                <div class="category-title">
                    	<span>
                    		<a href="{!! $link !!}">{!! $raza !!}</a>
                    	</span>
                    @if(($alzada)!=0)
                        <span>
                    		<a href="{!! $link !!}">, {!! $alzada !!} </a>
                    	</span>
                    @endif
                    @if(($edad!=0))
                        <span>
                    		<a href="{!! $link !!}">,
                                {!! trans('horse.years',['ano'=>$edad]) !!}
                    </a>
                    	</span>
                    @else
                        <span>
                    		<a href="{!! $link !!}">,
                                {!! trans('horse.mes',['mes'=>$mes]) !!}
                    </a>
                    	</span>
                    @endif
                    @if(!empty($color))
                        <span>
                    		<a href="{!! $link !!}">, {!! $color !!}</a>
                    	</span>
                    @endif
                </div>
                <!-- Short Description -->
                <div class="clearfix visible-xs-block">
                </div>
                <div class="hidden-sm corte">
                    <p>
                        {!! $descripcion !!}
                    </p>
                </div>
            {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
            @php((new Funciones())->MicroTiempo("Iniciando telefono ",$tca))--}}
                <!-- Ad Features -->
                <div class="col-xs-12 ">
                    <ul class="add_info">
                        <!-- Contact Details -->
                        @if(!empty($v->getStudPhone()))
                            <li>
                                <div class="custom-tooltip tooltip-effect-4">
                                    <span class="tooltip-item">
                                        <i class="fa fa-phone">

                                        </i>
                                    </span>
                                    <div class="tooltip-content">
                                        {{--
                                        <h4>
                                            {!! trans('portal.contactpub') !!}
                                        </h4>
                                        --}}
                                        @php($tel = $v->getStudPhone())
                                        @if(is_array($tel))
                                            @foreach($tel as $phoneItem)
                                                @php
                                                    $phId = is_array($phoneItem) ? ($phoneItem['id'] ?? null) : null;
                                                    $rw = $phId ? \App\Models\Directory::find($phId) : null;
                                                @endphp
                                                @if($rw)
                                                    <span class="label label-success f-s-18">
                                                        {!! $rw->FormatNumber() !!}
                                                    </span>
                                                    <br>
                                                @endif
                                            @endforeach
                                        @endif
                                        {{--
                                        <strong>Monday to Friday</strong> 09.00 AM - 5.30 PM
                                        <br> <strong>Saturday</strong> 09.00 AM - 5.30 PM
                                        <br> <strong>Sunday</strong>
                                            <span class="label label-success">+92-123-4567</span>
                                            --}}
                                    </div>
                                </div>
                            </li>
                        @endif
                    <!-- Address -->
                        {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
                        @php((new Funciones())->MicroTiempo("Iniciando Localidad ",$tca))--}}
                        @if(!empty($v->getStudLocation()))
                            <li>
                                <div class="custom-tooltip tooltip-effect-4">
                                                <span class="tooltip-item">
                                                    <i class="fa fa-map-marker">
                                                    </i>
                                                </span>
                                    <div class="tooltip-content">
                                        <h4>{!! trans('portal.address') !!}</h4>
                                        @php($stud = $v->getYeguada())
                                        <span class="ad-pub">
                                                 {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                            , {!! $stud->getStateModel()->name!!}
                                            , {!! $stud->getCountryModel()->name !!}
                                            {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                            </span>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                    <!-- Ad History -->
                    {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
                    @php((new Funciones())->MicroTiempo("¨Publicacion ",$tca))--}}
                    <div class="clearfix archive-history">
                        <div class="last-updated">
                            {{--a{adido hace x dias--}}
                            {!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmySlash($v->created_at)]) !!}
                        </div>
                        <div class="ad-meta">
                            <a class="btn btn-success" href="{!! $link !!}">
                                <i class="fa fa-eye"></i>
                                {!! trans('portal.seemore') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ad Desc End -->
        </div>
        <!-- Content Block End -->
    </div>

    {{--@php($f = (new Funciones())->MicroTiempo() - $tiempo)
    @php((new Funciones())->MicroTiempo("Fin Caballo TCA $i ",$tca))
    @php( ((new Funciones())->MicroTiempo("Fin caballo $i //$f//",$tiempo) -$tiempo))--}}

@endfor