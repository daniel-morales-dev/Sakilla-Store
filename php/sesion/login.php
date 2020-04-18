<?php 

	require_once 'modelo_login.php';

	if (!isset($_POST['usuario']) || !isset($_POST['clave']) || $_POST['usuario']=='' || $_POST['clave']=='') {
		header('location: ../../index.html');
	}

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$login = new Login();
	$login->consultar($usuario);

	if ($login->getUsuario()==$usuario && password_verify($clave, $login->getClave())) {

		$rol = $login->getRol();

		session_start();

		$_SESSION['id'] = $login->getId();
		$_SESSION['fid'] = $login->getFid();
		$_SESSION['usuario'] = $login->getUsuario();
		$_SESSION['rol'] = $rol;

		switch ($rol) {
			case 'admin':			
				header('location: ../admin.php');
				break;
			case 'jefe':
				header('location: ../jefe.php');
				break;
			case 'empleado':
				header('location: ../empleado.php');
				break;								
		}

	} else {

		header('location: ../../index.html');

	}

 ?>