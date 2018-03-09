var harricottonApp = angular.module('harricottonApp', ['ngRoute', 'ui.router']);

// define our canstant for the API
harricottonApp.constant('constants', {
        API_URL: 'http://localhost:8000/api/'
    });

harricottonApp.config(function ($locationProvider, $stateProvider) {
  // body...
  $stateProvider
    .state({
      name: 'balance',
      url: '/home',
      templateUrl: './partials/home/balance.html'
    })

    .state ({
      name: 'referalls',
      url: '/home/referalls',
      template: '<h3>hello referral!</h3>'
    })

    .state ({
      name: 'profile',
      url: '/home/profile',
      templateUrl: '/partials/home/profile.html'
    })

    .state ({
      name: 'payout',
      url: '/home/payout',
      template: '<h3>hello payout!</h3>'
    })

    .state ({
      name: 'editProfile',
      url: '/home/{id}/editProfile',
      templateUrl: '/partials/home/edit.html'
    })

    .state ({
      name: 'help',
      url: '/home/help',
      templateUrl: '/partials/home/help.html'
    })

    .state ({
      name: 'showHelp',
      url: '/home/help/{id}',
      templateUrl: '/partials/home/show.help.html'
    })

    .state ({
      name: 'dashboard',
      url: '/superadmin',
      templateUrl: '/partials/superadmin/create.user.html'
    })

    .state ({
      name: 'createUser',
      url: '/superadmin/new',
      templateUrl: '/partials/superadmin/create.user.html'
    });

    $locationProvider.hashPrefix('');
    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });
})