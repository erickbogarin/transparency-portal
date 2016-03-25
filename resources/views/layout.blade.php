<!DOCTYPE html>
<html lang="pt-BR" ng-app="ptm">
<head>
	<div page-title style="display:none">{{titleText}}</div>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
	<main role="main" class="conteiner-fluid">
		<button type="button" id="navbar-collapse" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sidebar" aria-expanded="false" aria-controls="sidebar" >
			<img src="/img/menu.svg" alt="Abrir menu da seção">
		</button>
		<div class="main row">
			<nav class="navbar navbar-default ng-cloak" ng-if="authenticated">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" ui-sref="index">Página inicial</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li ui-sref-active="active"><a ui-sref="users">Usuários</a></li>
							<li ui-sref-active="active"><a ui-sref="transparencias">Transparências</a></li>
						</ul>
						<form class="navbar-form navbar-right">
							<label class="text-muted">Usuário: {{currentUser.name}}</label>
							<button ng-controller="AuthController"type="button" class="btn btn-default"
							ng-click="logout()">
							Encerrar sessão
						</button>
					</form>
				</div>
			</div>
		</nav>
		<div ng-if="authError" class="alert alert-warning alert-dismissible col-lg-5">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4>Sua sessão expirou. Logue-se novamente.</h4>
		</div>
		<div ui-view></div>
	</div>
</main>

<footer id="footer" role="contentinfo">
	<img src="../img/topo.png" alt="Rodapé">
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Angular JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.11.2/satellizer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-resource.min.js"></script>
<script src="js/lib/ng-file-upload-shim.js"></script>
<script src="js/lib/ng-file-upload.min.js"></script>
<!--Portal -->
<script src="js/lib/dirPagination.js"></script>
<script src="js/main.js"></script>
<script src="js/services/auth-service.js"></script>
<script src="js/services/myServices.js"></script>
<script src="js/helper/myHelper.js"></script>
<script src="js/directives/directives.js"></script>
<!-- Controllers -->
<script src="js/controllers/auth-controller.js"></script>
<script src="js/controllers/user-controller.js"></script>
<script src="js/controllers/municipios-controller.js"></script>
<script src="js/controllers/transparencias-controller.js"></script>
<script src="js/controllers/transparencia-controller.js"></script>
</body>
</html>