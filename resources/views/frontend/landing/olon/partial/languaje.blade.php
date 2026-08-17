<ul>
    <li><a href="#!"><span class=" flag flag-{!! \Session::get('applocale') !!}"></span><i class="fa fa-angle-down"></i></a>
        <ul>
            {{--
            <li><a href="">English(USA)</a></li>
            <li><a href="">Bangla</a></li>
            --}}
            @php($ln = \Config::get('lenguaje'))
            @foreach($ln as $k=>$v)
                <li class="" onclick="changelan('{!! $k !!}')">
                    <a rel="nofollow" href="#">
                        <span class="flag flag-{!! $k !!} inline"></span>
                        {!! $v !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    {{--
    <div class="dropdown m-t-30 p-r-20">
        <button class="btn btn-primary dropdown-toggle bandera" type="button" data-toggle="dropdown">


            <span class="caret"></span></button>
        <ul class="dropdown-menu">

        </ul>
    </div>
    {{--<ul>

                            <li><a href="">My Account</a></li>
                            <li><a href="">$USD <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="">Pound</a></li>
                                    <li><a href="">BDT</a></li>
                                </ul>
                            </li>
                            <li><a href="">English(UK) <i class="fa fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="">English(USA)</a></li>
                                    <li><a href="">Bangla</a></li>
                                </ul>
                            </li>

                        </ul>--}}
</ul>