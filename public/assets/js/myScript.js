// Instancia de clase CBPFWTabs
new CBPFWTabs( document.getElementById( 'tabs' ) );

// Función para enviar FormData y obtener la imagen que se desea añadir
$(document).ready(function(e){
	$('#message-upload').hide();

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
				$('#message-upload').empty();

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
						
						$('#message-upload').append('<li class="list-group-item list-group-item-success">Los ficheros '+ files +' se añadieron correctamente!!</li>').slideDown('1000');
						
						// Refrescar página
						$("#box-slider").fadeOut('fast').load(location.href + " #box-slider>*").fadeIn('slow');
					}

					files = '';

					if (data.failUpload) {
						$.each(data.failUpload, function(index, name) {
							 files = files + name + ', ';
						});

						$('#message-upload').append('<li class="list-group-item list-group-item-danger">Los ficheros '+ files +' se añadieron anteriormente!!</li>').slideDown('1000');
					}
				}
			}
		});
	});

	// $("#form-slider").on('submit', function(e){
	// 	e.preventDefault();

	// 	$("#message-sliderAdd").empty().hide('slow');

	// 	var orden = $("input[name=orden]").val();
	// 	var nombre_imagen = $("input[name=nombre_imagen]").val();

	// 	if (!orden || !nombre_imagen) {
	// 		$("#message-sliderAdd").html("Debes rellenar todos los campos").slideDown('slow');
	// 	}else{
	// 		$.ajax({
	// 			url: 'settings/add-image',
	// 			type: 'post',
	// 			dataType: 'json',
	// 			data: {orden: orden, nombre_imagen: nombre_imagen},
	// 			success: function (data){

	// 			}
	// 		});
	// 	}
	// });
});
