@php
    $sexos = $stud->Horses()->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
@endphp

<section class="section-deals borde-top">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                    <div class="ot-heading row-20 mb30 text-center">
                        <h2>*Caballos por genero*</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($sexos as $k=>$v)

                    <?php
                        if(isset($v)){
                            $ts = $v['sex'];
                            $gd = $stud->Horses()->where(['sex'=>$ts])->get() ;
                            $g = count($gd) *1;
                        }
                        if(isset($v)){
                            $ts = $v['sex'];
                        }
                        $k = $k +1;


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
                    ?>
                    <div class="col-xs-12 col-sm-6">
                        <div class="item item-deal mh-300">
                            <div class="img">
                                @if($img !='')
                                    <img class="img-full" src="{!! $img  !!}"
                                         alt="{!! trans('horse.sexs.'.$ts)." ".$stud->getName() !!}">
                                @endif
                            </div>
                            <div class="info">
                                <p class="title bold f26 font-monserat upper mb20">{!! trans('horse.sexs.'.$ts) !!}</p>
                                <a rel="nofollow" class="awe-btn awe-btn-12 btn-medium font-hind bold f12"
                                   href="{!! route('MyHorses',['slug'=>$user->getMySlug(),'type'=>$k,'v'=>0]) !!}">{!! trans('portal.seemore') !!}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
