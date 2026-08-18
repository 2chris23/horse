<div class="main_menu_bg">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a rel="nofollow" class="navbar-brand our_logo" href="#"><img class="img-responsive"
                                                                                      src="{!! $stud->getLogo() !!}"
                                                                                      alt=""/></a> <!-- revisar logo de yeguada {!! $stud->getLogo() !!} -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            @include('frontend.landing.v5.partials.lenguaje')
                            <li><a rel="nofollow" href="#slider">{!! trans('stud.home') !!}</a></li>
                            <li><a rel="nofollow" href="#abouts">{!! trans('stud.Tittle') !!}</a></li>
                            <!--li><a rel="nofollow" href="#features">Features</a></li-->
                            <li><a rel="nofollow" href="#ourPakeg">{!! trans('tema2.menu.horse') !!}</a></li>
                            <li><a rel="nofollow" href="#portfolio">{!! trans('tema2.menu.foto') !!}</a></li>
                            <li><a rel="nofollow" href="#videos">{!! trans('tema2.menu.video') !!}</a></li>
                            <li><a rel="nofollow" href="#contact">{!! trans('stud.contact') !!}</a></li>
                            <!--li><a rel="nofollow" href="#" class="booking">Table Booking</a></li-->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>