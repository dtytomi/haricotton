var harricottonApp = 
  angular.module('harricottonApp', ['ngRoute', 'ui.router', 'ngMaterial', 'paystack'],
      function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
      });

harricottonApp
  .service('Origin', function() {
    this.crossOrigin = function () {

      if (!window.location.origin) {
        window.location.origin = 
          window.location.protocol + "//" 
           + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
      }

      return window.location.origin;
    }
  });

harricottonApp
  .config(function ($locationProvider, $stateProvider, $paystackProvider) {
    // body...
    $paystackProvider.configure({
        key: 'pk_test_b82b8dd9186f165444835135f25a77d2a2fd1fe5'
    });
    
    $stateProvider
      .state({
        name: 'balance',
        url: '/home',
        templateUrl: '/partials/home/balance.html'
      })

      .state({
        name: 'payment',
        url: '/home/payment',
        templateUrl: '/partials/home/payment.html'
      })

      .state ({
        name: 'referalls',
        url: '/home/referalls',
        templateUrl: '/partials/home/referral.html'
      })

      .state ({
        name: 'profile',
        url: '/home/profile',
        templateUrl: '/partials/home/profile.html'
      })

      .state ({
        name: 'editProfile',
        url: '/home/{id}/editProfile',
        templateUrl: '../partials/home/edit.profile.html'
      })

      .state ({
        name: 'help',
        url: '/home/help',
        templateUrl: '/partials/home/help.html'
      })

      .state ({
        name: 'showHelp',
        url: '/home/help/{id}',
        templateUrl: '../partials/home/show.help.html'
      })

      .state ({
        name: 'dashboard',
        url: '/superadmin',
        templateUrl: '/partials/superadmin/investors.html'
      })

      .state ({
        name: 'listUsers',
        url: '/superadmin/users',
        templateUrl: '/partials/superadmin/list.users.html'
      })

      .state ({
        name: 'createUser',
        url: '/superadmin/new',
        templateUrl: '/partials/superadmin/create.user.html'
      })

      .state ({
        name: 'subscription',
        url: '/superadmin/subscription',
        templateUrl: '/partials/superadmin/subscription.html'
      })

      .state ({
        name: 'editSubscription',
        url: '/superadmin/subscription/{id}',
        templateUrl: '/partials/superadmin/edit.subscription.html'
      })

      .state ({
        name: 'editUserInvestment',
        url: '/superadmin/investors/{id}',
        templateUrl: '/partials/superadmin/edit.user.investment.html'
      })

      .state ({
        name: 'orders',
        url: '/superadmin/orders',
        templateUrl: '/partials/superadmin/orders.html'
      })

      .state ({
        name: 'payout',
        url: '/superadmin/payout',
        templateUrl: '/partials/superadmin/payout.html'
      })

      .state ({
        name: 'editOrder',
        url: '/superadmin/order/{id}',
        templateUrl: '/partials/superadmin/edit.order.html'
      });

    $locationProvider.hashPrefix('');
    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });

  });
