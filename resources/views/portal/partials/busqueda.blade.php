@php
$prs = \Session::get('pre');

    $mx = \Session::get('mexico');
  $spa = \Session::get('espana');
  $colombia = \Session::get('colombia');

   if($mx == true){
       $pais = \Session::get('pais_id');
   }elseif($spa == true){
       $pais = \Session::get('pais_id');
   }elseif($colombia == true){
       $pais = \Session::get('pais_id');
   }else{
       $pais = null;
   }
$mx = !empty($mx)?$mx:false;
$spa = !empty($spa)?$spa:false;
$colombia = !empty($colombia)?$colombia:false;
@endphp

<div class="col-xs-12">
    <!-- Heading -->
    <div class="content">
        <div class="heading-caption">
            {{--<h1>Dinos que estas buscando</h1>--}}
            <p>
                @if($mx == true)
                    {!! trans('portal.landing.subtituloMx') !!}
                @elseif($spa == true)
                    {!! trans('portal.landing.subtituloEs') !!}
                @elseif($colombia == true)
                    {!! trans('portal.landing.subtituloCol') !!}
                @elseif($prs == true)
                    {!! trans('portal.landing.subtituloPre') !!}
                @else
                    {!! trans('portal.landing.subtitulo') !!}
                @endif
            </p>
        </div>
        <form id="busqueda" method="post" action="{!! route('probusquedapost') !!}" class="search-form">
            {!! csrf_field() !!}
            <ul class="nav nav-pills">
                
                    <li  class="active" >
                        <a href="#raza" data-toggle="tab">
                             @if($prs != true)
                            {!! trans('portal.tabraza') !!}
                            @else
                            Caracteristica

                            @endif
                        </a>
                </li>
                
                @if(empty($pais))
                    <li >
                        <a href="#pais" data-toggle="tab">
                            {!! trans('portal.tabcountry') !!}
                        </a>
                    </li>
                @endif
                {{--
                <li>
                    <a href="#sex" data-toggle="tab">Sexo</a>
                </li>
                --}}

            </ul>
            <div class="tab-content clearfix">
                <div class="tab-pane active" id="raza">
                    <div class=" row">
                        @if($prs != true)
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                @include('portal.partials.raza')
                            </div>
                        @endif
                        <!-- Input Field -->
                        <div class="
                        @if($prs == true)
                        col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8
                        @else
                        col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 
                        @endif
                        ">
                            <input type="text" class="form-control" name="texto"
                                   placeholder="{!! trans('portal.RazaBusqueda') !!}"/>
                        </div>

                        <!-- Search Button -->

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                            <input type="submit" class="hidden" id="btnbus">
                            <input type="submit" class="hidden" id="env1">
                            <a href="#!" class="btn btn-theme btn-block"
                               onclick="$('#btnbus').click()">
                                {!! trans('portal.BottomSearch') !!}
                                <i class="fa fa-search" aria-hidden="true">
                                </i>
                            </a>
                        </div>

                    </div>

                </div>
                
                    <div class="tab-pane " id="pais">

                        <div class="row ">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 
                            @if(!empty($pais))
                             hidden hidden-xs-up 
                             @endif ">
                                <!-- Category -->
                                @include('portal.partials.country')
                            </div>
                            <!-- Input Field -->
                            <div class="
                            @if(empty($pais))
                                col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 
                            @else
                                 col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 
                            @endif

                            ">
                                @include('portal.partials.state')
                            </div>

                            <!-- Search Button -->
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                                <input type="submit" class="hidden" id="env2">
                                <a href="#!" onclick="$('#env2').click()"
                                   class="btn btn-theme btn-block">
                                   {!! trans('portal.BottomSearch') !!}
                                    <i class="fa fa-search" aria-hidden="true">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                {{--
                <div class="tab-pane " id="sex">
                    <form id="sexx">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <!-- Category -->
                                @include('portal.partials.country')

                            </div>
                            <!-- Input Field -->
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                @include('portal.partials.state')
                            </div>

                            <!-- Search Button -->
                            <div class="col-md-4 col-xs-12 col-sm-4">
                                <a href="#!" onclick="BuscarP()" class="btn btn-theme btn-block">{!! trans('portal.BottomSearch') !!}
                                    <i
                                            class="fa fa-search" aria-hidden="true">
</i>
</a>
                            </div>
                        </div>
                    </form>
                </div>
                --}}
            </div>
        </form>
    </div>
</div>
