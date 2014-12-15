@extends('layouts.base')

<!-- Sección de llamada a recursos '.css, etc' -->
@section('links')
	@parent
	{{ HTML::style('assets/css/style-settings.css') }}
@stop

<!-- Sección que muestra el titulo -->
@section('title')
<title>Linares C.F - Settings</title>
@stop

<!-- Sección que muestra el contenido principal -->
@section('content')
	<section class="container main-content">
		<div class="row">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="fa fa-home"><span>Inicio</span></a></li>
						<li><a href="#section-2" class="fa fa-ellipsis-v"><span>Categoría</span></a></li>
						<li><a href="#section-3" class="fa fa-trophy"><span>Trofeos</span></a></li>
					</ul>
				</nav>

				<div class="content row">
					@include('settings.section-1')

					@include('settings.section-2')
					<section id="section-3">
						
					</section>
				</div>
			</div>
		</div>
	</section>
@stop
