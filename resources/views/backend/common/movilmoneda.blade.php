@php

    $css = null;
    $Coins = \Session::get('moneda');
    $Coins = empty($Coins)?'USD':$Coins;
    $detalle  = isset($detalle)?0:1;

    $precio = (isset($precio))?$precio:null;
    $monedasactivas = App\Model\Moneda::where('status',1)->get()->pluck('small');
    if(!empty($Coins)  ) {
        if(!empty($precio)){
            if($precio!=0){
                $ccs = Funciones::currencyConverter($Coins, $precio);
            }
        }
    }else{
        $css = null;
    }
@endphp

@if(Agent::isMobile())
    @if(!empty($monedasactivas))
        @if(!empty($precio))
            @if($precio !=0)
                @if(!empty($ccs))
                    @if($detalle ==1)
                        <br><span class="extrasmall monedas"
                                  style="    font-size: 11px; padding-left: 6px;    letter-spacing: 0.1px;">
                        @foreach($monedasactivas as $k=>$v) {!! Funciones::AjustarNumeroMil(Funciones::currencyConverter($v, $precio),0) !!} {!! $v !!} @if((count($monedasactivas)-1) != $k)
                                /@endif @endforeach </span>
                    @else
                        <div class="col-sm-4 col-md-4 col-xs-12 no-padding"
                             style="    font-size: 10px; padding-left: 6px;    letter-spacing: 0.1px; font-weight: bold;">
                            <div class="col-xs-6">
                                <span> <strong>Otras Monedas</strong> : </span>
                            </div>
                            <div class="col-xs-6 row">
                            <span class="extrasmall monedas" >
                        @foreach($monedasactivas as $k=>$v) {!! Funciones::AjustarNumeroMil(Funciones::currencyConverter($v, $precio),0) !!} {!! $v !!} @if((count($monedasactivas)-1) != $k)
                                    <br>@endif @endforeach </span>
                            </div>
                        </div>
                    @endif
                @endif

            @endif
        @endif
    @endif
@endif

