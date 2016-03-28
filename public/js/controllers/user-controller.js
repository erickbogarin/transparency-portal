angular.module('ptm').controller('UserController', function(dataFactory, $scope, $http) {    

    var vm = this;
    vm.error;

    $scope.users = {};

    $scope.data = [];
    $scope.libraryTemp = {};
    $scope.totalUsersTemp = {};
    $scope.model = {
        searchText: ''
    };
    $scope.form = {
        name: '',
        email: '',
        password: '', 
        conta: '',
        municipio_id: null,
        orgao_id: null
    };

    $scope.municipios = $http.get('api/municipios-all')
    .success(function(municipios) {
        $scope.municipios = municipios;
    }).error(function(error) {
        console.log(error);
    }); 

    $scope.orgaos = $http.get('api/orgaos')
    .success(function(orgaos) {
        $scope.orgaos = orgaos;
    }).error(function(error) {
        console.log(error);
    }); 

    $scope.totalUsers = 0;
    $scope.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };
    getResultsPage(1);

    function getResultsPage(pageNumber) {
        if(! $.isEmptyObject($scope.libraryTemp)){
            dataFactory.httpRequest('/api/users?search='+$scope.model.searchText+'&page='+pageNumber).then(function(data) {
                $scope.data = data.data;
                $scope.totalUsers = data.total;
            });
        } else{
            dataFactory.httpRequest('/api/users?page='+pageNumber).then(function(data) {
              $scope.data = data.data;
              $scope.totalUsers = data.total;
          });
        }
    }

    $scope.searchDB = function(){
        if($scope.model.searchText.length >= 3){
            if($.isEmptyObject($scope.libraryTemp)){
                $scope.libraryTemp = $scope.data;
                $scope.totalUsersTemp = $scope.totalUsers;
                $scope.data = {};
            }
            getResultsPage(1);
        } else{
            if(! $.isEmptyObject($scope.libraryTemp)) {
                $scope.data = $scope.libraryTemp ;
                $scope.totalUsers = $scope.totalUsersTemp;
                $scope.libraryTemp = {};
            }
        }
    }

    $scope.saveAdd = function(){
        $scope.form.password = randomString(6);
        console.log($scope.form.password);
        dataFactory.httpRequest('api/users','POST',{},$scope.form).then(function(data) {
          $scope.data.push(data);
          $(".modal").modal("hide");
      });
    }

    $scope.edit = function(id){
        dataFactory.httpRequest('api/users/'+id+'/edit').then(function(data) {
            console.log(data);
            $scope.form = data;
        });
    }

    $scope.saveEdit = function(){
        dataFactory.httpRequest('api/users/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
            $(".modal").modal("hide");
            $scope.data = apiModifyTable($scope.data,data.id,data);
        });
    }

    $scope.remove = function(user,index){
        $('#remove-data').modal().one('click', '#delete', function() {
            dataFactory.httpRequest('api/users/'+user.id,'DELETE').then(function(data) {
                $scope.data.splice(index,1);
                getResultsPage(1);

                $(".modal").modal("hide");
            });
        });
    }

    // This request will hit the index method in the AuthenticateController
    // on the Laravel side and will return the list of users
    $http.get('api/users').success(function(users) {
        $scope.users = users.data;
    }).error(function(error) {
        vm.error = error;
    });

});