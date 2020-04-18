<?php 

	require_once 'modelo_Tiendas.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$tienda = new Tienda();
			$resultado = $tienda->editar($datos);

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

			$tienda = new Tienda();
			$resultado = $tienda->crear($datos);

			if ($resultado > 0) {
				$json = array(
					'id' => $resultado,
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

			$tienda = new Tienda();
			$resultado = $tienda->eliminar($datos['id']);

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

			$tienda = new Tienda();
			$tienda->consultar($datos['id']);

			if ($tienda->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $tienda->getId(),
					'jefe' => $tienda->getJefe(),
					'direccion' => $tienda->getDireccion(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$tienda = new Tienda();
			$lista = $tienda->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>