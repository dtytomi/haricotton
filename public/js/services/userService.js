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
  })
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
  })

  .factory('Invest', function ($http, constants) {
    return {

      getSubscriptions: function() {
        // body...
        return $http.get(constants.API_URL + 'subscriptions/');
      },

      get: function() {
        // body...
        return $http.get(constants.API_URL + 'investments/');
      },

      save: function(investData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'investments',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(investData)
        });
      },

      pay: function(paymentData) {
        // body...
        return $http({
          method: 'POST',
          url: constants.API_URL + 'pay',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          data: $.param(paymentData)
        });
      }

    }
  });