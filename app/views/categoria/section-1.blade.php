<section id="section-1">
	<h2 class="text-center category-header">Jugadores</h2>
	@forelse ($jugadores as $index => $jugador)
	<div class="col-xs-6 col-sm-3 col-md-2 member">
		<div class="text-center">
			<a href="#" data-toggle="modal" data-target="#{{ $jugador->id }}">
				{{ HTML::image('assets/images/member/'.$jugador->nombre_imagen, $jugador->nombre, array('class' => 'img-responsive img-thumbnail')) }}
			</a>
		</div>
		<div class="text-center">
			@if ($jugador->alias)
				<span class="member-name">{{ ucwords($jugador->alias) }}</span>
			@else
				<span class="member-name">{{ ucwords($jugador->nombre) }}</span>
			@endif

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
					<h4 class="modal-title text-center">{{ ucwords($jugador->nombre), ' ', ucwords($jugador->apellidos) }}</h4>
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

	@empty
		<span class="alert alert-danger col-xs-12 col-sm-12 col-md-offset-3 col-md-6 text-center members-notfound">!!Lo siento, aún no se han introducido los jugadores de este equipo.</span>

	@endforelse
	<div class="clearfix"></div>
	<h2 class="text-center category-header">Cuerpo Técnico</h2>
	@forelse ($tecnicos as $index => $tecnico)
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

	@empty
		<span class="alert alert-danger col-xs-12 col-sm-12 col-md-offset-3 col-md-6 text-center members-notfound">!!Lo siento, aún no se han introducido los técnicos de este equipo.</span>
	@endforelse
</section>