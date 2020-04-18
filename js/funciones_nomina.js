var dt;

function nomina() {



	$('#contenido').on('click','a.borrar',function() {

		var nomina_id = $(this).data('nomina_id');

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
					url: './nomina/controlador_nomina.php',
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
		$('#nomina').removeClass('d-none');

	});

	/*$('#contenido').on('click','button#cerrar',function() {

		$('#contenedor').addClass('d-none');
		$('#contenido').html('');

	})*/

	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./nomina/nueva_nomina.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#nomina').addClass('d-none');

        $.ajax({

			type: 'get',
			url: './empleados/controlador_empleados.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#empleado').append('<option value="' + value.id + '">' + value.nombre + "</option>")

			});

        });
        $.ajax({

			type: 'get',
			url: './tiendas/controlador_tiendas.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$.each(e.data, function(index, value) {

				$('#store').append('<option value="' + value.id + '">Tienda - ' + value.id + "</option>")

			});

		});

	});


}

function agregar() {
	var datos = $('#f-nomina').serialize();

	console.log(datos);
	
	$.ajax({

		type: 'get',
		url: './nomina/controlador_nomina.php?accion=nuevo',
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
			$('#nomina').removeClass('d-none');

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
	$('#contenido').off('click','a.ver');
	$('#contenido').off('click','button#agregar');
	$('#contenido').off('click','button#actualizar');
	$('#contenido').off('click','button#cancelar');
	//$('#contenido').off('click','button#cerrar');

	dt = $('#tabla').DataTable({

		'ajax': './nomina/controlador_nomina.php/?accion=listar',
		'columns': [
			{'data': 'nomina_id'},
			{'data': 'empleado'},
			{'data': 'store'},
			{'data': 'dias'},
			{'data': 'neto'},

			{
				'data': 'nomina_id',
			
			render: function (data) {
				return '<a href="#" data-id="' + data + '" class="btn btn-warning editar">Ver Nomina</a> '
					   
			}
		},
		]

	});

	nomina();

})