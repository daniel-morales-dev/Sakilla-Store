var dt;

function peliculas() {

	// $('#contenido').on('click','button#actualizar',function() {

	// 	var datos = $('#f-pelicula').serialize();

	// 	$.ajax({

	// 		type: 'get',
	// 		url: './peliculas/controlador_peliculas.php?accion=editar',
	// 		data: datos,
	// 		dataType: 'json'

	// 	}).done(function(e) {

	// 		if (e.respuesta == 'correcto') {

	// 			swal.fire(
	// 				'Actualizado',
	// 				'Datos actualizados de forma correcta',
	// 				'success'
	// 			)

	// 			dt.ajax.reload();

	// 			$('#nuevo-editar').html('');
	// 			$('#nuevo-editar').addClass('d-none');
	// 			$('#peliculas').removeClass('d-none');

	// 		} else {

	// 			swal.fire({
	// 				type: 'error',
	// 				title: 'Error',
	// 				text: 'Ocurrio un error durante el proceso'
	// 			})

	// 		}

	// 	});

	// });

	$('#contenido').on('click','a.borrar',function() {

		var id = $(this).data('id');

		swal.fire({

			title: '¿Continuar?',
			text: '¿Realmente desea borrar este registro?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'

		}).then((e) => {

			if (e.value) {

				var request = $.ajax({

					method: 'get',
					url: './peliculas/controlador_peliculas.php',
					data: { 
						id: id,
					 	accion:'borrar'
					},
					dataType: 'json'

				})

				request.done(function(e) {

					if (e.respuesta == 'correcto') {

						swal.fire(
							'Borrado',
							'El registro se ha eliminado con exito',
							'success'
						)

						dt.ajax.reload();

					} else {

						swal.fire({
							type: 'error',
							title: 'Error',
							text: 'Ocurrio un error durante el proceso'
						})

					}

				});

				request.fail(function(jqXHR, textStatus) {

					swal.fire({
						type: 'error',
						title: 'Error',
						text: 'Ocurrio un error durante el proceso - ' + textStatus
					})

				});

			}

		})

	});

	$('#contenido').on('click','button#cancelar',function() {

		$('#nuevo-editar').html('');
		$('#nuevo-editar').addClass('d-none');
		$('#peliculas').removeClass('d-none');

	});

	/*$('#contenido').on('click','button#cerrar',function() {

		$('#contenedor').addClass('d-none');
		$('#contenido').html('');

	})*/

	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./peliculas/nuevo_pelicula.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#peliculas').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './idiomas/controlador_idiomas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#idioma').append('<option value="' + value.id + '">' + value.idioma + "</option>")

			});

		});

	});

	// $('#contenido').on('click','button#agregar',function() {

	// 	var datos = $('#f-pelicula').serialize();

	// 	console.log(datos);
		
	// 	$.ajax({

	// 		type: 'get',
	// 		url: './peliculas/controlador_peliculas.php?accion=nuevo',
	// 		data: datos,
	// 		dataType: 'json'

	// 	}).done(function(e) {

	// 		if (e.respuesta == 'correcto') {

	// 			swal.fire(
	// 				'Agregado',
	// 				'El registro se agrego correctamente',
	// 				'success'
	// 			)

	// 			dt.ajax.reload();

	// 			$('#nuevo-editar').html('');
	// 			$('#nuevo-editar').addClass('d-none');
	// 			$('#peliculas').removeClass('d-none');

	// 		} else {

	// 			swal.fire({
	// 				type: 'error',
	// 				title: 'Error',
	// 				text: 'Ocurrio un error durante el proceso'
	// 			})

	// 		}

	// 	});

	// });

	$('#contenido').on('click','a.editar',function() {

		var id = $(this).data('id');

		var idioma;
		var extras;

		$('#nuevo-editar').load('./peliculas/editar_pelicula.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#peliculas').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './peliculas/controlador_peliculas.php',
			data: {
				id: id,
				accion: 'consultar'
			},
			dataType: 'json'

		}).done(function(e) {

			if (e.respuesta === "no existe") {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'El registro no existe'
				})

			} else {

				$('#id').val(e.id);
				$('#titulo').val(e.titulo);
				$('#descripcion').val(e.descripcion);
				$('#lanzamiento').val(e.lanzamiento);
				$('#prestamo').val(e.prestamo);
				$('#precio').val(e.precio);
				$('#duracion').val(e.duracion);
				$('#perdida').val(e.perdida);
				$('#clasificacion').val(e.clasificacion);
				idioma = e.idioma;
				extras = e.extras;

				if (extras.indexOf("Trailers") != -1) { $('#Trailers').prop("checked","checked"); }
				if (extras.indexOf("Commentaries") != -1) { $('#Commentaries').prop("checked","checked"); }
				if (extras.indexOf("Deleted Scenes") != -1) { $('#DeletedScenes').prop("checked","checked"); }
				if (extras.indexOf("Behind the Scenes") != -1) { $('#BehindtheScenes').prop("checked","checked"); }

			}

		});

		$.ajax({

			type: 'get',
			url: './idiomas/controlador_idiomas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				if (idioma === value.id) {

					$('#idioma').append('<option selected value="' + value.id + '">' + value.idioma + "</option>")

				} else {

					$('#idioma').append('<option value="' + value.id + '">' + value.idioma + "</option>")

				}
				

			});

		});

	});

}

function agregar() {
	var datos = $('#f-pelicula').serialize();

	console.log(datos);
	
	$.ajax({

		type: 'get',
		url: './peliculas/controlador_peliculas.php?accion=nuevo',
		data: datos,
		dataType: 'json'

	}).done(function(e) {

		if (e.respuesta == 'correcto') {

			swal.fire(
				'Agregado',
				'El registro se agrego correctamente',
				'success'
			)

			dt.ajax.reload();

			$('#nuevo-editar').html('');
			$('#nuevo-editar').addClass('d-none');
			$('#peliculas').removeClass('d-none');

		} else {

			swal.fire({
				type: 'error',
				title: 'Error',
				text: 'Ocurrio un error durante el proceso'
			})

		}

	});
}

function actualizar() {
	var datos = $('#f-pelicula').serialize();

	$.ajax({

		type: 'get',
		url: './peliculas/controlador_peliculas.php?accion=editar',
		data: datos,
		dataType: 'json'

	}).done(function(e) {

		if (e.respuesta == 'correcto') {

			swal.fire(
				'Actualizado',
				'Datos actualizados de forma correcta',
				'success'
			)

			dt.ajax.reload();

			$('#nuevo-editar').html('');
			$('#nuevo-editar').addClass('d-none');
			$('#peliculas').removeClass('d-none');

		} else {

			swal.fire({
				type: 'error',
				title: 'Error',
				text: 'Ocurrio un error durante el proceso'
			})

		}

	});
}

$(document).ready(() => {

	$('#contenido').off('click','button#nuevo');
	$('#contenido').off('click','a.editar');
	$('#contenido').off('click','a.borrar');
	$('#contenido').off('click','button#agregar');
	$('#contenido').off('click','button#actualizar');
	$('#contenido').off('click','button#cancelar');
	//$('#contenido').off('click','button#cerrar');

	dt = $('#tabla').DataTable({

		'ajax': './peliculas/controlador_peliculas.php/?accion=listar',
		'columns': [
			{'data': 'id'},
			{'data': 'titulo'},
			{'data': 'descripcion'},
			{'data': 'categoria'},
			{'data': 'precio'},
			{'data': 'duracion'},
			{'data': 'clasificacion'},
			{
				'data': 'id',
				render: function (data) {
					return '<a href="#" data-id="' + data + '" class="btn btn-warning editar">Editar</a><br><br> ' +
						   '<a href="#" data-id="' + data + '" class="btn btn-danger borrar">Borrar</a>'
				}
			},
		]

	});

	peliculas();

})