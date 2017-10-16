@extends('layouts.app')

@section('content')




<div class="container" >
    <div class="row" >
        <div class="col-md-8 col-md-offset-2">
                    <div class="login-logo padlogin text-bold">

                        VENUE SITE MANAGER
                        <!-- @foreach (json_decode(\App\Setting::where('id','1')->get()) as $setting)
                   
                                <a href ="{{ url('homes') }}">
                                    <img alt="" src="banners/{{$setting->logo}}">
                                </a>
                          @endforeach -->
  </div>
            <div class="panel panel-default">

                <div class="panel-heading">  
    <p class="login-box-msg">Sign in to configure your restaurant</p>
</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-link">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="lockscreen-footer text-center">
    Copyright &copy; 2017 <b><a href="#" class="text-orange">FlStudio Restaurant Lite</a> by<a href="https://fluidstudiosltd.com" class="text-white"> Fluid Studios Ltd</a></b><br>
    All rights reserved<br>
   
  </div>
@endsection
