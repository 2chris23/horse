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
        $web = trans('stud.horses');
        $web = (isset($web))?$web:trans('stud.horses');
        $sweb = (isset($sweb))?$sweb:trans('stud.ouranimal');
        if(isset($venta)){
            if($venta == 1){
            $web = trans('portal.sell');
            $sweb = trans('portal.sellhorse');
            }
        }

     ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', $web.' | '); ?>
<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>$web,
    'bigtext'=>''
    //$sweb
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.portfoliomason', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>$stud->getName(),
    'bigtext'=>null
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>