<?php 
    $d7 = url('theme/w/img/hyc-1.jpg');
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
$img = isset($img)?$img:$d5;
$smalltext=isset($smalltext)?$smalltext:null;
$bigtext=isset($bigtext)?$bigtext:null;


 ?>
<section class="module bg-dark-30 parallax-bg restaurant-menu-bg"
         data-background="<?php echo $img; ?>">
    <div class="container">
        <?php if($smalltext!=null): ?>
            <div class="row">
                <div class="col-xs-12 text-center">

                    <div class="alt-module-subtitle text-center">
                            <span class="holder-w" style="text-align: end;">

                            </span>
                        <h5 class="font-serif">
                            <?php echo e($smalltext); ?>

                        </h5>
                        <span class="holder-w" style="    text-align: start;"></span>
                    </div>

                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($bigtext)): ?>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="module-title font-alt mb-0">
                        <?php echo e($bigtext); ?>

                    </h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
