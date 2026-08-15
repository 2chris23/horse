@php($texto = isset($texto)?$texto:null)
@php($razap = Publico::ArrayRazaPrincipal())
@php($razas = Publico::ArrayRazaSecundaria())
@php($raza = (isset($raza))?$raza:null)

<!-- Razas -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingRaza">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseRaza" aria-expanded="false"
               aria-controls="collapseRaza">
                {{--<i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('users.razas') !!}
                {!! trans('users.razas') !!}
                --}}

                {!! trans('users.searchby') !!}

            </a>

        </h4>
    </div>
    <!-- Content -->
    <div id="collapseRaza" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingRaza">
        <div class="panel-body">
            <!-- Search -->
            {{--
            <div class=" col-xs-12">
                <div class="search-widget col-xs-10">
                    <input placeholder="search" type="text">
                </div>
                <div class="search-widget col-xs-2 pull-right">
                    <a href="javascript:void(0);" class="fkbtn" onclick="Envio()"><i class="fa fa-search"></i></a>
                </div>
            </div>
            --}}

            <div class=" col-xs-12">
                <div class="search-widget">
                    <input placeholder="{!! trans('portal.BottomSearch') !!}" name="texto" type="text" value="{!! $texto !!}">
                    <button type="submit" class="sending'" id="sending" onclick="Envio()"><i class="fa fa-search"></i>
                    </button>

                </div>
            </div>
            <div class="clearfix"></div>
            <!-- Brands List -->
            <div class="skin-minimal">
                <ul class="list">
                    @foreach($razap  as $k=>$v)
                        @php($d = Horse::where(['raza'=>$v['id'],'tosold'=>1, 'sold' => 0])->get())
                        <li>
                            <input type="checkbox"
                                   id="raza-{!! $v['id']!!}"
                                   name="raza[{!! $v['id']!!}]"

                                   @if(!empty($raza))
                                       @if(is_array($raza))
                                           @if(array_key_exists($v['id'],$raza))
                                           checked
                                            @endif
                                        @endif
                                    @endif
                            >
                            <label for="minimal-checkbox-{!! $v['id'] !!}">
                                {{--{!! $v['name'] !!}--}}
                                {!! trans('horse.raza.'.$v['id']) !!}
                                {{--({!! (!empty($d)?count($d):0) !!})--}}
                            </label>
                        </li>
                    @endforeach
                    {{--Todas las razas --}}
                    @foreach($razas as $k=>$v)
                        @if($v['id']!=29)
                            @if($v['id']!=1)
                                {{--1 es seleccionar todos --}}
                                @php($d = Horse::where(['raza'=>$v['id'],'tosold'=>1])->get())
                                <li class=" second-class">
                                    <input type="checkbox"
                                           id="raza-{!! $v['id']!!}"
                                           name="razas[{!! $v['id']!!}]"
                                    >
                                    <label for="minimal-checkbox-{!! $v['id'] !!}">
                                        {{--{!! $v['name'] !!}--}}
                                        {!! trans('horse.raza.'.$v['id']) !!}

                                        {{--({!! (!empty($d)?count($d):0) !!})--}}
                                    </label>
                                </li>
                            @endif
                        @else
                            <li class=" second-class">
                                <input type="checkbox"
                                       id="raza-{!! $v['id']!!}"
                                       name="razas[{!! $v['id']!!}]"
                                >
                                <label for="minimal-checkbox-{!! $v['id'] !!}">{!! $v['name'] !!}
                                    ({!! (!empty($d)?count($d):0) !!})</label>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="morera"><i class="more-less glyphicon glyphicon-plus "></i>
                </div>

            </div>
            <!-- Brands List End -->
        </div>
    </div>

</div>