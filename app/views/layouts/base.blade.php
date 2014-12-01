<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		@section('title')
			<title>Linares C.F</title>
		@show
		
		@section('links')
			{{ HTML::style("assets/css/bootstrap.min.css") }}
			{{ HTML::style("assets/css/font-awesome.min.css") }}
			{{ HTML::style("assets/css/style-base.css") }}
			{{ HTML::style("assets/css/normalize.css") }}
			{{ HTML::style('http://fonts.googleapis.com/css?family=Josefin+Sans:600') }}
		@show
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-8">
						{{ HTML::image('assets/images/escudo-linares2011.png', 'escudo linares 2011', ['class' => 'logo-img hidden-xs']) }}
						<span class="logo-text">Linares C.F</span>
					</div>
					
					<div class="hidden-xs col-md-4 col-sm-6 text-right header-social">
						<a href="#"><span class="fa fa-twitter fa-3x"></span></a>
						<a href="#"><span class="fa fa-facebook fa-3x"></span></a>
					</div>
				</div>
			</div>
		</header>
		<br>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#navbar-menu" class="navbar-toggle collapsed">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Linares C.F</a>
				</div>

				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Categorías
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Senior</a></li>
								<li><a href="#">Juvenil</a></li>
								<li><a href="#">Cadete</a></li>
								<li><a href="#">Infantil</a></li>
								<li><a href="#">Alevín</a></li>
								<li><a href="#">Benjamín</a></li>
								<li><a href="#">Prebenjamín</a></li>
							</ul>
						</li>
						<li><a href="#">Fotogalería</a></li>
						<li><a href="#">Historia</a></li>
						<li><a href="#">Trofeos</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			@yield('content')
		</div>

		<footer>
			
		</footer>

		<!-- Llamada a los recursos '.js' -->
		{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
		{{ HTML::script('assets/js/bootstrap.min.js') }}
	</body>
</html>