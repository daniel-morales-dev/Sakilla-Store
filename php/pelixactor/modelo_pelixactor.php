<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class PeliActor extends Modelo
	{

		private $pelicula;
		private $actor;
		
		function __construct()
		{
			# code...
		}

		public function consultar($pelicula='',$actor='')
		{
			if ($pelicula != '' || $actor != '') {

				$this->query = "
				SELECT film_id AS pelicula, actor_id AS actor
				FROM film_actor
				WHERE film_id = $pelicula
				AND actor_id = $actor
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
			SELECT f.film_id AS FID, a.actor_id AS AID, f.title AS pelicula, CONCAT_WS(' ',a.first_name,A.last_name) AS actor
			FROM film_actor AS fa
			INNER JOIN film AS f ON fa.film_id=f.film_id
			INNER JOIN actor AS a on fa.actor_id=a.actor_id
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
			INSERT INTO film_actor(film_id, actor_id, last_update) 
			VALUES ($pelicula, $actor, now())
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
			UPDATE film_actor SET film_id='$pelicula',actor_id=$actor,last_update=now()
			WHERE film_id=$FID
			AND actor_id=$AID
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($pelicula='',$actor='')
		{
			$this->query = "
			DELETE FROM film_actor
			WHERE film_id = $pelicula
			AND actor_id = $actor
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
	    public function getActor()
	    {
	        return $this->actor;
	    }

	}

 ?>