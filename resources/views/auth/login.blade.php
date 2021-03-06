@extends('layouts.app')
<!-- Styles -->
<link rel="stylesheet" href="{{URL::asset('css/login.css')}}">   

@section('content')
<section >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7 bg-primary component1">
        <div class="overlay">
          <div class="container login">
            <h1 class="text-center">Haricotton Investment Club</h1>
            <p>
              The Club is a platform of placement of capital in expectation of delivery income.
              <br /> Join us
            </p>
            <a href="{{ route('register') }}" class="btn btn-outline-light" role="button">Register</a>
            <div style="margin-top: 34%"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 component2">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="text-center">Login</h3>
            <p >Provide your login credentials</p>

            <!-- Form -->
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-sm-8 col-sm-offset-1">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" 
                    placeholder="E-Mail Address" required autofocus>
                  @if ($errors->has('email'))
                    <span class="help-block text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-sm-8 col-sm-offset-1">
                  <input id="password" type="password" class="form-control" name="password" required 
                    placeholder="Password">

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-4  col-sm-offset-1">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                </div>
                <div >
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                  </a>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 ">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>
                </div>
              </div>

            </form>
            <!-- Form -->
          </div>
          <!-- Panel Body -->
        </div>
        <!-- Panel -->
      </div>
      <!-- Col 2 -->
    </div>
  </div>
</section>
@endsection
