@php($color = (isset($color))?$color:null)
<!-- capa -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingcolor">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseColor" aria-expanded="false"
               aria-controls="collapseContry">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.color') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseColor" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingcolor">
        <div class="panel-body">
            <!-- Search -->
            <div class="search-widget">
                {{--

                <input placeholder="search" type="text">
                <button type="submit"><i class="fa fa-search"></i></button>
                --}}
                <select class="form-control select coloress" name="color[]" multiple="multiple"
                        id="color"
                        data-placeholder="{!! trans('portal.placecolor') !!}" >
                    @foreach(Publico::ArrayColor() as $k=>$v)
                        @if($k != 0)
                            <option value="{!! $k !!}"
                                    @if(!empty($color))
                                    @if(is_array($color))
                                    @if(in_array($k,$color))
                                    selected
                                    @endif
                                    @endif
                                    @endif
                            >
                                {!! trans('horse.color.'.$k) !!}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div class="clearfix"></div>
            </div>
            <!-- Brands List -->
            <div class="skin-minimal">


            </div>
            <!-- Brands List End -->
        </div>
    </div>
</div>