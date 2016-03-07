<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" ng-app="ptm">
<head>
	<div page-title style="display:none">{{titleText}}</div>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<base href="/">
</head>
<body>
	<header id="branding" role="banner">
		<a href="/">
			<img id="banner" src="/img/mapa-ptm2.png" alt="Portal Transparencia">
		</a>
	</header>
	<main role="main">
		<div id="principal" class="container-fluid">
			<div class="row" style="background-color:#F9F9F9">
				<nav class="navbar navbar-default" ng-if="authenticated">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Página inicial</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a href="#">Usuários</a></li>
								<li><a href="#">Municípios</a></li>
							</ul>
							<form class="navbar-form navbar-left" role="search">
						        <div class="form-group">
						          <input type="text" class="form-control" placeholder="Pesquisar">
						        </div>
					        	<div class="btn-group">
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Municípios <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu">
								    <li><a href="#">Municípios</a></li>
								    <li><a href="#">Usuários</a></li>
								  </ul>
								</div>
					      	</form>
							<form class="navbar-form navbar-right">
							    <label class="text-muted">Usuário: {{currentUser.name}}</label>
							  	<button ng-controller="AuthController as auth"type="button" class="btn btn-primary"
							  		ng-click="auth.logout()">
							  		Logout
							  	</button>
							</form>
						</div>
					</div>
				</nav>	
				<div ui-view></div>
			</div>
		</div>
	</main>
	
	<footer id="footer" role="contentinfo">
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.11.2/satellizer.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/controllers/auth-controller.js"></script>
	<script src="js/controllers/user-controller.js"></script>
	<script src="js/controllers/municipios-controller.js"></script>
	<script src="js/directives/directives.js"></script>
	
</body>
</html>