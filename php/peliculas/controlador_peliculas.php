<?php 

	require_once 'modelo_pelicula.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$pelicula = new Pelicula();
			$resultado = $pelicula->editar($datos);

			if ($resultado > 0) {
				$json = array(
                	'respuesta' => 'correcto'
            	);
			} else {
				$json = array(
                	'respuesta' => 'error'
            	);
			}
            
			echo json_encode($json);

			break;

		case 'nuevo':

			$pelicula = new Pelicula();
			$resultado = $pelicula->crear($datos);

			if ($resultado > 0) {
				$json = array(
                	'respuesta' => 'correcto'
            	);
			} else {
				$json = array(
                	'respuesta' => 'error'
            	);
			}

			echo json_encode($json);

			break;

		case 'borrar':

			$pelicula = new Pelicula();
			$resultado = $pelicula->eliminar($datos['id']);

			if ($resultado > 0) {
				$json = array(
                	'respuesta' => 'correcto'
            	);
			} else {
				$json = array(
                	'respuesta' => 'error'
            	);
			}
			
			echo json_encode($json);

			break;

		case 'consultar':

			$pelicula = new Pelicula();
			$pelicula->consultar($datos['id']);

			if ($pelicula->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $pelicula->getId(),
					'titulo' => $pelicula->getTitulo(),
					'descripcion' => $pelicula->getDescripcion(),
					'lanzamiento' => $pelicula->getLanzamiento(),
					'idioma' => $pelicula->getIdioma(),
					'prestamo' => $pelicula->getPrestamo(),
					'precio' => $pelicula->getPrecio(),
					'duracion' => $pelicula->getDuracion(),
					'perdida' => $pelicula->getPerdida(),
					'clasificacion' => $pelicula->getClasificacion(),
					'extras' => $pelicula->getExtras(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$pelicula = new Pelicula();
			$lista = $pelicula->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;

		case 'ultimos_estrenos':

			$pelicula = new Pelicula();
			$lista = $pelicula->ultimos_estrenos();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;			
			
	}

 ?>