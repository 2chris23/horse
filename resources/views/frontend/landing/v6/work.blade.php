<?php $__env->startSection('title', trans('Titulos.Trabajo').' | '); ?>
<?php echo $__env->make('meta',
[
'titulo' => $stud->getTituloWeb(),
'descripcion'=>$stud->getSeodescripcion(),
'key'=>$stud->words,
'logo'=>$stud->getLogo(),
'imagenes' =>$stud->getPhotosModel(),
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->startSection('csstop'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo url('frontend/working/css/jquery.tagsinput.css'); ?> ">
    
    <link rel="stylesheet" href="<?php echo route('TrabajoCssTheme6',['slug'=>$stud->slug]); ?> ">
    <style type="text/css">

    </style>
    <script>
        <?php 
            $paistrabajo = \Session::get('pais_id');
            $paistrabajo = (!empty($paistrabajo))?$paistrabajo:0;
         ?>
            window.pai = <?php echo $paistrabajo; ?>;
        window.edo = 0;
        window.token = '<?php echo csrf_token(); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
        'smalltext'=>trans('trabajo.headt'),
        'bigtext'=>trans('trabajo.getdata')
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.trabajo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('frontend.landing.v6.partial.divparalax',[
        'smalltext'=>$stud->getName(),
        'bigtext'=>null
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('bottomjs'); ?>
    <script type="text/javascript" src="<?php echo url('assets/js/localidad.js'); ?>"></script>
    <script>
        function DisableElement(el) {
            $(el).prop('disabled', true);
            return null;
        };

        function EnableElement(el, clear = true) {
            $(el).prop('disabled', false);
            if (clear === true) $(el).val('');
            return null;
        };
        $('#tags').tagsInput();
        $(".numbers").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $('.savest').on('click', function () {
            $('#enviome').click();
        });
        var UrlEstado = "<?php echo route('state.ajax'); ?>";
        var UrlCiudad = "<?php echo route('city.ajax'); ?>";
        bkLib.onDomLoaded(function () {
            nicEditors.editors.push(
                new nicEditor().panelInstance(
                    document.getElementById('myNicEditor')
                )
            );
            nicEditors.editors.push(
                new nicEditor().panelInstance(
                    document.getElementById('myNicEditor2')
                )
            );
        });
        $(window).on('load', function () {
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.landing.v6.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>