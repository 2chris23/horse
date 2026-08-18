<?php ($actual =Request::url()); ?>
<?php ($sexos = Publico::Arraysexs()); ?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>
            <a class="navbar-brand"
               href="<?php echo StudController::LimpiarStudFromUrl(route('MyPage',['slug'=>$user->getMySlug()])); ?>">
                <img class="img-responsive" src="<?php echo $stud->getLogo(); ?>" alt=""/>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">

                <?php echo $__env->make('frontend.landing.v6.header.moneda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('frontend.landing.v6.header.languaje', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php ($s=(Funciones::BuscarEnString($actual,$user->getMySlug())==true
                and Funciones::BuscarEnString($actual,'Instalaciones')!=true)
                and Funciones::BuscarEnString($actual,'Horse')!=true
                and Funciones::BuscarEnString($actual,'Ventas')!=true
                and Funciones::BuscarEnString($actual,'Galeria')!=true
                and Funciones::BuscarEnString($actual,'Contacto')!=true
                ?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MyPage',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.home'); ?></a>
                </li>
                <?php ($s=(Funciones::BuscarEnString($actual,'Instalaciones')==true)?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MyInstalation',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.instalations'); ?></a>
                </li>
                


                <?php ($g = $stud->getFirstHorse()); ?>
                <?php if(!empty($g)): ?>

                    <li class="<?php echo $s; ?>">
                        <a href="<?php echo StudController::LimpiarStudFromUrl(route('MyHorsesV1',['slug'=>$user->getMySlug()])); ?>">
                            <?php echo trans('stud.horses'); ?>

                        </a>
                        
                    </li>
                <?php endif; ?>

                <?php ($s=(Funciones::BuscarEnString($actual,'Ventas')==true)?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MySell',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.sell'); ?></a>
                </li>
                <?php ($s=(Funciones::BuscarEnString($actual,'Galeria')==true)?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MyGallery',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.photos'); ?></a>
                </li>
                <?php ($s=(Funciones::BuscarEnString($actual,'Video')==true)?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MyVideo',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.video'); ?></a>
                </li>
                <?php ($s=(Funciones::BuscarEnString($actual,'Contacto')==true)?'active':null); ?>
                <li class="<?php echo $s; ?>">
                    
                    <a
                            href="<?php echo StudController::LimpiarStudFromUrl(route('MyContact',['slug'=>$user->getMySlug()])); ?>"><?php echo trans('stud.contact'); ?></a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
