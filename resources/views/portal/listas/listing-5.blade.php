@php($logo =url("portal_/images/logoportal.png"))
@php($raza=(isset($raza))?$raza:0)
@extends('portal.baselarge')

@php
    $texto = isset($texto)?$texto:null;
        $f[0]=url('landing/images/slider/1/2.jpg');
        $f[1]=url('landing/images/slider/1/6.jpg');
        $f[2]=url('landing/images/slider/1/9.jpg');
        $f[3]=url('landing/images/slider/1/8.jpg');
        if(isset($horses)) $horses_ = $horses;
        $raza = (isset($raza))?$raza:null;
        $color = (isset($color))?$color:null;
        $country = (isset($country))?$country:null;
        $state = (isset($state))?$state:null;
        $sex = (isset($sex))?$sex:null;
        $doma = (isset($doma))?$doma:null;
        $raisedmin = (isset($raisedmin))?$raisedmin:null;
        $raisedmax = (isset($raisedmax))?$raisedmax:null;
        $pricemax = (isset($pricemax))?$pricemax:null;
        $pricemin = (isset($pricemin))?$pricemin:null;
    $escritorio = Agent::isDesktop();

    $mx = \Session::get('mexico');
       $colombia = \Session::get('colombia');
       $spa = \Session::get('espana');
        if($mx == true){
            $pais = \Session::get('pais_id');
        }elseif($spa == true){
            $pais = \Session::get('pais_id');
        }elseif($colombia == true){
            $pais = \Session::get('pais_id');
        }else{
            $pais = null;
        }
@endphp
@php($moneda = '<i class="fa fa-eur"></i>')
@section('social')
    @php
        $seokey = trans('seo.portalkey');
        $seoDes =  trans('seo.portaldescription');
            if($mx == true){
                $seokey = trans('portal.tagsMexico');
                $seoDes = trans('portal.DescripMexico');
            }elseif($spa == true){
                $seokey = trans('portal.tagsEspana');
                $seoDes = trans('portal.DescripEspana');
            }elseif($colombia == true){
                $seokey = trans('portal.tagsCol');
                $seoDes = trans('portal.DescripCol');
            }

        $seokey = (empty($seokey))?trans('seo.portalkey'):$seokey;
        $seoDes = (empty($seoDes))?trans('seo.portaldescription'):$seoDes;
    @endphp
    @include('meta',
[
'titulo' =>  \Config::get('app.name'),
'descripcion'=>$seoDes,
'key'=>$seokey,
'logo'=>$logo,
])

    <link rel="stylesheet" href="{!! route('Search.css')!!}">
    <link rel="stylesheet" href="{!! route('Listacss')!!}">

@endsection
@section('content')



    <section class="section-padding gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4 col-lg-8 col-sx-12">
                    <!-- Row -->
                    <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="showing">
                            <!-- Sorting Filters Breadcrumb -->
                            <div class="filter-brudcrums">
                                <span id="mostrando">
                                    {!! trans('portal.showing',[
                                    'currentpage'=>$horses->currentPage(),'',
                                    'lastpage'=>$horses->lastPage(),'',
                                    'total'=>$horses->total(),'',
                                    ]) !!}
                                </span>
                                {{--@if(!is_array($raza))--}}
                                <div class="filter-brudcrums-sort">
                                    <ul>
                                        <li><span>{!! trans('portal.orderby') !!}:</span></li>
                                        <li>
                                            <a href="#!" onclick="setOrden('alzada')">{!! trans('portal.raised') !!}</a>
                                            {{--<a href="{!! route('portalporraza',['raza'=>$raza,'orden'=>'alzada']) !!}">{!! trans('portal.raised') !!}</a>--}}
                                        </li>
                                        <li>
                                            <a href="#!" onclick="setOrden('color')">{!! trans('portal.color') !!}</a>
                                            {{--<a href="{!! route('portalporraza',['raza'=>$raza,'orden'=>'color']) !!}">{!! trans('portal.color') !!}</a>--}}
                                        </li>
                                        <li>
                                            <a href="#!" onclick="setOrden('edad')">{!! trans('portal.age') !!}</a>
                                            {{--<a href="{!! route('portalporraza',['raza'=>$raza,'orden'=>'edad']) !!}">{!! trans('portal.age') !!}</a>--}}
                                        </li>
                                        <li>
                                            <a href="#!" onclick="setOrden('precio')">{!! trans('portal.price') !!}</a>
                                            {{--<a href="{!! route('portalporraza',['raza'=>$raza,'orden'=>'precio']) !!}">{!! trans('portal.price') !!}</a>--}}
                                        </li>
                                        {{--<li><a href="#">Warranty</a></li>--}}
                                    </ul>
                                </div>
                                {{--@endif--}}
                            </div>
                            <!-- Sorting Filters Breadcrumb End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry" id="fieldhorses">
                            <div class="col-md-12 col-xs-12 col-sm-12" id="horsesplace">
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                @include('portal.listas.partials.horse',['horses'=>$horses])
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}
                                {{-------------------------------------------------------------------------------------------------------------------}}

                            </div>

                        </div>

                        <!-- Ads Archive End -->
                        <!-- Advertizing -->
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <section class="advertising">
                                <a href="{!! route('landinghome') !!}">
                                    <div class="banner">
                                        <div class="wrapper">
                                            <span class="title">
                                                {!! trans('portal.publicidad2.titulo') !!}
                                            </span>
                                            <span class="submit">
                                                {!! trans('portal.publicidad2.subtitulo') !!}
                                                <i class="fa fa-plus-square"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /.banner-->
                                </a>
                            </section>
                        </div>
                        <!-- Advertizing End -->
                        <div class="col-md-12 col-xs-12 col-sm-12 text-center" id="pagination">
                            {{--
                            @if(isset($horses_))
                                {!! $horses_->render() !!}
                            @else
                                {!! $horses->render() !!}
                            @endif
                            --}}
                            @if(isset($horses_))
                                {!! $horses_->links() !!}
                            @else
                                {!! $horses->links() !!}
                            @endif
                        </div>
                        <div class="clearfix"></div>
                        <!-- Pagination -->
                        <!-- Pagination End -->
                    </div>
                    <!-- Row End -->
                </div>
                <div class="col-md-4 col-md-pull-8 col-sx-12 hidden-xs hidden-sm ">
                    <div class="sidebar">
                        @if($escritorio == true)
                            @include('portal.listas.partials.busqueda',['texto'=>$texto])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($escritorio == false)
        <div id="searching">
            <h3 id="searching-label"><a href="#!"><i class="fa fa-search"></i> </a></h3>
            <ul>
                <li>
                    @include('portal.listas.partials.busqueda')
                </li>

            </ul>
        </div>
    @endif
@endsection
@section('js')

    <script src="{!! route('Listajs') !!}"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endsection

