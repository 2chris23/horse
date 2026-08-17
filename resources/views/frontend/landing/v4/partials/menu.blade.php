@php($sexos = $stud->Horses()->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray())

<div class="header_content" id="header_content">

    <div class="container">
        <!-- HEADER LOGO -->
        <div class="header_logo">
            <a rel="nofollow" href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}"><img
                        src="{!! $stud->getLogo() !!}" alt=""></a>
        </div>
        <!-- END / HEADER LOGO -->
        <!-- HEADER MENU -->
        <nav class="header_menu">
            <ul class="menu">
                <li class="current-menu-item">
                    <a rel="nofollow"
                       href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.home') !!}</a>
                </li>
                <li>
                    <a rel="nofollow"
                       href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>
                </li>
                <li>
                    <span class="mcab">{!! trans('stud.horses') !!} <span class="fa fa-caret-down"></span></span>
                    <ul class="sub-menu">
                        @foreach($sexos as $k=>$v)
                            @php
                                $ts = $v['sex'];
                            @endphp
                            @if($v['total']!=0)
                                <li>
                                    <a rel="nofollow" href="{!! route('MyHorses',
                                    ['slug'=>$user->getMySlug(),'type'=>$v['sex'],'v'=>0]) !!}">
                                        {!! trans('horse.sexs.'.$ts) !!}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a rel="nofollow"
                       href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                </li>
                <li>
                    <a rel="nofollow"
                       href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                </li>
                <li>
                    <a rel="nofollow"
                       href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                </li>
                <li data-target="#modalcontact" data-toggle="modal">
                    <a rel="nofollow" href="#">{!! trans('stud.contact') !!}</a>
                </li>
            </ul>
        </nav>
        <!-- END / HEADER MENU -->
        <!-- MENU BAR -->
        <span class="menu-bars">
            <span></span>
        </span>
        <!-- END / MENU BAR -->
    </div>
</div>
