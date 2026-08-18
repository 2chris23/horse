<?php ($sexos = Publico::Arraysexs()); ?>

<?php $__env->startSection('title', trans('stud.instalations')." | " ); ?>
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
    <?php ($video = $stud->getUserModel()->getVideo()); ?>
    <?php if(!empty($video)): ?>

        <?php echo $__env->make('frontend.landing.v6.partial.slidervideo',[
        'video'=>$video,
        'titulo'=>$stud->getName()
        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
    <?php else: ?>

        <?php echo $__env->make('frontend.landing.v6.partial.slider2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.imagenderecha',['noli'=>1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php ($link =StudController::LimpiarStudFromUrl(route('MyGallery',['slug'=>$user->getMySlug()]))); ?>

    

    <?php echo $__env->make('frontend.landing.v6.partial.divlink',[
    'link'=>$link,
    'titulo'=> trans('stud.photos')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.portfoliomasonStud',['fotoy'=>1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    


    <?php echo $__env->make('frontend.landing.v6.partial.divlink',[
    'link'=>route('MyHorsesV1',['slug'=>$user->getMySlug()]),
    'titulo'=>trans('stud.ouranimal')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('frontend.landing.v6.partial.tarjetas4',['horses'=>Horses::Caballos($stud)->Azar()->get()->take(8)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>