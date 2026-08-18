<?php ($link = isset($link)?$link:null); ?>
<?php ($titulo = isset($titulo)?$titulo:null); ?>
<?php ($contenido = isset($contenido)?$contenido:null); ?>
<?php ($linktext = isset($linktext)?$linktext:trans('portal.seemore')); ?>
<?php ($margin = isset($margin)?$margin:0); ?>
<?php if(!empty($link)): ?>
    <section class="module-small bg-dark <?php if($margin!=0): ?> mt-102 <?php endif; ?>">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2 callout">
                    <div class="callout-text font-alt">
                        <?php if(!empty($titulo)): ?>
                            <h3 class="callout-title">
                                <?php echo $titulo; ?>

                            </h3>
                        <?php endif; ?>
                        <?php if(!empty($contenido)): ?>
                            <p>
                                <?php echo $contenido; ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="callout-btn-box">
                        <a class="btn btn-border-w btn-round" href="<?php echo $link; ?>">
                            <?php echo $linktext; ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>