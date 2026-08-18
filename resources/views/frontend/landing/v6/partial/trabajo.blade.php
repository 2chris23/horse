<!--End Main Menu Area-->
<div class="page-title fix"><!--Start Title-->
    <div class="overlay section">


        
        
    </div>
</div><!--End Title-->
<?php echo $__env->make('frontend.landing.v3.partial.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="product-page page fix">
    <!--Start Product Details Area-->
    <div class="container">
        <div class="row">
            <div class="tab-pane active " id="candidate-profile">
                <?php if(empty($editado)): ?>

                    <form enctype="multipart/form-data" class="col-xs-12"
                          action="<?php echo StudController::LimpiarStudFromUrl(route('TrabajoIndexPost',['slug'=>$stud->slug])); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="studid" value="<?php echo $stud->id; ?>">
                        <?php echo $__env->make('frontend.trabajos.partials.left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('frontend.trabajos.partials.right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                    </form> <!-- end .row -->
                <?php else: ?>

                    <form enctype="multipart/form-data" class="col-xs-12"
                          action="<?php echo StudController::LimpiarStudFromUrl(route('TrabajoIndexPost',['slug'=>$stud->slug])); ?>"
                          method="post">

                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="studid" value="<?php echo $stud->id; ?>">
                        <?php echo $__env->make('frontend.trabajos.partials.leftedit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('frontend.trabajos.partials.right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                    </form> <!-- end .row -->
                <?php endif; ?>
            </div>


        </div>
    </div>
</section>


