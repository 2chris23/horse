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
   $stud = $horse->getYeguada();
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
<!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
<div class="modal fade price-quote " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                     <span aria-hidden="true">
                        ×
                     </span>
                    <span class="sr-only">
                        {!! trans('portal.close') !!}
                     </span>
                </button>
                <h3 class="modal-title" id="lineModalLabel">
                    {!! trans('portal.emailforprice') !!}
                </h3>
            </div>
            <div class="modal-body">
                <div class="recent-ads">
                    <div class="recent-ads-list">
                        <div class="recent-ads-container">
                            <div class="recent-ads-list-image">
                                <a href="#" class="recent-ads-list-image-inner">
                                    <figure style="max-height: 300px">
                                    <img src="{!! $foto !!}" alt="{!! $horse->getAltText() !!}" class="img-responsive" style="    margin: auto;
    max-width: 300px;">
                                    </figure>
                                </a>
                                <!-- /.recent-ads-list-image-inner --> </div>
                            <!-- /.recent-ads-list-image -->
                            <div class="recent-ads-list-content">
                                <h3 class="recent-ads-list-title">
                                    <a href="#">
                                        {!! $horse-> getName() !!}
                                    </a>
                                </h3>
                                <ul class="recent-ads-list-location">
                                    <a href="#">
                                        {!! $horse-> getStudName() !!}<br>
                                        {{--{!! $horse->getStudLocation() !!}--}}
                                    </a>
                                    <li>
                                        <a href="#">
                                            {!! $stud ->getAddress() !!}
                                        </a>
                                        ,
                                    </li>
                                    <li>
                                        <a href="#">
                                            {!! $stud ->getCity() !!}
                                        </a>
                                        ,
                                    </li>
                                    <li>
                                        <a href="#">
                                            {!! $stud ->getStateModel()->name!!}
                                        </a>
                                        ,
                                    </li>
                                    <li>
                                        <a href="#">
                                            {!! $stud ->getCountryModel()->name !!}
                                        </a>
                                    </li>
                                    {{--{!! trans('portal.pubdate',['date'=>
                                   Funciones::AjustarFechaDmy($horse->created_at)]) !!}--}}
                                </ul>
                                <div class="recent-ads-list-price">
                                    {!! $horse->ObtenPrecioMonedaMill() !!}
                                    <span class="coinl coinl-local">
                        {!! $horse->getSimboloMoneda() !!}
                    </span>
                                    {{--{!! $precio !!} <i class="fa fa-eur">--}}
                                    </i>
                                </div>
                                <!-- /.recent-ads-list-price -->
                            </div>
                            <!-- /.recent-ads-list-content -->
                        </div>
                        <!-- /.recent-ads-container -->
                    </div>
                </div>
                <!-- content goes here -->
                <form method="post" action="{!! route('contactocaballoventa',['slug'=>$horse->slug]) !!}">
                    {!! csrf_field() !!}
                    <input type="hidden" class="hidden" name="horse_id"value="{!! $horse->id !!}">
                    <div class="form-group col-md-6 col-sm-6">
                        <label>
                            {!! trans('portal.placholdername') !!}
                        </label>
                        <input type="text" class="form-control"  name="nombre" placeholder="{!! trans('portal.placholdername') !!}" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <label>
                            {!! trans('portal.placholderemail') !!}
                        </label>
                        <input type="email" name="email" class="form-control" placeholder="{!! trans('portal.placholderemail') !!}" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label>
                            {!! trans('portal.contactpub') !!}
                        </label>
                        <input type="text" name="phone" class="form-control" placeholder="{!! trans('portal.contactpub') !!}" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label>
                            {!! trans('portal.placholdersms') !!}
                        </label>
                        <textarea name="mensaje" placeholder="{!! trans('portal.placholdersms') !!}"  required
                                  rows="3" class="form-control"></textarea>
                    </div>
                    {!! Recaptcha::render() !!}
                   {{-- <div class="col-md-12 col-sm-12">
                    <img src="{!! url('portal_/images/captcha.gif') !!}" alt=""
                    class="img-responsive">

                   </div>--}}

                    <div class="clearfix">
                    </div>
                    <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">
                            {!! trans('portal.contactsend') !!}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
