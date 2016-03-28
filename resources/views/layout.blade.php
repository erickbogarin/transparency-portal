<!DOCTYPE html>
<html lang="pt-BR" ng-app="ptm">
<head>
	<div page-title style="display:none">{{titleText}}</div>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/block/header.css">
	<link rel="stylesheet" type="text/css" href="/css/block/footer.css">
	<link rel="stylesheet" type="text/css" href="/css/block/nav.css">
	<link rel="stylesheet" type="text/css" href="/css/block/table.css">
	<link rel="stylesheet" type="text/css" href="/css/block/aside.css">
	<link rel="stylesheet" type="text/css" href="/css/block/city.css">
	<link rel="stylesheet" type="text/css" href="/css/responsive.css">
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
			@if(auth()->check())
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<!-- Collapsed Hamburger -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!-- Branding Image -->
						<a class="navbar-brand" href="<% url('/') %>">
							Portal Transparência
						</a>
					</div>
					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<ul class="nav navbar-nav">
							@if(auth()->user()->conta == 'ADMIN')
							<li ui-sref-active="active"><a ui-sref="users">Usuários</a></li>
							@endif
							@if(auth()->user()->conta == 'EMPLOYER')	
							<li ui-sref-active="active"><a ui-sref="transparencias">Transparências</a></li>
							@endif
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><% auth()->user()->name %> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<% url('/home') %>"><i class="fa fa-user"></i> Conta</a></li>
									<li><a href="<% url('/auth/logout') %>"><i class="fa fa-sign-out"></i> Sair</a></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>
			@endif
			@yield('content')
			<div ui-view></div>
		</div>
	</main>

	<footer id="footer" role="contentinfo">
		<img src="../img/topo.png" alt="Rodapé">
	</footer>

	<!--jQuery | Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/lib/script.js"></script>
	<!-- Angular JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.11.2/satellizer.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-resource.min.js"></script>
	<script src="js/lib/ng-file-upload-shim.js"></script>
	<script src="js/lib/ng-file-upload.min.js"></script>
	<!--Portal -->
	<script src="js/main.js"></script>
	<script src="js/lib/dirPagination.js"></script>
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