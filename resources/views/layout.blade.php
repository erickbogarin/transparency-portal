<!DOCTYPE html>
<html lang="pt-BR" ng-app="ptm">
<head>
	<div page-title style="display:none">{{titleText}}</div>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<link rel="stylesheet" type="text/css" href="/css/block/footer.css">
	<link rel="stylesheet" type="text/css" href="/css/block/nav.css">
	<link rel="stylesheet" type="text/css" href="/css/block/menu.css">
	<link rel="stylesheet" type="text/css" href="/css/block/header.css">
	<link rel="stylesheet" type="text/css" href="/css/block/table.css">
	<link rel="stylesheet" type="text/css" href="/css/block/aside.css">
	<link rel="stylesheet" type="text/css" href="/css/block/city.css">
	<link rel="stylesheet" type="text/css" href="/css/responsive.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<base href="/">
</head>
<body>

<header>
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<i id="flag" class="fa" aria-hidden="true"></i>
					<b>Portal Transparência</b>
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if(auth()->check())
					<ul class="nav navbar-nav">
						@if(auth()->user()->conta == 'ADMIN')
							<li ui-sref-active="active"><a ui-sref="users">Usuários</a></li>
						@endif
						@if(auth()->user()->conta == 'EMPLOYER')
							<li ui-sref-active="active"><a ui-sref="transparencias"><% auth()->user()->municipio->nome %></a></li>
						@endif

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><% auth()->user()->name %> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<% url('/home') %>"><i class="fa fa-user"></i> Conta</a></li>
									<li><a href="<% url('/auth/logout') %>"><i class="fa fa-sign-out"></i> Sair</a></li>
								</ul>
							</li>

					</ul>
				@endif
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Perguntas frequentes</a></li>
					<li><a href="#">Contato</a></li>
					<li><a href="#">Glossário</a></li>
					<li><a href="#">Links</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>

<main role="main" class="conteiner-fluid">
	<button type="button" id="navbar-collapse" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sidebar" aria-expanded="false" aria-controls="sidebar" >
		<img src="/img/menu.svg" alt="Abrir menu da seção">
	</button>
	<div class="se-pre-con"></div>
	<div class="main row">
		@yield('content')
		<div ui-view></div>
	</div>
</main>

<footer id="footer" role="contentinfo">
	<div class="container">
		© <?php echo date("Y"); ?> <i id="brasao" class="fa" aria-hidden="true"></i> Governo do Estado do Amazonas - Todos os direitos reservados
	</div>
</footer>

	<!--jQuery | Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	<script src="js/lib/script.js"></script>

	<!-- Angular JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.11.2/satellizer.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-resource.min.js"></script>
	<script src="js/vendor/ng-file-upload-shim.js"></script>
	<script src="js/vendor/ng-file-upload.min.js"></script>
	<!--Portal -->
	<script src="js/main.js"></script>
	<script src="js/vendor/dirPagination.js"></script>
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