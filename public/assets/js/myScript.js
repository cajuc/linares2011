// Instancia de clase CBPFWTabs
new CBPFWTabs( document.getElementById( 'tabs' ) );

// Función para enviar FormData y obtener la imagen que se desea añadir
$(document).ready(function(e){
	// Operación para subir images
	$('#form-upload').on('submit', function(e){
		e.preventDefault();

		var formData = new FormData($(this)[0]);

		$.ajax({
			url: 'settings/upload-image',
			type: 'post',
			processData: false,
			contentType: false,
			dataType: 'json',
			data: formData,
			success: function (data){
				$('#message-upload').fadeOut('fast').empty();

				if(!data.success){
					$.each(data.errors, function(index, errors) {
						$.each(errors, function(index, error) {
							$('#message-upload').append('<li class="list-group-item list-group-item-danger">' + error + '</li>')
								.slideDown('slow');
						});
					});
				}else{
					var files = '';

					if (data.doneUpload) {
						$.each(data.doneUpload, function(index, name) {
							files = files + name + ', ';
						});
						
						$('#message-upload').append('<li class="list-group-item list-group-item-success">Los ficheros '+ files +' se añadieron correctamente!!</li>').slideDown('slow');

						// Refrescar tabla
						refrescarTableSlider();
					}

					files = '';

					if (data.failUpload) {
						$.each(data.failUpload, function(index, name) {
							 files = files + name + ', ';
						});

						$('#message-upload').append('<li class="list-group-item list-group-item-danger">Los ficheros '+ files +' se añadieron anteriormente!!</li>').slideDown('slow');
					}
				}
			}
		});
	});

	// Operación para realizar la actualización de un slider-image
	$("#box-slider").on('click', 'button[name=sliderImage-edit]', function(e){
		e.preventDefault();

		$("#message-sliderError").fadeOut('fast').empty();
		$("#message-slider").fadeOut('fast').empty();

		var id = $(this).val();
		var orden = $("input[name=orden"+ id +"]").val();
		var publicar = $("select[name=publicar"+ id +"]").val();
		var file = $("input[name=nombre_imagen"+ id +"]").val();
		var titulo = $("input[name=titulo"+ id +"]").val();
		var descripcion = $("input[name=descripcion"+ id +"]").val();

		if (!orden || !publicar || !titulo) {
			$("#message-sliderError").html("Debes rellenar los campos obligatorios").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/update-slider-image',
				type: 'post',
				dataType: 'json',
				data: {orden: orden, publicar: publicar, id: id, file: file, titulo: titulo, descripcion: descripcion},
				success: function (data){
					console.log(data);
					if (data.success) {
						message_slider = "El fichero "+ data.file +" se ha actualizado correctamente";
						message_sliderClass = "alert-success";
					}else{
						
						if (data.limits) {
							message_slider = "El fichero "+ data.file +" no se pudo actualizar, ya que se ha alcanzado el máximo de publicaciones";
						}else{
							message_slider = "El fichero "+ data.file +" no se pudo actualizar";
						}

						message_sliderClass = "alert-danger";
					}

					$("#message-slider").toggleClass(message_sliderClass, true).html(message_slider).slideDown('slow').delay(3000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para eliminar un slider-image
	$("#box-slider").on('click', 'button[name=sliderImage-delete]', function(e){
		e.preventDefault();

		$("#message-slider").fadeOut('fast');

		var id = $(this).val();
		var file = $("input[name=nombre_imagen"+ id +"]").val();

		$.ajax({
			url: 'settings/delete-slider-image',
			type: 'post',
			dataType: 'json',
			data: {id: id, file: file},
			success: function (data){
				if (data.success) {
					message_slider = "El fichero "+ data.file +" se eliminó correctamente";
					message_sliderClass = "alert-success";

					refrescarTableSlider();
				}else{
					message_slider = "El fichero "+ data.file +" no se pudo eliminar";
					message_sliderClass = "alert-danger";
				}

				$("#message-slider").toggleClass(message_sliderClass, true).html(message_slider).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Función para refrescar la table Slider
	function refrescarTableSlider(){
		$("#box-slider").fadeOut('fast').load(location.href + " #box-slider>*").fadeIn('slow');
	}
});

