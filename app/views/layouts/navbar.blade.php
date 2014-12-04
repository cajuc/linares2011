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
				<li class="active"><a href="#">Inicio</a></li>
				<li>
					<a href="#">Categorías</a>
					<ul class="dropdown-menu" >

						@foreach ($categorias as $categoria)
							@if (count($categoria->equipos) == 1)
								<li><a href="{{ $categoria->equipos[0]['id'] }}">{{ ucwords($categoria->nombre) }}</a>
								</li>
							@else
								<li><a href="#" >{{ ucwords($categoria->nombre) }}</a>
									<ul class="dropdown-menu" >
										@foreach ($categoria->equipos as $equipo)
											<li><a href="{{ $equipo->id }}">{{ ucwords($equipo->nombre) }}</a></li>
										@endforeach
									</ul>
								</li>
							@endif
						@endforeach
						
					</ul>
				</li>
				<li><a href="#">Fotogalería</a></li>
				<li><a href="#">Historia</a></li>
				<li><a href="#">Trofeos</a></li>
			</ul>
		</div>
	</div>
</nav>