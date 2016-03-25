angular.module('ptm').controller('TransparenciasController', function(dataFactory, $scope, $http, $stateParams) {

	$scope.data = [];
	$scope.libraryTemp = {};
	$scope.totalTransparenciasTemp = {};
	$scope.model = {
		searchText: ''
	};
	$scope.city = $stateParams.municipio;
	$scope.orgao = $stateParams.orgao;
	$scope.empty = false;

	$scope.types = $http.get('api/tipos-transparencias')
	.success(function(types) {

		$scope.types = types;
	}).error(function(error) {

		console.log(error);
	});	
	
	$scope.totalTransparencias = 0;
	$scope.pageChanged = function(newPage) {
		getResultsPage(newPage);
	};
	getResultsPage(1);

	function checkEmptyTransparencia() {
		if($scope.totalTransparencias == 0) {$scope.empty = true;}
		else {$scope.empty = false;}
	}

	function getResultsPage(pageNumber) {
		var url = '/api/transparencias?municipio='+$stateParams.municipio+'&orgao='+$stateParams.orgao+'&page='+pageNumber;
		if(! $.isEmptyObject($scope.libraryTemp)){
			dataFactory.httpRequest(url).then(function(data) {
				$scope.data = data.data;
				$scope.totalTransparencias = data.total;
				checkEmptyTransparencia();
			});
		} else{
			dataFactory.httpRequest(url).then(function(data) {
				$scope.data = data.data;
				$scope.totalTransparencias = data.total;
				checkEmptyTransparencia();
			});
		}
	}

	$scope.searchDB = function() {
		if($scope.model.searchText.length >= 3) {
			if($.isEmptyObject($scope.libraryTemp)) {
				$scope.libraryTemp = $scope.data;
				$scope.totalTransparenciasTemp = $scope.totalTransparencias;
				$scope.data = {};
			}
			getResultsPage(1);
		} else {
			if(! $.isEmptyObject($scope.libraryTemp)) {
				$scope.data = $scope.libraryTemp ;
				$scope.totalTransparencias = $scope.totalTransparenciasTemp;
				$scope.libraryTemp = {};
			}
		}
		checkEmptyTransparencia();
	}

}); 