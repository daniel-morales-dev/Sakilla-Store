$(document).ready(() => {

	$('#contenido').off('click','a.alquilar');
	$('#contenido').off('click','button#alquilar');

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
			{'data': 'tiendas'}
		]

	});

})