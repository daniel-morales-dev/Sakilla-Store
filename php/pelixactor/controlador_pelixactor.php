<?php 

	require_once 'modelo_pelixactor.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$peliactor = new PeliActor();
			$resultado = $peliactor->editar($datos);

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

			$peliactor = new PeliActor();
			$resultado = $peliactor->crear($datos);

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

			$peliactor = new PeliActor();
			$resultado = $peliactor->eliminar($datos['pelicula'],$datos['actor']);

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

			$peliactor = new PeliActor();
			$peliactor->consultar($datos['pelicula'],$datos['actor']);

			if ($peliactor->getPelicula() == null || $peliactor->getActor() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'pelicula' => $peliactor->getPelicula(),
					'actor' => $peliactor->getActor(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$peliactor = new PeliActor();
			$lista = $peliactor->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>