function App($stateProvider, $urlRouterProvider, $locationProvider) {
        
		$urlRouterProvider.otherwise('/');
		$stateProvider
            .state('index', {
                url: '/',
                views:  {
                    '': {templateUrl: 'views/home.php', controller: 'MunicipiosController as city'},
                    'sidebar@index': {templateUrl: 'views/layout/menu/mainMenu.html'}
                }
            })
            .state('users', {
                url: '/users',
                views: {
                    '': {templateUrl: 'views/admin/users.html', controller: 'UserController as user'}
                }
            })
            .state('transparencias', {
                url: '/transparencias',
                views: {
                '': {templateUrl: 'views/employee/home.html', controller: 'TransparenciaController'}
                }
            })
            .state('orgao', {
                url: '/transparencias/{orgao}/{municipio}',
                views: {
                    '': {templateUrl: 'views/transparencia/home.php', controller: 'TransparenciasController'},
                    'sidebar@orgao': {templateUrl: 'views/layout/menu/tpMenu.html'}
                }
            });

		$locationProvider.html5Mode({
			enabled: true,
      		requireBase: false,
            rewriteLinks: false
		});
	};

module.exports = App;