var dt;

function clientes() {


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
					url: './clientes/controlador_clientes.php',
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
		$('#clientes').removeClass('d-none');

	});

	/*$('#contenido').on('click','button#cerrar',function() {

		$('#contenedor').addClass('d-none');
		$('#contenido').html('');

	})*/

	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./clientes/nuevo_cliente.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#clientes').addClass('d-none');

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
			url: './tiendas/controlador_tiendas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#tienda').append('<option value="' + value.id + '">Tienda - ' + value.id + "</option>")

			});

		});

	});

	// $('#contenido').on('click','button#agregar',function() {

	// 	var datos = $('#nombre, #apellido, #email, #usuario, #clave, #rol, #tienda, #estado').serialize();
	// 	var datos_direccion = $('#direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();
	// 	var url;

	// 	$.ajax({

	// 		type: 'get',
	// 		url: './direccion/controlador_direcciones.php?accion=nuevo',
	// 		data: datos_direccion,
	// 		dataType: 'json'

	// 	}).done(function(e) {

	// 		url = './clientes/controlador_clientes.php?accion=nuevo&direccion='+e.id_dir

	// 	}).then(function() {

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
	// 				$('#clientes').removeClass('d-none');

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
		var tienda;
		var id_dir;

		$('#nuevo-editar').load('./clientes/editar_cliente.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#clientes').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './clientes/controlador_clientes.php',
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
                tienda = e.tienda;
				$('#nombre').val(e.nombre);
				$('#apellido').val(e.apellido);
				$('#email').val(e.email);
				id_dir = e.direccion;
				if (e.estado == 1) {
					$('#estado').prop("checked", "checked" );
				}

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
			url: './tiendas/controlador_tiendas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				if (tienda === value.id) {

					$('#tienda').append('<option selected value="' + value.id + '">Tienda - ' + value.id + "</option>")

				} else {

					$('#tienda').append('<option value="' + value.id + '">Tienda - ' + value.id + "</option>")

				}
			
			});

		});

	});

}

function agregar() {
	var datos = $('#nombre, #apellido, #email, #usuario, #clave, #rol, #tienda, #estado').serialize();
	var datos_direccion = $('#direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();
	var url;

	$.ajax({

		type: 'get',
		url: './direccion/controlador_direcciones.php?accion=nuevo',
		data: datos_direccion,
		dataType: 'json'

	}).done(function(e) {

		url = './clientes/controlador_clientes.php?accion=nuevo&direccion='+e.id_dir

	}).then(function() {

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
				$('#clientes').removeClass('d-none');

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
	var datos = $('#id, #nombre, #apellido, #email, #tienda, #estado').serialize();
	var datos_direccion = $('#id_dir, #direccion, #distrito, #cod_postal, #telefono, #ciudad').serialize();

	$.ajax({

		type: 'get',
		url: './direccion/controlador_direcciones.php?accion=editar',
		data: datos_direccion,
        dataType: 'json'

	}).then(function() {

		$.ajax({

			type: 'get',
			url: './clientes/controlador_clientes.php?accion=editar',
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
				$('#clientes').removeClass('d-none');

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

		'ajax': './clientes/controlador_clientes.php/?accion=listar',
		'columns': [
			{'data': 'id'},
			{'data': 'nombre'},
			{'data': 'direccion'},
			{'data': 'telefono'},
            {'data': 'ciudad'},
            {'data': 'tienda'},
			{
				'data': 'id',
				render: function (data) {
					return '<a href="#" data-id="' + data + '" class="btn btn-warning editar">Editar</a> <br> <br>' +
						   '<a href="#" data-id="' + data + '" class="btn btn-danger borrar">Borrar</a>'
				}
			},
		]

	});

	clientes();

})