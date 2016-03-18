angular.module('ptm').controller('TransparenciaController', function(dataFactory, $scope, $rootScope, $http) {

	$scope.types = $http.get('api/tipos-transparencias')
	.success(function(types) {

		$scope.types = types;
	}).error(function(error) {

		console.log(error);
	});	

	$scope.data = [];
	$scope.libraryTemp = {};
	$scope.totalTransparenciasTemp = {};
	$scope.empty = false;
	$scope.saved = false;

	$scope.model = {
		searchText: ''
	};
	$scope.user = {
		id: $rootScope.currentUser.id,
		municipio_id: $rootScope.currentUser.municipio_id
	};
	$scope.form = {
		usuario_id: $rootScope.currentUser.id,
		municipio_id: $rootScope.currentUser.municipio_id,
		tipo_id: null,
		nome: '',
		data: '2015-05-10',
		orgao_id: 1
	};

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
		var url = '/api/user-transparencias?user='+$scope.user.id+'&municipio='+$scope.user.municipio_id+'&page='+pageNumber;
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

	$scope.saveAdd = function(){
		dataFactory.httpRequest('api/user-transparencias','POST',{},$scope.form).then(function(data) {
			$scope.data.push(data);
		
			$scope.form.nome = '';
			$scope.form.tipo_id = null;
			
			$scope.saved = true;
			$(".modal").modal("hide");
		})
		.catch(function(error) {
			console.log(error);
		});
	}

});	