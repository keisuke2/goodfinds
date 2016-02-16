var storesControllers = angular.module('storesControllers', []);


storesControllers.controller('StoreListCtrl', ['$scope', '$routeParams', 'Store',
  function ($scope, $routeParams ,Store) {
    $scope.stores = Store.get({place: $routeParams.place});
    $scope.orderProp = 'id';
  }]);


storesControllers.controller('StoreDetailCtrl', ['$scope', '$routeParams', 'Store',
  function($scope, $routeParams, Store) {
    stores = Store.get({storeId: $routeParams.storeId}, function(stores) {
      $scope.store = stores[0];
    });
  }]);
