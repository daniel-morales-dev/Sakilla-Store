<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class inventario extends Modelo
	{

		private $id;
		private $film_id;
		private $store_id;
		private $last_update;
		
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getFilm_id()
	    {
	        return $this->film_id;
	    }

	    public function getStore_id()
	    {
	        return $this->store_id;
	    }

	    public function getLast_update()
	    {
	        return $this->last_update;
	    }


		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT inventory_id AS id, film_id AS film, store_id AS store, last_update AS last
				FROM inventory
				WHERe inventory_id=$id
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
			SELECT T1.inventory_id AS id, T2.title AS film, T1.store_id AS store, T1.last_update AS last
				FROM inventory T1 INNER JOIN film T2 ON T1.film_id=T2.film_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		public function crear($datos = array())
		{
			/*if (array_key_exists('id', $datos)) {
				
			}*/
			foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$film = utf8_decode($film);
			$store = utf8_decode($store);

			$this->query = "
			INSERT INTO inventory(inventory_id, film_id, store_id, last_update) 
			VALUES (NULL,'$film','$store',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function editar($datos = array())
		{
			foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$inventory = utf8_decode($id);
			$film = utf8_decode($film);
			$store = utf8_decode($store);

			$this->query = "
			UPDATE inventory
			SET inventory_id='$inventory', film_id='$film', store_id='$store', last_update=now()
			WHERE inventory_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM inventory
			WHERE inventory_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function listar_x_tienda($id='')
		{
			$this->query = "
			SELECT T1.inventory_id AS id, T2.title AS pelicula, T2.rental_duration as renta
			FROM inventory T1 
			INNER JOIN film T2 ON T1.film_id=T2.film_id
			WHERE T1.store_id = $id
			GROUP BY T2.film_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

	}

 ?>