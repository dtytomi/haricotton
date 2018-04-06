<!doctype html>
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

  <!-- Angular Material style sheet -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/material/angular-material.min.css')}}">

  <!-- Fontawesome -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/font-awesome/css/font-awesome.min.css')}}">

  <!-- Fontawesome 5 -->
  <script defer src="{{ URL::to('vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js') }}"></script>
   
  <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('css/pay.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="bg-primary" ng-controller="investCtrl">
  
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ml-auto">
            @auth
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/home') }}" >Home</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="#about" role="button" aria-pressed="true">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" role="button" aria-pressed="true">Login</a>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    <section class="pay" data-ng-init="findOne()">
      <div class="pay-intro">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="card rounded-0 bg-gem">
                <div class="card-body">
                  <h6 class="card-title">OPTION 1: YOUR ORDER</h6>
                  <br />
                  <h5><% data.name %></h5>
                  <h6>Earning Rates / Period</h6>
                  <ul class="list-unstyled">
                    <ul class="list-inline">
                      <li class="list-inline-item">Daily Earnings:</li>
                      <li class="list-inline-item">₦<%data.dailyEarnings%></li>
                    </ul>
                    <ul class="list-inline">
                      <li class="list-inline-item">Weekly Earnings:</li>
                      <li class="list-inline-item">₦<%data.weeklyEarnings%></li>
                    </ul>
                    <ul class="list-inline">
                      <li class="list-inline-item">Monthly Earnings:</li>
                      <li class="list-inline-item">₦<%data.monthlyEarnings%></li>
                    </ul>
                    <ul class="list-inline">
                      <li class="list-inline-item">Annual Earnings:</li>
                      <li class="list-inline-item">₦<%data.annualEarnings%></li>
                    </ul>
                  </ul>
                  <h4>₦<%data.membershipFee%></h4>
                  <br />
                  <small>
                    <ul class="list-inline">
                      <li class="list-inline-item">Referral Earnings:</li>
                      <li class="list-inline-item">₦<%data.referralEarnings%></li>
                    </ul>
                  </small>
                  <div style="margin-top: 6%">
                    <small>
                      <a href="" class="text-white" ng-click="back()"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    </small>
                    <paystack-pay-button
                            class="btn btn-info btn-sm"
                            email="user.email"
                            amount="amount"
                            reference="reference"
                            metadata="metadata"
                            callback="callback"
                            beforepopup="beforePopUp"
                            close="close"
                            style="margin-left: 20%; padding: 3px 34px;">
                    </paystack-pay-button>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card rounded-0 bg-smoke">
                <div class="card-body">
                  <h6 class="card-title">OPTION 2: BANKING HALL</h6>
                  <br />
                  <h5>PAYMENT INFORMATION</h5>
                  <h6>Bank Payment</h6>
                
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"  ng-model="selection" value="option1" checked>
                      Bank Teller
                    </label>
                  </div>
                  <div class="form-check form-check-inline float-right  ">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"  ng-model="selection" value="option2">
                      Bank Transfer
                    </label>
                  </div>
                  <div style="margin-top: -1.5%"></div>
                  <br />
                  <div class="animate-switch-container" ng-switch on="selection">
                    <form role="form" ng-switch-when="option1" name="btnForm" ng-submit="makePayment()" novalidate>
                      <div class="form-row">
                        <div class="form-group col">
                          <md-input-container class="md-block" flex-gt-sm>
                            <label>Amount ₦:</label>
                            <input ng-model="amountPaid">
                          </md-input-container>
                        </div>

                        <div class="form-group col">
                          <md-input-container>
                            <label>Enter date</label>
                            <md-datepicker ng-model="user.submissionDate"></md-datepicker>
                          </md-input-container>
                        </div>
                      </div>
                      
                      
                      <small>
                        <a href="" class="text-muted" ng-click="back()"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                      </small>
                      <button type="submit" class="btn btn-secondary btn-sm" style="margin-left: 20%; padding: 3px 25px;">Confirm Payment</button>
                    
                    </form>

                    <form ng-switch-when="option2">
                      <br /> 
                      <dl class="row">
                        <dt class="col-sm-3">Bank:</dt>
                        <dd class="col-sm-9">Stanbic IBTC</dd>

                        <dt class="col-sm-4">Account No:</dt>
                        <dd class="col-sm-8">
                          0024759981
                        </dd>

                        <dt class="col-sm-4">Account Name:</dt>
                        <dd class="col-sm-8">Haricotton Nigeria Limited.</dd>
                      </dl>

                      <div style="margin-top: -1%"></div>
                      
                      <br /> <br />
                      <br /> 
                      <div>
                        <small>
                          <a href="" class="text-muted" ng-click="back()"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                        </small>
                        <button type="button" class="btn btn-secondary btn-sm" style="margin-left: 20%; padding: 3px 25px;" disabled>Confirm Payment</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

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
    
</body>

</html>
