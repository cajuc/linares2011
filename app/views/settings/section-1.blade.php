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
	
	<ul class="list-group col-md-4 text-center" id="message-upload" hidden></ul>
	
	<div class="col-md-offset-1 col-md-10" id="box-slider">
		@if (count($slider_images))
			<p class="help-block text-right">El máximo de publicaciones son 5</p>
			<p class="help-block text-right">Los campos con (*) son obligatorios</p>

			{{ Form::open(array('url' => '', 'id' => 'slider-form')) }}
				<table class="table table-condensed">
					<tr>
						<th class="col-md-1">*Orden</th>
						<th class="col-md-2">Nombre Imagen</th>
						<th class="col-md-2">*Título</th>
						<th class="col-md-4">Descripción</th>
						<th class="col-md-1">*Publicar</th>
						<th class="col-md-1"></th>
					</tr>
					
					@foreach ($slider_images as $slider_image)
						<tr>
							<td>{{ Form::number('orden'.$slider_image->id, $slider_image->orden, array('class' => 'form-control input-sm', 'max' => 5, 'min' => 1)) }}</td>
							<td>{{ Form::text('nombre_imagen'.$slider_image->id, $slider_image->nombre_imagen, array('class' => 'form-control input-sm', 'disabled')) }}</td>
							<td>
								{{ Form::text('titulo'.$slider_image->id, $slider_image->titulo, array('class' => 'form-control input-sm')) }}
							</td>
							<td>
								{{ Form::textarea('descripcion'.$slider_image->id, $slider_image->descripcion, array('class' => 'form-control input-sm', 'rows' => 1)) }}
							</td>
							<td>{{ Form::select('publicar'.$slider_image->id, array(
									0 => 'No',
									1 => 'Sí'
								), $slider_image->publicar, array('class' => 'form-control input-sm')
								) }}
							</td>
							<td class="text-center">
								<button type="button" name="sliderImage-edit" class="btn btn-link btn-unstyle" value="{{ $slider_image->id }}"><span class="fa fa-edit fa-2x"></span></button>
								<button type="button" name="sliderImage-delete" class="btn btn-link btn-unstyle" value="{{ $slider_image->id }}"><span class="fa fa-trash fa-2x"></span></button>
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
	</div>

	<div class="clearfix"></div>

	<div class="col-md-offset-3 col-md-6">
		<span class="alert alert-warning col-md-12 text-center" id="message-sliderError" hidden></span>
		<span class="alert col-md-12 text-center" id="message-slider" hidden></span>
	</div>
</section>