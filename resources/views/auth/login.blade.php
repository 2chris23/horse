<?php $logo = url('logo.png'); ?>
        <!DOCTYPE html>
<html>
<head>
    <title>{{trans('login.pagtittle')}} | Horse Sell World</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.min.css')}}"/>
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets/vendors/bootstrapValidator/dist/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/wow/css/animate.css')}}"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login1.css')}}"/>
</head>
<body>

<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-xs-center">
                            <img src="{{$logo}}" alt="josh logo" class="admire_logo">
                            <span class="text-white">
                                {{trans('login.tittle') }} &nbsp;<br/>
                                {{trans('login.subtittle') }}
                            </span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form id="login_validator" method="POST" action="{{url('login')}}" class="login_validator">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label"> {{trans('login.email')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                                class="fa fa-envelope text-primary"></i></span>
                                    <input type="email" class="form-control  form-control-md" id="email" name="email"
                                           placeholder="{{trans('login.placeholder.email')  }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--</h3>-->
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="form-control-label">{{trans('login.password')}}
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                                class="fa fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"
                                           name="password" placeholder="{{trans('login.placeholder.password')  }}">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-block login_button">
                                            {{trans('login.login')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">

                                            {{trans('login.keeplog')}}
                                        </a>
                                    </label>
                                </div>
                                <div class="col-xs-6 text-xs-right forgot_pwd">
                                    <a href="{{URL::to('forgot_password1')}}"
                                       class="custom-control-description forgottxt_clr">

                                        {{trans('login.forgot')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 m-t-10">
                                    <div class="icon-white btn-facebook icon_padding loginpage_border">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span class="text-white icon_padding text-center question_mark">
                                        {{trans('login.facebook')}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 pull-lg-right m-t-10">
                                    <div class="icon-white btn-google icon_padding loginpage_border">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        <span class="text-white icon_padding question_mark">
                                            {{trans('login.google')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">
                                {{trans('login.noacc')}} </label>
                            <a href='{{ url('register')}}' class="text-primary"><b>{{trans('login.signup')}}</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript"
        src="{{asset('assets/vendors/bootstrapValidator/dist/js/bootstrapValidator.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/wow/js/wow.min.js')}}"></script>{{--Reempla--}}
<!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login1.js')}}"></script>
</body>

</html>