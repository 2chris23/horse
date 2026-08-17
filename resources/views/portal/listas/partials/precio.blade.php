@php($pricemin = (isset($pricemin))?$pricemin:0)
@php($pricemax = (isset($pricemax))?$pricemax:0)

<!-- Pricing Panel -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingPrice">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapsePrice" aria-expanded="false"
               aria-controls="collapsePrice">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.price') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapsePrice" class="panel-collapse collapse" role="tabpanel"
         aria-labelledby="headingPrice">
        <div class="panel-body">
            <span class="price-slider-value">
                {!! trans('portal.price') !!}
                {{--(<i class="fa fa-eur"></i>)--}}
                {{--(<i class="fa fa-eur"></i>)--}}
            </span>
            <span id="price-min" onChange="SetPrice()"></span> -
            <span id="price-max" onChange="SetPriceh()"></span>
            <div id="price-slider" ></div>
            <input type="hidden" id="pricemin" name="pricemin" value="{!! $pricemin !!}">
            <input type="hidden" id="pricemax" name="pricemax" value="{!! $pricemax !!}">
        </div>
    </div>
</div>

<!-- Pricing Panel End -->
