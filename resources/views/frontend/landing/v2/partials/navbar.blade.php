@php($trabajo =isset($trabajo)?$trabajo:false)
    @php
        if($trabajo == true){
        $url =route('MyPage',['stud'=>$stud->slug]);
        }else{
        $url = null;
        }
    @endphp
<header id="header" class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header lheader">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Your Logo -->
            <div id="logo">
                <a href="#hero" class="navbar-brand">
                    <img src="{!! $stud->getLogo() !!}" alt="{!! $stud->getName() !!}">
                </a>
            </div>
        </div>
        <!-- Start Navigation -->
        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
@include('frontend.landing.v2.partials.languaje')
                <li>
                    @if(!empty($url))
                    <a href="{!! $url  !!}#hero">
                        @else
                    <a href="#hero">
                        @endif
                    {!! trans('stud.home') !!}
                    </a>
                </li>
                <li>@if(!empty($url))
                        <a href="{!! $url  !!}#about">
                            @else
                    <a href="#about">
                    @endif
                        {!! trans('stud.Tittle') !!}
                    </a>
                </li>
                <li>@if(!empty($url))
                        <a href="{!! $url  !!}#gallery">
                            @else
                    <a href="#gallery">
                        @endif
                        {!! trans('tema2.menu.horse') !!}
                    </a>
                </li>
                <li>@if(!empty($url))
                        <a href="{!! $url  !!}#fotos">
                            @else
                    <a href="#fotos">
                        @endif
                        {!! trans('tema2.menu.foto') !!}
                    </a>
                </li>
                <li>@if(!empty($url))
                        <a href="{!! $url  !!}#videos">
                            @else
                    <a href="#videos">
                        @endif
                        {!! trans('tema2.menu.video') !!}
                    </a>
                </li>
                <li>@if(!empty($url))
                        <a href="{!! $url  !!}#contactarea">
                            @else
                    <a href="#contactarea">
                        @endif
                        {!! trans('stud.contact') !!}
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</header>
