<?php ($sexos = Publico::Arraysexs()); ?>


<?php $__env->startSection('fbheader'); ?>
    <?php echo $__env->make('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('csstop'); ?>
    <?php 
        $web = trans('stud.video');
        $web = (isset($web))?$web:trans('stud.video');
        $sweb = (isset($sweb))?$sweb:trans('stud.ouranimal');

     ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', $web.' | '); ?>
<?php $__env->startSection('slider'); ?>
    

    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>null,
    'bigtext'=>$web
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.portfoliomasonStud',['videoy'=>1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>$stud->getName(),
    'bigtext'=>null
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    




<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>