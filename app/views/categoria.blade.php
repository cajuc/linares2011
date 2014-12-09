<!-- Asigno el valor del puesto del integrante -->
{{--*/ $puestos = array('portero', 'defensa', 'centro', 'delantero', 'entrenador', '2º entrenador', 'delegado', 'preparador fisico'); /*--}}

@extends('layouts.base')

<!-- Sección de llamada a recursos '.css, etc' -->
@section('links')
	@parent
	{{ HTML::style('assets/css/style-categoria.css') }}
@stop

<!-- Sección que muestra el titulo -->
@section('title')
<title>Linares C.F - Categoría</title>
@stop

<!-- Sección que muestra el contenido principal -->
@section('content')
	<section class="container main-content">
		<div class="row">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="fa fa-users"><span>Plantilla</span></a></li>
						<li><a href="#section-2" class="fa fa-trophy"><span>Clasificación</span></a></li>
						<li><a href="#section-3" class="fa fa-calendar"><span>Calendario</span></a></li>
						<li><a href="#section-4" class="fa fa-futbol-o"><span>Resultados</span></a></li>
					</ul>
				</nav>

				<div class="content row">
					@include('categoria.section-1')

					@include('categoria.section-2')
					<section id="section-3">
						
					</section>
					<section id="section-4">
						
					</section>
				</div>
			</div>
		</div>
	</section>
@stop
