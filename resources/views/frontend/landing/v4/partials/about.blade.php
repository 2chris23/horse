<section class="section-home-about style-2 bg-white borde-top">
    <div class="container">
        <div class="home-about">
            <div class="row v-align">
                <div class="col-xs-12 col-sm-6">
                    <div class="img-hover-box">
                        <div class="img baraja-main">
                            <div class="baraja-demo">
                                <ul id="baraja-el" class="baraja-container">
                                    @php($fotos = $stud->getInstalationsGallery())
                                    @if(count($fotos)!=0)
                                        @foreach($fotos  as $k=>$v)
                                            <li>
                                                <img src="{!!$v['url'] !!}" alt="{!! $stud->getName() !!}"
                                                     class="img-thumbnail"/>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <nav class="actions text-center">
                                <span id="nav-prev">&lt;</span>
                                <span id="nav-next">&gt;</span>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="ot-heading row-20 text-center">
                        <h2 class="mb30 margt">{!! trans('tema3.aboutus', ['name'=>$stud->getName()]) !!}</h2>
                    </div>
                    <div class="text-center">
                        <p class="f14">
                            {{--{!! $stud->getDescription() !!}--}}
                            @php($ds = $stud->getDescription() )
                            @if(strlen($ds >201))
                                @php($ds1 = substr($ds,0,200));
                                {!! $ds1 !!}...

                            @else
                                {!! $ds !!}
                            @endif
                        </p>
                        <a rel="nofollow"
                           href="{!! route('MyInstalation',['slug'=>$user->getMySlug()]) !!}"
                           class="awe-btn awe-btn-default btn-medium font-hind bold f12 mt30">{!! trans('portal.readmore') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
