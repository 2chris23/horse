@php

    if(isset($v)){
            $ts = $v['sex'];
            $gd = $stud->Horses()->where(['sex'=>$ts])->get() ;
            $g = count($gd) *1;
        }


    if($g ==1){
        $rnd = $v['total'];
        $ws = $stud->Horses()->where(['sex'=>$ts])->first();
    }elseif($g!=0){
        $gs = $gd;
        $gs = $stud->Horses()->where(['sex'=>$ts])->get();
        $ws = $gs[rand(0,count($gs)-1)];
    }

    $p = $ws->getPhotoFirstModel();
        if(!empty($p)){
            $img = $p->getUrl();
            //$img = $p->Base64(290);
        }else{
            $img ='';
        }
$z = $i+1;
$d = $z%2;
$txt[1]= 'Las mejores líneas, contrastadas y probadas para el deporte sin perder la belleza.' ;
$txt[2]= 'Nuestros caballos castrados son los mejores, descendientes de lineas puras, listos para una vida tranquila.';
$txt[3]= 'Nuestras yeguas han sido seleccionadas por su belleza y funcionalidad. Calificadas.';
$txt[4]= 'Nuestros potros son descendientes de caballos de deporte, que han competido y demostrado su valía.';
$txt[5]= 'Nuestros potros son descendientes de caballos de deporte, que han competido y demostrado su valía.';


@endphp

<div class="clearfix"></div>
@if($d == 0)

    <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="work_item">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 ont">
                    <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}/#{!! trans('horse.sex.'.$ts) !!}">
                        <div class="work_item_img sm-text-center sm-m-top-40 img-shadow">
                            <figure class="">
                                {{--{!! trans('horse.sexs.'.$v['sex']) !!}--}}
                                @if($img !='')
                                    <img class="img-responsive hidden lazy" lsrc="{!! $img  !!}"
                                         alt="{!! trans('horse.sexs.'.$ts)." ".$stud->getName() !!}"
                                            {{--style="max-width: 291px;max-height: 368px"--}}/>
                                @endif
                            </figure>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 text-left pull-left sm-text-center">
                    <div class="work_item_details m-top-80 sm-m-top-20">
                        <h4>
                            <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}/#{!! trans('horse.sex.'.$ts) !!}" class="no-color">
                            {!! trans('horse.sexs.'.$ts) !!}
                            </a>
                        </h4>
                        <div class="work_separator2"></div>
                        <p class="m-top-40 sm-m-top-10">
                            {!! trans('tema1.raza.'.$ts) !!}
                            <br>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- End off work-item -->
@else



    <div class="col-md-7 col-md-offset-5 col-sm-12 col-xs-12">
        <div class="work_item">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 text-right pull-right sm-text-center ont">
                    <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}/#{!! trans('horse.sex.'.$ts) !!}">
                    <div class="work_item_img sm-m-top-40 img-shadow">
                        <figure {{--style="width: 291px;height: 368px"--}} class="">
                            @if($img !='')
                                <img class="img-responsive hidden  lazy" lsrc="{!! $img  !!}"
                                     alt="{!! trans('horse.sexs.'.$ts)." ".$stud->getName() !!}"
                                        {{--style="max-width: 291px;max-height: 368px"--}}/>
                            @endif
                        </figure>
                    </div>
                    </a>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 text-right pull-left sm-text-center">
                    <div class="work_item_details m-top-80 sm-m-top-20">
                        <h4>
                            <a href="{!! route('MyHorsesV1',['slug'=>$user->getMySlug()]) !!}/#{!! trans('horse.sex.'.$ts) !!}" class="no-color">
                            {!! trans('horse.sexs.'.$ts) !!}
                            </a>
                        </h4>
                        <div class="work_separator1"></div>

                        <p class="m-top-40 sm-m-top-10">
                            {{-- bla --}}
                            {!! trans('tema1.raza.'.$ts) !!}
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End off work-item -->
@endif
