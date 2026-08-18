<?php ($horse = isset($horse)?$horse:null); ?>





<?php
$razas = $stud->Horses()->select('raza', DB::raw('count(*) as total'))->groupby('raza')->get()->toArray();
$colores = $stud->Horses()->select('color', DB::raw('count(*) as total'))->groupby('color')->get()->toArray();
$colorcoorp = $stud->getColor();
$sexos = Horse::where(['studs_id' => $stud->id])->select('sex', DB::raw('count(*) as total'))->groupby('sex')->get()->toArray();
$f = $horse->getPhotoFirstModel();
$fotos = $horse->getPhotoModel();
$videos = $horse->getVideosModel();

$img = null;
$imgf = null;
if (!empty($f)) {
    $img = $f->getUrl();
    $imgf = $img;
}
$edad = $horse->getAge();
$nombre = $horse->getName();
$descripcion_yeguada = $stud->getDescription();
$descripcion = $horse->getDescripcion();

$mes = $horse->getAgeMonth();
$sold = ($horse->sold == 1) ? 'sold' : '';
$precio = Funciones::AjustarNumeroMil($horse->getPrice());
$vendido = ($horse->sold == 1) ? true : false;
$venta = ($horse->tosold == 1) ? true : false;
$acub = ($horse->tocubri == 1) ? true : false;
$fbs = Funciones::CompartirFacebook($horse->getName(), Request::fullUrl());
$tws = Funciones::CompartirTwitter($horse->getName(), Request::fullUrl());
$Gs = Funciones::CompartirGoogle(Request::fullUrl());
$Ptr = Funciones::CompartirPinterest($horse->getName(), Request::fullUrl());
$print = route('VersionImpresa', ['ids' => $horse->slug]);

if ($edad != 0) {
    $tedad = trans('horse.years', ['ano' => $edad]);
} else {
    $tedad = trans('horse.mes', ['mes' => $mes]);
}
$studar = [];
if (!empty($horse->getStud())) {
    if ($horse->getStud() != '') {
        $studar = ['k' => trans('horse.text.stud'), 'v' => $horse->getStud(),];
    }
}
$dom = ($horse->getDoma() != 1) ? trans('horse.doma.0') : trans('horse.doma.' . $horse->doma);
$gen = [];
if (!empty($horse->getGenealogia())) {
    $gen = [
        'k' => trans('horse.text.genealogia'),
        'v' => trans('tema1.ficha'),
        'u' => url($horse->getGenealogia()),
    ];
}
if ($acub == true) {
    if ($horse->getCubriPrice() != 0) {
        $cubrio = [
            'k' => trans('horse.text.cubricion'),
            'v' => Funciones::AjustarNumeroMil($horse->getCubriPrice()) . $horse->getSimboloMoneda(),
            's' => "<span class=\"tooltip mone no-color\" data-slugc = \"" . $horse->slug . '" data-slugp="" ' .
                " data-getcubri=\"" . $horse->slug . "\" data-urlcubri=\"" . route('MonedaCaballo') . "/" . $horse->slug
                . "\" >" .
                Funciones::AjustarNumeroMil($horse->getCubriPrice()) .
                $horse->getSimboloMoneda() . " </span>",

        ];
    } else {
        $cubrio = [
            'k' => trans('horse.text.cubricion'),
            'v' => Funciones::AjustarNumeroMil($horse->getCubriPrice()) . $horse->getSimboloMoneda(),
            's' => "<span> " . trans('users.pricecheck') . " </span>",

        ];
    }
} else {
    $cubrio = [];
}


$caracteristicas = [
    0 => [
        'k' => trans('portal.raza'),
        'v' => trans('horse.raza.' . $horse->raza),
    ],
    1 => [
        'k' => trans('portal.age'),
        'v' => $tedad,
    ],
    2 => [
        'k' => trans('stud.text.raised'),
        'v' => $horse->getRaisedFormat(),
    ],
    3 => [
        'k' => trans('portal.sex'),
        'v' => trans('horse.sex.' . $horse->sex),
    ],
    4 => [
        'k' => trans('horse.attrib.color'),
        'v' => trans('horse.color.' . $horse->color),
    ],
    5 => $studar,

    6 => [
        'k' => trans('portal.doma'),
        'v' => $dom,

    ],
    7 => $gen,
    8 => $cubrio,
    /*
    6=>[
    'k'=> ,
    'v'=> ,
    ],
    */
];

?>
<section class="module">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 mb-sm-40">
                <?php ($primera = 0); ?>
                <?php ($totalfoto = count($fotos)); ?>
                <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($primera == 0): ?>
                        
                        <img src="<?php echo $v->getUrl(); ?>" alt="<?php echo $horse->getAltText(); ?>"/>
                        

                    <?php endif; ?>
                    <?php if($primera == 0): ?>
                        <ul class="product-gallery">
                            <?php endif; ?>
                            <li>
                                <a class="gallery fotog" href="<?php echo $v->getUrl(); ?>">
                                    <?php if($vendido == 1): ?>
                                        <div class="sold sold-n sold-s"></div>
                                    <?php endif; ?>
                                    <img
                                            src="<?php echo $v->getUrl(); ?>" alt="<?php echo $horse->getAltText(); ?>"/>
                                </a>
                            </li>

                            
                            <?php if($primera == $totalfoto): ?>
                        </ul>
                    <?php endif; ?>

                    <?php ($primera = $primera+1); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="product-title font-alt">
                            <?php echo $horse->getName(); ?>

                        </h1>
                    </div>
                    <div class="col-sm-5 p-0 f-right">
                        <a href="#!" class="m-t-10 icon-social"
                           onclick="window.open('<?php echo $fbs; ?>', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                        >
                            <i class="fa fa-facebook">
                            </i>
                        </a>

                        <a href="#!" class="m-t-10 icon-social"
                           onclick="window.open('<?php echo $tws; ?>', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                        >
                            <i class="fa fa-twitter">
                            </i>
                        </a>

                        <a href="#!" class="m-t-10 icon-social"
                           onclick="window.open('<?php echo $Gs; ?>', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                        >
                            <i class="fa fa-google-plus">
                            </i>
                        </a>
                        <a href="#!" class="m-t-10 icon-social"
                           onclick="window.open('<?php echo $Ptr; ?>', 'Compartir caballo', 'resizable=no,height=200,scrollbars=no');"
                        >
                            <i class="fa fa-pinterest">
                            </i>
                        </a>
                        <a href="#!" rel="nofollow" class="m-t-10 icon-social"
                           onclick="window.open('<?php echo $print; ?>', '<?php echo $horse->getName(); ?>', 'width=700,height=600,top=100,left=100,resizable,scrollbars');">
                            <i class="fa fa-print"> </i>
                        </a>
                        <a href="#!" rel="nofollow" class="icon-social" data-target=".report-mail" data-toggle="modal">
                            <i class="fa fa-envelope">
                            </i>
                        </a>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 height-45"> 
                        <div class="price font-alt">
                            <?php if($venta == true  and $vendido == false): ?>

                                <?php if(Funciones::AjustarNumeroMil($horse->price)  == 0): ?>
                                    <span class="amount" style="font-size: 21px">
                                    <?php echo trans('users.pricecheck'); ?>

                                    </span>
                                <?php else: ?>
                                    <span <?php echo $__env->make('backend.common.toolmoneda',['horse'=>$horse,'p'=>1,'class' => ' amount ' ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                          data-getprice="<?php echo $horse->slug; ?>">
                                        <?php echo Funciones::AjustarNumeroMil(Funciones::AjustarNumeroMil($horse->price) ); ?>

                                        <?php echo $horse->getSimboloMoneda(); ?>

                                    </span>
                                <?php endif; ?>
                            <?php elseif($venta == true  and $vendido == true): ?>
                                <span class="amount">
                                    <?php echo trans('users.sold'); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="data-sheet">
                    <table class="table table-striped ds-table table-responsive">
                        <tbody>

                        <?php for($i = 0;$i<count($caracteristicas);$i++): ?>
                            <?php ($v= $caracteristicas[$i]); ?>
                            <?php if(isset($v['v'])): ?>
                                <tr>
                                    <th><?php echo $v['k']; ?></th>
                                    <?php if($i == 7): ?>
                                        <th>
                                            <a href="<?php echo $v['u']; ?>"
                                               target="_blank"> <?php echo $v['v']; ?> </a>
                                        </th>
                                    <?php else: ?>
                                        <?php if($i == 8): ?>
                                            <?php if(Funciones::AjustarNumeroMil($horse->getCubriPrice()) !=0): ?>
                                                <th <?php echo $__env->make('backend.common.toolmoneda',['horse'=>$horse,'c'=>1,'class'=>'mone no-color'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> >
                                                    <?php echo Funciones::AjustarNumeroMil($horse->getCubriPrice() ); ?> <?php echo $horse->getSimboloMoneda(); ?>

                                                </th>
                                            <?php else: ?>
                                                <th class="mone no-color">
                                                    <?php echo $v['s']; ?>

                                                </th>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <th><?php echo $v['v']; ?></th>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </tr>
                            <?php endif; ?>
                        <?php endfor; ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-xs-offset-2 p-0">
                        <img src="<?php echo $stud->getLogo(); ?>" alt="<?php echo $stud->getName(); ?>"
                             class="img-responsive">
                    </div>
                    <div class="col-xs-7">
                        <div class="mb-10"><?php echo $stud->getName(); ?></div>
                        <?php if(!empty($stud->getAddress())): ?>
                            <div class="m-top-10 fix-text-200 mb-10">
                                <?php echo $stud->getAddress(); ?>, <?php echo $stud->getCity(); ?>

                                , <?php echo $stud->getStateModel()->name; ?>, <?php echo $stud->getCountryModel()->getName(); ?>

                            </div>
                        <?php endif; ?>
                        <div class="">
                            <a href="#!" class="btn btn-special p-t-10 p-s-10"
                               data-toggle="modal"
                               data-target=".price-quote">
                                <?php echo trans('portal.emailcontact'); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-sm-12">
                        <div class="description">
                            <p>
                                <?php echo $descripcion; ?>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mb-20">
                    <div class="col-xs-12">
                        <?php if(!empty($prev)): ?>
                            <div class=" col-xs-12  col-md-6  <?php if(!empty($next)): ?> col-md-4 <?php endif; ?> text-center">
                                <?php if(!empty($prev)): ?>
                                    <a href="<?php echo $prev; ?>"
                                       style="height: auto;width: auto"
                                       class="btn btn-border-d btn-circle ">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <?php echo trans('portal.back'); ?>


                                    </a>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                        <div class=" col-xs-12 col-md-6  <?php if(!empty($prev) or !empty($next)): ?>  col-md-4 <?php endif; ?> text-center">
                            <a href="<?php echo StudController::LimpiarStudFromUrl(route('MyHorsesV1',['slug'=>$user->getMySlug()])); ?>"
                               style="height: auto;width: auto"
                               class="btn btn-border-d btn-circle ">
                                <?php echo trans('users.return'); ?>

                            </a>
                        </div>
                        <?php if(!empty($next)): ?>
                            <div class=" col-xs-12 col-md-6 <?php if(!empty($prev)): ?> col-md-4 <?php endif; ?> text-center ">
                                <?php if(!empty($next)): ?>
                                    <a href="<?php echo $next; ?>"
                                       style="height: auto;width: auto"
                                       class="btn btn-border-d btn-circle ">
                                        <?php echo trans('portal.next'); ?>

                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <?php ($videos = $horse->getVideosModel()); ?>
        <?php if(count($videos) !=0 ): ?>
            <div class="row mt-20">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="item grid text-center">
                            <div class="img grid-item">
                                <a rel="nofollow" href="<?php echo $v->getNormalVideoYoutube(); ?>"
                                   class="popup-youtube">

                                    <span class="fa fa-play"> </span>
                                    <img src="<?php echo $v->getYoutubeThumb(); ?>"
                                         alt="<?php echo $stud->getName(); ?>  <?php echo $v->getName(); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>
