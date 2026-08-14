@extends('backend.layouts.fakelanding')
<?php $logo = url(\Config::get('logos.logoh250')); ?>
<!-- Main Content -->
@section('content')
    <style>
        .footer-bottom {
            height: 0px;
        }

        .login_border_radius1 {
            display: none;
        }

        @media (min-height: 540px) {
            .footer-bottom {
                height: 40px;
            }

            .login_border_radius1 {
                display: block;
            }

        }
    </style>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-xs-12 col-md-offset-3 col-md-6">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="col-md-offset-3 col-md-6 col-xs-12 login_logo login_border_radius1">
                        <h3 class="text-xs-center">
                            <img src="{{$logo}}" alt="josh logo" class="img-responsive">
                            <span class="text-white">

                                {{trans('login.tittle') }} &nbsp;<br/>
                                {{trans('login.subtittle') }}
                            </span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius col-xs-12 ">
                        <form id="login_validator" method="POST" action="{{url('login')}}" class="login_validator">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label"> {{trans('login.email')}}</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                                class="fa fa-envelope text-warning"></i></span>
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
                                                class="fa fa-lock text-warning"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"
                                           name="password" placeholder="{{trans('login.placeholder.password')  }}">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="remember" class="form-control-label rem">
                                    <input type="checkbox" name="remember" id="remember">
                                    {{trans('login.keeplog')}}

                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-block btn-warning glow_button ">
                                            {{trans('login.login')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">

                                </div>
                                <div class="col-xs-6 text-xs-right forgot_pwd">
                                    <a href="{{route('OlvidoGet')}}"
                                       class="custom-control-description forgottxt_clr">
                                        {{trans('login.forgot')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    {{--
                        <div class="form-group">
                            <label class="form-control-label">
                                {{trans('login.noacc')}} </label>
                            <a href='{{ url('register')}}' class="text-primary"><b>{{trans('login.signup')}}</b></a>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>

    </script>
@endsection