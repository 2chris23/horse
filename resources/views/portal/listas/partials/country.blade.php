@php($country = (isset($country))?$country:null)
<!-- Pais -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingCountry">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseContry" aria-expanded="false"
               aria-controls="collapseContry">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.tabcountry') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseContry" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingCountry">
        <div class="panel-body">
            <!-- Search -->
            <div class="search-widget">
                {{--

                <input placeholder="search" type="text">
                <button type="submit"><i class="fa fa-search"></i></button>
                --}}
                @php($principales = \App\Http\Controllers\PublicController::ArrayPaisPrincipal())
                @php($secundarios = \App\Http\Controllers\PublicController::ArrayPais())
                <select class=" form-control select"
                        data-style="btn-primary"
                        id="country"
                        name="country"

                        data-placeholder="{{trans('stud.placeholder.country')}}">
                    @if(count($principales != 0))
                        <optgroup label="{!! trans('users.recomended') !!}">
                            @foreach($principales as $k=>$v)
                                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                        @if(!empty($country))
                                            @if(is_array($country))
                                                @if(in_array($v['id'],$country))
                                                selected
                                                @endif
                                        @else
                                            @if(($v['id'] == $country))
                                                selected
                                                @endif
                                            @endif
                                        @endif
                                >{!! $v['name'] !!}</option>

                            @endforeach
                        </optgroup>
                    @endif
                    @if(count($secundarios != 0))
                        <optgroup label="_______________________">
                            @foreach($secundarios as $k=>$v)
                                <option data-tokens="{!! $v['id'] !!}" value="{!! $v['id'] !!}"
                                        @if(!empty($country))
                                        @if(is_array($country))
                                        @if(in_array($v['id'],$country))
                                        selected
                                        @endif
                                        @else
                                        @if(($v['id'] == $country))
                                        selected
                                        @endif
                                        @endif
                                        @endif
                                >{!! $v['name'] !!}</option>
                            @endforeach
                        </optgroup>
                    @endif
                </select>
                <div class="clearfix"></div>
            </div>
            <!-- Brands List -->
            <div class="skin-minimal">
                {{--
                                                            <select class="form-control" name="country[]" multiple="multiple" id="country">
                                                                @foreach(Publico::ArrayPais() as $k=>$v)

                                                                <option value="{!! $v['id'] !!}">{!! $v['name'] !!}</option>
                                                                    @endforeach
                                                            </select>
                                                            --}}

                {{--
                <ul class="list">
                    @foreach(Publico::ArrayPaisPrincipal() as $k=>$v)
                        <li>
                            <input type="checkbox" id="checkbox-p-{!! $v['id']!!}">
                            <label for="checkbox-p-{!! $v['id'] !!}">{!! $v['name'] !!}
                            </label>
                        </li>
                    @endforeach

                    @foreach(Publico::ArrayPais() as $k=>$v)
@if($v['id']!=1)

                            <li class=" second-classp">
                                <input type="checkbox"
                                       id="checkbox-p-{!! $v['id']!!}">
                                <label for="checkbox-p-{!! $v['id'] !!}">{!! $v['name'] !!}
                                </label>
                            </li>
                        @endif
                    @endforeach
                </ul>
                --}}
                {{--<div class="morerap"><i class="more-less glyphicon glyphicon-plus "></i>
                </div>--}}

            </div>
            <!-- Brands List End -->
        </div>
    </div>


</div>