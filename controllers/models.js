var app = angular.module('app',['modules-module']);

app.controller('appCtrl',function($scope,models) {
	
	$scope.models = models;
	
	$scope.models.data($scope);
	
});