@php($actual =Request::url())
@php($sexos = Publico::Arraysexs())

<nav class="navbar navbar-default navbar-fixed white no-background bootsnav text-uppercase">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}" class="logo">
                <img lsrc="{!! url($stud->getLogo()) !!}" class="logo logo-display collapse hidden lazy"
                     alt="{!! $stud->getName() !!}">
                <img lsrc="{!! url($stud->getLogo()) !!}" class="logo logo-scrolled hidden"
                     alt="{!! $stud->getName() !!}">

            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                @include('frontend.landing.v1.partials.lenguaje')
                @php($s=(Funciones::BuscarEnString($actual,$user->getMySlug())==true
                and Funciones::BuscarEnString($actual,'Instalaciones')!=true)
                and Funciones::BuscarEnString($actual,'Horse')!=true
                and Funciones::BuscarEnString($actual,'Ventas')!=true
                and Funciones::BuscarEnString($actual,'Galeria')!=true
                and Funciones::BuscarEnString($actual,'Contacto')!=true
                ?'active':null)
                <li class="{!! $s !!}">
                    <a href="{!! route('MyPage',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.home') !!}</a>
                </li>
                @php($s=(Funciones::BuscarEnString($actual,'Instalaciones')==true)?'active':null)
                <li class="{!! $s !!}">
                    <a href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.instalations') !!}</a>
                </li>

                @php($s=(Funciones::BuscarEnString($actual,'Caballo')==true)?'active':null)
                <li class="{!! $s !!}">
                    <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.horses') !!}</a>
                </li>

                {{--
                @php($g = $stud->getFirstHorse())
                @if(!empty($g))

                    <li class="{!! $s !!}">
                        <span>{!! trans('stud.horses') !!}</span>
                        <ul class="submenu">
                            @foreach($sexos as $k=>$v)
                                @php
                                    $h = $stud->getFirstHorseBySex($k);
                                @endphp
                                @if($k!=0)
                                    @if(!empty($h))
                                        <li>
                                            <a href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! $v !!}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
                --}}
                @php($s=(Funciones::BuscarEnString($actual,'Ventas')==true)?'active':null)
                <li class="{!! $s !!}">
                    {{--<a href="{!! route('MySell',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>--}}
                    <a href="{!! route('MySell',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.sell') !!}</a>
                </li>
                @php($s=(Funciones::BuscarEnString($actual,'Galeria')==true)?'active':null)
                <li class="{!! $s !!}">
                    {{--<a href="{!! route('MyGallery',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>--}}
                    <a href="{!! route('MyGallery',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.photos') !!}</a>
                </li>
                @php($s=(Funciones::BuscarEnString($actual,'Video')==true)?'active':null)
                <li class="{!! $s !!}">
                    {{--}}<a href="{!! route('MyVideo',['id'=>$user->id,'slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>--}}
                    <a href="{!! route('MyVideo',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.video') !!}</a>
                </li>
                @php($s=(Funciones::BuscarEnString($actual,'Contacto')==true)?'active':null)
                <li class="{!! $s !!}">
                    {{----<a href="{!! route('MyContact',['slug'=>$user->getMySlug(),'id'=>$user->id]) !!}">{!! trans('stud.contact') !!}</a>--}}
                    <a href="{!! route('MyContact',['slug'=>$user->getMySlug()]) !!}">{!! trans('stud.contact') !!}</a>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div>


</nav>
