@extends('backend.layouts.base')
{{-- Se usa --}}
@section('title', trans('Titulos.OpcionesStud') )

@section('topcss')


@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                {!! trans('users.titlechanmgelenguage') !!}
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        @include('backend.common.idioma')

                    </div>
                </div>
                <div class="offset-3 col-6 m-t-25 text-center">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                            <a href="#savebot" onclick="CambioIdioma()" id="savebot"
                               class="save btn btn-block btn-warning glow_button">{!! trans('users.save') !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <script>
        function CambioIdioma(){

            changelan($('#lang').val());
        }
    </script>
@endsection
