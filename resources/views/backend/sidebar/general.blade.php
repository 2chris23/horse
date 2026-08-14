@php


        // $user =\Auth::user();
        // $nombre = (!empty($user))?$user->getAllName():null;


@endphp
{{--<div id="left">--}}
<div id="left" class="fixed" style="height: 2500px">
    <div class="menu_scroll">
        <div class="left_media">
            <div class="media user-media">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"> </span>
                </div>
                <div class="user-wrapper">
                    <!-- Cambiar a perfil-->
                    <a class="user-link" href="#">

                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                             alt="{{ $user->getAllName()  }}"
                             @if((\Auth::user()->isAdm() == false))
                             src="{!! $user->getLogo() !!}"
                             @else
                             src="{!! $user->getUrlAdminLogo() !!}"
                                @endif

                        >


                        <p class="user-info menu_hide">{{ $user->getAllName()  }}</p>
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
            7486646
--}}
            @php
                $s = Funciones::MenuSimple();
                /*Funciones es alias para Functions en Controllers*/
            @endphp
            <!-- element -->
            @foreach($s as $v)
                @include('backend.sidebar.element.single',$v)
            @endforeach
            <!-- end element -->

        </ul>
        <!-- /#menu -->
    </div>
</div>
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}
{{----------------------------------------------------------------------------------------------------------------------------------------------------}}

    