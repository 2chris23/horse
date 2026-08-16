<div class="offset-2 col-10 row text-center">
    @php($ps = trans('suscripcion.caracteristica1'))

    @foreach($ps as $k=>$v)

        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <i class="{!! trans('suscripcion.iconos.'.$k) !!}"></i>
                </div>
                <div class="card-body">{!! $v !!}</div>
                <div class="card-footer">Footer</div>
            </div>
        </div>

    @endforeach
</div>

