angular.module('ptm').controller('TransparenciasController', function(dataFactory, $scope, $http, $stateParams) {

	$scope.data = [];
	$scope.libraryTemp = {};
	$scope.totalTransparenciasTemp = {};
	$scope.city = $stateParams.municipio;
	$scope.orgao = $stateParams.orgao;
	$scope.filter = {
		checkbox: false,
		type: null,
		date: ''
	};
	$scope.resetCopy = angular.copy($scope.filter);
	$scope.emptyCities = false;

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
		if($scope.totalTransparencias == 0) {$scope.emptyCities = true;}
		else {$scope.emptyCities = false;}
	}

	$scope.resetFilters = function() {
		$scope.filter = angular.copy($scope.resetCopy);
		$scope.searchDB();
	}

	var checkUrlFilterParams = function() {
		var url;
		if($scope.filter.date) 
			url =  '&date=' + convertToLocaleDate($scope.filter.date);
		if($scope.filter.type)
			 url = url + '&type=' + $scope.filter.type;
		return url;	 	 
	}

	function getResultsPage(pageNumber) {
		var url = '/api/transparencias?municipio='+$stateParams.municipio+'&orgao='+$stateParams.orgao+'&page='+pageNumber;
		if(! $.isEmptyObject($scope.libraryTemp)){
			dataFactory.httpRequest(url + checkUrlFilterParams()).then(function(data) {
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

	$scope.setType = function(type) {
		$scope.filter.checkbox = true;
		$scope.filter.type = type;
		$scope.searchDB();
	}

	$scope.searchDB = function() {
		if($scope.filter.date || $scope.filter.type) {
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