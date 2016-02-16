'use strict';

/* App Module */

var storesApp = angular.module('storesApp', [
  'ngRoute',
  'storesControllers',
  'storesServices'
]);


storesApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/stores', {
        templateUrl: 'partials/store-list.html',
        controller: 'StoreListCtrl'
      }).
      when('/stores/:place', {
        templateUrl: 'partials/store-list.html',
        controller: 'StoreListCtrl'
      }).
      when('/stores/detail/:storeId', {
        templateUrl: 'partials/store-detail.html',
        controller: 'StoreDetailCtrl'
      }).
      otherwise({
        redirectTo: '/stores'
      });
  }]);
