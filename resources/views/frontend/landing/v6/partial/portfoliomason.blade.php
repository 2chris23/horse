<?php

$videoy = isset($videoy) ? $videoy : 0;
$fotoy = isset($fotoy) ? $fotoy : 0;
if ($videoy == 1) {
    /*Video de yeguada*/
} elseif ($fotoy == 1) {
    /*Foto de yeguada*/
} else {
    $venta = isset($venta) ? $venta : 0;
    if ($venta == 0) {
        $sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        $horses = Horses::Caballos($stud)->Azar()->get();
        //$horsesex = \App\Model\Horse::where(['sex'=>$v['sex'],'studs_id'=>$stud->id])->get();
        $vaso = 0;
    } else {
        $sexos = Horse::EnVenta($stud)->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
        $horses = Horses::EnVenta($stud)->Azar()->get();
        $vaso = 1;

    }
}



$animaciones[0] = 'fadeInUp';
$animaciones[1] = 'fadeInUp';
$tiempos[0] = '0.4';
$tiempos[1] = '0.6';
$tiempos[2] = '0.8';

$col = 4;
//$col = 3;
//$col = 2;

$tipo = 'works-hover-g'; //fondo gradiemte
$tipo = 'works-hover-w'; //fondo blanco
$tipo = 'works-hover-d'; //fondo negro
?>

<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter font-alt" id="filters">
                    <?php if($videoy == 0 and $fotoy == 0): ?>
                        <li><a class="current wow fadeInUp" href="#" data-filter="*">
                                <?php echo trans('portal.allra'); ?>

                            </a></li>
                        <?php $__currentLoopData = $sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($v['sex'] !=0 ): ?>
                                <?php ($ti = $tiempos[rand(0,count($tiempos)-1)]); ?>
                                <?php ($am = $animaciones[rand(0,count($animaciones)-1)]); ?>
                                <li>
                                    <a class="wow <?php echo $am; ?>" href="#" data-filter=".s-<?php echo $v['sex']; ?>"
                                       data-wow-delay="<?php echo $ti; ?>s">
                                        <?php echo trans('horse.sexs.'.$v['sex']); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <ul class="works-grid works-grid-masonry  works-grid-<?php echo $col; ?> <?php echo $tipo; ?>" id="works-grid">

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
                <li class="work-item <?php echo $clase; ?>">
                    <a href="<?php echo $link; ?>">
                        <div class="work-image">
                            <?php if($vendido == 1): ?>
                                <div class="sold sold-n sold-0"></div>
                            <?php endif; ?>
                            <img
                                    src="<?php echo $img; ?>"
                                    alt="<?php echo $s->getAltText(); ?>"
                            />
                        </div>
                        <div class="work-caption font-alt">
                            <h3 class="work-title">
                                <?php echo $nombre; ?>

                            </h3>
                            <div class="work-descr">
                                <?php ($last= count($caracteristicas)); ?>
                                <?php $__currentLoopData = $caracteristicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($v['v'])): ?>
                                        <span><?php echo $v['v']; ?></span><?php if($k!=$last-1): ?>,<?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endfor; ?>
            
        </ul>
    </div>
</section>