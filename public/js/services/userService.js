harricottonApp
  .service('ngCopy', function ($window) {
      
    var body = angular.element($window.document.body);
    var textarea = angular.element('<textarea/>');
    textarea.css({
      position: 'fixed',
      opacity: 0
    });

    return function (toCopy) {
      // body...
      textarea.val(toCopy);
      body.append(textarea);
      textarea[0].select();

      try {
        var successful = document.execCommand('copy');
        if (!successful) throw successful;

      } catch(err) {
          window.prompt("Copy to clipboard: Ctrl+C, Enter", toCopy);
      }

      textarea.remove();

    }
  });

harricottonApp
  .factory('Profile', function ($http, Origin) {
    // body...
    return {

      // get user's attribute
      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/profile/');
      },

      // get user's attribute
      show: function(id) {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/profile/' + id);
      },

      save: function(profileData, id) {
        // body...
        return $http({
          method: 'PATCH',
          url: Origin.crossOrigin() + '/api/profile/' + id,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(profileData)
        });
      },

    }
  })

  .factory('Help', function ($http, Origin) {
    return {
      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/helps/');
      },

      save: function(helpData) {
        // body...
        return $http({
          method: 'POST',
          url: Origin.crossOrigin() + '/api/helps',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(helpData)
        });
      },

      show: function(id) {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/helps/' + id);
      },

      // destroy a comment
      delete : function(id) {
          return $http.delete( Origin.crossOrigin() + '/api/helps/' + id);
      }

    }
  })

  .factory('Invest', function ($http, Origin) {
    return {

      getSubscriptions: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/subscriptions/');
      },

      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/investments/');
      },

      save: function(investData) {
        // body...
        return $http({
          method: 'POST',
          url: Origin.crossOrigin() + '/api/investments',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(investData)
        });
      }

    }
  })

  .factory('Referrals', function ($http, Origin) {
    return {
      get: function() {
        // body...
        return $http.get(Origin.crossOrigin() + '/api/referrals/');
      } 
    }
  });

harricottonApp
  .filter('earningRate', function() {
    return function(input, subscriptions, selected) {
      
        var data;
         angular
          .forEach(subscriptions, function(key, value) {
            var subscription = key;
            
            if (subscription.membershipFee == selected) { 
                if (subscription.hasOwnProperty(input)) {
                   data = angular.copy(subscription[input]);
                } else 
                  if (input == 'wtf') {
                    
                     data = angular.copy(subscription); 
                }
            }
          }); 

      return data;
    };
  });