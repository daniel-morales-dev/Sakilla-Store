<?php 

	require_once 'modelo_pelixcateg.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$pelicategoria = new PeliCategoria();
			$resultado = $pelicategoria->editar($datos);

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

			$pelicategoria = new PeliCategoria();
			$resultado = $pelicategoria->crear($datos);

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

			$pelicategoria = new PeliCategoria();
			$resultado = $pelicategoria->eliminar($datos['pelicula'],$datos['categoria']);

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

			$pelicategoria = new PeliCategoria();
			$pelicategoria->consultar($datos['pelicula'],$datos['categoria']);

			if ($pelicategoria->getPelicula() == null || $pelicategoria->getcategoria() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'pelicula' => $pelicategoria->getPelicula(),
					'categoria' => $pelicategoria->getCategoria(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$pelicategoria = new PeliCategoria();
			$lista = $pelicategoria->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>