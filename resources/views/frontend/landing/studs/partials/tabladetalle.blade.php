@php
    /*
        $nombre = (isset($nombre))?$nombre:null;
        $doma = (isset($doma))?$doma:null;
        $raza = (isset($raza))?$raza:null;
        $precio = (isset($precio))?$precio:null;
        $bday = (isset($bday))?$bday:null;
        $ParaVender = (isset($ParaVender))?$ParaVender:null;
        $raised = (isset($raised))?$raised:null;
        $vendido = (isset($vendido))?$vendido:null;
        $sex = (isset($sex))?$sex:null;*/
        $horse=(isset($horse))?$horse:null;
    if(!empty($horse)){

    $fotos = $horse->getPhotoModel();
    $nombre = $horse-> getName();
    $doma = $horse-> getDoma();
    $raza = $horse-> getRaza();
    $precio = $horse-> getPrice();
    $bday = Funciones::AjustarFechaDmy($horse-> getBirthdate());
    $raised = $horse-> getRaised();
    $ParaVender= $horse->getTosold();
    $vendido= $horse->getSold();
    $yeguada= $horse->getStud();
    $sex= $horse->getSex();
    //$fotos = Photo::find(39);
    if($vendido == false)$vendido = 0;
    if($ParaVender == false)$ParaVender = 0;
    if($doma == false)$doma = 0;
    }
@endphp
@if(!empty($horse))
    <div class="col-xs-12 table-responsive">
        <table class="table table-responsive">
            <tbody>
            <tr>
                <td>{!! trans('horse.text.name') !!}</td>
                <td>{!! $nombre !!}</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.doma') !!}</td>
                <td>{!! trans('horse.doma.'.$doma) !!}</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.raza') !!}</td>
                <td>{!! trans('horse.raza.'.$raza) !!}</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.birthdate') !!}</td>
                <td>{!! $bday !!}</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.raised') !!}</td>
                <td>{!! $raised !!} cm</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.tosolds') !!}</td>
                <td>{!! trans('horse.tosold.'.$ParaVender) !!}</td>
            </tr>
            @if($ParaVender != false)
                <tr>
                    <td>{!! trans('horse.text.sold') !!}</td>
                    <td>{!! trans('horse.sold.'.$vendido) !!}</td>
                </tr>

                <tr>
                    <td>{!! trans('horse.text.price') !!}</td>
                    <td>
                        @if(empty($precio))
                            <span class="consulta">
                                                    {!! trans('users.pricecheck') !!}

                                                </span>
                            {{--Contacto--}}
                        <!-- CONSULTAR PRECIO AQUI -->
                        @else

                            {!! $precio !!}
                            <i class="fa fa-eur"> </i>

                        @endif
                        {{--{!! $precio !!}--}}
                            </td>
                </tr>
            @endif
            <tr>
                <td>{!! trans('horse.text.stud') !!}</td>
                <td>{!! $yeguada !!}</td>
            </tr>
            <tr>
                <td>{!! trans('horse.text.sex') !!}</td>
                <td>{!! trans('horse.sex.'.$sex) !!}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endif