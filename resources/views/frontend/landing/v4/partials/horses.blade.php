<section class="ot-accomd-modations mb70">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                    <div class="ot-heading pt80 pb30 text-center row-20">
                        <h2 class="mb15">{!! trans('stud.ouranimal') !!}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="ot-accomd-modations-content owl-single" {{--data-single_item="false" data-desktop="1"
                         data-small_desktop="1" data-tablet="2" data-mobile="1" data-nav="false"
                         data-pagination="false"--}}>
                        <div class="row">
                            @if(count($horsesfav)!=0)
                                @foreach($horsesfav as $k=>$v)

                                    @php
                                        $f = $v->getPhotoFirstModel();
                                        $foto = '';
                                            if(!empty($f)){
                                                $foto = $f->getUrl();
                                            }
                                        $edad = $v->getAge();
                                        $mes = $v->getAgeMonth();
                                        $desc = $v->getDescripcion();

                                        $ndesc = substr(strip_tags($desc), 0, 100);
                                        if (strlen(strip_tags($desc)) > 100)
                                            $ndesc .= '...';
                                    @endphp
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 tam-tarj">
                                        <div class="item room-item-style-2 mb30 text-center">
                                            <div class="outer h-tarjeta">
                                                <a rel="nofollow" href="#">
                                                    <img class="img-responsive img-full" src="{!! $foto !!}" alt="">
                                                </a>
                                                <div class="bgr pt20 pb20">
                                                    <div class="details">
                                                        <h2 class="title upper">
                                                            <a rel="nofollow"
                                                               href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">{!! $v->getName() !!}</a>
                                                        </h2>
                                                        <p class="price upper font-monserat bold mb0 c-main">
                                                            ({!! trans('horse.raza.'.$v->raza) !!}, @if($edad!=0)
                                                                {!! trans('horse.years',['ano'=>$edad]) !!})
                                                            @else
                                                                {!! trans('horse.mes',['mes'=>$mes]) !!})
                                                            @endif
                                                        </p>
                                                        <div class="info">
                                                            <p class="mt20 mb40">{!! $ndesc !!}</p>
                                                            <a rel="nofollow"
                                                               class="awe-btn awe-btn-12 btn-medium font-hind bold f12"
                                                               href="{!! route('MyHorseDetailed', ['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">{!! trans('portal.seemore') !!}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @php
                                $f = Horses::CaballosAzar($stud->id,6,null,true)->get();
                            @endphp
                            @if(count($f)!=0)
                                @foreach($f as $k=>$v)
                                    @php
                                        $f = $v->getPhotoFirstModel();
                                        $foto = '';
                                            if(!empty($f)){
                                                $foto = $f->getUrl();
                                            }
                                        $edad = $v->getAge();
                                        $mes = $v->getAgeMonth();
                                        $desc = $v->getDescripcion();

                                        $ndesc = substr(strip_tags($desc), 0, 100);
                                        if (strlen(strip_tags($desc)) > 100)
                                            $ndesc .= '...';
                                    @endphp
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 tam-tarj">
                                        <div class="item room-item-style-2 mb30 text-center">
                                            <div class="outer h-tarjeta">
                                                <a rel="nofollow" href="#">
                                                    <img class="img-responsive img-full" src="{!! $foto !!}" alt="">
                                                </a>
                                                <div class="bgr pt20 pb20">
                                                    <div class="details">
                                                        <h2 class="title upper">
                                                            <a rel="nofollow"
                                                               href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">
                                                                {!! $v->getName() !!}
                                                            </a>
                                                        </h2>
                                                        <p class="price upper font-monserat bold mb0 c-main">
                                                            ({!! trans('horse.raza.'.$v->raza) !!}, @if($edad!=0)
                                                                {!! trans('horse.years',['ano'=>$edad]) !!})
                                                            @else
                                                                {!! trans('horse.mes',['mes'=>$mes]) !!})
                                                            @endif
                                                        </p>
                                                        <div class="info">
                                                            <p class="mt20 mb40">{!! $ndesc !!}</p>
                                                            <a rel="nofollow"
                                                               class="awe-btn awe-btn-12 btn-medium font-hind bold f12"
                                                               href="{!! route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]) !!}">{!! trans('portal.seemore') !!}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>