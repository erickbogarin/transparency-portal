<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Portal Tranparencia</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
	<header role="banner">
		<a href="">
			<img id="banner" src="/img/mapa-ptm2.png" alt="Portal Transparencia">
		</a>
	</header>

	<main role="main">
		<div id="principal" class="container-fluid">
			<div id="conteudo" class="row">
				<div class="col-xs-12 col-sm-9" style="background-color:white">
					@yield('content')
				</div>
				<nav class="col-xs-12 col-sm-3" style="background-color:red">
					
				</nav>
			</div>
		</div>	
	</main>
	
	<footer id="footer" role="contentinfo">
	</footer>
</body>
</html>