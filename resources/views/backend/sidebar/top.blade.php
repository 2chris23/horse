@php
    if(!empty(\Auth::user())){
        $noti = \Auth::user()->getNotificationsNew();
        $g = false;
        }else{
        $noti = [];
        $g = true;
        }
    //dd($noti);

@endphp
@if($g != true)
    <div id="top" class=" @if(Agent::isDesktop() == true) fixed  @endif">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand float-left" href="#">
                    <h4>
                        <img src="{!! url(\Config::get('logos.logoh250')) !!}" class="admin_img" alt="logo"
                             style="width:170px !important;"></h4>

                    {{--<img src="{!! $logo !!}" class="admin_img" alt="logo"> Horse World Sales</h4>--}}
                </a>
                <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"> </i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right float-right">
                    {{--
                    <div class="btn-group hidden-md-up small_device_search" data-toggle="modal"
                         data-target="#search_modal">
                        <i class="fa fa-search text-primary">
                        </i>
                    </div>
                    --}}

                    {{--
                                    <div class="btn-group">
                                        @include('backend.sidebar.element.languaje')

                                    </div>
                                    --}}


                    <div class="btn-group">
                        <div class="notifications no-bg">
                            <a class="btn btn-default btn-sm messages" data-toggle="dropdown" id="messages_section"
                               data-toggle="popover" data-trigger="hover" data-placement="bottom"
                               title="{!! trans('popover.sms.titulo') !!}"
                               data-content="{!! trans('popover.sms.contenido') !!}"
                            > <i
                                        class="fa fa-envelope-o fa-1x">
                                </i>
                                @if(count($noti)!=0)
                                    <span class="badge badge-pill badge-warning notifications_badge_top">{!! count($noti) !!}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
                                <div class="popover-title">
                                    @if(count($noti)!=0)
                                        {!! trans('notification.newsms',['num'=>count($noti)]) !!}
                                    @else
                                        {!! trans('notification.nosms') !!}
                                    @endif


                                </div>
                                <div id="messages">
                                    @foreach($noti as $k=>$v)
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="{!!url('assets/img/mailbox_imgs/5.jpg')!!}"
                                                         class="message-img avatar rounded-circle"
                                                         alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <a href="{!! url('#') !!}">
                                                        <strong>{!! trans('notification.'.$v->getAsunto()) !!}</strong>
                                                        {!! $v->getCorreo() !!}
                                                        <br>
                                                        <small>{!! Funciones::AjustarFechaDmy($v->created_at) !!}</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{--
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/5.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>hally</strong>
                                                sent you an image.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/8.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>Meri</strong>
                                                invitation for party.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/7.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>Remo</strong>
                                                meeting details .
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/6.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>David</strong>
                                                upcoming events list.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/5.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>hally</strong>
                                                sent you an image.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/8.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>Meri</strong>
                                                invitation for party.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/7.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>Remo</strong>
                                                meeting details .
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/6.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <strong>David</strong>
                                                upcoming events list.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                </div>
                                <div class="popover-footer">
                                    <a href="{!! route('notifi.index') !!}" class="text-white">
                                        {!! trans('notification.inbox') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="notifications messages no-bg"
                             data-toggle="popover" data-trigger="hover" data-placement="bottom"
                             title="{!! trans('popover.support.titulo') !!}"
                             data-content="{!! trans('popover.support.contenido') !!}"
                        >

                            <a class="btn btn-default btn-sm"
                               href="{!! route('support.index') !!}">
                                {{--href="#!" >--}}
                                <i
                                        class="fa fa-wrench">
                                </i>
                                {{--<span class="badge badge-pill badge-danger notifications_badge_top">9</span>--}}
                            </a>
                            {{--
                            <div class="dropdown-menu drop_box_align" role="menu" id="notifications_dropdown">
                                <div class="popover-title">You have 9 Notifications</div>
                                <div id="notifications">
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/1.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/2.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/3.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/6.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/1.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/2.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/3.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/6.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="{!!url('assets/img/mailbox_imgs/1.jpg')!!}"
                                                     class="message-img avatar rounded-circle"
                                                     alt="avatar1">
                                            </div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o">
                                                </i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    -- }}
                                </div>
                                <div class="popover-footer">
                                    <a href="#" class="text-white">View All</a>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                    {{--
                    <div class="btn-group">
                        <div class="notifications messages no-bg">
                            <a class="btn btn-default btn-sm" data-toggle="dropdown" id="notifications_section" href="{!! route('soporte.index') !!}">
                                <i
                                        class="fa fa-wrench">
                                </i>
                                <span class="badge badge-pill badge-danger notifications_badge_top">9</span>
                            </a>

                        </div>
                    </div>
                    --}}

                    @if(\Auth::user()->isAdm())
                        <div class="btn-group">
                            <div class="notifications request_section no-bg">
                                <a class="btn btn-default btn-sm messages" id="request_btn"> <i
                                            class="fa fa-sliders" aria-hidden="true">
                                    </i>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                {{--}}<img src="{!! url('img/admin.jpg') !!}"--}}

                                <img @if((\Auth::user()->isAdm() == false))
                                     src="{!! $avatar !!}"
                                     @else
                                     src="{!! \Auth::user()->getUrlAdminLogo() !!}"
                                     @endif

                                     class="img-thumbnail rounded-circle admin_img2 avatar-img"
                                     alt="avatar">
                                <strong>{{(!empty(\Auth::user()))?\Auth::user()->getNombre():null}}</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item title" href="#">
                                    HWS Admin
                                </a>
                                <a class="dropdown-item" href="{!! route('user.profile') !!}">
                                    <i class="fa fa-user">
                                    </i>
                                    {!! trans('users.myaccount') !!}
                                </a>
                                <a class="dropdown-item" href="{!! route('notifi.index') !!}">
                                    <i class="fa fa-envelope-o fa-1x"></i>
                                    {!! trans('notification.inbox') !!}

                                </a>
                                <a class="dropdown-item"
                                   href="{!! route('support.index') !!}">
                                    <i
                                            class="fa fa-wrench">
                                    </i>
                                    {!! trans('notification.support') !!}
                                </a>
                                @if(\Auth::user()->isAdm()==true)

                                    <a href="{!! route('OpcionesAdmin') !!}" class="dropdown-item">
                                        <i class="fa fa-cogs"></i>
                                        {!! trans('users.options') !!}
                                    </a>
                                @else
                                    <a href="{!! route('options.index') !!}" class="dropdown-item">
                                        <i class="fa fa-cogs"></i>
                                        {!! trans('users.options') !!}
                                    </a>
                                @endif


                                {{--
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-envelope">
                                    </i>
                                    Inbox</a>
                                    --}}
                                {{--
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-lock">
                                    </i>
                                    Lock Screen</a>
                                --}}
                                <a class="dropdown-item" href="#!"
                                   {{--{{ route('logout') }}--}}
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out">
                                    </i>
                                    {!! trans('users.exit') !!}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                @if(\Auth::user()->isAdm()== false)
                    @include('backend.sidebar.element.suscrip')
                @endif

                {{--
                <div class="top_search_box float-right hidden-sm-down">
                    <form class="header_input_search float-right">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit">
                            <span class="font-icon-search"> </span>
                        </button>
                        <div class="overlay">
                        </div>
                    </form>
                </div>
                --}}


            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
@endif
