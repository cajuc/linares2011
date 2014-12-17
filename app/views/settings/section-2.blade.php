<section id="section-2">
	<span class="logo-text">Club</span>
	<p class="help-block">*Para borrar un club que contenga equipos primero deberán ser borrados todos los equipos de dichao club.</p>

	<div class="row" id="box-club">
		<div class="col-md-offset-4 col-md-4">
			{{ Form::open(array('url' => '', 'method' => 'post')) }}
			<table class="table table-condensed">
				<tr>
					<th class="col-md-8">Nombre del club</th>
					<th class="col-md-4"></th>
				</tr>

				@if ($club)
					<tr>
						<td>
							{{ Form::text('club', $club->nombre, array('class' => 'form-control input-sm')) }}
						</td>
						<td class="text-center">
							<button type="button" name="club-edit" class="btn btn-link btn-unstyle" value="{{ $club->id }}"><span class="fa fa-edit fa-2x"></span></button>
							<button type="button" name="club-delete" class="btn btn-link btn-unstyle" value="{{ $club->id }}"><span class="fa fa-trash fa-2x"></span></button>
						</td>
					</tr>
				@endif

				<tr class="success">
					<td>
						{{ Form::text('name-club', '', array('class' => 'form-control input-sm')) }}
					</td>
					<td class="text-center">
						<button type="button" name="club-add" class="btn btn-link btn-unstyle"><span class="fa fa-plus-circle fa-2x"></span></button>
					</td>
				</tr>
			</table>
			{{ Form::close() }}
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-offset-3 col-md-6">
		<span class="alert alert-warning col-md-12 text-center" id="message-clubError" hidden></span>
		<span class="alert col-md-12 text-center" id="message-club" hidden></span>
	</div>

	<div class="clearfix"></div>


	<span class="logo-text">Categorías</span>
	<p class="help-block">*Para borrar una categoría que contenga equipos primero deberán ser borrados todos los equipos de dicha categoría.</p>

	<div class="row" id="box-category">
		<div class="col-md-offset-4 col-md-4">
			{{ Form::open(array('url' => '', 'method' => 'post')) }}
			<table class="table table-condensed">
				<tr>
					<th class="col-md-8">Nombre</th>
					<th class="col-md-4"></th>
				</tr>

				@forelse ($categories as $index => $category)
					<tr>
						<td>
							{{ Form::select('nombre'.$category->id, array(
								'senior' => 'Senior',
								'juvenil' => 'Juvenil',
								'cadete' => 'Cadete',
								'infantil' => 'Infantil',
								'alevín' => 'Alevín',
								'benjamín' => 'Benjamín',
								'prebenjamín' => 'Prebenjamín'
							), $category->nombre, array('class' => 'form-control input-sm')
							) }}
						</td>
						<td class="text-center">
							<button type="button" name="category-delete" class="btn btn-link btn-unstyle" value="{{ $category->id }}"><span class="fa fa-trash fa-2x"></span></button>
						</td>
					</tr>
				@empty
				@endforelse

				<tr class="success">
					<td>
						{{ Form::select('name-category', array(
							'senior' => 'Senior',
							'juvenil' => 'Juvenil',
							'cadete' => 'Cadete',
							'infantil' => 'Infantil',
							'alevín' => 'Alevín',
							'benjamín' => 'Benjamín',
							'prebenjamín' => 'Prebenjamín'
						), '', array('class' => 'form-control input-sm')
						) }}
					</td>
					<td class="text-center">
						<button type="button" name="category-add" class="btn btn-link btn-unstyle"><span class="fa fa-plus-circle fa-2x"></span></button>
					</td>
				</tr>	
			</table>
			{{ Form::close() }}
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-offset-3 col-md-6">
		<span class="alert col-md-12 text-center" id="message-category" hidden></span>
	</div>

	<div class="clearfix"></div>

	<span class="logo-text">Equipos</span>
	<p class="help-block">*Para borrar un equipo que contenga integrantes primero deberán ser borrados todos los integrantes de dicho equipo.</p>

	<div class="row" id="box-team">
		<div class="col-md-offset-1 col-md-10">
			<p class="help-block text-right">Los campos con (*) son obligatorios</p>

			{{ Form::open(array('url' => '', 'method' => 'post')) }}
			<table class="table table-condensed">
				<tr>
					<th class="col-md-2">Nombre</th>
					<th class="col-md-3">Url amigable</th>
					<th class="col-md-2">Categoría</th>
					<th class="col-md-2">Liga</th>
					<th class="col-md-2">Club</th>
					<th class="col-md-1"></th>
				</tr>

				@forelse ($teams as $index => $team)
					<tr>
						<td>{{ Form::text('nombre'.$team->id, ucwords($team->nombre), array('class' => 'form-control input-sm')) }}</td>
						<td>{{ Form::text('slug'.$team->id, $team->slug, array('class' => 'form-control input-sm')) }}</td>
						<td>
							<select class="form-control input-sm" name="category{{ $team->id }}">
								@foreach ($categories as $category)
									@if ($category->id == $team->categoria_id)
										<option value="{{ $category->id }}" selected>{{ $category->nombre }}</option>
									@else
										<option value="{{ $category->id }}">{{ $category->nombre }}</option>
									@endif
								@endforeach
							</select>
						</td>
						<td>
							<select class="form-control input-sm" name="liga{{ $team->id }}">
								<option value="null">Sin Liga</option>
								@foreach ($ligas as $liga)
									@if ($liga->id == $team->liga_id)
										<option value="{{ $liga->id }}" selected>{{ ucwords($liga->nombre) }}</option>
									@else
										<option value="{{ $liga->id }}">{{ ucwords($liga->nombre) }}</option>
									@endif
								@endforeach
							</select>
						</td>
						<td>
							{{ Form::text('club'.$club->id, $club->nombre, array('class' => 'form-control input-sm', 'disabled')) }}
						</td>
						<td class="text-center">
							<button type="button" name="team-edit" class="btn btn-link btn-unstyle" value="{{ $team->id }}"><span class="fa fa-edit fa-2x"></span></button>
							<button type="button" name="team-delete" class="btn btn-link btn-unstyle" value="{{ $team->id }}"><span class="fa fa-trash fa-2x"></span></button>
						</td>
					</tr>
				@empty
				@endforelse

				<tr class="success">
					<td>{{ Form::text('name-team', '', array('class' => 'form-control input-sm')) }}</td>
					<td>{{ Form::text('slug-team', '', array('class' => 'form-control input-sm')) }}</td>
					<td>
						<select class="form-control input-sm" name="category-team">
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->nombre }}</option>
							@endforeach
						</select>
					</td>
					<td>
						<select class="form-control input-sm" name="liga-team">
							<option value="null">Sin Liga</option>
							@foreach ($ligas as $liga)
								<option value="{{ $liga->id }}">{{ ucwords($liga->nombre) }}</option>
							@endforeach
						</select>
					</td>
					<td>
						{{ Form::text('', $club->nombre, array('class' => 'form-control input-sm', 'disabled')) }}
						{{ Form::hidden('club-team', $club->id, array('class' => 'form-control input-sm')) }}
					</td>
					<td class="text-center">
						<button type="button" name="team-add" class="btn btn-link btn-unstyle"><span class="fa fa-plus-circle fa-2x"></span></button>
					</td>
				</tr>	
			</table>
			{{ Form::close() }}
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-offset-3 col-md-6">
		<span class="alert alert-warning col-md-12 text-center" id="message-teamError" hidden></span>
		<span class="alert col-md-12 text-center" id="message-team" hidden></span>
	</div>
</section>