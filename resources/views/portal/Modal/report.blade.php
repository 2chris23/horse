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
$idcaballo = $horse->id;

@endphp
<!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
<div class="modal fade report-quote " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">{{--Why are you reporting this ad?--}}{!! trans('report.titulo',['name'=>$horse->name]) !!}</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form method="post" action="{!! route('ReportarCaballo') !!}">
                    <input type="hidden" id="url1" name="url" value="{!! Request::fullUrl() !!}">
                    <input type="hidden" id="idcaballo1" name="idcaballo" value="{!!$idcaballo !!}">
                    {!! csrf_field() !!}
                    <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                            <ul class="list">
                                <li>
                                    <input type="radio" id="r1" name="reporti" value="1">
                                    <label for="r1">{!! trans('report.r1') !!}</label>
                                </li>
                                <li>
                                    <input type="radio" id="r2" name="reporti" value="2">
                                    <label for="r2">{!! trans('report.r2') !!}</label>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group  col-md-6 col-sm-6">
                            <ul class="list">
                                <li>
                                    <input type="radio" id="r3" name="reporti" value="3">
                                    <label for="r3">{!! trans('report.r3') !!}</label>
                                </li>
                                <li>
                                    <input type="radio" id="r4" name="reporti" value="4">
                                    <label for="r4">{!! trans('report.r4') !!}</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group  col-md-12 col-sm-12">
                        <label>{!! trans('report.comentario') !!}</label>
                        <textarea placeholder="{!! trans('report.palceholder.comentario') !!}" rows="3"
                                  name="comentario" class="form-control"></textarea>
                    </div>
                    {{--<div class="col-md-12 col-sm-12">
                        <img src="{!! url('portal_/images/captcha.gif') !!}" alt=""
                             class="img-responsive">
                    </div>--}}
                    {!! Recaptcha::render() !!}
                    <div class="clearfix">
                    </div>
                    <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">{!! trans('report.submit') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>