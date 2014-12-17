<section id="section-1">
	<span class="logo-text">Trofeos</span>
	
	<div class="row">
		<form action="" id="form-uploadTrophy" enctype="multipart/form-data">
			<input class="col-md-3" type="file" name="image[]" multiple>
			{{ Form::hidden('trophy-hidden', 'true') }}
			<button class="btn btn-success btn-xs" type="submit">Añadir imagen</button>
		</form>
	</div>

	<div class="clearfix"></div>
	
	<p class="help-block">Se recomienda que el tamaño de imagen sea (180x220)</p>
	
	<ul class="list-group col-md-4 text-center" id="message-uploadTrophy" hidden></ul>

	<div class="clearfix"></div>
	
	<div class="col-md-offset-1 col-md-10" id="box-trophy">
		<p class="help-block text-right">Las imagenes de los trofeos de guardan en el directorio '/public/images/trophys/', en la raíz del proyecto</p>
		<p class="help-block text-right">Los campos con (*) son obligatorios</p>

		{{ Form::open(array('url' => '', 'id' => 'trophy-form')) }}
			<table class="table table-condensed">
				<tr>
					<th class="col-md-2">*Nombre trofeo</th>
					<th class="col-md-1">*Temporada</th>
					<th class="col-md-3">*Ganado por</th>
					<th class="col-md-2">Imagen actual</th>
					<th class="col-md-2">*Imagen</th>
					<th class="col-md-2"></th>
				</tr>
				
				@forelse ($trophys as $trophy)
					<tr>
						<td>{{ Form::text('name-trophy'.$trophy->id, $trophy->nombre, array('class' => 'form-control input-sm')) }}</td>
						<td>
							<select name="temporada-trophy{{ $trophy->id }}">
								@foreach ($temporadas as $temporada)
									@if ($temporada->id == $trophy->temporada_id)
										<option value="{{ $temporada->id }}" selected>{{ $temporada->periodo }}</option>
									@else
										<option value="{{ $temporada->id }}">{{ $temporada->periodo }}</option>
									@endif
								@endforeach
							</select>
						</td>
						<td>
							{{ Form::text('ganado_por-trophy'.$trophy->id, $trophy->ganado_por, array('class' => 'form-control input-sm')) }}
						</td>
						<td>
							{{ Form::text('imagen_actual'.$trophy->id, $trophy->nombre_imagen, array('class' => 'form-control input-sm', 'disabled')) }}
						</td>
						<td>{{ Form::file('imagen-trophy'.$trophy->id) }}
						</td>
						<td class="text-center">
							<button type="button" name="trophy-edit" class="btn btn-link btn-unstyle" value="{{ $trophy->id }}"><span class="fa fa-edit fa-2x"></span></button>
							<button type="button" name="trophy-delete" class="btn btn-link btn-unstyle" value="{{ $trophy->id }}"><span class="fa fa-trash fa-2x"></span></button>
						</td>
					</tr>
				@empty
				@endforelse

				<tr class="success">
					<td>{{ Form::text('name-trophy', '', array('class' => 'form-control input-sm')) }}</td>
					<td>
						<select name="temporada-trophy">
							@foreach ($temporadas as $temporada)
								<option value="{{ $temporada->id }}">{{ $temporada->periodo }}</option>
							@endforeach
						</select>
					</td>
					<td>
						{{ Form::text('ganado_por-trophy', '', array('class' => 'form-control input-sm')) }}
					</td>
					<td>
						
					</td>
					<td>{{ Form::file('imagen-trophy') }}
					</td>
					<td class="text-center">
						<button type="button" name="trophy-add" class="btn btn-link btn-unstyle"><span class="fa fa-plus-circle fa-2x"></span></button>
					</td>
				</tr>
			</table>
		{{ Form::close() }}
	</div>

	<div class="clearfix"></div>

	<div class="col-md-offset-3 col-md-6">
		<span class="alert alert-warning col-md-12 text-center" id="message-trophyError" hidden></span>
		<span class="alert col-md-12 text-center" id="message-trophy" hidden></span>
	</div>
</section>