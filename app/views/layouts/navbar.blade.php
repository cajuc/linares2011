<!-- Creo la variable que almacena los datos para rellenar el navbar dinámico -->
{{--*/ $categorias = ObtenerRecursos::obtenerCategorias(); /*--}}

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
				@if ($itemActive == 'inicio')
					<li class="active">
				@else
					<li>
				@endif
				<a href="/"><span class="fa fa-home fa-lg"></span> Inicio</a></li>	
				
				@if ($itemActive == 'categoria')
					<li class="active">
				@else
					<li>
				@endif
					<a href="#">Categorías</a>
					<ul class="dropdown-menu" >

						@foreach ($categorias as $categoria)
							@if (count($categoria->equipos) == 1)
								<li><a href="/categoria/{{ $categoria->equipos[0]['slug'] }}/plantilla">{{ ucwords($categoria->nombre) }}</a>
								</li>
							@else
								<li><a href="#" >{{ ucwords($categoria->nombre) }}</a>
									<ul class="dropdown-menu" >
										@foreach ($categoria->equipos as $equipo)
											<li><a href="/categoria/{{ $equipo->slug }}/plantilla">{{ ucwords($equipo->nombre) }}</a></li>
										@endforeach
									</ul>
								</li>
							@endif
						@endforeach
						
					</ul>
				</li>
				
				@if ($itemActive == 'fotogaleria')
					<li class="active">
				@else
					<li>
				@endif
				<a href="#">Fotogalería</a></li>
				
				@if ($itemActive == 'historia')
					<li class="active">
				@else
					<li>
				@endif
				<a href="#">Historia</a></li>
				
				@if ($itemActive == 'trofeos')
					<li class="active">
				@else
					<li>
				@endif
				<a href="{{ URL::to('trofeos') }}">Trofeos</a></li>
			</ul>

			@if (Auth::check() && Auth::user()->admin)
				<ul class="nav navbar-nav navbar-right">
					@if ($itemActive == 'settings')
						<li class="active">
					@else
						<li>
					@endif
					<a href="{{ URL::to('settings') }}">Administrar</a></li>
				</ul>
			@endif
		</div>
	</div>
</nav>