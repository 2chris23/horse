<?php $logo = url('logo.png'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>{{trans('login.pagtittle')}} | Horse Sell World</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{!!url(\Config::get('logos.favicon48')) !!}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}"/>
    <style>
        body {
            background-color: #2180ac;
            background-image: url('{{asset("img/login.jpg")}}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .login-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            padding: 30px;
            width: 100%;
            max-width: 500px;
        }
        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-logo img {
            max-height: 50px;
            margin-bottom: 10px;
        }
        .login-logo h4 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="login-box" style="margin: 0 auto;">
                <div class="login-logo">
                    <img src="{{$logo}}" alt="logo"><br/>
                    <h4>{{trans('login.login')}}</h4>
                </div>
                
                <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <label for="email" class="control-label" style="color: #555;">{{trans('login.email')}}</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{trans('login.placeholder.email')}}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block" style="color: red;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <label for="password" class="control-label" style="color: #555;">{{trans('login.password')}}</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{trans('login.placeholder.password')}}" required>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block" style="color: red;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 20px;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #2180ac; border: none; padding: 10px 0; font-size: 1.1em;">
                                {{trans('login.login')}}
                            </button>
                        </div>
                    </div>

                    <div class="form-group text-center" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label style="color: #555;">
                                    <input type="checkbox" name="remember"> {{trans('login.remember')}}
                                </label>
                                <a style="margin-left:15px; color: #2180ac;" href="{{ url('/password/reset') }}">{{trans('login.forgot')}}</a>
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #ddd; margin: 20px 0;">

                    <div class="form-group text-center">
                        <div class="col-md-6 col-xs-6">
                            <a href="#" class="btn btn-block" style="background-color: #3b5998; color: white;">
                                <i class="fa fa-facebook"></i> <span class="hidden-xs">{{trans('login.facebook')}}</span>
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <a href="#" class="btn btn-block" style="background-color: #d34836; color: white;">
                                <i class="fa fa-google-plus"></i> <span class="hidden-xs">{{trans('login.google')}}</span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="form-group text-center" style="margin-top: 20px; margin-bottom: 0;">
                        <div class="col-md-12">
                            <span style="color: #555;">{{trans('login.acount')}}</span>
                            <a href="{{url('register')}}" style="color: #2180ac; font-weight: bold;">{{trans('login.sign_up')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>