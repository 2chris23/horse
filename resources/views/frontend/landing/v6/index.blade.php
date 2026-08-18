<?php ($sexos = Publico::Arraysexs()); ?>

<?php $__env->startSection('title', trans('stud.home')." | " ); ?>
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
<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.sliderparalax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.imagenderecha', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php ($link =StudController::LimpiarStudFromUrl(route('MyInstalation',['slug'=>$user->getMySlug()]))); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divlink',[

    'link'=>$link,
    'titulo'=>""
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.tarjetas',[
    'horses'=>$horsesfav,
    'titulo'=>trans('portal.horsepinned'),
    'contenido'=>null,
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divlink',[
    'link'=>route('MyHorsesV1',['slug'=>$user->getMySlug()]),

    'titulo'=>trans('stud.ouranimal')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.tarjetas4',['horses'=>Horses::Caballos($stud)->Azar()->get()->take(8)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>