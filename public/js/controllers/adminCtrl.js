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
  .controller('UserManagementCtrl', function UserManagementCtrl ($scope, $http, Roles, UsersManagement) {
    // body...
    $scope.roles = {};
    $scope.users = {};
    $scope.user = {};
    $scope.userData = {};

    UsersManagement.get()
      .then(function(response) {
        // body...
        $scope.users = response.data;
        
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
        UsersManagement.save($scope.profileData, id)
            .then(function (response) {
              // body...
              id = response.data.id;
              UsersManagement.show(id)
                  .then(function (response) {
                    // body...
                    $scope.users = response.data;
                    $location.path('/home/profile');
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