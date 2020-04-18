<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Idioma extends Modelo
	{

		private $id;
		private $idioma;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getIdioma()
		{
			return $this->idioma;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT language_id AS id, name AS idioma
				FROM language
				WHERE language_id = $id
				ORDER BY language_id
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
			SELECT language_id AS id, name AS idioma
			FROM language
			ORDER BY language_id
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

			$idioma = utf8_decode($idioma);

			$this->query = "
			INSERT INTO language (language_id, name, last_update)
			VALUES (NULL,'$idioma',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$idioma = utf8_decode($idioma);

			$this->query = "
			UPDATE language
			SET name = '$idioma', last_update = now() 
			WHERE language_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM language
			WHERE language_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>