<?php
require_once 'modelo_inventario.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$inventario = new inventario();
			$resultado = $inventario->editar($datos);

			if ($resultado == true || $resultado > 0) {
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

			$inventario = new inventario();
			$resultado = $inventario->crear($datos);

			if ($resultado == true || $resultado > 0) {
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

			$inventario = new inventario();
			$resultado = $inventario->eliminar($datos['id']);

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

			$inventario = new inventario();
			$inventario->consultar($datos['id']);

			if ($inventario->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $inventario->getId(),
					'film_id' => $inventario->getFilm_id(),
					'store_id' => $inventario->getStore_id(),
					'last_update' => $inventario->getLast_update(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$inventario = new inventario();
			$lista = $inventario->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;

		case 'listar_x_tienda':

			$inventario = new inventario();
			$lista = $inventario->listar_x_tienda($datos['id']);

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>