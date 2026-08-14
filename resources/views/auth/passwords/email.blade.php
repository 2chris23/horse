@extends('backend.layouts.fakelanding')

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        {!! trans('users.resetpassword') !!}
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('olvidopost') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">
                                    {!! trans('users.emailwithregister') !!}
                                </label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-4 col-xs-12">
                                    <button type="submit" class="btn btn-success">
                                        {!! trans('users.sendresetlink') !!}
                                    </button>
                                </div>

                                <div class="col-md-1 col-xs-12">
                                    <a href="{!! route('landinghome') !!}" class="btn btn-success">
                                        {!! trans('users.return') !!}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
