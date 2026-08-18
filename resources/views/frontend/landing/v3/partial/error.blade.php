<?php 
    $error = (!empty(\Session::get('flash_message')))?\Session::get('flash_message'):null;
        if(!empty($error)){
            if(is_array($error)){
                if(isset($error['sms'])){
                    $sms = $error['sms'];
                }else{
                    $sms = null;
                }
                if(isset($error['error'])){
                    $error = $error['error'];
                }else{
                    $error = null;
                }
            }
        }
 ?>
<?php if(!empty($error)): ?>
    <section class="about-page page fix"><!--Start About Area-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-title">
                        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
