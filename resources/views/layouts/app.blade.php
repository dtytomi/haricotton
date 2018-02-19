<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 5 -->
    <script defer src="{{ URL::to('vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/base.css')}}">

</head>
<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top navbar-custom" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
              <li class="active">
                <a  href="{{ route('login') }}">Login</a>
              </li>
              <!-- Commented out Registration Link -->
              <!-- <li class="active">
                <a  href="{{ route('register') }}">Register</a>
              </li> -->
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{ Auth::user()->name }} <span class="caret">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">logout</a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </ul>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
  </div>

  <!-- jQuery -->
  <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ URL::to('vendor/wow.min.js') }}"></script>

  <!-- Picture Holder -->
  <script src="{{ URL::to('vendor/holder.js') }}"></script>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/register.js') }}"></script>

</body>
</html>
