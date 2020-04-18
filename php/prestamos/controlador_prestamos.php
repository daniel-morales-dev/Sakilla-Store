<?php 

	require_once 'modelo_prestamos.php';

	$datos = $_GET;

	switch ($_GET['accion']) {

		case 'nuevo':

			$prestamo = new Prestamos();
			$resultado = $prestamo->crear($datos);

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

		case 'pagar':

			$prestamo = new Prestamos();
			$resultado = $prestamo->pagar($datos);

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

		case 'consultar':

			$prestamo = new Prestamos();
			$prestamo->consultar($datos['id']);

			if ($prestamo->getCliente() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'costo' => $prestamo->getCosto(),
					'cliente' => $prestamo->getCliente(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$prestamo = new Prestamos();
			$lista = $prestamo->listar($datos['id']);

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>