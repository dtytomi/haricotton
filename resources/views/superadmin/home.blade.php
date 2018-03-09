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

  <title>{{ config('app.name', 'Laravel') }} Super Admin</title>

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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Accounts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Notify</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Send SMS</a>
            </li>
            <li>
              <a href="cards.html">Send Email</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">View Payout Order</a>
            </li>
            <li>
              <a href="register.html">Approved Payout Order</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a ui-sref="createUser" ui-sref-active="active" href="">Create New User</a>
            </li>
            <li>
              <a href="#">Edit Users</a>
            </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInvt" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Customers</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseInvt">
            <li>
              <a href="#">View Customers</a>
            </li>
          </ul>
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
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
            
      <!-- View Change  -->
      <ui-view></ui-view>
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
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

    <!-- NG Route -->
    <script src="{{ URL::to('vendor/angular/angular-route.min.js') }}"></script>

    <!-- UI Router -->
    <script src="{{ URL::to('vendor/ui-router/angular-ui-router.min.js') }}"></script>

    <!-- all angular resources will be loaded from the /public folder -->    
    <script src="{{URL::to('js/app.module.js')}}"></script>
    <script src="{{URL::to('js/controllers/adminCtrl.js')}}"></script>
    <script src="{{URL::to('js/services/adminService.js')}}"></script>

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
