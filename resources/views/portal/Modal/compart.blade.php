@php
    $precio = Funciones::AjustarNumeroMil($horse->getPrice());
    $raza = $horse->getRaza();
    $razas = trans('horse.raza');
    $alzada = $horse->getRaisedFormat();
    $edad = $horse->getAge();


                                        $mes = $horse->getAgeMonth();
$sexo = $horse->getSex();
$doma = $horse->getDoma();
$yeguada = $horse->getStud();
$stud =  $horse->getYeguada();
$fbs = Funciones::CompartirFacebook($horse->getName(),Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(),Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
if(!empty($horse->getPhotoModel()))
if(!empty($horse->getPhotoModel()->first()))
$foto = $horse->getPhotoModel()->first()->url;
else{
$foto = url('portal_/images/car.png');
}
else{
$foto = url('portal_/images/car.png');
}
@endphp
<!-- =-=-=-=-=-=-= Share Modal =-=-=-=-=-=-= -->

<div class="modal fade share-ad " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Comparte</h3>
            </div>
            <div class="modal-body">
                <div class="recent-ads">
                    <div class="recent-ads-list">
                        <div class="recent-ads-container">
                            <div class="recent-ads-list-image">
                                <a href="#" class="recent-ads-list-image-inner">
                                    <img src="{!! $foto !!}" alt="{!! $horse->getAltText() !!}">
                                </a>
                                <!-- /.recent-ads-list-image-inner -->
                            </div>
                            <!-- /.recent-ads-list-image -->
                            <div class="recent-ads-list-content">
                                <h3 class="recent-ads-list-title">
                                    <a href="#">{!! $horse->getName() !!}</a>
                                </h3>
                                <ul class="recent-ads-list-location">
                                    <li>
                                        <a href="#"> {!! $horse->getStudName() !!}<br>
                                            {{--{!! $horse->getStudLocation() !!}--}}


                                            {!! $stud ->getAddress() !!}, {!! $stud ->getCity() !!}
                                            , {!! $stud ->getStateModel()->name!!}
                                            , {!! $stud ->getCountryModel()->name !!}
                                            {{--{!! trans('portal.pubdate',['date'=>Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}

                                        </a>
                                        @if(!empty($raza))
                                            <br>
                                            <a href="3">
                                                <strong>Raza</strong> : {!! trans('horse.raza.'.$raza )!!}
                                            </a>
                                        @endif
                                        @if(!empty($sexo))
                                            <br>
                                            <a href="3">
                                                <strong>Sexo</strong> : {!! trans('horse.sex.'.$sexo )!!} <br>

                                            </a>
                                        @endif
                                        @if(!empty($color))
                                            <a href="3">
                                                <strong>Color</strong> : {!! $color !!} <br>

                                            </a>
                                        @endif
                                        @if(!empty($doma))
                                            @if($doma == 1)
                                                <a href="3">
                                                    <strong>Doma</strong> : {!! trans('horse.doma.'.$doma )!!} <br>

                                                </a>
                                            @endif
                                        @endif
                                        @if(!empty($edad))
                                            <a href="3">
                                                <strong>Edad</strong> : {!! $edad !!} {!! trans('horse.years') !!} <br>
                                            </a>
                                        @endif
                                        @if(!empty($alzada))
                                            <a href="3">
                                                <strong>Alzada</strong> : {!! $alzada !!}<br>
                                            </a>

                                        @endif
                                    </li>

                                    {{--
                                    <li>
                                        <a href="#">New York</a>,</li>
                                    <li>
                                        <a href="#">Brooklyn</a>
                                     </li>
                                    --}}

                                </ul>
                                <!-- /.recent-ads-list-price -->
                                <div class="recent-ads-list-price">
                                    {!! $horse->ObtenPrecioMonedaMill() !!}
                                    <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                    {{--
                                    {!! $precio !!} <i class="fa fa-eur">
                                    </i>
                                    --}}
                                </div>

                            </div>
                            <!-- /.recent-ads-list-content -->
                        </div>
                        <!-- /.recent-ads-container -->
                    </div>
                </div>
                {{--
                <h3>Descripcion</h3>

                <br>

                {!! $horse->getDescripcion() !!}
                <h3>Link</h3>
                <p>
                    <a href="{!! Request::fullUrl() !!}">{!! Request::fullUrl() !!}</a>
                </p>
                --}}
            </div>
            <div class="modal-footer">

                <a href="#!"
                   onclick="window.open('{!! $fbs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                   class="btn btn-fb btn-md">
                    <i class="fa fa-facebook">
                    </i>
                </a>
                <a href="#!"
                   onclick="window.open('{!! $tws !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                   class="btn btn-twitter btn-md">
                    <i class="fa fa-twitter">
                    </i>
                </a>
                <a href="#!"
                   onclick="window.open('{!! $Gs !!}', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                   class="btn btn-gplus btn-md">
                    <i class="fa fa-google-plus">
                    </i>
                </a>
            </div>

        </div>
    </div>
</div>