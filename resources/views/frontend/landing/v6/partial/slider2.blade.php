<?php 
    $d7 = url('theme/w/img/hyc-1.jpg');
    $linkso = isset($linkso)?$linkso:null;
    $linktext = isset($linktext)?$linktext:trans('portal.seemore');
    $sliders = $stud->getSliders();
    $tmp = count($sliders);
    $st = [];
    $sd = [];
     $d = [];
        $d[0] = url('landing/images/slider/1/2.jpg');
        $d[1] = url('landing/images/slider/1/6.jpg');
        $d[2] = url('landing/images/slider/1/9.jpg');
        $d[3] = url('landing/images/slider/1/8.jpg');
        $st[0] = '';
        $st[1] = '';
        $st[2] = '';
        $st[3] = '';
        $sd[0] = '';
        $sd[1] = '';
        $sd[2] = '';
        $sd[3] = '';

        $d5 = $d[rand(0,3)];
        $d6 = $d[rand(0,3)];


    if(!empty($sliders) and $stud->hasSlider() == true)
    {

            if($tmp == 1){

                $ts = $sliders[0];
                $d[0]= $ts->getUrl();//Probar con 1 imagen, puede dar fallo
                $st[0] = '';
                $sd[0] = '';
            }else{
                $d=[];
                foreach($sliders as $k=>$v){
                    $d[$k] = $v->getUrl();
                    $st[$k] =  $v->getTitulo1();
                    $sd[$k] =  $v->getTitulo2();
                }
                $d5 = $sliders[rand(0,count($sliders)-1)]->getUrl();
                $d6 = $sliders[rand(0,count($sliders)-1)]->getUrl();
            }
    }
    /*
    $bla =rand(0,count($d)-1);
$fas = $d[$bla];
$fes = $st[$bla];
*/

 ?>



<section class="home-section home-parallax home-fade" id="home">
    <div class="hero-slider">
        <ul class="slides">
            <?php $__currentLoopData = $d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="bg-dark-30 bg-dark" style="background-image:url(<?php echo url($v); ?>);">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1">
                                <?php echo $sd[$k]; ?>

                            </div>
                            <div class="font-alt mb-40 titan-title-size-4">
                                <?php echo $st[$k]; ?>

                            </div>
                            <?php if(!empty($linkso)): ?>
                                <a class="section-scroll btn btn-border-w btn-round" href="<?php echo $linkso; ?>">
                                    <?php echo $linktext; ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </ul>
    </div>
</section>