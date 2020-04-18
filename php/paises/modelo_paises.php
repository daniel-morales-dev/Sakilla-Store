<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class pais extends Modelo
	{

		private $id;
		private $pais;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getPais()
		{
			return $this->pais;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT country_id AS id, country AS pais
				FROM country
				WHERE country_id = $id
				ORDER BY country_id
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
			SELECT country_id AS id, country AS pais
			FROM country
			ORDER BY country_id
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

			$pais = utf8_decode($pais);

			$this->query = "
			INSERT INTO country (country_id, country, last_update)
			VALUES (NULL,'$pais',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$pais = utf8_decode($pais);

			$this->query = "
			UPDATE country
			SET country = '$pais', last_update = now() 
			WHERE country_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM country
			WHERE country_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>