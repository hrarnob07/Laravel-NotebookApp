var myapp=angular.module('app',[]);
myapp.controller('CreateController', ['$scope', '$http', function($scope, $http) {

	$scope.name = "Hafiz";
  $scope.showData = function()
  {

  	var data = {
  		name: $scope.name
  	};

  	$http.post(window.location.origin + '/angular-data-store', data)
  		.success(function(response){
  			console.log(response);
  		}); 
  }


}]);