<?php 

	require_once 'modelo_actores.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$actor = new Actor();
			$resultado = $actor->editar($datos);

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

			$actor = new Actor();
			$resultado = $actor->crear($datos);

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

			$actor = new Actor();
			$resultado = $actor->eliminar($datos['id']);

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

			$actor = new Actor();
			$actor->consultar($datos['id']);

			if ($actor->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $actor->getId(),
					'nombre' => $actor->getNombre(),
					'apellido' => $actor->getApellido(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$actor = new Actor();
			$lista = $actor->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>