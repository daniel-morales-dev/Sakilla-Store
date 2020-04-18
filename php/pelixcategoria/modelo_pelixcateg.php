<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class PeliCategoria extends Modelo
	{

		private $pelicula;
		private $categoria;
		
		function __construct()
		{
			# code...
		}

		public function consultar($pelicula='',$categoria='')
		{
			if ($pelicula != '' || $categoria != '') {

				$this->query = "
				SELECT film_id AS pelicula, category_id AS categoria
				FROM film_category
				WHERE film_id = $pelicula
				AND category_id = $categoria
				ORDER BY film_id
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
			SELECT f.film_id AS FID, c.category_id AS CID, f.title AS pelicula, c.name AS categoria
			FROM film_category AS fa
			INNER JOIN film AS f ON fa.film_id=f.film_id
			INNER JOIN category AS c on fa.category_id=c.category_id
			ORDER BY fa.film_id
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
			INSERT INTO film_category(film_id, category_id, last_update) 
			VALUES ($pelicula, $categoria, now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$this->query = "
			UPDATE film_category SET film_id='$pelicula',category_id=$categoria,last_update=now()
			WHERE film_id=$FID
			AND category_id=$CID
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($pelicula='',$categoria='')
		{
			$this->query = "
			DELETE FROM film_category
			WHERE film_id = $pelicula
			AND category_id = $categoria
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	    /**
	     * @return mixed
	     */
	    public function getPelicula()
	    {
	        return $this->pelicula;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCategoria()
	    {
	        return $this->categoria;
	    }

	}

 ?>