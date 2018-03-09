harricottonApp
<<<<<<< HEAD
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
          $route.reload();
        }, 
        function  (error) {
          // body...
          console.log(error);
        });
    }

=======
  .controller('userCtrl', function userCtrl($scope) {
    // body...
    
>>>>>>> fc40ebd6c823d4f072333df732ef7c35aa38f630
  });