<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Cliente extends Modelo
	{

        private $id;
        private $tienda;
		private $nombre;
        private $apellido;
        private $email;
		private $direccion;
		private $estado;
		
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

	    public function getDireccion()
	    {
	        return $this->direccion;
	    }

	    public function getEmail()
	    {
	        return $this->email;
	    }

	    public function getTienda()
	    {
	        return $this->tienda;
	    }

	    public function getEstado()
	    {
	        return $this->estado;
	    }


		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT customer_id AS id, store_id AS tienda, first_name AS nombre, last_name AS apellido, email AS email, address_id AS direccion, active AS estado
				FROM customer
				WHERE customer_id=$id
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
			SELECT ID AS id, name AS nombre, address AS direccion, phone AS telefono, city AS ciudad, SID AS tienda 
			FROM customer_list
			ORDER BY ID
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

			$nombre = utf8_decode($nombre);
			$apellido = utf8_decode($apellido);
			$email = utf8_decode($email);

			$this->query = "
			INSERT INTO customer(customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) 
			VALUES (NULL,$tienda,'$nombre','$apellido','$email',$direccion,$estado, now(),now())
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function editar($datos = array())
		{
			foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$nombre = utf8_decode($nombre);
			$apellido = utf8_decode($apellido);
			$email = utf8_decode($email);

			$this->query = "
			UPDATE customer
			SET first_name='$nombre', last_name='$apellido', email='$email', store_id=$tienda, active=$estado, last_update=now()
			WHERE customer_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM customer
			WHERE customer_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>