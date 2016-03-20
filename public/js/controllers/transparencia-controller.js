angular.module('ptm').controller('TransparenciaController', function(dataFactory, fileUpload, $scope, $rootScope, $http) {

	$scope.data = [];
	$scope.libraryTemp = {};
	$scope.totalTransparenciasTemp = {};
	$scope.totalTransparencias = 0;
	$scope.empty = false;
	$scope.saved = false;
	$scope.myFile = null;

	$scope.search = {
		date: ''
	};
	
	$scope.user = {
		id: $rootScope.currentUser.id,
		municipio_id: $rootScope.currentUser.municipio_id
	};
	
	$scope.form = {
		usuario_id: $rootScope.currentUser.id,
		municipio_id: $rootScope.currentUser.municipio_id,
		nome: '',
		data: '',
		tipo_id: null,
		orgao_id: 1
	};

	$scope.types = $http.get('api/tipos-transparencias')
	.success(function(types) {

		$scope.types = types;
	}).error(function(error) {

		console.log(error);
	});	

	function checkEmptyTransparencia() {
		if($scope.totalTransparencias == 0) {$scope.empty = true;}
		else {$scope.empty = false;}
	}

	$scope.pageChanged = function(newPage) {
		getResultsPage(newPage);
	};
	getResultsPage(1);

	function getResultsPage(pageNumber) {
		var url = '/api/user-transparencias?user='+$scope.user.id+'&municipio='+$scope.user.municipio_id+'&page='+pageNumber;
		if(! $.isEmptyObject($scope.libraryTemp)){
			dataFactory.httpRequest(url+'&date='+$scope.search.date).then(function(data) {
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
		if($scope.search.date) {
			$scope.search.date = convertToLocaleDate($scope.search.date);
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

	$scope.saveAdd = function() {	
		$scope.form.data = convertDataPattern($scope.form.data);
		var file = $scope.myFile;
		var uploadUrl = '/uploads';
		fileUpload.uploadFileToUrl(file, uploadUrl);
		
		dataFactory.httpRequest('api/user-transparencias','POST',{},$scope.form).then(function(data) {
			$scope.data.push(data);

			$scope.form.nome = '';
			$scope.form.tipo_id = null;
			$scope.form.data = '';
			
			$scope.saved = true;
			$(".modal").modal("hide");
			getResultsPage(1);
		})
		.catch(function(error) {
			console.log(error);
		});
	}

	$scope.edit = function(id) {
		dataFactory.httpRequest('api/user-transparencias/'+id+'/edit').then(function(data) {
			console.log(data);
			$scope.form = data;
			$scope.form.data = new Date($scope.form.data);
		});
	}

	$scope.saveEdit = function(){
		$scope.form.tipo_id = parseInt($scope.form.tipo_id[0]);
		console.log($scope.form);
		dataFactory.httpRequest('api/user-transparencias/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
			$(".modal").modal("hide");
			$scope.data = apiModifyTable($scope.data,data.id,data);
		});
	}

	$scope.remove = function(item,index){
		var result = confirm("Você quer realmente deletar esta transparência?");
		if (result) {
			dataFactory.httpRequest('api/user-transparencias/'+item.id,'DELETE').then(function(data) {
				$scope.data.splice(index,1);
				getResultsPage(1);
			});
		}
	}

});	