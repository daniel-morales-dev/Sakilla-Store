<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Empleado extends Modelo
	{

		private $id;
		private $nombre;
		private $apellido;
		private $direccion;
		private $email;
		private $tienda;
		private $rol;
		private $estado;
		private $usuario;
		private $clave;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
		}

		public function getClave()
	    {
	        return $this->clave;
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

	    public function getRol()
	    {
	        return $this->rol;
	    }

	    public function getEstado()
	    {
	        return $this->estado;
	    }

	    public function getUsuario()
	    {
	        return $this->usuario;
	    }

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT staff_id AS id, first_name AS nombre, last_name AS apellido, address_id AS direccion, email AS email, store_id AS tienda, rol_id AS rol, active AS estado, username AS usuario, password AS clave
				FROM staff
				WHERe staff_id=$id
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
			FROM staff_list 
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
			$usuario = utf8_decode($usuario);

			$opciones = [
    			'cost' => 12,
			];
			$clave_hash = password_hash($clave, PASSWORD_BCRYPT, $opciones);

			$this->query = "
			INSERT INTO staff(staff_id, first_name, last_name, address_id, email, store_id, rol_id, active, username, password, last_update) 
			VALUES (NULL,'$nombre','$apellido',$direccion,'$email',$tienda,$rol,$estado,'$usuario','$clave_hash',now())
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
			$usuario = utf8_decode($usuario);

			// $opciones = [
   //  			'cost' => 12,
			// ];
			// $clave_hash = password_hash($clave, PASSWORD_BCRYPT, $opciones);

			$this->query = "
			UPDATE staff
			SET first_name='$nombre', last_name='$apellido', email='$email', store_id=$tienda, rol_id=$rol, active=$estado, username='$usuario', last_update=now()
			WHERE staff_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM staff
			WHERE staff_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

	}

 ?>