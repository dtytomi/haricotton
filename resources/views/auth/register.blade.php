@extends('layouts.app')
<!-- Styles -->
<link rel="stylesheet" href="{{URL::asset('css/register.css')}}"> 

@section('content')
<section class="register">
  <div class="overlay">
    <div class="container">

      <br /> <br />
      <br /> <br />
      <br /> <br />
      <br /> <br />

      <div class="card border-success col-6" style="margin-left: 25%;">
        <div class="card-header bg-transparent border-success">
          Register
          <a class="close" aria-label="Close" href="/login" role="button" data-toggle="tooltip" data-placement="top" title="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="card-body text-success">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name</label>

              <div class="col-md-7">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-7">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Password</label>

              <div class="col-md-7">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

              <div class="col-md-7">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Register
                </button>
              </div>
            </div>
          </form>
          <!-- Form Ended -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection