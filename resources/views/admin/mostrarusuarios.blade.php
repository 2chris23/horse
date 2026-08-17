@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )

@section('topcss')

    <style>

        .pad-5-5 {
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
@endsection
@section('content')

    <div id="datos" class="card col-12 ">
        <div class="card-block">
            <div class='card-header bg-white '>
                Ingresar como un usuario
                {{--
                @if(count($usuarios) !=0)
                    <span style="padding-left:10px;"><span
                                class="badge badge-pill badge-warning notifications_badge_top">{!! count($usuarios )!!}</span>
                                                 </span>
                @endif
                --}}
            </div>
            <div class="row">
                <div class="col-lg-12 m-t-25">
                    <form class="row" method="post" action="{!! route('LoginAsPost') !!}">
                        {!! csrf_field() !!}
                        <div class=" col-9 table-responsive noSwipe m-t-20">
                            <select class="form-control select" name="usuario" id="usuario"
                                    data-placeholder="{!! trans('portal.placecolor') !!}">
                                @foreach($usuarios as $k=>$v)
                                    <option value="{!! $v->id !!}">
                                        {!! $v->Stud()->first()->name !!} - {!! $v->name !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 m-t-20">
                            <input type="submit" class="hidden hidden-xs-up" id="env1">
                            <a href="#!" class="btn btn-theme btn-block btn-success glow_button"
                               onclick="$('#env1').click()">
                                Ingresar Como
                            </a>

                        </div>


                        {{--<div class="offset-3 col-6 text-center ">
                            {{$usuarios->render()}}
                        </div>--}}

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottomjs')
    <script>
        $(document).ready(function () {


        });
    </script>
@endsection
