<?php 

	require_once 'modelo_pagos.php';

	$datos = $_GET;

	switch ($_GET['accion']) {
		// case 'editar':

		// 	$pago = new Pagos();
		// 	$resultado = $pago->editar($datos);

		// 	if ($resultado == true || $resultado > 0) {
		// 		$json = array(
  //               	'respuesta' => 'correcto'
  //           	);
		// 	} else {
		// 		$json = array(
  //               	'respuesta' => 'error'
  //           	);
		// 	}
            
		// 	echo json_encode($json);

		// 	break;

		// case 'nuevo':

		// 	$pago = new Pagos();
		// 	$resultado = $pago->crear($datos);

		// 	if ($resultado == true || $resultado > 0) {
		// 		$json = array(
  //               	'respuesta' => 'correcto'
  //           	);
		// 	} else {
		// 		$json = array(
  //               	'respuesta' => 'error'
  //           	);
		// 	}

		// 	echo json_encode($json);

		// 	break;

		// case 'borrar':

		// 	$pago = new Pagos();
		// 	$resultado = $pago->eliminar($datos['id']);

		// 	if ($resultado > 0) {
		// 		$json = array(
  //               	'respuesta' => 'correcto'
  //           	);
		// 	} else {
		// 		$json = array(
  //               	'respuesta' => 'error'
  //           	);
		// 	}
			
		// 	echo json_encode($json);

		// 	break;

		// case 'consultar':

		// 	$pago = new Pagos();
		// 	$pago->consultar($datos['id']);

		// 	if ($pago->getId() == null) {
		// 		$json = array(
  //               	'respuesta' => 'no existe'
  //           	);
		// 	} else {
		// 		$json = array(
		// 			'id' => $pago->getId(),
		// 			'cliente' => $pago->getCliente(),
		// 			'empleado' => $pago->getEmpleado(),
		// 			'renta' => $pago->getRenta(),
		// 			'costo' => $pago->getCosto(),
		// 			'fecha' => $pago->getFecha_pago(),
  //               	'respuesta' => 'existe'
  //           	);
		// 	}

		// 	echo json_encode($json);
			
		// 	break;

		case 'listar':

			$pago = new Pagos();
			$lista = $pago->listar($datos['id']);

			echo json_encode(array('data' => $lista), JSON_UNESCAPED_UNICODE);

			break;
			
	}

 ?>