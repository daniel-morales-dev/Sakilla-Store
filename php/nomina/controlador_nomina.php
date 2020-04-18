<?php
require_once 'modelo_nomina.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$nomina = new nomina();
			$resultado = $nomina->editar($datos);

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

			$nomina = new nomina();
			$resultado = $nomina->crear($datos);

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

			$nomina = new nomina();
			$resultado = $nomina->eliminar($datos['id']);

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

			$nomina = new nomina();
			$nomina->consultar($datos['nomina_id']);

			if ($nomina->getNomina_id() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'nomina_id' => $nomina->getNomina_id(),
					'store_id' => $nomina->getStore_id(),
					'staff_id' => $nomina->getStaff_id(),
					'dia_lab' => $nomina->getDia_lab(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$nomina = new nomina();
			$lista = $nomina->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
/*
	 
	 
		case 'listar_x_tienda':

			$nomina = new nomina();
			$lista = $nomina->listar_x_tienda($datos['id']);

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

		
		break;
		*/	
	}

 ?>