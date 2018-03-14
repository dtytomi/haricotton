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
  .controller('UserManagementCtrl', function UserManagementCtrl ($scope, $http, Roles, UsersManagement, $location) {
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

        console.log($scope.users);
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
            $route.reload();
          }, 
          function  (error) {
            // body...
            console.log(error);
          });
      }

  });