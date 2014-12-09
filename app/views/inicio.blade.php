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
<section class="container">
	<div class="row">
		<div id="main-slider" class="carousel slide col-md-8 content-slider" data-ride="carousel">
			<!-- Indicadores -->
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>
				<li data-target="#main-slider" data-slide-to="1"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
				<li data-target="#main-slider" data-slide-to="3"></li>
				<li data-target="#main-slider" data-slide-to="4"></li>
			</ol>
			<!-- Contenido para slider -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="http://lorempixel.com/800/400/" alt="...">
					<div class="carousel-caption">
						<h1>Imagen 1</h1>
					</div>
				</div>
				<div class="item">
					<img src="http://lorempixel.com/800/400/" alt="...">
					<div class="carousel-caption">
						<h1>Imagen 2</h1>
					</div>
				</div>
				<div class="item">
					<img src="http://lorempixel.com/800/400/" alt="...">
					<div class="carousel-caption">
						<h1>Imagen 3</h1>
					</div>
				</div>
				<div class="item">
					<img src="http://lorempixel.com/800/400/" alt="...">
					<div class="carousel-caption">
						<h1>Imagen 4</h1>
					</div>
				</div>
				<div class="item">
					<img src="http://lorempixel.com/800/400/" alt="...">
					<div class="carousel-caption">
						<h1>Imagen 5</h1>
					</div>
				</div>
			</div>
			<!-- Controles -->
			<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<!-- <span class="sr-only">Previous</span> -->
			</a>
			<a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<!-- <span class="sr-only">Next</span> -->
			</a>
		</div>

		<div class="col-md-4">
			@include('layouts.table-classification', array('categoria' => 'senior'))
		</div>
	</div>
</section>
@stop