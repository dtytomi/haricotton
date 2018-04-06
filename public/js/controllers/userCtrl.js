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

  .controller('profileCtrl', function userCtrl($scope, $http, $stateParams, Profile, $location) {
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

  .controller('helpCtrl', function helpCtrl( $location, $scope, $http, $stateParams, Help) {
    
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
      
      // save the comment. pass in comment data from the form
      // use the function we created in our service
      Help.save($scope.helpData)
          .then(function (response) {
            // body...
            Help.get()
              .then(function (response) {
                // body...
                $scope.helps = response.data;
              });
          }, function (error) {
            // body...
            console.log(error);
          })

      $scope.helpData.subject = '';
      $scope.helpData.message = '';

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
    function investCtrl( $location, $window, $scope, $stateParams, Invest, Profile) {
    
    $scope.subscriptions = {};

    $scope.data = {

      singleSelect: null,
      model: null,
      availableOptions: [
        { id: 1, name: 'Weekly Earnings', value: 'Weekly Earnings'},
        { id: 2, name: 'Monthly Earnings', value: 'Monthly Earnings'}
      ],
      items: [
        { name: 'Bank Teller', value: 'option1'},
        { name: 'Bank Transfer', value: 'option2'}
      ]
    };

    $scope.showHints = "Hints";

    $scope.selection = $scope.data.items[0].value;

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

    $scope.back = function () {
      window.location.href = "/home";
    }; 
    
    $scope.createInvestment = function  () {
      
      $window.location.href = "/pay?" + 'Earnings=' + $scope.data.model 
          + '&Amount=' + $scope.data.singleSelect;

    };

    $scope.findOne = function () {
      
       console.log($scope.selection);

      $scope.params = $location.search();

      var keepGoing = true;

      Profile.get()
        .then(function(response) {
          // body...
          $scope.user = response.data;
          
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
          
      Invest.getSubscriptions()
        .then(function(response) {
          // body...
          $scope.subscriptions = response.data;

      
          angular
            .forEach($scope.subscriptions, function(value, key) {
              $scope.subscription = value;

              if ($scope.subscription.membershipFee == $scope.params.Amount) { 
                  $scope.data = angular.copy($scope.subscription);
              }
            });   

        }, 
        function  (error) {
          // body...
          console.log(error);
        });  


      function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
          var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
          return v.toString(16);
        });
      }
        
      //Unique transaction reference or order number
      $scope.reference = uuidv4();

      //The customer's email address.
      // $scope.email = $scope.user.email;

      //Amount you want to bill the customer
      $scope.amount = $scope.params.Amount * 100;

      //Metadata is optional
      $scope.metadata = {
          custom_fields: [
              {
                  display_name: "Mobile Number",
                  variable_name: "mobile_number",
                  value: "+2348079273097"
              }
          ]
      };

    };
    // FindOne ends here

    //Javascript function that is called when the payment is successful
    $scope.callback = function (response) {
        
        $scope.makePayment();
    };

    //Javascript function that is called if the customer closes the payment window
    $scope.close = function () {
        console.log("Payment closed");
    };

    //Javascript function that is called before payment dialog is opened
    $scope.beforePopUp = function () {
        console.log("Now we can perform some task before opening the payment dialog");
        return true;
    };

    $scope.makePayment = function () {

      console.log($scope.selection);
      
      $scope.amount = 
      $scope.selection ==  'option1' ? $scope.amountPaid : $scope.data.membershipFee;

      $scope.modeOfPayment = 
      $scope.selection == 'option1' ? 'Bank Teller' : 'Online Banking';

      var subscriptionData = {
        'packageName': $scope.data.name,
        'packageId': $scope.data.id,
        'amountPaid': $scope.amount,
        'earningMethod': $scope.params.Earnings,
        'investmentPaid': $scope.data.membershipFee,
        'modeOfPayment': $scope.modeOfPayment
      };

      Invest.save(subscriptionData)
        .then(function (response) {
          // body...
          $window.location.href = "/home"
        }, function (error) {
          // body...
          console.log(error);
        });
    };

  })
  
  .controller('referralCtrl', function ( $location, $scope, $stateParams, Invest, Profile) {
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

  });