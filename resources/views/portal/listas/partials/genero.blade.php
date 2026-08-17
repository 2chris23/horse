@php($sex = (isset($sex))?$sex:null)


<!-- Razas -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingSex">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseSex" aria-expanded="false"
               aria-controls="collapseSex">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.sex') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseSex" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingSex">
        <div class="panel-body">
            <!-- Search -->
        {{--
        <div class="search-widget">
            <input placeholder="search" type="text">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        --}}
        <!-- Brands List -->
            <div class="skin-minimal">
                <ul class="list">

                    @foreach(Publico::Arraysex() as $k=>$v)

                        @if($k !=0)

                            <li>
                                <input type="checkbox"
                                       id="sex-{!! $k!!}"
                                       name="sex[{!! $k!!}]"
                                       @if(!empty($sex))
                                           @if(is_array($sex))
                                               @if(array_key_exists($k,$sex))
                                                checked
                                                @endif
                                            @endif
                                        @endif
                                >
                                <label for="minimal-checkbox-{!! $k !!}">
                                    {!! $v !!}

                                </label>
                            </li>

                        @endif

                    @endforeach

                </ul>
            </div>
            <!-- Brands List End -->
        </div>
    </div>

</div>
