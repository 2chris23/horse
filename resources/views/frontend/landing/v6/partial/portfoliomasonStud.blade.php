<?php
$work = null;
$videoy = isset($videoy) ? $videoy : 0;
$fotoy = isset($fotoy) ? $fotoy : 0;
$fotos = isset($fotos) ? $fotos : 0;
if ($videoy == 1) {
    /*Video de yeguada*/
    $work = $stud->getVideosModel();
    $vid = 1;

    $class = 'video-pop-up';


} elseif ($fotoy == 1) {
    /*Foto de yeguada*/
    $work = $stud->getInstalationsGallery();
    $vid = 0;
    $class = 'gallery-item';
    $class = 'fotog';
} elseif ($fotos == 1) {
    $work = $stud->getPhotosModel();
    $vid = 0;
    $class = 'gallery-item';
    $class = 'fotog';
}
$nombre = $stud->getName();

$animaciones[0] = 'fadeInUp';
$animaciones[1] = 'fadeInUp';
$tiempos[0] = '0.4';
$tiempos[1] = '0.6';
$tiempos[2] = '0.8';

$col = 4;

$tipo = 'works-hover-g'; //fondo gradiemte
$tipo = 'works-hover-w'; //fondo blanco
$tipo = 'works-hover-d'; //fondo negro
$clase = '';
?>
<?php if(!empty($work)): ?>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt" id="filters">

                    </ul>
                </div>
            </div>

            <ul class="works-grid works-grid-masonry  works-grid-<?php echo $col; ?> <?php echo $tipo; ?>" id="works-grid">
                <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if ($vid == 1) {
                        /*Video*/

                        $img = $v->getYoutubeThumb();
                        $link = 'http:' . $v->getNormalVideoYoutube();
                        $alttext = $stud->getName() . " " . $v->getName();

                    } else {
                        /*Foto*/
                        $img = null;
                        if (!is_array($v)) {
                            if (!empty($v->getUrl())) {
                                $img = $v->getUrl();
                            }
                        } else {
                            if (!empty($v['url'])) {
                                $img = $v['url'];
                            }
                        }
                        $alttext = $stud->getName();
                        $link = $img;
                    }

                    ?>

                    <li class="work-item 
                     <?php if($fotoy == 1): ?> gallery-item <?php endif; ?> 
                     <?php if($fotos == 1): ?> gallery-item <?php endif; ?> 
                    <?php if($videoy == 1): ?> 
                     <?php else: ?> 
                    <?php echo $clase; ?>

                     <?php endif; ?>
                    ">
                        <a href="<?php echo $link; ?>" class=" <?php if($videoy == 1): ?> popup-youtube <?php endif; ?>"
                        >
                            <div class="work-image">
                                <img
                                        src="<?php echo $img; ?>"
                                        alt="<?php echo $alttext; ?>"
                                />
                            </div>
                            <div class="work-caption font-alt">
                                <h3 class="work-title">
                                    <?php echo $nombre; ?>

                                </h3>
                                <div class="work-descr">

                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </ul>
        </div>
    </section>
<?php endif; ?>