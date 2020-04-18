<?php 

	require_once 'modelo_direcciones.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$direccion = new Direccion();
			$resultado = $direccion->editar($datos);

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

			$direccion = new Direccion();
			$resultado = $direccion->crear($datos);

			if ($resultado > 0) {
				$json = array(
					'id_dir' => $resultado,
                	'respuesta' => 'correcto'
            	);
			} else {
				$json = array(
                	'respuesta' => 'error'
            	);
			}

			echo json_encode($json);

			break;

		/*case 'borrar':

			$direccion = new Direccion();
			$resultado = $direccion->eliminar($datos['id']);

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

			break;*/

		case 'consultar':

			$direccion = new Direccion();
			$direccion->consultar($datos['id_dir']);

			if ($direccion->getId_dir() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id_dir' => $direccion->getId_dir(),
					'direccion' => $direccion->getDireccion(),
					'distrito' => $direccion->getDistrito(),
					'ciudad' => $direccion->getCiudad(),
					'postal' => $direccion->getPostal(),
					'telefono' => $direccion->getTelefono(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		/*case 'listar':

			$direccion = new Direccion();
			$lista = $direccion->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;*/
			
	}

 ?>