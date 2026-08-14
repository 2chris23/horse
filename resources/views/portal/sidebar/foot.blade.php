@php($robot= Agent::isRobot())
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
{{--<script src="{!! url('portal_/js/jquery.min.js') !!}"></script>--}}
<!-- Bootstrap Core Css  -->
<script src="{!! url('portal_/js/bootstrap.min.js') !!}"></script>
<!-- Jquery Easing -->
<script src="{!! url('portal_/js/easing.min.js') !!}"></script>
<!-- Menu Hover  -->
<script src="{!! url('portal_/js/forest-megamenu.min.js') !!}"></script>
<!-- Jquery Appear Plugin -->
<script src="{!! url('portal_/js/jquery.appear.min.js') !!}"></script>
<!-- Numbers Animation   -->
<script src="{!! url('portal_/js/jquery.countTo.min.js') !!}"></script>
<!-- Jquery Smooth Scroll  -->
<script src="{!! url('portal_/js/jquery.smoothscroll.min.js') !!}"></script>
<!-- Jquery Select Options  -->
{{--<script src="{!! url('portal_/js/select2.min.js') !!}"></script>--}}
<!-- noUiSlider -->
<script src="{!! url('portal_/js/nouislider.all.min.js') !!}"></script>
<!-- Carousel Slider  -->
<script src="{!! url('portal_/js/carousel.min.js') !!}"></script>
<script src="{!! url('portal_/js/slide.min.js') !!}"></script>
<!-- Image Loaded  -->
<script src="{!! url('portal_/js/imagesloaded.min.js') !!}"></script>
<script src="{!! url('portal_/js/isotope.min.js') !!}"></script>
<!-- CheckBoxes  -->
<script src="{!! url('portal_/js/icheck.min.js') !!}"></script>
<!-- Jquery Migration  -->
<script src="{!! url('portal_/js/jquery-migrate.min.js') !!}"></script>
<!-- Sticky Bar  -->
<script src="{!! url('portal_/js/theia-sticky-sidebar.min.js') !!}"></script>
<!-- Style Switcher -->
<script src="{!! url('portal_/js/color-switcher.js') !!}"></script>
<!-- Template Core JS -->
<script src="{!! url('portal_/js/custom.min.js') !!}"></script>
{{--<script src="{!! url('assets/vendors/jqueryui/jquery-ui.min.js') !!}"></script>--}}
<script src="{!!route('JsPortal') !!}"></script>
@if($robot != true)
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.animate.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.buttons.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.confirm.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.nonblock.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.mobile.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.desktop.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.history.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.callbacks.js"></script>
@endif
<script type="text/javascript" src="{!!url('assets/js/localidad.min.js')!!}"></script>
<script src="{!! url('assets/tooltip/js/tooltipster.bundle.min.js') !!}"></script>

@if($robot != true)
    @include('backend.common.pnotify')
@endif
@include('vendor.flash.pop')
@include('attribmoneda')
