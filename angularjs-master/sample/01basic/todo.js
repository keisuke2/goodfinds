angular.module('todoApp', [])
  .controller('TodoListController', function($scope) {
    $scope.todos = [
      {text:'learn angular', done:true},
      {text:'build an angular app', done:false}];
  });