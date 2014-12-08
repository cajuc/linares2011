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
					<section id="section-1">
						<h2 class="text-center">Jugadores</h2>
							
						@foreach ($jugadores as $index => $jugador)
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div>
									<a href="#" data-toggle="modal" data-target="#{{ $jugador->id }}">
										{{ HTML::image('assets/images/member/'.$jugador->nombre_imagen, $jugador->nombre, array('class' => 'img-responsive img-thumbnail member')) }}
									</a>
								</div>
								<div class="text-center">
									<span class="member-name">{{ ucwords($jugador->nombre) }}</span>

									<div class="clearfix"></div>

									<small class="member-as">{{ ucwords($puestos[$jugador->ficha->puesto - 1]) }}</small>
								</div>
							</div>
							<div class="modal fade" id="{{ $jugador->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content modal-container">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">
												<span>&times;</span>
											</button>
											<h4 class="modal-title text-center">{{ ucwords($jugador->nombre) }}</h4>
										</div>
										<div class="modal-body">
											<div>
												<div class="col-sm-4 col-md-4">
													{{ HTML::image('assets/images/member/'.$jugador->nombre_imagen, $jugador->nombre, array('class' => 'img-responsive img-rounded modal-image')) }}
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4">
													<p>Posición</p>
													<p>F. Nacimiento</p>
													<p>Peso</p>
													<p>Altura</p>
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4">
													@if (!$jugador->ficha->posicion_especifica)
														<p>{{ ucwords($puestos[$jugador->ficha->puesto - 1]) }}</p>
													@else
														<p>{{ ucwords($jugador->ficha->posicion_especifica) }}</p>
													@endif
													
													<p>{{ $jugador->ficha->fecha_nacimiento }}</p>
													<p>{{ $jugador->ficha->peso }} Kg</p>
													<p>{{ $jugador->ficha->altura }} cm</p>
												</div>
											</div>

											<div class="clearfix"></div>
											
											<div class="col-sm-5 col-md-5"><hr class="separator-details"></div>
											<div class="col-sm-2 col-md-2 text-center"><small>Detalles</small></div>
											<div class="col-sm-5 col-md-5"><hr class="separator-details"></div>
											
											<div class="clearfix"></div>

											<p class="modal-text col-xs-12 col-sm-12 col-md-12">
												{{ $jugador->ficha->detalles }}
											</p>
										</div>

										<div class="clearfix"></div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
						@endforeach

						<div class="clearfix"></div>

						<h2 class="text-center">Cuerpo Técnico</h2>

						@foreach ($tecnicos as $index => $tecnico)
							<div class="col-xs-6 col-sm-3 col-md-2">
								<div>
									<a href="#" data-toggle="modal" data-target="#{{ $tecnico->id }}">
										{{ HTML::image('assets/images/member/'.$tecnico->nombre_imagen, $tecnico->nombre, array('class' => 'img-responsive img-thumbnail member')) }}
									</a>
								</div>
								<div class="text-center">
									<span class="member-name">{{ ucwords($tecnico->nombre) }}</span>

									<div class="clearfix"></div>

									<small class="member-as">{{ ucwords($puestos[$tecnico->ficha->puesto - 1]) }}</small>
								</div>
							</div>
							<div class="modal fade" id="{{ $tecnico->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content modal-container">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">
												<span>&times;</span>
											</button>
											<h4 class="modal-title text-center">{{ ucwords($tecnico->nombre) }}</h4>
										</div>
										<div class="modal-body">
											<div>
												<div class="col-sm-4 col-md-4">
													{{ HTML::image('assets/images/member/'.$tecnico->nombre_imagen, $tecnico->nombre, array('class' => 'img-responsive img-rounded modal-image')) }}
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4">
													<p>Puesto</p>
													<p>F. Nacimiento</p>
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4">
													<p>{{ ucwords($puestos[$tecnico->ficha->puesto - 1]) }}</p>
													<p>{{ $tecnico->ficha->fecha_nacimiento }}</p>
												</div>
											</div>

											<div class="clearfix"></div>
											
											<div class="col-sm-5 col-md-5"><hr class="separator-details"></div>
											<div class="col-sm-2 col-md-2 text-center"><small>Detalles</small></div>
											<div class="col-sm-5 col-md-5"><hr class="separator-details"></div>
											
											<div class="clearfix"></div>

											<p class="modal-text col-xs-12 col-sm-12 col-md-12">
												{{ $tecnico->ficha->detalles }}
											</p>
										</div>

										<div class="clearfix"></div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</section>
					<section id="section-2">
						
					</section>
					<section id="section-3">
						
					</section>
					<section id="section-4">
						
					</section>
				</div>
			</div>
		</div>
	</section>
@stop
