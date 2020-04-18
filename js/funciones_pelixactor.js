var dt;

function pelixactor() {

	$('#contenido').on('click','button#actualizar',function() {

		var datos = $('#f-pelixactor').serialize();

		$.ajax({

			type: 'get',
			url: './pelixactor/controlador_pelixactor.php?accion=editar',
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
				$('#pelixactor').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

		});

	})

	$('#contenido').on('click','a.borrar',function() {

		//var id = $(this).data('id');
		FID = $(this).parents("tr").find("td").eq(0).html();
		AID = $(this).parents("tr").find("td").eq(2).html();

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
					url: './pelixactor/controlador_pelixactor.php',
					data: { 
						pelicula: FID,
						actor: AID,
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
		$('#pelixactor').removeClass('d-none');

	});

	/*$('#contenido').on('click','button#cerrar',function() {

		$('#contenedor').addClass('d-none');
		$('#contenido').html('');

	})*/

	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./pelixactor/nuevo_pelixactor.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#pelixactor').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './peliculas/controlador_peliculas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#pelicula').append('<option value="' + value.id + '">' + value.titulo + "</option>")

			});

		});

		$.ajax({

			type: 'get',
			url: './actores/controlador_actores.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#actor').append('<option value="' + value.id + '">' + value.nombre + " " + value.apellido + "</option>")

			});

		});

	});

	$('#contenido').on('click','button#agregar',function() {

		var datos = $('#f-pelixactor').serialize();
		
		$.ajax({

			type: 'get',
			url: './pelixactor/controlador_pelixactor.php?accion=nuevo',
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
				$('#pelixactor').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

		});

	});

	$('#contenido').on('click','a.editar',function() {

		//var id = $(this).data('id');
		FID = $(this).parents("tr").find("td").eq(0).html();
		AID = $(this).parents("tr").find("td").eq(2).html();

		var pelicula;
		var actor;

		$('#nuevo-editar').load('./pelixactor/editar_pelixactor.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#pelixactor').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './pelixactor/controlador_pelixactor.php',
			data: {
				pelicula: FID,
				actor: AID,
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

				$('#FID').val(e.pelicula);
				$('#AID').val(e.actor);
				pelicula = e.pelicula;
				actor = e.actor;

			}

		});

		$.ajax({

			type: 'get',
			url: './peliculas/controlador_peliculas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				if (pelicula === value.id) {

					$('#pelicula').append('<option selected value="' + value.id + '">' + value.titulo + "</option>")

				} else {

					$('#pelicula').append('<option value="' + value.id + '">' + value.titulo + "</option>")

				}		

			});

		});

		$.ajax({

			type: 'get',
			url: './actores/controlador_actores.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				if (actor === value.id) {

					$('#actor').append('<option selected value="' + value.id + '">' + value.nombre + " " + value.apellido + "</option>")

				} else {

					$('#actor').append('<option value="' + value.id + '">' + value.nombre + " " + value.apellido + "</option>")

				}
				
			});

		});

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

		'ajax': './pelixactor/controlador_pelixactor.php/?accion=listar',
		'columns': [
			{'data': 'FID'},
			{'data': 'pelicula'},
			{'data': 'AID'},
			{'data': 'actor'},
			{
				render: function () {
					return '<a href="#" class="btn btn-warning editar">Editar</a> ' +
						   '<a href="#" class="btn btn-danger borrar">Borrar</a>'
				}
			},
		]

	});

	pelixactor();

})