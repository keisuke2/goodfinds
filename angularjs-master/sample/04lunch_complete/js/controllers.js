var storesControllers = angular.module('storesControllers', []);

storesControllers.controller('StoreListCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $http.get('stores/stores.json').success(function(data) {
      $scope.stores = data;
    });

    $scope.orderProp = 'id';
  }]);


storesControllers.controller('StoreDetailCtrl', ['$scope', '$routeParams', '$http',
  function($scope, $routeParams, $http) {
    $http.get('stores/' + $routeParams.storeId + '.json').success(function(data) {
      $scope.store = data;
     });
  }]);