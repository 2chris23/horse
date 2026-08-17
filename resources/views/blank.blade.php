@extends('backend.layouts.base')
@section('title', "Horses World Sale" )

@section('topcss')
    <style>
        .campo-error{
            margin-top: 25%;
            padding-bottom: 32%;
        }
    </style>
@endsection
@section('topjs')


@endsection
@section('content')
    @php

        $stud = new \App\Models\Stud();
    $titulo = "Proximamente";
    $contenido = "Este contenido pronto estara disponible";
    @endphp
    <div class="card">
        <div class="card-block">
            <div class='card-header bg-white '>
                @if(isset($error))
                    {!! $error['error'] !!}
                @else
                    {!! $titulo !!}

                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <div class="campo-error text-center">
                        <h2>
                    @if(isset($error))
                        {!! $error['error_message'] !!}
                    @else
                        {!! $contenido !!}

                    @endif
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('bottomjs')


@endsection
