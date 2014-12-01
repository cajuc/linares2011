@extends('layouts.base')

<!-- Sección de llamada a recursos '.css, etc' -->
@section('links')
	@parent
	{{ HTML::style('assets/css/style-inicio.css') }}
@stop
<!-- Sección que muestra el titulo -->
@section('title')
<title>Linares C.F - Inicio</title>
@stop

<!-- Sección que muestra el contenido principal -->
@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="http://lorempixel.com/1200/400/" alt="...">
			<div class="carousel-caption">
				<h1>Imagen 1</h1>
			</div>
		</div>
		<div class="item">
			<img src="http://lorempixel.com/1200/400/" alt="...">
			<div class="carousel-caption">
				<h1>Imagen 2</h1>
			</div>
		</div>
		<div class="item">
			<img src="http://lorempixel.com/1200/400/" alt="...">
			<div class="carousel-caption">
				<h1>Imagen 3</h1>
			</div>
		</div>
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
@stop