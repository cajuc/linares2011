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
		{{ HTML::style("assets/css/jquery.smartmenus.bootstrap.css") }}
		{{ HTML::style("assets/css/fonts.css") }}
		@show
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-8">
						{{ HTML::image('assets/images/escudo-linares2011.png', 'escudo linares 2011', ['class' => 'logo-img hidden-xs']) }}
						<span class="logo-text">Linares C.F</span>
					</div>
					
					<div class="hidden-xs col-md-4 col-sm-6 text-right header-social">
						<a href="#"><span class="fa fa-twitter fa-3x" title="twitter"></span></a>
						<a href="#"><span class="fa fa-facebook fa-3x" title="facebook"></span></a>
					</div>
				</div>
			</div>
		</header>
		
		<br>
		
		@include('layouts.navbar')
		
		@yield('content')
		
		<br>
		
		<footer>
			<div class="container-fluid footer-content">
				<div class="container">
					<div class="col-md-6 col-sm-4 align-copyright">
						<p><span class="fa fa-copyright"></span> 2014. Todos los derechos reservados.</p>
					</div>
					<div class="text-left col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-4">
						<p>Dirección: C/Santana, Nº 15</p>
						<p>Teléfono: 953303030</p>
						<p>Email: linarescf@hotmail.com</p>
					</div>
					<div class="visible-xs header-social">
						<a href="#"><span class="fa fa-twitter fa-3x"></span></a>
						<a href="#"><span class="fa fa-facebook fa-3x"></span></a>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Llamada a los recursos '.js' -->
		{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
		{{ HTML::script('assets/js/bootstrap.min.js') }}
		<!-- SmartMenus jQuery plugin -->
		{{ HTML::script('assets/js/jquery.smartmenus.min.js') }}
		<!-- SmartMenus jQuery Bootstrap Addon -->
		{{ HTML::script('assets/js/jquery.smartmenus.bootstrap.min.js') }}
	</body>
</html>