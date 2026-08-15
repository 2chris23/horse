@php
    $actual =Request::url();

        $name = (isset($name))?$name:'';
        $url = (isset($url))?$url:'#';

        $icon = (isset($icon))?$icon:'<i class="fa fa-home"> </i>';
        $other = (isset($other))?$other:null;
        $disable = (isset($disable))?$disable:false;
        $di = null;
    if($disable == true){
    $di = 'inactive';
    }
        //$s=(Request::is(str_replace(url('/').'/','',$url)))?'class="active"':null; /*Se compara string*/
        $s=($actual === $url)?'class="active"':'class="'.$di.'"'; /*Se compara string*/



@endphp
@if($disable != true)
    <li {!! $s !!} {!! $other !!} >
        <a href="{!! $url  !!}">
            {!! $icon !!}
            <span class="link-title menu_hide {!! $di !!}">&nbsp;{{$name}}</span>
            {{--<span class="badge badge-pill badge-primary float-right calendar_badge menu_hide">7</span>--}}
        </a>
    </li>
@endif