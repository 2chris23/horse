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
        $web = trans('stud.contact');
        $web = (isset($web))?$web:trans('stud.contact');
        $sweb = (isset($sweb))?$sweb:trans('stud.subtext');
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
    

    
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>$sweb,
    'bigtext'=>$web
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.contacto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
    'smalltext'=>$stud->getName(),
    'bigtext'=>trans('tema3.visita')
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottomjs'); ?>
    <script async="" defer=""
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>