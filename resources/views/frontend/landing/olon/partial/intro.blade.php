@php($title  = isset($title)?$title:null)
@php($stitle  = isset($stitle)?$stitle:null)
@php($fondo =isset($fondo)?$fondo:null)
<!-- Intro Header -->
<header class="intro"
        @if(!empty($fondo)) style="background-image: radial-gradient(circle at 50% 50%,rgba(0,0,0,0.46),rgba(0,0,0,0.88)),url({!! $fondo !!});" @endif >
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">
                        {!! $title !!}
                    </h1>
                    @if(!empty($stitle))
                        <p class="intro-text">
                            {!! $stitle !!}
                        </p>
                    @endif
                    <a href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>