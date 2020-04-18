<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Direccion extends Modelo
	{

		private $id_dir;
		private $direccion;
		private $distrito;
		private $ciudad;
		private $cod_postal;
		private $telefono;
		
		function __construct()
		{
			# code...
		}

		public function getId_dir()
		{
			return $this->id_dir;
		}

		public function getDireccion()
		{
			return $this->direccion;
		}

		public function getDistrito()
		{
			return $this->distrito;
		}

		public function getCiudad()
		{
			return $this->ciudad;
		}

		public function getPostal()
		{
			return $this->cod_postal;
		}

		public function getTelefono()
		{
			return $this->telefono;
		}

		public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT address_id AS id_dir, address AS direccion, district AS distrito, city_id AS ciudad, postal_code AS cod_postal, phone AS telefono
				FROM address
				WHERE address_id = $id
				ORDER BY address_id
				";

				$this->obtener_resultados_query();

			}

			if (count($this->rows) == 1) {
				foreach ($this->rows[0] as $clave => $valor) {
					$this->$clave = $valor;
				}
			}
		}

		/*public function listar()
		{
			$this->query = "
			SELECT address_id AS id, address AS direccion, district AS distrito, city_id AS ciudad, postal_code AS postal, phone AS telefono
			FROM address
			ORDER BY address_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}*/

		public function listar()
		{
			# code...
		}

		public function crear($datos = array())
		{
			/*if (array_key_exists('id', $datos)) {
				
			}*/
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$direccion = utf8_decode($direccion);
			$distrito = utf8_decode($distrito);

			$this->query = "
			INSERT INTO address (address_id, address, district, city_id, postal_code, phone, last_update)
			VALUES (NULL,'$direccion','$distrito',$ciudad,$cod_postal,$telefono,now());
			";

			$resultado = $this->query_retorna_id();

			return $resultado;
		}

		public function editar($datos = array())
		{
			foreach ($datos as $clave => $valor) {
				$$clave = $valor;
			}

			$direccion = utf8_decode($direccion);
			$distrito = utf8_decode($distrito);

			$this->query = "
			UPDATE address
			SET address = '$direccion',district = '$distrito',city_id = $ciudad,postal_code = $cod_postal,phone = $telefono,last_update = now() 
			WHERE address_id = $id_dir;
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		/*public function eliminar($id='')
		{
			$this->query = "
			DELETE FROM address
			WHERE address_id = $id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}*/

		public function eliminar()
		{
			# code...
		}

	}

 ?>