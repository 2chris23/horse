@php($doma = (isset($doma))?$doma:null)
<!-- Razas -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingDoma">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseDoma" aria-expanded="false"
               aria-controls="collapseDoma">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.doma') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseDoma" class="panel-collapse collapse" role="tabpanel"
         aria-labelledby="headingDoma">
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

                    @foreach(trans('horse.doma') as $k=>$v)
                        <li>
                            <input type="checkbox"
                                   id="doma-{!! $k!!}"
                                   name="doma[{!! $k!!}]"
                                   @if(!empty($doma))
                                   @if(is_array($doma))
                                   @if(array_key_exists($k,$doma))
                                   checked
                                    @endif
                                    @endif
                                    @endif
                            >
                            <label for="minimal-checkbox-{!! $k !!}">
                                {!! $v !!}

                            </label>
                        </li>
                    @endforeach
                    
                </ul>
            </div>
            <!-- Brands List End -->
        </div>
    </div>

</div>