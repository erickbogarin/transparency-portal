angular.module('ptm').controller('MunicipiosController', function(dataFactory, $scope, $http) {

	$scope.data = [];
    $scope.libraryTemp = {};
    $scope.totalCitiesTemp = {};
    $scope.model = {
        searchText: ''
    };
    $scope.empty = false;

    $scope.totalCities = 0;
    $scope.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };
    getResultsPage(1);

    function checkEmptyCity() {
        if($scope.totalCities == 0) {
            $scope.empty = true;
        }
        else {
            $scope.empty = false;
        }
        console.log($scope.totalCities);   
    }

    function getResultsPage(pageNumber) {
        if(! $.isEmptyObject($scope.libraryTemp)){
            dataFactory.httpRequest('/api/municipios?search='+$scope.model.searchText+'&page='+pageNumber).then(function(data) {
                $scope.data = data.data;
                $scope.totalCities = data.total;    
                checkEmptyCity();
            });
        } else{
            dataFactory.httpRequest('/api/municipios?page='+pageNumber).then(function(data) {
              $scope.data = data.data;
              $scope.totalCities = data.total;
          });
        }
    }

    $scope.searchDB = function() {
        if($scope.model.searchText.length >= 2) {
            if($.isEmptyObject($scope.libraryTemp)) {
                $scope.libraryTemp = $scope.data;
                $scope.totalCitiesTemp = $scope.totalCities;
                $scope.data = {};
            }
            getResultsPage(1);
            } else {
            if(! $.isEmptyObject($scope.libraryTemp)) {
                $scope.data = $scope.libraryTemp ;
                $scope.totalCities = $scope.totalCitiesTemp;
                $scope.libraryTemp = {};
            }
        }
        checkEmptyCity();
    }

});