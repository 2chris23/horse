<li>
    <a rel="nofollow" href="#!" class="dropdown-toggle" data-toggle="dropdown">
        <span class=" flag flag-<?php echo \Session::get('applocale'); ?>"></span>
    </a>
    <ul class="lenguaje text-left dropdown-menu">

        <?php if(!isset($menunuevo)): ?>

            <?php ($ln = \Config::get('lenguaje')); ?>
            <?php $__currentLoopData = $ln; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-left" onclick="changelan('<?php echo $k; ?>')">
                    <a rel="nofollow" class="text-left" href="#">
                        <span class="flag flag-<?php echo $k; ?> inline"></span>
                        <?php echo $v; ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php $__currentLoopData = $menunuevo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-left">
                    <a rel="nofollow" class="text-left" href="<?php echo $v['link']; ?>">

                        <span class="flag flag-<?php echo $v['cod']; ?> inline"></span>
                        <?php echo $v['name']; ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </ul>
</li>

