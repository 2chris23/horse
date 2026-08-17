<?php $etiquetalabel = "col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 text-sm-left text-md-left text-lg-right "; ?>
<?php $tiquetainput = " col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 "; ?>

@php
    $seleccionado = (isset($seleccionado))?$seleccionado:0;
    $sexo = Publico::Arraysex();
    $horse = (isset($horse))?$horse:new horse();
    $validacion = (isset($validacion))?$validacion:0;

//dd($principales);


@endphp
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
    <div class="form-group row">
        <label class="{!! $etiquetalabel !!} col-form-label ">
            {{trans('horse.text.sex')}} :
        </label>
        <div class="{!! $tiquetainput !!}">
            <select class=" form-control" data-style="btn-primary"
                    onchange="cubric()"
                    onselect="cubric()"
                    id="input_horse_sex"
                    name="sex"
            >
                @foreach($sexo as $k=>$v)


                    <option data-tokens="{!! $k !!}" value="{!! $k !!}"
                            @if($k==$seleccionado) selected @endif>{!! $v !!}</option>

                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center cubris">
    <div class="form-group row">
        <label class="{!! $etiquetalabel !!} col-form-label ">
            {{trans('horse.text.cubricion')}} :
        </label>
        <div class="{!! $tiquetainput !!} row p-r-0 ">
            <div class="col-2 col-sm-12 col-md-3 ">
                <button type="button" id="cubri_si"
                        class=" btn btn-labeled btn-success {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                <span class="btn-label">
                    <i class="fa fa-check"> </i>
                </span>
                    {{trans('text.yes')}}
                </button>
                <button type="button" id="cubri_no"
                        class=" btn btn-labeled btn-danger {!!  ($horse->getToCubri() == false)?'':'hidden-xl-down' !!} ">
                        <span class="btn-label">
                            <i class="fa fa-close"> </i>
                        </span>
                    {{trans('text.no')}}
                </button>
                <input type="hidden" value="{!! $horse->getToCubri() !!}"
                       name="cubribol" id="cubribol">
            </div>
            <div class="col-4 col-sm-12 col-md-5  cubricon {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                <input type="text"
                       placeholder="{{trans('horse.placeholder.price')}}"
                       id="cubri"
                       name="cubri"
                       value="{{Funciones::AjustarNumeroMil($horse->getCubri())}}"
                       class="form-control numbers ">

            </div>
            <div class="col-4 col-sm-12 col-md-4  cubricon {!! ($horse->getToCubri() == true)?'':'hidden-xl-down' !!}">
                <select class=" form-control "
                        data-style="btn-primary"
                        id="moneda1"
                        name="moneda1"
                        placeholder=""
                        onchange="cambioa()"
                        onselect="cambioa()"
                        aria-describedby="basic-addon3 ">


                    @foreach($Monedas as $k=>$v)
                        <option data-tokens="{!! $v['small'] !!}"
                                value="{!! $v['small'] !!}"
                                @if($horse->getMonedabase() == $v['small']) selected @endif>
                            {!! $v['nombre'] !!}
                            {{--({!! $v['small'] !!})--}}

                        </option>
                    @endforeach

                </select>

            </div>
        </div>
    </div>
</div>

<script>

    $('#input_horse_sex').on('change', function () {
        var t = $('#input_horse_sex').val();
        if (t == 1) {
            $('.cubris').removeClass('hidden-xl-down');
        } else if (t == 4) {
            $('.cubris').removeClass('hidden-xl-down');
        } else {
            $('.cubris').addClass('hidden-xl-down');
        }
    });
    $(window).on('load', function () {
        $('#cubri_si').on('click', function (e) {
            $('#cubri_si').addClass('hidden-xl-down').prop('checked', false);
            $('#cubri_no').removeClass('hidden-xl-down').prop('checked', true);
            $('.cubricon').addClass('hidden-xl-down');
            $('#cubribol').val(0);
        });
        $('#cubri_no').on('click', function (e) {
            $('#cubribol').val(1);
            $('.cubricon').removeClass('hidden-xl-down');
            $('#cubri_no').addClass('hidden-xl-down').prop('checked', false);
            $('#cubri_si').removeClass('hidden-xl-down').prop('checked', true);

        });
    });
</script>
