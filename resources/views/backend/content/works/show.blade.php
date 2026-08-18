@extends('backend.layouts.base')
@section('title', trans('horse.Tittle') )
@php($dsa = 1)
@section('content')

    @php($stud = Stud::find($aplications->id))

    <div id="datos4" class="card col-12 m-t-20">
        {{--video--}}
        <div class="row m-t-20">
            <div class="col-12">
            <span class="pull-right">

                <a href="{!! route('Aplications.index') !!}" class="btn btn-warning">Volver</a>
            </span>
            </div>
        </div>
        <div class="card-block m-t-20">
            <div class="row">
                <!-- LADO IZQUIERDO-->
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <span class="card-title">
                                {!! trans('trabajo.generalinfo') !!}
                            </span>

                            {{--
<span class="float-right">

    <i class="fa fa-pencil edito"></i>
    <i class="fa fa-chevron-up"></i>
    <i class="fa fa-close"></i>
    <i class="fa fa-tint"></i>
    <i class="fa fa-arrows-alt"></i>

</span>

--}}

                        </div>
                        <div class="card-block">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="motijob-sidebar col-xs-12 ">
                                            <div class="candidate-profile-picture">
                                                <div class="upload-img-field preview text-center">
                                                    <figure><img src="{!! $aplications->foto !!}" alt=""
                                                                 class="img-fluid"></figure>
                                                </div>

                                            </div>
                                            <!-- end .agent-profile-picture -->
                                            <div class="candidate-general-info col-xs-12 m-t-20">
                                                <ul class="list-unstyled candidate-registration ">
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.name') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->getName()}}</label>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.bday') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->getBdaySlash()}}</label>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.age') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->Anio()}}</label>
                                                        </div>
                                                    </li>


                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.country') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            {{--<input class="w100"  type="text" placeholder="{!! trans('trabajo.place.country') !!}">--}}
                                                            @if(!empty($aplications->Country()->first()))
                                                                <label for="">{{$aplications->Country()->first()->name}}</label>
                                                            @else

                                                            @endif

                                                        </div>
                                                    </li>

                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.state') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">

                                                            @if(!empty($aplications->State()->first()))
                                                                <label for="">{{$aplications->State()->first()->name}}</label>
                                                            @else

                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.city') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->getCity()}}</label>

                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.address') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->getAddress()}}</label>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.phone') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="">{{$aplications->getPhone()}}</label>
                                                        </div>
                                                    </li>
                                                    <li class="clearfix row col-xs-12">
                                                        <div class="col-5">
                                                            <strong>{!! trans('trabajo.email') !!}:</strong>
                                                        </div>
                                                        <div class="col-7">
                                                            {{$aplications->getEmail()}}
                                                        </div>
                                                    </li>


                                                    @if(!empty($aplications->getDocs()))

                                                        <li class="clearfix row col-xs-12 m-t-15">
                                                            <div class="col-5">
                                                                <strong>{!! trans('trabajo.docleft') !!}:</strong>
                                                            </div>
                                                            <div class="col-7">
                                                                <a href="{!! $aplications->getDocs() !!}"
                                                                   target="_blank"
                                                                   class="btn btn-warning">
                                                                    {!! trans('trabajo.download') !!}

                                                                </a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <!-- end .candidate-general-info -->
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- end .3col grid layout -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LADO IZQUIERDO-->

                <!-- LADO derecho-->
                <div class="col-12 col-md-8 row">
                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header bg-white">
                            <span class="card-title">
                                {!! trans('trabajo.skillc') !!}
                            </span>
                                {{--
                                <span class="float-right">

                                    <i class="fa fa-pencil edito"></i>
                                    <i class="fa fa-chevron-up"></i>
                                    <i class="fa fa-close"></i>
                                    <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>

                                </span>
                                --}}
                            </div>
                            <div class="card-block">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-12 m-t-20 row ">
                                            @foreach($aplications->getSkills() as $k=>$v)

                                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 pdt5">
                                                    <i class="fa fa-check text-success  "></i>
                                                    {!! trans('categorias.contacto.'.$v) !!}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> <!-- end .candidate-reg-form -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header bg-white">
                            <span class="card-title">
                                {!! trans('trabajo.presentc') !!}
                            </span>
                                {{--
                                <span class="float-right">

                                    <i class="fa fa-pencil edito"></i>
                                    <i class="fa fa-chevron-up"></i>
                                    <i class="fa fa-close"></i>
                                    <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>

                                </span>
                                --}}
                            </div>
                            <div class="card-block">
                                <div class="card-block">
                                    <div class="job-reg-form">
                                        <div class="candidate-single-content m-t-20">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="candidate-des-editore">
                                                        <p>
                                                            {{$aplications->getPresent()}}
                                                        </p>
                                                    </div> <!-- end textarea-editor -->

                                                </div> <!-- end .condidate-description -->

                                            </div> <!-- end .8th grid layout -->
                                        </div> <!-- end nasted .row -->
                                    </div> <!-- end .candidate-single-content -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-12">
                        <div class="card">
                            <div class="card-header bg-white">
                            <span class="card-title">
                                {!! trans('trabajo.infoplus') !!}
                            </span>
                                {{--
                                <span class="float-right">

                                    <i class="fa fa-pencil edito"></i>
                                    <i class="fa fa-chevron-up"></i>
                                    <i class="fa fa-close"></i>
                                    <i class="fa fa-tint"></i>
                                    <i class="fa fa-arrows-alt"></i>

                                </span>
                                --}}
                            </div>
                            <div class="card-block">
                                <div class="card-block">
                                    <div class="job-reg-form">
                                        <div class="candidate-single-content m-t-20">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="candidate-des-editore">
                                                        <p>
                                                            {{$aplications->getSms()}}
                                                        </p>
                                                    </div> <!-- end textarea-editor -->

                                                </div> <!-- end .condidate-description -->

                                            </div> <!-- end .8th grid layout -->
                                        </div> <!-- end nasted .row -->
                                    </div> <!-- end .candidate-single-content -->
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class=" col-12">
                            <div class="card">
                                <div class="card-header bg-white">
                            <span class="card-title">
                                {!! trans('trabajo.nota') !!}
                            </span>
                                    {{--
                                    <span class="float-right">

                                        <i class="fa fa-pencil edito"></i>
                                        <i class="fa fa-chevron-up"></i>
                                        <i class="fa fa-close"></i>
                                        <i class="fa fa-tint"></i>
                                        <i class="fa fa-arrows-alt"></i>

                                    </span>
                                    --}}
                                </div>
                                <div class="card-block">
                                    <div class="card-block">
                                        <div class="job-reg-form">
                                            <div class="candidate-single-content m-t-20">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="candidate-des-editore">
                                                            <p>
                                                                {{--Aqui notas de la yeguada--}}
                                                            </p>
                                                        </div> <!-- end textarea-editor -->
                                                    </div> <!-- end .condidate-description -->
                                                </div> <!-- end .8th grid layout -->
                                            </div> <!-- end nasted .row -->
                                        </div> <!-- end .candidate-single-content -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{--
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <a href="#!" class="btn btn-warning btn-black"> Borrar</a>
                        </div>
                    </div>
                </div>
                --}}
                </div>
                <!-- LADO derecho-->
            </div>
        </div>

        <script>
            function Borrar() {
                console.log('realmente desea borrar bla bla');
            }
        </script>
@endsection
