<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Pelicula extends Modelo
	{

		private $id;
		private $titulo;
		private $descripcion;
		private $lanzamiento;
		private $idioma;
		private $prestamo;
		private $precio;
		private $duracion;
		private $perdida;
		private $clasificacion;
		private $extras;
		
		function __construct()
		{
			# code...
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT film_id AS id, title AS titulo, description AS descripcion, release_year AS lanzamiento, language_id AS idioma, rental_duration AS prestamo, rental_rate AS precio, length AS duracion, replacement_cost AS perdida, rating AS clasificacion, special_features AS extras
				FROM film
				WHERE film_id = $id
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
			SELECT FID AS id, title AS titulo, description AS descripcion, category AS categoria, price AS precio, length AS duracion, rating AS clasificacion, actors AS actores, stores AS tiendas
			FROM film_list
			ORDER BY FID
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

			$titulo = utf8_decode($titulo);
			$descripcion = utf8_decode($descripcion);

			if (isset($extras)) {
				$extras_text = implode(",", $extras);
			} else {
				$extras_text="";
			}

			$this->query = "
			INSERT INTO film(film_id, title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update) 
			VALUES (NULL,'$titulo','$descripcion',$lanzamiento,$idioma,$prestamo,$precio,$duracion,$perdida,'$clasificacion','$extras_text',now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$titulo = utf8_decode($titulo);
			$descripcion = utf8_decode($descripcion);

			if (isset($extras)) {
				$extras_text = implode(",", $extras);
			} else {
				$extras_text="";
			}
			
			$this->query = "
			UPDATE film SET title='$titulo',description='$descripcion',release_year=$lanzamiento,language_id=$idioma,rental_duration=$duracion,rental_rate=$precio,
			length=$duracion,replacement_cost=$perdida,rating='$clasificacion',special_features='$extras_text',last_update=now()
			WHERE film_id=$id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM film
			WHERE film_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function ultimos_estrenos()
		{
			$this->query = "
			SELECT title AS titulo, description AS descripcion
			FROM film_list
			ORDER BY FID DESC
			LIMIT 5
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

	
	    /**
	     * @return mixed
	     */
	    public function getId()
	    {
	        return $this->id;
	    }

	    /**
	     * @return mixed
	     */
	    public function getTitulo()
	    {
	        return $this->titulo;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDescripcion()
	    {
	        return $this->descripcion;
	    }

	    /**
	     * @return mixed
	     */
	    public function getLanzamiento()
	    {
	        return $this->lanzamiento;
	    }

	    /**
	     * @return mixed
	     */
	    public function getIdioma()
	    {
	        return $this->idioma;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPrestamo()
	    {
	        return $this->prestamo;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPrecio()
	    {
	        return $this->precio;
	    }

	    /**
	     * @return mixed
	     */
	    public function getDuracion()
	    {
	        return $this->duracion;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPerdida()
	    {
	        return $this->perdida;
	    }

	    /**
	     * @return mixed
	     */
	    public function getClasificacion()
	    {
	        return $this->clasificacion;
	    }

	    /**
	     * @return mixed
	     */
	    public function getExtras()
	    {
	        return $this->extras;
	    }

	}

 ?>