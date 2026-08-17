<style>
    .flag:after {
        display: none;
    }

    .language a {
        line-height: 40px;
        display: inline;
    }

    .language ul {
        width: auto;
        min-width: 150px;
    }

</style>
<div class="dropdown language">
    {{--
    <a href="#!" class="onhover pull-right">
        <div class="col-xs-1 ">
            <span class=" flag flag-{!! \Session::get('applocale') !!}"></span>
        </div>
        <div class="col-xs-1 row" style=" padding-top: 4px; margin-left: -9px; ">
            <span class="caret"> </span>
        </div>


    </a>
    --}}

    <span>{!! strtoupper(\Session::get('applocale')) !!}</span>

    <ul style="  width: auto;
        min-width: 150px;">


        @php($ln = \Config::get('lenguaje'))
        @foreach($ln as $k=>$v)
            <li class="" onclick="changelan('{!! $k !!}')">
                <a rel="nofollow" href="#">
                    <span class="flag flag-{!! $k !!}"></span>
                    {!! $v !!}
                </a>
            </li>
        @endforeach
    </ul>
</div>
<script>
    function changelan(id) {
        var url = '{!! route('lengauje') !!}/' + id;
        console.log(url);
        window.location.replace(url);
    }
</script>
