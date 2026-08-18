<li>
    <div class="dropdown m-t-30 p-r-20">
        <button class="btn btn-primary dropdown-toggle bandera" type="button" data-toggle="dropdown">
            <span class=" flag flag-{!! \Session::get('applocale') !!}"></span>

            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            @php($ln = \Config::get('lenguaje'))
            @foreach($ln as $k=>$v)
                <li class="" onclick="changelan('{!! $k !!}')">
                    <a rel="nofollow" href="#">
                        <span class="flag flag-{!! $k !!} inline"></span> {!! $v !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>