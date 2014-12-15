@extends('layouts.base')

<!-- Sección de llamada a recursos '.css, etc' -->
@section('links')
	@parent
	{{ HTML::style('assets/css/style-trofeos.css') }}
@stop

<!-- Sección que muestra el titulo -->
@section('title')
<title>Linares C.F - Trofeos</title>
@stop

<!-- Sección que muestra el contenido principal -->
@section('content')
	<section class="container main-content">
		<span class="logo-text col-xs-12 col-sm-6 col-md-6">Trofeos Linares C.F 2011</span>

		<!-- {{ Form::open(array('url' => URL::to('trofeos/page') )) }}
		<div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-3">
			<select class="form-control input-sm dropdown-trophys text-center" name="temporada" onchange="this.form.submit();">
				<option disabled selected>[Selecciona temporada]</option>
				@foreach ($temporadas as $temporada)
					<option value="{{ $temporada->id }}">{{ $temporada->periodo }}</option>
				@endforeach
			</select>
		</div>	
		{{ Form::close() }} -->

		<div class="clearfix"></div>

		@forelse ($trofeos as $trofeo)
			<div class="row box-trophy text-center">
				
					<div class="col-xs-12 col-sm-3 col-md-2">
						{{ HTML::image('assets/images/trophys/' . $trofeo->nombre_imagen, $trofeo->nombre_imagen, ['class' => 'img-responsive img-trophy']) }}
					</div>
				
					<h3 class="col-xs-12 col-sm-9 col-md-offset-1 col-md-3">{{ $trofeo->nombre }}</h3>
				
					<h3 class="col-xs-12 col-sm-9 col-md-3">{{ $trofeo->temporada->periodo }}</h3>
				
					<h3 class="col-xs-12 col-sm-9 col-md-3">{{ $trofeo->ganado_por }}</h3>
			</div>
		@empty
				<!-- <div class="text-center error-message">
					<span class="alert alert-danger col-xs-12 col-sm-12">{{ Session::get('not-found') }}</span>
				</div> -->
				<div class="text-center error-message">
					<span class="alert alert-danger col-xs-12 col-sm-12">!!Lo siento, aún no hay trofeos</span>
				</div>
		@endforelse

		@if ($trofeos)
			<nav class="style-pagination">
				{{ $paginator->links() }}
			</nav>
		@endif
	</section>
@stop