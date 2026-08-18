<?php 
    $venta = isset($venta)?$venta:0;
if($venta == 0){
    $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
    $horses = isset($horses)?$horses:Horses::Caballos($stud)->Azar()->get()->take(8);
    //$horsesex = \App\Model\Horse::where(['sex'=>$v['sex'],'studs_id'=>$stud->id])->get();
    $vaso = 0;;
}else{
    $sexos = Horse::EnVenta($stud)->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
    $horses = Horses::EnVenta($stud)->Azar()->get();
    $vaso = 1;
}
 ?>


<section class="module">
    <div class="container">
        <div class="row multi-columns-row post-columns">
            <?php ($sex = $horses); ?>
            <?php ($s = null); ?>
            <?php ($dsf = count($sex)); ?>
            <?php ($cp = 0); ?>

            <?php for($i = 0;$i < $dsf;$i++): ?>
                <?php

                $r = $i;
                $s = $sex[$i];

                $studar = [];
                $gen = [];
                $cubrio = [];

                $edad = $s->getAge();
                $nombre = $s->getName();
                $fat = $s->getPhotoFirstModel();

                $dom = ($s->getDoma() != 1) ? trans('horse.doma.0') : trans('horse.doma.' . $s->doma);
                $acub = ($s->tocubri == 1) ? true : false;
                $mes = $s->getAgeMonth();

                if ($edad != 0) {
                    $tedad = trans('horse.years', ['ano' => $edad]);
                } else {
                    $tedad = trans('horse.mes', ['mes' => $mes]);
                }

                if (!empty($s->getStud())) {
                    if ($s->getStud() != '') {
                        $studar = ['k' => trans('horse.text.stud'), 'v' => $s->getStud(),];
                    }
                }


                if (!empty($s->getGenealogia())) {
                    $gen = [
                        'k' => trans('horse.text.genealogia'),
                        'v' => trans('tema1.ficha'),
                        'u' => url($s->getGenealogia()),
                    ];
                }
                if ($acub == true) {
                    if ($s->getCubriPrice() != 0) {
                        $cubrio = [
                            'k' => trans('horse.text.cubricion'),
                            'v' => Funciones::AjustarNumeroMil($s->getCubriPrice()) . $s->getSimboloMoneda(),
                            's' => "<span class=\"tooltip mone no-color\" data-slugc = \"" . $s->slug . '" data-slugp="" ' .
                                " data-getcubri=\"" . $s->slug . "\" data-urlcubri=\"" . route('MonedaCaballo') . "/" . $s->slug
                                . "\" >" .
                                Funciones::AjustarNumeroMil($s->getCubriPrice()) .
                                $s->getSimboloMoneda() . " </span>",
                        ];
                    } else {
                        $cubrio = [
                            'k' => trans('horse.text.cubricion'),
                            'v' => Funciones::AjustarNumeroMil($s->getCubriPrice()) . $s->getSimboloMoneda(),
                            's' => "<span> " . trans('users.pricecheck') . " </span>",
                        ];
                    }
                }
                $caracteristicas = [
                    0 => [
                        'k' => trans('portal.raza'),
                        'v' => trans('horse.raza.' . $s->raza),
                    ],
                    1 => [
                        'k' => trans('portal.age'),
                        'v' => $tedad,
                    ],
                    2 => [
                        'k' => trans('stud.text.raised'),
                        'v' => $s->getRaisedFormat(),
                    ],
                    3 => [
                        'k' => trans('portal.doma'),
                        'v' => $dom,
                    ],


                    /*

                    3 => [
                        'k' => trans('portal.sex'),
                        'v' => trans('horse.sex.' . $s->sex),
                    ],
                    4 => [
                        'k' => trans('horse.attrib.color'),
                        'v' => trans('horse.color.' . $s->color),
                    ],
                      7 => $gen,
                    5 => $studar,
                    ],
                      8 => $cubrio,
                    6=>[
                    'k'=> ,
                    'v'=> ,
                    ],
                    */
                ];

                $img = "";
                if (!empty($fat)) {
                    $img = $fat->getUrl();
                }
                $link = StudController::LimpiarStudFromUrl(route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $s->ObtenerSlug()]));
                $fbs = Funciones::CompartirFacebook($s->getName(), Request::fullUrl());
                $tws = Funciones::CompartirTwitter($s->getName(), Request::fullUrl());
                // $Gs = Funciones::CompartirGoogle(Request::fullUrl());
                $Ptr = Funciones::CompartirPinterest($s->getName(), Request::fullUrl());
                $print = route('VersionImpresa', ['ids' => $s->slug]);
                $precio = Funciones::AjustarNumeroMil($s->getPrice());
                $vendido = ($s->sold == 1) ? true : false;
                $venta = ($s->tosold == 1) ? true : false;
                $clase = "s-" . $s->sex;

                if ($venta == true and $vendido == false) {
                    $clase .= " sell ";
                } elseif ($venta == true and $vendido == true) {
                    $clase .= " sold ";
                }
                if ($acub == true) {
                    $clase .= " cubri ";
                }

                ?>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="post">
                        <a href="<?php echo $link; ?>">
                            <div class="post-thumbnail fondofull h300" style="background: url(<?php echo $img; ?>); ">
                                <?php if($vendido == 1): ?>
                                    <div class="sold sold-n"></div>
                                <?php endif; ?>
                                <img src="<?php echo $img; ?>"
                                     alt="<?php echo $s->getAltText(); ?>"/>

                            </div>
                        </a>
                        <div class="post-header font-alt">
                            <h2 class="post-title">
                                <a href="#">
                                    <?php echo $nombre; ?>

                                </a>
                            </h2>
                            <div class="post-meta">
                                
                                


                                <?php for($u = 0; $u < count($caracteristicas) ;$u++): ?>

                                    <?php
                                    $vfas = $caracteristicas[$u];
                                    if ($u == count($caracteristicas)) {
                                        break;
                                    }

                                    ?>

                                    <?php if(isset($vfas['v'])): ?>
                                        <?php echo $vfas['v']; ?>

                                        <?php if(isset($caracteristicas[$u+1])): ?>
                                            |
                                        <?php endif; ?>

                                    <?php endif; ?>




                                <?php endfor; ?>

                            </div>
                        </div>
                        
                        <div class="post-more">
                            <a class="more-link" href="<?php echo $link; ?>">
                                <?php echo trans('portal.seemore'); ?>

                            </a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

        </div>

    </div>
</section>