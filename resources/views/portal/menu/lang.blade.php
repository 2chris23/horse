@php
    $Coins = \Session::get('moneda');

        $css = null;
        $Coins = empty($Coins)?'USD':$Coins;
$logo =url("landing/images/basic/logo.png");
$logo =url("portal_/images/logoportal.png");
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

