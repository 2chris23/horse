<?php 
    $precio = Funciones::AjustarNumeroMil($horse->getPrice());
    $raza = $horse->getRaza();
    $razas = trans('horse.raza');
    $alzada = $horse->getRaisedFormat();
    $edad = $horse->getAge();
    $mes = $horse->getAgeMonth();
   $sexo = $horse->getSex();
   $doma = $horse->getDoma();
    $yeguada = $horse->getStud();
   $stud = $horse->getYeguada();
if(!empty($horse->getPhotoModel()))
if(!empty($horse->getPhotoModel()->first()))
$foto = $horse->getPhotoModel()->first()->url;
else{
$foto = url('portal_/images/car.png');
}
else{
$foto = url('portal_/images/car.png');
}
 ?>
<!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
<div class="modal fade price-quote " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                     <span aria-hidden="true">
                        ×
                     </span>
                    <span class="sr-only">
                        <?php echo trans('portal.close'); ?>

                     </span>
                </button>
                <h3 class="modal-title" id="lineModalLabel">
                    <?php echo trans('portal.emailforprice'); ?>

                </h3>
            </div>
            <div class="modal-body col-xs-12">
                <div class="col-xs-12">
                    <div class="recent-ads-list-image col-xs-4">
                        <a href="#" class="recent-ads-list-image-inner">
                            <figure style="max-height: 300px">
                                <img src="<?php echo $foto; ?>"
                                     alt="<?php echo $horse->getName(); ?> <?php echo trans('horse.sex.'.$horse->sex); ?>"
                                     class="img-responsive"
                                     style="    margin: auto; margin: auto; max-height: 300px; width: auto;">
                            </figure>
                        </a>
                        <!-- /.recent-ads-list-image-inner --> </div>
                    <div class="recent-ads-list-content col-xs-8">
                        <h3 class="recent-ads-list-title">
                            <a href="#">
                                <?php echo $horse-> getName(); ?>

                            </a>
                        </h3>
                        <div class="col-xs-12">
                            <a href="#">
                                <?php echo $horse-> getStudName(); ?><br>
                                
                            </a>
                            <a href="#">
                                <?php echo $stud ->getAddress(); ?>

                            </a>
                            ,
                            <a href="#">
                                <?php echo $stud ->getCity(); ?>

                            </a>
                            ,
                            <a href="#">
                                <?php echo $stud ->getStateModel()->name; ?>

                            </a>
                            ,
                            <a href="#">
                                <?php echo $stud ->getCountryModel()->name; ?>

                            </a>

                            
                        </div>
                        <div class="col-xs-12">
                            <?php if(empty($precio)): ?>
                                <span class="consulta">
                                                    <?php echo trans('users.pricecheck'); ?>


                                                </span>
                                
                            <!-- CONSULTAR PRECIO AQUI -->
                            <?php else: ?>
                                <?php echo $horse->ObtenPrecioMonedaMill(); ?>

                                <span class="coinl ">
                        <?php echo $horse->getSimboloMoneda(); ?>

                    </span>
                                
                            <?php endif; ?>
                        </div>
                        <!-- /.recent-ads-list-price -->
                    </div>

                </div>
                <!-- content goes here -->
                <form method="post" class="col-xs-12 m-top-20"
                      action="<?php echo route('contactocaballoventa',['slug'=>$horse->slug]); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="hidden" name="horse_id" value="<?php echo $horse->id; ?>">
                    <input type="hidden" class="hidden" name="urld" value="<?php echo Request::fullUrl(); ?>">
                    <div class="form-group col-md-6 col-sm-6">
                        <label>
                            <?php echo trans('portal.placholdername'); ?>

                        </label>
                        <input type="text" class="form-control" name="nombre"
                               placeholder="<?php echo trans('portal.placholdername'); ?>" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <label>
                            <?php echo trans('portal.placholderemail'); ?>

                        </label>
                        <input type="email" name="email" class="form-control"
                               placeholder="<?php echo trans('portal.placholderemail'); ?>" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label>
                            <?php echo trans('portal.contactpub'); ?>

                        </label>
                        <input type="text" name="phone" class="form-control"
                               placeholder="<?php echo trans('portal.contactpub'); ?>" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label>
                            <?php echo trans('portal.placholdersms'); ?>

                        </label>
                        <textarea name="mensaje" placeholder="<?php echo trans('portal.placholdersms'); ?>" required
                                  rows="3" class="form-control"></textarea>
                    </div>
                    
                    

                    <div class="col-xs-12 text-center center-block">
                        <a href="#!" class="btn  m-top-20 btn-special p-t-10 p-s-10" onclick="$('#zape').click()">

                            <?php echo trans('portal.contactsend'); ?>

                        </a>
                    </div>
                    <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20 text-center">
                        <button type="submit" class="btn btn-default btn-block hidden hideen-xs-up" id="zape">
                            <?php echo trans('portal.contactsend'); ?>


                        </button>

                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
