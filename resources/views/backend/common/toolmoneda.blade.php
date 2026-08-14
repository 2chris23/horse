@php
    /*
        $css = null;
        $Coins = \Session::get('moneda');
        $Coins = empty($Coins)?'USD':$Coins;
        */

        $precio = (isset($precio))?$precio:null;
        $horse = (isset($horse))?$horse:null;
        $class = (isset($class))?$class:'';
        $p = (isset($p))?$p:null;
        $c = (isset($c))?$c:null;
        //$monedasactivas = App\Model\Moneda::where('status',1)->get()->pluck('small');
        $monedasactivas = null;
        /*
        if(!empty($Coins)  ) {
            if(!empty($precio)){
                if($precio!=0){
                    $ccs = Funciones::currencyConverter($Coins, $precio);
                }
            }
        }else{
            $css = null;
        }
    */

@endphp




@if(!empty($horse))
    class="tooltip {!! $class !!} "
    @if(!empty($p))
        @if($horse->price !=0)
            data-slugp = "{!! $horse->slug !!}"
            data-urlmoneda="{!! route('MonedaCaballo')."/".$horse->slug !!}"
        @endif
    @endif
    @if(!empty($c))
        @if($horse->price !=0)
            data-slugc = "{!! $horse->slug !!}"
            data-urlcubri="{!! route('CubricionCaballo')."/".$horse->slug !!}"
        @endif
    @endif

@else
    {{--
    @if(!empty($monedasactivas))
        @if(!empty($precio))
            @if($precio !=0)
                @if(!empty($ccs))
                    rel="tooltip"
                    data-html="true"
                    data-toggle="tooltip"
                    data-placement="auto"
                    data-toggle="popover"
                    data-trigger="hover"



                    title=" @foreach($monedasactivas as $k=>$v) {!! Funciones::AjustarNumeroMil(Funciones::currencyConverter($v, $precio),0) !!} {!! $v !!}
                    <br> @endforeach "
                    data-title=" @foreach($monedasactivas as $k=>$v) {!! Funciones::AjustarNumeroMil(Funciones::currencyConverter($v, $precio),0) !!} {!! $v !!}
                    <br> @endforeach "
                    data-content=" @foreach($monedasactivas as $k=>$v) {!! Funciones::AjustarNumeroMil(Funciones::currencyConverter($v, $precio),0) !!} {!! $v !!}
                    <br> @endforeach "


                @endif
            @endif
        @endif
    @endif
    --}}
@endif
