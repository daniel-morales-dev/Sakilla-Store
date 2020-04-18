<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Tienda extends Modelo
	{

		private $id;
		private $jefe;
		private $direccion;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getJefe()
		{
			return $this->jefe;
		}

		public function getDireccion()
		{
			return $this->direccion;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT store_id AS id, manager_staff_id AS jefe, address_id AS direccion
				FROM store
				WHERE store_id = $id
				ORDER BY store_id
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
			SELECT s.store_id AS id, st.name AS jefe, a.address AS direccion
			FROM store AS s 
			INNER JOIN staff_list AS st ON s.manager_staff_id=st.ID 
			INNER JOIN address AS a ON s.address_id=a.address_id;
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

			$this->query = "
			INSERT INTO store (store_id, manager_staff_id, address_id, last_update)
			VALUES (NULL,$jefe,$direccion,now())
			";

			$resultado = $this->query_retorna_id();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$this->query = "
			UPDATE store
			SET manager_staff_id = $jefe,last_update = now() 
			WHERE store_id = $id;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM store
			WHERE store_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>