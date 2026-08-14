<!DOCTYPE html>
<html>
<head>
    <title>Login 2 | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{!! url('favicon.ico') !!}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/components.min.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/custom.min.css') !!}"/>
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link type="text/css" rel="stylesheet" href="{!! url('assets/vendors/wow/css/animate.css') !!}"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{!! url('assets/css/pages/login2.css') !!}"/>
</head>
<body class="login_background">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="{{trans('text.charging')}}">
    </div>
</div>
<div class="container wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="row">
        <div class="col-xl-4 push-xl-4 col-lg-6 push-lg-3 col-md-8 push-md-2 col-sm-8 push-sm-2 col-10 push-1">
            <div class="row">
                <div class="col-lg-10 push-lg-1 col-md-10 push-md-1 col-sm-12 login_image login_section login_section_top">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center text-white">
                            <img src="{!!url('logo.png')!!}" alt="josh logo" class="admire_logo">
                        </h3>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-12">
                            <a class="text-success m-r-20 font_18">{{trans('login.login')}}</a>
                            <a href="register2.html" class="text-white font_18">{{trans('login.signup')}}</a>
                        </div>
                    </div>
                    <div class="m-t-15">

                        <form class="form-horizontal" id="login_validator" role="form" method="POST"
                              action="{{ url('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="col-form-label text-white">{{trans('login.email')}}</label>
                                <input type="text" class="form-control b_r_20" id="email" name="email"
                                       placeholder="{{trans('login.placeholder.email')  }}">
                            </div>
                            <div class="form-group">
                                <label for="password"
                                       class="col-form-label text-white">{{trans('login.password')}}</label>
                                <input type="password" class="form-control b_r_20" id="password" name="password"
                                       placeholder="{{trans('login.placeholder.password')  }}">
                            </div>
                            <div class="row m-t-15">
                                <div class="col-12">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"> </span>
                                        <a class="custom-control-description text-white">{{trans('login.keeplog')}}</a>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center login_bottom">
                                <button type="submit" class="btn btn-mint btn-block b_r_20 m-t-10 m-r-20">
                                    {{trans('login.login')}}
                                </button>
                            </div>
                            <div class="m-t-15 text-center">
                                <a href="forgot_password2.html" class="text-white">{{trans('login.forgot')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{!! url('assets/js/jquery.min.js') !!}">
</script>
<script type="text/javascript" src="{!! url('assets/js/tether.min.js') !!}">
</script>
<script type="text/javascript" src="{!! url('assets/js/bootstrap.min.js') !!}">
</script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript"
        src="{!! url('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') !!}">
</script>
<script type="text/javascript" src="{!! url('assets/vendors/wow/js/wow.min.js') !!}">
</script>
<script type="text/javascript" src="{!! url('assets/vendors/jquery.backstretch/js/jquery.backstretch.js') !!}">
</script>
<!--End of plugin js-->
<script type="text/javascript" src="{!! url('assets/js/pages/login2.js') !!}">
</script>

</body>

</html>