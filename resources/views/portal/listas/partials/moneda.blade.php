@php($monedas= Funciones::Monedas())

@php($moneda = \Session::get('moneda'))
@php($moneda = !empty($moneda)?$moneda:'EUR')
<!-- capa -->
<div class="panel panel-default">
    <!-- Heading -->
    <div class="panel-heading" role="tab" id="headingmoneda">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapseColor" aria-expanded="false"
               aria-controls="collapseContry">
                <i class="more-less glyphicon glyphicon-plus"></i>
                Monedas
            </a>
        </h4>
    </div>
    <!-- Content -->
    <div id="collapseColor" class="panel-collapse collapse in" role="tabpanel"
         aria-labelledby="headingmoneda">
        <div class="panel-body">
            <!-- Search -->
            <div class="search-widget">
               @include('portal.partials.moneda')
                <div class="clearfix"></div>
            </div>
            <!-- Brands List -->
            <div class="skin-minimal">

            </div>
            <!-- Brands List End -->
        </div>
    </div>
</div>