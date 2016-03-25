angular.module('ptm').controller('AuthController', function($scope, $state, authenticate) {
	
    var vm = this;

    $scope.loginError = false;

    $scope.login = function() {
        authenticate.login(vm.email, vm.password)
            .then(function(data) {
                $state.go('index');
            }, function(error) {
                $scope.loginError = true;
            });
    }

    $scope.logout = function() {
        authenticate.logout();
    }

});