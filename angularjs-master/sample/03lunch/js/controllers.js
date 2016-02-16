var storesControllers = angular.module('storesControllers', []);

storesControllers.controller('StoreListCtrl', ['$scope',
  function ($scope) {
    $scope.stores = [{
      id: 1,
      name:"佐治のカレーハウス",
      image_url:"img/stores/food01.jpg",
      rating: 1,
      snippet_text:"甘過ぎるカレーが特徴。金曜夜はナンが食べ放題です"
    }];
  }]);


// storesControllers.controller('StoreDetailCtrl', ['$scope', '$routeParams', '$http',
//   function($scope, $routeParams, $http) {
//   }]);