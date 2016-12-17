
function TransparenciaController(dataFactory, Upload, $scope, $rootScope, $http) {

	$scope.data = [];
	$scope.libraryTemp = {};
	$scope.totalTransparenciasTemp = {};
	$scope.totalTransparencias = 0;
	$scope.empty = false;
	$scope.saved = false;
	
	$scope.search = {
		date: ''
	};
	
	$scope.form = {
		nome: '',
		link: '',
		data: '',
		tipo_id: null
	};

	$scope.resetCopy = angular.copy($scope.form);

	var resetForm = function() {
		$scope.form = angular.copy($scope.resetCopy);
		$scope.editItem.$setPristine();
		$scope.editItem.$setValidity();
		$scope.editItem.$setUntouched();
		$scope.$apply();
	}

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
		var url = '/api/user-transparencias?page='+pageNumber;
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

	var uploadFile = function(file, fileName) {
		file.upload = Upload.upload({
			url: '/public/upload',
			method: 'POST',
			data: {file: file, fileName: fileName}
		}).then(function (resp) {
			console.log('Success ' + resp.config.data.file.name + ' uploaded. Response: ' + resp.data, resp.status);
		}, function (resp) {
			$scope.errorMsg = resp.status + ': ' + resp.data;
			console.log('Error status: ' + resp.status);
		}, function (evt) {
			var progressMsg;
			file.progress = parseInt(100.0 * evt.loaded / evt.total);
			
			if(file.progress == 100) progressMsg = 'Enviado: '; else progressMsg = 'Enviando arquivo para o servidor: ';
			file.progress = progressMsg +  file.progress;
		});	
	}

	var autoFillFormBeforeToSave = function(fileName) {
		$scope.form.tipo_id = parseInt($scope.form.tipo_id);
		$scope.form.data = formatDataPattern($scope.form.data);
		$scope.form.link = clearStringFileName(fileName);
	}

	$scope.saveAdd = function(file) {	
		autoFillFormBeforeToSave(file.name);
		dataFactory.httpRequest('api/user-transparencias','POST',{},$scope.form).then(function(data) {
			
			$scope.data.push(data);
			uploadFile(file, data.link);
			
			$(".modal").modal("hide");
			$scope.saved = true;
			resetForm();

			getResultsPage(1);
		})
		.catch(function(error) {
			console.log(error);
		});
	}

	$scope.edit = function(id) {
		dataFactory.httpRequest('api/user-transparencias/'+id+'/edit').then(function(data) {
			$scope.form = data;
			$scope.form.data = prepareFormEditDatePattern($scope.form.data);
		});
	}

	$scope.saveEdit = function() {
		$scope.form.tipo_id = parseInt($scope.form.tipo_id[0]);
		console.log($scope.form);
		dataFactory.httpRequest('api/user-transparencias/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
			$(".modal").modal("hide");
			$scope.data = apiModifyTable($scope.data,data.id,data);
		});
	}

	$scope.remove = function(item,index){
		$('#remove-data').modal().one('click', '#delete', function() {
			dataFactory.httpRequest('api/user-transparencias/'+item.id,'DELETE').then(function(data) {
				$scope.data.splice(index,1);
				getResultsPage(1);

				$(".modal").modal("hide");
			});
		});
	}

	$('#edit-data').on('hide.bs.modal', function () {
		resetForm();
	});

};

module.exports = TransparenciaController;