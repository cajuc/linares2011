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

		// $("#message-sliderError").fadeOut('fast').empty();
		// $("#message-slider").fadeOut('fast').empty();

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

	// Operación para realizar la actualización del club
	$("#box-club").on('click', 'button[name=club-edit]', function(e){
		e.preventDefault();

		// $("#message-sliderError").fadeOut('fast').empty();
		// $("#message-slider").fadeOut('fast').empty();

		var id = $(this).val();
		var club = $("input[name=club]").val();

		if (!club) {
			$("#message-clubError").html("Debes rellenar el campo nombre del club").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/update-club',
				type: 'post',
				dataType: 'json',
				data: {id: id, club: club},
				success: function (data){
					if (data.success) {
						message_club = "El club "+ data.club +" se ha actualizado correctamente";
						
						if ($("#message-club").hasClass("alert-danger")) {
							$("#message-club").removeClass("alert-danger");
						}

						message_clubClass = "alert-success";
					}else{
						message_club = "El club "+ data.club +" no se pudo actualizar";

						if ($("#message-club").hasClass("alert-success")) {
							$("#message-club").removeClass("alert-success");
						}

						message_clubClass = "alert-danger";
					}

					$("#message-club").addClass(message_clubClass, true).html(message_club).slideDown('slow').delay(3000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para eliminar un club
	$("#box-club").on('click', 'button[name=club-delete]', function(e){
		e.preventDefault();

		var id = $(this).val();
		var club = $("input[name=nombre"+ id +"]").val();

		$.ajax({
			url: 'settings/delete-club',
			type: 'post',
			dataType: 'json',
			data: {id: id, club: club},
			success: function (data){
				if (data.success) {
					message_club = "El club "+ data.club +" se eliminó correctamente";
					
					if ($("#message-club").hasClass("alert-danger")) {
						$("#message-club").removeClass("alert-danger");
					}

					message_clubClass = "alert-success";

					refrescarTableClub();
				}else{
					message_club = "El club "+ data.club +" no se pudo eliminar";
					
					if ($("#message-club").hasClass("alert-success")) {
						$("#message-club").removeClass("alert-success");
					}

					message_clubClass = "alert-danger";
				}

				$("#message-club").addClass(message_clubClass, true).html(message_club).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Operación para añadir un club
	$("#box-club").on('click', 'button[name=club-add]', function(e){
		e.preventDefault();

		var club = $("input[name=name-club]").val();
		
		if (!club) {
			$("#message-clubError").html("Debes rellenar el campo nombre del club").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/add-club',
				type: 'post',
				dataType: 'json',
				data: {club: club},
				success: function (data){
					if (data.success) {
						message_club = "El club "+ data.club +" se añadió correctamente";

						if ($("#message-club").hasClass("alert-warning")) {
							$("#message-club").removeClass("alert-warning");
						}

						message_clubClass = "alert-success";

						refrescarTableClub();
					}else{
						message_club = "Solo puede registrarse un club";

						if ($("#message-club").hasClass("alert-success")) {
							$("#message-club").removeClass("alert-success");
						}

						message_clubClass = "alert-warning";
					}

					$("#message-club").addClass(message_clubClass, true).html(message_club).slideDown('slow').delay(3000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para eliminar una categoría
	$("#box-category").on('click', 'button[name=category-delete]', function(e){
		e.preventDefault();

		var id = $(this).val();
		var category = $("select[name=nombre"+ id +"]").val();

		$.ajax({
			url: 'settings/delete-category',
			type: 'post',
			dataType: 'json',
			data: {id: id, category: category},
			success: function (data){
				if (data.success) {
					message_category = "La categoría "+ data.category +" se eliminó correctamente";
					
					if ($("#message-category").hasClass("alert-danger")) {
						$("#message-category").removeClass("alert-danger");
					}

					message_categoryClass = "alert-success";

					refrescarTableTeam()
					refrescarTableCategory();
				}else{
					message_category = "La categoría "+ data.category +" no se pudo eliminar";
					
					if ($("#message-category").hasClass("alert-success")) {
						$("#message-category").removeClass("alert-success");
					}

					message_categoryClass = "alert-danger";
				}

				$("#message-category").addClass(message_categoryClass, true).html(message_category).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Operación para añadir una categoría
	$("#box-category").on('click', 'button[name=category-add]', function(e){
		e.preventDefault();

		var category = $("select[name=name-category]").val();
		
		$.ajax({
			url: 'settings/add-category',
			type: 'post',
			dataType: 'json',
			data: {category: category},
			success: function (data){
				if (data.success) {
					message_category = "La categoría "+ data.category +" se añadió correctamente";

					if ($("#message-category").hasClass("alert-warning")) {
						$("#message-category").removeClass("alert-warning");
					}

					message_categoryClass = "alert-success";

					refrescarTableTeam();
					refrescarTableCategory();
				}else{
					message_category = "La categoría "+ data.category +" ya existe";

					if ($("#message-category").hasClass("alert-success")) {
						$("#message-category").removeClass("alert-success");
					}

					message_categoryClass = "alert-warning";
				}

				$("#message-category").addClass(message_categoryClass, true).html(message_category).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Operación para realizar la actualización del club
	$("#box-team").on('click', 'button[name=team-edit]', function(e){
		e.preventDefault();

		// $("#message-sliderError").fadeOut('fast').empty();
		// $("#message-slider").fadeOut('fast').empty();

		var id = $(this).val();
		var team = $("input[name=nombre"+ id +"]").val();
		var slug = $("input[name=slug"+ id +"]").val();
		var category = $("select[name=category"+ id +"]").val();
		var liga = $("select[name=liga"+ id +"]").val();
		var club = $("input[name=club"+ id +"]").val();

		if (!team || !slug || !category) {
			$("#message-teamError").html("Debes rellenar todos campos").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/update-team',
				type: 'post',
				dataType: 'json',
				data: {id: id, team: team, slug: slug, category: category, liga: liga, club: club},
				success: function (data){
					if (data.success) {
						message_team = "El equipo "+ data.team +" se ha actualizado correctamente";
						
						if ($("#message-team").hasClass("alert-danger")) {
							$("#message-team").removeClass("alert-danger");
						}

						message_teamClass = "alert-success";
					}else{
						message_team = "El equipo "+ data.team +" no se pudo actualizar. El nombre del equipo y slug no pueden repetirse, ni puede haber más de un equipo jugando en la misma Liga.";

						if ($("#message-team").hasClass("alert-success")) {
							$("#message-team").removeClass("alert-success");
						}

						message_teamClass = "alert-danger";
					}

					$("#message-team").addClass(message_teamClass).html(message_team).slideDown('slow').delay(4000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para eliminar una categoría
	$("#box-team").on('click', 'button[name=team-delete]', function(e){
		e.preventDefault();

		var id = $(this).val();
		var team = $("input[name=nombre"+ id +"]").val();

		$.ajax({
			url: 'settings/delete-team',
			type: 'post',
			dataType: 'json',
			data: {id: id, team: team},
			success: function (data){
				if (data.success) {
					message_team = "El equipo "+ data.team +" se eliminó correctamente";
					
					if ($("#message-team").hasClass("alert-danger")) {
						$("#message-team").removeClass("alert-danger");
					}

					message_teamClass = "alert-success";

					refrescarTableTeam()
				}else{
					message_team = "El equipo "+ data.team +" no se pudo eliminar";
					
					if ($("#message-team").hasClass("alert-success")) {
						$("#message-team").removeClass("alert-success");
					}

					message_teamClass = "alert-danger";
				}

				$("#message-team").addClass(message_teamClass, true).html(message_team).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Operación para añadir un equipo
	$("#box-team").on('click', 'button[name=team-add]', function(e){
		e.preventDefault();

		var team = $("input[name=name-team]").val();
		var slug = $("input[name=slug-team]").val();
		var category = $("select[name=category-team]").val();
		var liga = $("select[name=liga-team]").val();
		var club = $("input[name=club-team]").val();
		
		if(!team || !slug || !category){
			$("#message-teamError").html("Debes rellenar todos los campos obligatorios").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/add-team',
				type: 'post',
				dataType: 'json',
				data: {team: team, slug: slug, category: category, liga: liga, club: club},
				success: function (data){
					if (data.success) {
						message_team = "El equipo "+ data.team +" se añadió correctamente";

						if ($("#message-team").hasClass("alert-warning")) {
							$("#message-team").removeClass("alert-warning");
						}

						message_teamClass = "alert-success";

						refrescarTableTeam();
					}else{
						message_team = "El equipo "+ data.team +" no se añadió. El nombre del equipo y slug no pueden repetirse, ni puede haber más de un equipo jugando en la misma Liga.";

						if ($("#message-team").hasClass("alert-success")) {
							$("#message-team").removeClass("alert-success");
						}

						message_teamClass = "alert-warning";
					}

					$("#message-team").addClass(message_teamClass, true).html(message_team).slideDown('slow').delay(4000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para subir images de trofeos
	$('#form-uploadTrophy').on('submit', function(e){
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
				$('#message-uploadTrophy').fadeOut('fast').empty();

				if(!data.success){
					$.each(data.errors, function(index, errors) {
						$.each(errors, function(index, error) {
							$('#message-uploadTrophy').append('<li class="list-group-item list-group-item-danger">' + error + '</li>')
								.slideDown('slow');
						});
					});
				}else{
					var files = '';

					if (data.doneUpload) {
						$.each(data.doneUpload, function(index, name) {
							files = files + name + ', ';
						});
						
						$('#message-uploadTrophy').append('<li class="list-group-item list-group-item-success">Los ficheros '+ files +' se añadieron correctamente!!</li>').slideDown('slow');

						// Refrescar tabla
						refrescarTableTrophy();
					}

					files = '';

					if (data.failUpload) {
						$.each(data.failUpload, function(index, name) {
							 files = files + name + ', ';
						});

						$('#message-uploadTrophy').append('<li class="list-group-item list-group-item-danger">Los ficheros '+ files +' se añadieron anteriormente!!</li>').slideDown('slow');
					}
				}
			}
		});
	});

	// Operación para realizar la actualización del club
	$("#box-trophy").on('click', 'button[name=trophy-edit]', function(e){
		e.preventDefault();

		// $("#message-sliderError").fadeOut('fast').empty();
		// $("#message-slider").fadeOut('fast').empty();

		var id = $(this).val();
		var trophy = $("input[name=name-trophy"+ id +"]").val();
		var temporada = $("select[name=temporada-trophy"+ id +"]").val();
		var ganado_por = $("input[name=ganado_por-trophy"+ id +"]").val();

		if ($("input[name=imagen-trophy"+ id +"]").val()) {
			var imagen = $("[name=imagen-trophy"+ id +"]").val();
		}else{
			var imagen = $("input[name=imagen_actual"+ id +"]").val();
		}

		if (!trophy || !ganado_por) {
			$("#message-trophyError").html("Debes rellenar todos los campos obligatorios").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/update-trophy',
				type: 'post',
				dataType: 'json',
				data: {id: id, trophy: trophy, temporada: temporada, ganado_por: ganado_por, imagen: imagen},
				success: function (data){
					if (data.success) {
						message_trophy = "El trofeo "+ data.trophy +" se ha actualizado correctamente";
						
						if ($("#message-trophy").hasClass("alert-danger")) {
							$("#message-trophy").removeClass("alert-danger");
						}

						message_trophyClass = "alert-success";

						refrescarTableTrophy();
					}else{
						message_trophy = "El trofeo "+ data.trophy +" no se pudo actualizar";

						if ($("#message-trophy").hasClass("alert-success")) {
							$("#message-trophy").removeClass("alert-success");
						}

						message_trophyClass = "alert-danger";
					}

					$("#message-trophy").addClass(message_trophyClass).html(message_trophy).slideDown('slow').delay(4000).fadeOut('slow');
				}
			});
		}
	});

	// Operación para eliminar una categoría
	$("#box-trophy").on('click', 'button[name=trophy-delete]', function(e){
		e.preventDefault();

		var id = $(this).val();
		var trophy = $("input[name=name-trophy"+ id +"]").val();

		$.ajax({
			url: 'settings/delete-trophy',
			type: 'post',
			dataType: 'json',
			data: {id: id, trophy: trophy},
			success: function (data){
				if (data.success) {
					message_trophy = "El equipo "+ data.trophy +" se eliminó correctamente";
					
					if ($("#message-trophy").hasClass("alert-danger")) {
						$("#message-trophy").removeClass("alert-danger");
					}

					message_trophyClass = "alert-success";

					refrescarTableTrophy()
				}else{
					message_team = "El trofeo "+ data.trophy +" no se pudo eliminar";
					
					if ($("#message-trophy").hasClass("alert-success")) {
						$("#message-trophy").removeClass("alert-success");
					}

					message_trophyClass = "alert-danger";
				}

				$("#message-trophy").addClass(message_trophyClass, true).html(message_trophy).slideDown('slow').delay(3000).fadeOut('slow');
			}
		});
	});

	// Operación para añadir un trofeo
	$("#box-trophy").on('click', 'button[name=trophy-add]', function(e){
		e.preventDefault();

		var id = $(this).val();
		var trophy = $("input[name=name-trophy]").val();
		var temporada = $("select[name=temporada-trophy]").val();
		var ganado_por = $("input[name=ganado_por-trophy]").val();
		var imagen = $("[name=imagen-trophy]").val();

		if(!imagen || !trophy || !ganado_por || !temporada){
			$("#message-trophyError").html("Debes rellenar todos los campos obligatorios").slideDown('slow').delay(3000).fadeOut('slow');
		}else{
			$.ajax({
				url: 'settings/add-trophy',
				type: 'post',
				dataType: 'json',
				data: {id: id, trophy: trophy, temporada: temporada, ganado_por: ganado_por, imagen: imagen},
				success: function (data){
					if (data.success) {
						message_trophy = "El trofeo "+ data.trophy +" se añadió correctamente";

						if ($("#message-trophy").hasClass("alert-warning")) {
							$("#message-trophy").removeClass("alert-warning");
						}

						message_trophyClass = "alert-success";

						refrescarTableTrophy();
					}else{
						message_trophy = "El trofeo "+ data.trophy +" no se añadió";

						if ($("#message-trophy").hasClass("alert-success")) {
							$("#message-trophy").removeClass("alert-success");
						}

						message_trophyClass = "alert-warning";
					}

					$("#message-trophy").addClass(message_trophyClass, true).html(message_trophy).slideDown('slow').delay(4000).fadeOut('slow');
				}
			});
		}
	});
});

// Función para refrescar la table Slider
function refrescarTableSlider(){
	$("#box-slider").fadeOut('fast').load(location.href + " #box-slider>*").fadeIn('slow');
}

// Función para refrescar la table Category
function refrescarTableCategory(){
	$("#box-category").fadeOut('fast').load(location.href + " #box-category>*").fadeIn('slow');
}

// Función para refrescar la table Club
function refrescarTableClub(){
	$("#box-club").fadeOut('fast').load(location.href + " #box-club>*").fadeIn('slow');
}

// Función para refrescar la table Team
function refrescarTableTeam(){
	$("#box-team").fadeOut('fast').load(location.href + " #box-team>*").fadeIn('slow');
}

// Función para refrescar la table Trophy
function refrescarTableTrophy(){
	$("#box-trophy").fadeOut('fast').load(location.href + " #box-trophy>*").fadeIn('slow');
}