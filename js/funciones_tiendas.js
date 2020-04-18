var dt;

function tiendas() {

	// $('#contenido').on('click','button#actualizar',function() {

	// 	var datos = $('#id, #jefe').serialize();
	// 	var datos_direccion = $('#id_dir, #direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();

	// 	$.ajax({

	// 		type: 'get',
	// 		url: './direccion/controlador_direcciones.php?accion=editar',
	// 		data: datos_direccion,
	// 		dataType: 'json'

	// 	}).then(function() {

	// 		$.ajax({

	// 		type: 'get',
	// 		url: './tiendas/controlador_tiendas.php?accion=editar',
	// 		data: datos,
	// 		dataType: 'json'

	// 		}).done(function(e) {

	// 			if (e.respuesta == 'correcto') {

	// 				swal.fire(
	// 					'Actualizado',
	// 					'Datos actualizados de forma correcta',
	// 					'success'
	// 				)

	// 				dt.ajax.reload();

	// 				$('#nuevo-editar').html('');
	// 				$('#nuevo-editar').addClass('d-none');
	// 				$('#tiendas').removeClass('d-none');

	// 			} else {

	// 				swal.fire({
	// 					type: 'error',
	// 					title: 'Error',
	// 					text: 'Ocurrio un error durante el proceso'
	// 				})

	// 			}

	// 		});

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
					url: './tiendas/controlador_tiendas.php',
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
		$('#tiendas').removeClass('d-none');

	});

	/*$('#contenido').on('click','button#cerrar',function() {

		$('#contenedor').addClass('d-none');
		$('#contenido').html('');

	})*/

	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./tiendas/nuevo_tienda.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#tiendas').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './ciudades/controlador_ciudades.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#ciudad').append('<option value="' + value.id + '">' + value.ciudad + "</option>")

			});

		});

		$.ajax({

			type: 'get',
			url: './empleados/controlador_empleados.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#jefe').append('<option value="' + value.id + '">' + value.nombre + "</option>")

			});

		});

	});

	// $('#contenido').on('click','button#agregar',function() {

	// 	var datos = $('#jefe').serialize();
	// 	var datos_direccion = $('#direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();
	// 	var url;

	// 	$.ajax({

	// 		type: 'get',
	// 		url: './direccion/controlador_direcciones.php?accion=nuevo',
	// 		data: datos_direccion,
	// 		dataType: 'json'

	// 	}).done(function(e) {

	// 		url = './tiendas/controlador_tiendas.php?accion=nuevo&direccion='+e.id_dir;

	// 	}).then(function () {
			
	// 		$.ajax({

	// 			type: 'get',
	// 			url: url,
	// 			data: datos,
	// 			dataType: 'json'

	// 		}).done(function(e) {

	// 			if (e.respuesta == 'correcto') {

	// 				swal.fire(
	// 					'Agregado',
	// 					'El registro se agrego correctamente',
	// 					'success'
	// 				)

	// 				dt.ajax.reload();

	// 				$('#nuevo-editar').html('');
	// 				$('#nuevo-editar').addClass('d-none');
	// 				$('#tiendas').removeClass('d-none');

	// 			} else {

	// 				swal.fire({
	// 					type: 'error',
	// 					title: 'Error',
	// 					text: 'Ocurrio un error durante el proceso'
	// 				})

	// 			}

	// 		});

	// 	});

	// });

	$('#contenido').on('click','a.editar',function() {

		var id = $(this).data('id');

		var ciudad;
		var jefe;
		var id_dir;
		var respuesta;

		$('#nuevo-editar').load('./tiendas/editar_tienda.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#tiendas').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './tiendas/controlador_tiendas.php',
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
				jefe = e.jefe;
				id_dir = e.direccion;

			}

		}).then(function() {

			$.ajax({

				type: 'get',
				url: './direccion/controlador_direcciones.php',
				data: {
					id_dir: id_dir,
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

					$('#id_dir').val(e.id_dir);
					$('#direccion').val(e.direccion);
					$('#distrito').val(e.distrito);
					$('#cod_postal').val(e.postal);
					$('#telefono').val(e.telefono);
					ciudad = e.ciudad;
				}

			});

			$.ajax({

				type: 'get',
				url: './ciudades/controlador_ciudades.php',
				data: {accion: 'listar'},
				dataType: 'json'

			}).done(function(e) {

				$.each(e.data, function(index, value) {

					if (ciudad === value.id) {

						$('#ciudad').append('<option selected value="' + value.id + '">' + value.ciudad + "</option>")

					} else {

						$('#ciudad').append('<option value="' + value.id + '">' + value.ciudad + "</option>")

					}
					
				});

			});

		});

		$.ajax({

			type: 'get',
			url: './empleados/controlador_empleados.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				if (jefe === value.id) {

					$('#jefe').append('<option selected value="' + value.id + '">' + value.nombre + "</option>")

				} else {

					$('#jefe').append('<option value="' + value.id + '">' + value.nombre + "</option>")

				}
			});

		});

	});

}

function agregar() {
	var datos = $('#jefe').serialize();
	var datos_direccion = $('#direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();
	var url;

	$.ajax({

		type: 'get',
		url: './direccion/controlador_direcciones.php?accion=nuevo',
		data: datos_direccion,
		dataType: 'json'

	}).done(function(e) {

		url = './tiendas/controlador_tiendas.php?accion=nuevo&direccion='+e.id_dir;

	}).then(function () {
		
		$.ajax({

			type: 'get',
			url: url,
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
				$('#tiendas').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

		});

	});
}

function actualizar() {
	var datos = $('#id, #jefe').serialize();
	var datos_direccion = $('#id_dir, #direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();

	$.ajax({

		type: 'get',
		url: './direccion/controlador_direcciones.php?accion=editar',
		data: datos_direccion,
		dataType: 'json'

	}).then(function() {

		$.ajax({

		type: 'get',
		url: './tiendas/controlador_tiendas.php?accion=editar',
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
				$('#tiendas').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

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

		'ajax': './tiendas/controlador_tiendas.php/?accion=listar',
		'columns': [
			{'data': 'id'},
			{'data': 'jefe'},
			{'data': 'direccion'},
			{
				'data': 'id',
				render: function (data) {
					return '<a href="#" data-id="' + data + '" class="btn btn-warning editar">Editar</a> ' +
						   '<a href="#" data-id="' + data + '" class="btn btn-danger borrar">Borrar</a>'
				}
			},
		]

	});

	tiendas();

})