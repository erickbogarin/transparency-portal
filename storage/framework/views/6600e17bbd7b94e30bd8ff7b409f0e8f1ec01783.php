<!DOCTYPE html>
<html lang="pt-BR" ng-app="ptm">
<head>
	<div page-title style="display:none">{{titleText}}</div>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vendor/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans|Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/dist/style.css">
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
				<?php if(auth()->check()): ?>
					<ul class="nav navbar-nav">
						<?php if(auth()->user()->conta == 'ADMIN'): ?>
							<li ui-sref-active="active"><a ui-sref="users">Usuários</a></li>
						<?php endif; ?>
						<?php if(auth()->user()->conta == 'EMPLOYER'): ?>
							<li ui-sref-active="active"><a ui-sref="transparencias"><?php echo e(auth()->user()->municipio->nome); ?></a></li>
						<?php endif; ?>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e(auth()->user()->name); ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-user"></i> Conta</a></li>
									<li><a href="<?php echo e(url('/auth/logout')); ?>"><i class="fa fa-sign-out"></i> Sair</a></li>
								</ul>
							</li>

					</ul>
				<?php endif; ?>
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
		<?php echo $__env->yieldContent('content'); ?>
		<div ui-view></div>
	</div>
</main>

<footer id="footer" role="contentinfo">
	<div class="container">
		© <?php echo date("Y"); ?> <i id="brasao" class="fa" aria-hidden="true"></i> Governo do Estado do Amazonas - Todos os direitos reservados
	</div>
</footer>

	<!--jQuery | Bootstrap -->
	<script src="vendor/jquery/dist/jquery.min.js"></script>
	<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="vendor/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
	<script src="js/lib/script.js"></script>
	<!-- Angular JS -->
	<script src="vendor/angular/angular.min.js"></script>
	<script src="vendor/angular-resource/angular-resource.min.js"></script>
	<script src="vendor/angular-ui-router/release/angular-ui-router.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.11.2/satellizer.min.js"></script>
	
	<script src="js/vendor/ng-file-upload-shim.js"></script>
	<script src="js/vendor/ng-file-upload.min.js"></script>
	<script src="js/vendor/dirPagination.js"></script>
	<script src="js/directives/directives.js"></script>
	<script src="js/helper/myHelper.js"></script>

	<!-- App -->
	<script src="dist/script.js"></script>
</body>
</html>