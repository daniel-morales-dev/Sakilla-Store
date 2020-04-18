<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Pagos extends Modelo
	{

		private $id;
		private $cliente;
		private $empleado;
		private $renta;
		private $costo;
		private $fecha_pago;
		
		function __construct()
		{
			# code...
		}

		public function getId()
		{
			return $this->id;
        }
		/**
		 * Get the value of cliente_id
		 */ 
		public function getCliente()
		{
				return $this->cliente;
		}

		/**
		 * Get the value of empleado_id
		 */ 
		public function getEmpleado()
		{
				return $this->empleado;
		}

		/**
		 * Get the value of renta_id
		 */ 
		public function getRenta()
		{
				return $this->renta;
		}

		/**
		 * Get the value of costo
		 */ 
		public function getCosto()
		{
				return $this->costo;
		}

		/**
		 * Get the value of fecha_pago
		 */ 
		public function getFecha_pago()
		{
				return $this->fecha_pago;
		}
		
        public function consultar($id='')
		{
			// if ($id != '') {

			// 	$this->query = "
			// 	SELECT payment_id AS id, customer_id AS cliente, staff_id AS empleado, rental_id AS renta, amount AS costo, payment_date AS fecha
			// 	FROM payment
			// 	WHERe payment_id=$id
			// 	";

			// 	$this->obtener_resultados_query();

			// }

			// if (count($this->rows) == 1) {
			// 	foreach ($this->rows[0] as $clave => $valor) {
			// 		$this->$clave = $valor;
			// 	}
			// }
		}

		public function listar($id='')
		{
			$this->query = "
			SELECT T1.payment_id AS id, CONCAT_WS(' ',T2.first_name,T2.last_name) AS cliente, CONCAT_WS(' ',T3.first_name,T3.last_name) as empleado, T1.rental_id AS renta, T1.amount AS costo, T1.payment_date AS fecha
            FROM payment T1 INNER JOIN customer T2 ON T1.customer_id=T2.customer_id
            INNER JOIN staff T3 ON T1.staff_id=T3.staff_id
            WHERE T3.store_id = $id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		public function crear($datos = array())
		{
			// foreach ($datos as $llave => $valor) {
			// 	$$llave = $valor;
			// }

			// $this->query = "
			// INSERT INTO payment(payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) 
			// VALUES (NULL,$cliente,'$empleado','$renta','$costo', now(),now())
			// ";

			// $resultado = $this->ejecutar_query_simple();

			// return $resultado;
		}

		public function editar($datos = array())
		{
			// foreach ($datos as $llave => $valor) {
			// 	$$llave = $valor;
			// }


			// $this->query = "
			// UPDATE payment
			// SET customer_id='$cliente_id', staff_id='$empleado_id', rental_id='$renta_id', amount=$costo, payment_date=now(), last_update=now()
			// WHERE payment_id = $id
			// ";

			// $resultado = $this->ejecutar_query_simple();

			// return $resultado;

		}

		public function eliminar($id='')
		{
			// $this->query = "
			// DELETE FROM payment
			// WHERE payment_id = $id
			// ";

			// $resultado = $this->ejecutar_query_simple();

			// return $resultado;
		}

	}


    

 ?>