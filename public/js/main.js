angular.module('ptm', ['ngResource','ngRoute'])
	.config(function($interpolateProvider, $routeProvider, $locationProvider) {
		
		$routeProvider
			.when('/', {
				templateUrl: 'views/home.html'
			});

		$routeProvider
			.when('/admin', {
				templateUrl: 'views/admin/home.html',
				controller: 'MunicipiosController'
			});

		$routeProvider
			.otherwise('/');

		$locationProvider.html5Mode(true);	
	});