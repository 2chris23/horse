<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="font-alt">
                    <?php echo trans('stud.contact'); ?>

                </h4><br/>
                

                
                
                <form id="contactForm2" role="form" method="post" action="<?php echo route('contacto.accion'); ?>">
                    <input type="hidden" value="<?php echo csrf_token(); ?>" id="_token" name="_token">
                    <input type="hidden" value="<?php echo $stud->id; ?>" id="stud" name="stud">
                    <div class="form-group">

                        <label class="sr-only" for="name">
                            <?php echo trans('stud.namecontact'); ?> *
                        </label>
                        <input name="name" class="form-control" type="text" id="name"
                               required="required"
                               data-validation-required-message="<?php echo trans('stud.namecontactplace'); ?>"
                               placeholder="<?php echo trans('stud.namecontactplace'); ?>">


                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">

                        <label class="sr-only" for="phone">
                            <?php echo trans('stud.phonecontact'); ?>

                        </label>
                        <input name="phone" class="form-control numbers" type="tel"
                               
                               placeholder="<?php echo trans('stud.phonecontactplace'); ?>">


                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">
                            <?php echo trans('stud.emailcontact'); ?> *
                        </label>
                        <input name="email" class="form-control" type="email"
                               placeholder="<?php echo trans('stud.emailcontactplace'); ?>"
                               id="email"
                               required="required"
                               data-validation-required-message="<?php echo trans('stud.emailcontactplace'); ?>"/>
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="form-group">
                        <label>
                            <?php echo trans('stud.smscontact'); ?> *
                        </label>
                        <textarea name="message" class="form-control"
                                  rows="7" id="message"
                                  placeholder="<?php echo trans('stud.smscontactplace'); ?>"
                                  required data-validation-required-message="<?php echo trans('stud.smscontactplace'); ?>"
                        ></textarea>

                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-default btn-round" type="submit"
                                value="<?php echo trans('stud.send'); ?>">
                            <?php echo trans('stud.send'); ?>

                        </button>
                    </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
            </div>
            <div class="col-sm-6">
                <h4 class="font-alt">
                    <?php echo $stud->getName(); ?>

                </h4>
                <br/>
                <p>
                    <?php echo trans('tema2.contactsms'); ?>

                </p>
                <hr/>
                
                <br/>
                <ul class="list-unstyled">
                    <?php if(!empty($stud->getAddress())): ?>
                        <li>

                            <?php echo $stud->getAddress() .", ". $stud->getCity() .", ". $stud->getStateModel()->name.", ". $stud->getCountryModel()->getName(); ?>

                            
                        </li>
                    <?php endif; ?>

                    <?php ($cd = 0); ?>
                    <?php $__currentLoopData = $stud->getPhoneModel(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($v->isNull() !== true): ?>
                            <?php if($cd == 0): ?>
                                <li>
                                    <a href="tel:<?php echo $v->getFormatNumberOnly(); ?>"
                                       class="no-color">
                                            <span class="no-color">
                                                <?php echo $v->FormatNumber(); ?>

                                            </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    
                </ul>
                <hr>
                <div class="text-center text-small text-right texto-shadow m-t-20">
                    <?php echo trans('tema1.whorwithus',['link'=> StudController::LimpiarStudFromUrl(route('TrabajoIndex',['slug'=>$stud->slug])) ]); ?>

                </div>
            </div>


        </div>
    </div>
</section>

