harricottonApp
  .directive('validPasswordC', function () {
    return {
      require: 'ngModel',
      scope: {
        reference: '=validPasswordC'
      },

      link: function (scope, elm, attr, ctrl) {
        ctrl.$parsers.unshift(function  (viewValue, $scope) {
          
          var noMatch = viewValue != scope.reference;
          ctrl.$setValidity('noMatch', !noMatch);
          return (noMatch) ? noMatch : !noMatch;
        });

        scope.$watch('reference', function (value) {
          ctrl.$setValidity('noMatch', value === ctrl.$viewValue);
        });

      }
    }
  });

harricottonApp
  .controller('UserManagementCtrl', function UserManagementCtrl ($scope, Roles, UsersManagement, $location) {
    // body...
    $scope.roles = {};
    $scope.users = {};
    $scope.user = {};
    
    // object to hold all the data for the new user form
    $scope.userData = {};

    UsersManagement.get()
      .then(function(response) {
        // body...
        $scope.userManagementdata = response.data;

        $scope.users = $scope.userManagementdata.pop();
        $scope.roles = $scope.userManagementdata.pop();
        
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

      $scope.findOne = function () {

        id = $stateParams.id;

        UsersManagement.show(id)
          .then(function(response) {
            // body...
            $scope.user = response.data;
          }, 
          function  (error) {
            // body...
            console.log(error);
          });   
      }

      // function to handle submitting the form
      // CREATE A User ================
      $scope.createUser = function  () {
        
        // save the user. pass in user data from the form
        // use the function we created in our service
        UsersManagement.save($scope.userData)
            .then(function (response) {
              // body...
              UsersManagement.get()
                .then(function (response) {
                  // body...
                  $scope.userManagementdata = response.data;

                  $scope.users = $scope.userManagementdata.pop();
                  $scope.roles = $scope.userManagementdata.pop();

                  $location.path('/superadmin/users');
                });
            }, function (error) {
              // body...
              console.log(error);
            })
      };

      $scope.deleteUser = function (id) {

        UsersManagement.delete(id)
          .then(function(response) {
            // body...
            UsersManagement.get()
              .then(function (response) {
                // body...
                $scope.userManagementdata = response.data;

                $scope.users = $scope.userManagementdata.pop();
                $scope.roles = $scope.userManagementdata.pop();

              });
          }, 
          function  (error) {
            // body...
            console.log(error);
          });
      }

  })
  .controller('SubscriptionCtrl', function SubscriptionCtrl ($scope, SubscriptionManagement, $location, $stateParams) {
    // body...
    $scope.subscriptions = {};
    
    // object to hold all the data for the new user form
    $scope.subscriptionData = {};

    SubscriptionManagement.get()
      .then(function(response) {
        // body...
        $scope.subscriptions = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

      $scope.findOne = function () {

        id = $stateParams.id;

        SubscriptionManagement.show(id)
          .then(function(response) {
            // body...
            $scope.subscription = response.data;
          }, 
          function  (error) {
            // body...
            console.log(error);
          });   
      }

      $scope.updateSubscription = function () {

        id = $stateParams.id;

        SubscriptionManagement.update($scope.subscription, id)
          .then(function(response) {
            // body...
            SubscriptionManagement.get()
              .then(function (response) {
                // body...
                $scope.subscriptions = response.data;

              });

            $location.path('/superadmin/subscription');
          }, 
          function  (error) {
            // body...
            console.log(error);
          });   
      }

      // function to handle submitting the form
      // CREATE A User ================
      $scope.createSubscription = function  () {

        // save the user. pass in user data from the form
        // use the function we created in our service
        SubscriptionManagement.save($scope.subscriptionData)
            .then(function (response) {
              // body...
              SubscriptionManagement.get()
                .then(function (response) {
                  // body...
                  $scope.subscriptions = response.data;

                });
            }, function (error) {
              // body...
              console.log(error);
            });

          $scope.subscriptionData = { };
      };

      $scope.deleteSubscription = function (id) {

        SubscriptionManagement.delete(id)
          .then(function(response) {
            // body...
            SubscriptionManagement.get()
              .then(function (response) {
                // body...
                $scope.subscriptions = response.data;

              });
          }, 
          function  (error) {
            // body...
            console.log(error);
          });
      }

  })

  .controller('InvestmentManagementCtrl', function ($scope, InvestmentManagement, $location, $stateParams) {

    $scope.users = { };

    InvestmentManagement.get()
      .then(function(response) {
        // body...
        $scope.investors = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    $scope.findOne = function () {
      
      var id = $stateParams.id;

      InvestmentManagement.show(id)
        .then(function(response) {
          // body...
          $scope.investment = response.data;
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    } 

    $scope.updateInvestment = function () {
      
      id = $stateParams.id;

      var investmentData = {
        'amountPaid': $scope.investment.amountPaid,
        'status': $scope.investment.status
      };

      InvestmentManagement.update(investmentData, id)
        .then(function(response) {
          // body...
          InvestmentManagement.get()
            .then(function (response) {
              // body...
              $scope.investors = response.data;
              $location.path('/superadmin');
            });          
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    } 

    $scope.deleteInvestment = function (id) {

      InvestmentManagement.delete(id)
        .then(function(response) {
          // body...
          InvestmentManagement.get()
            .then(function (response) {
              // body...
              $scope.investors = response.data;
            });
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    }

  })
  
  .controller('OrdersCtrl', function ($location, $scope, $stateParams, Order) {
      
    Order.get() 
      .then(function(response) {
        // body...
        $scope.orders = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    $scope.findOne = function () {
      
      var id = $stateParams.id;

      Order.show(id)
        .then(function(response) {
          // body...
          $scope.order = response.data;
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    } 

    $scope.updateOrder = function () {
      
      id = $stateParams.id;

      var investmentData = {
        'balance': $scope.order.balance,
        'payout': $scope.order.payout,
        'status': $scope.order.status
      };

      Order.update(investmentData, id)
        .then(function(response) {
          // body...
          Order.get()
            .then(function (response) {
              // body...
              $scope.orders = response.data;
              $location.path('/superadmin/orders');
            });          
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    } 

    $scope.deleteOrder = function (id) {

      Order.delete(id)
        .then(function(response) {
          // body...
          Order.get()
            .then(function (response) {
              // body...
              $scope.orders = response.data;
            });
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    }

  })

  .controller('PayoutCtrl', function ($location, $scope, $stateParams, Payout) {
    Payout.get() 
      .then(function(response) {
        // body...
        $scope.payouts = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });
  });