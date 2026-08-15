@php($orden = isset($orden)?$orden:null)
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <form id="busqueda"
          method="post"
          action="{!! route('probusqueda') !!}"
            {{--action="{!! route('NuevaBusqueda') !!}"
      {{--onsubmit="Envio(); "--}}>
        {!! csrf_field() !!}
        {{--@include('portal.listas.partials.moneda')--}}
        @include('portal.listas.partials.raza',['raza'=>$raza])
        @include('portal.listas.partials.genero',['sex'=>$sex])
        @include('portal.listas.partials.capa',['color'=>$color])
        @include('portal.listas.partials.precio',['pricemin'=>$pricemin,'pricemax'=>$pricemax])
        @include('portal.listas.partials.alzada',['raisedmin'=>$raisedmin,'raisedmax'=>$raisedmax])
        @include('portal.listas.partials.doma',['doma'=>$doma])
        @include('portal.listas.partials.country',['country'=>$country])
        @include('portal.listas.partials.state',['state'=>$state])
        <div class="panel panel-default">
<div class="col-xs-12 text-center">
            @include('fb-widget')
</div>
        </div>
        <div class="panel panel-default">

            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-5526230813846865"
                 data-ad-format="rectangle"
                 data-ad-slot="9508884700"
            >

            </ins>
        </div>
        <input type="hidden" class="hidden" id="orden" name="orden" value="{!! $orden !!}">
    </form>
</div>