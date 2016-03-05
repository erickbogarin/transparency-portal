angular.module('ptm').controller('MunicipiosController', function($scope, $http) {

	$scope.municipios = [];

	$http.get('/municipios')
		.then(function(municipios) {
			$scope.municipios = municipios.data;
			console.log(municipios.data);	
		});

});