<div class="col-12 row text-center m-t-35">
    <div class="col-12 text-center ">
        <p class=" promo " style="font-size: 18px">
            {!! trans('suscripcion.caracteristicastitulo') !!}
        </p>
    </div>

</div>
<div class="offset-1 col-10  text-center m-t-25">
    @php($ps = trans('suscripcion.caracteristica1.gallery.icon'))
    @php($ps = trans('suscripcion.caracteristica1'))
    <div class="row ">
        @foreach($ps as $k=>$v)
            <div class="col-12  col-lg-4 portfolio_item carta overside  text-center">
                <div class="m-2 ctn">

                    <i class="{!! $v['icon'] !!}"></i>
                    <p class="card-titulo">
                        {!! $v['tittle'] !!}
                    </p>
                    <p>
                        {!! $v['sub'] !!}

                    </p>
                </div>
            </div>
        @endforeach

    </div>
</div>
