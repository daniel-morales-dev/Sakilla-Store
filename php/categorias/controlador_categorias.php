<?php 

	require_once 'modelo_categorias.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		case 'editar':

			$categoria = new Categoria();
			$resultado = $categoria->editar($datos);

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

			$categoria = new Categoria();
			$resultado = $categoria->crear($datos);

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

			$categoria = new Categoria();
			$resultado = $categoria->eliminar($datos['id']);

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

			$categoria = new Categoria();
			$categoria->consultar($datos['id']);

			if ($categoria->getId() == null) {
				$json = array(
                	'respuesta' => 'no existe'
            	);
			} else {
				$json = array(
					'id' => $categoria->getId(),
					'categoria' => $categoria->getCategoria(),
                	'respuesta' => 'existe'
            	);
			}

			echo json_encode($json);
			
			break;

		case 'listar':

			$categoria = new Categoria();
			$lista = $categoria->listar();

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>