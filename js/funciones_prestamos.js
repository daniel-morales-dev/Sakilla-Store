var dt;

function prestamos() {

	$('#contenido').on('click','button#agregar',function() {

		var datos = $('#f-prestamo').serialize();

		$.ajax({

			type: 'get',
			url: './prestamos/controlador_prestamos.php?accion=nuevo',
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
				$('#prestamos').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

		});
	});

	$('#contenido').on('click','button#cancelar',function() {

		$('#nuevo-editar').html('');
		$('#nuevo-editar').addClass('d-none');
		$('#prestamos').removeClass('d-none');

	});


	$('#contenido').on('click','button#nuevo',function() {

		$('#nuevo-editar').load('./prestamos/nuevo_prestamo.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#prestamos').addClass('d-none');

		$.ajax({

			type: 'get',
			url: './clientes/controlador_clientes.php',
			data: {accion: 'listar'},
			dataType: 'json'

		}).done(function(e) {

			$('#empleado').val($('#idemp').val());

			$.each(e.data, function(index, value) {

				$('#cliente').append('<option value="' + value.id + '">' + value.nombre + "</option>")

			});

		});
        
        $.ajax({

			type: 'get',
			url: './inventario/controlador_inventario.php',
			data: {
				accion: 'listar_x_tienda',
				id: $('#idtie').val()
			},
			dataType: 'json'

		}).done(function(e) {

			$('#duracion').val(e.data[0].id);

			$.each(e.data, function(index, value) {

				$('#inventario').append('<option data-duration="' + value.renta +'" value="' + value.id + '">' + value.pelicula + "</option>")

			});

		});
		
	});

	$('#contenido').on('change','select#inventario',function() {
		$('#duracion').val( $(this).find(":selected").data('duration') );
	});

	$('#contenido').on('click','button#pagar',function() {

		var datos = $('#f-prestamo').serialize();
		console.log(datos);

		$.ajax({

			type: 'get',
			url: './prestamos/controlador_prestamos.php?accion=pagar',
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
				$('#prestamos').removeClass('d-none');

			} else {

				swal.fire({
					type: 'error',
					title: 'Error',
					text: 'Ocurrio un error durante el proceso'
				})

			}

		});
	});

	$('#contenido').on('click','a.pagar',function() {

		var id = $(this).data('id');

		$('#nuevo-editar').load('./prestamos/pago_prestamo.php');
		$('#nuevo-editar').removeClass('d-none');
		$('#prestamos').addClass('d-none');
        
        $.ajax({

			type: 'get',
			url: './prestamos/controlador_prestamos.php',
			data: {
				accion: 'consultar',
				id: id
			},
			dataType: 'json'

		}).done(function(e) {

			$('#cliente').val(e.cliente);
			$('#empleado').val($('#idemp').val());
			$('#prestamo').val(id);
			$('#costo').val(e.costo);

		});
		
	});

}

$(document).ready(() => {

	$('#contenido').off('click','button#nuevo');
	$('#contenido').off('click','a.pagar');
	$('#contenido').off('click','button#agregar');
	$('#contenido').off('click','button#cancelar');

	dt = $('#tabla').DataTable({

		'ajax': './prestamos/controlador_prestamos.php/?accion=listar&id=' + $('#idtie').val(),
		'columns': [
			{'data': 'id'},
			{'data': 'cliente'},
			{'data': 'empleado'},
			{'data': 'inventario'},
            {'data': 'fecha_prestamo'},
            {'data': 'fecha_entrega'},
			{
				'data': 'id',
				render: function (data) {
					return '<a href="#" data-id="' + data + '" class="btn btn-warning pagar">Pagar</a>'
				}
			},
		]

	});

	prestamos();

})