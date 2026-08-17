@php
    $Coins = \Session::get('moneda');

        $css = null;
        $Coins = empty($Coins)?'USD':$Coins;
$logo =url("landing/images/basic/logo.png");
$logo =url("portal_/images/logoportal.png");
$logo = url(\Config::get('logos.logoh350'));
$lng = \Config('lenguaje') ?? [];
$Monedas = \Session::get('monedas') ?? [];
$escritorio = Agent::isDesktop();

 $mx = \Session::get('mexico');
   $spa = \Session::get('espana');
   $colombia = \Session::get('colombia');
    if($mx == true){
        $pais = \Session::get('pais_id');
    }elseif($spa == true){
        $pais = \Session::get('pais_id');
    }elseif($colombia == true){
        $pais = \Session::get('pais_id');
    }else{
        $pais = null;
    }
$mx = !empty($mx)?$mx:false;
$spa = !empty($spa)?$spa:false;
$colombia = !empty($colombia)?$colombia:false;
@endphp



{{-- Menu de app --}}

<div class="transparent-header mobile-custom">
    <div class="header-top">
        <div class="container">
            <div class="row">
                {{-- Header Top Left --}}
                <div class="header-top-left col-md-7 col-sm-6 col-xs-12 hidden-xs">
                    <div class="col-xs-5 col-md-4 pull-left">
                        <ul class="listnone
@if($mx == true) hidden hidden-xs-up
@elseif($spa == true) hidden hidden-xs-up
@elseif($colombia == true) hidden hidden-xs-up
@endif">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" rel="nofollow" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-globe" aria-hidden="true">
                                    </i>
                                    {!! trans('portal.idiom') !!}
                                    <span class="caret"> </span>
                                </a>
                                <ul class="dropdown-menu">

                                    @foreach($lng as $k=>$v)
                                        <li>
                                            <a href="{!! route('lengauje',['lang'=>$k]) !!}">{!! $v !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-md-3 pull-left">
                        <ul class="listnone
@if($mx == true) hidden hidden-xs-up
@elseif($spa == true) hidden hidden-xs-up
@elseif($colombia == true) hidden hidden-xs-up
@endif">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" rel="nofollow" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-money" aria-hidden="true">
                                    </i>
                                    {!! $Coins !!}
                                    <span class="caret"> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    @for($i = 0;$i<count($Monedas);$i++)
                                        <?php $v = $Monedas[$i]; ?>
                                        {{--@foreach($Monedas as $k=>$v)--}}
                                        <li>
                                            {{--<a href="{!! route('lengauje',['lang'=>$k]) !!}">{!! $v !!}</a>--}}
                                            <a href="{!! route('monedas',['mon'=>$v['small']]) !!}"
                                               rel="nofollow">{!! $v['small'] !!}
                                                ({!! $v['simbolo']!!})</a>
                                        </li>
                                    @endfor
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- Header Top Right Social --}}
                <div class="header-right col-md-5 col-sm-6 col-xs-12 ">
                    <div class="pull-right">
                        <ul class="listnone">
                            <li>

                                <ul class="listnone hidden-lg hidden-md hidden-sm
@if($mx == true) hidden hidden-xs-up
@elseif($spa == true) hidden hidden-xs-up
@elseif($colombia == true) hidden hidden-xs-up
@endif">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" rel="nofollow"
                                           role="button"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-globe" aria-hidden="true">
                                            </i>
                                            {!! trans('portal.idiom') !!}
                                            <span class="caret"> </span>
                                        </a>
                                        <ul class="dropdown-menu">

                                            @foreach($lng as $k=>$v)
                                                <li>
                                                    <a href="{!! route('lengauje',['lang'=>$k]) !!}">{!! $v !!}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>

                            </li>


                            <li>

                                <ul class="listnone hidden-lg hidden-md hidden-sm
@if($mx == true) hidden hidden-xs-up
@elseif($spa == true) hidden hidden-xs-up
@elseif($colombia == true) hidden hidden-xs-up
@endif">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" rel="nofollow" data-toggle="dropdown"
                                           role="button"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-money" aria-hidden="true">
                                            </i>
                                            {!! $Coins !!}
                                            <span class="caret"> </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @for($i = 0;$i<count($Monedas);$i++)
                                                <?php $v = $Monedas[$i]; ?>
                                                {{--@foreach($Monedas as $k=>$v)--}}
                                                <li>
                                                    {{--<a href="{!! route('lengauje',['lang'=>$k]) !!}">{!! $v !!}</a>--}}
                                                    <a href="{!! route('monedas',['mon'=>$v['small']]) !!}"
                                                       rel="nofollow">{!! $v['small'] !!}
                                                        ({!! $v['simbolo']!!})</a>
                                                </li>
                                            @endfor
                                        </ul>
                                    </li>
                                </ul>

                            </li>

                            <li>
                                <a href="{!! url(\Config::get('otra.hfacebook')) !!}" rel="nofollow me" target="_blank">
                                    <i class="fa fa-facebook">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="{!! url(\Config::get('otra.htwitter')) !!}" rel="nofollow me" target="_blank">
                                    <i class="fa fa-twitter">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="{!! url(\Config::get('otra.hyoutube')) !!}" rel="nofollow me" target="_blank">
                                    <i class="fa fa-youtube">
                                    </i>
                                </a>
                            </li>
                            @php
                                $login = "#login";

                            @endphp


                            @if(empty(\Auth::user()))
                                <li>
                                    <a href="{{ url('login') }}">
                                        <i class="fa fa-sign-in"></i> {!! trans('portal.login') !!}
                                    </a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="{{ url('login') }}">
                                        <i class="fa fa-unlock" aria-hidden="true"></i> {!! trans('portal.register') !!}
                                    </a>
                                </li>
                            @else


                                <li>
                                    <a href="{{ url('/panel/Caballos') }}" rel="nofollow">
                                        <i class="fa fa-sign-in"></i> {!! trans('portal.panel') !!}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}" rel="nofollow"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        <i class="fa fa-unlock" aria-hidden="true">
                                        </i> {!! trans('portal.salir') !!}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Top Bar End --}}
    {{-- Navigation Menu --}}
    <nav id="menu-1" class="mega-menu">
        {{-- menu list items container --}}
        <section class="menu-list-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        {{-- menu logo --}}
                        <ul class="menu-logo">
                            <li>
                                <div class="col-xs-12">
                                    <div class=" col-xs-12 col-sm-3 col-md-3 col-xl-3 col-lg-3">
                                        <a href="{!! route('portal') !!}">
                                            <figure class="logom">
                                                <img class="img-responsive " src="{!!  $logo !!}" alt="logo">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class=" col-xs-12 col-sm-6 col-md-6 col-xl-6 col-lg-6">
                                        @include('pubs')

                                    </div>
                                    <div class=" col-xs-12 col-sm-3 col-md-3 col-xl-3 col-lg-3 ">
                                        <div class="col-xs-offset-2 col-xs-6 text-center">
                                            <a href="{!! route('landinghome') !!}" class="btn btn-light  btnpub"
                                               target="_blank">
                                                <i class="fa fa-plus"
                                                   aria-hidden="true">
                                                </i> {!! trans('portal.publica') !!}
                                            </a>
                                        </div>
                                        @include('fb-buttom')
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </nav>
</div>