<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Login extends Modelo
	{

		private $usuario;
		private $clave;
		private $rol;
		private $id;
		private $fid;

		function __construct()
		{
			# code...
		}

		public function getUsuario()
		{
			return $this->usuario;
		}

		public function getClave()
		{
			return $this->clave;
		}

		public function getRol()
		{
			return $this->rol;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getFid()
		{
			return $this->fid;
		}

		public function consultar($usuario='')
		{
			if ($usuario != '') {

				$this->query = "
				SELECT s.staff_id as id, s.store_id as fid, s.username AS usuario, s.password AS clave, r.rol_name AS rol
				FROM staff AS s
				INNER JOIN rol AS r
				ON s.rol_id=r.rol_id
				WHERE s.username='$usuario'
				";

				$this->obtener_resultados_query();

			}

			if (count($this->rows) == 1) {
				foreach ($this->rows[0] as $clave => $valor) {
					$this->$clave = $valor;
				}
			}
		}

		public function crear()
		{
			# code...s
		}

		public function eliminar()
		{
			# code...
		}

		public function listar()
		{
			# code...
		}

		public function editar()
		{
			# code...
		}

	}

 ?>