<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Categoria extends Modelo
	{

		private $id;
		private $categoria;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getCategoria()
		{
			return $this->categoria;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT category_id AS id, name AS categoria
				FROM category
				WHERE category_id = $id
				ORDER BY category_id
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
			SELECT category_id AS id, name AS categoria
			FROM category
			ORDER BY category_id
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

			$categoria = utf8_decode($categoria);

			$this->query = "
			INSERT INTO category (category_id, name, last_update)
			VALUES (NULL,'$categoria',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$categoria = utf8_decode($categoria);

			$this->query = "
			UPDATE category
			SET name = '$categoria',last_update = now() 
			WHERE category_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM category
			WHERE category_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>