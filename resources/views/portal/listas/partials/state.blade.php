@php($state = (isset($state))?$state:null)
<!-- Estado -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingState">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseState" aria-expanded="false"
               aria-controls="collapseContry">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.tabstate') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseState" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingState">
        <div class="panel-body">
            <!-- Search -->
            <div class="search-widget">
                @php($place = (isset($place))?$place:trans('stud.placeholder.state'))
                <select class=" form-control select" data-style="btn-primary"
                        id="state"
                        name="state[]"
                        multiple="multiple"
                        disabled='true'
                        data-placeholder="{!! $place !!}">
                    {{--
                    <option data-tokens="0" value="0">
                        {!! trans('state.chooseme') !!}
                    </option>
                    --}}
                </select>

                {{--
              <select class="form-control" name="State[]" multiple="multiple" id="State">
                    @foreach(Publico::ArrayPais() as $k=>$v)

                        <option value="{!! $v['id'] !!}">{!! $v['name'] !!}</option>
                    @endforeach
                </select>
                --}}
                <div class="clearfix"></div>
            </div>
            <!-- Brands List -->
            <div class="skin-minimal">
                {{--
                                                            <select class="form-control" name="State[]" multiple="multiple" id="State">
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