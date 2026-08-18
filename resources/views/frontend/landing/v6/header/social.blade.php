<?php if(!empty($stud->getFacebook()->getUrlPage())or
                    !empty($stud->getPinterest()->getUrlPage()) or
                    !empty($stud->getGoogle()->getUrlPage()) or
                    !empty($stud->getTwitter()->getUrlPage()) or
                    !empty($stud->getYoutube()->getUrlPage())): ?>
    <div id="SocialShare">
        <div class="jssocials-shares">


            <?php if(!empty($stud->getFacebook()->getUrlPage())): ?>

                <div class="jssocials-share jssocials-share-facebook">
                    <a target="_blank"
                       href="<?php echo $stud->getFacebook()->getUrlPage(); ?>"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i class="fa fa-facebook jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"> </span>
                    </a>
                </div>


            <?php endif; ?>
            <?php if(!empty($stud->getTwitter()->getUrlPage())): ?>
                <div class="jssocials-share jssocials-share-twitter">
                    <a href="<?php echo $stud->getTwitter()->getUrlPage(); ?>" target="_blank"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-twitter jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"></span>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(!empty($stud->getInstagram()->getUrlPage())): ?>
                <div class="jssocials-share  jssocials-share-instagram">

                    <a href="<?php echo $stud->getInstagram()->getUrlPage(); ?>" target="_blank"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i class="fa fa-instagram jssocials-share-logo "></i>
                        <span class="jssocials-share-count"> </span>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(!empty($stud->getPinterest()->getUrlPage())): ?>
                <div class="jssocials-share jssocials-share-pinterest">
                    <a target="_blank"
                       href="<?php echo $stud->getPinterest()->getUrlPage(); ?>"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-pinterest jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count"> </span>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(!empty($stud->getYoutube()->getUrlPage())): ?>
                <div class="jssocials-share jssocials-share-googleplus">
                    <a target="_blank"
                       href="<?php echo $stud->getYoutube()->getUrlPage(); ?>"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-youtube jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count">
</span>
                    </a>
                </div>

            <?php endif; ?>
            <?php if(!empty($stud->getGoogle()->getUrlPage())): ?>
                <div class="jssocials-share jssocials-share-googleplus">
                    <a target="_blank"
                       href="<?php echo $stud->getGoogle()->getUrlPage(); ?>"
                       class="jssocials-share-link jssocials-share-link-count jssocials-share-no-count">
                        <i
                                class="fa fa-google jssocials-share-logo">
                        </i>
                        <span class="jssocials-share-count">
</span>
                    </a>
                </div>
            <?php endif; ?>



            






            
        </div>
    </div>
<?php endif; ?>