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
@endphp
<!-- =-=-=-=-=-=-= Ad Detail Modal =-=-=-=-=-=-= -->
<div class="sticky-ad-detail">
    <div class="container">
        <div class="col-md-7 col-sm-12 col-xs-12 no-padding">
            <div class="">
                <h3>{!! $horse->getName() !!}</h3>
                <div class="short-history">
                    <ul>
                        {{--
                                                <li>
                                                    {!! trans('portal.fechapub1') !!} : <b>{!!  Funciones::AjustarFechaDmy($horse->created_at)!!}</b>
                                                </li>
                                                --}}
                        {{--
                        @if(!empty($sexo))
                            <li>
                                {!! trans('portal.sex') !!} : <b>
                                    @if($sexo!=0)
                                        {!! trans('horse.sex.'.$sexo )!!}
                                    @endif
                                </b>
                        @endif
                        @if(!empty($raza))
                            @if(($raza)!=0)
                                <li>{!! trans('portal.raza') !!} : <b>
                                        <a href="#">{!! trans('horse.raza.'.$raza) !!}</a>
                                    </b>
                                </li>
                            @endif
                        @endif
                        --}}
                        <li>{!! trans('portal.location') !!} : <b>
                                @php($stud = $horse->getYeguada())
                                @if(!empty($stud->getAddress()))
                                    {!! $stud->getAddress() !!}, {!! $stud->getCity() !!}
                                    , {!! $stud->getStateModel()->name!!}
                                    , {!! $stud->getCountryModel()->getName() !!}
                                    <br>
                                @endif
                            </b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5  col-sm-12 col-xs-12 no-padding">
            <div class="pull-left row">
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                @if(!empty($horse->getStudPhone()))
                    @php($ph = $horse->getStudPhone())
                    @if(isset($ph[0]))
                        @php($ph = Phone::find($ph[0]['id']))
                        <!-- Email Modal -->

                            <a href="tel:{!! $ph->getFormatNumberOnly() !!}" class="btn btn-block pull-left btn-phone number "
                               data-last="111111X">
                                <i class="fa fa-phone">
                                </i>
                                {!! $ph->FormatNumber()!!}
                                {{--
               <i class="fa fa-phone">
               </i> 0320<span>XXXXXXX</span>
               --}}
                            </a>
                        @endif
                    @endif
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a data-toggle="modal" data-target=".price-quote" href="javascript:void(0)"
                       class="btn btn-block pull-left btn-message">
                        <i class="icon-envelope">
                        </i> {!! trans('portal.emailcontact') !!} </a>
                </div>
            </div>
        </div>
    </div>
</div>
