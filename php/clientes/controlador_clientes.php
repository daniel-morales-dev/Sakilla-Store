<?php 

	require_once 'modelo_cliente.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$cliente = new Cliente();
			$resultado = $cliente->editar($datos);

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

			$cliente = new Cliente();
			$resultado = $cliente->crear($datos);

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

			$cliente = new Cliente();
			$resultado = $cliente->eliminar($datos['id']);

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

			$cliente = new Cliente();
			$cliente->consultar($datos['id']);

			if ($cliente->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $cliente->getId(),
					'tienda' => $cliente->getTienda(),
					'nombre' => $cliente->getNombre(),
					'apellido' => $cliente->getApellido(),
					'email' => $cliente->getEmail(),
					'direccion' => $cliente->getDireccion(),
					'estado' => $cliente->getEstado(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$cliente = new Cliente();
			$lista = $cliente->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>