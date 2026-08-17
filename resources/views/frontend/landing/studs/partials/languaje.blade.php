<li class="pd0s">
    <a href="#!" class="onhover pull-right">
        <div class="col-xs-1 ">
            <span class=" flag flag-{!! \Session::get('applocale') !!}"></span>
        </div>
        <div class="col-xs-1 row" style=" padding-top: 4px; margin-left: -9px; ">
            <span class="caret"> </span>
        </div>


    </a>
    <ul class="submenu" {{--style="background-color: white"--}}>
        @php($ln = \Config::get('lenguaje'))
        @foreach($ln as $k=>$v)

            <li class="" onclick="changelan('{!! $k !!}')">
                <a rel="nofollow" href="#">
                    <span class="flag flag-{!! $k !!}" style="    display: inline-block!important;"></span> {!! $v !!}
                </a>
            </li>
        @endforeach
    </ul>
</li>

<script>
    function changelan(id) {
        var url = '{!! route('lengauje') !!}/' + id;
        console.log(url);
        window.location.replace(url);
    }
</script>
