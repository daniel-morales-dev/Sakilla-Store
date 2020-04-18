<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Actor extends Modelo
	{

		private $id;
		private $nombre;
		private $apellido;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function getApellido()
		{
			return $this->apellido;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT actor_id AS id, first_name AS nombre, last_name AS apellido
				FROM actor
				WHERE actor_id = $id
				ORDER BY actor_id
				";

				$this->obtener_resultados_query();

			}

			if (count($this->rows) == 1) {
				foreach ($this->rows[0] as $clave => $valor) {
					$this->$clave = $valor;
				}
			}
		}

		public function listar()
		{
			$this->query = "
			SELECT actor_id AS id, first_name AS nombre, last_name AS apellido
			FROM actor
			ORDER BY actor_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		public function crear($datos = array())
		{
			/*if (array_key_exists('id', $datos)) {
				
			}*/
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$nombre = utf8_decode($nombre);
			$apellido = utf8_decode($apellido);

			$this->query = "
			INSERT INTO actor (actor_id, first_name, last_name, last_update)
			VALUES (NULL,'$nombre','$apellido',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$nombre = utf8_decode($nombre);
			$apellido = utf8_decode($apellido);

			$this->query = "
			UPDATE actor
			SET first_name = '$nombre',last_name = '$apellido',last_update = now() 
			WHERE actor_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM actor
			WHERE actor_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>