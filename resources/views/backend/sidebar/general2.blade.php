@php
    $user =\Auth::user();


@endphp
<div id="left">
    <div class="menu_scroll">
        <div class="left_media">
            <div class="media user-media">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"> </span>
                </div>
                <div class="user-wrapper">
                    <a class="user-link" href="#">
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                             alt="User Picture"
                             src="img/admin.jpg">
                        <p class="user-info menu_hide">{{ $user->getAllName() }}</p>
                    </a>
                </div>
            </div>
            <hr/>
        </div>
        <ul id="menu">
            {{--
            @include('backend.sidebar.element.single',[
            'name' => 'Dashboard 1',
            'url' => '#',
            'icon' => '<i class="fa fa-home"> </i>',
            ])
--}}
            @php
                $d = [];
                    $d['name'] = trans('stud.menu.caption');
                        $b1 = [
                        'name' => trans('stud.menu.index'),
                        'url' => route('stud.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];

                        $b2 = [
                        'name' => trans('stud.menu.create'),
                        'url' => route('stud.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('stud.menu.edit'),
                        'url' => route('stud.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)

            @php
                $d = [];
                    $d['name'] = trans('horse.menu.caption');
                        $b1 = [
                        'name' => trans('horse.menu.index'),
                        'url' => route('horse.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('horse.menu.create'),
                        'url' => route('horse.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('horse.menu.edit'),
                        'url' => route('horse.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)
            @php
                $d = [];
                    $d['name'] = trans('photo.menu.caption');
                        $b1 = [
                        'name' => trans('photo.menu.index'),
                        'url' => route('photo.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('photo.menu.create'),
                        'url' => route('photo.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('photo.menu.edit'),
                        'url' => route('photo.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)

            @php
                $d = [];
                    $d['name'] = trans('video.menu.caption');
                        $b1 = [
                        'name' => trans('video.menu.index'),
                        'url' => route('video.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('video.menu.create'),
                        'url' => route('video.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('video.menu.edit'),
                        'url' => route('video.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)
            @php
                $d = [];
                    $d['name'] = trans('country.menu.caption');
                        $b1 = [
                        'name' => trans('country.menu.index'),
                        'url' => route('country.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('country.menu.create'),
                        'url' => route('country.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('country.menu.edit'),
                        'url' => route('country.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)

            @php
                $d = [];
                    $d['name'] = trans('state.menu.caption');
                        $b1 = [
                        'name' => trans('state.menu.index'),
                        'url' => route('state.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('state.menu.create'),
                        'url' => route('state.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('state.menu.edit'),
                        'url' => route('state.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)

            @php
                $d = [];
                    $d['name'] = trans('city.menu.caption');
                        $b1 = [
                        'name' => trans('city.menu.index'),
                        'url' => route('city.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('city.menu.create'),
                        'url' => route('city.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('city.menu.edit'),
                        'url' => route('city.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)


            @php
                $d = [];
                    $d['name'] = trans('users.menu.caption');
                        $b1 = [
                        'name' => trans('users.menu.index'),
                        'url' => route('users.index'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
        
                        $b2 = [
                        'name' => trans('users.menu.create'),
                        'url' => route('users.create'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $b3 = [
                        'name' => trans('users.menu.edit'),
                        'url' => route('users.edit'),
                        'icon' => '<i class="fa fa-home"> </i>',
                        ];
                        $d['buttons']=[
                        0=>$b1,
                        1=>$b2,
                        2=>$b3,
                        ]
            @endphp
            @include('backend.sidebar.element.multidad',$d)

            {{--
            @include('backend.sidebar.element.single',[
            'name' => 'Dashboard 2',
            'url' => '#',
            'icon' => '<i class="fa fa-tachometer"></i>',
            ])
            --}}

        </ul>
        <!-- /#menu -->
    </div>
</div>
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}

    