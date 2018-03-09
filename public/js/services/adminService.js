harricottonApp
  .factory('Roles', function ($http, constants) {
    return {

      // get user's attribute
      get: function() {
        // body...
        return $http.get(constants.API_URL + 'roles/');
      }

    }
  })

  .factory('UsersManagement', function ($http, constants) {
    return {

      get: function() {
        // body...
        return $http.get(constants.API_URL + 'users/');
      },

      save: function(helpData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'users/',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(helpData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(constants.API_URL + 'users/' + id);
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( constants.API_URL + 'users/' + id);
      }
    }
  });