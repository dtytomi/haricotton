harricottonApp
  .factory('Roles', function ($http, Origin) {
    return {

      // get user's attribute
      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/roles/');
      }

    }
  })

  .factory('UsersManagement', function ($http, Origin) {
    return {

      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/users/');
      },

      save: function(userData) {
        // body...
        return $http({
          method: 'POST',
          url: Origin.crossOrigin() + '/api/users',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(userData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/users/' + id);
      },

      update: function(userData, id) {
        // body...
        return $http({
          method: 'PUT',
          url: Origin.crossOrigin() + '/api/users/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(profileData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( Origin.crossOrigin() + '/api/users/' + id);
      }
    }
  })

  .factory('SubscriptionManagement', function ($http, Origin) {
    return {

      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/subscriptions/');
      },

      save: function(subscriptionData) {
        // body...
        return $http({
          method: 'POST',
          url: Origin.crossOrigin() + '/api/subscriptions',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(subscriptionData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/subscriptions/' + id);
      },

      update: function(subscriptionData, id) {
        // body...
        return $http({
          method: 'PATCH',
          url: Origin.crossOrigin() + '/api/subscriptions/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(subscriptionData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( Origin.crossOrigin() + '/api/subscriptions/' + id);
      }
    }
  })
  
  .factory('InvestmentManagement', function ($http, Origin) {
    return {

      get: function() {
        
        return $http.get(Origin.crossOrigin() + '/api/investors/');
      },

      show: function(id) {
        
        return $http.get(Origin.crossOrigin() + '/api/investors/' + id);
      },

      update: function(investmentData, id) {
        
        return $http({
          method: 'PATCH',
          url: Origin.crossOrigin() + '/api/investors/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(investmentData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( Origin.crossOrigin() + '/api/investors/' + id);
      }

    }
  })

  .factory('Order', function ($http, Origin) {
    return {
      get: function() {
        
        return $http.get(Origin.crossOrigin() + '/api/orders/');
      },

      show: function(id) {
        
        return $http.get(Origin.crossOrigin() + '/api/orders/' + id);
      },

      update: function(investmentData, id) {
        
        return $http({
          method: 'PATCH',
          url: Origin.crossOrigin() + '/api/orders/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(investmentData)
        });
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( Origin.crossOrigin() + '/api/orders/' + id);
      }

    }
  })

  .factory('Payout', function ($http, Origin) {
    return {
      get: function() {
        
        return $http.get(Origin.crossOrigin() + '/api/payouts/');
      },

      show: function(id) {
        
        return $http.get(Origin.crossOrigin() + '/api/payouts/' + id);
      },
    }
  });