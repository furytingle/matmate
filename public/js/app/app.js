var app = angular.module('matApp', ['ngResource']);

app.controller('index', ['$scope', '$http', function($scope, $http){

    $scope.parts = [];

    $http.get('parts', data).then(function matSuccess(data){
        $scope.parts = data;
    }), function matError(statusText){
        console.log(statusText);
    }

    console.log($scope.parts);
    
}]);
