<?php $__env->startSection('title',$horse->getName().' | '); ?>
<?php $__env->startSection('fbheader'); ?>
    <?php ($imgf = !empty($horse->getPhotoFirstModel())?$horse->getPhotoFirstModel()->getUrl():$stud->getLogo()); ?>
    <?php
    /*
    $internacional = $horse->GetInternacionalizacion();
    $lngalterno = $internacional['lngalterno'];
    $lsd = $internacional['lsd'];
    $menunuevo = $internacional['menu'];
    */
    ?>
    <?php echo $__env->make('meta',
  [
  'titulo' => $horse->getName(),
  'descripcion'=>$horse->getDescripcion(),
  'logo'=>$imgf,
  'key'=>$stud->words,
  'horse'=>$horse,

  'imagenes' =>$horse->getPhotoModel(),
  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__currentLoopData = $horse->getPhotoModel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:image" content="<?php echo $i->url; ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $horse->getVideosModel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:video" content="<?php echo $i->getYoutubeThumb(); ?>">
        <meta name="twitter:player" content="<?php echo $i->getYoutubeThumb(); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $horse->getPhotoModel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:image" content="<?php echo $v->url; ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    <?php if(!empty($horse)): ?>
        <?php echo $__env->make('frontend.landing.v6.partial.detalle',['horse'=>$horse], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
        'smalltext'=>$stud->getName(),
        'bigtext'=>null
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('frontend.landing.v3.partial.contactocaballo',['horse'=>$horse], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('portal.Modal.email',['horse'=>$horse], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('bottomjs'); ?>
    <script>
        $(document).on('ready', function () {
            var fe = $('.btn-block');
            var fa = $(fe).parent();

            $.each(fa, function (k, v) {
                $(v).addClass('text-center').addClass('center-block');
            });

            $.each(fe, function (k, v) {
                $(v).addClass('btn-w').addClass('btn-round').addClass('center-block').addClass('mt-20').removeClass('btn-block').removeClass('btn-theme');

            });


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>