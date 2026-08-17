@php($Coins = \Session::get('moneda'))
<li class="pd0s">
    <a href="#!" class="onhover pull-right">

        <span> {!! $Coins !!}</span>
        <span class="caret"> </span>


    </a>
    <ul class="submenu" {{--style="background-color: white"--}}>
        @php($Monedas = \Session::get('monedas'))
        @foreach($Monedas as $k=>$v)
            <li>
                {{--<a href="{!! route('lengauje',['lang'=>$k]) !!}">{!! $v !!}</a>--}}
                <a href="{!! route('monedas',['mon'=>$v['small']]) !!}"
                   rel="nofollow">{!! $v['small'] !!}
                    ({!! $v['simbolo']!!})</a>
            </li>
        @endforeach
    </ul>
</li>
