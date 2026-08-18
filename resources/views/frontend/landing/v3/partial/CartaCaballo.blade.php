<div class="row" id="cartasCaballo">
    @forelse($horses as $v)
        @php
            $f = $v->getPhotoFirstModel();
            $foto = '';
            if (!empty($f)) {
                $foto = $f->getUrl();
            }
            if (empty($foto)) {
                $foto = url('portal_/images/car.png');
            }
            $edad = $v->getAge();
            $mes = $v->getAgeMonth();
            $precio = $v->getPrice();
            $precioTxt = '';
            if ($v->sold == 1) {
                $precioTxt = trans('users.sold');
            } elseif ($v->tosold == 1 && !empty($precio)) {
                $precioTxt = Funciones::AjustarNumeroMil($precio) . ' ' . $v->getSimboloMoneda();
            } else {
                $precioTxt = trans('users.pricecheck');
            }
        @endphp
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="caballo">
                <div class="img">
                    <a rel="nofollow" href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">
                        <img class="img-fluid" src="{!! $foto !!}" alt="{!! $v->getName() !!}">
                    </a>
                </div>
                <div class="info">
                    <div class="titulo">
                        <a rel="nofollow" href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">
                            {!! $v->getName() !!}
                        </a>
                    </div>
                    <div class="clear"></div>
                    <div class="infoTexto">
                        {!! trans('horse.raza.'.$v->raza) !!},
                        @if($edad != 0)
                            {!! trans('horse.years',['ano'=>$edad]) !!}
                        @else
                            {!! trans('horse.mes',['mes'=>$mes]) !!}
                        @endif
                    </div>
                    <div class="precio">@if($precioTxt) {!! $precioTxt !!} @endif</div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            {!! trans('users.emptyTable') !!}
        </div>
    @endforelse
</div>
@if(method_exists($horses, 'links'))
    <div class="row justify-content-center">
        {{ $horses->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif