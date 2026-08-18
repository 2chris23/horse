<?php ($Coins = \Session::get('moneda')); ?>

<li>
    <a rel="nofollow" href="#!" class="dropdown-toggle" data-toggle="dropdown">
        <span> <?php echo $Coins; ?></span>
    </a>
    <ul class="moneda text-left dropdown-menu">
        <?php ($Monedas = \Session::get('monedas')); ?>
        <?php if (empty($Monedas)) { $Monedas = []; } ?>
        <?php $__currentLoopData = $Monedas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                
                <a href="<?php echo route('monedas',['mon'=>$v['small']]); ?>"
                   rel="nofollow"><?php echo $v['small']; ?>

                    (<?php echo $v['simbolo']; ?>)</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</li>

