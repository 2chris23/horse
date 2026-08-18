<?php
    $lang = \Session::get('lang');
      if (empty($lang)) {
          $lang = 'es';
          \Session::set('lang', $lang);
          \Session::set('applocale', $lang);
      }
      App::setLocale($lang);

      $favicon = url('assets/img/logo1.ico');
      if (!empty($stud)) {
          if (!empty($stud->getFav())) {
              $favicon = $stud->getFavUrl();
          }
      }

       $Coins = \Session::get('moneda');
      $css = null;
      $Coins = empty($Coins)?'USD':$Coins;

?>
<?php
if (empty($horse)) {
    $internacional = (new Funciones())->GetInternacionalizacion(Request::route());
    $lngalterno = $internacional['lngalterno'];
    $lsd = $internacional['lsd'];
    $menunuevo = $internacional['menu'];
} else {
    $internacional = $horse->GetInternacionalizacion();
    $lngalterno = $internacional['lngalterno'];
    $lsd = $internacional['lsd'];
    $menunuevo = $internacional['menu'];
}
?>
        <!DOCTYPE HTML>
<html lang="<?php echo $lang; ?>">

<?php echo $__env->make('frontend.landing.v6.header.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<?php echo $__env->make('frontend.landing.v6.header.social', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.landing.studs.partials.messenger', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main>

    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    
    
    <?php echo $__env->make('frontend.landing.v6.header.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
    <?php echo $__env->yieldContent('slider'); ?>

    <div class="main showcase-page">
        
        
        

        

        
        
        
        


        
        
        <?php echo $__env->yieldContent('content'); ?>
        
    </div>
    <?php echo $__env->make('frontend.landing.v6.foot.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="scroll-up">
        <a rel="nofollow" href="#totop">
            <i class="fa fa-angle-double-up">
            </i>
        </a>
    </div>

</main>

<?php echo $__env->make('frontend.landing.v6.foot.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('modal'); ?>

</body>
</html>