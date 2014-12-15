<section id="section-1">
	<span class="logo-text">Slider</span>
	
	<div class="row">
		<form action="" id="form-upload" enctype="multipart/form-data">
			<input class="col-md-3" type="file" name="image[]" multiple>
			<button class="btn btn-success btn-xs" type="submit">Añadir imagen</button>
		</form>
	</div>

	<div class="clearfix"></div>
	<p class="help-block">Se recomienda que el tamaño de imagen sea (800x400)</p>
	
	<ul class="list-group col-md-4" id="message-upload"></ul>
	
	<div class="col-md-offset-3 col-md-6" id="box-slider">
		@if (count($slider_images))
			{{ Form::open(array('url' => '')) }}
				<table class="table table-condensed">
					<tr>
						<th class="col-md-2">Orden</th>
						<th class="col-md-7">Nombre Imagen</th>
						<th class="col-md-1">Publicar</th>
						<th class="col-md-2"></th>
					</tr>
					
					
						@foreach ($slider_images as $slider_image)
							<tr>
								<td>{{ Form::number('orden', $slider_image->orden, array('class' => 'form-control input-sm', 'max' => 5, 'min' => 1)) }}</td>
								<td>{{ Form::text('nombre_imagen', $slider_image->nombre_imagen, array('class' => 'form-control input-sm', 'disabled')) }}</td>
								<td>{{ Form::select('publicar', array(
										0 => 'No',
										1 => 'Sí'
									)) }}</td>
								<td class="text-center">
									<button type="button" class="btn btn-link btn-unstyle" value="{{ $slider_image->id }}"><span class="fa fa-edit fa-2x"></span></button>
									<button type="button" class="btn btn-link btn-unstyle" value="{{ $slider_image->id }}"><span class="fa fa-trash fa-2x"></span></button>
								</td>
							</tr>
						@endforeach
					

					<!-- <tr class="success">
						<td>{{ Form::number('orden', '', array('class' => 'form-control input-sm', 'max' => 5, 'min' => 1)) }}</td>
						<td>{{ Form::text('nombre_imagen', '', array('class' => 'form-control input-sm')) }}</td>
						<td class="text-center">
							<button type="submit" class="btn btn-link btn-unstyle"><span class="fa fa-plus-circle fa-2x"></span></button>
						</td>
					</tr> -->
				</table>
			{{ Form::close() }}
		@endif
		<span class="alert alert-warning col-md-12 text-center" id="message-sliderAdd" hidden></span>
	</div>
</section>