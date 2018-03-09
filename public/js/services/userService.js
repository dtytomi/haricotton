harricottonApp
  .factory('Profile', function ($http, constants) {
    // body...
    return {

      // get user's attribute
      get: function() {
        // body...
        return $http.get(constants.API_URL + 'profile/');
      },

      // get user's attribute
      show: function(id) {
        // body...
        return $http.get(constants.API_URL + 'profile/' + id);
      },

      save: function(profileData, id) {
        // body...
        return $http({
          method: 'PATCH',
          url: constants.API_URL + 'profile/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(profileData)
        });
      },

    }
  })

  .factory('Help', function ($http, constants) {
    return {
      get: function() {
        // body...
        return $http.get(constants.API_URL + 'helps/');
      },

      save: function(helpData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'helps/',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(helpData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(constants.API_URL + 'helps/' + id);
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( constants.API_URL + 'helps/' + id);
      }

    }
  });