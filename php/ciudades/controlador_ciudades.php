<?php 

	require_once 'modelo_ciudades.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$ciudad = new Ciudad();
			$resultado = $ciudad->editar($datos);

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

			$ciudad = new Ciudad();
			$resultado = $ciudad->crear($datos);

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

			$ciudad = new Ciudad();
			$resultado = $ciudad->eliminar($datos['id']);

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

			$ciudad = new Ciudad();
			$ciudad->consultar($datos['id']);

			if ($ciudad->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $ciudad->getId(),
					'ciudad' => $ciudad->getCiudad(),
					'pais' => $ciudad->getPais(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$ciudad = new Ciudad();
			$lista = $ciudad->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>