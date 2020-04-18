<?php 

	require_once '../modelo.php';

	/**
	 * 
	 */
	class nomina extends Modelo
	{

		private $nomina_id;
		private $store;
		private $staff_id;
		private $dias;
		private $tsalud;
		private $tpension;
		private $tarl;
		private $tparafiscales;
		private $tcesantia;
		private $tinteres;
		private $tdotacion;
		private $salario = 30000;
		private $basico =0;
		private $totalsalario =0;


public function construct($basico,$tsalud,$tpension,$tarl,$tparafiscales,$tcesantia,$tinteres,$tdotacion)
{
  $this->tsalud = 0;
  $this->tpension = 0;
  $this->tarl = 0;
  $this->tparafiscales = 0;
  $this->tcesantia = 0;
  $this->tinteres = 0;
  $this->tdotacion = 0;
  $this->dias; 
  $this->salario = 30000;
  $this->basico= 0;
}
		
		
		function __construct()
		{
			# code...
		}

		public function getNomina_id()
		{
			return $this->nomina_id;
		}

		public function getStore()
	    {
	        return $this->store;
	    }

	    public function getStaff_id()
	    {
	        return $this->staff_id;
	    }

	    public function getDias()
	    {
	        return $this->dias;
		}
		
		
		public function getTsalud()
		{
				return $this->tsalud;
		}

		public function setTsalud($tsalud)
		{
				$this->tsalud = $tsalud;

				return $this;
		}

		public function getTpension()
		{
				return $this->tpension;
		}
		public function setTpension($tpension)
		{
				$this->tpension = $tpension;

				return $this;
		}

		public function getTarl()
		{
				return $this->tarl;
		}

		public function setTarl($tarl)
		{
				$this->tarl = $tarl;

				return $this;
		}

		public function getTparafiscales()
		{
				return $this->tparafiscales;
		}

		public function setTparafiscales($tparafiscales)
		{
				$this->tparafiscales = $tparafiscales;

				return $this;
		}

		public function getTcesantia()
		{
				return $this->tcesantia;
		}

		public function setTcesantia($tcesantia)
		{
				$this->tcesantia = $tcesantia;

				return $this;
		}
		public function getTinteres()
		{
				return $this->tinteres;
		}

		public function setTinteres($tinteres)
		{
				$this->tinteres = $tinteres;

				return $this;
		}

		public function getTdotacion()
		{
				return $this->tdotacion;
		}

		public function setTdotacion($tdotacion)
		{
				$this->tdotacion = $tdotacion;

				return $this;
		}
		public function getSalario()
		{
				return $this->salario;
		}
		public function setSalario($salario)
		{
				$this->salario = $salario;

				return $this;
		}

		public function getBasico()
		{
				return $this->basico();
		}

		public function setBasico($basico)
		{
				$this->basico = $basico;

				return $this;
		}
				/**
		 * Get the value of totalsalario
		 */ 
		public function getTotalsalario()
		{
				return $this->totalsalario;
		}

		/**
		 * Set the value of totalsalario
		 *
		 * @return  self
		 */ 
		public function setTotalsalario($totalsalario)
		{
				$this->totalsalario = $totalsalario;

				return $this;
		}

		public function consultar($nomina_id='')
		{
			if ($nomina_id != '') {

				$this->query = "
				SELECT nomina_id AS nomina_id, store_id AS store, staff_id AS staff, dia_lab AS dias
				FROM nomina
				WHERe nomina_id=$nomina_id
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
			SELECT T1.nomina_id AS nomina_id, T2.store_id AS store, CONCAT_WS(' ',T3.first_name,
			T3.last_name) AS empleado, T1.dia_lab AS dias,T1.neto as neto
				FROM nomina T1 INNER JOIN store T2 ON T1.store_id=T2.store_id
				INNER JOIN staff t3 ON T1.staff_id=T3.staff_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}

		

		public function editar($datos = array())
		{
			/*foreach ($datos as $llave => $valor) {
				$$llave = $valor;
			}

			$nomina = utf8_decode($nomina);
			$store = utf8_decode($store);
			$staff_id = utf8_decode($staff);
			$dia = utf8_decode($dia);

			$this->query = "
			UPDATE nomina
			SET nomina_id='$nomina', store_id='$store', staff_id='$staff_id', dia_lab=$dia
			WHERE nomina_id = $nomina_id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
			*/
		}

		public function eliminar($nomina_id='')
		{
			$this->query = "
			DELETE FROM nomina
			WHERE nomina_id = $nomina_id
			";

			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
/*
		public function listar_x_tienda($nomina_id='')
		{
			$this->query = "
			SELECT T1.inventory_id AS id, T2.title AS pelicula, T2.rental_duration as renta
			FROM inventory T1 
			INNER JOIN film T2 ON T1.film_id=T2.film_id
			WHERE T1.store_id = $nomina_id
			GROUP BY T2.film_id
			";

			$this->obtener_resultados_query();

			return $this->rows;
		}
*/
	
    public function calculartotal (){
	  
		$salario = $this->getSalario();
		$dias = $this-> getDias();
		$basico = $salario * $dias;

		$this->setBasico($basico);

	}
	public function calcularsalud(){
		
		$basico = $this->getBasico();
		@$tsalud = $basico*0.085;
		$this->setTsalud($tsalud);

	}
	public function calcularpension(){
		$basico = $this->getBasico();
		@$tpension = $basico*0.12;
		$this->setTpension($tpension);
	}
	public function calculararl(){
		
		$basico = $this->getBasico();
		@$tarl = $basico*0.52;
		$this->setTarl($tarl);

	}
	public function calcularparafiscales(){
		
		$basico = $this->getBasico();
		@$tparafiscales = $basico*0.09;
		$this->setTparafiscales($tparafiscales);
	}

	public function calcularcesantias(){
		
		$basico = $this->getBasico();
		@$tcesantia = $basico*0.09;
		$this->setTcesantia($tcesantia);
	}

	public function calcularinteres(){
		
		$basico = $this->getBasico();
		@$tinteres = $basico*0.12;
		$this->setTinteres($tinteres);
	}
	public function calculardotacion(){
		
		$basico = $this->getBasico();
		@$tdotacion = $basico*0.05;
		$this->setTdotacion($tdotacion);
	}

public function calcularSalario(){
	  
	
	$tsalud = $this->getTsalud();
	$tpension = $this->getTpension();
	$tarl = $this->getTarl();
	$tparafiscales = $this->getTparafiscales();
	$tcesantia = $this->getTcesantia();
	$tinteres = $this->getTinteres();
	$tdotacion = $this->getTdotacion();

	$totalsalario = $tsalud+$tpension+$tarl+$tparafiscales+$tcesantia+$tinteres+$tdotacion;

	$this->setTotalsalario($totalsalario);

	}	

	public function crear($datos = array())
	{
		/*if (array_key_exists('id', $datos)) {
			
		}*/
		$totalsalario = $this->calcularSalario();
		foreach ($datos as $llave => $valor) {
			$$llave = $valor;
		}
		
		$this->query = "
		INSERT INTO nomina(nomina_id, store_id, staff_id, dia_lab,neto) 
		VALUES (NULL,'$store','$empleado','$dias','$totalsalario')
		";
		
		$resultado = $this->ejecutar_query_simple();

		return $resultado;

	}
   
	}



 ?>