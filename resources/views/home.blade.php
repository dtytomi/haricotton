<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="harricottonApp">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">

  <!-- Fontawesome -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/font-awesome/css/font-awesome.min.css')}}">

  <!-- Fontawesome 5 -->
  <script defer src="{{ URL::to('vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>
   
  <!-- Custom styles for this template-->
  <link href="{{URL::asset('css/sb-admin.css')}}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Disabled">
            <a class="nav-link disabled" ui-sref="balance" ui-sref-active="active">
              <span class="nav-link-text"></span>  
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Disabled">
            <a class="nav-link" ui-sref="balance" ui-sref-active="active">
              <i class="fas fa-fw fa-balance-scale"></i>
              <span class="nav-link-text">Investment</span>  
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" ui-sref="referalls" ui-sref-active="active">
              <i class="fas fa-fw fa-sitemap"></i>
              <span class="nav-link-text">Referrals</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" ui-sref="profile" ui-sref-active="active">
              <i class="fas fa-fw fa-user"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" ui-sref="help" ui-sref-active="active">
              <i class="fas fa-fw fa-handshake"></i>
              <span class="nav-link-text">Need Help</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link disabled" href="#">
              Cleint Code: {{ "12344567" }}
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">View all alerts</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}" 
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
              <i class="fa fa-fw fa-sign-out-alt"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- View Change  -->
      <ui-view></ui-view>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="fixed-bottom">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
            
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Core plugin JavaScript-->
    <script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- ANGULAR -->
    <script src="{{ URL::to('vendor/angular/angular.min.js') }}"></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="{{ URL::to('vendor/angular/angular-animate.min.js') }}"></script>
    <script src="{{ URL::to('vendor/angular/angular-aria.min.js') }}"></script>
    <script src="{{ URL::to('vendor/angular/angular-messages.min.js') }}"></script>

    <!-- Angular Material Library -->
    <script src="{{ URL::to('vendor/material/angular-material.min.js') }}"></script>

    <!-- Angular Paystack Library -->
    <script src="{{ URL::to('vendor/paystack/angular-paystack.min.js') }}"></script>

    <!-- NG Route -->
    <script src="{{ URL::to('vendor/angular/angular-route.min.js') }}"></script>

    <!-- UI Router -->
    <script src="{{ URL::to('vendor/ui-router/angular-ui-router.min.js') }}"></script>

    <!-- all angular resources will be loaded from the /public folder -->    
    <script src="{{URL::to('js/app.module.js')}}"></script>
    <script src="{{URL::to('js/controllers/userCtrl.js')}}"></script>
    <script src="{{URL::to('js/services/userService.js')}}"></script>

    <script type="text/javascript">
      window.FontAwesomeConfig = {
        searchPseudoElements: true,
      }
    </script>

    <!-- Picture Holder -->
    <script src="{{ URL::to('vendor/holder.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::to('js/sb-admin.min.js') }}"></script>
    
    
  </div>
</body>

</html>
