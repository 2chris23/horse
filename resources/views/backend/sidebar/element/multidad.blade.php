@php

    $name = (isset($name))?$name:'';
    $url = (isset($url))?$name:'#';
    $icon = (isset($icon))?$name:'<i class="fa fa-home"> </i>';
    $s=(Request::is(str_replace(url('/').'/','',$url)))?'class="active"':null; /*Se compara string*/
    $buttons = (isset($buttons))?$buttons:[];
    foreach ($buttons as $b){
            if(!empty($b)){
            $s=((Request::is(str_replace(url('/').'/','',$b['url']))) == true)?'class="active"':null; /*Se compara string*/
            }
    }

@endphp
<li class="dropdown_menu {!! $s !!}">
    <a href="javascript:;">
        <i class="fa fa-anchor"> </i>
        <span class="link-title menu_hide">&nbsp; {{$name}}</span>
        <span class="fa arrow menu_hide"> </span>
    </a>
    <ul>
        @foreach($buttons as $b)
            @include('backend.sidebar.element.single',$b)
        @endforeach

    </ul>
</li>
