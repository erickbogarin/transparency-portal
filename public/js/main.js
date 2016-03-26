angular.module('ptm', ['directives', 'ui.router','satellizer', 'ngResource', 'angularUtils.directives.dirPagination', 
    'ngFileUpload', 'myServices'])
	.config(function($stateProvider, $urlRouterProvider, $authProvider, $locationProvider) {
		
		$authProvider.loginUrl = '/api/authenticate';

		$urlRouterProvider.otherwise('/');

		$stateProvider
            .state('index', {
                url: '/',
                views:  {
                    '': {templateUrl: 'views/home.php', controller: 'MunicipiosController as city'},
                    'sidebar@index': {templateUrl: 'views/layout/menu/mainMenu.html'}
                }
            })
            .state('auth', {
                url: '/auth',
                views:  {
                    '': {templateUrl: 'views/authView.html', controller: 'AuthController as auth'}
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
                    '': {templateUrl: 'views/employee/home.html', controller: 'TransparenciaController'},
                    'sidebar@transparencias': {templateUrl: 'views/layout/menu/tpMenu.html'}
                }    
            })
            .state('orgao', {
                url: '/{orgao}/{municipio}',
                views: {
                    '': {templateUrl: 'views/transparencia/home.html', controller: 'TransparenciasController'},
                    'sidebar@orgao': {templateUrl: 'views/layout/menu/tpMenu.html'}
                }
            });

		$locationProvider.html5Mode({
			enabled: true,
      		requireBase: false
		});
	})
    .run(function($rootScope, $state, authenticate) {

            $rootScope.authError = false;    
            // $stateChangeStart is fired whenever the state changes. We can use some parameters
            // such as toState to hook into details about the state as it is changing
            $rootScope.$on('$stateChangeStart', function(event, toState) {
            
                // Grab the user from local storage and parse it to an object
                var user = JSON.parse(localStorage.getItem('user'));            

                // If there is any user data in local storage then the user is quite
                // likely authenticated. If their token is expired, or if they are
                // otherwise not actually authenticated, they will be redirected to
                // the auth state because of the rejected request anyway
        
                if(authenticate.isAuthenticated()) {

                    // The user's authenticated state gets flipped to
                    // true so we can now show parts of the UI that rely
                    // on the user being logged in
                    $rootScope.authenticated = true;

                    // Putting the user's data on $rootScope allows
                    // us to access it anywhere across the app. Here
                    // we are grabbing what is in local storage
                    $rootScope.currentUser = user;

                    // If the user is logged in and we hit the auth route we don't need
                    // to stay there and can send the user to the main state
                    if(toState.name === "auth") {

                        // Preventing the default behavior allows us to use $state.go
                        // to change states
                        event.preventDefault();

                        // go to the "main" state which in our case is index
                        $state.go('index');
                    }       
                }
                else {
                    if(user) {
                        $rootScope.authError = true;
                        authenticate.logout();
                    }
                }


            });
        });
