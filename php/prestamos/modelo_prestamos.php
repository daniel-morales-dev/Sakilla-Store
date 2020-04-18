<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class Prestamos extends Modelo
	{

		private $cliente;
		private $costo;
		
		function __construct()
		{
			# code...
		}

		public function getCliente()
		{
				return $this->cliente;
		}

	    public function getCosto()
	    {
	        return $this->costo;
	    }
		
        public function consultar($id='')
		{
			if ($id != '') {

				$this->query = "
				SELECT R.customer_id AS cliente, F.rental_rate AS costo
				FROM rental R
				INNER JOIN inventory I ON R.inventory_id=I.inventory_id
				INNER JOIN film F ON I.film_id=F.film_id
				WHERE R.rental_id = $id
				";

				$this->obtener_resultados_query();

			}

			if (count($this->rows) == 1) {
				foreach ($this->rows[0] as $clave => $valor) {
					$this->$clave = $valor;
				}
			}
		}

		public function listar_pdf($id='')
		{
			$this->query = "
			SELECT T1.rental_id AS id, CONCAT_WS(' ',T2.first_name,T2.last_name) AS cliente, CONCAT_WS(' ',T3.first_name,T3.last_name) as empleado, CONCAT_WS(' - ',DATE(T1.rental_date),DATE(T1.return_date)) AS tiempo
            FROM rental T1 
            INNER JOIN customer T2 ON T1.customer_id=T2.customer_id
            INNER JOIN staff T3 ON T1.staff_id=T3.staff_id
            WHERE T3.store_id = $id
            ORDER BY T1.rental_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		public function listar($id='')
		{
			$this->query = "
			SELECT T1.rental_id AS id,T1.rental_date as fecha_prestamo,inventory_id AS inventario, CONCAT_WS(' ',T2.first_name,T2.last_name) AS cliente, return_date AS fecha_entrega, CONCAT_WS(' ',T3.first_name,T3.last_name) as empleado
            FROM rental T1 
            INNER JOIN customer T2 ON T1.customer_id=T2.customer_id
            INNER JOIN staff T3 ON T1.staff_id=T3.staff_id
            WHERE T3.store_id = $id
            AND T1.rental_id NOT IN (SELECT rental_id FROM payment);
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		public function crear($datos = array())
		{
			foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$this->query = "
			INSERT INTO rental(rental_id, rental_date, inventory_id, customer_id, staff_id, return_date) 
			VALUES (NULL,now(),'$inventario','$cliente','$empleado', DATE_ADD(NOW(),INTERVAL $duracion DAY))
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function pagar($datos = array())
		{
			foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$this->query = "
			INSERT INTO payment(payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) 
			VALUES (NULL,$cliente,$empleado,$prestamo,$costo, NOW(), NOW())";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;

		}

		public function editar() { }

		public function eliminar() { }

	}

 ?>