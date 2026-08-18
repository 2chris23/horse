
<hr class="divider-d">

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                

                <a rel="nofollow" class="ib" target="_blank"
                   href="<?php echo StudController::LimpiarStudFromUrl(route('MyPage',['slug'=>$user->getMySlug()])); ?>"><?php echo $stud->getDomain(); ?> </a>
                © <?php echo Funciones::CurrentYear(); ?> <?php echo trans('portal.allright'); ?>

            </div>
            <div class="col-sm-6">
                <div class="footer-social-links">
                    <?php if(!empty($stud->getFacebook()->getUrlPage())or !empty($stud->getTwitter()->getUrlPage()) or !empty($stud->getYoutube()->getUrlPage())): ?>
                        <?php if(!empty($stud->getFacebook()->getUrlPage())): ?>

                            <a rel="nofollow" href="<?php echo $stud->getFacebook()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class="fa fa-facebook fa-fw"> </i>
                            </a>



                        <?php endif; ?>

                        <?php if(!empty($stud->getTwitter()->getUrlPage())): ?>


                            <a rel="nofollow" href="<?php echo $stud->getTwitter()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class="fa fa-twitter "> </i>
                            </a>


                        <?php endif; ?>
                        <?php if(!empty($stud->getInstagram()->getUrlPage())): ?>



                            <a rel="nofollow" href="<?php echo $stud->getInstagram()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class="fa fa-instagram "> </i>
                            </a>


                        <?php endif; ?>
                        <?php if(!empty($stud->getPinterest()->getUrlPage())): ?>


                            <a rel="nofollow" href="<?php echo $stud->getPinterest()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class="fa fa-pinterest-p "> </i>
                            </a>

                        <?php endif; ?>
                        <?php if(!empty($stud->getYoutube()->getUrlPage())): ?>




                            <a rel="nofollow" href="<?php echo $stud->getYoutube()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class="fa fa-youtube fa-fw"> </i>
                            </a>

                        <?php endif; ?>

                        <?php if(!empty($stud->getGoogle()->getUrlPage())): ?>


                            <a rel="nofollow" href="<?php echo $stud->getGoogle()->getUrlPage(); ?>" class=""
                               target="_blank">
                                <i class=" fa fa-google-plus fa-fw"> </i>
                            </a>




                        <?php endif; ?>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</footer>