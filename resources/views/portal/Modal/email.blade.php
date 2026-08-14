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
<div class="modal fade report-mail " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span
                            class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">{{--Why are you reporting this ad?--}}
                    {!! trans('portal.watchlist',['name'=>$horse->name]) !!}
                </h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form method="post" action="{!! route('EnviarCaballo') !!}">
                    <input type="hidden" id="url" name="url" value="{!! Request::fullUrl() !!}">
                    <input type="hidden" id="idcaballo" name="idcaballo" value="{!!$idcaballo !!}">
                    {!! csrf_field() !!}
                    <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                            <label>
                                {!! trans('stud.namecontact') !!}
                            </label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="{!! trans('portal.placholdername') !!}" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>
                                {!! trans('stud.emailcontact') !!}
                            </label>
                            <input type="email" class="form-control" name="mail"
                                   placeholder="{!! trans('portal.placholderemail') !!}" required>
                        </div>
                    </div>
                    <div class="form-group  col-md-12 col-sm-12">
                        <label>{!! trans('report.comentario') !!}</label>
                        <textarea placeholder="{!! trans('report.palceholder.comparte') !!}" rows="3"
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
                        <button type="submit" class="btn btn-theme btn-block">
                            {!! trans('report.share') !!}
                        </button>
                    </div>
                    <div class="clearfix">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>