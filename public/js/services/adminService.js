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

      save: function(userData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'users/',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(userData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(constants.API_URL + 'users/' + id);
      },

      update: function(userData, id) {
        // body...
        return $http({
          method: 'PUT',
          url: constants.API_URL + 'users/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(profileData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( constants.API_URL + 'users/' + id);
      }
    }
  })

  .factory('SubscriptionManagement', function ($http, constants) {
    return {

      get: function() {
        // body...
        return $http.get(constants.API_URL + 'subscriptions/');
      },

      save: function(subscriptionData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'subscriptions/',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(subscriptionData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(constants.API_URL + 'subscriptions/' + id);
      },

      update: function(subscriptionData, id) {
        // body...
        return $http({
          method: 'PATCH',
          url: constants.API_URL + 'subscriptions/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(subscriptionData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( constants.API_URL + 'subscriptions/' + id);
      }
    }
  });