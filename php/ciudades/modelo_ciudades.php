<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Ciudad extends Modelo
	{

		private $id;
		private $ciudad;
		private $pais;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getCiudad()
		{
			return $this->ciudad;
		}

		public function getPais()
		{
			return $this->pais;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT city_id AS id, city AS ciudad, country_id AS pais
				FROM city
				WHERE city_id = $id
				ORDER BY city_id
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
			SELECT c.city_id AS id, c.city AS ciudad, p.country AS pais
			FROM city AS c
			INNER JOIN country AS p ON c.country_id=P.country_id
			ORDER BY C.city_id
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

			$ciudad = utf8_decode($ciudad);

			$this->query = "
			INSERT INTO city (city_id, city, country_id, last_update)
			VALUES (NULL,'$ciudad','$pais',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$ciudad = utf8_decode($ciudad);

			$this->query = "
			UPDATE city
			SET city = '$ciudad',country_id = '$pais',last_update = now() 
			WHERE city_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM city
			WHERE city_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>