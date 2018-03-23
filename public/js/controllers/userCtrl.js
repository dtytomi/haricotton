harricottonApp
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

  .controller('investCtrl', function investCtrl( $location, $window, $scope, $http, $stateParams, Invest) {
    
    $scope.subscriptions = {};

    $scope.data = {

      singleSelect: null,
      model: null,
      availableOptions: [
        { name: 'Daily Earnings', value: 'dailyEarnings'},
        { name: 'Weekly Earnings', value: 'weeklyEarnings'},
        { name: 'Monthly Earnings', value: 'monthlyEarnings'},
        { name: 'Annual Earnings', value: 'annualEarnings'}
      ]
    };

    $scope.items = ['option1', 'option2'];

    $scope.selection = $scope.items[0];

    $scope.date = new Date();

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

    $scope.findOne = function () {

      id = $stateParams.id;

      Invest.show(id)
        .then(function(response) {
          // body...
          $scope.help = response.data;
        }, 
        function  (error) {
          // body...
          console.log(error);
        });   
    }
    
    $scope.createInvestment = function  () {
      
      // save the comment. pass in comment data from the form
      // use the function we created in our service
      // Invest.save($scope.data)
      //   .then(function (response) {
      //     // body...
      //     $location.path('/pay');
      //   }, function (error) {
      //     // body...
      //     console.log(error);
      //   });

      window.location = "/pay";

    };

    $scope.deleteHelp = function (id) {

      Invest.delete(id)
        .then(function(response) {
          // body...
          Invest.get()
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
  
  .directive('myDatePicker', function () {
      return {
        restrict: 'A',
        require: '?ngModel',
        link: function (scope, element, attrs, ngModelController) {
            
          //private variables
          var datepickerFormat  = 'm/d/yyyy',
              momentFormat = 'M/D/YYYY',
              datepicker,
              elPicker;

          // Init date picker and get object http://bootstrap-datepicker.readthedocs.org/en/release/index.html
          datepicker = element.datepicker({
            autoclose: true,
            keyboardNavigation: flase,
            todayHighlight: true,
            format: datepickerFormat
          });

          elPicker = datepicker.data('datepicker').picker;

          //Adjust offset on show
          datepicker.on('show', function (evt) {
            elPicker.css('left', parseInt(elPicker.css('left')) + +attrs.offsetX);
            elPicker.css('top', parseInt(elPicker.css('top')) + +attrs.offsetY);
          });

          // Only watch and format if ng-model is present https://docs.angularjs.org/api/ng/type/ngModel.NgModelController
          if (ngModelController) {

            // So we can maintain time
            var lastModelValueMoment;

            ngModelController.$formatters.push(function (modelValue) {
                //
                // Date -> String
                //

                // Get view value (String) from model value (Date)
                var viewValue;
                    m = moment(modelValue);

                if (modelValue && m.isValid()) {
                  // Valid date obj in model
                  lastModelValueMoment = m.clone(); // Save date (so we can restore time later)
                  viewValue = m.format(momentFormat);
                } else {
                  // Invalid date obj in model
                  lastModelValueMoment = undefined;
                  viewValue = undefined;
                }

                // Update picker
                element.datepicker('Update', viewValue);

                // Update picker
                return viewValue
            });

             ngModelController.$parsers.push(function (viewValue) {
                //
                // Date -> String
                //

                // Get view value (String) from model value (Date)
                var modelValue;
                    m = moment(viewValue, momentFormat, true);

                if (viewValue && m.isValid()) {
                  // Valid date string in view
                  lastModelValueMoment = m.clone(); // Save date (so we can restore time later)
                  viewValue = m.format(momentFormat);
                } else {
                  // Invalid date obj in model
                  lastModelValueMoment = undefined;
                  viewValue = undefined;
                }

                // Update picker
                element.datepicker('Update', viewValue);

                // Update picker
                return viewValue
            });

          };

        }
      }
  });