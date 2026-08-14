<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://foxythemes.net/preview/products/maisonnette/assets/img/favicon.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/maisonnette/style.css">
    <link rel="stylesheet" type="text/css" href="/maisonnette/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/maisonnette/theme-switcher.css">
    <link type="text/css" href="/maisonnette/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


@include('backend.top.maisonnetteuser')
<div class="mai-wrapper">
    <div class="main-content container">
        <div class="container">
            <div class="row">
                <div class=" col-xs-8 panel panel-default col-md-offset-2">
                    <div class="panel-heading panel-heading-divider">
                        Login
                        <span class="panel-subtitle">

                        </span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group row mt-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="inputEmail3"
                                       class="col-2 col-form-label">{!!trans('login.email') !!}</label>
                                <div class="col-10">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="inputPassword3"
                                       class="col-2 col-form-label">{{trans('login.password')}}</label>
                                <div class="col-10">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox mt-2">

                                        <input type="checkbox" name="remember"
                                               class="custom-control-input" {{ old('remember') ? 'checked' : ''}}>
                                        <span class="custom-control-indicator">
                                            </span>
                                        <span class="custom-control-description">Remember me</span>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Login</button>
                                        {{--<button type="submit" class="btn btn-space btn-primary">Register</button>--}}

                                        <a class="btn btn-link" href="{{ url('password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="/maisonnette/jquery_006.js" type="text/javascript">
</script>
<script src="/maisonnette/tether.js" type="text/javascript">
</script>
<script src="/maisonnette/perfect-scrollbar.js" type="text/javascript">
</script>
<script src="/maisonnette/bootstrap.js" type="text/javascript">
</script>
<script src="/maisonnette/app.js" type="text/javascript">
</script>
<script src="/maisonnette/theme-switcher.js" type="text/javascript">
</script>
<script src="/maisonnette/jquery_002.js" type="text/javascript">
</script>
<script src="/maisonnette/jquery_003.js" type="text/javascript">
</script>
<script src="/maisonnette/jquery.js" type="text/javascript">
</script>
<script src="/maisonnette/jquery_005.js" type="text/javascript">
</script>
<script src="/maisonnette/jquery_004.js" type="text/javascript">
</script>
<script src="/maisonnette/curvedLines.js" type="text/javascript">
</script>
<script src="/maisonnette/countUp.js" type="text/javascript">
</script>
<script type="text/javascript">
    /*
    $(document).ready(function () {
        //initialize the javascript
        App.init();
        App.dashboard();
    });
    $(document).ready(function () {
        App.livePreview();
    });
*/
</script>
<div class="ft_theme_switcher ocult">
    <div class="toggle">
        <i class="icon s7-settings">
        </i>
    </div>
    <div class="desc">
        <h3>Theme Switcher</h3>
        <p>Select a color scheme. You can create your own color theme with sass variables.</p>
    </div>
    <div class="style_list">
        <div class="style">
            <div class="colors">
                <div style="background: #2cc185;" class="color">
                </div>
                <div class="name"> Default</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=default">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #4db8ea;" class="color">
                </div>
                <div class="name">Blue Sky</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=blue-sky">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #fa6163;" class="color">
                </div>
                <div class="name">Passion</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=passion">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #fe8458;" class="color">
                </div>
                <div class="name">Little Fox</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=little-fox">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #FBAC4F;" class="color">
                </div>
                <div class="name">Orange Juice</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=orange-juice">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #f3818e;" class="color">
                </div>
                <div class="name">Pink Love</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=pink-love">
            </a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #9674c8;" class="color">
                </div>
                <div class="name">Night City</div>
            </div>
            <a href="http://foxythemes.net/preview/products/maisonnette/?theme=night-city">
            </a>
        </div>
    </div>
</div>

</body>
</html>
