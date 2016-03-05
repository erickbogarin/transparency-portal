<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" ng-app="ptm">
<head>
	<base href="/">
	<meta charset="utf-8">
	<title>Portal Tranparencia - @yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<base href="/">
</head>
<body>
	<header id="branding" role="banner">
		<a href="">
			<img id="banner" src="/img/mapa-ptm2.png" alt="Portal Transparencia">
		</a>
	</header>

	<main role="main">
		<div id="principal" class="container-fluid">
			<div class="row" style="background-color:#F9F9F9">
				<section id="conteudo" class="col-xs-12 col-sm-8" style="background-color:white">
					<ng-view></ng-view>
				</section>
				<div id="sidebar" class="col-xs-12 col-sm-4 widget-area" role="complementary">
					@section('aside')
					<aside id="search-3" class="widget widget_search"><div class="widget-title">Pesquisar</div>
						<form role="search" method="get" id="searchform" class="searchform" action="http://www.i-sixtec.com/portal2/">
							<div>
								<label class="screen-reader-text" for="s">Pesquisar por:</label>
								<input type="text" value="" name="s" id="s" />
								<input type="submit" id="searchsubmit" value="Pesquisar" />
							</div>
						</form>
					</aside>
					@show
				</div>
			</div>
		</div>	
	</main>
	
	<footer id="footer" role="contentinfo">
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-resource.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/controllers/municipios-controller.js"></script>
</body>
</html>