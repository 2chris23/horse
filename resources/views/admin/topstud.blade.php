@if(isset($stud))
    <div class="row col-12 m-t-25 row">

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <a href="#!" onclick="none('{!! route('yeguadas.perfil',['id'=>$stud->id]) !!}')"
               class="save btn btn-block btn-warning glow_button">Perfil</a>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <a href="#!" onclick="none('{!! route('yeguadas.editar',['id'=>$stud->id]) !!}')"
               class="save btn btn-block btn-warning glow_button">Yeguada</a>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <a href="#!" onclick="none('{!! route('yeguadas.caballos',['id'=>$stud->id]) !!}')"
               class="save btn btn-block btn-warning glow_button">Caballos</a>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <a href="#!" onclick="none('{!! route('yeguadas.fotos',['id'=>$stud->id]) !!}')"
               class="save btn btn-block btn-warning glow_button">Fotos</a>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <a href="#!" onclick="none('{!! route('yeguadas.videos',['id'=>$stud->id]) !!}')"
               class="save btn btn-block btn-warning glow_button">Videos</a>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 pull-right">
            <a href="#!" onclick="none('{!! route('yeguadas.index') !!}')"
               class="save btn btn-block glow_button pull-right">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span>
                    Volver al Listado
                </span>
            </a>
        </div>

    </div>
    <script>
        function none(url) {
            if (url !== undefined) {
                window.location.assign(url);
            }
            console.log('click');
        }
    </script>
@endif