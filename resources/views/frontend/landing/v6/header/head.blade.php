<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title><?php echo $__env->yieldContent('title'); ?> <?php echo $stud->getName(); ?></title>
    <!-- Favicons ============================================= -->
    <?php echo $__env->yieldContent('fbheader'); ?>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo url('theme/g/images/favicons/apple-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo url('theme/g/images/favicons/apple-icon-60x60.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url('theme/g/images/favicons/apple-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo url('theme/g/images/favicons/apple-icon-76x76.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url('theme/g/images/favicons/apple-icon-114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo url('theme/g/images/favicons/apple-icon-120x120.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo url('theme/g/images/favicons/apple-icon-144x144.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo url('theme/g/images/favicons/apple-icon-152x152.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo url('theme/g/images/favicons/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?php echo $stud->getLogo(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $stud->getLogo(); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $stud->getLogo(); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $stud->getLogo(); ?>">
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo url('theme/g/images/favicons/ms-icon-144x144.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <!-- Stylesheets ============================================= -->
    <!-- Default stylesheets-->
    <link href="<?php echo url('theme/g/lib/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/animate.css/animate.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/components-font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/et-line-font/et-line-font.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/flexslider/flexslider.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/owl.carousel/dist/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/owl.carousel/dist/assets/owl.theme.default.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/magnific-popup/dist/magnific-popup.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('theme/g/lib/simple-text-rotator/simpletextrotator.css'); ?>" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link rel="stylesheet" href="<?php echo url('assets/tooltip/css/tooltipster.bundle.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('css/flags.css'); ?>" type="text/css">

    <?php echo $__env->yieldContent('csstop'); ?>

    <script src="<?php echo url('js/axios/axios.min.js'); ?>"></script>
    <script src="<?php echo url('theme/g/lib/jquery/dist/jquery.js'); ?>"></script>
    
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <link id="color-scheme" href="<?php echo url('theme/g/css/colors/default.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo url('theme/w/social/jssocials.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo url('theme/w/social/jssocials-theme-minima.css'); ?>">

    <?php echo $__env->make('googleanalitic',['ganalitic'=>$stud->getGa()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('adsence', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('zopin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <link href="<?php echo route('CssTheme6',['slug'=>$stud->slug]); ?>" rel="stylesheet">


    <script>
        window.UrlEstado = "<?php echo route('state.ajax'); ?>";
        window.token = '<?php echo csrf_token(); ?>';
        window.UrlCiudad = "<?php echo route('city.ajax'); ?>";
        function DisableElement(el) {
            $(el).prop('disabled', true);
            return null;
        };

        function EnableElement(el, clear = true) {
            $(el).prop('disabled', false);
            if (clear === true) $(el).val('');
            return null;
        };
    </script>

    <style>


    </style>
    <?php echo $__env->make('vendido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
