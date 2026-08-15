@php($raisedmin = (isset($raisedmin))?$raisedmin:0)
@php($raisedmax = (isset($raisedmax))?$raisedmax:0)
<!--alzada-->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingRaised">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseRaised" aria-expanded="false"
               aria-controls="collapseRaised">
                <i class="more-less glyphicon glyphicon-plus"></i>
                {!! trans('portal.raised') !!}
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseRaised" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingRaised">
        <div class="panel-body">
            <span class="price-slider-value">
                {!! trans('portal.raised') !!} (cm)</span>
            <span id="price-min-h" onclick="SetRaised()"></span> -
            <span id="price-max-h" onclick="SetRaisedh()"></span>
            <div id="price-slider-h"></div>
            <input type="hidden" id="raisedmin" name="raisedmin" value="{!! $raisedmin !!}">
            <input type="hidden" id="raisedmax" name="raisedmax" value="{!! $raisedmax !!}">
        </div>
    </div>
</div>




                            