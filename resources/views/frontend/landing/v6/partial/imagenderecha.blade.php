<?php
$stud = isset($stud) ? $stud : null;
$horse = isset($horse) ? $horse : null;
if (!empty($horse)) {
    $contenido = $horse->getDescripcion();
} elseif (!empty($stud)) {
    $titulo = $stud->getName();
    $img = str_replace("\\", '/', $stud->getLogo());
    if (!isset($noli)) {
        $contenido = strip_tags(Funciones::CortarCadena($stud->getDescription(), 500));
    } else {
        $contenido = $stud->getDescription();
    }

}

?>
<section class="module pt-0 pb-0" id="about">
    <div class="row position-relative m-0">
        <div class="col-xs-12 col-sm-6 col-md-6 side-image img-full"
                
                
        >
            
            <figure class="logoton">
                <img src="<?php echo $img; ?>" alt="" class="img-resposive ">
            </figure>
            <div class="clearfix"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-6 side-image-text">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="module-title font-alt align-left">
                        <?php echo $titulo; ?>

                    </h2>
                    
                    <div class="module-subtitle font-serif align-left">
                        <?php echo $contenido; ?>

                    </div>
                    <p></p>
                    
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
<div class="clearfix"></div>