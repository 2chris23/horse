@php
    $caballos = isset($horses) ? $horses : $stud->Horses()->get();
    $venta = isset($venta) ? $venta : 0;
@endphp
<section id="ourPakeg" class="ourPakeg">
    <div class="container">
        <div class="main_pakeg_content">
            <div class="row">
                <div class="head_title text-center">
                    <h4>{!! trans('stud.ouranimal') !!}</h4>
                </div>

                @if(count($caballos) > 0)
                    <div class="row">
                        @foreach($caballos as $t)
                            @php
                                $f = method_exists($t, 'getPhotoFirstModel') ? $t->getPhotoFirstModel() : null;
                                $foto = (!empty($f)) ? $f->getUrl() : '';
                                $sold = (isset($t->sold) && $t->sold == 1) ? 'sold' : '';
                            @endphp
                            <div class="col-md-4 col-sm-6 m-b-30">
                                <div class="single_pakeg_text {{ $sold }}">
                                    <div class="pakeg_title">
                                        <h4>{!! $t->getName() !!}</h4>
                                    </div>
                                    @if($foto != '')
                                        <div class="m-b-10">
                                            <img src="{!! $foto !!}" alt="{!! $t->getName() !!}" class="img-responsive">
                                        </div>
                                    @endif
                                    <div class="row text-left">
                                        <div class="col-xs-6">{!! trans('portal.raza') !!}:</div>
                                        <div class="col-xs-6">{!! trans('horse.raza.'.$t->raza) !!}</div>
                                    </div>
                                    @if(method_exists($t, 'getPrice') && $t->getPrice() > 0)
                                        <div class="row text-left">
                                            <div class="col-xs-6">{!! trans('portal.precio') !!}:</div>
                                            <div class="col-xs-6">{!! Funciones::AjustarNumeroMil($t->getPrice()) !!}</div>
                                        </div>
                                    @endif
                                    @if($sold == 'sold')
                                        <span class="badge badge-warning">{!! trans('vendido.vendido') !!}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <p>{!! trans('portal.nohorses') !!}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
