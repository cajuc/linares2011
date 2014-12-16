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
			@if (count($slider_images->toArray()))
				<!-- Indicadores -->
				<ol class="carousel-indicators">
				
				@foreach ($slider_images as $index => $element)
					@if (!$index)
						<li data-target="#main-slider" data-slide-to="{{ $index }}" class="active"></li>
					@else
						<li data-target="#main-slider" data-slide-to="{{ $index }}"></li>
					@endif
				@endforeach
				
				</ol>

				<!-- Contenido para slider -->
				<div class="carousel-inner" role="listbox">
					@foreach ($slider_images as $index => $slider_image)
						@if (!$index)
							<div class="item active">
								{{ HTML::image('assets/images/slider/'.$slider_image->nombre_imagen, $slider_image->nombre_imagen, array('class' => 'img-responsive img-slider')) }}
								<div class="carousel-caption">
									<h3>{{ $slider_image->titulo }}</h3>
									@if ($slider_image->descripcion)
										<p>{{ $slider_image->descripcion }}</p>
									@endif
								</div>
							</div>
						@else
							<div class="item">
								{{ HTML::image('assets/images/slider/'.$slider_image->nombre_imagen, $slider_image->nombre_imagen, array('class' => 'img-responsive img-slider')) }}
								<div class="carousel-caption">
									<h3>{{ $slider_image->titulo }}</h3>
									@if ($slider_image->descripcion)
										<p>{{ $slider_image->descripcion }}</p>
									@endif
								</div>
							</div>
						@endif
					@endforeach
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
			@else
				<span class="alert alert-danger col-xs-12 col-sm-12 col-md-offset-2 col-md-8 text-center">
					No existe ninguna publicación del slider
				</span>
			@endif
		</div>

		<div class="col-md-4">
			@include('layouts.table-classification', array('categoria' => 'senior'))
		</div>
	</div>
</section>
@stop