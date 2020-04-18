$(document).ready(() => {

	dt = $('#tabla').DataTable({

		'ajax': './pagos/controlador_pagos.php/?accion=listar&id=' + $('#idtie').val(),
		'columns': [
			{'data': 'id'},
			{'data': 'cliente'},
			{'data': 'empleado'},
			{'data': 'renta'},
            {'data': 'costo'},
            {'data': 'fecha'},
		]

	});

})