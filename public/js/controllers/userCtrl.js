harricottonApp
  .directive('ngClickCopy', function (ngCopy) {
    // body...
    return {
      restrict: 'A',
      link: function ($scope, element, attrs) {
        element.bind('click', function (e) {
          ngCopy(attrs.ngClickCopy)
        })
      }
    }
  })

  .controller('profileCtrl', function userCtrl($scope, $stateParams, Profile, $location) {
    // body...

    // object to hold all the data for the new profile form
    $scope.profileData = {
      'acctName': '',
      'acctNumber': '',
      'phoneNumber': '',
      'address': '',
      'city': '',
      'state': '',
      'country': '',
      'bankName': ''
    };
    
    $scope.user = {  };

    var id;

    $scope.getId = function () {
      // body...
      Profile.get()
      .then(function(response) {
        // body...
        id = response.data.id;
        displayProfile(id);
      }, 
      function  (error) {
        // body...
        console.log(error);
      });
    };


    // get all the user first and bind it to the $scope.user object
    // use the function we created in our service
    // GET A Profile ==============
    displayProfile = function (id) {
      // body...
      $scope.id = id;

      Profile.show(id)
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
    // SAVE A User Profile ================
    $scope.submitProfile = function  () {
      
      id = $stateParams.id;
      
      // save the comment. pass in comment data from the form
      // use the function we created in our service
      Profile.save($scope.profileData, id)
          .then(function (response) {
            // body...
            id = response.data.id;
            Profile.show(id)
                .then(function (response) {
                  // body...
                  $scope.user = response.data;
                  $location.path('/home/profile');
                });
          }, function (error) {
            // body...
            console.log(error);
          })
    };

  })

  .controller('helpCtrl', function helpCtrl( $location, $scope, $stateParams, Help) {
    
    $scope.helps = {}

    var id;

    Help.get()
      .then(function(response) {
        // body...
        $scope.helps = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    $scope.findOne = function () {

      id = $stateParams.id;

      Help.show(id)
        .then(function(response) {
          // body...
          $scope.help = response.data;
        }, 
        function  (error) {
          // body...
          console.log(error);
        });   
    }
    
    $scope.submitHelp = function  () {

      console.log($scope.helpData);
      
      // save the comment. pass in comment data from the form
      // use the function we created in our service
      Help.save($scope.helpData)
        .then(function (response) {
          // body...
          Help.get()
            .then(function (response) {
              // body...
              // Clear filed after successfully submitted
              $scope.helpData.subject = '';
              $scope.helpData.message = '';

              $scope.helps = response.data;
            });
        }, function (error) {
          // body...
          console.log(error);
        });

      

    };

    $scope.deleteHelp = function (id) {

      Help.delete(id)
        .then(function(response) {
          // body...
          Help.get()
            .then(function (response) {
              // body...
              $scope.helps = response.data;
            });
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    }
  })

  .controller('investCtrl', 
    function investCtrl( $location, $scope, $stateParams, Invest, Profile, earningRateFilter) {
    
    $scope.subscriptions = {};

    $scope.data = {

      singleSelect: null,
      model: null,
      rate: null,
      availableOptions: [
        { id: 1, name: 'Weekly Earnings', value: 'weeklyEarnings'},
        { id: 2, name: 'Monthly Earnings', value: 'monthlyEarnings'}
      ]
    };

    var id;

    Invest.getSubscriptions()
      .then(function(response) {
        // body...
        $scope.subscriptions = response.data;   
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    Invest.get()
      .then(function(response) {
        // body...
        $scope.investments = response.data; 
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    $scope.makePayment = function () {

      $scope.paymentData
        = earningRateFilter('wtf', $scope.subscriptions, $scope.data.singleSelect);

      var subscriptionData = {
        'packageName': $scope.paymentData.name,
        'packageId': $scope.paymentData.id,
        'earningMethod': $scope.data.model,
        'amountPaid': $scope.paymentData.membershipFee
      };

      Invest.save(subscriptionData)
        .then(function (response) {
          // body...
          $location.path('/home');
        }, function (error) {
          // body...
          console.log(error);
        });
    };

  })
  
  .controller('referralCtrl', function ( $location, $scope, $stateParams, Referrals, Profile) {
    // body...
    Profile.get()
      .then(function(response) {
        // body...
        $scope.data = response.data;
      }, 
      function  (error) {
        // body...
        console.log(error);
      });

    $scope.urlLink = window.location.host + '/register' + '?ref=';

    Referrals.get()
      .then(function (response) {
        // 
        $scope.referrals = response.data;

      }, function (error) {
        
        console.log(error);
      });

  });