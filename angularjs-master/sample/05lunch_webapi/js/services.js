var storesServices = angular.module('storesServices', ['ngResource']);

storesServices.factory('Store', ['$resource',
  function($resource){
    return $resource('yelp_api.php', {}, {
      get: {method:'GET', params:{}, isArray:true},
    });
  }]);